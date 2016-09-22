<?php

require_once __DIR__.'/../vendor/autoload.php';

use JDesrosiers\Silex\Provider\CorsServiceProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['environment'] = getenv('APPLICATION_ENV') ?: 'production';
$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__."/../config/".$app['environment'].".json"));
$app->register(new CorsServiceProvider(), array(
    "cors.allowOrigin" => $app['envDomain'],
));

$app->after($app["cors"]);

// Routes
$app->get('/', 'Vanilla\\Controller\\IndexController::load');

// Errors 
$app->error(function (\Exception $e, $code) use ($app) {
    // Redirect if 404
    if ($code == 404) {
        return $app->redirect('/login');    
    }
});

$app->run();
