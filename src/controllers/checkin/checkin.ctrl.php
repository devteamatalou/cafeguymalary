<?php
 ob_start();
	
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
				$id_emp = $checkinDao->employeeInfo($barcode)->id;
				$fname = $checkinDao->employeeInfo($barcode)->prenom;
				$lname = $checkinDao->employeeInfo($barcode)->nom;
				$lname = strtoupper($lname);

				if($checkinDao->checkAlreadyEat($id_emp, $cur_date))
				{
					echo "<strong class='checkin-denied-name'>$fname <span>$lname</span></strong>";
					$audiopath = 'http://cafeguymalary.atalou.org/public/assets/audio/access_denied.mp3';
				}
				else
				{
					if($checkinDao->addEat($id_emp, $cur_time, $resto, $cur_date))
					{
						echo "<strong class='checkin-granted-name'>$fname <span>$lname</span></strong>";
						$audiopath = 'http://cafeguymalary.atalou.org/public/assets/audio/access_granted.mp3';
					}
				}
		}
		else
			$audiopath = 'http://cafeguymalary.atalou.org/public/assets/audio/employeenotfound.mp3';

	}

	// those 4 lines allow you to send either the echo message either the audiopath to the ajax response
	$result = [
		'html' => ob_get_clean(), // Capture the echoed HTML
		'audiopath' => $audiopath,
	];

	header('Content-Type: application/json');
	echo json_encode($result);
?>