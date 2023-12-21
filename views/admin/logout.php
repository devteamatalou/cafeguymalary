<?php
 session_start();

	unset($_SESSION['admin_aan']);

	header('Location: ../admin');
?>