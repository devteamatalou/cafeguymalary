<?php
	session_start();

	if(empty($_SESSION['admin']))
		header('Location: login.php');

		include '../../vendor/autoload.php';

		$resto = 'GUY MALARY';

		use src\dao\GlobalrepDao;
		$globalDao = new GlobalrepDao();
		$globaldao_qry = $globalDao->globalRep($resto);

	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<!-- <h1>Category</h1> -->
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../admin/">Home</a></li>
					<li class="breadcrumb-item active">Global Report</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<section class="section">
			<div class="row">
				<div class="col-md-12">
					<div class="">
						<div class="">
							<!-- <a href="#form" class="btn btn-success" data-toggle="modal"><i class="bi bi-plus"></i> <span>Add Category</span></a> -->
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
									 while($globalrep = $globaldao_qry->fetch(PDO::FETCH_OBJ)):
									?>
										<tr>
											<td><?= $globalrep->id; ?></td>
											<td><?= $globalrep->prenom; ?></td>
											<td><?= $globalrep->nom; ?></td>
											<td><?= $globalrep->barcode; ?></td>
											<td><?= $globalrep->resto; ?></td>
											<td><?= $globalrep->time; ?></td>
											<td><?= $globalrep->date_created; ?></td>
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