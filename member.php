<?include('top.php'); ?>
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
<br><br>
<form name="f1" onSubmit="return functionK();"
         action="member_ok.php" 
         method="POST" 
         enctype="multipart/form-data" >
<font style align=center size=5px><p><b>회&emsp;원&emsp;가&emsp;입</b></p></font>
<table border=1 align=center width=400 height=250>
<tr>
<td align=center  width=80><b>학&emsp;번</b></td><td>
<input type=text  name=sno></td>
</tr>
<tr>
<td align=center><b>성&emsp;명</b></td><td>
<input type=text  name=sname></td>
</tr>
<tr>
<td align=center><b>나&emsp;이</b></td><td>
<input type=text   name=age  size=7></td>
</tr>
<tr>
<td align=center><b>주&emsp;소</b></td><td>
<input type=text name=addr  size=45></td>
</tr>
<tr>
<td align=center><b>전&emsp;화</b></td><td>
<input type=text name=tel></td>
</tr>
<tr>
<td align=center><b>사&emsp;진</b></td><td>
<input type="file" name="mfile"></td>
</tr>

<tr>
<td align=center colspan=2>
<input type=submit value=회원가입></td>
</tr>
</table>
</form>
</section>

<?include('bottom.php');?>