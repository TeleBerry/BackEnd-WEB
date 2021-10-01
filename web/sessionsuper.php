<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' and authority = 0");
   
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   
   if(is_null($row['username'])){
	   echo "<script>alert('你沒有權限操作，欲審核請聯絡管理員！')</script>";
	   echo "<script>window.location.href = '/web'</script>";
      die();
   }
   $login_session = $row['username'];
   if(!isset($_SESSION['login_user'])){
		echo "<script>alert('你沒有權限操作，請登入！')</script>";
		echo "<script>window.location.href = '/web'</script>";
      die();
   }
?>