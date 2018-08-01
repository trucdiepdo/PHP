<?php
include 'connect_postgresql.php';

if (isset($_POST)) {
    /*
     * Get "GROUP_ID" & "GROUP_FLG" of table 2 to show table 3
     */
    $groupid  = $_POST['groupInforResults'];
    $groupflg = $_POST['groupflgResults'];
    
    $result   = pg_query('select "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."QUALIFICATION",
                                  "M_OFFICE"."ADDRESS", "M_OFFICE"."PERSON", "M_OFFICE"."STATE"
                           from  public."M_GROUP_OFFICE"
                           inner join public."M_OFFICE" on "M_GROUP_OFFICE"."OFFICE_CD" = "M_OFFICE"."OFFICE_CD"
                           where "M_GROUP_OFFICE"."GROUP_ID" = \'' . $groupid . '\' and "M_GROUP_OFFICE"."GROUP_FLG" = \'' . $groupflg . '\'
                           group by "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."PERSON", "M_OFFICE"."QUALIFICATION",
                           "M_OFFICE"."ADDRESS", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."STATE"');
    
    // Show table 3 in index.php
    while ($row = pg_fetch_row($result)) {
        echo "<tr>
                <td style='text-align: center; word-wrap: break-word;'>$row[1]</td>
                <td style='word-wrap: break-word;'>$row[2]</td>
                <td style='text-align: center; word-wrap: break-word;'>$row[3]</td>
                <td style='word-wrap: break-word;'>$row[4]</td>
                <td style='word-wrap: break-word;'>$row[5]</td>
                <td style='word-wrap: break-word;'>$row[6]</td>
            </tr>";
    }
}
?>
