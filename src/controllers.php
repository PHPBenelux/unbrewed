<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @var $app \Silex\Application */
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;

$app->get('/twitter', function () use ($app) {
    
    // let's create our access tokens
    
    $accessToken = $userName = $screenName = null;
    if ($app['session']->has('twitter_access_token')) {
        $accessToken = unserialize($app['session']->get('twitter_access_token'));;

        $twitter = new Zend_Service_Twitter(array ('accessToken' => $accessToken));
        $account = $twitter->accountVerifyCredentials();

        if (!$app['session']->has('twitter_user_name')) {
            $userName = (string) $account->name;
            $app['session']->set('twitter_user_name', $userName);
        } else {
            $userName = $app['session']->get('twitter_user_name');
        }

        if (!$app['session']->has('twitter_screen_name')) {
            $screenName = (string) $account->screen_name;
            $app['session']->set('twitter_screen_name', $screenName);
        } else {
            $screenName = $app['session']->get('twitter_screen_name');
        }
    }
    
    return $app['twig']->render('twitter.html', array(
        'accessToken' => $accessToken,
        'screenName' => $screenName,
        'userName' => $userName,
    ));
})
->bind('twitter')
;

$app->get('/auth', function () use ($app) {
    
    $twitterConfig = array (
        'callbackUrl'    => 'http://www.unbrewd.com/twitter',
        'siteUrl'        => 'http://twitter.com/oauth',
        'consumerKey'    => '', 
        'consumerSecret' => '',
    );

    $consumer = new Zend_Oauth_Consumer($twitterConfig);

    if (!empty ($_GET) && $app['session']->has('twitter_request_token')) {
        $accessToken = $consumer->getAccessToken(
            $_GET, unserialize($app['session']->get('twitter_request_token')));
        $app['session']->set('twitter_access_token', serialize($accessToken));
    } else {
        $requestToken = $consumer->getRequestToken();
        $app['session']->set('twitter_request_token', serialize($requestToken));
        $consumer->redirect();
    }
    return new RedirectResponse('/twitter');
})
->bind('twitter_auth')
;

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
