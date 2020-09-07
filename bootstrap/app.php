<?php

use Cart\App;
use Slim\Views\Twig;
use Braintree\Configuration as BTConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__  . '/../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cart',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


BTConfig::environment('sandbox');
BTConfig::merchantId('995qhrp5sphbh5sr');
BTConfig::publicKey('vw8jdpvz3myzf7yb');
BTConfig::privateKey('602a7966a0dd96ca4b3e866c41159b27');

require __DIR__ . '/../app/routes.php';

$app->add(new \Cart\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));
$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));