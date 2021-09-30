<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if (!empty($row)){
		  $active = $row['active'];
	  }
	  
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
		 echo "<script>alert('帳號不存在或密碼錯誤')</script>";
		 echo "<script>window.location.href = ''</script>";
      }
   }
?>
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
                  <tr><td>Password  :</td><td><input type = "password" name = "password" class = "box" /></tr>
                  <tr><td></td><td align="right"><input type = "submit" value = " 登入 "/></td></tr>
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