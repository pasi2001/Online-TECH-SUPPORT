<?php
		
$mess = "";

if(isset($_POST["submit"])) {

	//conncet to the database
	require_once("dbcon/user.php");
	include("dbcon/dbcon.php");	//database connection function

	
	$first_name=$_POST["first_name"];
	$last_name=$_POST["last_name"];
	$id=$_POST["id"];
	
	if(isset($_POST["gender"])) {
		$gender=$_POST["gender"];
	}
	
	$district=$_POST["district"];
	$email=$_POST["email"];
	
	if(isset($_POST["notification"])) {
		$notification='Y';
	} else {
		$notification='N';
	}
	
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$password_conf=md5($_POST["password_conf"]);
	
	
	
	if($password!=$password_conf) {
		$mess="<font color='red'>Password and confirmation doesn't match.</font>";
		exit;
	}
	
	$query = "INSERT INTO user_info(`first_name`, `last_name`, `id`, `gender`, `district`, `email_address`, `email_notification`,`user_name`, `password`) VALUES('$first_name', '$last_name', '$id', '$gender', '$district', '$email', '$notification', '$username', '$password')";
	$result = mysqli_query($con,$query);
	
	if(!$result) {
		$error = mysqli_error($con);
		print $error;
		exit;
	}
	
	$mess = "<font color='blue'>User Successfully Created</font>";
    echo "<head><link rel=stylesheet href=style.css></head>
	<body style=background-image:linear-gradient(90deg,white,#5478ec33);color:black;font-family:'Poppins',sans-serif;font-size:1.7rem;>
	<header class=header>
<a href=# class=logo><span class=ln1>Online TECH</span><br><span class=ln2>SUPPORT</span> </a>

<nav class=navbar>
	<a href=login.php>Home</a>
	<a href=home.php>Dashboard</a>
</nav>
</header><br><br>
	<center>
	<br><br>
	<div style=background-image:linear-gradient(white,white);width:40%;font-size:12px;padding:2%;box-shadow:0.5rem,0.5rem,#5478ec33>
	<h1>
	<font color='black'>
	<b>Information has been entered.</b>
	</font>
	</h1>
	<a href='login.php' style=font-size:20px;text-decoration:none>
	<input type=submit value=back class='btn'>
	</a>
	</div>
	</center>
	</body>";
	
	exit;

}
?>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../login_style.css">
	<script language="javascript">
	<!--
		function testform() {
			if(document.user.first_name.value=='') {
				alert("Please enter your first name");
				return false;
			}
			if(document.user.id.value=='') {
				alert("Please enter your id number");
				return false;
			}
			if(document.user.email.value=='') {
				alert("Please enter your email address");
				return false;
			}
			if(document.user.username.value=='') {
				alert("Please enter your username");
				return false;
			}
			if(document.user.password.value=='') {
				alert("Please enter your password");
				return false;
			}
			if(document.user.password_conf.value=='') {
				alert("Please enter confirm password");
				return false;
			}
			if(document.user.password.value!=document.user.password_conf.value) {
				alert("Password and confirm password does not match");
				return false;
			}
			return confirm("Do you want to register?");
		}
	-->
	</script>	
</head>

<body>

	<center>
	<?php
		echo $mess;
	?>
	<br><br>
	<form name="user" method="post" action="">	
	<div style="width:40%;"><table style="font-size:1.7rem,">
		<br>
		<tr><td><h1><center><b>Registration Form</b></center></h1></td></tr>
		<tr>
			<td>
				<br>
				
				FIRST NAME:<br>
				<input type="text" name="first_name" size="40" maxlength="60"><br><br>
				
				LAST NAME:<br>
				<input type="text" name="last_name" size="40" maxlength="60"><br><br>
						
				IDENTITY NO:<br>
				<input type="text" name="id" size="12" maxlength="12" align="right"><br><br>
										
				GENDER:<br>
				<input type="radio" name="gender" value="Male"> &nbsp; Male
				<input type="radio" name="gender" value="Female"> &nbsp; Female
				<br><br>
				
				DISTRICT:<br>
				<select name="district">
					<option SELECTED>Colombo</option>
					<option>Gampaha</option>
					<option>Kalutara</option>
					<option>Polannaruwa</option>
					<option>Anuradhapura</option>
					<option>Trincomalee</option>
					<option>Batticalo</option>
					<option>Ampara</option>
					<option>Jaffna</option>
					<option>Kilinochchi</option>
					<option>Mullaithivu</option>
					<option>vavuniya</option>
					<option>Mannar</option>
					<option>Monaragala</option>
					<option>Badulla</option>
					<option>Galle</option>
					<option>Matara</option>
					<option>Hambantota</option>
					<option>Kandy</option>
					<option>Nuwara Eliya</option>
					<option>Matale</option>
					<option>Kurunegala</option>
					<option>Puttalam</option>
					<option>Ratnapura</option>
					<option>Kegalle</option>
				</select><br><br>
				
				E-MAIL:<br>
				<input type="email" name="email" size="40" maxlength="60"><br><br>
						
				SEND E-MAIL NOTIFICATIONS:<br>
				<input type="checkbox" name="notification" value="send"><br><br>
				
				USER NAME:<br>
				<input type="textbox" name="username" size="40"><br><br>
				
				PASSWORD:<br>
				<input type="password" name="password" size="40" maxlength="20"><br><br>
					
				CONFIRM PASSWORD:<br>
				<input type="password" name="password_conf" size="40" maxlength="20"><br><br>
					
					<input type="submit" name="submit" value=" Submit " onclick="location.href='Login.php'" class="btn">
					&nbsp;&nbsp;
					<input type="reset" name="reset_s" value="Cancel" onclick="location.href='../index.php'" class="btn">
			</td>
		</tr>
	</table></div>
	</center>
	
	</form>

</body>
</html>