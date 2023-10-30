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
			$countusers_qry = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `users`");
			$countusers_qry->execute();

			$totalusers = $countusers_qry->fetch(PDO::FETCH_OBJ);

			return $totalusers;
		}

		function countEmps()
		{
			$emps_qry = $this->Auth->prepare("SELECT COUNT(*) AS total FROM `employee`");
			$emps_qry->execute();

			$totalemps = $emps_qry->fetch(PDO::FETCH_OBJ);

			return $totalemps;
		}

		function countFeed($cur_date, $resto)
		{
			$cur_date = '%'.$cur_date.'%';
			$countfeed = $this->Auth->prepare("SELECT COUNT(*) AS total FROm `verify` WHERE `date_created` LIKE :cur_date AND `resto` = :resto ");
			$countfeed->execute([':cur_date' => $cur_date, ':resto' => $resto]);

			$totalfeed = $countfeed->fetch(PDO::FETCH_OBJ);
			return $totalfeed;
		}
	}
?>