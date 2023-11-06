<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\EmpDao;
 $empDao = new EmpDao();
 $response = [];

	if ($_POST)
	{
		extract($_POST);
		$id = htmlspecialchars($eid);
		$fname = htmlspecialchars($efname);
		$lname = htmlspecialchars($elname);
		$gender = str_replace(' ', '', htmlspecialchars($egender));

		if($empDao->editEmp($fname, $lname, $gender, $id))
			$response = ['status' => true, 'message' => 'Employee edited successfully'];
		else
			$response = ['status' => false, 'message' => 'Error while editing Employee'];
	}

	echo json_encode($response);
?>