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
			<li><a href="\web\signup.php">帳號申請</a></li>
		</ul>
		
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="content">
            <h2>請輸入帳號以及密碼</h2>
			<table border="0">
				<form action = "" method = "post">
                  <tr><td>UserName  :</td><td><input type = "text" name = "username" class = "box"/></td></tr>
                  <tr><td>Password  :</td><td><input type = "password" name = "password" class = "box" /></td></tr>
				  <tr><td>Name  :</td><td><input type = "text" name = "name" class = "box" /></td></tr>
				  <tr><td>Telegram ID  :</td><td><input type = "text" name = "teleid" class = "box" /></td></tr>
				  <tr><td>Email  :</td><td><input type = "text" name = "email" class = "box" /></td></tr>
                  <tr><td></td><td align="right"><input type = "submit" value = " 提交申請 "/></td></tr>
               </form>
            </table>   
        </div>       
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            Teleberry 2021. 
        </div>  
    </div>
    <!--**************************-->    
	</body>
   
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
   include("dbConfig.php");
    $userName = $_POST["username"];
	$password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $teleid = $_POST["teleid"];
    //--------------------------------------------
    $queryString = "insert into signup_check (username, password, name, email, teleid) values ('$userName', '$password ', '$name', '$email', '$teleid')";
    try
    {
        $dbLink->exec($queryString);
		echo "<script>alert('帳號申請已遞交，請連絡相關管理員協助審核。')</script>";
		echo "<script>window.location.href = 'http://140.131.114.151/web/login.php'</script>";
    }
    catch (PDOException $pdoe)
    {
        header('Location: http://140.131.114.151/web/lose.html');    exit;   
    }
}
?>