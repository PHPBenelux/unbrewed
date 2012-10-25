<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path'    => array(__DIR__.'/../templates'),
    'twig.options' => array('cache' => __DIR__.'/../cache'),
));
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
}));
$mongo = new Mongo('mongodb://127.11.221.129:27017/', array(
    'connect'  => true,
    'username' => 'admin',
    'password' => 'WSvyUln6D5Fu',
));;
$mongodb = new MongoDB($mongo, 'unbrewed');
$mongocollection = new MongoCollection($mongodb, 'unbrewd');
$app['mongo'] = $mongodb;

return $app;
