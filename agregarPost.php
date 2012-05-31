<?php
include('libs/session.php');
require('libs/Smarty.class.php');
include('libs/background.php');
include('libs/db.php');
include('libs/token.php');

if(isset($_POST['submitted'])){
	
	$tipo = htmlentities( $_POST['tipo'] );
	$titulo = htmlentities($_POST['titulo']);	
	$imagen_principal = $_POST['imagen_principal'];
	$body = $_POST['body'];
	$date= date("Y-m-d H:i:s");
	$counter = htmlentities($_POST['counter']);	
	$token = htmlentities($_POST['token']);
	function fecha_mysql($date){
	$day=substr($date,0,2);
	$month=substr($date,3,2);
	$year=substr($date,6,4);
	$date=$year."-".$month."-".$day;	

	return ($date);
	}
	for($i=0; $i <= $counter; $i++){
	
		$name = htmlentities($_POST[$i]);
		$titulo = htmlentities($_POST['titulo']);
		
		
		if($name !="" || $name != null){
		
			$query_imagen = sprintf('INSERT INTO %simagenespost(ruta_imagen, token, titulo_post) VALUES("%s", "%s", "%s")', DB_TBL_PREFIX, mysql_real_escape_string($name, $GLOBALS['DB']), mysql_real_escape_string($token, $GLOBALS['DB']), mysql_real_escape_string($titulo, $GLOBALS['DB']));
			
			$result_imagen = mysql_query($query_imagen, $GLOBALS['DB']);
		
		}	
		
	
	}

	$query = sprintf('INSERT INTO %sposts (titulo, imagen_principal, body, tipo, autor, fecha, token) VALUES("%s", "%s", "%s", "%s", "%s", "%s", "%s")', DB_TBL_PREFIX, 
	mysql_real_escape_string($titulo, $GLOBALS['DB']),
	mysql_real_escape_string($imagen_principal,  $GLOBALS['DB']),
	mysql_real_escape_string($body, $GLOBALS['DB']),
	mysql_real_escape_string($tipo, $GLOBALS['DB']),
	mysql_real_escape_string($_SESSION['usuario'], $GLOBALS['DB']),
	mysql_real_escape_string($date, $GLOBALS['DB']),
	mysql_real_escape_string($token, $GLOBALS['DB']));
	
	$result = mysql_query($query, $GLOBALS['DB']);
	
	if($result){
		header("Location:posts.php?token=".$token."&tipo=".$tipo."");
	}	
}

$smarty = new Smarty;
$smarty->assign("token", token(10));
$smarty->assign("sesion", $sesion);
$smarty->assign("bg", $bg);
$smarty->display('header.tpl');
$smarty->display('post.tpl');
$smarty->display('footer.tpl');
?>
