<?php

@error_reporting(E_ALL | E_STRICT);
@ini_set('display_errors', '1');

$con = mysql_connect('localhost', 'onestop_wrdp1', '5QmJnHP3xiYs');
$dbName = 'onestop_wrdp1';

$sql = "SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$dbName."';";
$rs = mysql_query($sql, $con);

$count = 0;
$ok = 0;
while($row = mysql_fetch_array($rs)){
        $count ++;
        $tbl = $row[0];
        $sql = "ALTER TABLE ".$dbName.".".$tbl." ENGINE=INNODB;";
        $resultado = mysql_query($sql);
        if ($resultado){
                $ok ++;
                echo $sql."<hr/>";
        }
}
if ($count == $ok){
        echo '<div style="color: green"><b>ALL OK</b></div>';
}else{
        echo '<div style="color: red"><b>ERRORS</b>Total tables: '.$count.', updated tables:'.$ok.'</div>';
}