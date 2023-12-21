$(document).ready(() => {
	$('#example tbody').on('click', '.restore-user', function (e) {
		e.preventDefault();
		let id = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "Do you really want to restore this user ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/cafeaan/src/controllers/adm/restoreuser.ctrl.php',
					type: "POST",
					dataType: 'json',
					data: { id: id },
					success: function (data) {
						console.log(data);
						swal("Restore Employee", "User restored successfully", "success");
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