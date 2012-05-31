<?php
include('libs/session.php');
require('libs/Smarty.class.php');
include('libs/background.php');

$smarty = new Smarty;

if(isset($_GET['accion'])){
	$arr = array('accion' => $_GET['accion']);
	json_encode($arr);	
}else{
	$arr = 'null';
}

$smarty->assign("sesion", $sesion);
$smarty->assign("arr", json_encode($arr));
$smarty->assign("bg", $bg);
$smarty->display('header.tpl');
$smarty->display('content.tpl');
$smarty->display('footer.tpl');

?>