<?php
include ("connection.php");
session_start();
//insert
if(isset($_POST["button1"]))
{
$name = $_POST["name1"];
$lname = $_POST["lname1"];
$add = $_POST["add1"];
$phone = $_POST["phone1"];
$image = $_FILES["cust_img"]["name"];
$email = $_POST["email1"];
$pass = $_POST["password1"];
$sql = "insert into cust(cust_name,cust_lname,cust_address,cust_phno,cust_img,cust_email,cust_pass) values('$name','$lname','$add','$phone','$image','$email','$pass')";


if($conn->query($sql)===TRUE){

    move_uploaded_file($_FILES["cust_img"]["tmp_name"], "uploads/".$_FILES["cust_img"]["name"]);
    echo '<script language="javascript">';
    echo 'alert("You have successfully created account")';
    echo '</script>';

}else{
	echo '<script language="javascript">';
    echo 'alert("Invalid account)';
    echo '</script>';
}
}


//checking
if(isset ($_POST["button2"]))
{
$email1 =$_POST['email'];
$pass2 =$_POST['password'];
	$query="Select * from cust where cust_email='$email1' and  cust_pass='$pass2'";
	$result=mysqli_query($conn, $query);
	if(mysqli_num_rows($result))
	{
		
        $_SESSION['login_user'] = $email1;
		header('location:home.php');
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
	<link rel="stylesheet" type="text/css" href="log_style.css"/>
	
	
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
    <!-- registration -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">

            <form name="signup"   action="signlog.php" method="post" enctype="multipart/form-data">
                <h1>Create User Account</h1>

                <br>
                <br>
                <input type="text" name="name1" placeholder="First Name" required>
                <input type="text" name="lname1" placeholder="Last Name" require>
                <input type="text" name="add1" placeholder="Address" required>
                <input type="text" onblur="phoneValidate(this);" name="phone1" placeholder="Phone no" required>
				Select image to upload:
				<input type="file" id="fileToUpload" name="cust_img">
                <input type="email" onblur="emailValidate(this);" name="email1" placeholder="Email" required>
                <input type="password" name="password1" placeholder="Password" required>
                <br>
                <button name="button1">SignUp</button>
            </form>
        </div>
        <!-- login  -->
        <div class="form-container sign-in-container">
            <form  method="post">
                <h1> Login as User</h1>

                <br>
                <br>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <!-- <a href="forget.php">Change Password</a> -->
                <!-- <a href="delete.php">Remove Account</a> -->
                <br><br>

                <button name="button2">Login</button>
				
				
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
                    <h1>Hi To Create New User Account Please</h1>
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