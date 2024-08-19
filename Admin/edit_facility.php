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
	
	$Facility_No=$_POST["facility_No"];
	$Facility_name=$_POST["Facility_Name"];
	$description=$_POST["Description"];
	$Price=$_POST["Price"];
	
	$user_name = $_POST["user_name"];
	
	$query2 = "UPDATE `facility_info` SET `facility_no`='$Facility_No',`facility_name`='$Facility_name',`description`='$description',`price`='$Price' WHERE facility_name = '$user_name'";
	$result2 = mysqli_query($con,$query2);
	
	if(!$result2) {
		$err=mysqli_error($con);
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
	<a href='add_facility.php' style=font-size:20px;text-decoration:none>
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
		
		$query="SELECT * FROM facility_info WHERE facility_name = '$uname'";

		$result=mysqli_query($con,$query);
		if(!$result) {	
			print mysqli_error();
			exit();  
		}
		
		
		while($row=mysqli_fetch_array($result)) {
			$facility_No=$row["facility_no"];
	       $facility_name=$row["facility_name"];
            $description=$row["description"];
	         $price=$row["price"];
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
				
				<b>Facility NO:</b><br>
				<input type="text" name="facility_No" size="50" maxlength="60" value="<?php echo $facility_No; ?>"><br><br>
				
				<b>Facility Name:</b><br>
				<input type="text" name="Facility_Name" size="50" maxlength="260" value="<?php echo $facility_name; ?>"><br><br>
						
				<b>Descripton:</b><br>
				<input type="text" name="Description" size="50" maxlength="60" align="right" value="<?php echo $description; ?>"><br><br>
									
				<b>Price($):</b><br>
				<input type="text" name="Price" size="50" maxlength="10" value="<?php echo $price ?>"><br><br>
							
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
