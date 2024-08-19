<?php
include("dbcon/user.php");
require_once("dbcon/dbcon.php");

$query = "SELECT * FROM facility_info ORDER BY ID";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Technical Support Management System</title>
    
    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="header">

    <a href="#" class="logo"><span class="ln1">Online TECH</span><br><span class="ln2">SUPPORT</span> </a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#services">Facilities</a>
        <a href="#about">About</a>
        <a href="logoff.php" class="btn login"> Sign Off </a>
    </nav>

</header>

<section class="home" id="home">
    <div class="content">
        <h3 class="h3">We are one click away</h3>
    </div>

    <div class="image">
        <img src="../Images/tech.jpg" alt="bg">
    </div>

    <div class="content">
        <p>Do what you do at best! We will take care of rest!
            Let our remote technical team assist you in eliminating all your technical hurdles.</p>
        <a href="#contact" class="btn"> contact us </a>
    </div>

</section>

<section class="services" id="services">

    <h1 class="heading"> Facilities </h1>

    <div class="box-container">
    <?php
    while($myrow=mysqli_fetch_row($result))  {
		echo "<tr>";
		for($f=1;$f<mysqli_num_fields($result)-1;$f++)  {
			echo "<div class=box id=$f+1>";
            echo"<h3>".htmlspecialchars($myrow[$f]);
            echo "</h3><p>".htmlspecialchars($myrow[$f+2]);
            $f=$f+3;
            echo "<br><a href=login.php class=btn> learn more </a></div>";
		}
    }
        ?>
    <!-- <div class="box" id="b1">
            <h3>Tech Support</h3>
            <p>Tech support reps troubleshoot customer tech problems. They resolve issues related to computers, phones, tablets, modems, internet, networks, software, and the like. </p>
            <a href="../Facilities/fac1.php" class="btn"> learn more </a>
        </div>

        <div class="box" id="b2">
            <h3>Brand Support</h3>
            <p>Feeling stuck due to outdated/corrupted applications or drivers? Resolve annoying Brand computer/laptop technical issues within no time.</p>
            <a href="../Facilities/fac2.php" class="btn"> learn more </a>
        </div>

        <div class="box" id="b3">
            <h3>Security</h3>
            <p>Isn't it terrible when you found your PC runs as slow as molasses? If your computer has bad performances, then you have landed on the right place.</p>
            <a href="../Facilities/fac3.php" class="btn"> learn more </a>
        </div>

        <div class="box" id="b4">
            <h3>Windows Services</h3>
            <p>Microsoft Windows services, formerly known as NT services, enable you to create long-running executable applications that run in their own Windows sessions.</p>
            <a href="../Facilities/fac4.php" class="btn"> learn more </a>
        </div>

        <div class="box" id="b5">
            <h3>Computer Services</h3>
            <p>Computer services means the product of the use of a computer, the information stored in the computer, or the personnel supporting the computer.</p>
            <a href="../Facilities/fac5.php" class="btn"> learn more </a>
        </div>

        <div class="box" id="b6">
            <h3>Gadget Support</h3>
            <p>A gadget is a small machine or device which does something useful. You sometimes refer to something as a gadget you are suggesting that it is complicated.</p>
            <a href="../Facilities/fac6.php" class="btn"> learn more </a>
        </div> -->

    </div>

</section>

<section class="about" id="about">

    <h1 class="heading"> <span>About</span> us </h1>

    <div class="row">

        <div class="content">
            <h2>Remote Computer Support To Solve All Your Technical Problems</h2>
            <p>Online TECH SUPPORT is a leading tech support brand which renders non-stop support to its consumers and businesses across the globe. Since our humble beginning, we have primarily focused on making technology simpler for the world by delivering turnkey technical support solutions for computers and peripherals.</p>
            <p>How we instantly fix technical conflicts? </p>
            <a href="../aboutus.php" class="btn"> See more </a>
        </div>

    </div>

</section>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">  Home </a>
            <a href="#services">  Facilities </a>
            <a href="#about">  About </a>
        </div>

        <div class="box">
            <h3>Facilities</h3>
            <a href="#b1">  Tech Support </a>
            <a href="#b2">  Brand Support </a>
            <a href="#b3">  Security </a>
            <a href="#b4">  Windows Services </a>
            <a href="#b5">  Computer Services </a>
            <a href="#b6">  Gadget Support </a>
        </div>

        <div class="box">
            <h3 id="contact">Contact info</h3>
            <a href="">  +94 11 2750509 </a>
            <a href="">  onlinetech@gmail.com </a>
            <a href="">  No.26/7, Yahampath Garden, Maharagama, Colombo, Sri Lanka. </a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#">  facebook </a>
            <a href="#">  twitter </a>
            <a href="#">  instagram </a>
            <a href="#">  linkedin </a>
                </div>

    </div>

    <div class="credit"> created by <span>Online TECH SUPPORT</span> | all rights reserved </div>

</section>

<script src="../script.js"></script>

</body>
</html>
