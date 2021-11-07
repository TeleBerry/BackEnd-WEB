<?php
	include('session.php');
    include "dbConfig.php";
    //-----------------------------------------------------------------------
    // 以下開始擷取來deleteProcess表單資料進行目標紀錄刪除作業
    //-----------------------------------------------------------------------
    // $_GET["deleteRecord"] 所取得的欄位為 sno (學號)
    $recordForDelete = $_GET["deleteRecord"];
	$recordForAdd = $_GET["reason"];
    //-----------------------------------------------------------------------
    // 學號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    //-----------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // $queryString = "select * from student where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    $queryString = "
	SET FOREIGN_KEY_CHECKS=0;
	delete from maprob where manum='".$recordForDelete."';
	SET FOREIGN_KEY_CHECKS=1;";
    //
    try
    {
        $recordSet = $dbLink->exec($queryString);
		while($recordSet == true)
		{
			break;
		}
		$queryString2 = "update maprob_log set reason ='".$recordForAdd."' where manum='".$recordForDelete."'";
		$recordSet2 = $dbLink->exec($queryString2);
        header('Location: http://140.131.114.151/web/sucessful.html');    exit;
    }
    catch (PDOException $pdoe)
    {
        header('Location: http://140.131.114.151/web/lose.html');    exit;
    }
    //-----------------------------------------------
    print "<br><br><a href='index.html'>創思首頁</a>";
?>  
</body>
</html>