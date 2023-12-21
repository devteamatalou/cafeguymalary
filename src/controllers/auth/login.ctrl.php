<?php
 session_start();
 
 require "../../../vendor/autoload.php";

 use src\dao\AuthDao;
 $log = new AuthDao();

 $response = [];

	if ($_POST)
	{

		extract($_POST);
		$authUname = str_replace(' ', '', htmlspecialchars($authuname));
		$authPass = htmlspecialchars($authpass);

		if ($log->isExists($authUname) && $log->validPassword($authUname, $authPass))
		{
			$_SESSION['admin_aan'] = array(
				'id' => $log->userInfo($authUname)->id,
				'id_role' => $log->userInfo($authUname)->id_role,
				'username' => $log->userInfo($authUname)->username,
				'firstname' => $log->userInfo($authUname)->prenom,
				'lastname' => $log->userInfo($authUname)->nom
			);
			
			$response = ['status' => true, 'message' => 'Connected'];
		}
		else
			$response = ['status' => false, 'message' => 'Username or Password not valid'];
	}

	echo json_encode($response);
?>
