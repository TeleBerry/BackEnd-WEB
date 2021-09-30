<?php
	include('session.php');
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫更新作業
    //--------------------------------------------
    // $oriStuNo 是指尚未更改學號前之學生學號
    //--------------------------------------------
    $orirenum = $_GET["orirenum"];
    $cabnum = $_GET["cabnum"];
    $manum = $_GET["manum"];
    $maprob = $_GET["maprob"];
    //--------------------------------------------
    $queryString = "update maprob set cabnum='$cabnum', manum='$manum', maprob='$maprob' where manum='$orirenum'";
    try
    {
        // print $queryString."<br>";
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