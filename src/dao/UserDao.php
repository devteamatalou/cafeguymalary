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

		function selectAllUsers($connected_id)
		{
			$allusers_qry = $this->Auth->prepare("SELECT r.nom AS task, u.id, u.prenom, u.nom, u.username, u._delete FROM `role` r JOIN `users` u ON r.id = u.id_role WHERE u._delete = :isdelete AND u.id != :userid");
			$allusers_qry->execute([':isdelete' => 0, ':userid' => $connected_id]);

			return $allusers_qry;
		}

		function selectAllDelUsers()
		{
			$alldelusers_qry = $this->Auth->prepare("SELECT r.nom AS task, u.id, u.prenom, u.nom, u.username, u._delete FROM `role` r JOIN `users` u ON r.id = u.id_role WHERE u._delete = :isdelete");
			$alldelusers_qry->execute([':isdelete' => 1]);

			return $alldelusers_qry;
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


		function editUser($fname, $lname, $username, $id)
		{
			$edituser_qry = $this->Auth->prepare("UPDATE `users` SET `prenom`= :fname, `nom`= :lname, `username`= :username WHERE  `id` = :id");
			$edituser_qry->execute([':fname' => $fname, ':lname' => $lname, ':username' => $username, ':id' => $id]);

			if($edituser_qry->rowCount() > 0) return true;
		}

		function deleteUser($id)
		{
			$deluser_qry = $this->Auth->prepare("UPDATE `users` SET `_delete` = :del WHERE `id` = :id");
			$deluser_qry->execute([':del' => 1, ':id' => $id]);

			if($deluser_qry->rowCount() > 0 ) return true;
		}

		function restoreUser($id)
		{
			$restoruser_qry = $this->Auth->prepare("UPDATE `users` SET `_delete` = :del WHERE `id` = :id");
			$restoruser_qry->execute([':id' => $id, ':del' => 0]);

			if($restoruser_qry->rowCount() > 0 ) return true;
		}
	}
?>