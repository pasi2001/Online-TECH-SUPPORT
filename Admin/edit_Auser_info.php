<?php
	session_start();
	if(!isset($_SESSION["uname"]))  {
		header("Location:error.html");
		exit;
 	}	
	
	

$mess = "";

if(isset($_POST["submit"])) {

	include("dbcon/user.php");
	require_once("dbcon/dbcon.php");
	
	$fname = $_POST["first_name"];
	$lname = $_POST["last_name"];
	$id = $_POST["id"];
	
	if(isset($_POST["gender"])) {
		$gender = $_POST["gender"];
	}
	
	$district = $_POST["district"];
	$email = $_POST["email"];
	
	if(isset($_POST["email_notification"])) {
		$email_notification = "Y";
	} else {
		$email_notification = "N";
	}
	
	$user_name = $_POST["user_name"];
	
	
	$query2 = "UPDATE admin_info SET first_name='$fname',last_name='$lname',id='$id',
				district='$district',email_address='$email',email_notification='$email_notification' WHERE user_name = '$user_name'";
	$result2 = mysqli_query($con,$query2);
	
	if(!$result2) {
		$err=mysqli_error($con)+"update anomally";
		print $err;
		exit();
	} 

	echo "<head><link rel=stylesheet href=style.css></head>
	<body style=background-image:linear-gradient(90deg,white,#5478ec33);color:black;font-family:'Poppins',sans-serif;font-size:1.7rem;>
	<header class=header>
<a href=# class=logo><span class=ln1>Online TECH</span><br><span class=ln2>SUPPORT</span> </a>

<nav class=navbar>
	<a href=index.php>Home</a>
    <a href=home.php>Dashboard</a>
	<a href=logoff.php class=btn login>Sign Off</a>
</nav>
</header><br><br>
	<center>
	<br><br>
	<div style=background-image:linear-gradient(white,white);width:40%;font-size:12px;padding:2%;box-shadow:0.5rem,0.5rem,#5478ec33>
	<h1>
	<font color='black'>
	<b>Information has been updated.</b>
	</font>
	</h1>
	<a href='view_admin_info.php' style=font-size:20px;text-decoration:none>
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
	<title>Edit User information</title>
	
	<script type="text/javascript">
		function test_form2() {
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
			return confirm("Do you want to update?");
		}		
	</script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="login_style.css">
</head>
<body style="font-size:1.7rem">
<header class="header">

<a href="#" class="logo"><span class="ln1">Online TECH</span><br><span class="ln2">SUPPORT</span> </a>

<nav class="navbar">
	<a href="index.php">Home</a>
    <a href="home.php">Dashboard</a>
	<a href="logoff.php" class="btn login">Sign Off</a>
</nav>

</header>
	<?php
		echo $mess;
	?>
	
	<?php
	
	if(isset($_GET["uname"])) {
	
		include("dbcon/user.php");
		require_once("dbcon/dbcon.php");
		
		
		$uname = $_GET["uname"];
		
		$query="SELECT first_name, last_name, id, gender, district, email_address, email_notification FROM admin_info WHERE user_name = '$uname'";

		$result=mysqli_query($con,$query);
		if(!$result) {	
			print mysql_error();
			exit();  
		}
		
		
		while($row=mysqli_fetch_array($result)) {
			$first_name = $row["first_name"];
			$last_name = $row["last_name"];
			$id = $row["id"];
			$gender = $row["gender"];
			$district = $row["district"];
			$email_address = $row["email_address"];
			$email_notification = $row["email_notification"];
		}
	?>
	
	<center>
		<br>
<div style="width:40%">
	<form name="admin_edit" method="post" action="" onSubmit="return test_form2()">
	<br>
		
		<table>
		<tr><td><h2>Edit User Information</h2></td></tr>
		<tr>
			<td>
				<br>
				
				<b>FIRST NAME:</b><br>
				<input type="text" name="first_name" size="50" maxlength="60" value="<?php echo $first_name; ?>"><br><br>
				
				<b>LAST NAME:</b><br>
				<input type="text" name="last_name" size="50" maxlength="60" value="<?php echo $last_name; ?>"><br><br>
						
				<b>IDENTITY NO:</b><br>
				<input type="text" name="id" size="10" maxlength="10" align="right" value="<?php echo $id; ?>"><br><br>
										
				<b>GENDER:</b><br>
				<input type="radio" name="gender" value="Male" <?php if($gender == "Male") echo "CHECKED"; ?>> &nbsp; Male
				<input type="radio" name="gender" value="Female" <?php if($gender == "Female") echo "CHECKED"; ?>> &nbsp; Female
				<br><br>
				
				<b>DISTRICT:</b><br>
				<select name="district" style="background-color:#ddd;
    border-radius:0.5rem;">
					<option <?php if($district == "Colombo") echo "SELECTED"; ?>>Colombo</option>
					<option <?php if($district == "Gampaha") echo "SELECTED"; ?>>Gampaha</option>
					<option <?php if($district == "Kalutara") echo "SELECTED"; ?>>Kalutara</option>
				</select><br><br>
				
				<b>E-MAIL:</b><br>
				<input type="text" name="email" size="50" maxlength="60" value="<?php echo $email_address; ?>"><br><br>
						
				<b>SEND E-MAIL NOTIFICATIONS:</b><br>
				<input type="checkbox" name="email_notification" value="send" <?php if($email_notification == "Y") echo "CHECKED"; ?> ><br><br>
				
				
					
				<input type="hidden" name="user_name" value="<?php echo $uname; ?>">
				
					<input type="submit" name="submit" value=" Submit " class="btn">
					&nbsp;&nbsp;
					<input type="reset" name="reset_s" value="Cancel" <input type="reset" name="reset_s" value="Cancel" onclick="location.href='home.php'" class="btn">
				
			</td>
	</tr>
		</table><br></div>
	</center>
			
	</form>
	<?php
	}
	?>

</body>
</html>
