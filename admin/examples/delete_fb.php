<?php
include ("connection.php");

$fb_id = $_GET['fb'];
$sql = "DELETE from feedback where fb_id = '$fb_id'";

$data=mysqli_query($conn,$sql);

if($data){
    header("Location: table_fb.php");

}else{
	echo '<script language="javascript">';
    echo 'alert("Error Deleting record *data linked to another table*")';
    echo '</script>';
    echo "<script>location.href='table_fb.php'</script>";
}
?>
