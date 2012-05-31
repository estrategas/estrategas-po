<?php
include('libs/session.php');
require('libs/Smarty.class.php');
include('libs/db.php');

function escapar($string){

	$escaped = array("'", '\\');
	$meta = array("", "");
	$out =  $string;
	$out = str_replace( $escaped, $meta, $out );

	return $out;
}

if(isset($_GET['token'])){

	
	$token = $_GET['token'];
	
	$query = sprintf('SELECT * FROM %sposts WHERE token="%s"', DB_TBL_PREFIX, mysql_real_escape_string($token, $GLOBALS['DB']));	
	$result = mysql_query($query, $GLOBALS['DB']);
	$rows = mysql_fetch_object($result);


	$query_imagenes = sprintf('SELECT * FROM %simagenespost WHERE token="%s"', DB_TBL_PREFIX, mysql_real_escape_string($token, $GLOBALS['DB']));	
	$result_imagenes = mysql_query($query_imagenes, $GLOBALS['DB']);
}

$rows_imagenes = array();
while($rows_imagen = mysql_fetch_array($result_imagenes)){
	
	$rows_imagenes[] = $rows_imagen;

}

$bg1 = $rows->tipo;
include('libs/background1.php');

$smarty = new Smarty;
$smarty->assign('imagenes_post', $rows_imagenes);
$smarty->assign('titulo', escapar($rows->titulo));
$smarty->assign('autor', escapar($rows->autor));
$smarty->assign('fecha', escapar($rows->fecha));
$smarty->assign('content', escapar($rows->body));

if(isset($_SESSION['usuario'])){
$smarty->assign('editar', '<a href="editar.php?token='.$rows->token.'">Editar</a>');
}


$smarty->assign("sesion", $sesion);
$smarty->assign("bg", $bg);
$smarty->assign("imagen", $imagen);
$smarty->assign("titulo1", $titulo);
$smarty->assign("contenido", $descripcion);
$smarty->display('header.tpl');
$smarty->display('contentPost.tpl');
$smarty->display('footer.tpl');
?>
