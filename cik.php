<?php 

	session_start();
	if(!$_SESSION['id']){
 	header("location:login.php");// sayfa.php eğer session yok ise yönlendirilecek sayfadır
	}
	else{
		session_destroy();
		header("Location: login.php");	
	}
	
?>