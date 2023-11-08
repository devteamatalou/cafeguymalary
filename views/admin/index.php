<?php
	session_start();

	include '../../vendor/autoload.php';

	if (empty($_SESSION['admin']))
		header('Location: login.php');

		use src\dao\DashboardDao;
		$dashDao = new DashboardDao();

		$resto = 'GUY MALARY';
		date_default_timezone_set('America/Port-Au-Prince');
		$cur_date = date('l, d M Y');


	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main style="height: 90vh; margin-bottom: 0;" id="main" class="main">
		<div class="pagetitle">
			<!-- <h1>Dashboard</h1> -->
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section dashboard">
			<div class="row">
				<!-- Left side columns -->
				<div class="col-lg-12">
					<div class="row">
						<!-- Sales Card -->
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">Feed <span>| Today</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-menu-button-wide-fill"></i>
											<!-- <i class="bi-currency-dollar"></i> -->
										</div>
										<div class="ps-3">
											<h6><?= $dashDao->countFeed($cur_date, $resto)->total; ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Sales Card -->

						<!-- Revenue Card -->
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card revenue-card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>Filter</h6>
										</li>
										<li><a class="dropdown-item" href="#">Today</a></li>
										<li><a class="dropdown-item" href="#">This Month</a></li>
										<li><a class="dropdown-item" href="#">This Year</a></li>
									</ul>
								</div>

								<div class="card-body">
									<h5 class="card-title">Revenue <span>| This Month</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-currency-dollar"></i>
										</div>
										<div class="ps-3">
											<h6>$3,264</h6>
											<span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Revenue Card -->

						<!-- Customers Card -->
						<div class="col-xxl-4 col-md-6">
						<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">Admins</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-person-fill"></i>
											<!-- <i class="bi bi-menu-button-wide"></i> -->
										</div>
										<div class="ps-3">
											<h6><?= $dashDao->countUsers()->total; ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Customers Card -->

						<!-- Pos Card -->
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">Employees</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-people-fill"></i>
										</div>
										<div class="ps-3">
											<h6><?= number_format($dashDao->countEmps()->total); ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Pos Card -->
					</div>
				</div><!-- End Left side columns -->
			</div>
		</section>


			<!-- Add Calculator Modal HTML -->
			<div id="calculateModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header">
								<h4 class="modal-title">Calculator</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="calculator">
								<div class="input" id="input"></div>
								<div class="buttons">
									<div class="operators">
										<div>+</div>
										<div>-</div>
										<div>&times;</div>
										<div>&divide;</div>
									</div>
									<div class="leftPanel">
										<div class="numbers">
											<div>7</div>
											<div>8</div>
											<div>9</div>
										</div>
										<div class="numbers">
											<div>4</div>
											<div>5</div>
											<div>6</div>
										</div>
										<div class="numbers">
											<div>1</div>
											<div>2</div>
											<div>3</div>
										</div>
										<div class="numbers">
											<div>0</div>
											<div>.</div>
											<div id="clear">C</div>
										</div>
									</div>
									<div class="equal" id="result">=</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<!--end  -->
	</main>

<?php include '../includes/footer.php'; ?>