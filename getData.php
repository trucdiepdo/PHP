<?php
include 'connect_postgresql.php';
if(isset($_POST)){
    
    $groupflg = $_POST["GroupFlg"];
    $data = $_POST["myData"];
    var_dump($data);
//     var_dump($groupflg);
    pg_query("BEGIN") or die("Could not start transaction\n");
    try {
        foreach($data as $key=>$value){
            if($value["IsNew"] == 1){
            $sql = 'insert into public."M_GROUP" ("GROUP_ID", "GROUP_NM", "GROUP_ORDER") values (\''.$value["GroupId"].'\',\''.$value["GroupNM"].'\,\''.$value["GroupOrder"].'\)';
//             $query = "insert into public.\"M_GROUP\" (\"GROUP_ID\", \"GROUP_NM\", \"GROUP_ORDER\") values ('$value['GroupId']',\''.$value["GroupNM"].'\,\''.$value["GroupId"].'\)"
            $res_insert = pg_query($sql);
            }
//             else if($value[IsNew] == 1){
//                 $sql = 'update public."M_GROUP" set "GROUP_NM" = \''.$value["GroupNM"].'\, "GROUP_ORDER" = \''.$value["GroupOrder"].'\ where "GROUP_ID" = \''.$value["GroupId"].'\'';
//                 $res_update = pg_query($sql);
//             }
        }
        pg_query("COMMIT") or die("Transaction commit failed\n");
    } catch (Exception $e) {
        pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
    }
    finally {
        pg_close($sql);
    }
}
