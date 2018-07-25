<?php
include 'connect_postgresql.php';
if(isset($_POST)){
    $groupflg = $_POST["GroupFlg"];
    $delflg = 0;
    $data = $_POST["myData"];
//     $remove = $_POST["Remove"];
//     var_dump($remove);
    pg_query("BEGIN") or die("Could not start transaction\n");
    try {
        foreach($data as $key=>$value){
            var_dump($value);
            if($value["IsNew"] == 1){
                // Add & insert row
                $sql_insert = 'insert into public."M_GROUP" ("GROUP_ID", "GROUP_NM", "GROUP_ORDER","GROUP_FLG", "DEL_FLG") values (\''.$value["GroupId"].'\',\''.$value["GroupNM"].'\',\''.$value["GroupOrder"].'\',\''.$groupflg.'\',\''.$delflg.'\')';           
                $res_insert = pg_query($sql_insert);
            }
        
              if($value["IsNew"] == 0){
			// Update 
                $sql_update = 'update public."M_GROUP" set "GROUP_NM" = \''.$value["GroupNM"].'\', "GROUP_ORDER" = \''.$value["GroupOrder"].'\' where "GROUP_ID" = \''.$value["GroupId"].'\'';           
                $res_update = pg_query($sql_update);
            }
            
            // Delete
//             $sql_delete = 'delete from public."M_GROUP" where "GROUP_ID" = \''.$value["GroupId"].'\'';
//             $res_delete = pg_query($sql_delete);
        }
        pg_query("COMMIT") or die("Transaction commit failed\n");
    } catch (Exception $e) {
        pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
    }
    finally {
        pg_close();
    }
}
