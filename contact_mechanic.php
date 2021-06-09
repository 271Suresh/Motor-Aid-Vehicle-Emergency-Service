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
	$type_des = $_POST["type_des"];
	$prob = $_POST["prob"];
	$prob_des = $_POST["prob_des"];
	$details = $type.$type_des.$prob.$prob_des;
    $sql = "insert into service_request(sr_description,customer_id,cat_id, sp_id) values('$details','$user','2','$sp_id')";

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
	<title>Blog - Mustache Enthusiast</title>
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
		function check(){
			if(document.getElementById('dd').value!='sample')
				document.getElementById('ta').disabled=false;
			else
				document.getElementById('ta').disabled=true;
			}
		function checki(){
			if(document.getElementById('ta').value!='')
				document.getElementById('ddi').disabled=false;
			else
				document.getElementById('ddi').disabled=true;
			}
		function checkii(){
			if(document.getElementById('ddi').value !='samplei')
				document.getElementById('tai').disabled=false;
			else
				document.getElementById('tai').disabled=true;
			}
		 function manage(tai) {
				var bt = document.getElementById('proceed');
				if (tai.value != 'sample'){
					bt.disabled = false;
				}
				else {
					bt.disabled = true;
				}
			} 


		// function checkiii(){
		// 	if(document.getElementById('tai').value!='')
		// 		document.getElementById('fileToUpload').disabled=false;
		// 	else
		// 		document.getElementById('fileToUpload').disabled=true;
		// 	}
		// function manage(dropdownii) {
		// 		var bt = document.getElementById('proceed');
		// 		if (fileToUpload.value != 'sample') {
		// 			bt.disabled = false;
		// 		}
		// 		else {
		// 			bt.disabled = true;
		// 		}
		// 	}  
	</script>
</head>
<body>
	<div id="header">
		<a href="index.html" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="home.php">home</a>
			</li>
			<li>
				<a href="fuel.php">fuel service</a>
			</li>
			<li class="selected">
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
		<h1><span>contact Mechanic</span></h1>
		<div>
			<ul>
				<li>
					
						<form action="contact_mechanic.php" name="mechanic"    method ="post">

								<select name ="type" onchange="check()" id="dd" style="width:40%; font-size:150%;" >
									<option disabled selected value="sample">Vehicle Type</option>
									<option value="two_wheeler ">2 Wheeler</option>
									<option value="four_wheeler ">4 Wheeler</option>
								</select>
								
								<div style="padding-left:5%;">
									<textarea name ="type_des" onchange="checki()" id="ta" placeholder="Vehicle Description (name of the vehicle)" disabled style="width:50%; height:50%;"></textarea>
								</div>
								<br><br><br>
								<!-- <h3 style="font-size:150%;">Problem Related to:</h3> -->
								
								<select  name ="prob" onchange="checkii()" id="ddi" disabled style="width:40%; font-size:150%;">
									<option disabled selected value="samplei">Problem:</option>
									<option value=" engine ">Engine</option>
									<option value=" tire_puncture ">Tire Puncture</option>
									<option value=" Engine & tire ">Engine & Tire</option>
												
								</select>
								
								<div style="padding-left:5%;">
								<textarea disabled  onclick="manage(this)"  name="prob_des" id="tai" placeholder="Describe Problem Here" style="width:50%; height:50%;"></textarea>
								</div>
								<br><br>

								<!-- <h3>Upload image:</h3>
								<input type="file" disabled id="fileToUpload" name="image1" onclick="manage(this)" style="width:50%; height:50%;"> -->

								<!-- <div style="padding-left:20%;"> -->
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
