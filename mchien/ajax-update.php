<?php
include 'connect_postgresql.php';
if (isset($_GET)) {
    $groupflg    = $_GET['groupflg'];
    $result = pg_query('SELECT "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", COUNT( "M_GROUP_OFFICE"."OFFICE_CD" ) AS "DEM", "M_GROUP"."GROUP_ID"
                                                            FROM PUBLIC."M_GROUP" left JOIN PUBLIC."M_GROUP_OFFICE"
                                                            ON "M_GROUP"."GROUP_FLG" = "M_GROUP_OFFICE"."GROUP_FLG" AND "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
                                                            WHERE "M_GROUP"."GROUP_FLG" = \'' . $groupflg . '\' AND "M_GROUP"."DEL_FLG" = \'0\'
                                                            GROUP BY "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG",  "M_GROUP"."GROUP_ID"
                                                            ORDER BY "M_GROUP"."GROUP_ORDER"');
    while ($row = pg_fetch_row($result)) {
        
        echo "<tr value=".trim($row[4]).">
                                             <td style=\"height: 47px;\"><input onClick=\"clearText(this); return false;\" style=\"width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;\" type=\"button\" value=\"クリア\"></td>
                                             <td><input name= \"groupnm\" style=\"width: 865px; text-align: left;\" type=\"text\" value=\"".trim($row[0])."\"></td>
                                             <td><input name= \"grouporder\" style=\"width: 100px; text-align: right;\" type=\"number\" value=\"".trim($row[1])."\"></td>
                                             <td><div style=\"width: 50px; text-align: center;\" >$row[3]件</div></td>
                                             <td><button onClick=\"onEditItem(this);return false;\" style=\"width: 100px; text-align: center;\" type=\"text\">営業所選択</button></td>
                                      </tr>";
    }
    
}
?>
