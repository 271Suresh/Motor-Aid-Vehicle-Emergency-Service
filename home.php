<?php
session_start();

if(isset($_SESSION['login_user'])){
	echo "<h3>Welcome <br>" . $_SESSION['login_user']."</h3>";
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Motor aid</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
	<script type="text/javascript" src="js/mobile.js"></script>
	<style>
		.login a p {display:none;}
		.login a:hover p {display:block;}
		.login a:hover {display:block;}
	</style>
	     <style>
			.dropbtn {
			background-color: #3498DB;
			color: white;
			padding: 8px;
			margin-top: none;
			font-size: 16px;
			border: none;
			cursor: pointer;
			}

			.dropbtn:hover, .dropbtn:focus {
			background-color: #2980B9;
			}

			.dropdown {
			position: absolute;
			display: inline-block;
			}

			.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
			}

			.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			}

			.dropdown a:hover {background-color: #ddd;}

			.show {display: block;}
		</style>
	

</head>
<body>
			
	<div class="dropdown" style="float:right;">
		<button onclick="myFunction()" class="dropbtn">=</button>
		<div id="myDropdown" class="dropdown-content">
			<a href="forget.php">Change Password</a>
			<?php echo "<a href='user_profile.php?up=$_SESSION[login_user]'>User Profile</a>";?>
			<a href="logout.php">logout</a>
			
			<!-- <a href="#contact">Contact</a> -->
		</div>
	</div>
		
	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			}
			}
		}
		}
	</script>
	<!-- <div class="login">
   			<a href=""><img src="images/user_img.jpg" style="border-radius: 50%; width:10%; float:right; ">
        		<p>Access your profile here</p>
    		</a>
		</div> -->

	<!-- <div style="float:right">
		<form  name="form1" method="post" action="logout.php" >

		  <label class="logoutLblPos">
		  <input name="submit2" type="submit" id="submit2" value="log out">
		  </label>
		</form>
		</div> -->
	<div id="header">
		
		<a href="home.php" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li class="selected">
				<a href="home.php">home</a>
			</li>
			<li>
				<a href="fuel_available.php">fuel service</a>
			</li>
			<li>
				<a href="contact_mechanic_avail.php">contact mechanic</a>
			</li>
			<li>
				<a href="tow_avail.php">towing service</a>
			</li>
			<li>
				<a href="about.php">about</a>
			</li>
			<!-- <li>
				<a href="contact.html">contact</a>
			</li> -->
		</ul>
	</div>
	<div id="body">
		
		
		<div id="featured">
			<img src="images/bg.jpg" alt="">
			<div>
				<h2>Vehical Emergency Service System</h2>
				<span>Our website provide fuel service</span>
				<span>You can contact mechanic</span>
				<span>and also towing service.</span><br>
				<a href="blog-single-post.html" class="more">read more</a>
			</div>
		</div>
		
		<ul>
			<li>
				<a href="fuel_available.php">
					<img src="images/fuel.jpg" alt="">
					<span>FUEL Service</span>
				</a>
			</li>
			<li>
				<a href="contact_mechanic_avail.php">
					<img src="images/cm.jpg" alt="" >
					<span>Contact Mechanic</span>
				</a>
			</li>
			<li>
				<a href="tow_avail.php">
					<img src="images/tow1.jpg" alt="">
					<span>Towing Service</span>
				</a>
			</li>
		</ul>
		
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