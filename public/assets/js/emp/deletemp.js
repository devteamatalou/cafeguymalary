$(document).ready(() => {
	$('#example tbody').on('click', '.delete-emp', function (e) {
		e.preventDefault();
		let id = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "Do you really want to delete this employee ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/cafeaan/src/controllers/emp/deletemp.ctrl.php',
					type: "POST",
					dataType: 'json',
					data: { id: id },
					success: function (data) {
						console.log(data);
						swal("Delete Employee", "Employee deleted successfully", "success");
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