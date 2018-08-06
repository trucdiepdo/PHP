<?php
session_start();
require_once 'smarty/libs/Smarty.class.php';
require_once 'connect_postgresql.php';


$result = pg_query('select "PERSON", "STATE", TRIM("OFFICE_CD"), "OFFICE_NAME", "QUALIFICATION", "OFFICE_SNAME", "PHONE", "ADDRESS"
                                        from public."M_OFFICE"');

$result_compare = pg_query('select "M_GROUP_OFFICE"."GROUP_ID", TRIM("M_OFFICE"."OFFICE_CD"), "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."QUALIFICATION",
                                        "M_OFFICE"."ADDRESS", "M_OFFICE"."PERSON"
                            from  public."M_GROUP_OFFICE"
                            inner join public."M_OFFICE"
                            on "M_GROUP_OFFICE"."OFFICE_CD" = "M_OFFICE"."OFFICE_CD"
                            where "M_GROUP_OFFICE"."GROUP_ID" = \''.trim($_GET["groupid"]).'\' and "M_GROUP_OFFICE"."GROUP_FLG" = \''.trim($_GET["groupflg"]).'\'');

$array = array();
$array1 = array();
$array2 = array();
$string = '';
$string_session = '';
$index = 0;
// Check the existence of session
if(isset($_SESSION['session_'.$_GET["groupid"].'-'.$_GET["groupflg"]])){
    $string_session = $_SESSION['session_'.$_GET["groupid"].'-'.$_GET["groupflg"]];
    if(trim($string_session) != ""){
        $array2 = preg_split("/,/" , $string_session);
    }
}
$index = 0;
// Take all the values row from the database
while ($row = pg_fetch_row($result_compare)) {
    if(in_array(trim($row[1]), $array2) == false){
        $array2[count($array2)] = $row[1];
    }
}
$index = 0;
while ($row = pg_fetch_row($result)) {
    $array[$index] = $row;
    $index++;
}
$smarty = new Smarty();
$smarty->setTemplateDir('smarty/templates/');

$smarty->assign('array1',$array2);
$smarty->assign('row',$array);
$smarty->display('get-info-office.tpl');
?>
