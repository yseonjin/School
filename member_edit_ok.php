<?
 
 if (empty($_FILES["mfile"]["name"])){
    $sno=$_POST['sno'];
    $age=$_POST['age'];
    $addr=$_POST['addr'];
    $tel=$_POST['tel'];   
    

    $conn=mysqli_connect("localhost","root","world63","majustory");
    $query="update member set age='$age', addr='$addr', tel='$tel' ";
    $query= $query. " where sno='$sno'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location:member_list.php");
    exit;
    echo $query;
}
else{
    $sno=$_POST['sno'];
    $age=$_POST['age'];
    $addr=$_POST['addr'];
    $tel=$_POST['tel'];   
    $mfile=$_FILES['mfile']["name"];
    $size=$_FILES['mfile']['size'];
    $tmp=$_FILES['mfile']['tmp_name'];
    move_uploaded_file($tmp,"./file/$mfile");

    $conn=mysqli_connect("localhost","root","world63","majustory");
    $query="update member set age='$age', addr='$addr', tel='$tel',";
    $query= $query. " mfile='$mfile' where sno='$sno'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location:member_list.php");
    exit;
    echo $query;
}
?>
