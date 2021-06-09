<?php
include ("spconnection.php");
session_start();

if(isset($_SESSION['login_sp'])){
	// echo "<h3>Welcome <br>" . $_SESSION['login_sp']."</h3>";
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='../index.php'</script>";
}



$email = $_SESSION['login_sp'];
$sql2 = "SELECT * FROM service_provider WHERE sp_email = '$email'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$user = $row2['sp_id'];


//insert
if((isset($_POST["button1"])))
{
$jobdone = $_POST["jobdone"];
$charges = $_POST["charges"];
$travel = $_POST["travel"];
$ser_id = $_POST["sr_id"];
// $ser_id = $_GET['srs'];
$sql = "insert into service_process(job_done_des, service_charges, travel_exp, sr_id) values('$jobdone','$charges','$travel','$ser_id')";


if($conn->query($sql)===TRUE){
  header("location:payment.php");


}else{
    header("location:payment_error.php");
    
}
}
$conn->close();
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
    background: #ebebeb;
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
    background: #57bfd9;
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
    color: #ebebeb;
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
	background-color:#87e05e;
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
<script>
function calculate(){
    var field1= document.getElementById("num1").value;
    var field2= document.getElementById("num2").value;

    var result= parseFloat(field1)+parseFloat(field2);

    if(!isNaN(result)){
        document.getElementById("answer").innerHTML= +result;
    }


}
</script>

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
        <form action="service_process.php" method="post">
            <h1>Payment</h1>

            <br>

            <textarea id="" name="jobdone" placeholder="Job done description" required></textarea><br>
            <input type="text" name="charges" id="num1" placeholder="Service Charges in ₹" required>
            <input type="text" name="travel" id="num2" placeholder="travel expenses" >
            <input type="text" HIDDEN name="sr_id" value="<?php echo ($_GET['srs']);?>" placeholder="" >
            <!-- <input type="text" name ="total" id="answer" onchange="calculate()"> -->
            <h1 id="answer" onclick="calculate()">Generate Total</h1>
            
            
            <br>

            <button name="button1" type="submit" >Done</button>
			<a href="service_provider.php">Back</a>
    </div>

</body>
</html>
