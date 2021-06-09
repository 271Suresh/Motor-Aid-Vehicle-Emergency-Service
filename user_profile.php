<?php
session_start();
include ("connection.php");

if(isset($_SESSION['login_user'])){
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}

$up_email = $_GET['up'];
$sql = "SELECT * FROM cust WHERE cust_email = '$up_email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$u_name = $row['cust_name'];

$sql1 = "SELECT * FROM cust WHERE cust_email = '$up_email'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$u_img = $row1['cust_img'];   

$sql2 = "SELECT * FROM cust WHERE cust_email = '$up_email'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$u_phone = $row2['cust_phno'];
?>


<html>
<head>
	<title>SignUp and Login</title>

<style>
h1 { 
    font-weight: bold;
    color:#ffff00;
    text-align: center;
    font-family:  sans-serif;
}
h2{
    color:#ffffff;
    text-align: center;
    font-family:  sans-serif;
}
img{
    align: center;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.container {                       /*class container*/
    color: white;
                                   background-color: #3e92c4;
    border-radius: 10px;
    box-shadow: 0 114px 118px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    position: relative;
    width: 600px;
    height: 450px;
}
body {
   
   display: flex;
   justify-content: center;
   align-items: center;
   font-family:  sans-serif;
   height: 100vh;
   margin: -20px 0 50px; 
}
a { 
    color: #87e3e6;
    font-size: 15px;
    text-decoration: none; 
    margin: 15px 0;
}
form {
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}
</style>


</head>
<body>
    <div class="container" id="container">
        <form  method="post">
            <h1>User Profile</h1>
            <hr class="bg-white">
            <br>
            
            <img src="uploads/<?php echo("$u_img");?>" height="100px" width="100px" style="border-radius:50%;" alt='profile photo' class='center'>
            <h2><?php echo ("$u_name");?></h2>
            <h2><?php echo ("$u_phone");?></h2>
            <a href="home.php">Back </a> 
            


            
    </div>

</body>
</html>
