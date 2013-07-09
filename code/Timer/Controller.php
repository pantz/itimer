<?php

namespace Timer;

class Controller extends \Base\Controller
{

	public function __construct()
	{
		$model = new Model();
		$this->_model = $model;
	}

	public function findByName($query)
	{

	}
}
