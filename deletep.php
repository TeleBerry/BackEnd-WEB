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
    include "dbConfig.php";
	include('session.php');
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫插入動作
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
            print "<tr><td>維修人員編號</td><td>姓名</td><td>電子郵件</td><td>備註</td><td>原因</td><td>刪除作業</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
                print "<td>".$recordRow[$i]["renum"]."</td>";
                print "<td>".$recordRow[$i]["name"]."</td>";
                print "<td>".$recordRow[$i]["email"]."</td>";
                print "<td>".$recordRow[$i]["remark"]."</td>";

                //-----------------------------------------------------------------------
                // 以下利用隱藏欄位技巧，將點選"更新"鈕後的資料紀錄先行隱式儲存於表單變數中，後續
                // 再利用 $_GET["fieldName"] 的方式來擷取表單送出的隱式資料，此包含各欄位值
                //-----------------------------------------------------------------------
                print "<form action='targetRecordDeletep.php' method='GET'>";
				print "<td>";
				print "<input type='text' name='reason' size='20'>";
				print "</td>";
				print "<td>";
                print "<input type='hidden' name='deleteRecord' value='".$recordRow[$i]["renum"]."'>";
                print "<input type='submit' name='sureDelete' value='刪除'>";
                print "</form>";
                print "</td>";
                print "</tr>";
            }
            print "</table>";
			print "</div>";
			}
        else
        {
            print "<kaiText>搜尋不到任何符合條件的紀錄<kaiText>";
        }

    }
    catch (PDOException $pdoe)
    {
        print "查詢錯誤：".$pdoe->getMessage();
    }
    //-----------------------------------------------
?>
</body>
</html>