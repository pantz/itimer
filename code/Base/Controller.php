<?php

namespace Base;

class Controller
{

	public function __construct()
	{
		
	}

	public function get($app)
	{
		var_dump($app->request()->post());
		$out = (object) null;
		echo json_encode($out);
	}

	public function all($app)
	{
		$out = $this->_model->all();
		var_dump($out);
	}

	public function create($app)
	{
		$request = $app->request();
		var_dump($request);
		$out = $this->_model->create();
		echo json_encode($out);
	}

	public function update($app)
	{
		$out = (object) null;
		$out->Id = $id;
		$out->Method = 'update';
		echo json_encode($out);
	}

	public function delete($app)
	{
		echo 'Display delete';
	}
}
