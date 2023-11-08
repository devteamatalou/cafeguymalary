<?php

namespace src\config;

use PDO;

class Database
{
	private  $SERVERNAME = 'db5007325984.hosting-data.io';
	private  $USERNAME = 'dbu3335240';
	private  $PASSWORD = '@AanCafe@@2023@@';
	protected  $conn = null;

	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->SERVERNAME;dbname=dbs6036076", $this->USERNAME, $this->PASSWORD);
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