<?php

namespace src\config;

use src\config\Database;
use PDO;

class Instance
{
	public static  $dbValue = null;

	private function __construct()
	{
	}

	public static function getDB()
	{
		if (static::$dbValue == null) {
			static::$dbValue = new Database();
		}
		return  static::$dbValue->getConn();
	}
}