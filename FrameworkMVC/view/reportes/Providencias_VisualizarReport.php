<?php

$base_url = "http://localhost:4000/FrameworkMVC/";


$juicio_referido_titulo_credito		="";
$nombre_clientes			        ="";
$fecha_providencias 			    ="";
$hora_providencia     		        ="";
$texto_providencias					="";
$ciudad                             ="";


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/coactiva/FrameworkMVC';
//echo $directorio;
//die();
$dom=$directorio.'/view/dompdf/dompdf_config.inc.php';

require_once( $dom);


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dato['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dato['hora']= date ("h:i:s");
	

$a=stripslashes($_GET['dato']);

$_dato=urldecode($a);

$_dato=unserialize($a);

/*
 * $dato['ciudad']=$resultCiudad[0]->nombre_ciudad;
			$dato['juicio_referido']=$resultJuicio[0]->juicio_referido_titulo_credito;
			$dato['cliente']=$resultJuicio[0]->nombres_clientes;
			$dato['fecha_emision_documentos']=$_fecha_emision_documentos;
			$dato['hora_emision_documentos']=$_hora_emision_documentos;
			$dato['texto_providencia']=$avoco.$_texto_providencia;
 */

$juicio_referido_titulo_credito		=$_dato['juicio_referido'];
$nombre_clientes			        =$_dato['cliente'];
$fecha_providencias 			    =$_dato['fecha_emision_documentos'];
$hora_providencia     		        =$_dato['hora_emision_documentos'];
$texto_providencias					=$_dato['texto_providencia'];
$ciudad                             =$_dato['ciudad'];



$domLogo=$directorio.'/view/images/logo_sudamericano.jpg';

$logo         = '<img src="'.$domLogo.'" alt="Responsive image" width="200" height="80">';



$html =
  '<html>'.
  '<head>'.
  	'<meta charset="utf-8"/>'.
  	'<title> '.'' .' Providencias</title>'.
  	
  '</head>'.
  '<body>'.
  
'<div style="margin-left:6%;  margin-right:3%; margin-top:-5%; margin-bottom:5%;">'.
'<p style="text-align: right;">'.$logo.'<hr style="height: 2px; width: 100%; background-color: black;">'.'</p>'.

'<p style="text-align: justify;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
<b>JUICIO COACTIVO:</b> '.$juicio_referido_titulo_credito.'<br>
<b>COACTIVADO:</b> '.$nombre_clientes.'
</font>'.
'</p>'.


'<p style="text-align: justify;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
'.$texto_providencias.'<br>
<font color="#FFFFFF">MASOFTFIN</font> 	
</font>'.
'</p>'

.'</div>'.

'<div style=" margin-left:6%;  margin-right:3%; width: 100%; bottom: 0; position:fixed; height: 50px;">'.
'<p style="text-align: center;">'.
'<font font-family="Bookman Old Style" size="2">
<hr style="height: 2px; width: 100%; background-color: black;">
<b>Ave. Amazonas N33-319 y Rumipamba - Torre Carolina</b><br>
<b>Tel. 2438001-2255400-Fax 2255325 Celular: 0982363629</b><br>
<b>Correo Electrónico: juzgadocoa@sudamericano.fin.ec</b><br>
</font>'.
'</p>'
.'</div>'.

'</body></html>';
 

$dompdf = new DOMPDF();
$dompdf->load_html(utf8_decode($html));
$dompdf->set_paper("A4", "portrait");

$dompdf->render();
$dompdf->stream("mipdf.pdf", array("Attachment" => 0));
?>


?>