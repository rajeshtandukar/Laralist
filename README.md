# LaraList

Laralist is a classified web application written in Laravale Framework.

## Features
* Front-end/Back-end Ad(Item) Post
* Back-end Ad Mangement
* n-Level Cateories
* Mail Templtaes
* Backend User Managment
* Admin Controled Settings
* Ad Serch

## Installation
Run the folowing commands from the Terminal:
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
Finally, add following class aliases to the aliases array of config/app.php
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
```

# Back-end ScreenSort
  ![Image of Admin Dashboard]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/admin-dashborad.png)

  ![Image of Admin Item List]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/itemlist.png)

  ![Image of Admin Categories]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/categories.png)

  ![Image of Admin Countires]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/countires.png)

  ![Image of Admin Mail Templates]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/mailtemplates.png)

  ![Image of Admin Settings]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/settings.png)

# Front-end ScreenSort
  ![Image of Homepage]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/homepage.png)

  ![Image of Ad]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/ad.png)

  ![Image of Ad List]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/Items.png)

  ![Image of My Ads]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/myitems.png)

  ![Image of Ad Post]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/post.png)

  ![Image of Ad Seach]
  (https://github.com/rajeshtandukar/Laralist/blob/master/images/seach.png)
