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


<html>
<head>
	<title>SignUp and Login</title>
	<style>
body, html {
    width: 100%;
    height: 100%;
}

body {
    margin: 0;
    padding: 0;
    background: #2A4B7C;
}

.bubbels {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
    overflow: hidden;
    top: 0;
    left: 0;
}

.bubble {
    position: absolute;
    bottom: -100px;
    background: #FBFBFB;
    border-radius: 50%;
    opacity: 0.5;
    animation: flying 10s infinite ease-in;
}

    .bubble:nth-child(1) {
        width: 40px;
        height: 40px;
        left: 10%;
        animation-duration: 8s;
    }

    .bubble:nth-child(2) {
        width: 20px;
        height: 20px;
        left: 20%;
        animation-duration: 5s;
        animation-delay: 1s;
    }

    .bubble:nth-child(3) {
        width: 50px;
        height: 50px;
        left: 35%;
        animation-duration: 10s;
        animation-delay: 2s;
    }

    .bubble:nth-child(4) {
        width: 80px;
        height: 80px;
        left: 50%;
        animation-duration: 7s;
        animation-delay: 0s;
    }

    .bubble:nth-child(5) {
        width: 35px;
        height: 35px;
        left: 55%;
        animation-duration: 6s;
        animation-delay: 1s;
    }

    .bubble:nth-child(6) {
        width: 45px;
        height: 45px;
        left: 65%;
        animation-duration: 8s;
        animation-delay: 3s;
    }

    .bubble:nth-child(7) {
        width: 25px;
        height: 25px;
        left: 75%;
        animation-duration: 7s;
        animation-delay: 2s;
    }

    .bubble:nth-child(8) {
        width: 80px;
        height: 80px;
        left: 80%;
        animation-duration: 6s;
        animation-delay: 1s;
    }

    .bubble:nth-child(9) {
        width: 15px;
        height: 15px;
        left: 70%;
        animation-duration: 9s;
        animation-delay: 0s;
    }

    .bubble:nth-child(10) {
        width: 50px;
        height: 50px;
        left: 85%;
        animation-duration: 5s;
        animation-delay: 3s;
    }

@keyframes flying {
    0% {
        bottom: -100px;
        transform: translateX(0);
    }

    50% {
        transform: translateX(100px);
    }

    100% {
        bottom: 1080px;
        transform: translateX(-200px);
    }
}

body {
   
    display: flex;
    justify-content: center;
    align-items: center;
    font-family:  sans-serif;
    height: 100vh;
    margin: -20px 0 50px; 
}

h1 { 
    font-weight: bold;
}

a { 
    color: #87e3e6;
    font-size: 15px;
    text-decoration: none; 
    margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid mediumpurple;
	background-color: #3da7e0;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
}

form {
	background-color:rebeccapurple;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {                       /*class container*/
    color: white;
                                   background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 114px 118px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    position: relative;
    width: 600px;
    height: 450px;
}

</style>

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
        <form action="forget.php" method="post">
            <h1>Change  Password</h1>
            

            <br>

            <input type="text" name="email1" placeholder="Email" required>
            <input type="password"   name="newpassword" placeholder="New Password" required> 
            <input type="password" name="confirm" placeholder=" Confirm Password" required>
            <br>

            <button name="button3">Change Password</button>
			<a href="home.php">Back </a>
    </div>

</body>
</html>
<?php
include ("connection.php");
if(isset($_POST["button3"]))
{
	$email1 =$_POST['email1'];
	$query="Select * from cust where cust_email='$email1'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result))
	{
	$email = $_POST['email1'];
	$newpass = $_POST['newpassword'];
	$conf = $_POST['confirm'];

        if($newpass==$conf){
        $sql="UPDATE cust SET cust_pass='$conf' where cust_email='$email'";
		if($conn->query($sql)===TRUE){
		}
	   echo '<script language="javascript">';
       echo 'alert("Password updated successfully")';
       echo '</script>';
		}
       else
        {
       echo '<script language="javascript">';
       echo 'alert("Password do not match")';
       echo '</script>';
       }
	}
	else {
		echo '<script language="javascript">';
		echo 'alert("Please provide correct Email Address !!")';
		echo '</script>';
	}
}
?>
