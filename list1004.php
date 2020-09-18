<?include('top.php'); ?>
<section>
<br>
<div align=center>
<meta charset="UTF-8">
<?
             if ( empty( $_GET['idx'] ) ) {
	    $idx = 0;
	} else {
	   $idx = $_GET['idx'];
             }
$count = 10 ;
$con = mysqli_connect("localhost","root","world63","majustory");
      $query = "select * from school1004  limit  $idx , $count " ;
      $result = mysqli_query($con,$query);
?>

<table width=500 border=1>
<tr><td>번호 </td><td>이름 </td><td> 제목 </td> </tr>
<?
while( $data = mysqli_fetch_array($result ,MYSQLI_ASSOC )) {
?>
<tr  bgcolor=#FFCA980>
<td > <?=$data['sno']?> </td>
<td> <?=$data['sname']?></td>
<td> <?=$data['title']?> </td>  
</tr>
<?
   }
   mysqli_close ($con);
?>
</table>


<?
  if ( $idx < 10 ) {
      echo " 이전 &emsp; " ; 
  }else {
?>
<a href=list1004.php?idx=<?=$idx - 10?> > [이전]  </a> &emsp;
<?}?>
 
 <a href=list1004.php?idx=<?=$idx+10?> > [다음] </a> 


</section>
<?include('bottom.php');?>