<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location:http://localhost/PROJECT/user_page/index.html");
?>
