<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <style>
        kaiText
        {
            font-family : 標楷體;
            font-size : 30px;
            line-height : 36px;
        }
    </style>
</head>
<body>

<?php
	$target ="uploads/";
	$target = $target . basename( $_FILES['mapic']['name']); 
	include('session.php');
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫插入作業
    //--------------------------------------------
     $cabnum = $_POST["cabnum"];
     $manum = $_POST["manum"];
     $maprob = $_POST["maprob"];
	 $image = addslashes(file_get_contents($_FILES['mapic']['tmp_name']));
//--------------------------------------------
    $queryString = "insert into maprob (cabnum, manum, maprob, mapic) values ('$cabnum', '$manum', '$maprob', '$image')";
	
    try
    {
        $dbLink->exec($queryString);
		header('Location: http://140.131.114.151/web/sucessful.html');    exit;
    }
    catch (PDOException $pdoe)
    {
        header('Location: http://140.131.114.151/web/lose.html');    exit;    
    }
    //----------------------------------------------------

	

?>
</body>
</html>