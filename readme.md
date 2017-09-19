<p align="center"><img src="http://51.254.119.126:8080/image/72.png"> LaravelReadyToUse</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About LaravelReadyToUse

LaravelReadyToUse is a web application Framework with expressive, elegant syntax. We use Laravel for create a quick strat up kit. We including many Tools. Focus mainly on your project.

## This included

LaravelReadyToUse is ready with many Tools and Frameworks:
- [Laravel](https://github.com/laravel/laravel) version 5.5 (PHP)
- [Socialite](https://github.com/laravel/socialite) version 3.0 (Laravel's Tools for connect user with Google or FaceBook)
- [CollectiveHtml](https://github.com/LaravelCollective/html) version 5.5 (Laravel's Tools for use form)
- [InterventionImage](https://github.com/Intervention/image) (PHP tools for manipulate image)
- [UiKit](https://github.com/uikit/uikit) version 2.27.4 (Framework CSS)
- [Less](https://github.com/less/less-docs) (Create, update and [compile](https://github.com/leafo/lessphp) CSS)
- [Jquery](https://github.com/jquery/jquery) version 2.1.4 (Javascript Tools)
- [FontAwesome](http://fontawesome.io/) (Icon HTML)

See _composer.json_ file for many informations or update your need.

## Services

We have already create many services ans Web pages. This included:
- Language service (English and French)
- Mail service (Contact, Lost password and Template)
- API (all Web Pages ans services)
- Many checks (Forms, Javascript is active ?, Error like 404 page)
- Admin user (for contact and manage options)

- Classe Reply (for return a result API or Web)
- Classe Record (for save many Log)
- Classe SendMail (an easy way for send an email)
- Classe Tools (check external link or create your personal tools)
- Classe ViewElement (return the texts of the application, useful for and Android or IOS application)

- Home's page example (with intro, service's details, questions and legal informations)
- Contact's page example
- Login's page example (with modal and full page)
- User's page (when user is connected)
- User's settings page (when user is connected)
- Blog's page example (comming soon)

- Responsive Design
- Navbar (template CSS with Blade and Uikit)
- Menu (template CSS with Blade and Uikit)
- Icon (Font Awesome)
- Logo and Favicon (MIT)

## You need

This application need PHP7 or more for working (Laravel work also with [Composer](https://github.com/composer/composer)). You can used server MySql, serveur Mail and server NGNIX or Apache.

## Install

1/ Clone the project:
```bash
git clone git://github.com/newrare/laravelReadyToUse.git <yourProject>
```
2/ Create a folder for save user's avatars:
```bash
mkdir <yourProject>/public/image/cover
sudo chmod 775 <yourProject>/public/image/cover
```
3/ Create a database (with *root*: Edit _bdd.php_ file if you used an another name):
```bash
php <yourProject>/database/bdd.php CREATE user <yourDatabaseName> <yourDatabasePassword>
```

4/ Copy and edit your config (Domain name, MySql, Mail, Google API, etc)
```bash
cp <yourProject>/.env.example <yourProject>/.env
vim <yourProject>/.env
```

5/ Test LaravelReadyToUse and create your first _<userName>_. Go to your URL (your domain name or IP) and clik on button _Create an account_.

6/ Set your _<userName>_ to admin:
```bash
php <yourProject>/laravelReadyToUse/database/userIsAdmin.php <yourDatabaseName> <userName> 1 <yourDatabasePassword>
```

## Map

The principals files and folders
- .gitignore (file exception)
- .env (config)

- config/app.php (Laravel aliases, drivers and providers)
- routes/web.php (Routes Web and API)

- app/Http/Controllers/* (Controllers)
- app/Http/Classes/* (Classes)
- app/Http/Models/* (Database Model)
- app/Http/Middleware/* (Middleware)

- resources/views/* (view and template)
- resources/views/template.blade.php (principal web template)
- resources/views/email/* (template mail)
- resources/lang (texts for view)

- public/js/* (Javascript files)
- public/js/main.js (your personal Javascript code)
- public/css/* (CSS and Uikit files)
- public/css/main.css (your personal CSS code)
- public/css/less.css (Uikit CSS code compiled)
- public/css/less/core/* (Uikit CSS base code)
- public/css/less/components/* (Uikit CSS tools code)
- public/css/less/php/* (PHP compilator for create a static CSS file)

- public/favicon.ico (icon for IE)
- public/favicon.png (icon for other browser)
- public/image/* (all images)
- public/image/72.png (logo 72px)
- public/image/cover/* (users's avatars)

## Language

Edit or add file to _<yourProject>/resources/lang/*_
Add a new language in array *allLang* to _<yourProject>/app/Http/Controllers/LangController.php_

## API

All pages and functions of the web application also works in API. You can build an Android or IOS app in parallel. LaravelReadyToUse becomes the logical engine.

URL examples:
- GET   http://www.yourDomainName.tld/                      #show home's page
- GET   http://www.yourDomainName.tld/lang/en/edit          #set app to English
- GET   http://www.yourDomainName.tld/lang/fr/edit          #set app to English

- GET   http://www.yourDomainName.tld/view                  #show view's page: list of views
- GET   http://www.yourDomainName.tld/view/home             #show element of viewName

- GET   http://www.yourDomainName.tld/connection            #show connection's page
- GET   http://www.yourDomainName.tld/connection/off/edit   #log out user
- POST  http://www.yourDomainName.tld/connection            #log in user
                                                            #ARG: [login, pass]
- GET   http://www.yourDomainName.tld/account               #show account's page
                                                            #if session on, show options's page for current user
                                                            #if session off, show page for create a new user
- GET   http://www.yourDomainName.tld/account/email/edit    #send a new mail validation
- POST  http://www.yourDomainName.tld/account               #create a new user
                                                            #ARG: [login, pass, email]
- PUT   http://www.yourDomainName.tld/account/1             #update user's setting for idUser=1
                                                            #ARG: [userEmail, userPass, userUrlAvatar, userLang]
                                                            #ENUM USERLANG : [en, fr]

## ViewElement

Why you created the ViewElements Classe ? That complicates page creation.
You are right, this Classe is not necessary if you used only a Web application: in this case, bypass ViewElement. But if we need API, used this Classe for return English or French texts with API. So, you can create an APP Android or IOS without texts, used just many API calls for get your contents.

For add or update page with this method, edit _<yourProject>/app/Http/Classes/ViewElement.php_.

## Design (CSS ans Less)

Uikit is already install with a custom template. You can change it easly.

*In Dev*
Uncomment _lessDev_ part in _<yourProject>/resources/views/template.blade.php_
Ccomment _lessProd_ part in _<yourProject>/resources/views/template.blade.php_

Edit file _<yourProject>/public/css/main.css_ for home's page or personal HTML class
Edit file _<yourProject>/public/css/less/core/variables.less_ for choose your personal colors
Edit many files in _<yourProject>/public/css/less/core/*_ or _<yourProject>/public/css/less/components/*_ for advanced customization

_COMPILE IT FOR PROD_
Make this commands:
```bash
cd <yourProject>
php public/css/less/php/createStaticCss.php
```

*In Prod*
Comment _lessDev_ part in _<yourProject>/resources/views/template.blade.php_
Uncomment _lessProd_ part in _<yourProject>/resources/views/template.blade.php_

## Security Vulnerabilities

If you discover a security vulnerability within LaravelReadyToUse, please send an e-mail to Julien Bianchin at newrare@hotmail.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
