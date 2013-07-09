<?php

namespace Base;
use \Exception;
use \Database;

class Model
{
	public function __construct()
	{
		$db = new Database();
		$this->db = $db;
	}

	public function save($model)
	{
		$result = $this->db->save($model);
		return $result;
	}

	public function all()
	{
		$result = $this->db->all();
		return $result;
	}
}
