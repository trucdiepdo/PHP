<?php
include 'connect_postgresql.php';
session_start();
$result = pg_query('select "PERSON", "STATE", "OFFICE_CD", "OFFICE_NAME", "QUALIFICATION", "OFFICE_SNAME", "PHONE", "ADDRESS"
                                        from public."M_OFFICE"');
$result_kq = pg_query('select "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."QUALIFICATION", 
                                        "M_OFFICE"."ADDRESS", "M_OFFICE"."PERSON"
                            from  public."M_GROUP_OFFICE"
                            inner join public."M_OFFICE"
                            on "M_GROUP_OFFICE"."OFFICE_CD" = "M_OFFICE"."OFFICE_CD"
                            where "M_GROUP_OFFICE"."GROUP_ID" = \''.$_GET["groupid"].'\' and "M_GROUP_OFFICE"."GROUP_FLG" = \''.$_GET["groupflg"].'\'');
$chuoi = '';
$chuoiss = '';
if(isset($_SESSION[''.'session_'.$_GET["groupid"].'-'.$_GET["groupflg"]])){
$chuoiss = $_SESSION[''.'session_'.$_GET["groupid"].'-'.$_GET["groupflg"]];
}

while ($row = pg_fetch_row($result_kq)) {
    $chuoi = $chuoi . trim($row[1]).'-';
}
 while ($row = pg_fetch_row($result)) {
     echo "<tr>" ;
	 if(isset($_SESSION[''.'session_'.$_GET["groupid"].'-'.$_GET["groupflg"]])){
		 if(strpos($chuoiss, trim($row[2])) !== false) {
         echo "<td><input type=\"checkbox\" checked></td>";
		}
		else {
         echo "<td><input type=\"checkbox\"> </td>";
		}
	 }
	 else{	 
		if(strpos($chuoi, trim($row[2])) !== false) {
         echo "<td><input type=\"checkbox\" checked></td>";
		}
		else {
         echo "<td><input type=\"checkbox\"> </td>";
		}
 									
	 }
 			echo					"<td style=\" text-align: left; word-wrap: break-word;\">$row[0]</td>
 									<td style=\" text-align: left; word-wrap: break-word;\">$row[1]</td>
 									<td style=\"text-align: left; word-wrap: break-word;\">$row[2]</td>
 									<td style=\" text-align: left; word-wrap: break-word;\">$row[3]</td>
 									<td style=\" text-align: left; word-wrap: break-word;\">$row[4]</td>
 									<td style=\" text-align: left; word-wrap: break-word;\">$row[5]</td>
 									<td style=\" text-align: left; word-wrap: break-word;\">$row[6]</td>
 									<td style=\"text-align: left; word-wrap: break-word;\">$row[7]</td>
 								</tr>";
 }

?>
