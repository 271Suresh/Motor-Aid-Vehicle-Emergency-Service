<?php
session_start();

if(isset($_SESSION['login_user'])){
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
				#body div ul li div button:hover {
					color: #252525;
					background: #fff;
					border: 2px solid #252525;
				}

			#sp {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
				font-size: 150%;
				}

			#sp td, #sp th {
				border: 1px solid #ddd;
				padding: 2%;
				}

			#sp tr:nth-child(even){background-color: #f2f2f2;}

			#sp tr:hover {background-color: #ddd;}

			#sp th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: center;
				background-color: #4CAF50;
				color: white;
				}

				
						
		</style>
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
			<li >
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
		<h1><span>Available Machenic</span></h1>
		<div>
			<ul>
				<li>
					
				<table id="sp">
						<tr>
						<th>ID</th>
						<th>Name</th>
						<!-- <th>Lastname</th> -->
						<th>Contact</th>
						<th>Photo</th>
						<th>Send Request</th>
						</tr>
						<?php
						include ("connection.php");

						$sql = "SELECT sp_id, sp_name, sp_phno, sp_img FROM service_provider where service_type='mechanic'";
						$result = $conn->query($sql);
			
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								echo "<tr><td>". $row["sp_id"]."</td><td>". $row["sp_name"]."</td><td>" .$row["sp_phno"]."</td><td>"?> 
								<img src="uploads/<?php echo $row["sp_img"];?>" height="30px" width="30px" style="border-radius:50%;"><?php echo
								"</td><td><a href='contact_mechanic.php?sp=$row[sp_id]'>Send</td></tr>";

							}
							echo "</table>";
						}
						else{
							echo "0 result";
						}
						$conn->close();
						?>
						</table>
						
						
						<!-- <div style="padding-left:20%;" >
						<button class="button" onclick="window.location.href = 'home.html';" id="proceed" disabled>Click Here</button>
						</div> -->
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
