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
			
			<li class="sub">         
                <a href="#">維修紀錄</a>          
                <ul>          
                    <li><a href="\web\insertrepairpage.php">新增</a></li>   
                    <li><a href="\web\fetchrepair.php">查詢</a></li>                      
                </ul>
            </li>  
            <li class="sub">         
                <a href="#">帳號相關</a>          
                <ul>          
                    <li><a href="\web\signup_check.php">帳號審核(需管理員帳號)</a></li>
                    <li><a href="\web\signup.php">帳號申請</a></li>                   
                </ul>
            </li>    
        </ul>
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="content">
            <h2>歡迎來到維護資料網</h2>

            <p>
                    您好，請透過上方選單選取增、刪、改、查功能：

            <br>維修人員資料、設備和設備的問題
			<br>維修紀錄的提交與查詢
            </p>       
			<h3><a href = "logout.php">登出</a></h3>
			<h3><a href = "signup_check.php">帳號審核(需管理員帳號)</a></h3>
               
        </div>       
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            Teleberry 2021. 
        </div>  
    </div>
    <!--**************************-->    
</body>
   
</html>
