<?php
	session_start();
	if(!isset($_SESSION["uname"]))  {
		header("Location:error.html");
		exit;
	}		
	

	$mess = "";

if(isset($_GET["uname_d"])) {

	include("dbcon/user.php");
	require_once("dbcon/dbcon.php");
			
	
	
}
?>
<html>
<head>
	<title>View User Information</title>
	<link rel="stylesheet" href="style.css">
	
</head>

<body style="background-image: linear-gradient(to right,white, white, white);font-family:'Poppins',san-serif">
<header class="header">

<a href="#" class="logo"><span class="ln1">Online TECH</span><br><span class="ln2">SUPPORT</span> </a>

<nav class="navbar">
	<a href="index.php">Home</a>
	<a href="home.php">Dashboard</a>
	<a href="logoff.php" class="btn login">Sign Off</a>
</nav>

</header>
<br><br><br><br>
<h2 align="center" style="
    blue: #2b468b;
    light-blue: .5rem .5rem 0 #afc3ff;
    black: #444;
    light-color: #777;
    box-shadow: .5rem .5rem 0 rgba(84, 120, 236, 0.2);
    /* text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2); */
    border: .2rem solid var(
    --blue);
    border2: .2rem solid var(
    --black);
">View User Information</h2>
		
		<?php
			echo "$mess<br>";
		?>

<?php
	
	include("dbcon/user.php");
	require_once("dbcon/dbcon.php");


	$query = "SELECT * FROM facility_info ORDER BY ID";
	$result=mysqli_query($con,$query);	
	
	
	echo "<table height=30% border=1 width=100% style=
    background-image:linear-gradient(white,#5478ec33);color:black;border:white;>
\n";

	echo "
		<tr style=background-color:#5478ec33;>
		
		<th width='19%'>Facility Name</th>
		<th width='30%'>Description</th>
		<th width='10%'>Price($)</th>
		</tr>
		";
	
	
	while($myrow=mysqli_fetch_row($result))  {
		echo "<tr>";
		for($f=0;$f<mysqli_num_fields($result);$f++)  {
			if($f!=2){
			if($f!=3){
			echo "<td style=text-align:center;>&nbsp;".htmlspecialchars($myrow[$f]);
			}
			else{
				echo "<td>&nbsp;".htmlspecialchars($myrow[$f]);
			}
		}
	}
}
	
	echo "</table>\n";
	echo "<td width='10%' align='center'>"?>
		<a href='adding_facility.php' style="text-decoration:none;
		color: black;
		background-color: white;
		font-size:20px;
		box-shadow: 0.2rem 0.2rem 0 rgba(84, 120, 236, 0.2);
		border:.1rem solid black;
		padding:2px;">+ ADD</a><br>
		
</body>
</html>
