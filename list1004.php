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
    <?
        $count_query="select count(*) tc from school1004;";
        $count_result = mysqli_query($con,$count_query);
        $count_data = mysqli_fetch_array($count_result ,MYSQLI_ASSOC);
        $count_page = ceil($count_data['tc']/$count);
        $count_now = ($idx + $count)/$count;
        ?> 
        전체레코드: <?=$count_data['tc']?> &emsp; 
        전체페이지:<?=$count_page?> &emsp;
        현재페이지:<?=$count_now?> &emsp;
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