<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Placeres orgánicos de Dominika Paleta</title>
<!-- InstanceEndEditable -->
<link href="estilos.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<?php
include('web/libs/db1.php');

switch($_GET['b']){
	case '01': //inicio
		$bg = '#F8F4ED';
	break;
	case '02'://pasiones
		$bg = '#D7A1C5';
	break;
	case '03'://recetas
		$bg = '#D1E7C4';
	break;
	case '04'://favoritos
		$bg = '#FAD698';
	break;
	case '05'://inspiracion
		$bg = '#D7C2FF';
	break;
	case '06'://equipo
		$bg = '#F8F4ED';
	break;
    	case '07'://contacto
		$bg = '#F8F4ED';
	break;


}
if ($_GET['b'] == "") { $_GET['b'] = '01'; $bg = '#F8F4ED'; }


if(isset($_POST['correo'])){

	$correo = htmlentities($_POST['correo']);
	$query = sprintf('INSERT INTO %snews (correo) VALUES("%s")', DB_TBL_PREFIX,
	mysql_real_escape_string($correo, $GLOBALS['DB']));
	
	if($result = mysql_query($query, $GLOBALS['DB'])){
    
    
    echo '<script type="text/javascript" >alert ("Tu correo fue registrado, Gracias")</script>';
    
    }
    
}



?>

<link rel="stylesheet" href="js_carrusel/h_menu.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js_carrusel/slider.js"></script>
<script src="bx_slider/jquery.bxSlider.js" type="text/javascript"></script>
<script>
var cont = 1;

$(document).ready(function(){
	
  $('body').delegate('input[name="correo"]', 'keyup', function(){
	var $this1 = $(this).val(); 
var correo  = /^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/.test($this1);	
	if(correo){	
		$('body').find('input[name="Aceptar"]').removeAttr("disabled");	
	}
});

	$('.btn').click(function(){
		$('.galeria').hide();
		var number = $(this).attr('id').split('_');
		cont = number[1];
		$('img#'+ $(this).attr('id')).fadeIn();
	});
	
	$('.btn_vid').click(function(){
		$('.videos').hide();
		$('div.'+ $(this).attr('id')).show();
	});
	
	setInterval(function(){
      change_img();
	},10000);
	
});
function change_img(){
	//alert('-');
	$('.galeria').hide();
	cont++;
	if(cont==3){cont=1;}else if(cont == 0){cont=2;}
	
	$('img#foto_'+cont).fadeIn();
		
}

function next_img(com){
	//alert(com);
	$('.galeria').hide();
	if(com == 'back'){
		cont--;
		if(cont == 0){cont=2;}
		$('img#foto_'+cont).fadeIn();
	}else{
		cont++;
		if(cont==3){cont=1;}
		$('img#foto_'+cont).fadeIn();
	}
	//alert(cont);
}

function correo() {
	regExp = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/
	if(!regExp.test(this.val())){
		alert('Correo inválivdo')
		
		}
	
	}
/*function show_vid_div(){
	$('div#div_img').hide();
	$('div#div_vid').show();
}
function show_img_div(){
	$('div#div_img').show();
	$('div#div_vid').hide();
}*/
</script>
<style>
.galeria{
	display:none;
	margin-bottom:10px;
}
.btn{
	cursor:pointer;
}
</style>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31664327-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>


<body style="background: url(images/bg_pajaritos.png) no-repeat center top <? echo $bg; ?>;">
<div id="container">
  <div id="header"><a href="inicio.php"><img src="images/logo.png" width="112" height="176" border="0" style=" margin:11px 40px 0 20px; float:left;"/></a>
    <div style="float:left; width:631px;">
      <ul id="menu">
        <li><a href="inicio.php?b=01"><img src="images/menu/<? if($_GET['b']=='01'){ ?>m_inicio_over.png<? }else{ ?>m_inicio.png<? } ?>" width="29" height="42" border="0" /></a></li>
        <li><a href="pasiones.php?b=02"><img src="images/menu/<? if($_GET['b']=='02'){ ?>m_pasiones_over.png<? }else{ ?>m_pasiones.png<? } ?>"width="83" height="42" border="0" /></a></li>
        <li><a href="recetas.php?b=03"><img src="images/menu/<? if($_GET['b']=='03'){ ?>m_recetas_over.png<? }else{ ?>m_recetas.png<? } ?>"width="84" height="42" border="0" /></a></li>
        <li><a href="favoritos.php?b=04"><img src="images/menu/<? if($_GET['b']=='04'){ ?>m_favoritos_over.png<? }else{ ?>m_favoritos.png<? } ?>" width="92" height="42" border="0" /></a></li>
        <li><a href="inspiracion.php?b=05"><img src="images/menu/<? if($_GET['b']=='05'){ ?>m_inspriacion_over.png<? }else{ ?>m_inspriacion.png<? } ?>" width="88" height="42" border="0" /></a></li>
       <!-- <li><a href="../equipo.php?b=06"><img src="../images/menu/<? if($_GET['b']=='06'){ ?>m_equipo_over.png<? }else{ ?>m_equipo.png<? } ?>"width="62" height="42" border="0" /></a></li> -->
        <li><a href="contacto.php?b=07"><img src="images/menu/<? if($_GET['b']=='07'){ ?>m_contacto_over.png<? }else{ ?>m_contacto.png<? } ?>"width="62" height="42" border="0" /></a></li>
      </ul>
     <!-- <div id="frase"> Menos dolor, más amor... John Robbins</div> -->
    </div>
    <img src="images/jaula.png" width="152" height="187" style="float:right;" /></div>
  <div style="background:url(images/sombriux.png) top no-repeat; padding:19px 3px 0 3px;"><!-- InstanceBeginEditable name="EditRegion3" -->
    <div id="contenido"> <img src="images/inicio.jpg" width="541" height="384" style="float:left;"/>
      <div id="lateral">
        <div style="margin:-35px 0 0 -15px; padding:0;"><img src="images/lateral/inicio_s1.jpg" width="194" height="37"  /> <img src="images/lateral/pajarito.png" width="27" height="37" /></div>
        <p>Esta página es para todos ustedes, tanto para las mujeres como para los hombres.</p>
        <p>Para las adolescentes: Me encantaría que me dieran su opinión porque yo solía opinar de todo a su edad y también solía decir que yo lo hubiera hecho mucho mejor. </p>
        <a href="lectores.php" style="text-align:right;" ><img src="images/botones/leermas_off.jpg" width="100" height="30" border="0" style="float:right;"/></a> </div>
      <div class="espacio" style="height:0;"> </div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr valign="top">
          <td><div class="pajaritos" style="background:#FFF;"> <img src="images/reciente.jpg" width="113" height="33" /></div>
            <h1> </h1></td>
          <td></td>
          <td><div class="pajaritos" style="background:#FFF;"> <img src="images/twitter.jpg" width="61" height="33" /></div>
            <img src="images/bird_tw.jpg" width="105" height="63" style="float:right; margin-top:-55px;" />
            <h1> </h1></td>
        </tr>
        <tr valign="top">
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="257"><div class="polaroid" style="background:url(images/remedios.jpg) bottom center; background-size:127px 95px;"> <a href="remedios.php?b=02"><img src="images/polaroid.png" width="82" height="108" border="0" /></a></div>
                  <h2><a href="remedios.php?b=02">Remedios 911 </a></h2>
                  <p>Cuántos remedios naturales pasaban de generación en generación...</p>
                  <a href="remedios.php?b=02"><img src="images/botones/leermas_off.jpg" width="100" height="30" border="0" style="float:right;"/></a></td>
                <td width="30"></td>
                <td width="257"><div class="polaroid" style="background:url(images/verde.jpg) bottom center; background-size:127px 95px;"> <a href="licuado_verde.php?b=03"><img src="images/polaroid.png" width="82" height="108" border="0" /></a></div>
                  <h2><a href="licuado_verde.php?b=03">Licuado verde </a></h2>
                  <p>Hace algunos años, cuando estaba embarazada de María, mi primera hija...</p>
                  <a href="licuado_verde.php?b=03"><img src="images/botones/leermas_off.jpg" width="100" height="30" border="0" style="float:right;"/></a></td>
              </tr>
              <tr>
                <td><a href="pasiones.php?b=02"><img src="images/menu/m_pasiones.png" width="83" height="42" border="0" /></a></td>
                <td></td>
                <td><a href="recetas.php?b=03"><img src="images/menu/m_recetas.png" width="84" height="42" border="0" /></a></td>
              </tr>
            </table></td>
          <td width="30">&nbsp;</td>
          <td width="265" rowspan="2">
				  <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script> 
                    <script>
        new TWTR.Widget({
          version: 2,
          type: 'profile',
          rpp: 4,
          interval: 30000,
          width: 265,
          height: 326,
          theme: {
            shell: {
              background: '#ffffff',
              color: '#663311'
            },
            tweets: {
              background: '#ffffff',
              color: '#585858',
              links: '#663311'
            }
          },
          features: {
            scrollbar: false,
            loop: false,
            live: false,
            behavior: 'all'
          }
        }).render().setUser('domiorganica').start();
        </script>
			</td>
        </tr>
        <tr valign="top">
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="257"><div class="polaroid" style="background:url(images/holbox.jpg) bottom center; background-size:127px 95px;"> <a href="holbox.php?b=04"><img src="images/polaroid.png" width="82" height="108" /></a></div>
                  <h2><a href="holbox.php?b=04">Holbox </a></h2>
                  <p>Uno de los mejores viajes que he hecho es ir a Holbox...</p>
                  <a href="holbox.php?b=04"><img src="images/botones/leermas_off.jpg" width="100" height="30" border="0" style="float:right;"/></a></td>
                <td width="30"></td>
                <td width="257"><div class="polaroid" style="background:url(images/fotos/inspiracion.jpg) bottom center; background-size:127px 95px;"> <a href="maestra.php?b=05"><img src="images/polaroid.png" width="82" height="108" border="0" /></a></div>
                  <h2><a href="maestra.php?b=05">Mi mejor maestra </a></h2>
                  <p>Hace un año que mi mamá nos dejó para cuidarnos desde otro lugar ...</p>
                  <a href="maestra.php?b=05"><img src="images/botones/leermas_off.jpg" width="100" height="30" border="0" style="float:right;"/></a></td>
              </tr>
              <tr>
                <td><a href="pasiones.php?b=02"><img src="images/menu/m_pasiones.png" width="83" height="42" border="0" /></a></td>
                <td></td>
                <td><a href="inspiracion.php?b=05"><img src="images/menu/m_inspriacion.png" width="88" height="42" border="0" /></a></td>
              </tr>
            </table></td>
          <td width="30">&nbsp;</td>
        </tr>
      </table>
      <div class="espacio"> </div>
    </div>
    <!-- InstanceEndEditable --></div>
</div>
</div>
<div style=" background:#663311; height:10px;"> </div>

<div style="background:#CC3366;">

<div id="foot">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
    <td colspan="3">&nbsp;</td>
    <td width="29">&nbsp;</td>
     <td width="315">&nbsp;</td>
     <td width="30">&nbsp;</td>
      <td width="429">
    	
    	    	</td>
    </tr>
  <tr valign="bottom">
    <td height="10" colspan="3">Sígueme en:</td>
    <td width="29" align="left"></td>
    <td align="left">Suscríbete al newsletter <img src="images/sobrecito.png" width="25" height="22" /></td>
    <td rowspan="4" align="left">&nbsp;</td>
    <td width="429" rowspan="4" valign="middle">
    PLACERES ORGÁNICOS de Dominika Paleta es una boletín semanal donde compartimos recetas, consejos para viajar, tips de compra, recomendaciones para el bienestar, y mucho más. Recibe esta información en tu correo electrónico. ¡Nos encantaría que te unieras!
    <!--
    <div style="position:absolute; margin-top:20px; margin-left:0px; font-size:36px; font-weight:bold; float:left; z-index:10; color:#FFF;"><a style="cursor:pointer; color:#FFF;" onclick="next_img('back');"><</a></div>
    	
    	<div style="position:relative; z-index:5; float:right; width:429px; left:0px; top:0px; height:107px; padding:0">
    		
    		<img src="../images/publicidad/puma.jpg" width="429" height="107" class="galeria" id="foto_2" style="display:block;" />
    		
    		<img src="../images/publicidad/puma.jpg" width="429" height="107" class="galeria" id="foto_1"  />
    		
    		</div>
    	
    	
    	<div style="position:absolute; margin-top:20px; margin-left:409px; font-size:36px; font-weight:bold; float:left; z-index:10; color:#FFF;"><a style="cursor:pointer; color:#FFF;" onclick="next_img('next');">></a></div>
        -->
        </td>
    </tr>
  <tr>
    <td height="10" colspan="3">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    </tr>
  <tr valign="top">
    <td width="54" rowspan="2"><a href="http://www.facebook.com/placeresorganicos" target="_blank"><img src="images/fb.png" width="54" height="51" border="0" /></a></td>
    <td width="9" rowspan="2"> </td>
    <td width="54" rowspan="2"><a href="https://twitter.com/#!/domiorganica" target="_blank"><img src="images/tw.png" width="54" height="51" border="0" /></a></td>
    <td rowspan="2" align="left">&nbsp;</td>
    <td align="left">
    <form method="post"><input name="correo" type="text" id="textfield" size="20" />
      <input name="Aceptar" type="submit"  value="Aceptar" disabled="disabled"/></form></td>
    </tr>
  <tr valign="top">
    <td align="left" style="background:url(images/bg_news.png) no-repeat top left;"></td>
  </tr>
    <tr>
    <td colspan="3" align="center" >&nbsp;</td>
    <td height="50" colspan="4" align="right" style="font-size:11px;"> </td>
    </tr>
    
    <tr>
    	<td colspan="3" align="center">&nbsp;</td>
    	<td align="center" style="font-size:11px;">&nbsp;</td>
    	<td align="center" style="font-size:11px;">&nbsp;</td>
    	<td align="center" style="font-size:11px;">&nbsp;</td>
    	<td align="center" style="font-size:11px;">&nbsp;</td>
    	</tr>
</table>
</div>

</div>
</body>
<!-- InstanceEnd --></html>
