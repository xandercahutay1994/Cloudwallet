<?php
	session_start();
	session_destroy();
	header('location:../../views/User/user_LoginView.php');
?>