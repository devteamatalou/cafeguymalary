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

		if($userDao->deleteUser($id))
			$response = ['status' => true, 'message' => 'User edited successfully'];
	}

	echo json_encode($response);
?>