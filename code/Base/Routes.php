<?php

namespace Base;

class Routes
{
	public function __construct($app)
	{
		$app->options('/:any', function(){});
		$app->options('/:any/:id', function(){});
		$app->options('/:any/:id/:subid', function(){});
	}
}
