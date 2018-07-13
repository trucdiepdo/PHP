<?php
if(isset($_POST)) {
    $db = pg_connect("host=172.16.3.82 port=5432 dbname=Training user=postgres password=have@tript0Singapore");
    $q = $_POST['ddlGroup'];
    $res2 = pg_query($db, 'select "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", count("M_GROUP_OFFICE"."OFFICE_CD") as "DEM"
	                                                       from public."M_GROUP" inner join public."M_GROUP_OFFICE"
	                                                       on "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
		                                                   where "M_GROUP"."GROUP_FLG" = \''.$q.'\'
		                                                   group by "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG"');
   
    while($row = pg_fetch_row($res2)){
        echo
        "<tr onclick='onSelectedItem($row[0]); return false;' class='row-even'>
			<td>$row[1]</td>
			<td>$row[2]</td>
			<td>"; ?>
			<?php 
				if($row[3] == 1)
					echo '<img src="http://172.16.3.82:8082/assets/img/accept.gif">';
				else
					echo '';
			?>
			<?php 
				echo "</td>
				<td>$row[4]</td>
				</tr>";
	}
	
			
}?>
