<?php
include 'connect_postgresql.php';

if (isset($_POST)) {
    
    // Get GROUP_FLG from value in #ddlGroup
    $groupflg = $_POST['ddlGroup'];
    $result  = pg_query('SELECT "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", COUNT("M_GROUP_OFFICE"."OFFICE_CD") AS "DEM", "M_GROUP"."GROUP_FLG"
                         FROM PUBLIC."M_GROUP" left JOIN PUBLIC."M_GROUP_OFFICE" ON "M_GROUP"."GROUP_FLG" = "M_GROUP_OFFICE"."GROUP_FLG" AND "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
                         WHERE "M_GROUP"."GROUP_FLG" = \'' . $groupflg . '\'
                         GROUP BY "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG"
                         ORDER BY"M_GROUP"."GROUP_ORDER"');
    
    // Table 2 in index.php
    while ($row = pg_fetch_row($result)) {
        echo "<tr group-id='$row[0]' group-flg='$row[5]'>
                <td style='text-align: left; word-wrap: break-word;'>$row[1]</td>
                <td style='text-align: center;'>$row[2]</td>
                <td style='text-align: center;'>"; ?>
           <?php
           
           /* Check condition to tick
            * If true --> show image
            * false ' '
            */
            if ($row[3] == 1)
                echo '<img src="http://172.16.3.82:8082/assets/img/accept.gif">';
            else
                echo '';
            ?>
           <?php
        echo    "</td>
                <td style='text-align: right;'>$row[4]</td>
              </tr>";
    }
}
?>
