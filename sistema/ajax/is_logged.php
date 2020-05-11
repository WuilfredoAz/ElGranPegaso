<?php	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../login.php");
		exit;
    }else{
        	 $usuario = $_SESSION['user_name'];
        	 $rango = $_SESSION['rango'];
        }