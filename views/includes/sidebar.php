<aside id="sidebar" class="sidebar">
	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link" href="http://localhost/cafeaan/views/admin" style="margin-bottom: 30px;">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<!-- End Dashboard Nav -->

		<!-- Start setion user nav -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="http://localhost/cafeaan/views/admin/users.php"><i class="bi bi-circle"></i><span>List Users</span></a>
				</li>
				<li>
					<a href="http://localhost/cafeaan/views/admin/delusers.php"><i class="bi bi-circle"></i><span>Deleted Users</span></a>
				</li>
			</ul>
		</li>
		<!-- End user Nav -->

		<!-- Start section employee -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#employe-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-person-workspace"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="employe-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="http://localhost/cafeaan/views/admin/employees.php"><i class="bi bi-circle"></i><span>List Employees</span></a>
				</li>
				<li>
					<a href="http://localhost/cafeaan/views/admin/delemployees.php"><i class="bi bi-circle"></i><span>Deleted Employees</span></a>
				</li>
			</ul>
		</li>
		<!-- End section employee  -->

		<!-- Start section chekin -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#checkin-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-check"></i><span>Checkin</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="checkin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="http://localhost/cafeaan/views/admin/checkin.php"><i class="bi bi-circle"></i><span>Go to Cafeteria</span></a>
				</li>
			</ul>
		</li>
		<!-- End section chekin  -->

		<!-- Start section report -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-journal-album"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="http://localhost/cafeaan/views/admin/dailyrep.php"><i class="bi bi-circle"></i><span>Daily Report</span></a>
				</li>
				<li>
					<a href="http://localhost/cafeaan/views/admin/globalrep.php"><i class="bi bi-circle"></i><span>Global Report</span></a>
				</li>
			</ul>
		</li>
		<!-- End section report -->

		<!-- Start section Download APK -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#apk-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-download"></i><span>APK</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="apk-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="http://localhost/cafeaan/public/assets/apk/guymalarycafe2.apk" download><i class="bi bi-circle"></i><span>Download APK</span></a>
				</li>
			</ul>
		</li>
		<!-- End section Download APK -->

		<p style="margin-top: 5px; text-align: center;">
			<img width="150" height="200" src="http://localhost/cafeaan/public/assets/img/male-chef.png" alt="">
		</p>
	</ul>
</aside><!-- End Sidebar-->