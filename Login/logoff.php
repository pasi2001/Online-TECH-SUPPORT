<?php
	session_start();
	
	if(isset($_SESSION["uname"]))  {
		unset($_SESSION["uname"]);
	}
	
	header("Location:../index.php");
	exit;
?>
<html>
<head>
	<title>Logged Off</title>
</head>
<body>
<br><br>
<div align="">
<h2>You are now logged off</h2>
	&nbsp;&nbsp;&nbsp;
	<a href="../index.php">home</a></div>
</body>
</html>
