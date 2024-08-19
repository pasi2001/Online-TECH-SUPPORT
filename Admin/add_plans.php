
<?php
session_start();
if(!isset($_SESSION["uname"]))  {
	header("Location:error.html");
	exit;
 }		
$mess = "";

if(isset($_POST["submit"])) {

	//conncet to the database
	require_once("dbcon/user.php");
	include("dbcon/dbcon.php");	//database connection function

	
	$plans_name=$_POST["plans_name"];
	$plans_description=$_POST["plans_description"];
	$plans_price=$_POST["plans_price"];
	$query2 = "INSERT INTO `view_plans`(`plans_name`, `plans_description`, `plans_price`) VALUES ('$plans_name','$plans_description','$plans_price')";
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
	<title>add_plans</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../login_style.css">
	<script language="javascript">
	<!--
		function testform() {
			if(document.user.facility_No.value=='') {
				alert("Please enter the Facility No");
				return false;
			}
			if(document.user.plans_name.value=='') {
				alert("Please enter the plans_name");
				return false;
			}
			if(document.user.plans_description.value=='') {
				alert("Please enter the plans_description");
				return false;
			}
			if(document.user.plans_price.value=='') {
				alert("Please enter the plans_price");
				return false;

			return confirm("Do you want to ADD");
		}
	-->
	</script>	
</head>

<body >

	<center>
	<?php
		echo $mess;
	?>
	<br><br>
	<form name="user" method="post" action="" onSubmit="return testform()">	
	<div>
	<table>
		<tr><td><h1><center><br><b>Registration Form</b></center></h1></td></tr>
		<tr>
			<td>
				
				
				Plan Name:<br>
				<input type="text" name="plans_name" size="40" maxlength="60"><br><br>
						
				Descripton:<br>
				<input type="text" name="plans_description" size="40" maxlength="70" align="right"><br><br>
										
				Price($):<br>
				<input type="textbox" name="plans_price" size="12" maxlength="15"><br><br>
				
				<input type="submit" name="submit" value=" Submit " onclick="location.href='admin.php'" class="btn">
				&nbsp;&nbsp;
				<input type="reset" name="reset_s" value="Cancel" onclick="location.href='index.php'" class="btn">
			</td>
		</tr>
	</table><br>
	</div>
	</center>
	
	</form>

</body>
</html>