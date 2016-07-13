# LaraList
======================================================================
Laralist is a classified web application written in Laravale Framework.

## Features
* Fontend/Backed Ad(Item) Post
* Backend Ad Mangement
* N Level Category
* Mail Templtaes
* Backend User Managment
* Admin Controled Settings Managment

## Installation
Run the command from the Terminal:
```
composer install
composert dump-autoload
```

Next, add the prviders below to the providers array of config/app.php
```
'providers' => [
// .....
Collective\Html\HtmlServiceProvider::class,
Laravel\Socialite\SocialiteServiceProvider::class,
Creativeorange\Gravatar\GravatarServiceProvider::class,
Proengsoft\JsValidation\JsValidationServiceProvider::class, 
Laralist\Listmeta\LaralistMetaServiceProvider::class, 
Laralist\Listconfig\ListConfigServiceProvider::class,
Laralist\Listcurl\ListCurlServiceProvider::class,
 ],  
```
Finally, add following class aliases to the aliases array of config/app.php:
```
'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
      'Gravatar'  => Creativeorange\Gravatar\Facades\Gravatar::class,
      'JsValidator' => Proengsoft\JsValidation\Facades\JsValidatorFacade::class,
      'Meta'      => Laralist\Listmeta\Facade::class, 
    // ...
  ],