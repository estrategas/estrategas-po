<?php
include('libs/session.php');
include('libs/db.php');
require('libs/Smarty.class.php');
include('libs/background.php');
include('libs/wordTruncate.php');

/*$query = sprintf(' SELECT * FROM (SELECT * FROM %sposts 
        ORDER BY id DESC LIMIT 4) T1 ORDER BY id', DB_TBL_PREFIX);	*/
		
$query = sprintf('SELECT * FROM %sposts ORDER BY id DESC LIMIT 0,1', DB_TBL_PREFIX);
$result = mysql_query($query, $GLOBALS['DB']);
$rows = mysql_fetch_object($result);

$query1 = sprintf('SELECT * FROM %sposts ORDER BY id DESC LIMIT 1,2', DB_TBL_PREFIX);
$result1 = mysql_query($query1, $GLOBALS['DB']);
$rows1 = mysql_fetch_object($result1);

$query2 = sprintf('SELECT * FROM %sposts ORDER BY id DESC LIMIT 2,3', DB_TBL_PREFIX);
$result2 = mysql_query($query2, $GLOBALS['DB']);
$rows2 = mysql_fetch_object($result2);

$query3 = sprintf('SELECT * FROM %sposts ORDER BY id DESC LIMIT 3,4', DB_TBL_PREFIX);
$result3 = mysql_query($query3, $GLOBALS['DB']);
$rows3 = mysql_fetch_object($result3);



$smarty = new Smarty;

$smarty->assign("post_imagen", $rows->imagen_principal);
$smarty->assign("post_titulo", $rows->titulo);
$smarty->assign("post_content", $rows->body);
$smarty->assign("post", $rows->token);

$smarty->assign("post_imagen1", $rows1->imagen_principal);
$smarty->assign("post_titulo1", $rows1->titulo);
$smarty->assign("post_content1", $rows1->body);
$smarty->assign("post1", $rows1->token);

$smarty->assign("post_imagen2", $rows2->imagen_principal);
$smarty->assign("post_titulo2", $rows2->titulo);
$smarty->assign("post_content2", $rows2->body);
$smarty->assign("post2", $rows2->token);

$smarty->assign("post_imagen3", $rows3->imagen_principal);
$smarty->assign("post_titulo3", $rows3->titulo);
$smarty->assign("post_content3", $rows3->body);
$smarty->assign("post3", $rows3->token);

$smarty->assign("imagen", $imagen );
$smarty->assign("sesion", $sesion);
$smarty->assign("bg", $bg);
$smarty->display('header.tpl');
$smarty->display('content_index.tpl');
$smarty->display('footer.tpl');
?>
