<?php
include ("spconnection.php");
session_start();
//insert
if(isset($_POST["button1"]))
{
    $name = $_POST["name1"];
    // $lname = $_POST["lname1"];
    $add = $_POST["add1"];
    $phone = $_POST["phone1"];
    $image = $_FILES["sp_img"]["name"];
    $type = $_POST["type"];
    $email = $_POST["email1"];
    $pass = $_POST["password1"];
    $lati = $_POST["latitude"];
    $longi = $_POST["longitude"];
    $sql = "insert into service_provider(sp_name,sp_address,sp_phno,sp_img,service_type,sp_email,sp_pass,latitude,longitude) values('$name','$add','$phone','$image','$type','$email','$pass','$lati','$longi')";

if($conn->query($sql)===TRUE){
    move_uploaded_file($_FILES["sp_img"]["tmp_name"], "../uploads/".$_FILES["sp_img"]["name"]);
    echo '<script language="javascript">';
    echo 'alert("You have successfully created account")';
    echo '</script>';

}else{
	echo '<script language="javascript">';
    echo 'alert("Account Already Exist")';
    echo '</script>';
}
}
//checking
if(isset ($_POST["button2"]))
{
$email1 =$_POST['email'];
$pass2 =$_POST['password'];
	$query="Select * from service_provider where sp_email='$email1' and  sp_pass='$pass2'";
	$result=mysqli_query($conn, $query);
	if(mysqli_num_rows($result))
	{
        while($row = $result->fetch_assoc()){
        $_SESSION['login_sp'] = $email1;
        $_SESSION['sp_id'] = $row['sp_id'];
        }
        header('location:service_provider.php');
	}
else{
	echo '<script language="javascript">';
    echo 'alert("Invalid Email Or Password")';
    echo '</script>';
}
}
$conn->close();
?>


<html>
<head>
	<title>SignUp and Login</title>
	<script>
		function emailValidate(emailField){
			var x=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9-]{5})+\.([A-Za-z]{2,4})$/;
			if (x.test(emailField.value)==false)
			{
				alert('invalid Email Address');
				return false;
			}
			return true;
		}
	</script>
	<script>
		function phoneValidate(phoneField){
			var x=/^\d{10}$/;
			if (x.test(phoneField.value)==false)
			{
				alert('invalid phone no');
				return false;
			}
			return true;
		}

        

	</script>
    <script>
    function myfunction(){
            
                navigator.geolocation.getCurrentPosition(function(position) {
            
                    // Get the coordinates of the current position.
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    document.getElementById("lati").value=lat;
                    document.getElementById("longi").value=lng;

                    
                    
                });

                
            
            }
    </script>
	
	<link rel="stylesheet" type="text/css" href="sp_style.css?rnd=132">

</head>
<body>
    <div class="bubbels">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">

            <form name="signup"   action="spsignlog.php" method="post" enctype="multipart/form-data">
                <h3>Create Service Provider Account</h3>
                
                <input type="text" name="name1" placeholder="Full Name" required/>
                <!-- <input type="text" name="lname1" placeholder="Last Name" require/> -->
                <input type="text" name="add1" placeholder="Address" required/>
                <input type="text" onblur="phoneValidate(this);" name="phone1" placeholder="Phone no" required/>
				Select image to upload:
				<input type="file" id="fileToUpload" name="sp_img"/>
				Select Service:<select name ="type">
                <!-- <option disabled selected value="sample">Select Service</option> -->
                <option value="fuel">Fuel Service</option>
                <option value="mechanic">Mechanic</option>
                <option value="towing">Towing</option>
                </select>
                <input type="email" onblur="emailValidate(this);" name="email1" placeholder="Email" required/>
                <input type="password" name="password1" placeholder="Password" required/>
                <input type="text" id="lati" name="latitude" placeholder="Latitude" />
                <input type="text" id="longi" name="longitude" placeholder="Longitude" />

                <button onclick="myfunction()">Find latitude and longitude</button>
                <!-- <a href ="" onclick="myFunction()">Try it</a> -->
                
                <!-- <button onclick="myfunction()">get coordinates</button> -->
                
                <button name="button1">SignUp</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form  method="post">
                <h1> Login as Service Provider</h1>

                <br>
                <br>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <!-- <a href="spforget.php">Forgot Password</a> -->
                <!-- <a href="delete.php">Remove Account</a> -->
                <br><br>
                <button name="button2">Login</button><br>


                <!-- <h4><u>get coordinates location before registration</u></h4>
                <a href="" onclick="myfunction()">Find latitude and longitude</a> -->
				
				
				<!-- <a href="display.php">Display all the user account</a> -->
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Log In</h1>
                    <p>Please Enter Your Details </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi To Create New Sevice Provider Account Please</h1>
                    <p>Enter Your Details </p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>


</body>
</html>
