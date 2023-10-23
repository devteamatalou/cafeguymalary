<?php
	namespace src\dao;
	use src\config\Instance;
	use PDO;


	class AuthDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function isExists($authUname)
		{
			$isexists_qry = $this->Auth->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
			$isexists_qry->execute([':username' => $authUname]);

			while ($authRow = $isexists_qry->fetch()) {
				if ($authRow['username'] == $authUname)
					return true;
			}
		}

		function validPassword($authUname, $authPass)
		{
			$validpass_qry = $this->Auth->prepare("SELECT `password` FROM `users` WHERE `username` = :username");
			$validpass_qry->execute([':username' => $authUname]);

			while ($authRow = $validpass_qry->fetch()) {
				if (password_verify($authPass, $authRow['password'])) {
					return true;
				}
			}
		}

		function userInfo($authUname)
		{
			$info_qry = $this->Auth->prepare("SELECT * FROM `users` WHERE `username` = :username LIMIT 1");
			$info_qry->execute(['username' => $authUname]);
			$info_rows = $info_qry->fetch(PDO::FETCH_OBJ);

			return $info_rows;
		}
	}
?>