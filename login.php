<?php
include('libs/session.php');
include('libs/db.php');
require('libs/Smarty.class.php');
include('libs/background.php');

if(isset($_GET['accion'])){
	$arr = array('accion' => $_GET['accion']);
	json_encode($arr);	
}else{
	$arr = 'null';
}

if(isset($_POST['submitted'])){

	$usuario = $_POST['usuario'];
	$password = sha1($_POST['password']);
	
	$query = sprintf('SELECT * FROM %susuarios WHERE usuario="%s" AND password="%s"',
		DB_TBL_PREFIX, mysql_real_escape_string($usuario, $GLOBALS['DB']), mysql_real_escape_string($password, $GLOBALS['DB']));
		
	$result = mysql_query($query, $GLOBALS['DB']);
	$rows = mysql_num_rows($result);
	
	if($rows ==1){
		
		$_SESSION['sesion'] = 1;
		$_SESSION['usuario'] = $usuario;
		header("Location:index.php");
		
	}

}

$smarty = new Smarty;
$smarty->assign("sesion", $sesion);
$smarty->assign("arr", json_encode($arr));

$smarty->display('header.tpl');
$smarty->display('admin.tpl');
$smarty->display('footer.tpl');
?>