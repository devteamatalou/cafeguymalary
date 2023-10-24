<?php
	namespace src\dao;
	use src\config\Instance;


	class UserDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function selectAllUsers()
		{
			$allusers_qry = $this->Auth->prepare("SELECT * FROM `users`");
			$allusers_qry->execute();

			return $allusers_qry;
		}

		function addUser($id_role, $firstname, $lastname, $username, $auth)
		{
			$adduser_qry = $this->Auth->prepare("INSERT INTO `users` (`id_role`, `prenom`, `nom`, `username`, `password`) VALUES (:id_role, :firstname, :lastname, :username, :auth)");
			$adduser_qry->execute([':id_role' => $id_role, ':firstname' => $firstname, ':lastname' => $lastname, ':username' => $username, ':auth' => $auth]);
			if($adduser_qry->rowCount() > 0)
			 return true;
			else
			 return false;
		}

		function selectAllRoles()
		{
			$allroles_qry = $this->Auth->prepare("SELECT * FROM `role`");
			$allroles_qry->execute();

			return $allroles_qry;
		}


		/*function updatePassword($auth, $no_manager)
		{
			$updatepass_qry = $this->Auth->prepare("UPDATE `manager` SET `auth` = :auth WHERE `no_manager` = :no_manager");
			$updatepass_qry->execute([':auth' => $auth, ':no_manager' => $no_manager]);

			if($updatepass_qry->rowCount() > 0)
			return true;
			else
			 return false;
		}*/
	}
?>