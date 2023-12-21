$(document).ready(() => {
	$('#example tbody').on('click', '.restore-emp', function (e) {
		e.preventDefault();
		let id = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "Do you really want to restore this employee ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/cafeaan/src/controllers/emp/restoremp.ctrl.php',
					type: "POST",
					dataType: 'json',
					data: { id: id },
					success: function (data) {
						console.log(data);
						swal("Restore Employee", "Employee restored successfully", "success");
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