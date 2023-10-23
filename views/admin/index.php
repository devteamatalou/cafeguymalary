<?php
 session_start();

	if(empty($_SESSION['admin']))
	 header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>INDEX</title>
	</head>

	<body>
		<p>WELCOME</p>
	</body>

</html>