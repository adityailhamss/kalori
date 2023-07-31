<?php
	session_start();
	unset($_SESIION["id_user"]);
	session_destroy();
	echo header("Location:Admin/login/")
?>