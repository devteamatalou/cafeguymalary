<?php
	session_start();

	if(empty($_SESSION['admin_aan']))
		header('Location: login.php');

	include '../../vendor/autoload.php';

	use src\dao\UserDao;
	$userdao = new UserDao();
	$select_all_users = $userdao->selectAllUsers($_SESSION['admin_aan']['id']);

	$allroles_stmt = $userdao->selectAllRoles();


	include '../includes/header.php';
	include '../includes/sidebar.php';
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<!-- <h1>Category</h1> -->
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../admin/">Home</a></li>
					<li class="breadcrumb-item active">Users</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<section class="section">
			<div class="row mb-3">
				<div class="col-md-12">
					<a href="#form" class="btn btn-primary pull-right" data-toggle="modal"><i class="bi bi-plus"></i> <span>Add Users</span></a>
				</div>
			</div>

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
									 while($allusers = $select_all_users->fetch(PDO::FETCH_OBJ)):
									?>
										<tr>
											<td><?= $allusers->prenom; ?></td>
											<td><?= $allusers->nom; ?></td>
											<td><?= $allusers->username; ?></td>
											<td><?= $allusers->task; ?></td>
											<td>
												<button id="<?= $allusers->id; ?>" href="#editUser" class="btn btn-success edit-user" data-toggle="modal"><i class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></button>
												<a href="<?= $allusers->id; ?>" class="btn btn-danger delete-user"><i class="bi bi-trash" data-toggle="tooltip" title="Delete"></i></a>
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

			<!-- Add User Modal HTML -->
			<div id="form" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form id="adduser" action="" method="post">
							<div class="modal-header">
								<h4 class="modal-title">Add User</h4>
								<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Firstname</label>
									<input name="fname" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Lastname</label>
									<input name="lname" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input id="username" name="uname" type="text" class="form-control" required/>

									<!-- div to display if username already exists -->
									<div class="input-group mb-1 d-flex justify-content-between">
										<div id="unameExists" class="text-danger"></div>
									</div>
								</div>
								<div class="form-group">
									<label>Role</label>
									<select name="role" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
										<?php
										 while($allroles = $allroles_stmt->fetch(PDO::FETCH_OBJ)):
										?>
										  <option value="<?= $allroles->id; ?>"><?= $allroles->nom; ?></option>
										<?php
										 endwhile;
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Default Password</label>
									<input name="default_pass" type="password" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<button id="sub-btn" type="submit" class="btn btn-success">Add</button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<!-- Edit User Modal HTML -->
			<div id="editUser" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form id="edituser" action="" method="post">
							<div class="modal-header">
								<h4 class="modal-title">Edit User</h4>
								<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
							</div>
							<div id="editmodal-body" class="modal-body">
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-info" value="Save">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php include '../includes/footer.php'; ?>

<script>
	// set the selected user info inside the modal to edit user
	$(document).ready(function()
	{
  $('.edit-user').click(function()
		{
   // Get the ID attribute of the clicked button
   let id = $(this).attr('id');

   // Get the user data from input fields in the same row
   let row = $(this).closest('tr');
   let fname = row.find('td:eq(0)').text();
   let lname = row.find('td:eq(1)').text();
   let username = row.find('td:eq(2)').text();

			// Populate the modal with user information, including the button ID
			$('#editmodal-body').html("<div class='form-group'><input type='hidden' name='eid' value='"+id+"'><label>Firstname</label><input type='text' name='efname' class='form-control' value='"+fname+"' required></div><div class='form-group'><label>Lastname</label><input type='text' name='elname' class='form-control' value='"+lname+"' required></div><div class='form-group'><label>Username</label><input type='text' name='euname' class='form-control' value='"+username+"' required></div>");
		});
	});

	// check if the username entered for the new user already exists, if yes the 'add button' will be disabled
	$(document).ready(function()
	{
		$("#username").on('keyup blur', function()
		{
			let uname = $("#username").val();
			
			$.ajax(
			{
				url: 'http://localhost/cafeaan/src/controllers/adm/usernamexists.ctrl.php',
				type: 'POST',
				data: {uname:uname},
				success: function(response)
				{
					if(response == 1)
					{
						$('#unameExists').show().text('username already exists');
						$('#sub-btn').prop('disabled', true);
					}
					else
					{
						$('#unameExists').hide();
						$('#sub-btn').prop('disabled', false);
					}
				}
			});
		});
	});
</script>