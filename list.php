<?include('top.php'); ?>
<section>
    <br>
    <div align="center">
        <meta charset="UTF-8">
    <?
$con = mysqli_connect("localhost","root","world63","majustory");
if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "";
}

if(empty($_GET['ch2'])){$query = "select * from examtbl" ;}
else{
    $ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];
    $query = "select * from examtbl where $ch1 like '%$ch2%'" ;}
$result = mysqli_query($con,$query);
?>

        <table width="500" border="1">
            <tr>
            <td>
                 순번
                </td>
                <td>
                    번호
                </td>
                <td>
                    이름
                </td>
            
                <td>
                    국어
                </td>
                <td>영어
                </td>
                <td>수학
                </td>
                <td>역사
                </td>
                <td>합계
                </td>
                <td>평균
                </td>
            </tr>

            <?
$count = 0 ; $skor=0 ; $seng=0 ; $smath=0 ; $shist=0; $ssum=0;  $savg=0;
                 $akor=0 ; $aeng=0 ; $amath=0 ; $ahist=0; $asum=0;  $aavg=0;
while( $data = mysqli_fetch_array($result ,MYSQLI_ASSOC )) {
 $count=$count + 1;
 $sum = $data['kor']+ $data['eng']+ $data['math'] +$data['hist'];
 $avg = round($sum /4 , 2 ) ;

 $skor = $skor + $data['kor'];
 $akor = round($skor / $count,1) ;

 $seng = $seng + $data['eng'];
 $aeng = round($seng / $count,1) ;

 $smath = $smath + $data['math'];
 $amath = round($smath / $count,1) ;

 $shist = $shist + $data['hist'];
 $ahist = round($shist / $count,1) ;

 $ssum = $ssum +$sum;
 $asum = round($ssum / $count,1) ;

 $savg = $savg +$avg;
 $aavg = round($savg / $count, 1) ;

?>

            <tr bgcolor="#FFCA98">
                <td align="center" >
                    <?=$count?>
                </td>
                <td>
                    <a href="edit.php?sno=<?=$data['sno']?>">
                        <?=$data['sno']?>
                    </a>
                </td>
        
                <td>
                    <?=$data['sname']?></td>
                <td>
                    <?=$data['kor']?>
                </td>
                <td>
                    <?=$data['eng']?>
                </td>
                <td>
                    <?=$data['math']?>
                </td>
                <td>
                    <?=$data['hist']?>
                </td>
                <td>
                    &nbsp;<?=$sum ?>
                </td>
                <td>
                    <a href="school_delete.php?sno=<?=$data['sno']?>">
                        &nbsp;<?=$avg ?>
                    </a>
                </td>
            </tr>
            <?
   }
?>
            <tr>
                <td colspan="3">
                    누적합
                </td>
                <td>
                    &nbsp;
                    <?=$skor ?>
                </td>
                <td>
                    &nbsp;
                    <?=$seng ?>
                </td>
                <td>
                    &nbsp;
                    <?=$smath ?>
                </td>
                <td>
                    &nbsp;
                    <?=$shist ?></td>
                <td>
                    &nbsp;
                    <?=$ssum?></td>
                <td>
                    &nbsp;
                    <?=$savg?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    누적평균
                </td>
                <td>
                    &nbsp;
                    <?=$akor ?>
                </td>
                <td>
                    &nbsp;
                    <?=$aeng ?>
                </td>
                <td>
                    &nbsp;
                    <?=$amath ?>
                </td>
                <td>
                    &nbsp;
                    <?=$ahist ?>
                </td>
                <td>
                    &nbsp;
                    <?=$asum?>
                </td>
                <td>
                    &nbsp;
                    <?=$aavg?>
                </td>
            </tr>

            <tr>
                <td colspan="9">
                    전체학생수 :
                    <?=$count?>
                </td>
            </tr>

            <?
mysqli_close ($con);
?>

        </table>

        <form>
            <select name="ch1">
                <option value="sno">학번</option>
                <option value="sname">이름</option>
            </select>
            <input type="text" name="ch2">
            <input type="submit" value="검색">
        </form>
    </section>
    <?include('bottom.php');?>