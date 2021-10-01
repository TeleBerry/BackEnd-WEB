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
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫搜尋動作
    //--------------------------------------------
    $queryField = $_GET["queryField"];
    $keyWord = $_GET["queryString"];
    $searchField = "";
    //--------------------------------------------
    // 學號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    // 以下根據來自表單之下拉式清單選項內容來決定
    // 對資料庫哪個欄位來進行搜尋動作
    //-------------------------------------------
    if (!strcmp($queryField, "renum"))
    {
        $searchField = "renum";
    }
    else if (!strcmp($queryField, "name"))
    {
        $searchField = "name";
    }
    else if (!strcmp($queryField, "email"))
    {
        $searchField = "email";
	}
	else if (!strcmp($queryField, "remark"))
    {
        $searchField = "remark";
	}
    else
    {
        // nothing to do 
    }
    //-------------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // 
    //-------------------------------------------------------------------------
    $queryString = "select * from remaninfo where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    try
    {
        $recordSet = $dbLink->query($queryString);
        $recordRow = $recordSet->fetchAll();
        //
        if (count($recordRow) != 0)
        {
			echo "<div class='container'>    
        <!--~~~~~~~~~~~~~~~~~-->
        <div class='header'>           
        </div>        
        
        <!--~~~~~~~~~~~~~~~~~-->        
        <ul id='navigation'>        
            <li><a href='\web'>回到主頁</a></li>            
            
                
        </ul>";
            print "<div class='content'>";
            print "搜尋結果如下";
            // print $queryString;
            print "<table border=1>";
            print "<tr><td>維修人員編號</td><td>姓名</td><td>email</td><td>備註</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
                print "<td>".$recordRow[$i]["renum"]."</td>";
                print "<td>".$recordRow[$i]["name"]."</td>";
                print "<td>".$recordRow[$i]["email"]."</td>";
				print "<td>".$recordRow[$i]["remark"]."</td>";
                print "</tr>";
            }
            print "</table>";
            print "</div>";
			echo "<div class='footer'>
            Teleberry 2021. 
        </div>  ";
        }
        else
        {	
			echo "<div class='container'>    
			<!--~~~~~~~~~~~~~~~~~-->
			<div class='header'>           
			</div>        
        
			<!--~~~~~~~~~~~~~~~~~-->        
			<ul id='navigation'>        
            <li><a href='\web'>回到主頁</a></li>            
            
                
			</ul>";
            print "<div class='content'>";
            print "<h2>搜尋不到任何符合條件的紀錄</h2>";
			print "</div>";
			echo "<div class='footer'>
            Teleberry 2021. 
        </div>  ";
        }

    }
    catch (PDOException $pdoe)
    {
        print "查詢錯誤：".$pdoe->getMessage();
    }
?> 
</body>
</html>