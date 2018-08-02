<?php 
require_once 'smarty/libs/Smarty.class.php';
// require_once 'smarty/libs/Database.class.php';
require_once 'connect_postgresql.php';
/*$smarty = new Smarty(  array('pdo_dsn' => 'postgres:dbname=Training;host=172.16.3.82',
    'user' => 'postgres',
    'password' => 'have@tript0Singapore',
    'pdo_driver_options' => array() ) ); */
$result = pg_query('select distinct "GROUP_FLG" from "M_GROUP"');
$arrayid = array();
$index = 0;
while ($row = pg_fetch_row($result)) {
    $arrayid[$index] = $row[0];  
    $index++;
    //echo "Author: $row[0]  E-mail: $row[1]";
    //echo "<br />\n";
}
$smarty = new Smarty();

//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->setCompileDir('smarty/templates_c/');
$smarty->setConfigDir('smarty/configs/');
$smarty->setCacheDir('smarty/cache/');
$smarty->setTemplateDir('smarty/templates/');
$smarty->assign("arrayid",$arrayid);
// $smarty->assign('id', array(1,2,3,4,5));
// $smarty->assign('names', array('bob','jim','joe','jerry','fred'));

$smarty->display('index.tpl');


