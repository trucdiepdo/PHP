<?php
include 'connect_postgresql.php';
if (isset($_POST)) {
    $data = $_POST['myData'];
    $groupflg = $_POST['GroupFlg'];
    $result  = pg_query('insert into public."M_GROUP"("GROUP_ID","GROUP_NM","GROUP_ORDER")
                            values(\''.$data.'\',\''.$groupflg.'\')');
    while ($row = pg_fetch_row($result)) {
        echo "<tr group-id='$row[0]' group-flg='$row[5]'>
            <td style='text-align: left; word-wrap: break-word;'>$row[1]</td>
            <td style='text-align: center;'>$row[2]</td>
            <td style='text-align: center;'>";
        ?>
           <?php
            if ($row[3] == 1)
                echo '<img src="http://172.16.3.82:8082/assets/img/accept.gif">';
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
