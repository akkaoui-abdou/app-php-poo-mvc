## Make a PHP Router


### in the first time install Composer in your machine

### install package fast-route 

https://packagist.org/packages/nikic/fast-route

        composer require nikic/fast-route


### install twig package

        composer require "twig/twig:^3.0"

### Fix error Route Not Found

by adding file .htaccess


## You have to add autoload in composer.json

        "autoload": {
                "psr-4": {
                         "App\\": "src/"
                }
        },

Source fix probleme route not found: https://stackoverflow.com/questions/56961390/class-not-found-with-composer-psr4

Links :

https://www.youtube.com/watch?v=ExCBgYMN5U0

https://github.com/nikic/FastRoute

https://gitlab.unistra.fr/delmibouras/projetweb/-/tree/master/WEB/vendor/nikic/fast-route


## How to use variable Env with file .env
links : https://packagist.org/packages/vlucas/phpdotenv

        $ composer require vlucas/phpdotenv

## You can then load .env in your application with:

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

## file .env content

    APP_ENV=dev
    DATABASE_NAME=gescom_db
    DATABASE_HOST=localhost
    DATABASE_USERNAME=root
    DATABASE_PASSWORD=

## All of the defined variables are now available in the $_ENV and $_SERVER super-globals.

$db_name = $_ENV['DATABASE_NAME'];
$app_env = $_SERVER['APP_ENV'];


## other topics - https://dev.to/

### Top 6 PHP code quality tools 2023
links: https://dev.to/documatic/top-6-php-code-quality-tools-2023-2kb1

### Exploring Async PHP
https://dev.to/jackmarchant/exploring-async-php-5b68
