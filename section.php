<?php
include('libs/session.php');
include('libs/db.php');
require('libs/Smarty.class.php');
include('libs/background.php');
include('libs/wordTruncate.php');

$query = sprintf('SELECT * FROM %sposts WHERE tipo="%s"', DB_TBL_PREFIX, mysql_real_escape_string($tipo, $GLOBALS['DB']));

$result = mysql_query($query, $GLOBALS['DB']);


$rows_post = array();
while($rows = mysql_fetch_array($result)){
	
	$rows_post[] = $rows;

}


$smarty = new Smarty;
$smarty->assign("rows_post", $rows_post);	
$smarty->assign("imagen", $imagen);
$smarty->assign("titulo", $titulo);
$smarty->assign("contenido", $descripcion);
$smarty->assign("sesion", $sesion);
$smarty->assign("bg", $bg);
$smarty->display('header.tpl');
$smarty->display('content_section.tpl');
$smarty->display('footer.tpl');
?>
