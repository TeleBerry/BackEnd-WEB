<?php
	include('session.php');
	include "dbConfig.php";
	$queryString = "select cabnum, manum from maprob order by cabnum";
	$recordSet = $dbLink->query($queryString);
    $recordRow = $recordSet->fetchAll();
	
	$queryString1 = "select renum, name from remaninfo order by renum";
	$recordSet1 = $dbLink->query($queryString1);
    $recordRow1 = $recordSet1->fetchAll();
?>
<!doctype html>
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
            
            <li class="sub">         
                <a href="#">維修人員</a>          
                <ul>          
                    <li><a href="\web\insertppage.php">新增</a></li>
                    <li><a href="\web\deleteppage.php">刪除</a></li>
                    <li><a href="\web\updateppage.php">更新</a></li>   
                    <li><a href="\web\fetchppage.php">查詢</a></li>                  
                </ul>
            </li>
            
            <li class="sub">         
                <a href="#">設備和設備問題</a>          
                <ul>          
                    <li><a href="\web\insertmpage.php">新增</a></li>
                    <li><a href="\web\deletempage.php">刪除</a></li>
                    <li><a href="\web\updatempage.php">更新</a></li>   
                    <li><a href="\web\fetchmpage.php">查詢</a></li>                    
                </ul>
            </li>  
			<li class="sub">         
                <a href="#">維修紀錄</a>          
                <ul>          
                    <li><a href="\web\insertrepairpage.php">新增</a></li>   
                    <li><a href="\web\fetchrepair.php">查詢</a></li>                      
                </ul>
            </li>
			<li class="sub">         
                <a href="#">帳號相關</a>          
                <ul>          
                    <li><a href="\web\signup_check.php">帳號審核(需管理員帳號)</a></li>
                    <li><a href="\web\signup.php">帳號申請</a></li>                   
                </ul>
            </li>				
                
        </ul>
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="content">
            <h2>請填入維修紀錄</h2>

		<form action="insertrepair.php" method="GET">
		
            <table border="0">				
				<tr><td>設備編號</td><td>
				<select name = "manum">
				<?php
				$cabnum='';
				foreach($recordRow as $row):
				$selected = '';
					if ( $row->id == $manum ) {
					$selected = "selected='selected'";
					}
					if ( $row['cabnum'] != $cabnum ) {
						if ( $cabnum ) {
						echo "</optgroup>";
					}
				?>	
				<optgroup label="<?php echo "機櫃編號".$row['cabnum']; ?>"> 
				<?php $cabnum = $row['cabnum'];}?>
				<option value=<?php echo $row['manum'];?>><?php echo $row['manum']; ?></option>
				</optgroup>
				<?php endforeach;?>
				</select>
				</td></tr>
				
                <tr><td>維修人員</td><td>
				<select name = "renum">
				<?php
				foreach($recordRow1 as $row1):
				?>
				<option value=<?php echo $row1['renum'];?>><?php echo $row1['name']; ?></option>
				<?php endforeach;?>
				</select>
				</td></tr>
				
                <tr><td>備註</td><td><input type="text" name="remark" size="50"></td></tr>
				<tr><td></td><td align="right"><input type="submit" name="submit" value="確定"></td></tr>
            </table>
        </form>     
               
        </div>       
        
        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            Teleberry 2021. 
        </div>  
    </div>
    <!--**************************-->    
</body>
   
</html>
