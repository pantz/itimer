<?php

class Database 
{
	protected $db;

	public function __construct()
	{
		$this->db = new R();
		$this->db->setup('mysql:host=localhost;dbname=app','root','');
	}

	public function object($name)
	{
		return $this->db->dispense($name);
	}

	public function save($model)
	{
		return $this->db->store($model);
	}

	public function all()
	{
		return $this->db->find('timer');
	}
}
