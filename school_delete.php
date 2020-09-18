<?
$sno=$_GET['sno'];

$con = mysqli_connect("localhost","root","world63","majustory");

if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo " ";
}

$query="delete from examtbl where sno='$sno'";

mysqli_query($con,$query);
mysqli_close($con);
echo "삭제완료!!";
header("Location:list.php");
exit;
?>