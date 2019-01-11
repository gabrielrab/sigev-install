<?php
        echo"Saindo...";
        sleep(2);
		//Removendo dados da sessão
		@session_start();
		session_destroy();
		unset($_SESSION);
		header('Location: ../../index.php');
		exit;
?>