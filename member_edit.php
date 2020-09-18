<?include('top.php'); ?>

<?
$sno=$_GET['sno'];

$con = mysqli_connect("localhost","root","world63","majustory");

$query_update = "update  member set cnt = cnt +1 where  sno='$sno'" ;
mysqli_query($con,$query_update);

if(mysqli_connect_errno()){
    echo "Failed to connect no: ".mysql_connect_errno();
}
else{
    echo "";
}
$query = "select * from member  where  sno='$sno'" ;
$result = mysqli_query($con,$query);
$data = mysqli_fetch_array($result ,MYSQLI_ASSOC )

?>


<script>
  function functionK(){
     if (f1.sno.value=="") {
        alert("학번을 입력해 주세요 ");
        return  false ;
     }

     if (f1.sno.value.length!=5) {
        alert("학번은 5자를 입력해주세요 ");
        f1.sno.value="";
        f1.sno.focus(); 
        return  false ;
     }
  }
</script>
<section>
<br>
<form name="f1" onSubmit="return functionK();"
                        action="member_edit_ok.php"
                        method="POST"
                         enctype="multipart/form-data"  >
<font style align=center size=4px><p><b>학생 성적 입력</b></p></font>
<table border=1 align=center width=400 height=100>
<tr>
<td align=center  width=80><b>학&emsp;번</b></td><td>
<input type=text  name=sno  value=<?=$data['sno']?>></td>
</tr>
<tr>
<td align=center><b>성&emsp;명</b></td><td>
<input type=text  name=sname  value=<?=$data['sname']?>></td>
</tr>
<tr>
<td align=center><b>나&emsp;이</b></td><td>
<input type=text  name=age  value=<?=$data['age']?>></td>
</tr>
<tr>
<td align=center><b>주&emsp;소</b></td><td>
<input type=text name=addr  value=<?=$data['addr']?>></td>
</tr>
<tr>
<td align=center><b>전&emsp;화</b></td><td>
<input type=text name=tel   value=<?=$data['tel']?>></td>
</tr>
<tr>
<td align=center><b>사&emsp;진</b></td><td>
<img  src=./img/<?=$data['mfile'] ?> width=250  height=150 >
<br> 
<input  type=file  name=mfile  > 
</td>
</tr>

<tr>
<td align=center colspan=2>
<input type=submit value=회원수정하기></td>
</tr>
</table>
</form>
<hr  width=600>
<div align=center>
 <a href=member.php>  [ 회원가입 ] </a>
 <a href=member_list.php>  [ 목록보기 ] </a>
 <a href=member_delete.php?sno=<?=$data['sno']?>>
 [ 삭제하기 ]
 </a>
</div>
</section>
<?

mysqli_close ($con);
?>

<?include('bottom.php');?>