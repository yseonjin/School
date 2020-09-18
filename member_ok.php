<?php
$sno=$_POST['sno'];
$sname=$_POST["sname"];
$age=$_POST['age'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];

  // $mfile=$_POST['mfile'];  <-- file : type

  $mfile=$_FILES["mfile"]["name"];  // 이름만 파일 (파일명) - 테이블에 저장
  $size =$_FILES["mfile"]["size"];

  $tmp =$_FILES["mfile"]["tmp_name"];  //  실제 파일 (폴드에 저장)

  $f_mfile=basename($mfile, strrchr($mfile, '.')); // 파일이름 가져오기
  $randomNum = mt_rand(1, 10000);

  $fileinfo = pathinfo($mfile);  // 확장자 가져오기 
  $ext = $fileinfo['extension']; 

  $mfile=$f_mfile.$randomNum.".".$ext;  // 파일이름+.+확장자
  echo $mfile;
  move_uploaded_file( $tmp , "./img/$mfile" ); 

?>
학번:<?=$sno?> <br>
이름:<?=$sname?><br>
나이<?=$age?><br>
주소<?=$addr?><br>
전화<?=$tel?><br>
파일<?=$mfile?><br>
사이즈<?=$size?><br>
<?
$cnt =0 ;

$con = mysqli_connect("localhost","root","world63","majustory");
if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "connect~~! <br>";
}

$query="insert into member (sno, sname, age, addr, tel, mfile , fsize, cnt ) ";
$query= $query. " values ('$sno','$sname',$age,'$addr','$tel','$mfile', $size, $cnt)";

mysqli_query($con,$query);
mysqli_close($con);

echo  $query;

// header("Location:member_list.php");
// exit;

?>