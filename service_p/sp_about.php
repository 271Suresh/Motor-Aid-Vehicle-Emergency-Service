<?php
session_start();

if(isset($_SESSION['login_sp'])){
	echo "<h3>Welcome <br>" . $_SESSION['login_sp']."</h3>";
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='../index.php'</script>";
}
?>


<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About - Mustache Enthusiast</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
	<script type="text/javascript" src="js/mobile.js"></script>
</head>
<body>
<div id="header">
		<a href="home.html" class="logo">
			<img src="images/logo.jpg" alt="">
        </a>
        <h1><b>Service Provider</b></h1>
		<ul id="navigation">
			<li>
				<a href="service_provider.php">All Request</a>
            </li>
            <!-- <li>
				<a href="f_request.php">Fuel Request</a>
            </li>
            <li >
				<a href="m_request.php">Mechanic Request</a>
            </li>
            <li>
				<a href="t_request.php">Towing Request</a>
            </li> -->
			      <li class="selected">
				<a href="sp_about.php">About us</a>
            </li>
		</ul>
	</div>
	<div id="body">
		<div>
			<p>Our app will help in providing services such as fuel. If the vehicle is lacking fuel than the app will display all the available service providers for this particular service. Then the person can  choose the service provider and the service will be provided  by sending a volunteer to the location with fuel. In case the problem with the vehicle is not related to fuel but any mechanical issue, than the app will track the person’s location and display all the service providers related to this particular service then the person can contact the available mechanic for any mechanical issue. But if the person is not able to encounter what the actual problem with the vehicle is then he can choose the third service that is provided by the app which is toeing. By selecting this service all the service providers will be displayed on the app. Once the person chooses the service provider the app will automatically track his location and will provide him with a toeing service. once the service is provided payment is calculated on the basis of the distance, the type of service and the individual charges of the service provider.</p>
		</div>
	</div>
	<div id="footer">
		<div>
		<p>&copy VEHICAL EMERGENCY SERVICE SYSTEM</p>
			<ul>
				<li>
					<a href="https://twitter.com/login" id="twitter">twitter</a>
				</li>
				<li>
					<a href="https://www.facebook.com/" id="facebook">facebook</a>
				</li>
				<li>
					<a href="https://www.google.com/" id="googleplus">googleplus</a>
				</li>
				
			</ul>
		</div>
	</div>
</body>
</html>
