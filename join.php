<?include('top.php'); ?>
<section>
<br>
<div align=center>
<meta charset="UTF-8">
<?
$con = mysqli_connect("localhost","root","world63","majustory");
if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "";
}

  if ( empty($_GET['ch2']) ) {
      $query = "select * from member m join examtbl e on m.sno=e.sno" ;
  } else {     
      $ch1 = $_GET['ch1'];
      $ch2 = $_GET['ch2'];
      $query = "select * from member m join examtbl e on m.sno=e.sno " ;
      $query = $query . " where  $ch1  like '%$ch2%' " ;
  }
$result = mysqli_query($con,$query);



?>

<table width=500 border=1>
<tr align=center><td> 순번 </td><td> 번호 </td><td> 이름 </td> <td> 국어 </td>
<td>영어 </td><td>수학 </td><td>전화 </td><td>사진</td>
</tr>

<?
 $count =0 ;
 while( $data = mysqli_fetch_array($result ,MYSQLI_ASSOC )) {
 $count=$count + 1;
 
?>
<tr  bgcolor=#FFCA980 align=center>
    <td align=center> <?=$count?></td>
    <td><a href=member_edit.php?sno=<?=$data['sno']?>>
           <?=$data['sno']?> 
       </a></td>   
    <td> <?=$data['sname']?></td>
    <td> <?=$data['kor']?> </td><td><?=$data['eng']?> </td>
<td> <?=$data['math']?> </td><td> <?=$data['tel']?> </td>
    <td> <img src="./img/<?=$data['mfile']?>" width=30  height=30  /> </td>
    
</tr>
<?
   }
?>

<?
mysqli_close ($con);
?>
</table>

<form>
     <select  name=ch1>
         <option value="sno">학번</option>
         <option value="sName">이름</option>
     </select>
     <input  type=text  name=ch2>
     <input  type=submit  value="검색하기" >	
</form>

</section>
<?include('bottom.php');?>
