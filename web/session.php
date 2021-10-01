<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];	
   
   if(!isset($_SESSION['login_user'])){
		 echo "<script>alert('你沒有權限操作，請先登入！')</script>";
		 echo "<script>window.location.href = 'login.php'</script>";
      die();
   }
?>