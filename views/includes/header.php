<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>Guy Malary Cafétéria</title>
		<meta content="" name="description">
		<meta content="" name="keywords">

		<!-- Favicons -->
		<link href="http://localhost/cafeguymalary/public/assets/img/logo_resto.png" rel="icon">
		<link href="http://localhost/cafeguymalary/public/assets/img/logo_resto.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="http://localhost/cafeguymalary/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/quill/quill.snow.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/quill/quill.bubble.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="http://localhost/cafeguymalary/public/vendor/simple-datatables/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<!-- Template Main CSS File -->
		<link href="http://localhost/cafeguymalary/public/assets/css/dasboard.css" rel="stylesheet">
	</head>

	<body>
		<!-- ======= Header ======= -->
		<header id="header" class="header fixed-top d-flex align-items-center">
			<div class="d-flex align-items-center justify-content-between">
				<a href="index.html" class="logo d-flex align-items-center">
					<!-- <img src="../../public/assets/img/bgc1.png" alt=""> -->
					<span class="d-none d-lg-block">Guy Malary Cafétéria</span>
				</a>
				<i class="bi bi-list toggle-sidebar-btn"></i>
			</div><!-- End Logo -->

			<nav class="header-nav ms-auto">
				<ul class="d-flex align-items-center">
					<li class="nav-item d-block d-lg-none">
					</li><!-- End Search Icon-->

					<!-- date -->
					<li class="nav-item">
						<span id="time" class="nav-link nav-icon"></span>
					</li>
					<!-- end date -->

					<li class="nav-item dropdown">
						<a href="#calculateModal" class="nav-link nav-icon" data-toggle="modal">
							<i class="bi bi-calculator" data-toggle="tooltip" title="Calculator"></i></a>
					</li>
					<!-- End Calculator Nav -->

					<li class="nav-item dropdown pe-3">
						<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
							<img src="../../public/assets/img/default-icon.png" alt="Profile" class="rounded-circle">
						</a>
						<!-- End Profile Iamge Icon -->

						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
							<li class="dropdown-header">
								<h6><span><?= !empty($_SESSION['admin']) ? $_SESSION['admin']['firstname']: ''; ?></span><?= !empty($_SESSION['admin']) ? $_SESSION['admin']['lastname']: ''; ?></h6> <!-- there we use ternary operator to display the user info if the session is not empty -->
								<span><?= $_SESSION['admin']['id_role'] == 1 ? 'Admin' : 'Simple User' ?></span> <!-- there we use ternary operator to display the user role depending on his role_id -->
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="http://localhost/cafeguymalary/views/admin/logout.php"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>
							</li>

						</ul><!-- End Profile Dropdown Items -->
					</li><!-- End Profile Nav -->

				</ul>
			</nav><!-- End Icons Navigation -->
		</header><!-- End Header -->