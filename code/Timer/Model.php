<?php

namespace Timer;
use \Exception;

class Model extends \Base\Model
{
	public function __construct()
	{
		\Base\Model::__construct();
	}

	public function create()
	{
		$timer = $this->db->object('timer');
		$timer->Name = $app->request()->post('Name');
		$timer->StartTime = $app->request()->post('StartTime');
		return $this->save($timer);
	}

}
