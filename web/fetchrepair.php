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
    $searchField = "";
    //-------------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // 
    //-------------------------------------------------------------------------
    $queryString = "select rp.*, rm.name, ma.cabnum from `repair_log` as rp, `remaninfo` as rm, `maprob` as ma where rp.renum=rm.renum and rp.manum=ma.manum";
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
            print "<tr><td>機櫃編號</td><td>設備編號</td><td>維修人員</td><td>維修結果</td><td>維修時間</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
				print "<td>".$recordRow[$i]["cabnum"]."</td>";
                print "<td>".$recordRow[$i]["manum"]."</td>";
                print "<td>".$recordRow[$i]["name"]."</td>";
                print "<td>".$recordRow[$i]["remark"]."</td>";
				print "<td>".$recordRow[$i]["time"]."</td>";
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