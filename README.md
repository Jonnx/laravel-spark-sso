# Laravel Spark SSO

This package manges the OAuth handshake with Google so people can join
you Laravel Spark based project even faster. Teams can configure their SSO domain
so if they use GMail for their business, every new signup from that company
will be added to the team automatically. This is a great way to reduce onboarding
hurdles and eliminates the need for people to remember another password.

Once installed and configured, users will be able to join and login by going to the following url:
```https://www.your-awesome-project.com/login/sso/google```

## Getting Started

### Install the package

This will install the package and its dependencies which includes the ```laravel/socialite``` 
library to hanle the OAuth handshake with a number of providers.

```
composer require jonnx/laravel-spark-sso
```

### Register Package ServiceProviders

To achieve this, update your ```config/app.php``` file by adding the following lines

```
'providers' => [
    ...
    
    /**
     * Package Service Providers...
     */
    Jonnx\LaravelSparkSSO\LaravelSparkSSOServiceProvider::class,
    Laravel\Socialite\SocialiteServiceProvider::class,
    
    ...
]

```

also add the following aliases

```
'aliases' => [
    ...
    'Socialite' => Laravel\Socialite\Facades\Socialite::class,
]
```

### Update configuration

In order for Google to perform the handshake, you need a client and secret
from their developer console. Once you have those keys, add the following lines 
to the ```config/services.php``` file:

```
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('APP_URL') . '/login/sso/google/callback',
],
```

### Add SSO Settings Link for Your Team Owners

Your team owners will be able to edit their SSO setting independently at
```https://www.your-domain.com/settings/teams/{id}/sso``` for them to get to
that url you should add the link to your project where they can find it.
I recommend adding a link to the existing membership page in the Laravel Spark
settings or adding it to the existing drop down menu in the ```user.blade.php```

In a future release I would like to be able to automatically inject this link
but for now it is up to the developer to do so.

### Customizing the SSO Settings Screen

There is a view file that the owners of your teams can use to confiure their SSO email domain. 
If you want to change this template, simply publish the vendor files and edit the file in ```views/vendor/laravel-spark-sso```.

```
php artisan vendor:publish
```
