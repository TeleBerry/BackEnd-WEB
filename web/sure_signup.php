<?php
	include('sessionsuper.php');
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫插入作業
    //--------------------------------------------
	 $recordForDelete = $_GET["signupid"];
     $username = $_GET["signupusername"];
     $password = $_GET["signuppassword"];
     $name = $_GET["signupname"];
	 $email = $_GET["signupemail"];
	 $teleid = $_GET["signupteleid"];
	 $authority = $_GET["authority"];
//--------------------------------------------
    $queryString = "insert into admin (username, password, name, email, teleid, authority) 
	values ('$username', '$password', '$name', '$email', '$teleid', '$authority')";
	
    try
    {
        $recordSet = $dbLink->exec($queryString);
		while($recordSet == true)
		{
			break;
		}
		$queryString2 = "delete from signup_check where id='".$recordForDelete."'";
		$dbLink->exec($queryString2);
		echo "<script>alert('操作成功!')</script>";
		echo "<script>window.location.href = '/web/signup_check.php'</script>";
    }
    catch (PDOException $pdoe)
    {
        header('Location: http://140.131.114.151/web/lose.html');    exit;    
    }
    //----------------------------------------------------

	

?>
</body>
</html>