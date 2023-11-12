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
			$allemps_qry = $this->Auth->prepare("SELECT * FROM `employee` WHERE `_delete` = :isdelete");
			$allemps_qry->execute([':isdelete' => 0]);

			return $allemps_qry;
		}

		function selectAllDelEmps()
		{
			$allemps_qry = $this->Auth->prepare("SELECT * FROM `employee` WHERE `_delete` = :isdelete");
			$allemps_qry->execute([':isdelete' => 1]);

			return $allemps_qry;
		}

		function addEmp($fname, $lname, $gender, $barcode)
		{
			$addemp_qry = $this->Auth->prepare("INSERT INTO `employee` (`prenom`, `nom`, `sexe`, `barcode`) VALUES (:prenom, :nom, :sexe, :barcode)");
			$addemp_qry->execute([':prenom' => $fname, ':nom' => $lname, ':sexe' => $gender, ':barcode' => $barcode]);

			if($addemp_qry->rowCount() > 0)
			 return true;
		}

		function editEmp($fname, $lname, $gender, $id)
		{
			$editemp_qry = $this->Auth->prepare("UPDATE `employee` SET `prenom`= :fname, `nom`= :lname, `sexe`= :username WHERE `id` = :id");
			$editemp_qry->execute([':fname' => $fname, ':lname' => $lname, ':username' => $gender, ':id' => $id]);

			if($editemp_qry->rowCount() > 0) return true;
		}
		
		function deleteEmp($id)
		{
			$delemp_qry = $this->Auth->prepare("UPDATE `employee` SET `_delete` = :del WHERE `id` = :id");
			$delemp_qry->execute([':id' => $id, ':del' => 1]);

			if($delemp_qry->rowCount() > 0 ) return true;
		}

		function restoreEmp($id)
		{
			$delemp_qry = $this->Auth->prepare("UPDATE `employee` SET `_delete` = :del WHERE `id` = :id");
			$delemp_qry->execute([':id' => $id, ':del' => 0]);

			if($delemp_qry->rowCount() > 0 ) return true;
		}
	}
?>