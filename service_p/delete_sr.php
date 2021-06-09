<?php
include ("spconnection.php");

$sr_id = $_GET['sr'];
$sql = "DELETE from service_request where sr_id = '$sr_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: service_provider.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to another table*")';
    echo '</script>';
    echo "<script>location.href='tables.php'</script>";
}
?>