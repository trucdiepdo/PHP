<?php
if(isset($_POST)) {
    $db = pg_connect("host=localhost port=5432 dbname=training user=postgres password=have@tript0Singapore");
    $q = $_POST['ddlGroup'];
    $res2 = pg_query($db, 'select "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", count("M_GROUP_OFFICE"."OFFICE_CD") as "DEM"
	                                                       from public."M_GROUP" inner join public."M_GROUP_OFFICE"
	                                                       on "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
		                                                   where "M_GROUP"."GROUP_FLG" = \''.$q.'\'
		                                                   group by "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG"');
    
    while($row = pg_fetch_row($res2)){
       
        echo
        "<tr id-get-office='$row[0]' class='row-even'>
			<td>$row[1]</td>
			<td>$row[2]</td>
			<td>"; ?>
			<?php 
				if($row[3] == 1)
					echo '<img src="https://www.zfshare.com/theme/Template-3/img/green_ticks.gif" width="20px">';
				else
					echo '';
			?>
			<?php 
				echo "</td>
				<td>$row[4]</td>
				</tr>";
	}
	
			
}?>
