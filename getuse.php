<?php
if(isset($_POST)) {
    $db = pg_connect("host=172.16.3.82 port=5432 dbname=Training user=postgres password=have@tript0Singapore");
    $q = $_POST['ddlGroup'];
    $res2 = pg_query($db, 'SELECT
	"M_GROUP"."GROUP_ID",
	"M_GROUP"."GROUP_NM",
	"M_GROUP"."GROUP_ORDER",
	"M_GROUP"."DEL_FLG",
	COUNT( "M_GROUP_OFFICE"."OFFICE_CD" ) AS "DEM" 
FROM
	PUBLIC."M_GROUP"
	left JOIN PUBLIC."M_GROUP_OFFICE" ON "M_GROUP"."GROUP_FLG" = "M_GROUP_OFFICE"."GROUP_FLG" 
	AND "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID" 
WHERE
	"M_GROUP"."GROUP_FLG" = \''.$q.'\'
GROUP BY
	"M_GROUP"."GROUP_ID",
	"M_GROUP"."GROUP_NM",
	"M_GROUP"."GROUP_ORDER",
	"M_GROUP"."DEL_FLG" 
ORDER BY
	"M_GROUP"."GROUP_ORDER"');
                                                            
   
    while($row = pg_fetch_row($res2)){
        echo
        "<tr id-get-office='$row[0]'>
			<td style='text-align: left; word-wrap: break-word;'>$row[1]</td>
			<td style='text-align: center;'>$row[2]</td>
			<td style='text-align: center;'>"; ?>
			<?php 
				if($row[3] == 1)
					echo '<img src="http://172.16.3.82:8082/assets/img/accept.gif">';
				else
					echo '';
			?>
			<?php 
				echo "</td>
				<td style='text-align: right;'>$row[4]</td>
				</tr>";
	}		
}?>
