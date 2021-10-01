<html>
<head>
<meta charset="utf-8">
<title>資料維護表單</title>
<!-- 連結思源中文及css -->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet"/>  
<link href="css/main.css" rel="stylesheet"/>      
<!------------------------->
</head>
<body>
<?php
	include('session.php');
    include "dbConfig.php";
    //-----------------------------------------------------------------------
    // 以下開始擷取來updateProcess表單資料進行目標紀錄更新作業
    //-----------------------------------------------------------------------
    // $_GET["deleteRecord"] 所取得的欄位為 sno (學號)
    $recordUpdateId = $_GET["updateId"];
    $recordUpdateName = $_GET["updateName"];
    $recordUpdateemail = $_GET["updateemail"];
    $recordUpdateremark = $_GET["updateremark"];
    //-----------------------------------------------------------------------
    // 學號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    //-----------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // $queryString = "select * from student where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    // 先行把欲更新的紀錄內容 Render 到更新表單
    //-------------------------------------------------------------------------
    echo "<div class='container'>    
				<!--~~~~~~~~~~~~~~~~~-->
				<div class='header'>           
				</div>        
        
				<!--~~~~~~~~~~~~~~~~~-->        
				<ul id='navigation'>        
				<li><a href='\web'>回到主頁</a></li>            
            
                
        </ul>";
	print "<div class='content'>";
	print "紀錄更新作業<br><hr>";
    print "<form action='sureUpdatep.php' method='GET'>";
    print "<table border='0'>";
    print "<tr><td>維修人員編號</td><td><input type='text' name='renum' value='$recordUpdateId' size='20'></td></tr>";
    print "<tr><td>姓名</td><td><input type='text' name='name' value='$recordUpdateName' size='20'></td></tr>";
    print "<tr><td>電子信箱</td><td><input type='text' name='email' value='$recordUpdateemail' size='20'></td></tr>";
    print "<tr><td>備註</td><td><input type='text' name='remark' value='$recordUpdateremark' size='40'></td></tr>";
    print "<input type='hidden' name='orirenum' value='$recordUpdateId'>";
    print "<tr><td></td><td align='right'><input type='submit' name='submit' value='確定更新'></td></tr>";
    print "</table>";
    print "</form>";
	print "</div>";
?>  
</body>