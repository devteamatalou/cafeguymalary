<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\UserDao;
 $userDao = new UserDao();
 $response = [];

	if ($_POST)
	{
		extract($_POST);
		$id = htmlspecialchars($eid);
		$fname = htmlspecialchars($efname);
		$lname = htmlspecialchars($elname);
		$username = str_replace(' ', '', htmlspecialchars($euname));

		if($userDao->editUser($fname, $lname, $username, $id))
			$response = ['status' => true, 'message' => 'User edited successfully'];
		else
			$response = ['status' => false, 'message' => 'Error while editing user'];
	}

	echo json_encode($response);
?>