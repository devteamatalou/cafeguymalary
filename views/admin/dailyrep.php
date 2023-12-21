<?php
	session_start();

	if(empty($_SESSION['admin_aan']))
		header('Location: login.php');

		include '../../vendor/autoload.php';

		$resto = 'TOUSSAINT LOUVERTURE';
		date_default_timezone_set('America/Port-Au-Prince');
		$cur_date = date('l, d M Y');

		use src\dao\DailyrepDao;
		$dailyDao = new DailyrepDao();
		$dailydao_qry = $dailyDao->dailyRep($cur_date, $resto);

	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<!-- <h1>Category</h1> -->
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../admin/">Home</a></li>
					<li class="breadcrumb-item active">Daily Report</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<section class="section">
			<div class="row">
				<div class="col-md-12">
					<div class="">
						<div class="">
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap custom-table" style="width:100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Barcode</th>
										<th>Restaurant</th>
										<th>Time</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
									 while($dailyrep = $dailydao_qry->fetch(PDO::FETCH_OBJ)):
									?>
										<tr>
											<td><?= $dailyrep->id; ?></td>
											<td><?= $dailyrep->prenom; ?></td>
											<td><?= $dailyrep->nom; ?></td>
											<td><?= $dailyrep->barcode; ?></td>
											<td><?= $dailyrep->resto; ?></td>
											<td><?= $dailyrep->time; ?></td>
											<td><?= $dailyrep->date_created; ?></td>
										</tr>
									<?php
									 endwhile;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include '../includes/footer.php'; ?>