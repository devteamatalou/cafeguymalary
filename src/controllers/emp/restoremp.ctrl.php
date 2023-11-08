<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\EmpDao;
 $empDao = new EmpDao();
 $response = [];

	if ($_POST)
	{
		extract($_POST);
		$id = htmlspecialchars($id);

		if($empDao->restoreEmp($id))
			$response = ['status' => true, 'message' => 'Employee restored successfully'];
	}

	echo json_encode($response);
?>