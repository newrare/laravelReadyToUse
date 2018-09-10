<p align="center"><img src="http://51.254.119.126:8080/image/72.png"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### About LaravelReadyToUse

LaravelReadyToUse is based on Laravel. It's a web application Framework with expressive and elegant syntax. We use Laravel for create a quick strat up kit and we including many Tools. Focus mainly on your project.



### This included

LaravelReadyToUse is ready with many Tools and Frameworks:
- [Laravel](https://github.com/laravel/laravel) version 5.5 (PHP)
- [Socialite](https://github.com/laravel/socialite) version 3.0 (Laravel's Tools for connect user with Google or FaceBook)
- [CollectiveHtml](https://github.com/LaravelCollective/html) version 5.5 (Laravel's Tools for use Form)
- [InterventionImage](https://github.com/Intervention/image) (PHP tools for manipulate image)
- [UiKit](https://github.com/uikit/uikit) version 3.0.0-beta.42 (Framework CSS)
- [Jquery](https://github.com/jquery/jquery) version 2.1.4 (Javascript Tools with AJAX)

Ps: See **composer.json** file for many informations or update your need.



### Demo

You can find a [Demo](http://51.254.119.126:8080/) for LaravelReadyToUse.



### Services

We have already create many services and Web pages. This included:
- Language service (English and French)
- Mail service (Contact, Lost password and Template)
- API (all Web Pages and services)
- Many checks (Forms, Javascript is active ?, page Error)
- Admin user (for contact and manage options, update blog)

And included many Classes:
- Classe Reply (for return a result API or Web)
- Classe Record (for save many Log)
- Classe SendMail (an easy way for send an email)
- Classe Tools (check external link or create your personal tools)
- Classe ViewElement (return the texts of the application, useful for and Android or IOS application)

And included pages:
- Home example (with dynamic intro, informations, questions and legal informations)
- Contact example
- Login example (with modal and full page for connected your user or crate a new)
- User example (when user is connected)
- User's settings example (when user is connected)
- Blog example (with author, date, title, message, image and/or Youtube video)

And web app included :
- Responsive Design
- Multilingual system
- Navbar (template CSS with Laravel Blade and Uikit)
- Menu (template CSS with Laravel Blade and Uikit)
- Icon (Uikit)
- Logo and Favicon (MIT)
- Avatar



### You need

This application need PHP 7 or more for working (Laravel work also with [Composer](https://github.com/composer/composer)). You can used a server MySql, a serveur Mail and a server NGNIX or Apache.



### Install

1/ Clone the project, install dependence, add vital files and update right:
```bash
git clone https://github.com/newrare/laravelReadyToUse.git <yourProject>

cd <yourProject>

composer update

cp .env.example .env
php artisan key:generate

mkdir public/image/cover
touch storage/logs/laravel.log
sudo chown -R www-data storage bootstrap/cache public/image/cover
sudo chmod -R ug+rwx storage bootstrap/cache public/image/cover
```

2/ Create tables user and blog in Database:
```bash
php artisan migrate --path=database/migrations/user/
php artisan migrate --path=database/migrations/blog/
```

3/ Set your personal config (Domain, url, name, MySql, Mail, Google API, etc)
```bash
vim .env
```

### Test and command

Test LaravelReadyToUse and create your first user. Go to your URL (your domain name or IP) and clik on button *Create an account*.

In console, you can set an user to admin app with this command line:
```bash
php artisan action:setUser
```



### Map

The principals files and folders:
- .gitignore (file exception)
- .env (config)

Config:
- config/app.php (Laravel aliases, drivers and providers)
- routes/web.php (Routes Web and API)

Back:
- app/Console/Commands (command line used by artisan)
- app/Http/Controllers/* (Controllers)
- app/Http/Classes/* (Classes)
- app/Http/Models/* (Database Model)
- app/Http/Middleware/* (Middleware)

Front:
- resources/views/* (view and template)
- resources/views/template.blade.php (principal web template)
- resources/views/email/* (template mail)
- resources/lang (texts for view)

Lib public:
- public/js/* (Javascript files)
- public/css/* (CSS and Uikit files)

Media public:
- public/favicon.ico (icon for IE)
- public/favicon.png (icon for other browser)
- public/image/* (all images)
- public/image/72.png (logo 72px)
- public/image/cover/* (users's avatars)



### Language

Edit or add file to **<yourProject>/resources/lang/***
Add a new language in array **allLang** to **<yourProject>/app/Http/Controllers/LangController.php**



### API

All pages and functions of the web application also works in API (return JSON). You can build an Android or IOS app in parallel. LaravelReadyToUse becomes the logical engine.

|Method |Entry Point                                        |Information                                                                            |
|-------|---------------------------------------------------|---------------------------------------------------------------------------------------|
|GET    |http://www.yourDomainName.tld/                     |show home's page                                                                       |
|GET    |http://www.yourDomainName.tld/lang/en/edit         |set session app to English                                                             |
|GET    |http://www.yourDomainName.tld/lang/fr/edit         |set session app to French                                                              |
|GET    |http://www.yourDomainName.tld/view                 |show view's page: list of views                                                        |
|GET    |http://www.yourDomainName.tld/view/home            |show element of viewName: here home                                                    |
|GET    |http://www.yourDomainName.tld/connection           |show connection's page                                                                 |
|POST   |http://www.yourDomainName.tld/connection           |log in user [login, pass]                                                              |
|GET    |http://www.yourDomainName.tld/connection/off/edit  |set session for logout user                                                            |
|GET    |http://www.yourDomainName.tld/account              |show account's page (session on: show options | session off: show create user)         |
|POST   |http://www.yourDomainName.tld/account              |create a new user [login, pass, email]                                                 |
|GET    |http://www.yourDomainName.tld/account/email/edit   |send a new mail validation                                                             |
|PUT    |http://www.yourDomainName.tld/account/1            |update user's setting: here for idUser=1 [userEmail, userPass, userUrlAvatar, userLang]|

Example with a curl command:
```bash
curl -H "Content-Type: application/json" http://www.yourDomainName.tld/contact
```
Return that:
```bash
{
 "lang"         : "en",
 "codeState"    : 200,
 "message"      : "Done",
 "viewName"     : "contact",
 "viewElement"  : {
    "titlePage"         : "Contact",
    "titleMessage"      : "Send us your message, we will reply quickly",
    "subContact"        : "Contact",
    "textContactMail"   : "Your Email",
    "textContactSub"    : "Subject",
    "textContactMess"   : "Message",
    "buttonSend"        : "Send"
 },
 "reply"        : {
    "mailValue"         : ""
 }
}
```

Ps: see all call in file **routes/web.php**

**SECURITY**: For test and developement, we have add a exception in file **laravelReadyToUse/app/Http/Middleware/VerifyCsrfToken.php**. Remove this exception for the PROD and add a system token in your real project.



### ViewElement

Why we created the ViewElements Classe ?

This Classe is not necessary if you used only a Web application: in this case, bypass ViewElement. But if we need API, used this Classe for return your texts. So, you can create an APP Android or IOS without texts, used just many API calls for get your all contents.

For add or update page with this method, edit **<yourProject>/app/Http/Classes/ViewElement.php**.



### Design (CSS and Less)

Uikit is already install with a custom template. You can update it easly with other css config or less method.



### Security Vulnerabilities

If you discover a security vulnerability within LaravelReadyToUse, please send an e-mail to Julien Bianchin at newrare@hotmail.com. All security vulnerabilities will be promptly addressed.



### License

The LaravelReadyToUse framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
