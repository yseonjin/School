<?include('top.php'); ?>
<section>
    <br>
    <div align="center">
        <meta charset="UTF-8">
    <?
    if ( empty( $_GET['idx'] ) ) {
	    $idx = 0;
	} else {
	   $idx = $_GET['idx']-1;  // mysql은 시작인 0 이므로 -1을 해 주었다.!!
   }

// 1) 페이지 사이즈    
$page_size = 10 ;   // 페이지 당 개수 

// 2) 페이지 List 사이즈 
$page_list_size = 10;  // 페이지 List 사이즈 

$con = mysqli_connect("localhost","root","world63","majustory");
$query = "select * from school1004  limit  $idx , $page_size " ;
$result = mysqli_query($con,$query);

// 3) 전체레코드 수 
$total_count = "select count(*) tc from school1004 " ;
$result_count = mysqli_query($con,$total_count);
$result_data = mysqli_fetch_array($result_count ,MYSQLI_ASSOC );
$total_row = $result_data['tc'];
?>
        <? 
 // 4) 총 페이지 수
 $total_page = ceil($total_row/$page_size) ;

// 5)  현재 레코드 
$idx = $idx+1 ;

//  6) 현재 페이지 
$current_page = ceil(($idx)/$page_size);

//  7)  하단 가로 시작 페이지 [1][2] -- [10] 에서 [1] 을 구해낸다.  
$start_page = floor(($current_page-1)/$page_list_size) * $page_list_size + 1 ;

//  8) 하단 가로 마지막 페이지  [1][2] -- [10] 에서 [10] 를 의미한다.!!
$end_page = $start_page + $page_list_size -1 ;

?>

        1.페이지사이즈 :<?=$page_size?>
        &emsp; 2.페이지 List Size:
        <?=$page_list_size?>
        &emsp; 3.총 레코드수:
        <?=$total_row?>
        &emsp; 4.총 페이지 수:
        <?=$total_page?>
        &emsp;
        <br>
        5.현재레코드:
        <?=$idx?>
        &emsp; 6.현재페이지:
        <?=$current_page?>
        &emsp; 7.하단 가로 시작페이지:
        <?=$start_page?>
        &emsp; 8.하단 가로 마지막 페이지:
        <?=$end_page?>
        &emsp;

        <table width="500" border="1">
            <tr>
                <td>번호
                </td>
                <td>이름
                </td>
                <td>
                    제목
                </td>
            </tr>
            <?
while( $data = mysqli_fetch_array($result ,MYSQLI_ASSOC )) {
?>
            <tr bgcolor="#FFCA980">
                <td >
                    <?=$data['sno']?>
                </td>
                <td>
                    <?=$data['sname']?></td>
                <td>
                    <?=$data['title']?>
                </td>
            </tr>
            <?
   }
   mysqli_close ($con);
?>
        </table>

        <? 
//  (11 - 2) * 10 ,  ( 21 - 2) * 10 , (31 -2) * 10
//      idx=90    ,   idx=190       ,  idx=290
if($start_page>$page_list_size){
   $prev = ($start_page-2)*$page_size;
   echo "<a href='list1005.php?idx=$prev'>[이전10페이지]</a>&nbsp;";
}
?>

        <?
// [1] [2] [3] , ....., [9] [10]
//  1, 11, 21 , .... , 81, 91
for($i=$start_page;$i<=$end_page;$i++){

   if($i <= $total_page) {   // [i] 값은 총 페이지수 보다 클 수 없다.!! 
      $page = ($i-1)*$page_size+1;  
      echo "<a href='list1005.php?idx=$page'>[$i]</a>&nbsp;";
   }
}
?>

        <?
// idx =1 , idx=101 , idx=201 ... 
if($end_page<$total_page){
  $next = $end_page*$page_size+1;
  echo "<a href='list1005.php?idx=$next'>[다음10페이지]</a>&nbsp;";
}
?>

    </section>
    <?include('bottom.php');?>