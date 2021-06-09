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
	<title>Motor aid</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
                    <style>
                      h1{
                        margin-top:20%;
                        text-align: center;
                      }
                      </style>
                      <script>
        
                          setTimeout('window.location="map.php";', 1000);
                        
                        


                      </script>

                    <h1>Request Sent</h1>
</body>
</html>