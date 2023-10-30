<?php
 require "../../../vendor/autoload.php";

 use src\dao\CheckinDao;
 $checkinDao = new CheckinDao();

	date_default_timezone_set("America/Port-Au-Prince");
	$cur_date = date("l, d M Y");
	$cur_time = date('h:i:s a');
	$resto = 'GUY MALARY';

 $audiopath = '';

	if ($_POST)
	{
		extract($_POST);
		$barcode = str_replace(' ', '', htmlspecialchars($barcode));
		

		if($checkinDao->checkUserExits($barcode))
		{
			// $exists_response = $checkinDao->checkUserExits($barcode);
			// while($isexists = $exists_response->fetch(PDO::FETCH_OBJ))
			// {
				$id_emp = $checkinDao->employeeInfo($barcode)->id;
				$fname = $checkinDao->employeeInfo($barcode)->prenom;
				$lname = $checkinDao->employeeInfo($barcode)->nom;
				$lname = strtoupper($lname);

				if($checkinDao->checkAlreadyEat($id_emp, $cur_date))
				{
					echo "<h3 class='person-name'>$fname <span>$lname</span></h3>";
					$audiopath = 'http://localhost/cafeguymalary/public/assets/audio/access_denied.mp3';
				}
				else
				{
					if($checkinDao->addEat($id_emp, $cur_time, $resto, $cur_date))
					{
						echo "<h3 class='person-name'>$fname <span>$lname</span></h3>";
						$audiopath = 'http://localhost/cafeguymalary/public/assets/audio/access_granted.mp3';
					}
				}
			// }
		}
		else
			$audiopath = 'http://localhost/cafeguymalary/public/assets/audio/employeenotfound.mp3';

	}

	// those 4 lines allow you to send either the echo message either the audiopath to the ajax response
	$result = [
		'html' => ob_get_clean(), // Capture the echoed HTML
		'audiopath' => $audiopath,
	];

	header('Content-Type: application/json');
	echo json_encode($result);
?>