# Laravel Spark SSO
--------------------

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
/**
 * Package Service Providers...
 */
Jonnx\LaravelSparkSSO\LaravelSparkSSOServiceProvider::class,
Laravel\Socialite\SocialiteServiceProvider::class,
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