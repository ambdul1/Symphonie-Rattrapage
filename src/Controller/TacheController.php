<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Form\TacheType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

#[Route('/tache')]
class TacheController extends AbstractController
{
    private $entityManager;
    private $csrfTokenManager;

    public function __construct(EntityManagerInterface $entityManager, CsrfTokenManagerInterface $csrfTokenManager)
    {
        $this->entityManager = $entityManager;
        $this->csrfTokenManager = $csrfTokenManager;
    }

    #[Route('/', name: 'app_tache_index', methods: ['GET'])]
    public function index(): Response
    {
        $taches = $this->entityManager->getRepository(Tache::class)->findAll();

        return $this->render('tache/index.html.twig', [
            'taches' => $taches,
        ]);
    }

    #[Route('/new', name: 'app_tache_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tache = new Tache();
        $form = $this->createForm(TacheType::class, $tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($tache);
            $this->entityManager->flush();

            $this->addFlash('success', 'La tâche a été créée avec succès.');

            return $this->redirectToRoute('app_tache_index');
        }

        return $this->render('tache/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_tache_show', methods: ['GET'])]
    public function show(Tache $tache): Response
    {
        return $this->render('tache/show.html.twig', [
            'tache' => $tache,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tache_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tache $tache): Response
    {
        $form = $this->createForm(TacheType::class, $tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            $this->addFlash('success', 'La tâche a été modifiée avec succès.');

            return $this->redirectToRoute('app_tache_index');
        }

        return $this->render('tache/edit.html.twig', [
            'form' => $form->createView(),
            'tache' => $tache,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_tache_delete', methods: ['POST'])]
    public function delete(Request $request, Tache $tache): RedirectResponse
    {
        $submittedToken = $request->request->get('_token');

        if ($this->isCsrfTokenValid('delete'.$tache->getId(), $submittedToken)) {
            $this->entityManager->remove($tache);
            $this->entityManager->flush();

            $this->addFlash('success', 'La tâche a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Jeton CSRF invalide, suppression annulée.');
        }

        return $this->redirectToRoute('app_tache_index');
    }
}
