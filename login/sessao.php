<?php
 session_start();
 if(!isset($_SESSION['nome_utilizador']))
 {
	 session_unset();
	session_destroy();
	echo'<script type="text/javascript">';
	echo'alert("Acesso negado!");';
	echo 'javascript:window.location="./index.php";';
	echo'</script>';	
 }
?>