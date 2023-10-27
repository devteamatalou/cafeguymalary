<?php
	namespace src\dao;
	use src\config\Instance;
	use PDO;


	class CheckinDao  
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function checkUserExits($barcode) // this method is checking if the user exists in the database
		{
			$userexits_qry = $this->Auth->prepare("SELECT `id` FROM `employee` WHERE `barcode` = :barcode LIMIT 1");
			$userexits_qry->execute([':barcode' => $barcode]);

			if($userexits_qry->rowCount() > 0) return true;
		}

		function employeeInfo($barcode)
		{
			$empinfo_qry = $this->Auth->prepare("SELECT `id`, `barcode`, `prenom`, `nom` FROM `employee` WHERE `barcode` = :barcode LIMIT 1");
			$empinfo_qry->execute([':barcode' => $barcode]);
			$empinfo = $empinfo_qry->fetch(PDO::FETCH_OBJ);

			return $empinfo;
		}

		function checkAlreadyEat($id_emp, $cur_date)
		{
			$ate_qry = $this->Auth->prepare("SELECT * FROM `verify` WHERE `date_created` = :cur_date AND `id_emp` = :id_emp LIMIT 1");
			$ate_qry->execute([':id_emp' => $id_emp, ':cur_date' => $cur_date]);

			if($ate_qry->rowCount() > 0)
			 return true;
			else
			 return false;
		}

		function addEat($id_emp, $tme, $resto, $date_created)
		{
			$addeat_qry = $this->Auth->prepare("INSERT INTO `verify` (`id_emp`, `time`, `resto`, `date_created`) VALUES (:id_emp, :tme, :resto, :date_created)");
			$addeat_qry->execute([':id_emp' => $id_emp, ':tme' => $tme, ':resto' => $resto, ':date_created' => $date_created]);
			if($addeat_qry->rowCount() > 0)
			 return true;
			else
			 return false;
		}
	}
?>