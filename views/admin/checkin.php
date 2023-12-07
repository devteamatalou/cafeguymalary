<?php
 session_start();

	if(empty($_SESSION['admin']))
		header('Location: login.php');

	include '../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="http://cafeguymalary.atalou.org/public/assets/img/logo_resto.png" rel="icon">
		<link href="http://cafeguymalary.atalou.org/public/assets/img/logo_resto.png" rel="apple-touch-icon">
		
		<title>Checkin</title>
		<link rel="stylesheet" href="../../public/assets/css/styles.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
		<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<!-- google font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;600;700&display=swap">
	</head>

	<body style="background-color: #DEAD66;">
		<header>
			<!-- ------------- <CALENDAR> ----------------- -->
			<div class="contain">
				<div class="calendar">
					<div id="js-month" class="calendar__month"></div>
					<div id="js-day" class="calendar__day"></div>
					<div id="time" class="calendar__time"></div>
				</div>
			</div>
			<!-- ------------- </CALENDAR> ----------------- -->
			
			<div class="resto-logo">
				<img src="../../public/assets/img/logo_resto.png" alt="Restaurant Logo">
			</div>
			<div class="restaurant-logo">
				<h1>Les Délices D'Edelande Restaurant</h1>
			</div>
			<center>
				<div id="load-data"></div>
			</center>
		</header>

		<footer id="footer" style="background-color: #39302A;">
			<div class="container">
				<div class="copyright">
					&copy; Copyright <strong><span>AAN</span></strong>
				</div>
				<div class="credits">
					<span style="color: black; font-weight: 500;">DESIGN BY</span>&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="color: #DCDCDC; font-weight: 700; font-size: 15px;">ATALOU MICRO SYSTEM</span></strong></strong>
				</div>
			</div>
		</footer>
	</body>
	
	<!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
	<script src="../../public/assets/js/calendar/calendar.js"></script>
	<script src="../../public/assets/js/time/runningtime.js"></script>
</html>


<script>
	const url = 'ws://broker.emqx.io:8083/mqtt';

	// Create an MQTT client instance
	const options = {
		// Clean session
		clean: true,
		connectTimeout: 10000,
		// Authentication
		clientId: 'emqx_guymalary',
		username: 'emqx_guymalary',
		password: 'emqx_guymalary',
	}

	const client = mqtt.connect(url, options);
	client.on('connect', function() {
		var topic = 'guymalary';
		console.log('Connected');
		// Subscribe to a topic
		client.subscribe(topic, function(err) {});
	});

	// Receive messages
	client.on('message', function(topic, message) {
		// message is Buffer
		var msg = message.toString();
		console.log(msg);

		// ------- <ADDED> --------
		$(document).ready(function() {
			var barcode = message.toString();
			$.ajax({
				url: "../../src/controllers/checkin/checkin.ctrl.php",
				type: "post",
				data: {barcode: barcode},
				success: function(result)
				{
					let renderedHtml = result.html;
					var audioPath = result.audiopath;

					$("#load-data").html(renderedHtml);

					// ------------ checking the audio path and play it
					if (audioPath) {
						var audio = new Audio(audioPath);
						audio.play().then(function() {
							console.log('Audio is playing');
						}).catch(function(error) {
							console.error('Error playing audio: ' + error);
						});
					}

					setTimeout(homeDisplay, 20000);
				}
			});
		});
		// ------- </ADDED> --------
	});


	// load the default interface on page load
	$(document).ready(function() {
		homeDisplay();
	});

	// the function to put default interface design
	function homeDisplay()
	{
		// Check if the user is a simple user based on the id_role value
		let isSimpleUser = <?php echo ($_SESSION['admin']['id_role'] == 2) ? 'true' : 'false'; ?>;

		// Set the appropriate href based on the user type
		let hrefValue = isSimpleUser ? 'logout.php' : 'index.php';

		$("#load-data").html("<div class='logout'><a id='bt-test' href='"+hrefValue+"'><img src='../../public/assets/img/back.png'></a></div>");
	}
</script>