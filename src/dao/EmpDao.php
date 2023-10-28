<?php
	namespace src\dao;
	use src\config\Instance;


	class EmpDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function selectAllEmps()
		{
			$allemps_qry = $this->Auth->prepare("SELECT `nom`, `prenom`, `sexe`, `barcode`, `created_at` FROM `employee`");
			$allemps_qry->execute();

			return $allemps_qry;
		}

		// function addEmp($id_role, $firstname, $lastname, $username, $auth)
		// {
		// 	$adduser_qry = $this->Auth->prepare("INSERT INTO `users` (`id_role`, `prenom`, `nom`, `username`, `password`) VALUES (:id_role, :firstname, :lastname, :username, :auth)");
		// 	$adduser_qry->execute([':id_role' => $id_role, ':firstname' => $firstname, ':lastname' => $lastname, ':username' => $username, ':auth' => $auth]);
		// 	if($adduser_qry->rowCount() > 0)
		// 	 return true;
		// 	else
		// 	 return false;
		// }
	}
?>