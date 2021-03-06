<?php
//Example for Oauth_Consumer
//Buck Heroux

//request token step
$consumer = new Oauth_Consumer(CONSUMER_KEY, CONSUMER_SECRET);
$url = $consumer->getSignedAuthURL(REQUEST_URL, AUTHORIZATION_URL, CALLBACK_URL);
header('Location: '.$url);
exit;

//on callback
$consumer = new Oauth_Consumer(CONSUMER_KEY, CONSUMER_SECRET);
$consumer->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier'], ACCESS_URL);
$response = $consumer->signRequest('http://timecube.com/some_protected_method');

//or if you already have the access token/secret saved
$consumer = new Oauth_Consumer(CONSUMER_KEY, CONSUMER_SECRET);
$consumer->setAccessToken(ACCESS_TOKEN, ACCESS_SECRET);
$response = $consumer->signRequest('http://timecube.com/some_protected_method');

?>
