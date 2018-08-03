<?php 
require_once 'smarty/libs/Smarty.class.php';
require_once 'connect_postgresql.php';

$result_table1 = pg_query('select distinct "GROUP_FLG" from public."M_GROUP"');

// $result_table2 = pg_query('SELECT "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", COUNT("M_GROUP_OFFICE"."OFFICE_CD") AS "DEM", "M_GROUP"."GROUP_FLG"
//                          FROM PUBLIC."M_GROUP" left JOIN PUBLIC."M_GROUP_OFFICE" ON "M_GROUP"."GROUP_FLG" = "M_GROUP_OFFICE"."GROUP_FLG" AND "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
//                          WHERE "M_GROUP"."GROUP_FLG" = "1"
//                          GROUP BY "M_GROUP"."GROUP_ID", "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG"
//                          ORDER BY"M_GROUP"."GROUP_ORDER"');

// $result   = pg_query('select "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."QUALIFICATION",
//                                   "M_OFFICE"."ADDRESS", "M_OFFICE"."PERSON", "M_OFFICE"."STATE"
//                            from  public."M_GROUP_OFFICE"
//                            inner join public."M_OFFICE" on "M_GROUP_OFFICE"."OFFICE_CD" = "M_OFFICE"."OFFICE_CD"
//                            where "M_GROUP_OFFICE"."GROUP_ID" = \'' . $groupid . '\' and "M_GROUP_OFFICE"."GROUP_FLG" = \'' . $groupflg . '\'
//                            group by "M_GROUP_OFFICE"."GROUP_ID", "M_OFFICE"."OFFICE_CD", "M_OFFICE"."PERSON", "M_OFFICE"."QUALIFICATION",
//                            "M_OFFICE"."ADDRESS", "M_OFFICE"."OFFICE_SNAME", "M_OFFICE"."STATE"');

$arrayid = array();
$index = 0;
while ($row = pg_fetch_row($result_table1)) {
    $arrayid[$index] = "User ".$row[0];
    $index++;
}

// while ($row = pg_fetch_row($result_table2)) {
//     $arrayid[$index] = $row[0];
//     $index++;
// }

$smarty = new Smarty();
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->setCompileDir('smarty/templates_c/');
$smarty->setConfigDir('smarty/configs/');
$smarty->setCacheDir('smarty/cache/');
$smarty->setTemplateDir('smarty/templates/');

// Get "GROUP_FLG"
$smarty->assign("arrayId",$arrayid);
    
$smarty->display('index.tpl');

