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
	include('session.php');
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫插入作業
    //--------------------------------------------
    $manum = $_GET["manum"];
    $renum = $_GET["renum"];
    $remark = $_GET["remark"];
    //--------------------------------------------
    $queryString = "insert into repair_log (manum, renum, remark) values ('$manum', '$renum', '$remark')";
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