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
	
	$plans_name=$_POST["plans_name"];
	$plans_description=$_POST["plans_description"];
	$plans_price=$_POST["plans_price"];
	
	$user_name = $_POST["user_name"];
	
	$query2 = "UPDATE `view_plans` SET `plans_name`='$plans_name',`plans_description`='$plans_description',`plans_price`='$plans_price' WHERE plans_name = '$user_name'";
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
	<a href='view_plans.php' style=font-size:20px;text-decoration:none>
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
		
		$query="SELECT * FROM view_plans WHERE plans_name = '$uname'";

		$result=mysqli_query($con,$query);
		if(!$result) {	
			print mysqli_error();
			exit();  
		}
		
		
		while($row=mysqli_fetch_array($result)) {
	       $plans_name=$row["plans_name"];
            $plans_description=$row["plans_description"];
	         $plans_price=$row["plans_price"];
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
				
				
				<b>Plan name:</b><br>
				<input type="text" name="plans_name" size="50" maxlength="260" value="<?php echo $plans_name; ?>"><br><br>
						
				<b>Descripton:</b><br>
				<input type="text" name="plans_description" size="50" maxlength="60" align="right" value="<?php echo $plans_description; ?>"><br><br>
									
				<b>Price($):</b><br>
				<input type="text" name="plans_price" size="50" maxlength="10" value="<?php echo $plans_price ?>"><br><br>
							
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
