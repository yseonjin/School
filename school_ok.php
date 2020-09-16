<?
$sno=$_GET['sno'];
$sname=$_GET['sname'];
$kor=$_GET['kor'];
$eng=$_GET['eng'];
$math=$_GET['math'];
$hist=$_GET['hist'];
?>
학번:
<?=$sno?><br>
이름:
<?=$sname?><br>
국어:
<?=$kor?><br>
영어:
<?=$eng?><br>
수학:
<?=$math?><br>
역사:
<?=$hist?><br>

<?
$con = mysqli_connect("localhost","root","world63","majustory");

if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "connect~~!";
}

$query="insert into examtbl (sNo, sName, kor, eng, math, hist) ";
$query= $query. " values ('$sno','$sname',$kor,$eng,$math,$hist)";

mysqli_query($con,$query);
mysqli_close($con);

?>