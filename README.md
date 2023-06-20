Nom: Mohammadreza Habibzadeh - 2296191

Github : https://github.com/farzad283/Laravel-TP2.git



-----------------------------------------------------------------------------------------

Description:

Dans ce projet, la liste des informations des étudiants est fournie et enfin leurs détails sont affichés sur une nouvelle page.
Tout utilisateur peut s'inscrire en tant qu'utilisateur sue le site. Chaque utilisateur peut voir la liste des étudiants et des utilisateur et uniquement supprimer ou modifier son information.
Tout utilsateur peut s'ajouter en tant qu'étudiant. Dans ce cas, il peut ajouter un article et modifier ou supprimer son article. Il peut également télécharger.,modifier ou supprimer ses document.
Tout les information être affichées en anglais et en français.


------------------------------------------------------------------------------------------

La documentation: 


1-	Créer un dossier nommé “Maisonneuve-2296191” :

Composer create-project  --prefer-dist Laravel/Laravel Maisonneuve-2296191 ‘“8.* “

2-	Créer database nommé “ Etudiant_Maisonneuve“ dans phpMyAdmin.



3-  Apporter des modifications au fichier .env:

o	Changer APP-NAME:” Etudiant_Maisonneuve”

o	Effacer et régénérer APP-KEY à l’URL :localhost :8080 avec cette command :  php artisan serve. => Generate APP KEY

o	Changer “ DB-PORT“  et “ DB_USERNAME“  et “ DB-DATABASE“  et “ DB-PASSWORD“ 

4-	Créer  les fichiel lang_fr :

o	Créer un fichier ‘’lang.php’’ dans dossier nomé ‘’ fr ‘’ das dossier lang, dans dossier resources


5-	Créer  les Modèles :

o	Php artisan make :model Etudiant -m

o	Php artisan make :model Ville -m

o	Php artisan make :model Article -m

o	Php artisan make :model Directory -m

o	Php artisan migrate

6-	créer les factory :

o	php artisan make :factory EtudiantFactory

o	Php artisan make :factory VilleFactory

o	Php artisan make :factory ArticleFactory

o	php artisan make :factory DirectoryFactory

o	php artisan make :factory UserFactory

7-	Saisir 10 nouvelles villes , étudient, user, article, directory

o	php artisan tinker

 	\App\Model\Ville ::factory()->times(10)->create();
		\App\Model\Etudiant ::factory()->times(10)->create();
\App\Model\User ::factory()->times(10)->create();
\App\Model\Article::factory()->times(10)->create();
\App\Model\Directory ::factory()->times(10)->create();

8-	Créez le controller

o	Php artisan make :controller EtudiantController -m Etudiant
o	Php artisan make :controller CustomAuthController -m Auth
o	Php artisan make :controller ArticleController -m Article
o	Php artisan make :controller DirectoryController -m Directory
o	Php artisan make :controller LocalizationController 


9-	Créez le middleware

o	Php artisan make:middleware localization
    
- Ajouter ‘’ \App\Http\Middleware\Localization::class,’’  dans kernel.php


10-	Créez folder layouts et folder etudiant , auth, article et directory dans views

11-	Ajouter Paginate

Providers   =>  AppServiceProvide :  ajouter : 
‘’use Illuminate\Pagination\Paginator;’’
“public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }”


12-	PDF

Composer require barryvdh/laravel-dompdf

o	Ajouter dans dossier config dans fichier app.php :
 				'PDF' => Barryvdh\DomPDF\Facade::class,


13-	Créer link storage pour sauvegarde document

o	Php artisan storage :link





----------------------------------------------------------------------------------------

TP-2 - LARAVEL

À partir de votre TP 1 vous devez apporter les améliorations demandées à votre projet.
Félicitations, votre client a apprécié votre premier projet et aimerait vous offrir un deuxième mandat pour améliorer le réseau social du collège. Vous souhaitez impliquer toutes les nouvelles connaissances acquises dans le cours Cadriciel Web pour la poursuite de ce projet.
● Le client souhaite maintenant ajouter une page de connexion pour que chaque élève puisse se connecter à son propre compte, la table étudiante doit donc être connectée à la table utilisateur (users). Pour maintenir la sécurité du système, le mot de passe doit être crypté (2 pts)
● Étant donné que les étudiants du collégial sont polyglottes, le client vous a demandé de créer un système multilingue, français en anglais. Tout le contenu du système doit être dans les deux langues (2 points)
Pour compléter le système et le mettre en production, le client a demandé 2 autres modifications majeures.

Le Forum
● Le système doit avoir un forum dans lequel les étudiants peuvent écrire des articles. Les articles doivent être visibles par tous les étudiants connectés. Seul l'étudiant qui a écrit l'article peut le modifier et/ou le supprimer. (2 pts)
● Pour créer le forum il faut ajouter un tableau dans la base de données, il est important d'enregistrer le titre de l'article, le contenu et la date, les articles peuvent être rédigés en français et en anglais, et le système doit gérer la langue de choix lors de la publication. (2 pts)

Le répertoire de documents

Pour compléter, le système doit disposer d'un répertoire de fichiers, dans lequel les étudiants peuvent partager des documents au format pdf, zip et doc. Ce répertoire doit être accessible par tous les étudiants connectés. Seul l'élève qui a partagé le document peut le modifier et/ou le supprimer. (2 pts)
● Pour créer le répertoire, vous devez ajouter un tableau dans la base de données, il est important d'enregistrer le titre du document et la date, les titres peuvent être rédigés en français et en anglais, et le système doit gérer la langue de choix lors de la publication. (2pts)
● Le répertoire des fichiers doit être affiché dans un tableau avec la technique de pagination, le titre et le nom de l'utilisateur qui a partagé le fichier doivent être  visibles sous ce tableau. (2 pt)
● Le système doit avoir une interface sécurisée, conviviale avec du CSS, Bootstrap et un menu de navigation. (3pts)
● Tous les formulaires doivent être validés, y compris les formulaires développés dans le TP1 (2pts)

Publier votre projet dans GitHub (publique) et envoyer le lien dans la
documentation. (1 pts)
Déposez le fichier ZIP, sur Léa - Onmivox.
Vous devez m'envoyer sur Mio :
● Enregistrez le projet avec une extension ZIP et ajoutez la documentation (lisez-moi) à la racine du projet et la déposer dans omnivox. Ajoutez dans la documentation le lien pour y accéder le projet sur WebDev ou un autre serveur public, aussi comme le nom d’utilisateur et le mot de passe d’un étudiant enregistré dans le système. Ajouter dans le document le lien GitHub.

L'absence de ces informations dans la documentation sera considérée comme un projet non conclu avec une note finale diminuée de 5 points sur 25.
● Si vous avez toujours des problèmes pour publier le projet dans webdev. Vous devez faire une vidéo enregistrant l’écran pour montrer que les opérations CRUD marchent bien dans votre projet, (1 - 2 min video).


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
