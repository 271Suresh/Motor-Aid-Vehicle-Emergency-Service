<?php
include ("connection.php");

$sp_id = $_GET['ci'];
$sql = "DELETE from service_provider where sp_id = '$sp_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: s_table.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to service_process table*")';
    echo '</script>';
    echo "<script>location.href='s_table.php'</script>";
}
?>
