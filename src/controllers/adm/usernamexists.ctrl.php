<?php
 require "../../../vendor/autoload.php";

 use src\dao\UserDao;
 $userDao = new UserDao();

	if ($_POST)
	{
		extract($_POST);
		$uname = htmlspecialchars($uname);

		if($userDao->checkUsernameExists($uname))
			echo '1';
		else
		 echo '0';
	}

?>