
 <?php

$base_url = "http://localhost:4000/FrameworkMVC/";




$nombre_providencias                 ="";
$juicio_referido_titulo_credito		 ="";
$nombre_clientes                     ="";
$fecha_providencias					 ="";
$hora_providencias                   ="";
$identificacion_clientes             ="";
$texto_providencias                  ="";
$identificador ="";




require_once('view/dompdf/dompdf_config.inc.php' );


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dato['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dato['hora']= date ("h:i:s");
	

foreach($resultSet as $res) 
{
	
	$ciudad                              =$res->nombre_ciudad;
	$juicio_referido_titulo_credito		 =$res->juicio_referido_titulo_credito;
	$nombre_clientes                      =$res->nombres_clientes;
	$fecha_providencias                   =$dias[date('w',strtotime($res->creado))]." ".date('d',strtotime($res->creado))." de ".$meses[date('n',strtotime($res->creado))-1]. " del ".date('Y',strtotime($res->creado)). " a las ".date("h:i:s",strtotime($res->creado)) ;
	$hora_providencias                   =$res->hora_emision_documentos;
	$identificacion_clientes             =$res->identificacion_clientes;
	$texto_providencias                  =$res->avoco_vistos_documentos;
	                                           
}

$identificador=$datos_documento['identificador'];

$logo                                                 = '<img src="view/images/logo_sudamericano.jpg" alt="Responsive image" width="200" height="80">';
 

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
$pdf = $dompdf->output();
$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/coactiva_liventy/documentos/Providencias/';
$filename = "Providencias".$identificador.'.pdf';
file_put_contents($directorio.$filename,$pdf);


?>