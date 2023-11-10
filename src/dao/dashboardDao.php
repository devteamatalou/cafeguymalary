<?php
	namespace src\dao;

	use PDO;
	use src\config\Instance;


	class DashboardDao
	{
		private $Auth;

		function __construct()
		{
			if ($this->Auth == null)
				$this->Auth = Instance::getDB();
		}

		function countUsers()
		{
			$countusers_qry = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `users` WHERE `_delete` = :isdelete");
			$countusers_qry->execute([':isdelete' => 0]);

			$totalusers = $countusers_qry->fetch(PDO::FETCH_OBJ);

			return $totalusers;
		}

		function countEmps()
		{
			$emps_qry = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `employee` WHERE `_delete` = :isdelete");
			$emps_qry->execute([':isdelete' => 0]);

			$totalemps = $emps_qry->fetch(PDO::FETCH_OBJ);

			return $totalemps;
		}

		function countDelEmps()
		{
			$delemps_qry = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `employee` WHERE `_delete` = :isdelete");
			$delemps_qry->execute([':isdelete' => 1]);

			$total_delemps = $delemps_qry->fetch(PDO::FETCH_OBJ);

			return $total_delemps;
		}

		function countFeed($cur_date, $resto)
		{
			$cur_date = '%'.$cur_date.'%';
			$countfeed = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `verify` WHERE `date_created` LIKE :cur_date AND `resto` = :resto ");
			$countfeed->execute([':cur_date' => $cur_date, ':resto' => $resto]);

			$totalfeed = $countfeed->fetch(PDO::FETCH_OBJ);
			return $totalfeed;
		}
	}
?>