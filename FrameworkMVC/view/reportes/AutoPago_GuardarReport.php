
 <?php

$base_url = "http://localhost:4000/FrameworkMVC/";



$juicio_referido_titulo_credito               = ""; 
$identificacion_clientes 					= ""; 
$nombres_clientes 							= ""; 
$id_auto_pagos 								= "";
$fecha_asiganacion_auto_pagos 				= "";
$creado 									= ""; 
$numero_titulo_credito 						= "";
$total 										= ""; 
$total_total_titulo_credito 				= ""; 
$secretarios 								= "";
$impulsores 								= ""; 
$nombre_ciudad 								= "";
$identificador                              = "";



require_once('view/dompdf/dompdf_config.inc.php' );


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dato['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dato['hora']= date ("h:i:s");
	

foreach($resultSet as $res) 
{
	
$juicio_referido_titulo_credito             =$res->juicio_referido_titulo_credito; 
$identificacion_clientes 					=$res->identificacion_clientes; 
$nombres_clientes 							=$res->nombres_clientes; 
$id_auto_pagos								=$res->id_auto_pagos;
$fecha_asiganacion_auto_pagos 				 =$dias[date('w',strtotime($res->fecha_asiganacion_auto_pagos))]." ".date('d',strtotime($res->fecha_asiganacion_auto_pagos))." de ".$meses[date('n',strtotime($res->fecha_asiganacion_auto_pagos))-1]. " del ".date('Y',strtotime($res->fecha_asiganacion_auto_pagos)). " a las ".date("h:i:s",strtotime($res->fecha_asiganacion_auto_pagos)) ;
$creado 									 =$dias[date('w',strtotime($res->creado))]." ".date('d',strtotime($res->creado))." de ".$meses[date('n',strtotime($res->creado))-1]. " del ".date('Y',strtotime($res->creado)). " a las ".date("h:i:s",strtotime($res->creado)) ; 
$numero_titulo_credito 						=$res->numero_titulo_credito;
$total 										=$res->total; 
$total_total_titulo_credito 				=$res->total_total_titulo_credito; 
$secretarios 								=$res->secretarios;
$impulsores 								=$res->impulsores; 
$nombre_ciudad  							=$res->nombre_ciudad;
$identificador                              =$res->identificador;	
	
    
}

 $logo                                                 = '<img src="view/images/logo_sudamericano.jpg" alt="Responsive image" width="200" height="80">';
 $banco                                                 = 'JUZGADO DE COACTIVAS DEL BANCO SUDAMERICANO S.A EN LIQUIDACIÓN.-';
 


$html =
  '<html>'.
  '<head>'.
  	'<meta charset="utf-8"/>'.
  	'<title> '.'' .' Auto de Pago</title>'.
	
  	
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

'<p style="text-align: center;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
<b>AUTO DE PAGO</b><br>
</font>'.
'</p>'.

'<p style="text-align: justify;">'.
'<font font-family="Bookman Old Style" size="12.5pt">
<b>JUZGADO DE COACTIVAS DEL BANCO SUDAMERICANO S.A EN LIQUIDACIÓN.-</b><b>JUZGADO DE COACTIVAS DEL BANCO SUDAMERICANO S.A EN LIQUIDACIÓN.-</b> '.$nombre_ciudad.', a '.$creado.'.-
<strong>VISTOS:</strong> En ejercicio de la jurisdicción coactiva dispuesta en la Resolución SB-2014-720, de fecha 25 de Agosto de 2014, en concordancia con los artículos 942 y 946
 del Código de Procedimiento Civil vigente, y conforme a la delegación y orden de cobro general otorgadas por el MBA. Christian Cruz Rodríguez, Superintendente de Bancos,
 mediante Resolución Nº SB-2016-1056, de fecha 18 de Noviembre de 2016, en base al asiento contable remitido por la Dirección de Contabilidad, que en original se apareja al proceso,
 consta que el señor<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.'</strong> adeuda al BANCO SUDAMERICANO S.A, EN LIQUIDACIÓN, la suma de<font color="#FFFFFF">a</font><strong>USD $ '.$total_total_titulo_credito.' DÓLARES DE LOS ESTADOS UNIDOS DE NORTEAMERICA</strong>,
 más los intereses, costas judiciales y honorarios que se generen hasta la total cancelación de la misma.- Por lo expuesto y de conformidad con lo estipulado en los artículos 945 y 951
 del Código de Procedimiento Civil; y por cuanto la obligación es<font color="#FFFFFF">a</font><b>LÍQUIDA, DETERMINADA Y DE PLAZO VENCIDO</b>, conforme lo establece el artículo 948 del
 Código de Procedimiento civil vigente,<font color="#FFFFFF">a</font><b>AVOCO</b> conocimiento de la presente causa y<font color="#FFFFFF">a</font><b>ORDENO</b> que el señor<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.'</strong>,
 pague al BANCO SUDAMERICANO S.A, EN LIQUIDACIÓN, dentro del término de<font color="#FFFFFF">a</font><b>TRES DÍAS</b>, contados a partir de la citación con el presente auto, la cantidad de<font color="#FFFFFF">a</font><strong>USD $ '.$total_total_titulo_credito.' DÓLARES DE LOS ESTADOS UNIDOS DE NORTEAMERICA</strong>,
 más los intereses, gastos judiciales, honorarios y costas procesales que se generen hasta la total cancelación de la misma, o en el mismo término,<font color="#FFFFFF">a</font><b>DIMITA BIENES EQUIVALENTES</b>
 a dicho monto, bajo apercibimiento que de no hacerlo se embargarán bienes muebles e inmuebles equivalentes a las deudas, más intereses y las correspondientes costas judiciales.- Se ofrece reconocer pagos parciales
 que legalmente se justificaren.- De conformidad a lo dispuesto en el Art. 962 del Código de Procedimiento Civil actúe como Secretario el Dr.<font color="#FFFFFF">a</font><strong>'.$secretarios.'</strong>
 y como Abogado Impulsador el Ab.<font color="#FFFFFF">a</font><strong>'.$impulsores.'</strong>, quienes estando presentes aceptan el cargo y juran desempeñarlo fiel y legalmente, para constancia de lo cual firman conjuntamente
 con el Juez de coactivas.- Con fundamento en los artículos 422, 424, 426 y 428 del Código de Procedimiento Civil, se ordenan las siguientes medidas cautelares:<font color="#FFFFFF">a</font><b>1)</b> La retención de los fondos
 y créditos presentes y futuros que el señor<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.' (C.C.: '.$identificacion_clientes.')</strong>, mantenga en cuentas corrientes, de ahorros, inversiones, créditos por pagos
 de vouchers por consumos por tarjetas de crédito o a cualquier otro título, hasta por un monto de<font color="#FFFFFF">a</font><strong>USD $ '.$total_total_titulo_credito.' DÓLARES DE LOS ESTADOS UNIDOS DE NORTEAMERICA</strong>, en todas las Instituciones del Sistema Financiero
 del país, para el efecto ofíciese a la Superintendencia de Bancos.-<font color="#FFFFFF">a</font><b>2)</b> La prohibición de enajenar de los vehículos que mantengan a nombre del señor<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.' (C.C.: '.$identificacion_clientes.')</strong>,
 para lo cual ofíciese a la Agencia Nacional de Transito.-<font color="#FFFFFF">a</font><b>3)</b> La prohibición de venta y enajenación de bienes inmuebles registrados a nombre del señor<font color="#FFFFFF">a</font><strong>'.$nombres_clientes.' (C.C.: '.$identificacion_clientes.')</strong>,
 para tal efecto remítase atento oficio a la Dirección Nacional de Registro de Datos Públicos, con fin de que notifique de este particular a los Municipios y Registradores de la Propiedad de todo el país, así como para que
 informen sobre los bienes inmueble registrados a nombre del coactivado.- Los documentos que de acuerdo a la ley, se aparejan a este auto de pago, dejando copias certificadas en autos, desglósense y entréguese el original
 al funcionario respectivo.- Cítese al coactivado en legal y debida forma, habilitándose el tiempo deficiente para la práctica de esta diligencia.-<font color="#FFFFFF">a</font><b>CÍTESE Y OFICIESE.</b><br>
<br>
<strong>RAZÓN:</strong> De conformidad con lo dispuesto en el auto de pago, dejando copias certificadas en autos, procedí al desglose del original del asiento contable y de la Resolución Nº SB-2016-1056.-<font color="#FFFFFF">a</font><b>LO CERTIFICO.-</b>
 '.$nombre_ciudad.', a '.$creado.'.<br>
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
$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/coactiva_liventy/documentos/AutoPagos/';
$filename = "AutoPagos".$identificador.'.pdf';
file_put_contents($directorio.$filename,$pdf);


?>