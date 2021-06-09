<?php
include ("connection.php");

$cust_id = $_GET['ci'];
$sql = "DELETE from cust where cust_id = '$cust_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: c_table.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to service request table*")';
    echo '</script>';
    echo "<script>location.href='c_table.php'</script>";
}
?>
