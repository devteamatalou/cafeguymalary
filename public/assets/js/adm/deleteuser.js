$(document).ready(() => {
	$('#example tbody').on('click', '.delete-user', function (e) {
		e.preventDefault();
		let id = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "Do you really want to delete this user?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/cafeguymalary/src/controllers/adm/deleteuser.ctrl.php',
					type: "POST",
					dataType: 'json',
					data: { id: id },
					success: function (data) {
						console.log(data);
						swal("Delete User", "User deleted successfully", "success");
						setTimeout(function () {
							window.location.reload();
						}, 3000);

					}
				});
			} else {
				swal("Process aborted !");
			}
		});
	});
});