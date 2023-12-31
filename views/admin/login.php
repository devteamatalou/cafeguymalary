<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login | Caféteria Toussaint Louverture</title>
		<link href="../../public/assets/css/styles.css" rel="stylesheet">

		<!-- tab icon -->
		<link href="../../public/assets/img/logo_resto.png" rel="icon">
		<link href="../../public/assets/img/logo_resto.png" rel="apple-touch-icon">

		<!-- cdn Icon bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	</head>
	<body>
		<div class="container-login">
			<div class="item">
				<img src="../../public/assets/img/bgc1.png" alt="">
			</div>
			<div class="item">
				<form id="login" action="" method="post">
					<p class="title-form"> <span>Login</span> | Restaurant Toussaint Louverture</p>
					<div class="input-group">
						<span class="icon"><i class="bi bi-person"></i></span>
						<input name="authuname" type="text" placeholder="Ex: user@123 require>
					</div>
					<div class="input-group">
						<span class="icon"><i class="bi bi-lock"></i> </span>
						<input name="authpass" type="password" placeholder="Ex: 123*****">
					</div>
					<span>
						<button type="submit">Login</button>
					</span>
				</form>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		<script src="../../public/assets/js/auth/login.js"></script>
	</body>
</html>