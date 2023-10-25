<?php
 session_start();
 require "../../../vendor/autoload.php";

 use src\dao\UserDao;
 $userDao = new UserDao();
 $response = [];

	if ($_POST)
	{
		extract($_POST);
		$id_role = htmlspecialchars($id_role);
		$fname = htmlspecialchars($fname);
		$lname = str_replace(' ', '', htmlspecialchars($lname));
		$username = str_replace(' ', '', htmlspecialchars($username));
		$auth = htmlspecialchars($default_pass);
		$pswd_hash = password_hash($default_pass, PASSWORD_DEFAULT);

		if($adduser = $userDao->addUser($id_role, $fname, $lname, $username, $pswd_hash))
			$response = ['status' => true, 'message' => 'User added successfully'];
		else
			$response = ['status' => false, 'message' => 'Failed to add new user'];
	}

	echo json_encode($response);
?>