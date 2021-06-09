<?php
include ("connection.php");

$sp_id = $_GET['sp'];
$sql = "DELETE from service_process where sr_proc_id = '$sp_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: table_sp.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to feedback table*")';
    echo '</script>';
    echo "<script>location.href='table_sp.php'</script>";
}
?>
