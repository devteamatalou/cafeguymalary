<aside id="sidebar" class="sidebar">
	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link" href="index.html" style="margin-bottom: 30px;">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<!-- Start setion user nav -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<!-- <a href="users.html"><i class="bi bi-circle"></i><span>Add User</span></a> -->
				</li>
				<li>
					<a href="http://localhost/cafeguymalary/views/admin/users.php"><i class="bi bi-circle"></i><span>List User</span></a>
				</li>
			</ul>
		</li><!-- End user Nav -->

		<!-- Start section employe -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#employe-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-person-workspace"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="employe-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="users.html"><i class="bi bi-circle"></i><span>Add Employe</span></a>
				</li>
				<li>
					<a href="users.html"><i class="bi bi-circle"></i><span>List Employe</span></a>
				</li>
			</ul>
		</li><!-- End section employe  -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-journal-album"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="#"><i class="bi bi-circle"></i><span> Report Daily</span></a>
				</li>
				<li>
					<a href="#"><i class="bi bi-circle"></i><span> Report Global </span></a>
				</li>
			</ul>
		</li><!-- End Charts Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="login.html">
						<i class="bi bi-circle"></i><span>Login</span>
					</a>
				</li>

				<li>
					<a href="users-profile.html">
						<i class="bi bi-circle"></i><span>Profil </span>
					</a>
				</li>

				<li>
					<a href="login.html">
						<i class="bi bi-circle"></i><span>logout</span>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</aside><!-- End Sidebar-->