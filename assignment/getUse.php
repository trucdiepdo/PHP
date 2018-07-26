<?php
include 'connect_postgresql.php';
if (isset($_POST)) {
    $groupflg = $_POST['ddlGroup'];
    $result  = pg_query('SELECT
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
    "M_GROUP"."GROUP_FLG" = \'' . $groupflg . '\'
GROUP BY
    "M_GROUP"."GROUP_ID",
    "M_GROUP"."GROUP_NM",
    "M_GROUP"."GROUP_ORDER",
    "M_GROUP"."DEL_FLG"
ORDER BY
    "M_GROUP"."GROUP_ORDER"');
    
    
    while ($row = pg_fetch_row($result)) {
        echo "<tr group-id='$row[0]' group-flg='$groupflg'>
            <td style='text-align: left; word-wrap: break-word;'>$row[1]</td>
            <td style='text-align: center;'>$row[2]</td>
            <td style='text-align: center;'>";
        ?>
           <?php
            if ($row[3] == 1)
                echo '<img src="https://www.zfshare.com/theme/Template-3/img/green_ticks.gif" width="20px">';
            else
                echo '';
            ?>
           <?php
        echo "</td>
             <td style='text-align: right;'>$row[4]</td>
             </tr>";
    }
}
?>
