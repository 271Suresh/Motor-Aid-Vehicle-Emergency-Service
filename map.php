<?php
session_start();
$sp_id   = $_SESSION['sp_id'];

include ("connection.php");

if(isset($_SESSION['login_user'])){
	echo "<h3>Welcome <br>" . $_SESSION['login_user']."</h3>";
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}

// $sp_id = $_GET['sp'];
$sql2 = "SELECT * FROM service_provider WHERE sp_id = '$sp_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$user = $row2['latitude'];

$sql3 = "SELECT * FROM service_provider WHERE sp_id = '$sp_id'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$user1 = $row3['longitude'];
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Track Status</title>
        <style>
            *{
                margin-top: 0;
                padding-top: 0;
            }
            #map{
                height: 500px;
                width: 100%;
            }
            a:link, a:visited {
            background-color: #5995d0;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            a:hover, a:active {
            background-color: red;
            }
            
        </style>
    </head>
<body>
<div id="map"></div>
<!-- <button onclick="getLocation()">Try It</button> -->

<p id="demo"></p>

<script>
    function initMap(){
        var location = {lat: <?php echo ($user);?>, lng: <?php echo ($user1);?>};
        var map = new google.maps.Map(document.getElementById("map"),{
            zoom: 4,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        })
    }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBv87bGlAoIChtEjDmbVODvRGPwRJXf8aw&callback=initMap"
type="text/javascript"></script>


<!-- <a href='feedback.php?ci=$_SESSION[login_user]'>Provide feedback</a> -->
<table>
    <th></th>
<?php echo "<tr><td><a href='service_done.php?sp=".$sp_id."' target='_self'>Provide Feedback</a></td></tr>";?></table><br>
<a href="home.php">...Home Page</a>
</body>
</html>
        
        