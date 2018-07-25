<?php
include 'connect_postgresql.php';
if(isset($_POST)){
    if(isset($_POST["myData"])){
        
        $data = $_POST["myData"];
        var_dump($data);

        pg_query("BEGIN") or die("Could not start transaction\n");
        try {
            foreach($data as $key=>$value){
                if(isset($value["OfficeCds"])){
                    $sql_checked = 'update public."M_GROUP_OFFICE" set "OFFICE_CD" = \''.$value["OfficeCds"].'\' where "GROUP_ID" = \''.$value["GroupId"].'\' and "GROUP_FLG" = \''.$value["GroupFLG"].'\'';
                    $res_checked = pg_query($sql_checked);
                }
            }
        pg_query("COMMIT") or die("Transaction commit failed\n");
    } catch (Exception $e) {
        pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
    }
    finally {
        pg_close();
    }
    }
}
