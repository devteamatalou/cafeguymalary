<?php
	namespace src\dao;
	use src\config\Instance;


	class GlobalrepDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function globalRep($resto)
		{
			$globalrep_qry = $this->Auth->prepare("SELECT e.prenom, e.nom, e.barcode, v.id, v.time, v.resto, v.date_created FROM `employee` e JOIN `verify` v ON e.id = v.id_emp WHERE `resto` = :resto ");
			$globalrep_qry->execute([':resto' => $resto]);

			if($globalrep_qry) return $globalrep_qry;
		}
	}
?>