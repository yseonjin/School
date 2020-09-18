<?include('top.php'); ?>

<?
$sno=$_GET['sno'];

$con = mysqli_connect("localhost","root","world63","majustory");
if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "";
}
$query = "select * from examtbl  where  sno='$sno'" ;
$result = mysqli_query($con,$query);
$data = mysqli_fetch_array($result ,MYSQLI_ASSOC )
?>


<script>
  function functionK(){
     if (f1.sno.value=="") {
        alert("학번을 입력해 주세요 ");
        return  false ;
     }

     if (f1.sno.value.length < 3) {
        alert("학번은 3자이상 입력해주세요 ");
        f1.sno.value="";
        f1.sno.focus(); 
        return  false ;
     }
  }
</script>
<section>
<br><br>
<form name="f1" onSubmit="return functionK();"
                        action="edit_ok.php" method="GET" >
<font style align=center size=5px><p><b>학생 성적 입력</b></p></font>
<table border=1 align=center width=350 height=100>
<tr>
<td align=center  width=80><b>학&emsp;번</b></td><td>
<input type=text  name=sno  value=<?=$data['sno']?>></td>
</tr>
<tr>
<td align=center><b>성&emsp;명</b></td><td>
<input type=text  name=sname  value=<?=$data['sname']?>></td>
</tr>
<tr>
<td align=center><b>국&emsp;어</b></td><td>
<input type=number  name=kor  value=<?=$data['kor']?>></td>
</tr>
<tr>
<td align=center><b>영&emsp;어</b></td><td>
<input type=number name=eng  value=<?=$data['eng']?>></td>
</tr>
<tr>
<td align=center><b>수&emsp;학</b></td><td>
<input type=number name=math   value=<?=$data['math']?>></td>
</tr>
<tr>
<td align=center><b>역&emsp;사</b></td><td>
<input type=number name=hist   value=<?=$data['hist']?>></td>
</tr>

<tr>
<td align=center colspan=2>
<input type=submit value=성적수정하기></td>
</tr>
</table>
</form>
<hr  width=600>
<div align=center>
[ 글쓰기 ]  [ 목록보기 ] 

<a href="school_delete.php?sno=<?=$data['sno']?>">[ 삭제하기 ]</a>
</div>
</section>
<?

mysqli_close ($con);
?>

<?include('bottom.php');?>
​