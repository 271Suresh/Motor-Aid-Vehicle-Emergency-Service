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
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Motor aid</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            <a href="spforget.php">Change Password</a>
            <?php echo "<a href='sp_profile.php?spp=$_SESSION[login_sp]'>Service Provider Profile</a>";?>
            <a href="sp_logout.php">logout</a>
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


	<div id="header">
		<a href="home.html" class="logo">
			<img src="images/logo.jpg" alt="">
        </a>
        <h1><b>Service Provider</b></h1>
		<ul id="navigation">
			<li class="selected">
				<a href="service_provider.php">All Request</a>
            <!-- </li>
            <li>
				<a href="f_request.php">Fuel Request</a>
            </li>
            <li>
				<a href="m_request.php">Mechanic Request</a>
            </li>
            <li>
				<a href="t_request.php">Towing Request</a>
            </li> -->
			      <li>
				<a href="sp_about.php">About us</a>
            </li>
            
		</ul>
	</div>
	<div id="body">
        <h1><span>current Request</span></h1>

    <table class="table">
                      <thead class=" text-primary">
                      <th>
                          ID
                        </th>
                        <th>
                          Description
                        </th>
                        <!-- <th>
                          Customer ID
                        </th> -->
                        <th>
                          Customer Name
                        </th>
                        <!-- <th>
                          Category ID
                        </th> -->
                        <th>
                          Category name
                        </th>
                        <th>
                          
                        </th>
            
                        
                      </thead>
                      <tbody>
                        <?php
                        include ("spconnection.php");

                        // $sr_id = $_GET['sp'];

                        // $sql = "SELECT cust_id, cust_name, cust_lname, cust_address, cust_phno, cust_img, cust_email from cust where cust_email = '$sr_id'";
                        // $result = $conn->query($sql);

                        // if($result->num_rows > 0){
                        //   while($row = $result->fetch_assoc()){
                        //     echo "<tr><td>". $row["cust_id"]."</td><td>". $row["cust_name"]."</td><td>". $row["cust_lname"]."</td><td>". $row["cust_address"].
                        //     "</td><td>". $row["cust_phno"]."</td><td>" 
                        //     <?php echo "</td><td>". $row["cust_email"]."</td></tr>";
                            
                        // $sql = "SELECT sr_id, sr_description, customer_id, cat_id from service_request";
                        // $result = $conn->query($sql);

                        // if($result->num_rows > 0){
                        //   while($row = $result->fetch_assoc()){
                        //     echo "<tr><td>". $row["sr_id"]."</td><td>". $row["sr_description"]."</td><td>". $row["customer_id"]."</td><td>". $row["cat_id"].
                        //     "</td><td><a href='service_provider.php'>Accept</td></td>".
                        //     "</td><td><a href='delete_sr.php?sr=$row[sr_id]'>Reject</td></td>";

                        $sql = "SELECT sr.sr_id, sr.sr_description, cust.cust_name, cat.cat_name from service_request sr,
                          cust, category cat where cust.cust_id= sr.customer_id and  cat.cat_id=sr.cat_id and sr.sp_id=" . $_SESSION['sp_id'] ;
                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                          while($row = $result->fetch_assoc()){
                            echo "<tr><td>". $row["sr_id"]."</td><td>". $row["sr_description"]."</td><td>". $row["cust_name"]."</td><td>". $row["cat_name"].
                            "</td><td><a href='service_process.php?srs=$row[sr_id]'>Payment</a></td></td>";

                          }
                          
                          echo "</table>";
                          echo $_SESSION['login_sp'];
                          echo $_SESSION['sp_id'];
                        }
                        else{
                          echo "0 result";
                        }
                        $conn->close();
                        ?>
                        </table>
                        
                      </tbody>
                    </table>

    </div>
    <br>
    <!-- <div class="slideshow-container">
        <div class="mySlides1">
          <img src="sp_image1.jpg" style="width:100%">
        </div>
      
        <div class="mySlides1">
          <img src="sp_image2.jpg" style="width:100%">
        </div>
      
        <div class="mySlides1">
          <img src="sp_image3.jpg" style="width:100%">
        </div>
      
        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
      </div>
      <br>
      <br>
    <script>
        var slideIndex = [1,1];
        var slideId = ["mySlides1", "mySlides2"]
        showSlides(1, 0);
        showSlides(1, 1);
        
        function plusSlides(n, no) {
          showSlides(slideIndex[no] += n, no);
        }
        
        function showSlides(n, no) {
          var i;
          var x = document.getElementsByClassName(slideId[no]);
          if (n > x.length) {slideIndex[no] = 1}    
          if (n < 1) {slideIndex[no] = x.length}
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";  
          }
          x[slideIndex[no]-1].style.display = "block";  
        }
        </script> -->
        
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
