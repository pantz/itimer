<?php

if(!file_exists('config.php'))
	require('config.default.php');
else
	require('config.php');

//Set timezone based on browser later
date_default_timezone_set('UTC');

define('BASEPATH', dirname(__FILE__).'/');

//Sessions are used for notifications only at this point
session_cache_limiter(false);
session_start();

require 'vendor/autoload.php';

//Setup redbean
R::setup(DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);

//Setup uploader
Uploader\Uploader::setup(array('basepath'=>BASEPATH));
	
//Slim setup
$app = new \Slim\Slim(array(
	'mode'=>MODE,
	'templates.path' => 'templates'
));

	//Routes
	$app->get('/', function () use ($app) {
		$app->render('header.php');
		$app->render('home.php');
		$app->render('footer.php');
	});

	$app->get('/timers', function () use ($app) {
		$timers = R::findAll('timer', ' ORDER BY `id` DESC');
		$app->render('header.php');
		$app->render('timers.php', array('timers'=>$timers));
		$app->render('footer.php');
	});

	$app->get('/view/:id', function ($id) use ($app) {
		$timer = R::load('timer', $id);
		if(!$timer->id){
			throw new Exception('TimerNotFoundException');
		}
		$app->render('header.php');
		$app->render('view.php', array('timer'=>$timer));
		$app->render('footer.php');
	});

	$app->get('/create', function () use ($app) {
		$app->render('header.php');
		$app->render('create.php');
		$app->render('footer.php');
	});

	$app->post('/create', function () use ($app) {
		$timer = R::dispense('timer');
		$timer->Text = $app->request()->post('Text');
		$timer->EndDate = strtotime($app->request()->post('EndDate').$app->request()->post('EndTime'));
		$timer->UserIp = $app->request()->getIp();

		$id = R::store($timer);

		if(isset($_FILES['Background']))
		{
			$file = new \Uploader\Uploader();
			$result = $file->upload('Background');

			//Save any files that were uploaded
			$timer->Background = $result;
			R::store($timer);
		}

		//Redirect to view page
		$app->flash('success', 'Timer <strong>'.$app->request()->post('Text').'</strong> created!');
		$app->redirect(BASE_URL.'view/'.$id);
	});

//Load the app
$app->run();

?>
