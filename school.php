<?include('top.php'); ?>
<section>
    <br>
    <br>
    <form name="f1" action="school_ok.php" method="GET">
        <table border="1" width="350" height="200" align="center">
            <caption>
                <h2>학생 성적 입력</h2>
            </caption>
            <tr>
                <td align="center">학번</td>
                <td>
                    <input type="text" name="sno" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td align="center">성명</td>
                <td>
                    <input type="text" name="sname" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td align="center">국어</td>
                <td>
                    <input type="text" name="kor" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td align="center">영어</td>
                <td>
                    <input type="text" name="eng" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td align="center">수학</td>
                <td>
                    <input type="text" name="math" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td align="center">역사</td>
                <td>
                    <input type="text" name="hist" size="25" maxlength="10">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="성적저장">
                </td>
            </tr>
        </table>
    </form>
</section>
<?include('bottom.php');?>