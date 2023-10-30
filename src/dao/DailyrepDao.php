<?php
	namespace src\dao;
	use src\config\Instance;


	class DailyrepDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function dailyRep($cur_date, $resto)
		{
			$cur_date = '%'.$cur_date.'%';
			$dailyrep_qry = $this->Auth->prepare("SELECT e.prenom, e.nom, e.barcode, v.id, v.time, v.resto, v.date_created FROM `employee` e JOIN `verify` v ON e.id = v.id_emp WHERE `date_created` LIKE :cur_date AND `resto` = :resto ");
			$dailyrep_qry->execute([':cur_date' => $cur_date, ':resto' => $resto]);

			if($dailyrep_qry) return $dailyrep_qry;
		}
	}
?>