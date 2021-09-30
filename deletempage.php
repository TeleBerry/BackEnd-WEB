<?php
	include('session.php');
?>
<!doctype html>
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
    <!--**************************-->
    <div class="container">    
        <!--~~~~~~~~~~~~~~~~~-->
        <div class="header">           
        </div>        
        
        <!--~~~~~~~~~~~~~~~~~-->        
        <ul id="navigation">        
            <li><a href="\web">主頁</a></li>            
            
            <li class="sub">         
                <a href="#">維修人員</a>          
                <ul>          
                    <li><a href="\web\insertppage.php">新增</a></li>
                    <li><a href="\web\deleteppage.php">刪除</a></li>
                    <li><a href="\web\updateppage.php">更新</a></li>   
                    <li><a href="\web\fetchppage.php">查詢</a></li>                  
                </ul>
            </li>
            
            <li class="sub">         
                <a href="#">設備和設備問題</a>          
                <ul>          
                    <li><a href="\web\insertmpage.php">新增</a></li>
                    <li><a href="\web\deletempage.php">刪除</a></li>
                    <li><a href="\web\updatempage.php">更新</a></li>   
                    <li><a href="\web\fetchmpage.php">查詢</a></li>                    
                </ul>
            </li>   
                
        </ul>
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="content">
            <h2>請先查詢欲刪除的設備資料</h2>

            <p>
				<form action="deletem.php" method="GET">
					<table border="0">
						<select name="queryField">
                            <option value="cabnum">機櫃編號</option>
                            <option value="manum">設備編號</option>
                            <option value="maprob">機器相關資訊</option>
                        </select>	
						<tr><td>搜尋內容</td><td><input type="text" name="queryString" size="20"></td></tr>
						<tr><td></td><td align="right"><input type="submit" name="submit" value="確定"></td></tr>
				</table>
            </p>       
               
        </div>       
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            Teleberry 2021. 
        </div>  
    </div>
    <!--**************************-->    
</body>
   
</html>
