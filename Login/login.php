<?php
	session_start();

$mess="";


if(isset($_POST["submit"])&&$_POST["submit"]=="Sign in") {	
	require_once("dbcon/user.php");
	include("dbcon/dbcon.php");
	
	
	$user = $_POST["uname"];
$password = md5($_POST["password"]);

// Prepare statement and bind parameters
$stmt = mysqli_prepare($con, "SELECT user_name FROM user_info WHERE user_name=? AND password=?");
mysqli_stmt_bind_param($stmt, "ss", $user, $password);

// Execute statement
mysqli_stmt_execute($stmt);

// Get result
$result = mysqli_stmt_get_result($stmt);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_array($result);
  $_SESSION["uname"] = $row["user_name"]; // Set a session variable to identify the user
  header("Location: home.php");
  exit;
} else {
  // Check if username is invalid or password is incorrect
  $query = "SELECT user_name FROM user_info WHERE user_name = '$user'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 0) {
    $mess = "<font color=red size=2><b>Invalid username.<br>Please try again.</b></font>";
  } else {
    $mess = "<font color=red size=2><b>Invalid password.<br>Please try again.</b></font>";
  }
}

}

?>

<html>
<head>
	<title>User Page</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../login_style.css">
</head>
<body >
<header class="header">

<a href="#" class="logo"><span class="ln1">Online TECH</span><br><span class="ln2">SUPPORT</span> </a>

<nav class="navbar">
	<a href="../index.php">Home</a>
</nav>

</header>
	<center>
	<br /><br /><br /><br /><br /><br /><br />
		<div>
	<center style=>
		<br />
		<h2>User Login</h2>		
		<form name="signin" method="post"  action="">
			
			<table height="80px">
				<tr><td>User Name</td></tr>
					<td><input type="text" name="uname" value="" >
						
				<tr><td>Password</td></tr>
					<td><input type="password" name="password" value="">
			
			</table>
			
			<input type="submit" name="submit" value="Sign in" onclick="location.href='home.php'" class="btn">
		</form>
	
	<?php	
		echo $mess."<br><br>";
	?>
			
	</center>		
		
	<center>
		<font size="3">If you are a new user</font><br>
		<a href="registration.php" style="text-decoration:none;color:blue">Register now</a>
	<br>
	<br>
	</center>
</div>
<br><br>
	<center>	
</body>
</html>