<?php
	session_start();

	if(empty($_SESSION['admin']))
		header('Location: login.php');

	include '../../vendor/autoload.php';

	use src\dao\UserDao;
	$userdao = new UserDao();
	$alldelusers = $userdao->selectAllDelUsers();

	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../admin/">Home</a></li>
					<li class="breadcrumb-item active">Deleted Users</li>
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
										<th>Username</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									 while($allusers = $alldelusers->fetch(PDO::FETCH_OBJ)):
									?>
										<tr>
											<td><?= $allusers->prenom; ?></td>
											<td><?= $allusers->nom; ?></td>
											<td><?= $allusers->username; ?></td>
											<td><?= $allusers->task; ?></td>
											<td>
												<a href="<?= $allusers->id; ?>" class="btn btn-primary restore-user"><i class="bi bi-arrow-counterclockwise" data-toggle="tooltip" title="Restore"></i></a>
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