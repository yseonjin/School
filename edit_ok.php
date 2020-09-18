<?
$sno=$_GET['sno'];
$sname=$_GET['sname'];
$kor=$_GET['kor'];
$eng=$_GET['eng'];
$math=$_GET['math'];
$hist=$_GET['hist'];

$con = mysqli_connect("localhost","root","world63","majustory");

if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "";
}

$query="update examtbl set kor=$kor, eng=$eng, math=$math, hist=$hist where sno= '$sno'";

mysqli_query($con,$query);
mysqli_close($con);
header("Location:list.php");
exit;

?>