<?php 
require_once 'smarty/libs/Smarty.class.php';

// $smarty= new Smarty();
$smarty = new Smarty(  array('pdo_dsn' => 'postgres:dbname=Training;host=172.16.3.82',
    'user' => 'postgres',
    'password' => 'have@tript0Singapore',
    'pdo_driver_options' => array() ) ); 
//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->setCompileDir('smarty/templates_c/');
$smarty->setConfigDir('smarty/configs/');
$smarty->setCacheDir('smarty/cache/');
$smarty->setTemplateDir('smarty/templates/');

$smarty->display('index.tpl');


