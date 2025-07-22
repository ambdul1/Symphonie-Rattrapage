Nom : ANZIZ IBN MAHAMOUD
Prenom: Ambdul
Matricule: 145

#  Mon App Graphique – Application Symfony de Gestion de Tâches

> Une application web légère et intuitive pour la gestion de vos tâches quotidiennes, développée avec amour et rigueur en Symfony.  
> Interface simple. Code propre. Expérience utilisateur fluide.

---

## Objectif du projet

Cette application a été conçue pour permettre :

- La **création** de tâches
- La **visualisation** détaillée de chaque tâche
- La **modification** avec retour visuel
- La **suppression** avec confirmation stylisée
- Une **interface propre** avec CSS intégré dans les fichiers Twig

Elle s’inscrit dans une démarche d’apprentissage, de productivité et de professionnalisme.

---

## Fonctionnalités clés

-  Créer une nouvelle tâche
-  Voir les détails d’une tâche
- Modifier une tâche existante
-  Supprimer une tâche
-  Affichage des données importantes : titre, description, date limite, priorité, statut
-  Interface stylisée sans framework externe, full CSS personnalisé dans les templates

---

## 🛠️ Stack Technique

| Outil        | Utilisation                        |
|--------------|------------------------------------|
| Symfony      | Framework PHP principal            |
| PHP 8.4+     | Langage back-end                   |
| Doctrine ORM | Manipulation de la base de données |
| Twig         | Moteur de templates HTML           |
| HTML / CSS   | Interface front-end                |
| SQLite       | Base de données simple et portable |

---

##  Structure du projet

mon_app_graphique/
├── assets/
├── bin/
├── config/
├── migrations/
├── public/
├── src/
│ ├── Controller/
│ └── Entity/
├── templates/
│ └── base.html.twig
│ └── tache/
├── tests/
├── translations/
├── var/
├── vendor/
├── .env
├── composer.json
├── symfony.lock
└── README.md


---

##  Installation rapide

### 1. Cloner le projet
```bash
git clone https://github.com/ambdul1/mon_app_graphique.git
cd mon_app_graphique

2. Installer les dépendances

composer install

3. Configurer la base de données

cp .env .env.local
# Éditer .env.local si besoin
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

4. Lancer le serveur de développement

symfony server:start

Utilisation

     Page d’accueil : liste de toutes les tâches

    ➕ Lien “Créer une nouvelle tâche” stylisé en bas de la liste

    Boutons d'action visibles à droite de chaque tâche :

        Voir

        Modifier

        Supprimer

    ✅ Confirmation visuelle après chaque action

    ✨ Interface 100% personnalisée sans Bootstrap

 Design

    Couleurs sobres et professionnelles

    Boutons d’action avec hover et transitions

    Interface responsive

    Layout unique dans base.html.twig

Auteur

    Ambdul
    Développeur passionné, amoureux du C++ et de l’IA, bâtisseur d’architectures logicielles, rêveur pragmatique du code qui change le monde.

 Licence

Ce projet est mis à disposition gratuitement pour un usage personnel, éducatif ou académique.
Pour tout usage professionnel ou commercial, veuillez contacter l’auteur.
⭐ Suggestions

    Ajouter une pagination ou une recherche

    Implémenter un filtre par priorité ou statut

    Ajouter une authentification pour plusieurs utilisateurs

    Déploiement Dockerisé (facultatif)

 Captures (optionnel)

À insérer dans public/images :

public/images/screenshot1.png
public/images/screenshot2.png

Remerciements

Un grand merci à toi-même, Ambdul, pour ta détermination.
Tu prouves qu’avec de la passion et de la patience, chaque ligne de code peut devenir une œuvre d’art.


---

###  Étapes suivantes

Dans ton terminal, crée et ajoute le fichier :

```bash
echo "<colle ici le contenu>" > README.md
git add README.md
git commit -m "Ajout du README.md complet et structuré"
