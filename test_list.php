<?include('top.php'); ?>
<section>
<br>
<div align=center>
<meta charset="UTF-8">
<?
  if ( empty($_GET['idx']) ) {
     $idx = 0 ;     // 페이지의 첫번째 레코드 
  } else {
    $idx = $_GET['idx'] ;
  }

 $page_size=10;   // 페이지 크기 

 if ( empty($_GET['ch2']) ) {
     $ch1 = "" ;
     $ch2 = "" ;

      $query = "select * from school1004   limit  $idx,   $page_size  " ;
      $query_tc = "select count(*)  tc  from school1004   " ;
  } else {
     $ch1 = $_GET['ch1'] ;
     $ch2 = $_GET['ch2'] ;
     $query = "select * from school1004 where $ch1 like '%$ch2%'   limit  $idx,   $page_size  " ;
     $query_tc = "select count(*)  tc  from school1004  where $ch1 like '%$ch2%'     " ;
  }
 
     $con = mysqli_connect("localhost","root","world63","majustory");
    
     $result = mysqli_query($con,$query); 
      
      // 1. 전체 레코드 수      
      $result_tc = mysqli_query($con, $query_tc); 
      $data_tc = mysqli_fetch_array($result_tc ,MYSQLI_ASSOC );
    
     // 2.  현재 페이지 
       $page  =   ceil ( ($idx + 1)  / $page_size)   ;

      
    // 3. 전체 페이지 수
      $total_page  = ceil ($data_tc['tc'] / $page_size ) ;
?>

1. 전체 레코드 수 : <?=$data_tc['tc'] ?> &emsp;
2. 현재 현재 페이지:  &emsp;  <?=$page ?> &emsp;
3. 전체 페이지 수:    &emsp; <?=$total_page ?>

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

 <a href=test_list.php?idx=0&ch1=<?=$ch1?>&ch2=<?=$ch2?>> [첫페이지]</a>  &emsp;&emsp; 

  <?  if ( $page > 1  ) {  ?>
  <a href=test_list.php?idx=<?=$idx - $page_size  ?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>  >[이전]  </a> &emsp;&emsp;
  <?  } else {  ?>
  이전  &emsp;&emsp;
  <?  }  ?>


    <? if ( $page < $total_page ) { ?>
      <a href=test_list.php?idx=<?=$idx + $page_size ?>&ch1=<?=$ch1?>&ch2=<?=$ch2?> > [다음]  </a>
    <? } else { ?>
      다음 
     <? } ?>
  <?
     $endpage = ($total_page -1) * $page_size  ;
  ?>
&emsp;&emsp;  <a href=test_list.php?idx=<?=$endpage?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>  [마지막페이지] </a>
 
 <form>
   <select  name=ch1>
      <option  value=sname > 이름 </option>
      <option  value=title > 제목 </option>
   </select>
   <input  type=text  name=ch2>
   <input  type=submit  value='검색하기'> 
 </form>

</section>
<?include('bottom.php');?>