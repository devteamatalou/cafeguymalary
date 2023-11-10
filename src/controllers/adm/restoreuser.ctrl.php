<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\UserDao;
 $userDao = new UserDao();
 $response = [];

	if ($_POST)
	{
		extract($_POST);
		$id = htmlspecialchars($id);

		if($userDao->restoreUser($id))
			$response = ['status' => true, 'message' => 'Employee restored successfully'];
	}

	echo json_encode($response);
?>