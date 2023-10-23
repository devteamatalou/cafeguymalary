<?php

namespace src\config;

use PDO;

class Database
{
	private  $SERVERNAME = 'localhost';
	private  $USERNAME = 'root';
	private  $PASSWORD = '';
	protected  $conn = null;

	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->SERVERNAME;dbname=airport_cafe", $this->USERNAME, $this->PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			die('Erreur => ' . $e);
		}
	}

	public function getConn()
	{
		return $this->conn;
	}
}