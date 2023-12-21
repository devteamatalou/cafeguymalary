<?php
	session_start();

	if(empty($_SESSION['admin_aan']))
		header('Location: login.php');

	include '../../vendor/autoload.php';

	use src\dao\EmpDao;
	$empdao = new EmpDao();
	$alldelemps = $empdao->selectAllDelEmps();

	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../admin/">Home</a></li>
					<li class="breadcrumb-item active">Deleted Employees</li>
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
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Gender</th>
										<th>Barcode</th>
										<th>Dated Created</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									 while($allemps = $alldelemps->fetch(PDO::FETCH_OBJ)):
									?>
										<tr>
											<td><?= $allemps->prenom; ?></td>
											<td><?= $allemps->nom; ?></td>
											<td><?= $allemps->sexe; ?></td>
											<td><?= $allemps->barcode; ?></td>
											<td><?= $allemps->created_at; ?></td>
											<td>
												<a href="<?= $allemps->id; ?>" class="btn btn-primary restore-emp"><i class="bi bi-arrow-counterclockwise" data-toggle="tooltip" title="Restore"></i></a>
											</td>
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