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
			
	$user_name=$_GET["uname_d"];

	$query2 = "DELETE FROM facility_info WHERE facility_name = '$user_name'";
	$result2 = mysqli_query($con,$query2);

	if(!$result2) {
		$err=mysqli_error($con);
		print $err+"delete anomally";
		exit();
	}
	
	$mess = "<font color='blue'><b>Information has been deleted.</b></font>";
	
}
?>
<!DOCTYPE html>
<head>
	<title>View User Information</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function delete_test() {
			return confirm("Do you want to delete these information");
		}
	</script>
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


	$query = $query = "SELECT * FROM facility_info ORDER BY ID";
	$result=mysqli_query($con,$query);	
	
	
	echo "<table height=30% border=1 width=100% style=
    background-image:linear-gradient(white,#5478ec33);color:black;border:white;>
\n";

	echo "
    <tr style=background-color:#5478ec33;>
    <th width='10%'>Facility No</th>
    <th width='19%'>Facility Name</th>
    <th width='30%'>Description</th>
    <th width='10%'>Price($)</th>
    </tr>
    ";
	
	
	while($myrow=mysqli_fetch_row($result))  {
		echo "<tr>";
		for($f=0;$f<mysqli_num_fields($result);$f++)  {
			if($f!=2){
			echo "<td style=text-align:center>&nbsp;".htmlspecialchars($myrow[$f]);
			}
		}
		echo "<td width='5%' align='center' bgcolor=lightgreen>
		<a href='./edit_facility.php?uname=".urlencode($myrow[1])."' style=text-decoration:none;color:white;>Edit</a>";
		echo "<td width='5%' align='center' bgcolor=red><a onClick='return delete_test()' href='?uname_d=".urlencode($myrow[1
])."' style=text-decoration:none;color:white;>Delete</a>";
	}
	echo "</table>\n";
?>
</body>
</html>