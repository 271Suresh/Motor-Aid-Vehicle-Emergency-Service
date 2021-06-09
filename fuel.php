<?php
include ("connection.php");
session_start();
$_SESSION['sp_id']   = $_GET['sp'];

$email = $_SESSION['login_user'];
$sql2 = "SELECT * FROM cust WHERE cust_email = '$email'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$user = $row2['cust_id'];

$sp_id= $_GET['sp'];
//insert
if(isset($_POST["button1"]))
{
	$type = $_POST["type"];
	$ltr = $_POST["ltr"];
	$details = $type. $ltr;
    $sql = "insert into service_request(sr_description,customer_id,cat_id, sp_id) values('$details','$user','1','$sp_id')";

if($conn->query($sql)===TRUE){
	
	header('location:map.php');
}else{
	echo '<script language="javascript">';
    echo 'alert("Error")';
    echo '</script>';
}
}

if(isset($_SESSION['login_user'])){
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}

$conn->close();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fuel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
	<script type="text/javascript" src="js/mobile.js"></script>
	<style>
			select{
				width:20%;
				margin:0%;
			}
			select:focus{
				min-width:20%;
				width:auto;
			}
			h3{
				padding:20%;
			}
			.button {
				background-color: #000; 
				border: none;
				color: white;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 18px;
				font-family: "Arial Black", Gadget, sans-serif;
				font-weight: normal;
				text-transform: uppercase;
				}
				#body div ul li button:hover {
					color: #252525;
					background: #fff;
					border: 2px solid #252525;
				}
						
		</style>
		<script language="javascript">
			// document.getElementById(dropdownii).setAttribute("disabled", false);
			// function enableDisable(bEnable, dropdownii)
			// {
			// 	 document.getElementById('dropdownii').disabled = !bEnable;
			// }

			// // function disable()
			// // {
			// // document.getElementById('dropdownii').disabled = true;
			// // }
			function check(){
				if(document.getElementById('dropdowni').value!='sample')
					document.getElementById('dropdownii').disabled=false;
				else
					document.getElementById('dropdownii').disabled=true;
				}
			function manage(dropdownii) {
				var bt = document.getElementById('proceed');
				if (dropdownii.value != 'sample') {
					bt.disabled = false;
				}
				else {
					bt.disabled = true;
				}
			}   
			// function checki(){ 
			// 	if(document.getElementById('dropdownii').value!='sample')
			// 		document.getElementById('proceed').disabled = false;
			// 	else
			// 		document.getElementById('proceed').disabled=true;
			// }
		</script>
</head>
<body >



	<div id="header">
		<a href="index.html" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="home.php">home</a>
			</li>
			<li class="selected">
				<a href="fuel.php">fuel service</a>
			</li>
			<li>
				<a href="contact_mechanic.php">contact mechanic</a>
			</li>
			<li>
				<a href="tow.php">towing service</a>
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
		<h1><span>Fuel Service</span></h1>
		<div>
			<ul>
				<li>
					
						<form  name="fuel"    method ="post" >
								
								<select name ="type"  onchange="check()" id="dropdowni" style="width:40%; font-size:200%;">
									<option disabled selected value="sample">Select Fuel</option>
									<option value="petrol">Petrol</option>
									<option value="diesel">Diesel</option>
								</select>
							
								<br><br><br>
								<select name ="ltr" id="dropdownii" style="width:30%; font-size:200%;"  disabled onclick="manage(this)">
									<option disabled selected value="sample">Ltr</option>
									<option value=" ltr:one">1</option>
									<option value=" ltr:two">2</option>
									<option value=" ltr:three">3</option>
									<option value=" ltr:four">4</option>
									<option value=" ltr:five">5</option>
								</select>

								<br>
								<br>
								<br>

								<!-- <div style="padding-left:20%;" > -->
								<button class="button" name="button1" id="proceed" disabled>Continue</button>
								<!-- </div> -->
								<br><br>
						</form>
						
						
						
				</li>
			</ul>
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



  