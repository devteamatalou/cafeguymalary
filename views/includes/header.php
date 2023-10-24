<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>Guy Malary Caféteria</title>
		<meta content="" name="description">
		<meta content="" name="keywords">

		<!-- Favicons -->
		<link href="assets/img/nokad.png" rel="icon">
		<link href="assets/img/nokad.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="../../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="../../public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="../../public/vendor/quill/quill.snow.css" rel="stylesheet">
		<link href="../../public/vendor/quill/quill.bubble.css" rel="stylesheet">
		<link href="../../public/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="../../public/vendor/simple-datatables/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
		<!-- Template Main CSS File -->
		<link href="../../public/assets/css/dasboard.css" rel="stylesheet">
	</head>

	<body>
		<!-- ======= Header ======= -->
		<header id="header" class="header fixed-top d-flex align-items-center">
			<div class="d-flex align-items-center justify-content-between">
				<a href="index.html" class="logo d-flex align-items-center">
					<img src="logo_ata-e1617114752787.png" alt="">
					<span class="d-none d-lg-block">Guy Malary Caféteria</span>
				</a>
				<i class="bi bi-list toggle-sidebar-btn"></i>
			</div><!-- End Logo -->

			<div class="search-bar">
				<form class="search-form d-flex align-items-center" method="POST" action="#">
					<input type="text" name="query" placeholder="Search" title="Enter search keyword">
					<button type="submit" title="Search"><i class="bi bi-search"></i></button>
				</form>
			</div><!-- End Search Bar -->

			<nav class="header-nav ms-auto">
				<ul class="d-flex align-items-center">
					<li class="nav-item d-block d-lg-none">
						<!-- <a class="nav-link nav-icon search-bar-toggle " href="#">
							<i class="bi bi-search"></i>
						</a> -->
					</li><!-- End Search Icon-->

					<!-- date -->
					<li class="nav-item">
						<a href="#" class="nav-link nav-icon  heures"></a>
					</li>
					<!-- end date -->

					<li class="nav-item">
						<a class="nav-link nav-icon" href="index.html"><i class="bi bi-grid"></i></a>
					</li>
					<!-- End Dashboard Nav -->

					<li class="nav-item">
						<a class="nav-link nav-icon" href="pos.html"><i class="bi bi-menu-button-wide"></i></a>
					</li>
					<!-- End Pos Nav -->
					<li class="nav-item dropdown">
						<a href="#calculateModal" class="nav-link nav-icon" data-toggle="modal">
							<i class="bi bi-calculator" data-toggle="tooltip" title="Calculator"></i></a>
					</li>
					<!-- End Calculator Nav -->

					<li class="nav-item dropdown pe-3">
						<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
							<img src="assets/img/male.png" alt="Profile" class="rounded-circle">
						</a>
						<!-- End Profile Iamge Icon -->

						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
							<li class="dropdown-header">
								<h6>Philogene Ohad</h6>
								<span>Administrateur</span>
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="users-profile.html"><i class="bi bi-gear"></i><span>Settings</span></a>
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="login.html"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>
							</li>

						</ul><!-- End Profile Dropdown Items -->
					</li><!-- End Profile Nav -->

				</ul>
			</nav><!-- End Icons Navigation -->
		</header><!-- End Header -->