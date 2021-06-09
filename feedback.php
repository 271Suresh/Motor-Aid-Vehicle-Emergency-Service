<?php
session_start();
include ('connection.php');

if(isset($_SESSION['login_user'])){
    
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}

$email = $_SESSION['login_user'];
$sql2 = "SELECT * FROM cust WHERE cust_email = '$email'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$user = $row2['cust_id'];


//insert
if((isset($_POST["button1"])))
{
$comment = $_POST["comment"];
$ex = $_POST["experience"];
$sr_proc_id = $_POST["spc_id"];
// $ser_id = $_GET['srs'];
$sql = "insert into feedback(cust_id, comments, ratings, sr_proc_id) values('$user','$comment','$ex','$sr_proc_id')";


if($conn->query($sql)===TRUE){
  


}else{
	echo '<script language="javascript">';
    echo 'alert("error")';
    echo '</script>';
}
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
 	<title>Feedback Form</title>

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
        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            /* width: 100%; */
        }
        button {
            border-radius: 20px;
            border: 1px solid white;
            background-color: #3da7e0;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
</style>

</head>

<body>	

<div class="container" id="container">
        <form  method="post">
			
			<h1>Feedback</h1>
			<hr class="bg-white">
			<h2>Please write your feedback below:</h2>
                <!-- <input type="text" name="email1" placeholder="Email" required><br> -->
                <input type="text" name="comment" placeholder="your comment"></textarea><br>
                <h3>How do you rate your overall experience?</h3>

                <label class="radio-inline"><input type="radio" name="experience" value="bad">Bad</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="experience" value="average">Average</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="experience" value="good">Good</label>&nbsp;
                <input type="text" HIDDEN name="spc_id" value="<?php echo ($_GET['spc']);?>" >

                

                <br>
                <br>
                <button name="button1">Submit</button>
                <br><br>
                <a href="home.php">Back </a>


</div>

</body>
</html>  