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

		function addEmp($fname, $lname, $gender, $barcode, $created_at)
		{
			$addemp_qry = $this->Auth->prepare("INSERT INTO `employee` (`prenom`, `nom`, `sexe`, `barcode`, `created_at`) VALUES (:prenom, :nom, :sexe, :barcode, :created_at)");
			$addemp_qry->execute([':prenom' => $fname, ':nom' => $lname, ':sexe' => $gender, ':barcode' => $barcode, ':created_at' => $created_at]);

			if($addemp_qry->rowCount() > 0)
			 return true;
		}
	}
?>