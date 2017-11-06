<?php

$base_url = "http://localhost:4000/FrameworkMVC/";



$id_avoco_conocimiento						     = "";	  
$juicio_referido_titulo_credito                  = "";	
$nombres_clientes			                     = ""; 
$identificacion_clientes                         = ""; 
$nombre_ciudad                                   = ""; 

$secretarios						             = "";
$impulsores                                      = "";
$secretario_reemplazo			                 = "";

$impulsor_reemplazo                              = "";
$creado                                          ="";
$identificador                                   ="";



require_once('view/dompdf/dompdf_config.inc.php' );


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dato['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dato['hora']= date ("h:i:s");
	

foreach($resultSet as $res) 
{
	
	
	$id_avoco_conocimiento						     =$res->id_avoco_conocimiento;
	$juicio_referido_titulo_credito                  =$res->juicio_referido_titulo_credito;
	$nombres_clientes			                     =$res->nombres_clientes;
	$identificacion_clientes                         =$res->identificacion_clientes;
	$nombre_ciudad                                   =$res->nombre_ciudad;
	
	$secretarios						             =$res->secretarios;
	$impulsores                                      =$res->impulsores;
	$secretario_reemplazo			                 =$res->secretario_reemplazo;
	
	$identificador                                   =$res->identificador;
	//$creado                                          =fechaATexto($res->creado);
	$creado                                          =$dias[date('w',strtotime($res->creado))]." ".date('d',strtotime($res->creado))." de ".$meses[date('n',strtotime($res->creado))-1]. " del ".date('Y',strtotime($res->creado)). " a las ".date("h:i:s",strtotime($res->creado)) ;
	//date('Y-m-d ',strtotime($res->creado));	
    
}
foreach($resultSet1 as $res)
{

	$impulsor_reemplazo                              =$res->nombre_usuarios;

}
 $logo                                                 = '<img src="view/images/logo_sudamericano.jpg" alt="Responsive image" width="200" height="80">';
 


$html =
  '<html>'.
  '<head>'.
  	'<meta charset="utf-8"/>'.
  	'<title> '.'' .' Avoco Secretario Con Garante</title>'.
  	
  '</head>'.
  '<body>'.
  
'<div style="margin-left:6%;  margin-right:3%; margin-top:-5%; margin-bottom:5%;">'.
'<p style="text-align: right;">'.$logo.'<hr style="height: 2px; width: 100%; background-color: black;">'.'</p>'.



'<p style="text-align: justify;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
<b>JUICIO COACTIVO:</b> '.$juicio_referido_titulo_credito.'<br>
<b>COACTIVADO:</b> '.$nombres_clientes.'
</font>'.
'</p>'.

'<p style="text-align: justify;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
		
<b>JUZGADO DE COACTIVAS DEL BANCO SUDAMERICANO S.A EN LIQUIDACIÓN.-</b><b>JUZGADO DE COACTIVAS DEL BANCO SUDAMERICANO S.A EN LIQUIDACIÓN.-</b> '.$nombre_ciudad.', '.$creado.'.-
 VISTOS: Avoco conocimiento del presente proceso signado con el número<font color="#FFFFFF">a</font><strong>'.$juicio_referido_titulo_credito.'</strong>
 seguido en contra de<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.'</strong> con cedula de ciudadanía N°<font color="#FFFFFF">a</font><strong>'.$identificacion_clientes.'</strong> 
 en calidad de deudor (a) principal, en mi calidad de Liquidadora del Banco Sudamericano S.A en Liquidación conforme a la designación a mi extendida
 y fundada en la orden de cobro, contenidos ambos actos en la Resolución No. SB-2016-324, emitida por el Ec. Christian Cruz
 Rodríguez, en su calidad de Superintendente de Bancos del Ecuador, dada en Quito con fecha 08 de mayo del 2016, 
 inscrita en el Registro Mercantil del cantón Quito, el 12 de mayo de 2016, cuyo desglose ordeno dejando copias 
 certificadas en autos.- Déjese sin efecto el nombramiento del Abogado (a)<font color="#FFFFFF">a</font><strong>'.$secretario_reemplazo.'</strong>, en su calidad de
 Secretario (a) de Coactiva, en su reemplazo se designa como Secretario de Coactiva al Abogado (a)<font color="#FFFFFF">a</font><strong>'.$secretarios.'</strong>  
 y, como Abogado (a) Impulsor (a) se designa al Abogado (a)<font color="#FFFFFF">a</font><strong>'.$impulsores.'</strong> quienes hallándose presentes aceptan los cargos
 y juran desempeñarlos fiel y legalmente, firmando para constancia con la suscrita Jueza de Coactiva.-<font color="#FFFFFF">a</font><b>CUMPLASE Y NOTIFÍQUESE</b>.<br>
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
$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/coactiva_liventy/documentos/Avoco/';
$filename = "Avoco".$identificador.'.pdf';
file_put_contents($directorio.$filename,$pdf);


?>