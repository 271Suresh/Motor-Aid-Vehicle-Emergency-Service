<?php
include ("connection.php");

$sr_id = $_GET['sr'];
$sql = "DELETE from service_request where sr_id = '$sr_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: table_sr.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to service_process or feedback table*")';
    echo '</script>';
    echo "<script>location.href='table_sr.php'</script>";
}
?>
