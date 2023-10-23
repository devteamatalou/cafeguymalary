<?php
 include "database.php";

	if(isset($_POST['cod']))
	{
		$code = $_POST['cod'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$role = $_POST['role'];
		$dept = $_POST['dept'];

		$qry = $db->prepare("INSERT INTO `users` (`code`, `fname`, `lname`, `post`, `dept_id`) VALUES (:code, :fname, :lname, :post, (SELECT `id` FROM `departments` WHERE TRIM(`dept_name`) = TRIM(:dept)))");
		$qry->execute(array(':code' => $code, ':fname' => $fname, ':lname' => $lname, ":post" => $role, ":dept" => $dept));

		if($qry->rowCount() > 0)
		{
			echo
			" 
				<br><br><br>
				<h2 style='color: green; text-align: center;'>User Added Successfully</h2>
			";
		}
		else
		{
			echo
			" 
				<br><br><br>
				<h2 style='color: red; text-align: center;'>User did not added, if the problem persists, please contact our customer service</h2>
			";
		}
	}
?>