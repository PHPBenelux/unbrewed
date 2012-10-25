<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;

$app->get('/api/coffees', function() use ($app) {
    return new JsonResponse(json_encode(array(
        1 => array(
            'id' => 1,
            'name' => 'Douwe Egberts',
            'location' => 'Netherlands',
            'roast' => 'medium',
            'granularity' => 'fine',
            'rating' => 5
        ),
        2 => array(
            'id' => 2,
            'name' => 'Something else',
            'location' => 'Spain',
            'roast' => 'dark',
            'granularity' => 'fine',
            'rating' => 4
        ),
    )));
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
