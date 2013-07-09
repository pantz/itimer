<?php

require 'vendor/autoload.php';
	
	$app = new \Slim\Slim(array(
		'mode'=>'development',
		'templates.path' => 'templates'
	));
	
	new \Timer\Routes($app);

	$app->get('/', function () use ($app) {
		$app->render('home.mustache');
	});

	$app->run();

?>
