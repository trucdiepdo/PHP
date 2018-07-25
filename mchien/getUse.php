<?php
include 'connect_postgresql.php';
if (isset($_POST)) {
    $groupid = $_POST['ddlGroup'];
    $result  = pg_query('SELECT
    "M_GROUP"."GROUP_ID",
    "M_GROUP"."GROUP_NM",
    "M_GROUP"."GROUP_ORDER",
    "M_GROUP"."DEL_FLG",
    COUNT( "M_GROUP_OFFICE"."OFFICE_CD" ) AS "DEM",
    "M_GROUP"."GROUP_FLG"
FROM
    PUBLIC."M_GROUP"
    left JOIN PUBLIC."M_GROUP_OFFICE" ON "M_GROUP"."GROUP_FLG" = "M_GROUP_OFFICE"."GROUP_FLG"
    AND "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
WHERE
    "M_GROUP"."GROUP_FLG" = \'' . $groupid . '\'
GROUP BY
    "M_GROUP"."GROUP_ID",
    "M_GROUP"."GROUP_NM",
    "M_GROUP"."GROUP_ORDER",
    "M_GROUP"."DEL_FLG"
ORDER BY
    "M_GROUP"."GROUP_ORDER"');
    
    
    while ($row = pg_fetch_row($result)) {
        echo "<tr group-id='$row[0]' group-flg='$row[5]'>
            <td style='text-align: left; word-wrap: break-word;'>$row[1]</td>
            <td style='text-align: center;'>$row[2]</td>
            <td style='text-align: center;'>";
        ?>
           <?php
            if ($row[3] == 1)
                echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAR1SURBVGhD7Zh9TFV1GMfvOfdy4XYvIOAF3yKV2zCUt8vtXkCbbwt1Fb2PGbUytFZhYGqBkFurrVqbubkyN3XC7IU1RsL6qzRJTYRGRiom+RYVlGW+hJeEsu/3IHo4/sSXAM/dznf77N57fs9z7vM7+z3P7/kdkyFDhgwZMnRRNpANZOVXgOoucBicA4/yQqDJAlaAM86ZSV86ZyRtxfe9HAgk3QRqJLP806Q3H/8+s6b0nPeDxSdw7S/gpkEgyAo+lyzmI2nr83/jJHoJGRVRh7GXFSudSwKVkkU+6l6X366eBInNnbYN4w2Kpc61XJKlNvfa/DbtJIinvOAYbLpAtGKtU90LOhNee2SfaBK9mG3Be2CXp3joUC5wYkzOHdtFwauJmePm8voWcBnqSkzuevv4mB2iwLV4P1zCykWKzvvqRm+wQnkrlnaIAhdhjXTUw88Pxih30IGmAf/E1x9rFgWsJaO6pDtsUuwW+HBPyeIN9CAHOBQ1dWKtKGgt3oolp6zO8K/g0woSeYOB0AjARu7/aLVsC9qX/smyblHgapJW5DVj+R2ED/eQAV1OrBq88Uzl17XrTuBPXpl3UBS4mrELsrbDlsm9CgSDAVMc+CdqSkItPplw83jxGsRgDjinJ24VBa4mOitlM2z5H0/ScaC12OwIaeIfxRc/tBu/+bTmKiNXpyIsk8O+yuJObeBqIidP4CR47+mK1yCoNjor9cLTjCu452tcOwV8ymj/Gg1Oxy28u0EddB82lf47LHUcK9NJMIVOg6Fw0JX0dt4P6j/HEuAyawdXSsQy7AGNal8tER7XF7D7E1zNg7lu3WeSpON8atoAbLHDWRqbACcrUho4m7xy/mUTfMQc92ew6QCDOgnqVevwUOGyyKgq+ttsD+EJrgaYFeu+qrW7Rm0T+ZJbnpjB6tQJZinWg6xqa4SjwVf5kl8UjKe88A+2G7B7p8f8gh4AHZ71z/8q8puwPOcbjHMSuTQeCiWD/XKwZX/qe88cFQWV8u7TR9CXnobd/YpHT2PXEpkZLyy3aRsK202yxPwqUayHUDxPv48D0C8pqxb0Sfpebs6dugM2bSASLJJk+ef0j1+8pClM31TSbQm1NcKmGtyQtpzvl1ZzMu51z7VqAyTBzvBdsKkCx8c/NXuXyAYVimWWHcIwcMPEJ7gRy+yA76OlJ7VBpq559keM+y1h9t3aMXLbK3PZ5rBC6eKtCBvHOmtU2E4uE22wrsLsevfahZckOIvF+SawVLmLThQDWkMTYrdoA74cEbe72H6wVOvqhEfxfNAx+sHMKzaCiW/Na4btWTCZjnoUXzL745c93G8LEhRuZ2+2RvHQsYrQwhzjXiKahOuFbFYyNphcjrpXGRK5xVO+6Hf1JNKrirvkIHMLxod847teMYE3yzbrd76Ki2V5ZLaXb9N53uaGGjBiB1xnCbM1ZlQVn0krK2hj14xrOcpogMkJmrDD77RGOZgbnypXA1Q8ETIv2HcFRIL3p5Hg1p6vhgwZMmRIJJPpP9PuLAZiOEJWAAAAAElFTkSuQmCC">';
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
