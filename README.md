Nom: Mohammadreza Habibzadeh - 2296191

Github : https://github.com/farzad283/Laravel-TP1.git

WebDev: https://e2296191.webdev.cmaisonneuve.qc.ca/TP1-laravel


-----------------------------------------------------------------------------------------

Description:

Dans ce projet, la liste des coordonnées des étudiants et leur ville de résidence sont présentées dans deux tableaux et enfin leurs coordonnées sont affichées sur une nouvelle page.
• La première page est la couverture du projet, vous pouvez accéder à la liste des étudiants en la parcourant ou en cliquant dessus.
• Sur cette page, nous voyons la liste des étudiants et en cliquant sur chaque étudiant, nous passons à la page suivante et voyons ses détails et vous pouvez également créer un nouvel étudiant en cliquant sur le bouton "Ajouter".
• Sur la page de détail de chaque étudiant, vous pouvez les modifier ou les supprimer avec cliquant sur les boutons modifier et effacer.


------------------------------------------------------------------------------------------

La documentation: 


1-	Créer un dossier nommé “Maisonneuve-2296191” :

    Composer create-project  --prefer-dist Laravel/Laravel Maisonneuve-2296191 ‘“8.* “

2-	Créer database nommé “ Etudiant_Maisonneuve“ dans phpMyAdmin.

3-  Apporter des modifications au fichier .env:

    o	Changer APP-NAME:” Etudiant_Maisonneuve”

    o	Effacer et régénérer APP-KEY à l’URL :localhost :8080 avec cette command :  php artisan serve. => Generate APP KEY

    o	Changer “ DB-PORT“  et “ DB_USERNAME“  et “ DB-DATABASE“  et “ DB-PASSWORD“ 
        

4-	Créer  les Modèles :

    o	Php artisan make :model Etudiant -m

    o	Php artisan make :model Ville -m


5-	créer les tables :

    o	php artisan make :factory EtudiantFactory

    o	php artisan make :factory VilleFactory


6-	Saisir 15 nouvelles villes et 100 nouveaux étudient

    o	php artisan tinker
        \App\Models\Ville ::factory()->times(15)->create();

    o	php artisan tinker
 	\App\Models\Etudiant ::factory()->times(100)->create();


7-	Créez le controleu

    o	Php artisan make :controller EtudiantController -m Etudiant


8-	Créez folder layouts et folder etudiant dans views


------------------------------------------------------------------------------------------

TP-1 - CRUD

Créer un site web dynamique en utilisant le cadriciel Laravel
Félicitations, vous avez reçu un nouveau mandat et vous souhaitez impliquer toutes les connaissances que vous avez acquises dans le cours Cadriciel Web.
Le mandat est de créer un site Internet pour recueillir de l'information auprès des étudiants du Collège Maisonneuve, et possiblement à l'avenir, de construire un réseau social pour eux.
La première étape consiste à rassembler les informations, remplir la base de données avec des données aléatoires et créer les interfaces fonctionnelles pour visualiser, saisir, mettre à jour et supprimer les étudiants

Votre base de données initiale aura 2 tables : Étudient (id, nom, adresse, phone, email, date de naissance, ville_id) et ville (id, nom).

1. En utilisant les lignes de commande, créer un nouveau projet Laravel nommée Maisonneuve{votre matricule} (1 pt)
2. En utilisant les lignes de commande, créer les modèles (1 pts)
3. En utilisant les lignes de commande, créer les tables (2 pts)
4. En utilisant les lignes de commande, saisir 15 nouvelles villes (1 pts)
5. En utilisant les lignes de commande, saisir 100 nouveaux étudient (1 pts)
Pour les questions 4 et 5, effectuez une recherche des propriétés de "Factory" pour remplir des valeurs telles que des noms, des adresses, des téléphones, etc. (pas de phrases ou de texte aléatoires).
6. En utilisant les lignes de commande, créer les contrôleurs (1 pts)
7. Créez votre layout.blade avec vous CSS, vous devez importer bootstrap (ou du CSS personnalise) et le concevoir selon vos préférences. (1 pts)
8. Travailler avec bootstrap (ou du CSS personnalise) pour respecter les concepts d'ergonomie, soyez créatif (1pts).
9. Créer un contrôleur “index” et une vue, pour afficher tous les étudiants, avec un lien pour sélectionner l'étudiant et le mettre à jour. (2 pts)
10. Créer un contrôleur “create” et une vue, pour saisir un nouvel étudiant. Le formulaire doit avoir un champ “select” avec toutes les villes qui viennent de la base de données. (2 pts)
11. Créer un contrôleur “show” et une vue, pour afficher un étudiant sélectionné. (2 pts)
12. Créer un contrôleur “edit” et une vue, pour afficher un étudiant sélectionné dans un formulaire et le mettre à jour. (2 pts)
13. Créer un contrôleur “destroy” pour supprimer un étudiant  électionné. (1 pt)
14. Publier votre projet dans GitHub (publique) et envoyer le lien dans la documentation. (1 pts)
15. Enregistrez le projet avec une extension ZIP et ajouter la documentation dans la racine (1pt)

Vous devez m'envoyer sur Mio :
● La documentation avec les lignes de commandes utilisées pendant le projet :
Créer le projet, les modèles, les contrôleurs, les tables, les données, etc.
● Le lien pour accéder à votre site sur webdev et/ou server et GitHub
● Un fichier compressé avec l'ensemble de votre projet Laravel.
● Si vous avez toujours des problèmes pour publier le projet dans webdev. Vous devez faire une vidéo enregistrant l’écran pour montrer que les opérations CRUD marchent bien dans votre projet, (1 - 2 min video)


-------------------------------------------------------------------------------------------


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
