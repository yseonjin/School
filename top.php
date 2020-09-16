<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header{
            background-color:blue;
            height:90px;
            line-height:90px;
            text-align:center;
            vertical-align:middle;
        }
        nav{
            background-color:#6699ff;
            width:100%;
            height:45px; 	 
            display:table;
            text-align:left;
        }
        section{        
            background-color:#CCCCCC;
            height:550px;       
            width :100%;   
        }
        footer{
            background-color:#6699ff;
            height:50px;
            line-height:25px;
            text-align:center;
        
        }
        #span1{
            background-color:#ccbaaa;
            width:300;
            display:table-cell ;
            vertical-align:middle;
        }

       A:link {color: #555555; text-decoration: none;}
       A:visited {color: #555555; text-decoration: none;}
       A:active {color: #555555; text-decoration: none;}
       A:hover {color: #000000; text-decoration: underline;}

    </style>
</head>
<body>
    <header>
        <font size=5> (과정평가형 정보처리기능사) 성적조회 프로그램 Ver 1.0 </font>
    </header>   
    <nav> 
        <span id="span1">
        &emsp; &emsp;<a href=school.php>성적입력 </a> &emsp;&emsp;&emsp;
        &emsp;<a href=list.php>성적조회 </a> &emsp;&emsp;&emsp;
         &emsp;<a href=index.php>홈으로 </a>
        </span>  
    </nav>