
 <?php

$base_url = "http://localhost:4000/FrameworkMVC/";





$nombre_usuarios						                    = "";	  
$nombre_tipo_citaciones                                     = "";	
$juicio_referido_titulo_credito			                    = ""; 
$nombre_persona_recibe_citaciones                           = ""; 
$relacion_cliente_citaciones                                = ""; 

$fecha_citaciones						             = "";
$nombre_ciudad                                       = "";
$nombres_clientes			                         = "";
$identificacion_clientes                             = "";
$direccion_clientes                                  = "";
$identificador                                       = "";
$razon                                               = "RAZÓN:";



require_once('view/dompdf/dompdf_config.inc.php' );


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dato['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dato['hora']= date ("h:i:s");
	

foreach($resultSet as $res) 
{
	
	$nombre_usuarios						            =$res->nombre_usuarios;
	$nombre_tipo_citaciones                             =$res->nombre_tipo_citaciones;
	$juicio_referido_titulo_credito			            =$res->juicio_referido_titulo_credito;
	$nombre_persona_recibe_citaciones                   =$res->nombre_persona_recibe_citaciones;
	$relacion_cliente_citaciones                        =$res->relacion_cliente_citaciones;
	
	$fecha_citaciones						            =$dias[date('w',strtotime($res->fecha_citaciones))]." ".date('d',strtotime($res->fecha_citaciones))." de ".$meses[date('n',strtotime($res->fecha_citaciones))-1]. " del ".date('Y',strtotime($res->fecha_citaciones)). " a las ".date("h:i:s",strtotime($res->fecha_citaciones)) ;
	$nombre_ciudad                                      =$res->nombre_ciudad;
	$nombres_clientes                                   =$res->nombres_clientes;
	$identificacion_clientes                            =$res->identificacion_clientes;
	$direccion_clientes                                 =$res->direccion_clientes;
	$identificador                                       =$res->identificador;
	                                            
}

$logo                                                 = '<img src="view/images/logo_sudamericano.jpg" alt="Responsive image" width="200" height="80">';
 

$html =
  '<html>'.
  '<head>'.
  	'<meta charset="utf-8"/>'.
  	'<title> '.'' .' Citaciones</title>'.
  	
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
 <strong>RAZÓN:</strong><strong>RAZÓN:</strong><br>		
 Siento como tal, que hoy<font color="#FFFFFF">a</font><strong>'.$fecha_citaciones.'</strong> horas, dando cumplimiento a lo dispuesto en auto de pago dictado dentro del presente juicio, me constitui en las calles de<font color="#FFFFFF">a</font><strong>'.$direccion_clientes.'</strong>,
 canton<font color="#FFFFFF">a</font><strong>'.$nombre_ciudad.'</strong> con la finalidad de citar al (a) coactivado (a)<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.'</strong> cerciorándome que se trata del domicilio del (a) coactivado (a), le entregué la<font color="#FFFFFF">a</font><strong>'.$nombre_tipo_citaciones.'</strong>
 de citación que contiene el auto de pago a<font color="#FFFFFF">a</font><strong>'.$nombre_persona_recibe_citaciones.'</strong> quien se identificó como<font color="#FFFFFF">a</font><strong>'.$relacion_cliente_citaciones.'</strong> del (a) coactivado (a).-<font color="#FFFFFF">a</font><b>Lo certifíco</b>.<br>
<font color="#FFFFFF">MASOFTFIN</font><br>
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
$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/coactiva_liventy/documentos/Citaciones/';
$filename = "Citaciones".$identificador.'.pdf';
file_put_contents($directorio.$filename,$pdf);


?>