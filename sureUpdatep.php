<?php
    include "dbConfig.php";
	include('session.php');
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫更新作業
    //--------------------------------------------
    // $oriStuNo 是指尚未更改學號前之學生學號
    //--------------------------------------------
    $orirenum = $_GET["orirenum"];
    $renum = $_GET["renum"];
    $name = $_GET["name"];
    $gmail = $_GET["gmail"];
    $remark = $_GET["remark"];
    //--------------------------------------------
    $queryString = "update remaninfo set renum='$renum', name='$name', email='$email', remark='$remark' where renum='$orirenum'";
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
    print "<br><a href='index.html'>創思首頁</a>";
?>
