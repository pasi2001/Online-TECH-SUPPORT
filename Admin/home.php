<?php
	session_start();
	if(!isset($_SESSION["uname"]))  {
		header("Location: .../error.html");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<header class="header">

<a href="#" class="logo"><span class="ln1">Online TECH</span><br><span class="ln2">SUPPORT</span> </a>

<nav class="navbar">
    <a href="index.php" > Home </a>
    <a href="logoff.php" class="btn login"> Sign Off </a>
</nav>

</header>
<br/><br/><br/><br/>
<section class="services" id="services">

<div class="box-container">

<div class="box">
    <h3>Edit user information -></h3>
    <?php
    $name = $_SESSION['uname'];
    $query = "SELECT first_name, last_name, id, gender, district, email_address, email_notification, user_name FROM
    user_info WHERE first_name=$name";
    echo "<td width='5%' align='center' bgcolor=lightgreen>
		<a href='edit_Auser_info.php?uname=".urlencode($name)."' style=text-decoration:none; class='btn'>EDIT</a>";
        ?>
</div>

<div class="box">
    <h3>View user information -></h3>
    <a href="view_user_info.php" class="btn"> VIEW </a>
</div>
<div class="box">
    <h3>Add Facilities<br>-></h3>
    <a href="add_facility.php" class="btn"> ADD </a>
</div>

<div class="box">
    <h3>Remove Facilities <br>-></h3>
    <a href="remove_facility.php" class="btn"> REMOVE </a>
</div>

<?php
if($_SESSION["uname"]=='ucsc'){
    echo "<div class=box>
    <h3>View admin information -></h3>
    <a href=view_admin_info.php class=btn> VIEW </a>
</div>";
}
?>
<div class=box>
    <h3>View Plans -></h3>
    <a href=view_plans.php class=btn> VIEW </a>
</div>
</div>
</section>
</body>
</html>