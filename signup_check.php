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
	include('sessionsuper.php');
    include "dbConfig.php";
    //-------------------------------------------------------------------------
    // 以下查詢字串的格式
    // 
    //-------------------------------------------------------------------------
    $queryString = "select * from signup_check";
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
            print "以下為帳號申請";
            // print $queryString;
            print "<table border=1>";
            print "<tr><td>ID</td><td>帳號</td><td>密碼</td><td>名字</td><td>Email</td><td>Telegram ID</td><td>權限</td><td>確認作業</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
                print "<td>".$recordRow[$i]["id"]."</td>";
                print "<td>".$recordRow[$i]["username"]."</td>";
                print "<td>".$recordRow[$i]["password"]."</td>";
				print "<td>".$recordRow[$i]["name"]."</td>";
				print "<td>".$recordRow[$i]["email"]."</td>";
				print "<td>".$recordRow[$i]["teleid"]."</td>";
                //-----------------------------------------------------------------------
                // 以下利用隱藏欄位技巧，將點選"更新"鈕後的資料紀錄先行隱式儲存於表單變數中，後續
                // 再利用 $_GET["fieldName"] 的方式來擷取表單送出的隱式資料，此包含各欄位值
                //-----------------------------------------------------------------------
                print "<form action='sure_signup.php' method='GET'>";
				print "<input type='hidden' name='signupid' value='".$recordRow[$i]["id"]."'>";
                print "<input type='hidden' name='signupusername' value='".$recordRow[$i]["username"]."'>";
                print "<input type='hidden' name='signuppassword' value='".$recordRow[$i]["password"]."'>";
				print "<input type='hidden' name='signupname' value='".$recordRow[$i]["name"]."'>";
				print "<input type='hidden' name='signupemail' value='".$recordRow[$i]["email"]."'>";
				print "<input type='hidden' name='signupteleid' value='".$recordRow[$i]["teleid"]."'>";
				print "<td><select name='authority'>
　					   <option value='1'>一般</option>
　                     <option value='0'>管理員</option></td>";
				print "<td>";
				print "<br>";
                print "<input type='submit' name='suresignup' value='申請通過'>";
                print "</form>";
				print "<form action='delete_signup.php' method='GET'>";
				print "<br>";
				print "<input type='hidden' name='signupid' value='".$recordRow[$i]["id"]."'>";
                print "<input type='submit' name='deletesignup' value='刪除申請'>";
                print "</td>";
                print "</tr>";
				
				
            }
            print "</table>";
			print "</div>";
			}
        else
        {
            echo "<script>alert('目前尚無資料！')</script>";
		    echo "<script>window.location.href = '/web'</script>";
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