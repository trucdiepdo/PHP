<?php
include 'connect_postgresql.php';
if(isset($_POST)) {
    $groupid = $_POST['groupInforResults'];
    $groupflg = $_POST['groupflgResults'];
    $res3 = pg_query('select "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."QUALIFICATION", 
                                        "M_OFFICE"."ADDRESS", "M_OFFICE"."PERSON", "M_OFFICE"."STATE"
                            from  public."M_GROUP_OFFICE"
                            inner join public."M_OFFICE"
                            on "M_GROUP_OFFICE"."OFFICE_CD" = "M_OFFICE"."OFFICE_CD"
                            where "M_GROUP_OFFICE"."GROUP_ID" = \''.$groupid.'\' and "M_GROUP_OFFICE"."GROUP_FLG" = \''.$groupflg.'\'
                            group by "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."PERSON", "M_OFFICE"."QUALIFICATION", 
                            "M_OFFICE"."ADDRESS", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."STATE"');
while($row = pg_fetch_row($res3)) {
    echo "<tr>
									<td>$row[1]</td>
									<td>$row[2]</td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>$row[5]</td>
									<td>$row[6]</td>
								</tr>";
}
}
?>