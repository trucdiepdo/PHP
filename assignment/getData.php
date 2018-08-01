<?php

session_start();
include 'connect_postgresql.php';

if(isset($_POST) || isset($_SESSION["myData"])){
    if(isset($_POST["myData"]) || isset($_POST["Remove"]) || isset($_SESSION["myData"])){
        
        $groupflg = $_POST["GroupFlg"];
        $delflg = 0;
        $data = $_POST["myData"];
        $OfficeCds = $_SESSION["myData"]["OfficeCds"];
        $GroupId =  $_SESSION["myData"]["GroupId"];
        $GroupFlg =  $_SESSION["myData"]["GroupFLG"];
        $remove = $_POST["Remove"]; 
        
        pg_query("BEGIN") or die("Transaction commit failed\n");
        try {
            foreach($data as $key=>$value){
                if(isset($value["IsNew"]) && $value["IsNew"] == 1){
                    
                    // Add & insert row
                    $sql_insert = 'insert into public."M_GROUP" ("GROUP_ID", "GROUP_NM", "GROUP_ORDER","GROUP_FLG", "DEL_FLG") values (\''.$value["GroupId"].'\',\''.$value["GroupNM"].'\',\''.$value["GroupOrder"].'\',\''.$groupflg.'\',\''.$delflg.'\')';
                    $res_insert = pg_query($sql_insert);
                }
                if(isset($value["IsNew"]) && $value["IsNew"] == 0){
                    
                    // Update
                    $sql_update = 'update public."M_GROUP" set "GROUP_NM" = \''.$value["GroupNM"].'\', "GROUP_ORDER" = \''.$value["GroupOrder"].'\' where "GROUP_ID" = \''.$value["GroupId"].'\'';
                    $res_update = pg_query($sql_update);
                }
            }
            foreach ($remove as $key=>$value){
                
                // Delete data in database
                $sql_delete = 'delete from public."M_GROUP" where "GROUP_ID" = \''.$value.'\'';
                $res_delete = pg_query($sql_delete);
            }
            
            $sql_delete_session = 'delete from public."M_GROUP_OFFICE" where "GROUP_ID" = \''.$GroupId.'\' and "GROUP_FLG" = \''.$GroupFlg.'\'';
            $res_delete_session = pg_query($sql_delete_session);
            
            foreach($OfficeCds as $key=>$value){
                
                $sql_session = 'insert into public."M_GROUP_OFFICE" ("GROUP_ID", "GROUP_FLG", "OFFICE_CD") values (\''.$GroupId.'\',\''.$GroupFlg.'\',\''.$value.'\')';
                $res_session = pg_query($sql_session);
            }
            
            pg_query("COMMIT") or die("Transaction commit failed\n");
        } catch (Exception $e) {
            pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
        }
        finally {
            pg_close();
        }
        
    } else if (isset($_POST["Remove"]) || isset($_POST["myData"])){
        
        $remove = $_POST["Remove"]; 
        try {
            foreach ($remove as $key=>$value){
                
                $sql_delete = 'delete from public."M_GROUP" where "GROUP_ID" = \''.$value.'\'';
                $res_delete = pg_query($sql_delete);
            }
            
            pg_query("COMMIT") or die("Transaction commit failed\n");
        } catch (Exception $e) {
            pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
        }
        finally {
            pg_close();
        }
    }
} elseif (isset($_SESSION["myData"]) && isset($_POST)){
    
    $myData = $_SESSION["myData"]["OfficeCds"];
    $groupId =  $_SESSION["myData"]["GroupId"];
    $groupFlg =  $_SESSION["myData"]["GroupFLG"];
    
    pg_query("BEGIN") or die("Could not start transaction\n");
    
    try {
        $sql_delete_session = 'delete from public."M_GROUP_OFFICE" where "GROUP_ID" = \''.$groupId.'\' and "GROUP_FLG" = \''.$groupFlg.'\'';
        $res_delete_session = pg_query($sql_delete_session);
        
        foreach($myData as $key=>$value){
            
            $sql_session = 'insert into public."M_GROUP_OFFICE" ("GROUP_ID", "GROUP_FLG", "OFFICE_CD") values (\''.$groupId.'\',\''.$groupFlg.'\',\''.$value.'\')';
            $res_session = pg_query($sql_session);
        }
        
        pg_query("COMMIT") or die("Transaction commit failed\n");
    } catch (Exception $e) {
        pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
    }
    finally {
        pg_close();
    }
}
?>

