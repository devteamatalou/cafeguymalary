<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\EmpDao;
 $empDao = new EmpDao();
 $response = [];


	if ($_POST)
	{
		extract($_POST);
		$fname = htmlspecialchars($fname);
		$lname = htmlspecialchars($lname);
		$gender = str_replace(' ', '', htmlspecialchars($gender));
		$barcode = str_replace(' ', '', htmlspecialchars($barcode));

		if($addemp = $empDao->addEmp($fname, $lname, $gender, $barcode))
			$response = ['status' => true, 'message' => 'Employee added successfully'];
		else
			$response = ['status' => false, 'message' => 'Failed to add new employee'];
	}

	echo json_encode($response);
?>