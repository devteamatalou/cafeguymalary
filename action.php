<?php
ob_start();

include "database.php";
date_default_timezone_set("America/Port-Au-Prince");
$cur_date = date("l, d M Y");

$audiopath = '';

if (isset($_POST['code'])) {
	$code = $_POST['code'];
	$query = $db->prepare("SELECT `id`, `barcode`, `prenom`, `nom` FROM `employee` WHERE `barcode` = :barcode LIMIT 1");
	$query->bindParam(":barcode", $code);
	$query->execute();

	if ($query->rowCount() > 0) {
		foreach ($query as $rows) {
			$fname = $rows['prenom'];
			$lname = $rows['nom'];
			$lname = strtoupper($lname);
			$id_emp = $rows['id'];
			// ---------- <ADDED> ----------
			$qry = $db->prepare("SELECT * FROM `verify` WHERE `date_created` = :cur_date AND `id_emp` = :id_emp LIMIT 1");
			$qry->bindParam(":cur_date", $cur_date);
			$qry->bindParam(":id_emp", $id_emp);
			$qry->execute();
			if ($qry->rowCount() > 0) {
				echo
				" 
					<h3 class='person-name'>$fname <span>$lname</span></h3>
				";
				$audiopath = 'http://localhost/cafe_guymalary/assets/audio/access_denied.mp3';
			} else {
				$qry1 = $db->prepare("INSERT INTO `verify` (`date_created`, `id_emp`) VALUES (:cur_date, :id_emp)");
				$qry1->bindParam(":cur_date", $cur_date);
				$qry1->bindParam(":id_emp", $id_emp);
				$qry1->execute();
				if ($qry1->rowCount() > 0) {

					echo "<h3 class='person-name'>$fname <span> $lname</span></h3>";

					$audiopath = 'http://localhost/cafe_guymalary/assets/audio/access_granted.mp3';
				} else {
					echo
					" 
							<h2 style='color: red;'>ERR-2040 found</h2>
							<div id='myCarousel' class='carousel slide' data-ride='carousel'>
								<ol class='carousel-indicators'>
									<li></li>
								</ol>   
								<div class='carousel-inner'>
									<div id='load-dta' class='carousel-item active'>
										<div class='img-box'><img src='img/no_user.png' alt=''></div>
										<p class='overview'><b>An error was found in the system, retry again in few minutes</br>if the problem persists, please contact our development team. THANK YOU!</b></p>
									</div>
								</div>
							</div>
						";
				}
			}
		}
	} else {

		$audiopath = 'http://localhost/cafe_guymalary/assets/audio/employeenotfound.mp3';
	}
}

// those 4 lines allow you to send either the echo message either the audiopath to the ajax response
$result = [
	'html' => ob_get_clean(), // Capture the echoed HTML
	'audiopath' => $audiopath,
];

header('Content-Type: application/json');
echo json_encode($result);
