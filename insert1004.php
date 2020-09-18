<?
    $sno = '10001';
    $sname = '하늘이';
    $title = '하늘이 PHP 연습중 !!';

    $con = mysqli_connect("localhost", "root", "world63", "majustory");
    $query = "select max(sno) as s1 from member";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    for($i=0; $i<1000; $i++){        


        $sno = $data['s1'] + $i; // 임의의 학번생성

        $randNum = mt_rand(1, 7);
        switch($randNum){
        case 1:
            $sname = '하늘이';
            break;
        case 2:
            $sname = '구름';
            break;
        case 3:
            $sname = '아름다운';
            break;      
        case 4:
            $sname = '바람과천둥';
            break;
        case 5:
            $sname = '땅';
            break;
        case 6:
            $sname = '비';
            break;
        default:
            $sname = '바다';
            break;

        }

        $randNum = mt_rand(1, 5);
        switch($randNum){
            case 1:
                $title = 'ASP 연습을 진행 !!';
                break;
            case 2:
                $title = 'PHP 연습중';
                break;
            case 3:
                $title = '여행을 좋아합니다.';
                break;
            case 4:
                $title = '공부를 하는 중';
                break;
            default:
                $title = '연습중 ';
                break;
        }

        $title = $sname . " ". $title;
        //echo $sno."      ". $sname."  ".$title. " <br>";
        
        $query = "insert into school1004(sno, sname, title)";
        $query = $query." value('$sno', '$sname', '$title')";
        mysqli_query($con, $query);
        echo "저장완료!<br>";
        
    }   

    mysqli_close($con);

    
    
?>