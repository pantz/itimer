<?php

namespace Timer;
use \Exception;
use \Database;

class Routes extends \Base\Routes
{
	public function __construct($app)
	{
		$controller = new Controller();

		$app->get('/timer/all', function() use ($controller, $app) {
			$controller->all($app);
		});
		
		$app->get('/timer/:id', function($id) use ($controller, $app) {
			$controller->get($app);
		});

		$app->get('/timer/search/:query', function($query) use ($controller, $app) {
			$controller->findByName($app);
		});

		$app->post('/timer', function() use ($controller, $app) {
			$controller->create($app);
		});

		$app->put('/timer/:id', function($id) use ($controller, $app) {
			$controller->update($app);
		});

		$app->delete('/timer/:id', function($id) use ($controller, $app) {
			$controller->delete($app);
		});
	}
}
