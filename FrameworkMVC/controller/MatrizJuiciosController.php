<?php

    class MatrizJuiciosController extends ControladorBase{
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index(){
	
		    session_start();
			
		    if (isset(  $_SESSION['usuario_usuarios']) )
		    {
		    
		    $id_rol= $_SESSION['id_rol'];
		    
		    if ($id_rol==3){
		    
		    $_id_usuarios= $_SESSION['id_usuarios'];
			$resultSet="";
			$registrosTotales = 0;
			$arraySel = "";
			
			$juicios = new JuiciosModel();
			
			$ciudad = new CiudadModel();
			$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
				
			$tablas   = "public.usuarios,
                     public.ciudad";
				
			$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
			$id       = "usuarios.id_ciudad";
			$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
			
			$provincias = new ProvinciasModel();
			$resultProv =$provincias->getAll("nombre_provincias");
			
			$estado_procesal = new EstadosProcesalesModel();
			$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
			
			
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
				if (!empty($resultPer))
				{
						
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
			
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
						
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								 clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
						
						
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
			
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						  clientes.id_provincias = provincias.id_provincias AND
						  titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						  asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						  juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						  asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios'";
							
						$id="juicios.orden";
			
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
							
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
							
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
						
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
						
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
						
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
								
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
						
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
						
						
						
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
						
							
						//comienza paginacion
						
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
						
						if($action == 'ajax')
						{
						
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
								
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
								
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
								
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
								
								
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
								
							$count_query   = $cantidadResult;
								
							$total_pages = ceil($cantidadResult/$per_page);
								
							if ($cantidadResult>0)
							{
						
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
						
									
								
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
						
									$html.='<tr>';
									$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_Providencia_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
										
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_Providencia&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.' " target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
									 
									$html.='</tr>';
						
										
								}
						
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
						
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
								
							echo $html;
							die();
								
						}
						
							
						if(isset($_POST["reporte_rpt"]))
						{
							
			
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							$parametros['fecha_providencias']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_providencias']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
							
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
								
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
								
							
								
							
							$pagina="contProvidenciaSuspension.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
						
			
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
			
							die();
			
						}
						
						if(isset($_POST["reporte_rpt_matriz"]))
						{
								
								
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
						
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
								
							$pagina="contMatrizJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							
							
							
							
							//$conexion_rpt['port']="59584";
								
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
								
							die();
								
						}
			
			
					}
					
					
					
			
					$this->view("MatrizJuiciosProvidencias",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv
			
								
								
					));
			
			
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
			
					));
			
					exit();
				}
			
			}
			
			
			
			
			
			
			
			
			//rol secretario
			
			
			
			
			if ($id_rol==5){
				
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
				
				$tablas   = "public.usuarios,
                     public.ciudad";
				
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
				
				$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
					
				$tablas   = "public.asignacion_secretarios_view";
					
				$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
					
				$id       = "asignacion_secretarios_view.id_abogado";
				$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
				
				
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuiciosSecretarios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
				
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						$id_abogado=$_POST['id_abogado'];
						
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
				
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_secretario='$_id_usuarios'";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						$where_6 = "";
						
						$where_13 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
				
						
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
				
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
				
						if($id_abogado!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
						
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
							
							if($fechaDesde != "" && $fechaHasta == ""){
							
								$fechaHasta='2018/12/01';
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
							}
							if($fechaDesde == "" && $fechaHasta != ""){
							
								$fechaDesde='1800/01/01';
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
							}
						}
						
						if($identificacion_clientes_1!=""){$where_13=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
						
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5.$where_6 . $where_13 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
						
						//echo $where_to ; die();
						//comienza paginacion
				
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
				
						if($action == 'ajax')
						{
				
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
				
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
				
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
				
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
				
				
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
				
							$count_query   = $cantidadResult;
				
							$total_pages = ceil($cantidadResult/$per_page);
				
							if ($cantidadResult>0)
							{
				
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
								
									
								
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
									
										
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><a href="javascript:null()" id="'.$res->id_juicios.'?/&'.$i.'?/&'.$res->regional.'?/&'.$res->juicio_referido_titulo_credito.'?/&'.$res->year_juicios.'?/&'.$res->identificacion_clientes.'?/&'.$res->nombres_clientes.'?/&'.$res->nombre_garantes.'?/&'.$res->identificacion_garantes.'?/&'.$res->nombre_provincias.'?/&'.$res->numero_titulo_credito.'?/&'.$res->fecha_emision_juicios.'?/&'.$res->cuantia_inicial.'?/&'.$res->riesgo_actual.'?/&'.$res->nombre_estados_procesales_juicios.'?/&'.$res->descripcion_estado_procesal.'?/&'.$res->fecha_ultima_providencia.'?/&'.$res->estrategia_seguir.'?/&'.$res->observaciones.'?/&'.$res->impulsores.'?/&'.$res->secretarios.'?/&'.$res->id_provincias.'?/&'.$res->id_estados_procesales_juicios.'?/&'.$res->id_clientes.'?/&'.$res->id_titulo_credito.'?/&'.$res->identificacion_clientes_1.'?/&'.$res->nombre_clientes_1.'?/&'.$res->identificacion_clientes_2.'?/&'.$res->nombre_clientes_2.'?/&'.$res->identificacion_clientes_3.'?/&'.$res->nombre_clientes_3.'?/&'.$res->identificacion_garantes_1.'?/&'.$res->nombre_garantes_1.'?/&'.$res->identificacion_garantes_2.'?/&'.$res->nombre_garantes_2.'?/&'.$res->identificacion_garantes_3.'?/&'.$res->nombre_garantes_3.'?/&'.$res->correo_clientes.'?/&'.$res->correo_clientes_1.'?/&'.$res->correo_clientes_2.'?/&'.$res->correo_clientes_3.'?/&'.$res->direccion_clientes.'?/&'.$res->direccion_clientes_1.'?/&'.$res->direccion_clientes_2.'?/&'.$res->direccion_clientes_3.'"  onclick="editar_matriz(this)" ><i class="glyphicon glyphicon-edit"></i></a></td>';
									//$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_Providencia_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
									$html.='</tr>';
				
				
				
								}
				
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
				
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
				
							echo $html;
							die();
				
						}
				
							
						if(isset($_POST["reporte_rpt"]))
						{
								
							
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							$parametros['fecha_providencias']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_providencias']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
							
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
								
							$pagina="contProvidenciaSuspension.aspx";
								
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
								
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
								
							die();
								
						}
						
						if(isset($_POST["reporte_rpt_matriz"]))
						{
						
								
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							
							

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
						
							$pagina="contMatrizJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
						
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
						
							die();
						
						}
							
							
					}
						
					$this->view("MatrizJuiciosProvidenciasSecretarios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul
								
				
				
					));
						
						
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
		
					));
						
					exit();
				}
					
				}
					
				
				
				if ($id_rol==23){
				
				
					$_id_usuarios= $_SESSION['id_usuarios'];
					$resultSet="";
					$registrosTotales = 0;
					$arraySel = "";
						
					$juicios = new JuiciosModel();
						
					$ciudad = new CiudadModel();
					$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
					
					$estado_procesal = new EstadosProcesalesModel();
					$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
						
							
					$permisos_rol = new PermisosRolesModel();
					$nombre_controladores = "MatrizJuiciosCordinador";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
					if (!empty($resultPer))
					{
				
						if(isset($_POST["juicio_referido_titulo_credito"]))
						{
								
							$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
							$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
							$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
							$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
							$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
							$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
							
							$id_estados_procesales_juicios=(isset($_POST['id_estados_procesales_juicios']))?$_POST['id_estados_procesales_juicios']:0;
							
							
							
							$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
									clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
									clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
								
								
								
							$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
								
							$where="clientes.id_clientes = titulo_credito.id_clientes AND
							clientes.id_provincias = provincias.id_provincias AND
							titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
							asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
							juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
							asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios";
								
							$id="juicios.id_juicios";
								
							$where_0 = "";
							$where_1 = "";
							$where_2 = "";
							$where_3 = "";
							$where_4 = "";
							$where_5 = "";
							$where_6 = "";
							$where_7 = "";
							$where_8= "";
				
								
								
							if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				
							if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
								
							if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
								
							if($id_ciudad!=0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
								
							if($id_secretario!=0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
							
							if($id_impulsor!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
							
							
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
										
								}
							}
							
							if($id_estados_procesales_juicios!=0){$where_8=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
							
							
							$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5 . $where_6.$where_7. $where_8;
				
								
							//comienza paginacion
				
							$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
				
							if($action == 'ajax')
							{
				
								$html="";
								$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
								$cantidadResult=(int)$resultSet[0]->total;
				
								$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
				
								$per_page = 50; //la cantidad de registros que desea mostrar
								$adjacents  = 9; //brecha entre páginas después de varios adyacentes
								$offset = ($page - 1) * $per_page;
				
								$limit = " LIMIT   '$per_page' OFFSET '$offset'";
				
				
								$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
				
								$count_query   = $cantidadResult;
				
								$total_pages = ceil($cantidadResult/$per_page);
				
								if ($cantidadResult>0)
								{
				
									$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
									$html.='<div class="pull-left">';
									$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
									$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
									$html.='</div>';
									$html.='</div>';
									$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
									$html.='<section style="height:425px; overflow-y:scroll;">';
									$html.='<table class="table table-hover">';
									$html.='<thead>';
									$html.='<tr class="info">';
									$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
									$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Cedula Coactivado</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Nombres Coactivado</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
									$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
									$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
									$html.='</tr>';
									$html.='</thead>';
									$html.='<tbody>';
				
										
				
									$i=0;
										
									foreach ($resultSet as $res)
									{
				
										$i++;
										$html.='<tr>';
										$html.='<td style="font-size: 9px;">'.$i.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
										$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
										$html.='</tr>';
				
				
				
									}
				
									$html.='</tbody>';
									$html.='</table>';
									$html.='</section>';
									$html.='</div>';
									$html.='<div class="table-pagination pull-right">';
									$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
									$html.='</div>';
									
				
										
								}else{
										
									$html.='<div class="alert alert-warning alert-dismissable">';
									$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
									$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
									$html.='</div>';
										
								}
				
								echo $html;
								die();
				
							}
				
								
							if(isset($_POST["reporte_rpt_matriz"]))
							{
								
				
								$parametros = array();
								$parametros['id_ciudad']=isset($_POST['id_ciudad'])?trim($_POST['id_ciudad']):0;
								$parametros['id_secretario']=isset($_POST['id_secretario'])?trim($_POST['id_secretario']):0;
								$parametros['id_abogado']=isset($_POST['id_impulsor'])?trim($_POST['id_impulsor']):0;
								$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
								$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
									
								$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
								$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
								$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
								
								/*para las fechas*/
								$fechaDesde="";$fechaHasta="";
								if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
								{
									$fechaDesde=$_POST["fcha_desde"];
									$fechaHasta=$_POST["fcha_hasta"];
									if ($fechaDesde != "" && $fechaHasta != "")
									{
										$parametros['fecha_desde'] = $fechaDesde;
										$parametros['fecha_hasta'] = $fechaHasta;
									}
										
									if($fechaDesde != "" && $fechaHasta == ""){
											
										$fechaHasta='2018/12/01';
										$parametros['fecha_desde'] = $fechaDesde;
										$parametros['fecha_hasta'] = $fechaHasta;
											
									}
									if($fechaDesde == "" && $fechaHasta != ""){
											
										$fechaDesde='1800/01/01';
										$parametros['fecha_desde'] = $fechaDesde;
										$parametros['fecha_hasta'] = $fechaHasta;
									}
								}
								
								
								$pagina="contMatrizJuicios.aspx";
				
								$conexion_rpt = array();
								$conexion_rpt['pagina']=$pagina;
								//$conexion_rpt['port']="59584";
				
								$this->view("ReporteRpt", array(
										"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
								));
				
								die();
				
							}
								
								
						}
				
						$this->view("MatrizJuiciosCordinador",array(
								"resultSet"=>$resultSet, "resultDatos"=>$resultDatos, "resultEstadoProcesal"=>$resultEstadoProcesal
				
				
				
						));
				
				
					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
				
						));
				
						exit();
					}
						
				}
				
			}
			else
			{
				$this->view("ErrorSesion",array(
						"resultSet"=>""
			
				));
			
			}
			
			
	}
	

	
	
	public function index2(){
	
		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$id_rol= $_SESSION['id_rol'];
	
			if ($id_rol==3){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				
			
				
					
				$columnas = " asignacion_secretarios_view.id_secretario,
					  asignacion_secretarios_view.secretarios";
				$tablas   = "public.asignacion_secretarios_view";
				$where    = "public.asignacion_secretarios_view.id_abogado = '$_id_usuarios'";
				$id       = "asignacion_secretarios_view.id_secretario";
				$resultSecre=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
					
				
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
						
	
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios'";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
	
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
							
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
	
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
						
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
						
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
						
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div>';
								$html.='</div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
								
									
								
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
									
									$html.='<tr>';
									$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_AvocoConocimiento_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
										
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><a href="javascript:null()" id="'.$res->id_juicios.'?/&'.$i.'?/&'.$res->regional.'?/&'.$res->juicio_referido_titulo_credito.'?/&'.$res->year_juicios.'?/&'.$res->identificacion_clientes.'?/&'.$res->nombres_clientes.'?/&'.$res->nombre_garantes.'?/&'.$res->identificacion_garantes.'?/&'.$res->nombre_provincias.'?/&'.$res->numero_titulo_credito.'?/&'.$res->fecha_emision_juicios.'?/&'.$res->cuantia_inicial.'?/&'.$res->riesgo_actual.'?/&'.$res->nombre_estados_procesales_juicios.'?/&'.$res->descripcion_estado_procesal.'?/&'.$res->fecha_ultima_providencia.'?/&'.$res->estrategia_seguir.'?/&'.$res->observaciones.'?/&'.$res->impulsores.'?/&'.$res->secretarios.'?/&'.$res->id_provincias.'?/&'.$res->id_estados_procesales_juicios.'?/&'.$res->id_clientes.'?/&'.$res->id_titulo_credito.'?/&'.$res->identificacion_clientes_1.'?/&'.$res->nombre_clientes_1.'?/&'.$res->identificacion_clientes_2.'?/&'.$res->nombre_clientes_2.'?/&'.$res->identificacion_clientes_3.'?/&'.$res->nombre_clientes_3.'?/&'.$res->identificacion_garantes_1.'?/&'.$res->nombre_garantes_1.'?/&'.$res->identificacion_garantes_2.'?/&'.$res->nombre_garantes_2.'?/&'.$res->identificacion_garantes_3.'?/&'.$res->nombre_garantes_3.'?/&'.$res->correo_clientes.'?/&'.$res->correo_clientes_1.'?/&'.$res->correo_clientes_2.'?/&'.$res->correo_clientes_3.'?/&'.$res->direccion_clientes.'?/&'.$res->direccion_clientes_1.'?/&'.$res->direccion_clientes_2.'?/&'.$res->direccion_clientes_3.'"  onclick="editar_matriz(this)" ><i class="glyphicon glyphicon-edit"></i></a></td>';
									$html.='</tr>';
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section>';
								$html.='</div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
								
	
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt"]))
						{
								
							
							
							$juicios = new JuiciosModel();
								
							if(isset($_POST["juicio_referido_titulo_credito"]))
							{
									
									
								$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
								$numero_titulo_credito=$_POST['numero_titulo_credito'];
									
								$id_provincias=$_POST['id_provincias'];
								$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
									
								$identificacion_clientes=$_POST['identificacion_clientes'];
								$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
								$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
								$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
									
									
								$identificacion_garantes=$_POST['identificacion_garantes'];
								$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
								$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
								$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
									
									
								$id_impulsor=$_SESSION['id_usuarios'];
									
								$columnas = " juicios.id_juicios,
								 		  clientes.id_clientes,
								          titulo_credito.id_titulo_credito";
							
							  $tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
								$where="clientes.id_clientes = titulo_credito.id_clientes AND
								clientes.id_provincias = provincias.id_provincias AND
								titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
								asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
								juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
								asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$id_impulsor'";
							
								$id="juicios.orden";
							
								$where_0 = "";
								$where_1 = "";
								$where_2 = "";
								$where_3 = "";
								$where_4 = "";
								$where_5 = "";
									
								$where_6 = "";
								$where_7 = "";
								$where_8 = "";
								$where_9 = "";
								$where_10 = "";
								$where_11 = "";
								$where_12 = "";
									
							
							
								if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
									
								if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
								if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
								if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
									
								if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
									
								/*para las fechas*/
								$fechaDesde="";$fechaHasta="";
								if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
								{
									$fechaDesde=$_POST["fcha_desde"];
									$fechaHasta=$_POST["fcha_hasta"];
									if ($fechaDesde != "" && $fechaHasta != "")
									{
										$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									}
										
									if($fechaDesde != "" && $fechaHasta == ""){
							
										$fechaHasta='2018/12/01';
										$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
									}
									if($fechaDesde == "" && $fechaHasta != ""){
							
										$fechaDesde='1800/01/01';
										$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
									}
								}
									
								if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
								if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
								if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
									
									
								if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
								if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
								if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
								if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
									
									
									
								$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
									
									
								$resultSet=$juicios->getCondiciones($columnas, $tablas, $where_to, $id);
									
									
									
								$providencias= new ProvidenciasModel();
								$asignacion_secretarios = new AsignacionSecretariosModel();
								$juicios = new JuiciosModel();
									
									
									
								$resultSecre = $asignacion_secretarios->getBy("id_abogado_asignacion_secretarios ='$id_impulsor'");
								$id_secretario=$resultSecre[0]->id_secretario_asignacion_secretarios;
								
								$usuarios = new UsuariosModel();
								$resultUsu = $usuarios->getBy("id_usuarios ='$id_impulsor'");
								$id_ciudad=$resultUsu[0]->id_ciudad;
								
								if(!empty($resultSet)){
							
							
									$fecha_providencias=$_POST['fecha_providencias'];
									$hora_providencias=$_POST['hora_providencias'];
									$razon_providencias=$_POST['razon_avoco'];
							
									$nombre_impulsor_anterior= $_POST['nombre_impulsor_anterior'];
									$nombre_secretario_anterior= $_POST['nombre_secretario_anterior'];
									$tipo_avoco= $_POST['tipo_avoco'];
									$id_estados_procesales_juicios_actualizar= $_POST['id_estados_procesales_juicios_actualizar'];
									$numero_liquidacion= $_POST['numero_liquidacion'];
									$fecha_auto_pago= $_POST['fecha_auto_pago'];
									
									
							
									
							
									$consecutivo= new ConsecutivosModel();
									$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='AVOCO_CONOCIMIENTO'");
									$identificador_providencias=$resultConsecutivo[0]->real_consecutivos;
									$ruta_providencias="Avoco_Conocimiento";
							
									$nombre_archivo_providencias=$ruta_providencias.$identificador_providencias;
							
									foreach($resultSet as $res)
									{
											
										$_id_juicios=$res->id_juicios;
										$id_clientes =$res->id_clientes;
										$id_titulo_credito=$res->id_titulo_credito;
							
							
							
										$funcion = "ins_avoco_conocimiento_liventy";
										$parametros = "'$_id_juicios','$id_ciudad', '$id_secretario','$id_impulsor','$id_impulsor', '$nombre_archivo_providencias', '$ruta_providencias', '$identificador_providencias', '$nombre_secretario_anterior', '$nombre_impulsor_anterior', '$tipo_avoco', '$numero_liquidacion', '$razon_providencias', '$id_clientes', '$id_titulo_credito'";
										$providencias->setFuncion($funcion);
										$providencias->setParametros($parametros);
										$resultado=$providencias->Insert();
							
							
							
										$traza=new TrazasModel();
										$_nombre_controlador = "MATRIZ JUICIOS";
										$_accion_trazas  = "Genero Avoco Conocimiento";
										$_parametros_trazas = $_id_juicios;
										$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
							
											
									}
							
									$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='AVOCO_CONOCIMIENTO'");
										
							
								}
									
									
							}
								
								
								
								
								
							$id_estados_procesales_juicios_actualizar=$_POST['id_estados_procesales_juicios_actualizar'];
							$id_abogado=$_SESSION['id_usuarios'];
							$fecha_providencias=$_POST['fecha_providencias'];
								
							
								
							if($id_estados_procesales_juicios_actualizar > 0){
									
								$colval = "id_estados_procesales_juicios = '$id_estados_procesales_juicios_actualizar'";
								$tabla = "juicios";
								$where = "id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$resultado=$juicios->UpdateBy($colval, $tabla, $where);
							
							
							
								$columnas1="id_juicios";
								$tablas="juicios";
								$where="id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$id="id_juicios";
							
								$resultjuicios=$juicios->getCondiciones($columnas, $tablas, $where, $id);
							
							
								if(!empty($resultjuicios)){
										
									foreach($resultjuicios as $res)
									{
											
										$_id_juicios=$res->id_juicios;
							
										if($fecha_providencias!=""){
												
											$historial_juicios= new HistorialJuiciosModel();
							
											$funcion = "ins_historial_juicios";
											$parametros = " '$_id_juicios', '$id_estados_procesales_juicios_actualizar', '$fecha_providencias'";
											$historial_juicios->setFuncion($funcion);
											$historial_juicios->setParametros($parametros);
											$resultado=$historial_juicios->Insert();
												
												
												
												
												
										}else{
												
											$historial_juicios= new HistorialJuiciosModel();
												
											$funcion = "ins_historial_juicios_dos";
											$parametros = " '$_id_juicios', '$id_estados_procesales_juicios_actualizar'";
											$historial_juicios->setFuncion($funcion);
											$historial_juicios->setParametros($parametros);
											$resultado=$historial_juicios->Insert();
										}
											
											
									}
								}
							
							
							
							}
								
							if($fecha_providencias != ""){
								$juicios = new JuiciosModel();
								$colval = "fecha_ultima_providencia = '$fecha_providencias' ";
								$tabla = "juicios";
								$where = "id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$resultado=$juicios->UpdateBy($colval, $tabla, $where);
							}
							
							
								
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							$parametros['fecha_avoco']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_avoco']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
							
							
							$parametros['razon_avoco']=isset($razon_providencias)?trim($razon_providencias):'';
								
							$parametros['nombre_impulsor_anterior']=isset($nombre_impulsor_anterior)?trim($nombre_impulsor_anterior):'';
							$parametros['nombre_secretario_anterior']=isset($nombre_secretario_anterior)?trim($nombre_secretario_anterior):'';
							$parametros['tipo_avoco']=isset($tipo_avoco)?trim($tipo_avoco):0;
							$parametros['numero_liquidacion']=isset($numero_liquidacion)?trim($numero_liquidacion):'';
							$parametros['fecha_auto_pago']=isset($fecha_auto_pago)?trim($fecha_auto_pago):'';
							$parametros['ruta_avoco']=$ruta_providencias;
							$parametros['nombre_archivo_avoco']=$nombre_archivo_providencias;
								
							
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
							
							$pagina="contAvocoConocimientoSeleccion.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
								
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
								
							die();
								
						}
	
						if(isset($_POST["reporte_rpt_matriz"]))
						{
	
	
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
	
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
								

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
	
							$pagina="contMatrizJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
								
								
								
								
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
							
							
					}
						
					$this->view("MatrizJuiciosAvocoConocimiento",array(
							"resultSecre"=>$resultSecre, "resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv
								
	
	
					));
						
						
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
		
					));
						
					exit();
				}
					
			}
				
				
				
				
				
				
				
				
			//rol secretario
				
				/*
				
				
			if ($id_rol==5){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
	
				$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
					
				$tablas   = "public.asignacion_secretarios_view";
					
				$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
					
				$id       = "asignacion_secretarios_view.id_abogado";
				$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
	
	
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						$id_abogado=$_POST['id_abogado'];
						
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
						
	
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								  clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_secretario='$_id_usuarios'";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						
							$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
	
							
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
	
						if($id_abogado!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
	
	                    if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
						
	
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
									
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div><br>';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
								
									
								
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
								
											
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
								//	$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_AvocoConocimiento_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
										
									$html.='</tr>';
	
	
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
								$html.='</section>';
	
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt"]))
						{
	
								
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
								
			$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
								
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
	
							$pagina="contAvocoConocimiento.aspx";
	
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
	
						if(isset($_POST["reporte_rpt_matriz"]))
						{
	
	
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
	
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
			
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
								
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
							
							$pagina="contMatrizJuicios.aspx";
	
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
							
							
					}
	
					$this->view("MatrizJuiciosAvocoConocimientoSecretarios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
					
			}
				
			*/
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
				
		}
			
			
	}
	
	
	
	
	
	
	public function paginate($reload, $page, $tpages, $adjacents) {
	
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = '<ul class="pagination pagination-large">';
	
		// previous label
	
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_matriz(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_matriz(".($page-1).")'>$prevlabel</a></span></li>";
	
		}
	
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_matriz(1)'>1</a></li>";
		}
		// interval
		if($page>($adjacents+2)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// pages
	
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='active'><a>$i</a></li>";
			}else if($i==1) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_matriz(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load_matriz(".$i.")'>$i</a></li>";
			}
		}
	
		// interval
	
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// last
	
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_matriz($tpages)'>$tpages</a></li>";
		}
	
		// next
	
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_matriz(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
	
		$out.= "</ul>";
		return $out;
	}
	
	
	
	public function Secrtetarios()
	{
	
		//CONSULTA DE USUARIOS POR SU ROL
		$idciudad=(int)$_POST["ciudad"];
		$usuarios=new UsuariosModel();
		$columnas = "usuarios.id_usuarios,usuarios.nombre_usuarios";
		$tablas="usuarios,ciudad,rol";
		$where="rol.id_rol=usuarios.id_rol AND usuarios.id_ciudad=ciudad.id_ciudad
		AND rol.nombre_rol='SECRETARIO' AND ciudad.id_ciudad='$idciudad'";
		$id="usuarios.nombre_usuarios";
	
		$resultSecretario=$usuarios->getCondiciones($columnas ,$tablas , $where, $id);
	
		echo json_encode($resultSecretario);
	}
	
	public function Impulsor()
	{
		if(isset($_POST["id_ciudad"]))
		{
			//CONSULTA DE USUARIOS POR SU ROL
			$id_ciudad=(int)$_POST["id_ciudad"];
			$usuarios=new UsuariosModel();
			$columnas = "usuarios.id_usuarios,usuarios.nombre_usuarios";
			$tablas="usuarios,ciudad,rol";
			$where="rol.id_rol=usuarios.id_rol AND usuarios.id_ciudad=ciudad.id_ciudad
			AND rol.nombre_rol='ABOGADO IMPULSOR' AND ciudad.id_ciudad='$id_ciudad'";
			$id="usuarios.nombre_usuarios";
				
			$resultado=$usuarios->getCondiciones($columnas ,$tablas , $where, $id);
				
			echo json_encode($resultado);
				
		}else if(isset($_POST["usuarios"]))
		{
			//CONSULTA DE USUARIOS POR SU ROL
			$idusuarios=(int)$_POST["usuarios"];
			$usuarios=new UsuariosModel();
			$columnas = "asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
			$tablas="public.asignacion_secretarios_view";
			$id="asignacion_secretarios_view.id_abogado";
				
			$where="public.asignacion_secretarios_view.id_secretario = '$idusuarios'";
				
			$resultImpulsor=$usuarios->getCondiciones($columnas ,$tablas , $where, $id);
				
			echo json_encode($resultImpulsor);
		}
	
	}
	
	
	public function Imprimir_Providencia_Datos()
	{
		session_start();
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
		
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			$datos=array();
			

			if(isset($_GET["id_juicios"]) && isset($_GET["id_clientes"])&& isset($_GET["id_titulo_credito"]))
			{
				$id_juicios= $_GET['id_juicios'];
				$id_clientes= $_GET['id_clientes'];
				$id_titulo_credito= $_GET['id_titulo_credito'];
				$juicio_referido_titulo_credito= $_GET['juicio_referido_titulo_credito'];
				$numero_titulo_credito= $_GET['numero_titulo_credito'];
				$nombres_clientes= $_GET['nombres_clientes'];
				
				
				$datos=array("id_juicios"=>$id_juicios,"id_clientes"=>$id_clientes,"id_titulo_credito"=>$id_titulo_credito,"juicio_referido_titulo_credito"=>$juicio_referido_titulo_credito,"numero_titulo_credito"=>$numero_titulo_credito,"nombres_clientes"=>$nombres_clientes);
					
			}
			
			
			$this->view("FechasJuiciosProvidencias",array(
					"datos"=>$datos, "resultEstadoProcesal"=>$resultEstadoProcesal
						
			));
			
		}
		else 
		{
			$this->view("Error",array(
					"resultado"=>"Debe Iniciar Sesion"
		
			));
		}
	}
	
	public function Imprimir_Providencia()
	{
		
		session_start();
		$providencias= new ProvidenciasModel();
		$asignacion_secretarios = new AsignacionSecretariosModel();
		$juicios = new JuiciosModel();
		
		if(isset($_POST['generar']))
		{
			$id_juicios= $_POST['id_juicios'];
			$id_clientes= $_POST['id_clientes'];
			$id_titulo_credito= $_POST['id_titulo_credito'];
			$fecha_providencias= $_POST['fecha_providencias'];
			$hora_providencias= $_POST['hora_providencias'];
			$razon_providencias= $_POST['razon_providencias'];
			
			$id_estados_procesales_juicios = $_POST['id_estados_procesales_juicios'];
			
			$id_tipo_providencias=1;
			$consecutivo= new ConsecutivosModel();
			$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='PROVIDENCIAS_SUSPENSION'");
			$identificador_providencias=$resultConsecutivo[0]->real_consecutivos;
			$ruta_providencias="Providencias_Suspension";
			
			$nombre_archivo_providencias=$ruta_providencias.$identificador_providencias;
				
			$id_impulsor=$_SESSION['id_usuarios'];
			$resultSecre = $asignacion_secretarios->getBy("id_abogado_asignacion_secretarios ='$id_impulsor'");
			$id_secretario=$resultSecre[0]->id_secretario_asignacion_secretarios;
				
			
			
			$funcion = "ins_providencias_suspension";
			$parametros = "'$id_tipo_providencias','$identificador_providencias', '$nombre_archivo_providencias','$ruta_providencias', '$fecha_providencias', '$hora_providencias', '$razon_providencias', '$id_juicios', '$id_clientes', '$id_titulo_credito', '$id_impulsor', '$id_secretario'";
			$providencias->setFuncion($funcion);
			$providencias->setParametros($parametros);
			$resultado=$providencias->Insert();
			
			$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='PROVIDENCIAS_SUSPENSION'");
			
			if($id_estados_procesales_juicios>0){
					
				$juicios->UpdateBy("id_estados_procesales_juicios='$id_estados_procesales_juicios'", "juicios", "id_juicios='$id_juicios'");
					
				$historial_juicios= new HistorialJuiciosModel();
				
				$funcion = "ins_historial_juicios";
				$parametros = " '$id_juicios', '$id_estados_procesales_juicios', '$fecha_providencias'";
				$historial_juicios->setFuncion($funcion);
				$historial_juicios->setParametros($parametros);
				$resultado=$historial_juicios->Insert();
			}
				
			$juicios->UpdateBy("fecha_ultima_providencia='$fecha_providencias'", "juicios", "id_juicios='$id_juicios'");
			
			$traza=new TrazasModel();
			$_nombre_controlador = "MATRIZ JUICIOS";
			$_accion_trazas  = "Genero Providencia de Suspensión";
			$_parametros_trazas = $id_juicios;
			$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
			
			
			$parametros = array();
			
			$parametros['id_juicios']=isset($id_juicios)?trim($id_juicios):0;
			$parametros['id_clientes']=isset($id_clientes)?trim($id_clientes):0;
			$parametros['id_titulo_credito']=isset($id_titulo_credito)?trim($id_titulo_credito):0;
			$parametros['id_rol']= $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
			$parametros['fecha_providencias']=isset($fecha_providencias)?trim($fecha_providencias):0;
			$parametros['hora_providencias']=isset($hora_providencias)?trim($hora_providencias):0;
			$parametros['razon_providencias']=isset($razon_providencias)?trim($razon_providencias):'';
			$parametros['ruta_providencias']=$ruta_providencias;
			$parametros['nombre_archivo_providencias']=$nombre_archivo_providencias;
			
			$pagina="contProvidenciaSuspension.aspx";
			
			$conexion_rpt = array();
			$conexion_rpt['pagina']=$pagina;
			
			$this->view("ReporteRpt", array(
					"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
			));
			
			
			die();
			
			
		}
		
	}
	

	
	
	public function Imprimir_AvocoConocimiento_Datos()
	{
		session_start();
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			
			$juicios = new JuiciosModel();
			$_id_usuarios=$_SESSION['id_usuarios'];
			
			$columnas = " asignacion_secretarios_view.id_secretario,
					  asignacion_secretarios_view.secretarios";
			$tablas   = "public.asignacion_secretarios_view";
			$where    = "public.asignacion_secretarios_view.id_abogado = '$_id_usuarios'";
			$id       = "asignacion_secretarios_view.id_secretario";
			$resultSecre=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
			
			$estado_procesal = new EstadosProcesalesModel();
			$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
			
			$datos=array();
				
	
			if(isset($_GET["id_juicios"]) && isset($_GET["id_clientes"])&& isset($_GET["id_titulo_credito"]))
			{
				$id_juicios= $_GET['id_juicios'];
				$id_clientes= $_GET['id_clientes'];
				$id_titulo_credito= $_GET['id_titulo_credito'];
				$juicio_referido_titulo_credito= $_GET['juicio_referido_titulo_credito'];
				$numero_titulo_credito= $_GET['numero_titulo_credito'];
				$nombres_clientes= $_GET['nombres_clientes'];
	
	
				$datos=array("id_juicios"=>$id_juicios,"id_clientes"=>$id_clientes,"id_titulo_credito"=>$id_titulo_credito,"juicio_referido_titulo_credito"=>$juicio_referido_titulo_credito,"numero_titulo_credito"=>$numero_titulo_credito,"nombres_clientes"=>$nombres_clientes);
					
			}
				
				
			$this->view("FechasJuiciosAvocoConocimiento",array(
					"datos"=>$datos, "resultSecre"=>$resultSecre, "resultEstadoProcesal"=>$resultEstadoProcesal
	
			));
				
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"Debe Iniciar Sesion"
	
			));
		}
	}
	
	
	public function Imprimir_AvocoConocimiento()
	{
		session_start();
		$providencias= new ProvidenciasModel();
		$asignacion_secretarios = new AsignacionSecretariosModel();
		$juicios = new JuiciosModel();
		$usuarios = new UsuariosModel();
		
		if(isset($_POST['generar']))
		{
		
				
			$id_juicios= $_POST['id_juicios'];
			$id_clientes= $_POST['id_clientes'];
			$id_titulo_credito= $_POST['id_titulo_credito'];
			$fecha_avoco= $_POST['fecha_avoco'];
			$hora_avoco= $_POST['hora_avoco'];
			$razon_avoco= $_POST['razon_avoco'];
			
			$nombre_impulsor_anterior= $_POST['nombre_impulsor_anterior'];
			$nombre_secretario_anterior= $_POST['nombre_secretario_anterior'];
			$tipo_avoco= $_POST['tipo_avoco'];
			$id_estados_procesales_juicios_actualizar= $_POST['id_estados_procesales_juicios_actualizar'];
			$numero_liquidacion= $_POST['numero_liquidacion'];
			$fecha_auto_pago= $_POST['fecha_auto_pago'];
			 
			
			
			

			$consecutivo= new ConsecutivosModel();
			$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='AVOCO_CONOCIMIENTO'");
			$identificador_providencias=$resultConsecutivo[0]->real_consecutivos;
			$ruta_providencias="Avoco_Conocimiento";
			
			$nombre_archivo_providencias=$ruta_providencias.$identificador_providencias;
				
			$id_impulsor=$_SESSION['id_usuarios'];
			$resultSecre = $asignacion_secretarios->getBy("id_abogado_asignacion_secretarios ='$id_impulsor'");
			$id_secretario=$resultSecre[0]->id_secretario_asignacion_secretarios;
			
			
			$resultUsu = $usuarios->getBy("id_usuarios ='$id_impulsor'");
			$id_ciudad=$resultUsu[0]->id_ciudad;
				
			
				
			
			
			$funcion = "ins_avoco_conocimiento_liventy";
			$parametros = "'$id_juicios','$id_ciudad', '$id_secretario','$id_impulsor','$id_impulsor', '$nombre_archivo_providencias', '$ruta_providencias', '$identificador_providencias', '$nombre_secretario_anterior', '$nombre_impulsor_anterior', '$tipo_avoco', '$numero_liquidacion', '$razon_avoco', '$id_clientes', '$id_titulo_credito'";
			$providencias->setFuncion($funcion);
			$providencias->setParametros($parametros);
			$resultado=$providencias->Insert();
			
			$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='AVOCO_CONOCIMIENTO'");
			
			if($id_estados_procesales_juicios_actualizar>0){
					
				$juicios->UpdateBy("id_estados_procesales_juicios='$id_estados_procesales_juicios_actualizar'", "juicios", "id_juicios='$id_juicios'");
					
				$historial_juicios= new HistorialJuiciosModel();
			
				$funcion = "ins_historial_juicios";
				$parametros = " '$id_juicios', '$id_estados_procesales_juicios_actualizar', '$fecha_avoco'";
				$historial_juicios->setFuncion($funcion);
				$historial_juicios->setParametros($parametros);
				$resultado=$historial_juicios->Insert();
			}
				
			$juicios->UpdateBy("fecha_ultima_providencia='$fecha_avoco'", "juicios", "id_juicios='$id_juicios'");
				
				
			$traza=new TrazasModel();
			$_nombre_controlador = "MATRIZ JUICIOS";
			$_accion_trazas  = "Genero Avoco Conocimiento";
			$_parametros_trazas = $id_juicios;
			$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
				
			
			
			$parametros = array();
				
			$parametros['id_juicios']=isset($id_juicios)?trim($id_juicios):0;
			$parametros['id_clientes']=isset($id_clientes)?trim($id_clientes):0;
			$parametros['id_titulo_credito']=isset($id_titulo_credito)?trim($id_titulo_credito):0;
			$parametros['id_rol']= $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
			$parametros['fecha_avoco']=isset($fecha_avoco)?trim($fecha_avoco):0;
			$parametros['hora_avoco']=isset($hora_avoco)?trim($hora_avoco):0;
			$parametros['razon_avoco']=isset($razon_avoco)?trim($razon_avoco):'';
			
			$parametros['nombre_impulsor_anterior']=isset($nombre_impulsor_anterior)?trim($nombre_impulsor_anterior):'';
			$parametros['nombre_secretario_anterior']=isset($nombre_secretario_anterior)?trim($nombre_secretario_anterior):'';
			$parametros['tipo_avoco']=isset($tipo_avoco)?trim($tipo_avoco):0;
			$parametros['numero_liquidacion']=isset($numero_liquidacion)?trim($numero_liquidacion):'';
			$parametros['fecha_auto_pago']=isset($fecha_auto_pago)?trim($fecha_auto_pago):'';
			$parametros['ruta_avoco']=$ruta_providencias;
			$parametros['nombre_archivo_avoco']=$nombre_archivo_providencias;
				
			
			$pagina="contAvocoConocimientoSeleccion.aspx";
				
			$conexion_rpt = array();
			$conexion_rpt['pagina']=$pagina;
			$this->view("ReporteRpt", array(
					"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
			));
				
				
			die();
				
				
		}
		
	}
	
	
	
	public function ActualizarMatriz()
	{
		$respuesta='';
		session_start();
		$permisos_rol=new PermisosRolesModel();
		$clientes = new ClientesModel();
		$juicios = new JuiciosModel();
		$titulo_credito = new TituloCreditoModel();
		
		$juicios_restructuracion = new JuiciosRestructuracionModel();
		$historial_juicios = new HistorialJuiciosModel();
	
		$nombre_controladores = "ActualizarMatrizJuicios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
		
	
		if (!empty($resultPer))
		{
			if(isset($_POST["id_juicios"]))
			{
			
				$_cantidad_clientes = 0;
				$_cantidad_garantes = 0;
				
				$_id_juicios= $_POST["id_juicios"];
				//$_orden= $_POST["orden"];
				$_regional= $_POST["regional"];
				$_juicio_referido_titulo_credito= $_POST["juicio_referido_titulo_credito"];
				$_year_juicios= $_POST["year_juicios"];
				$_identificacion_clientes= $_POST["identificacion_clientes"];
				$_nombres_clientes= $_POST["nombres_clientes"];
				$_nombre_garantes= $_POST["nombre_garantes"];
				$_identificacion_garantes= $_POST["identificacion_garantes"];
				//$_nombre_provincias= $_POST["nombre_provincias"];
				$_numero_titulo_credito= $_POST["numero_titulo_credito"];
				
				$_cuantia_inicial= $_POST["cuantia_inicial"];
				$_riesgo_actual= $_POST["riesgo_actual"];
				//$_nombre_estados_procesales_juicios= $_POST["nombre_estados_procesales_juicios"];
				$_descripcion_estado_procesal= $_POST["descripcion_estado_procesal"];
				
				$_fecha_emision_juicios= $_POST["fecha_emision_juicios"];
				$_fecha_ultima_providencia= $_POST["fecha_ultima_providencia"];
				
				
				$_id_tipo_restructuracion =  $_POST["tipo_restructutacion"];  
				$_fecha_providencia_restructuracion = $_POST["fecha_providencia_restructuracion"]; 
				$_levantamiento_medida = $_POST["levantamiento_medidas"]; 
				$_archivado_restructuracion = $_POST["archivado_restructuracion"];
				
				
				$_estrategia_seguir= $_POST["estrategia_seguir"];
				$_observaciones= $_POST["observaciones"];
				$_impulsores= $_POST["impulsores"];
				$_secretarios= $_POST["secretarios"];
				$_id_provincias= $_POST["id_provincias"];
				$_id_estados_procesales_juicios= $_POST["id_estados_procesales_juicios"];
				$_id_clientes= $_POST["id_clientes"];
				$_id_titulo_credito= $_POST["id_titulo_credito"];
				
				
				if($_fecha_emision_juicios!=""){
						
					$colval1="juicio_referido_titulo_credito='$_juicio_referido_titulo_credito',
					id_estados_procesales_juicios='$_id_estados_procesales_juicios',
					fecha_emision_juicios='$_fecha_emision_juicios',
					numero_juicios='$_juicio_referido_titulo_credito',
					year_juicios='$_year_juicios',
					estrategia_seguir='$_estrategia_seguir',
					observaciones='$_observaciones',
					descripcion_estado_procesal='$_descripcion_estado_procesal',
					regional='$_regional',
					cuantia_inicial='$_cuantia_inicial',
					riesgo_actual='$_riesgo_actual'";
					
					
					$tabla1="juicios";
					$where1="id_juicios='$_id_juicios'";
					
					
					try {
					
						$resultado=$juicios->UpdateBy($colval1, $tabla1, $where1);
					
					
					
					
					}catch (Exception $ex)
					{
					
						die($ex);
					
					}
					
					
				}
				
				
				else{
					
					
						
					$_fecha_emision_juicios="null";
					
					$colval1="juicio_referido_titulo_credito='$_juicio_referido_titulo_credito',
					id_estados_procesales_juicios='$_id_estados_procesales_juicios',
					fecha_emision_juicios=$_fecha_emision_juicios,
					numero_juicios='$_juicio_referido_titulo_credito',
					year_juicios='$_year_juicios',
					estrategia_seguir='$_estrategia_seguir',
					observaciones='$_observaciones',
					descripcion_estado_procesal='$_descripcion_estado_procesal',
					regional='$_regional',
					cuantia_inicial='$_cuantia_inicial',
					riesgo_actual='$_riesgo_actual'";
						
						
					
						
					$tabla1="juicios";
					$where1="id_juicios='$_id_juicios'";
						
					
						
					try {
							
						$resultado=$juicios->UpdateBy($colval1, $tabla1, $where1);
							
							
							
							
					}catch (Exception $ex)
					{
							
						die($ex);
							
					}
					
					
				}
				
				
				
				
				if($_fecha_ultima_providencia!=""){
				
					$colval1="juicio_referido_titulo_credito='$_juicio_referido_titulo_credito',
					id_estados_procesales_juicios='$_id_estados_procesales_juicios',
					numero_juicios='$_juicio_referido_titulo_credito',
					year_juicios='$_year_juicios',
					fecha_ultima_providencia='$_fecha_ultima_providencia',
					estrategia_seguir='$_estrategia_seguir',
					observaciones='$_observaciones',
					descripcion_estado_procesal='$_descripcion_estado_procesal',
					regional='$_regional',
					cuantia_inicial='$_cuantia_inicial',
					riesgo_actual='$_riesgo_actual'";
						
						
					$tabla1="juicios";
					$where1="id_juicios='$_id_juicios'";
						
					
						
					try {
							
						$resultado=$juicios->UpdateBy($colval1, $tabla1, $where1);
						
						$funcion = "ins_historial_juicios";
						$parametros = " '$_id_juicios', '$_id_estados_procesales_juicios', '$_fecha_ultima_providencia'";
						$historial_juicios->setFuncion($funcion);
						$historial_juicios->setParametros($parametros);
						$resultado=$historial_juicios->Insert();
							
							
					}catch (Exception $ex)
					{
							
						die($ex);
							
					}	
				}else{
						
					$_fecha_ultima_providencia="null";
					
					
					$colval1="juicio_referido_titulo_credito='$_juicio_referido_titulo_credito',
					id_estados_procesales_juicios='$_id_estados_procesales_juicios',
					numero_juicios='$_juicio_referido_titulo_credito',
					year_juicios='$_year_juicios',
					fecha_ultima_providencia=$_fecha_ultima_providencia,
					estrategia_seguir='$_estrategia_seguir',
					observaciones='$_observaciones',
					descripcion_estado_procesal='$_descripcion_estado_procesal',
					regional='$_regional',
					cuantia_inicial='$_cuantia_inicial',
					riesgo_actual='$_riesgo_actual'";
					
					
						
					
					$tabla1="juicios";
					$where1="id_juicios='$_id_juicios'";
					
					
					
					try {
							
						$resultado=$juicios->UpdateBy($colval1, $tabla1, $where1);
							
						$funcion = "ins_historial_juicios_dos";
						$parametros = " '$_id_juicios', '$_id_estados_procesales_juicios'";
						$historial_juicios->setFuncion($funcion);
						$historial_juicios->setParametros($parametros);
						$resultado=$historial_juicios->Insert();
							
							
					}catch (Exception $ex)
					{
							
						die($ex);
							
					}
						
				}
				
				
				
				
				$traza=new TrazasModel();
				$_nombre_controlador = "MATRIZ JUICIOS";
				$_accion_trazas  = "Actualizo tabla juicios";
				$_parametros_trazas = $_id_juicios;
				$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
				
					
				
				
			}
			
			
			
			if(isset($_POST["id_clientes"]))
			{
				
				
				$_identificacion_clientes= $_POST["identificacion_clientes"];
				$_nombres_clientes= $_POST["nombres_clientes"];
				if ( $_nombres_clientes !=""  )
				{
					$_cantidad_clientes = 1;
				}
				$_nombre_garantes= $_POST["nombre_garantes"];
				$_identificacion_garantes= $_POST["identificacion_garantes"];
				if ( $_nombre_garantes !=""  )
				{
					$_cantidad_garantes = 1;
				}
				//$_nombre_provincias= $_POST["nombre_provincias"];
				$_id_provincias= $_POST["id_provincias"];
				$_id_clientes= $_POST["id_clientes"];
				
				//lo agtregado reciente
				
				$_identificacion_clientes_1= $_POST["identificacion_clientes_1"];
				$_nombre_clientes_1= $_POST["nombre_clientes_1"];
				
				if ( $_nombre_clientes_1 !=""  )
				{
					$_cantidad_clientes = 2;
				}
				$_identificacion_clientes_2= $_POST["identificacion_clientes_2"];
				$_nombre_clientes_2= $_POST["nombre_clientes_2"];
				
				if ( $_nombre_clientes_2 !=""  )
				{
					$_cantidad_clientes = 3;
				}
				
				$_identificacion_clientes_3= $_POST["identificacion_clientes_3"];
				$_nombre_clientes_3= $_POST["nombre_clientes_3"];
				
				
				if ( $_nombre_clientes_3 !=""  )
				{
					$_cantidad_clientes = 4;
				}
				
				$_identificacion_garantes_1= $_POST["identificacion_garantes_1"];
				$_nombre_garantes_1= $_POST["nombre_garantes_1"];
				
				if ( $_nombre_garantes_1 !=""  )
				{
					$_cantidad_garantes = 2;
				}
				
				
				$_identificacion_garantes_2= $_POST["identificacion_garantes_2"];
				$_nombre_garantes_2= $_POST["nombre_garantes_2"];
				
				if ( $_nombre_garantes_2 !=""  )
				{
					$_cantidad_garantes = 3;
				}
				
				
				$_identificacion_garantes_3= $_POST["identificacion_garantes_3"];
				$_nombre_garantes_3= $_POST["nombre_garantes_3"];
				
				if ( $_nombre_garantes_3 !=""  )
				{
					$_cantidad_garantes = 4;
				}
				
				
				$_correo_clientes= $_POST["correo_clientes"];
				$_correo_clientes_1= $_POST["correo_clientes_1"];
				$_correo_clientes_2= $_POST["correo_clientes_2"];
				$_correo_clientes_3= $_POST["correo_clientes_3"];
				$_direccion_clientes= $_POST["direccion_clientes"];
				$_direccion_clientes_1= $_POST["direccion_clientes_1"];
				$_direccion_clientes_2= $_POST["direccion_clientes_2"];
				$_direccion_clientes_3= $_POST["direccion_clientes_3"];
				
				
				$_sexo_clientes = $_POST["sexo_clientes"];
				$_sexo_clientes_1 = $_POST["sexo_clientes_1"];
				$_sexo_clientes_2 = $_POST["sexo_clientes_2"];
				$_sexo_clientes_3 = $_POST["sexo_clientes_3"];
				$_sexo_garantes = $_POST["sexo_garantes"];
				$_sexo_garantes_1 = $_POST["sexo_garantes_1"];
				$_sexo_garantes_2 = $_POST["sexo_garantes_2"];
				$_sexo_garantes_3 = $_POST["sexo_garantes_3"];
				
				
				
				$_correo_garantes_1= $_POST["correo_garantes_1"];
				$_correo_garantes_2= $_POST["correo_garantes_2"];
				$_correo_garantes_3= $_POST["correo_garantes_3"];
				$_correo_garantes_4= $_POST["correo_garantes_4"];
				
				$_direccion_garantes_1= $_POST["direccion_garantes_1"];
				$_direccion_garantes_2= $_POST["direccion_garantes_2"];
				$_direccion_garantes_3= $_POST["direccion_garantes_3"];
				$_direccion_garantes_4= $_POST["direccion_garantes_4"];
			
				$colval="identificacion_clientes='$_identificacion_clientes',
				nombres_clientes='$_nombres_clientes',
				nombre_garantes='$_nombre_garantes',
				identificacion_garantes='$_identificacion_garantes',
				id_provincias='$_id_provincias',
				identificacion_clientes_1='$_identificacion_clientes_1',
				nombre_clientes_1='$_nombre_clientes_1',
				identificacion_clientes_2='$_identificacion_clientes_2',
				nombre_clientes_2='$_nombre_clientes_2',
				identificacion_clientes_3='$_identificacion_clientes_3',
				nombre_clientes_3='$_nombre_clientes_3',
				identificacion_garantes_1='$_identificacion_garantes_1',
				nombre_garantes_1='$_nombre_garantes_1',
				identificacion_garantes_2='$_identificacion_garantes_2',
				nombre_garantes_2='$_nombre_garantes_2',
				identificacion_garantes_3='$_identificacion_garantes_3',
				nombre_garantes_3='$_nombre_garantes_3',
				correo_clientes='$_correo_clientes',
				correo_clientes_1='$_correo_clientes_1',
				correo_clientes_2='$_correo_clientes_2',
				correo_clientes_3='$_correo_clientes_3',
				direccion_clientes='$_direccion_clientes',
				direccion_clientes_1='$_direccion_clientes_1',
				direccion_clientes_2='$_direccion_clientes_2',
				direccion_clientes_3='$_direccion_clientes_3',
				cantidad_clientes='$_cantidad_clientes',
				cantidad_garantes='$_cantidad_garantes',
				sexo_clientes='$_sexo_clientes',
				sexo_clientes_1='$_sexo_clientes_1',
				sexo_clientes_2='$_sexo_clientes_2',
				sexo_clientes_3='$_sexo_clientes_3',
				sexo_garantes='$_sexo_garantes',
				sexo_garantes_1='$_sexo_garantes_1',
				sexo_garantes_2='$_sexo_garantes_2',
				sexo_garantes_3='$_sexo_garantes_3',
				correo_garantes_1='$_correo_garantes_1',
				correo_garantes_2='$_correo_garantes_2',
				correo_garantes_3='$_correo_garantes_3',
				correo_garantes_4='$_correo_garantes_4',
				direccion_garantes_1='$_direccion_garantes_1',
				direccion_garantes_2='$_direccion_garantes_2',
				direccion_garantes_3='$_direccion_garantes_3',
				direccion_garantes_4='$_direccion_garantes_4'";
				
				
				
				$tabla="clientes";
				$where="id_clientes='$_id_clientes'";
			
				try {
			
					$resultado=$clientes->UpdateBy($colval, $tabla, $where);
						
					

					$traza=new TrazasModel();
					$_nombre_controlador = "MATRIZ JUICIOS";
					$_accion_trazas  = "Actualizo tabla clientes";
					$_parametros_trazas = $_id_clientes;
					$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
					
					
						
					
			
				}catch (Exception $ex)
				{
			
				}
			
			
			}
			
			
			if(isset($_POST["id_titulo_credito"]))
			{
				
				$_numero_titulo_credito= $_POST["numero_titulo_credito"];
				
				$_fecha_emision_juicios= $_POST["fecha_emision_juicios"];
				$_fecha_ultima_providencia= $_POST["fecha_ultima_providencia"];
				
				$_id_clientes= $_POST["id_clientes"];
				$_id_titulo_credito= $_POST["id_titulo_credito"];
			
				
				
				
				if($_fecha_emision_juicios!=""){
				

					$colval2="numero_titulo_credito='$_numero_titulo_credito',
					fecha_emision='$_fecha_emision_juicios',
					fecha_corte='$_fecha_emision_juicios'";
						
					$tabla2="titulo_credito";
					$where2="id_titulo_credito='$_id_titulo_credito' AND id_clientes='$_id_clientes'";
						
					try {
					
						$resultado=$titulo_credito->UpdateBy($colval2, $tabla2, $where2);
							
							
							
					
					}catch (Exception $ex)
					{
					
					}
					
				}else{
				
					$_fecha_emision_juicios="null";
					
					$colval2="numero_titulo_credito='$_numero_titulo_credito',
					fecha_emision=$_fecha_emision_juicios,
					fecha_corte=$_fecha_emision_juicios";
					
					$tabla2="titulo_credito";
					$where2="id_titulo_credito='$_id_titulo_credito' AND id_clientes='$_id_clientes'";
					
					try {
							
						$resultado=$titulo_credito->UpdateBy($colval2, $tabla2, $where2);
							
							
					}catch (Exception $ex)
					{
							
					}
				}
				
				if($_fecha_ultima_providencia!=""){
				
					$colval2="numero_titulo_credito='$_numero_titulo_credito',
					fecha_ultima_providencia='$_fecha_ultima_providencia'";
						
					$tabla2="titulo_credito";
					$where2="id_titulo_credito='$_id_titulo_credito' AND id_clientes='$_id_clientes'";
						
					try {
							
						$resultado=$titulo_credito->UpdateBy($colval2, $tabla2, $where2);
							
							
							
							
					}catch (Exception $ex)
					{
							
					}
				
				}else{
				
					$_fecha_ultima_providencia="null";
					
					
					$colval2="numero_titulo_credito='$_numero_titulo_credito',
					fecha_ultima_providencia=$_fecha_ultima_providencia";
					
					$tabla2="titulo_credito";
					$where2="id_titulo_credito='$_id_titulo_credito' AND id_clientes='$_id_clientes'";
					
					try {
							
						$resultado=$titulo_credito->UpdateBy($colval2, $tabla2, $where2);
							
							
							
							
					}catch (Exception $ex)
					{
							
					}
				
				}
				
				
				
				
				
				
				
				
				//inserto la restructuracion
					
				if ($_id_tipo_restructuracion > 0 && $_levantamiento_medida !="0" && $_archivado_restructuracion != "0"    )
				{
				
					try {
				
						
						//ins_juicios_restructuracion( integer,  integer,  date,  boolean,  boolean)
						$funcion = "ins_juicios_restructuracion";
						$parametros = "'$_id_juicios','$_id_tipo_restructuracion', '$_fecha_providencia_restructuracion','$_levantamiento_medida', '$_archivado_restructuracion'  ";
						$juicios_restructuracion->setFuncion($funcion);
						$juicios_restructuracion->setParametros($parametros);
						$resultado=$juicios_restructuracion->Insert();
				
				
					}catch (Exception $ex)
					{
				
						die($ex);
				
					}
					
					
					$traza=new TrazasModel();
					$_nombre_controlador = "MATRIZ JUICIOS";
					$_accion_trazas  = "Inserto o Actualizo tabla Restructuracion";
					$_parametros_trazas = $_id_juicios;
					$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
				}
				else
				{
				
					echo "no entre";	
				}
					
				$traza=new TrazasModel();
				$_nombre_controlador = "MATRIZ JUICIOS";
				$_accion_trazas  = "Actualizo tabla titulo_credito";
				$_parametros_trazas = $_id_titulo_credito;
				$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
			}
			
		
			
			
		$this->redirect("MatrizJuicios", "index3");
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
			
			));
			
			exit();
		}
	
		
	
	}
	
	

	
	
	public function index3(){
	
		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$id_rol= $_SESSION['id_rol'];
	
			if ($id_rol==3){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
				
				
				$tipo_restructuracion = new TipoRestructuracionModel();
				$resultTipoRestructuracion =$tipo_restructuracion->getAll("nombre_tipo_restructuracion");
				
				
				$juicios_restructuracion = new JuiciosRestructuracionModel();
					
				
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "ActualizarMatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
	
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
						
						
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
	
	
	
	
	
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios'";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
							
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
						
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
						
						
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
						
						
						
	
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Sexo 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
	
									
	
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
	
									$html.='<tr>';
									$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=index3&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.' "><i class="glyphicon glyphicon-edit"></i></a></span></td>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->sexo_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
										
										
									$html.='</tr>';
	
	
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt"]))
						{
								
								
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
								
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}	

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
								
							$pagina="contProvidenciaSuspension.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
	
								
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
								
							die();
								
						}
	
						if(isset($_POST["reporte_rpt_matriz"]))
						{
	
	
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
	
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}	
								

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
	
							$pagina="contMatrizJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
								
								
								
								
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
						
							
					}
						
					
					
					if(isset($_GET["id_abogado"])){
						
						$usuarios= new UsuariosModel();
						
						$_id_abogado = $_GET["id_abogado"];
						
						
						
						$columnas_nuevo="asignacion_secretarios_view.id_secretario, 
										  asignacion_secretarios_view.id_abogado, 
										  asignacion_secretarios_view.impulsores, 
										  asignacion_secretarios_view.secretarios";
						$tablas_nuevo="public.asignacion_secretarios_view";
						$where_nuevo="asignacion_secretarios_view.id_abogado='$_id_abogado'";
						$id_nuevo="asignacion_secretarios_view.id_secretario";
						$resultSecre = $usuarios->getCondiciones($columnas_nuevo ,$tablas_nuevo ,$where_nuevo, $id_nuevo);
						
						
						
						
						$this->view("AgregarJuicios", array(
								"resultSecre"=>$resultSecre, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv,
						));
							
						die();
							
							
					}
					
					
					$resultEdit = "";
					$resultEdit2 = "";
					if (isset ($_GET["id_juicios"])   )
					{
						$_id_juicios = $_GET["id_juicios"];
	
						$columnas_edit = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
	
						$tablas_edit=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where_edit="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND juicios.id_juicios='$_id_juicios'";
						$id_edit="juicios.id_juicios";
	
						$resultEdit = $juicios->getCondiciones($columnas_edit ,$tablas_edit ,$where_edit, $id_edit);

						
						$columnas_edit2  = "id_juicios_restructuracion, id_juicios, id_tipo_restructuracion,  fecha_providencia_restructuracion, levantamiento_medida, archivado_restructuracion ";  
       					$tablas_edit2 = 	"juicios_restructuracion";
       					$where_edit2  =     "id_juicios='$_id_juicios'";
       					$id_edit2		=  " fecha_providencia_restructuracion";
						
						$resultEdit2 = $juicios_restructuracion ->getCondiciones($columnas_edit2 ,$tablas_edit2 ,$where_edit2, $id_edit2);
						
						//echo $_id_juicios;
							
					}
						
					$this->view("ActualizarMatrizJuicios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultEdit"=>$resultEdit,
							"resultTipoRestructuracion"=>$resultTipoRestructuracion, "resultEdit2"=>$resultEdit2
								
	
	
					));
						
						
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
		
					));
						
					exit();
				}
					
			}
				
			
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
				
		}
			
			
	}
	
	
		
	
	public function index4(){
	
		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$id_rol= $_SESSION['id_rol'];
	
			if ($id_rol==3){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
				
				
				//lote
			
				$columnasL = "lote_juicios";
				$tablasL = "juicios";
				$whereL = "id_usuarios = '$_id_usuarios' GROUP BY lote_juicios";
				$idL = "lote_juicios";
				
				$resultLote=$juicios->getCondiciones($columnasL ,$tablasL ,$whereL, $idL);
				
				
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
	
						$lote_juicios = $_POST['lote_juicios'];
						
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios' 
						AND juicios.id_estados_procesales_juicios !='8' ";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
	
						$where_13 = "";	
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
						
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
						
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
	
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
						
						
						if($lote_juicios!=0){$where_13=" AND juicios.lote_juicios = '$lote_juicios'";}
						
						
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12.$where_13;
						
						
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
	
									
	
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
										
									$html.='<tr>';
									$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_ProvidenciaLevantamiento_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><a href="javascript:null()" id="'.$res->id_juicios.'?/&'.$i.'?/&'.$res->regional.'?/&'.$res->juicio_referido_titulo_credito.'?/&'.$res->year_juicios.'?/&'.$res->identificacion_clientes.'?/&'.$res->nombres_clientes.'?/&'.$res->nombre_garantes.'?/&'.$res->identificacion_garantes.'?/&'.$res->nombre_provincias.'?/&'.$res->numero_titulo_credito.'?/&'.$res->fecha_emision_juicios.'?/&'.$res->cuantia_inicial.'?/&'.$res->riesgo_actual.'?/&'.$res->nombre_estados_procesales_juicios.'?/&'.$res->descripcion_estado_procesal.'?/&'.$res->fecha_ultima_providencia.'?/&'.$res->estrategia_seguir.'?/&'.$res->observaciones.'?/&'.$res->impulsores.'?/&'.$res->secretarios.'?/&'.$res->id_provincias.'?/&'.$res->id_estados_procesales_juicios.'?/&'.$res->id_clientes.'?/&'.$res->id_titulo_credito.'?/&'.$res->identificacion_clientes_1.'?/&'.$res->nombre_clientes_1.'?/&'.$res->identificacion_clientes_2.'?/&'.$res->nombre_clientes_2.'?/&'.$res->identificacion_clientes_3.'?/&'.$res->nombre_clientes_3.'?/&'.$res->identificacion_garantes_1.'?/&'.$res->nombre_garantes_1.'?/&'.$res->identificacion_garantes_2.'?/&'.$res->nombre_garantes_2.'?/&'.$res->identificacion_garantes_3.'?/&'.$res->nombre_garantes_3.'?/&'.$res->correo_clientes.'?/&'.$res->correo_clientes_1.'?/&'.$res->correo_clientes_2.'?/&'.$res->correo_clientes_3.'?/&'.$res->direccion_clientes.'?/&'.$res->direccion_clientes_1.'?/&'.$res->direccion_clientes_2.'?/&'.$res->direccion_clientes_3.'"  onclick="editar_matriz(this)" ><i class="glyphicon glyphicon-edit"></i></a></td>';
									$html.='</tr>';
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
	
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt"]))
						{
	
							
							$juicios = new JuiciosModel();
							
							if(isset($_POST["juicio_referido_titulo_credito"]))
							{
							
							
							$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
							$numero_titulo_credito=$_POST['numero_titulo_credito'];
							
							$id_provincias=$_POST['id_provincias'];
							$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
							
							$identificacion_clientes=$_POST['identificacion_clientes'];
							$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
							$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
							$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
							
							
							$identificacion_garantes=$_POST['identificacion_garantes'];
							$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
							$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
							$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
							
							$lote_juicios=$_POST['lote_juicios'];
								
							
							$id_impulsor=$_SESSION['id_usuarios'];
							
							$columnas = " juicios.id_juicios,
								 		  clientes.id_clientes,
								          titulo_credito.id_titulo_credito";
								
								
								
							$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
								
							$where="clientes.id_clientes = titulo_credito.id_clientes AND
							clientes.id_provincias = provincias.id_provincias AND
							titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
							asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
							juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
							asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$id_impulsor'
							AND AND juicios.id_estados_procesales_juicios !='8'  ";
								
							$id="juicios.orden";
								
							$where_0 = "";
							$where_1 = "";
							$where_2 = "";
							$where_3 = "";
							$where_4 = "";
							$where_5 = "";
							
							$where_6 = "";
							$where_7 = "";
							$where_8 = "";
							$where_9 = "";
							$where_10 = "";
							$where_11 = "";
							$where_12 = "";
							$where_13 = "";	
								
								
							if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
							
							if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
								
							if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
								
							if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
							
							if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
							
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
								}
							
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
										
								}
							}
							
							if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
							if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
							if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
							
							
							if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
							if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
							if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
							if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
							if($lote_juicios!=0){$where_13=" AND juicios.lote_juicios = '$lote_juicios'";}
							
							
							$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12.$where_13;
							
							
							$resultSet=$juicios->getCondiciones($columnas, $tablas, $where_to, $id);
							
							
							
							$providencias= new ProvidenciasModel();
							$asignacion_secretarios = new AsignacionSecretariosModel();
							$juicios = new JuiciosModel();
							
							
							
							$resultSecre = $asignacion_secretarios->getBy("id_abogado_asignacion_secretarios ='$id_impulsor'");
							$id_secretario=$resultSecre[0]->id_secretario_asignacion_secretarios;
							
							if(!empty($resultSet)){
								
								
								$fecha_providencias=$_POST['fecha_providencias'];
								$hora_providencias=$_POST['hora_providencias'];
								$id_tipo_providencias=2;
								$razon_providencias=$_POST['razon_providencias'];
								
								
								$numero_oficio=$_POST['numero_oficio'];
								$numero_oficio1="";
								$numero_oficio2="";
								$numero_oficio3="";
								$dirigido_levantamiento="";
								
								
								$consecutivo= new ConsecutivosModel();
								$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='PROVIDENCIAS_LEVANTAMIENTO'");
								$identificador_providencias=$resultConsecutivo[0]->real_consecutivos;
								$ruta_providencias="Providencias_Levantamiento";
								
								$nombre_archivo_providencias=$ruta_providencias.$identificador_providencias;
								
								foreach($resultSet as $res)
								{
					
								$_id_juicios=$res->id_juicios;
								$id_clientes =$res->id_clientes;
								$id_titulo_credito=$res->id_titulo_credito;
								
								
								
								$funcion = "ins_providencias_levantamiento";
								$parametros = "'$id_tipo_providencias','$identificador_providencias', '$nombre_archivo_providencias','$ruta_providencias', '$fecha_providencias', '$hora_providencias', '$razon_providencias', '$_id_juicios', '$id_clientes', '$id_titulo_credito', '$numero_oficio', '$numero_oficio1', '$numero_oficio2', '$numero_oficio3', '$dirigido_levantamiento', '$id_impulsor', '$id_secretario'";
								$providencias->setFuncion($funcion);
								$providencias->setParametros($parametros);
								$resultado=$providencias->Insert();
								
								
								
								$traza=new TrazasModel();
								$_nombre_controlador = "MATRIZ JUICIOS";
								$_accion_trazas  = "Genero Providencia de Levantamiento";
								$_parametros_trazas = $_id_juicios;
								$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
								
									
								}
								
								$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='PROVIDENCIAS_LEVANTAMIENTO'");
									
								
							}
							
							
							}
							
							
							
							
							
							$id_estados_procesales_juicios_actualizar=$_POST['id_estados_procesales_juicios_actualizar'];
							$id_abogado=$_SESSION['id_usuarios'];
							$fecha_providencias=$_POST['fecha_providencias'];
							
						
							
							if($id_estados_procesales_juicios_actualizar > 0){
							
								$colval = "id_estados_procesales_juicios = '$id_estados_procesales_juicios_actualizar'";
								$tabla = "juicios";
								$where = "id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$resultado=$juicios->UpdateBy($colval, $tabla, $where);
								
								
								
								$columnas1="id_juicios";
								$tablas="juicios";
								$where="id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$id="id_juicios";
								
								$resultjuicios=$juicios->getCondiciones($columnas, $tablas, $where, $id);
								
								
								if(!empty($resultjuicios)){
									
									foreach($resultjuicios as $res)
									{
											
										$_id_juicios=$res->id_juicios;
										
										if($fecha_providencias!=""){
											
											$historial_juicios= new HistorialJuiciosModel();
												
											$funcion = "ins_historial_juicios";
											$parametros = " '$_id_juicios', '$id_estados_procesales_juicios_actualizar', '$fecha_providencias'";
											$historial_juicios->setFuncion($funcion);
											$historial_juicios->setParametros($parametros);
											$resultado=$historial_juicios->Insert();
											
											
											
											
											
										}else{
											
											$historial_juicios= new HistorialJuiciosModel();
											
											$funcion = "ins_historial_juicios_dos";
											$parametros = " '$_id_juicios', '$id_estados_procesales_juicios_actualizar'";
											$historial_juicios->setFuncion($funcion);
											$historial_juicios->setParametros($parametros);
											$resultado=$historial_juicios->Insert();
										}
									
									
									}
								}
								
								
								
							}
							
							if($fecha_providencias != ""){
								$juicios = new JuiciosModel();
								$colval = "fecha_ultima_providencia = '$fecha_providencias' ";
								$tabla = "juicios";
								$where = "id_usuarios = '$id_abogado' AND id_estados_procesales_juicios !='8'";
								$resultado=$juicios->UpdateBy($colval, $tabla, $where);
							}
	
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							$parametros['fecha_levantamiento']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_levantamiento']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
	                        $parametros['numero_oficio']=(isset($_POST['numero_oficio']))?trim($_POST['numero_oficio']):'';
	                        $parametros['razon_levantamiento']=(isset($_POST['razon_providencias']))?trim($_POST['razon_providencias']):'';
	                        $parametros['nombre_usuario_saliente']=(isset($_POST['nombre_usuario_saliente']))?trim($_POST['nombre_usuario_saliente']):'';
	                        
	                        $parametros['ruta_providencias']=$ruta_providencias;
	                        $parametros['nombre_archivo_providencias']=$nombre_archivo_providencias;
	                      
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
							
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
							
								}
								if($fechaDesde == "" && $fechaHasta != ""){
							
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
							$parametros['lote_juicios']=(isset($_POST['lote_juicios']))?trim($_POST['lote_juicios']):'';
							$pagina="contProvidenciaLevantamiento.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
	
						if(isset($_POST["reporte_rpt_matriz"]))
						{
	
	
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
	
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
	

							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
							
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
							
							$pagina="contMatrizJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
	
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
							
							
					}
	
					$this->view("MatrizJuiciosProvidenciasLevantamiento",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultLote"=>$resultLote
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
					
			}
	
	
	
	
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
	
			));
	
		}
			
			
	}
	
	
	
	public function Imprimir_ProvidenciaLevantamiento_Datos()
	{
		session_start();
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			$datos=array();
	
	
			if(isset($_GET["id_juicios"]) && isset($_GET["id_clientes"])&& isset($_GET["id_titulo_credito"]))
			{
				$id_juicios= $_GET['id_juicios'];
				$id_clientes= $_GET['id_clientes'];
				$id_titulo_credito= $_GET['id_titulo_credito'];
				$juicio_referido_titulo_credito= $_GET['juicio_referido_titulo_credito'];
				$numero_titulo_credito= $_GET['numero_titulo_credito'];
				$nombres_clientes= $_GET['nombres_clientes'];
	
	
				$datos=array("id_juicios"=>$id_juicios,"id_clientes"=>$id_clientes,"id_titulo_credito"=>$id_titulo_credito,"juicio_referido_titulo_credito"=>$juicio_referido_titulo_credito,"numero_titulo_credito"=>$numero_titulo_credito,"nombres_clientes"=>$nombres_clientes);
					
			}
	
	
			$this->view("ProvidenciaLevantamiento",array(
					"datos"=>$datos, "resultEstadoProcesal"=>$resultEstadoProcesal
	
			));
	
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"Debe Iniciar Sesion"
	
			));
		}
	}
	
	
	public function Imprimir_Oficios_Datos()
	{
		session_start();
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			$datos=array();
	
	
			if(isset($_GET["id_juicios"]) && isset($_GET["id_clientes"])&& isset($_GET["id_titulo_credito"]))
			{
				$id_juicios= $_GET['id_juicios'];
				$id_clientes= $_GET['id_clientes'];
				$id_titulo_credito= $_GET['id_titulo_credito'];
				$juicio_referido_titulo_credito= $_GET['juicio_referido_titulo_credito'];
				$numero_titulo_credito= $_GET['numero_titulo_credito'];
				$nombres_clientes= $_GET['nombres_clientes'];
				
				$identificacion_clientes= $_GET['identificacion_clientes'];
				$nombre_garantes= $_GET['nombre_garantes'];
				$identificacion_garantes= $_GET['identificacion_garantes'];
				$identificacion_garantes_1= $_GET['identificacion_garantes_1'];
				$nombre_garantes_1= $_GET['nombre_garantes_1'];
				
	
	
				$datos=array("id_juicios"=>$id_juicios,"id_clientes"=>$id_clientes,"id_titulo_credito"=>$id_titulo_credito,"juicio_referido_titulo_credito"=>$juicio_referido_titulo_credito,"numero_titulo_credito"=>$numero_titulo_credito,"nombres_clientes"=>$nombres_clientes,"identificacion_clientes"=>$identificacion_clientes,"nombre_garantes"=>$nombre_garantes,"identificacion_garantes"=>$identificacion_garantes,"identificacion_garantes_1"=>$identificacion_garantes_1,"nombre_garantes_1"=>$nombre_garantes_1);
					
			}
	
	
			$this->view("InsertaOficiosManual",array(
					"datos"=>$datos
	
			));
	
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"Debe Iniciar Sesion"
	
			));
		}
	}
	
	
	public function  Imprimir_Oficios(){
		

		session_start();
		$oficios= new OficiosModel();
		
		if(isset($_POST['generar']))
		{
		
			$id_juicios= $_POST['id_juicios'];
			$id_clientes= $_POST['id_clientes'];
			$id_titulo_credito= $_POST['id_titulo_credito'];
			$cuerpo_oficios= $_POST['cuerpo_oficios'];
			$id_entidades=10;
			
			$consecutivo= new ConsecutivosModel();
			$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='OFICIOS'");
			$identificador_oficios=$resultConsecutivo[0]->real_consecutivos;
			$ruta_oficios="Oficios";
		
			$nombre_archivo_oficios=$ruta_oficios.$identificador_oficios;
				
			$id_impulsor=$_SESSION['id_usuarios'];
			$oficio_manual='true';
		
			
			
			$funcion = "ins_oficios_manual";
			$parametros = "'$identificador_oficios', '$id_juicios', '$id_entidades', '$id_impulsor', '$identificador_oficios', '$nombre_archivo_oficios', '$ruta_oficios', '$cuerpo_oficios', '$oficio_manual'";
			$oficios->setFuncion($funcion);
			$oficios->setParametros($parametros);
			$resultado=$oficios->Insert();
		
			$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='OFICIOS'");
		
			
			$parametros = array();
			$parametros['id_juicios']=isset($id_juicios)?trim($id_juicios):0;
			$parametros['id_clientes']=isset($id_clientes)?trim($id_clientes):0;
			$parametros['id_titulo_credito']=isset($id_titulo_credito)?trim($id_titulo_credito):0;
			$parametros['id_rol']= $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
			$parametros['identificador_oficios']=isset($identificador_oficios)?trim($identificador_oficios):''; 
			$parametros['ruta_oficios']=$ruta_oficios;
			$parametros['nombre_archivo_oficios']=$nombre_archivo_oficios;
			
		
			$pagina="contOficios.aspx";
		
			$conexion_rpt = array();
			$conexion_rpt['pagina']=$pagina;
		
			$this->view("ReporteRpt", array(
					"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
			));
		
		
			die();
		
		
		}
		
		
	}
	
	
	public function AgregarJuicio(){
		
		session_start();
		$providencias= new ProvidenciasModel();
		$asignacion_secretarios = new AsignacionSecretariosModel();
		
		if(isset($_POST['agregar']))
		{
			
			$_cuantia_inicial=0;
		
			$_identificacion_clientes= $_POST["identificacion_clientes"];
			$_nombres_clientes= $_POST["nombres_clientes"];
			$_sexo_clientes= $_POST["sexo_clientes"];
			$_correo_clientes= $_POST["correo_clientes"];
			$_direccion_clientes= $_POST["direccion_clientes"];
			
			$_identificacion_clientes_1= $_POST["identificacion_clientes_1"];
			$_nombre_clientes_1= $_POST["nombre_clientes_1"];
			$_sexo_clientes_1= $_POST["sexo_clientes_1"];
			$_correo_clientes_1= $_POST["correo_clientes_1"];
			$_direccion_clientes_1= $_POST["direccion_clientes_1"];
			
			
			$_identificacion_clientes_2= $_POST["identificacion_clientes_2"];
			$_nombre_clientes_2= $_POST["nombre_clientes_2"];
			$_sexo_clientes_2= $_POST["sexo_clientes_2"];
			$_correo_clientes_2= $_POST["correo_clientes_2"];
			$_direccion_clientes_2= $_POST["direccion_clientes_2"];
			
			$_identificacion_clientes_3= $_POST["identificacion_clientes_3"];
			$_nombre_clientes_3= $_POST["nombre_clientes_3"];
			$_sexo_clientes_3= $_POST["sexo_clientes_3"];
			$_correo_clientes_3= $_POST["correo_clientes_3"];
			$_direccion_clientes_3= $_POST["direccion_clientes_3"];
			
		
			$_identificacion_garantes= $_POST["identificacion_garantes"];
			$_nombre_garantes= $_POST["nombre_garantes"];
			$_sexo_garantes= $_POST["sexo_garantes"];
			
			$_identificacion_garantes_1= $_POST["identificacion_garantes_1"];
			$_nombre_garantes_1= $_POST["nombre_garantes_1"];
			$_sexo_garantes_1= $_POST["sexo_garantes_1"];
			
			
			$_identificacion_garantes_2= $_POST["identificacion_garantes_2"];
			$_nombre_garantes_2= $_POST["nombre_garantes_2"];
			$_sexo_garantes_2= $_POST["sexo_garantes_2"];
			
			$_identificacion_garantes_3= $_POST["identificacion_garantes_3"];
			$_nombre_garantes_3= $_POST["nombre_garantes_3"];
			$_sexo_garantes_3= $_POST["sexo_garantes_3"];
			
			$_orden= $_POST["modal_edit_orden"];
			$_regional= $_POST["regional"];
			$_juicio_referido_titulo_credito= $_POST["juicio_referido_titulo_credito"];
			$_year_juicios= $_POST["year_juicios"];
				
				
			$_numero_titulo_credito= $_POST["numero_titulo_credito"];
			$_fecha_emision_juicios= $_POST["fecha_emision_juicios"];
			$_cuantia_inicial= $_POST["cuantia_inicial"];
			$_riesgo_actual= $_POST["riesgo_actual"];
			
		    $_id_provincias= $_POST["id_provincias"];
			$_id_estados_procesales_juicios= $_POST["id_estados_procesales_juicios"];
			$_fecha_emision_juicios= $_POST["fecha_emision_juicios"];
		    $_fecha_ultima_providencia= $_POST["fecha_ultima_providencia"];
			$_id_abogado= $_POST["id_abogado"];
			
			$_descripcion_estado_procesal= $_POST["descripcion_estado_procesal"];
			
			$_estrategia_seguir= $_POST["estrategia_seguir"];
			$_observaciones= $_POST["observaciones"];
		
			
			
			$_correo_garantes_1= $_POST["correo_garantes_1"];
			$_correo_garantes_2= $_POST["correo_garantes_2"];
			$_correo_garantes_3= $_POST["correo_garantes_3"];
			$_correo_garantes_4= $_POST["correo_garantes_4"];
			
			$_direccion_garantes_1= $_POST["direccion_garantes_1"];
			$_direccion_garantes_2= $_POST["direccion_garantes_2"];
			$_direccion_garantes_3= $_POST["direccion_garantes_3"];
			$_direccion_garantes_4= $_POST["direccion_garantes_4"];
			
			
			
			$clientes= new ClientesModel();
			$usuarios = new UsuariosModel();
			$titulo_credito= new TituloCreditoModel();
			$juicios = new JuiciosModel();
			$_id_ciudad=0;
			$_id_entidades=10;
			$_id_titulo_credito=0;
			$_id_estados_titulos_credito= $_POST["id_estados_procesales_juicios"];
			$_id_estados_auto_pago_juicios= $_POST["id_estados_procesales_juicios"];
			$_asignado_titulo_credito='true';
			
			
			
			$resultCiudad = $usuarios->getBy("id_usuarios='$_id_abogado'");
			$_id_ciudad=$resultCiudad[0]->id_ciudad;
				
			
			
			//$id=$clientes->getNuevo("clientes_id_clientes_seq");
			//print_r($id);
			//die();
			
			
			try {
				
				////////INSERTO CLIENTE
				$funcion = "ins_clientes_liventy";
				$parametros = "'$_identificacion_clientes','$_nombres_clientes','$_direccion_clientes','$_correo_clientes','$_sexo_clientes','$_identificacion_clientes_1','$_nombre_clientes_1','$_direccion_clientes_1','$_correo_clientes_1','$_sexo_clientes_1','$_identificacion_clientes_2','$_nombre_clientes_2','$_direccion_clientes_2','$_correo_clientes_2','$_sexo_clientes_2','$_identificacion_clientes_3','$_nombre_clientes_3','$_direccion_clientes_3','$_correo_clientes_3','$_sexo_clientes_3','$_identificacion_garantes','$_nombre_garantes','$_sexo_garantes','$_identificacion_garantes_1','$_nombre_garantes_1','$_sexo_garantes_1','$_identificacion_garantes_2','$_nombre_garantes_2','$_sexo_garantes_2','$_identificacion_garantes_3','$_nombre_garantes_3','$_sexo_garantes_3','$_id_ciudad','$_id_provincias','$_correo_garantes_1','$_correo_garantes_2','$_correo_garantes_3','$_correo_garantes_4','$_direccion_garantes_1','$_direccion_garantes_2', '$_direccion_garantes_3','$_direccion_garantes_4'";
				$clientes->setFuncion($funcion);
				$clientes->setParametros($parametros);
				$resultado=$clientes->Insert();
				
				
			}
			catch(Exception $e){
				
				$this->view("Error",array(
						"resultado"=>"Eror al Insertar Clientes ->". $e
				));
				exit();
	    	}
			
			$resultClientes = $clientes->getBy("identificacion_clientes='$_identificacion_clientes' AND sexo_clientes='$_sexo_clientes' AND sexo_garantes='$_sexo_garantes' AND nombres_clientes='$_nombres_clientes' AND direccion_clientes='$_direccion_clientes' AND nombre_garantes='$_nombre_garantes' AND identificacion_garantes='$_identificacion_garantes' AND id_provincias='$_id_provincias' AND id_ciudad='$_id_ciudad' 
			AND identificacion_clientes_1='$_identificacion_clientes_1'
			AND nombre_clientes_1='$_nombre_clientes_1'
			AND identificacion_clientes_2 ='$_identificacion_clientes_2'
			AND nombre_clientes_2 ='$_nombre_clientes_2'
			AND identificacion_clientes_3 ='$_identificacion_clientes_3'
			AND nombre_clientes_3  ='$_nombre_clientes_3'
			AND identificacion_garantes_1 ='$_identificacion_garantes_1'
			AND nombre_garantes_1 ='$_nombre_garantes_1'
			AND identificacion_garantes_2 ='$_identificacion_garantes_2'
			AND nombre_garantes_2 ='$_nombre_garantes_2'
			AND identificacion_garantes_3 ='$_identificacion_garantes_3'
			AND nombre_garantes_3 ='$_nombre_garantes_3'
			AND correo_clientes ='$_correo_clientes'
			AND correo_clientes_1 ='$_correo_clientes_1'
			AND correo_clientes_2 ='$_correo_clientes_2'
			AND correo_clientes_3 ='$_correo_clientes_3'
			AND direccion_clientes_1 ='$_direccion_clientes_1'
			AND direccion_clientes_2 ='$_direccion_clientes_2'
			AND direccion_clientes_3 ='$_direccion_clientes_3'
			AND sexo_clientes_1 ='$_sexo_clientes_1'
			AND sexo_clientes_2 ='$_sexo_clientes_2'
			AND sexo_clientes_3 ='$_sexo_clientes_3'
			AND sexo_garantes_1 ='$_sexo_garantes_1'
			AND sexo_garantes_2 ='$_sexo_garantes_2'
			AND sexo_garantes_3 ='$_sexo_garantes_3'
			AND  correo_garantes_1='$_correo_garantes_1'
			AND correo_garantes_2='$_correo_garantes_2'
			AND correo_garantes_3='$_correo_garantes_3'
			AND correo_garantes_4='$_correo_garantes_4'
			AND direccion_garantes_1='$_direccion_garantes_1'
			AND direccion_garantes_2='$_direccion_garantes_2'
			AND direccion_garantes_3='$_direccion_garantes_3'
			AND direccion_garantes_4='$_direccion_garantes_4'");
			
			$_id_clientes=$resultClientes[0]->id_clientes;
			$_orden= $_id_clientes;
			
			
			
		
			
			if($_id_clientes>0){
				
				
					
				if($_fecha_emision_juicios!="" && $_fecha_ultima_providencia!=""){
					
					try {
							
						//// INSERTO TITULO DE CREDITO
					
						$funcion2 = "ins_titulo_credito_liventy";
						$parametros2 = "'$_id_ciudad','$_id_entidades','$_id_abogado','$_id_estados_titulos_credito','$_fecha_emision_juicios','$_fecha_emision_juicios','$_id_clientes','$_asignado_titulo_credito','$_numero_titulo_credito','$_fecha_ultima_providencia'";
						$titulo_credito->setFuncion($funcion2);
						$titulo_credito->setParametros($parametros2);
						$resultado2=$titulo_credito->Insert();
					
							
							
					}catch(Exception $e){
					
						$this->view("Error",array(
								"resultado"=>"Eror al Insertar Titulo Credito ->". $e
						));
						exit();
					}
					
				}else{
					
					$_fecha_emision_juicios= 'null';
					$_fecha_ultima_providencia= 'null';
					
					try {
							
						//// INSERTO TITULO DE CREDITO
							
						$funcion2 = "ins_titulo_credito_liventy";
						$parametros2 = "'$_id_ciudad','$_id_entidades','$_id_abogado','$_id_estados_titulos_credito', $_fecha_emision_juicios, $_fecha_emision_juicios,'$_id_clientes','$_asignado_titulo_credito','$_numero_titulo_credito', $_fecha_ultima_providencia";
						$titulo_credito->setFuncion($funcion2);
						$titulo_credito->setParametros($parametros2);
						$resultado2=$titulo_credito->Insert();
							
							
							
					}catch(Exception $e){
							
						$this->view("Error",array(
								"resultado"=>"Eror al Insertar Titulo Credito ->". $e
						));
						exit();
					}
					
					
				}
				
				
				
				
				$resultTituloCredito = $titulo_credito->getBy("id_ciudad='$_id_ciudad' AND id_usuarios='$_id_abogado' AND id_clientes='$_id_clientes' AND numero_titulo_credito='$_numero_titulo_credito'");
				$_id_titulo_credito=$resultTituloCredito[0]->id_titulo_credito;
					
				
				
				if($_id_titulo_credito>0){
					
					$_fecha_emision_juicios= $_POST["fecha_emision_juicios"];
					$_fecha_ultima_providencia= $_POST["fecha_ultima_providencia"];
						
					
					if($_fecha_emision_juicios!="" && $_fecha_ultima_providencia!=""){
							
					try {
						
						//// INSERTO JUICIO
						
						$funcion3 = "ins_juicios_liventy";
						$parametros3 = "'$_id_entidades','$_id_ciudad','$_juicio_referido_titulo_credito','$_id_abogado','$_id_titulo_credito','$_id_clientes','$_id_estados_procesales_juicios','$_fecha_emision_juicios','$_id_estados_auto_pago_juicios','$_juicio_referido_titulo_credito','$_year_juicios','$_fecha_ultima_providencia','$_estrategia_seguir','$_observaciones','$_descripcion_estado_procesal','$_orden','$_regional','$_cuantia_inicial','$_riesgo_actual'";
						$juicios->setFuncion($funcion3);
						$juicios->setParametros($parametros3);
						$resultado3=$juicios->Insert();
							
						
						$resultJuicios = $juicios->getBy("id_ciudad='$_id_ciudad' AND id_usuarios='$_id_abogado' AND id_clientes='$_id_clientes' AND id_titulo_credito='$_id_titulo_credito'");
						$_id_juicios=$resultJuicios[0]->id_juicios;
						
						
						$historial_juicios = new HistorialJuiciosModel();
						
						$funcion = "ins_historial_juicios";
						$parametros = " '$_id_juicios', '$_id_estados_procesales_juicios', '$_fecha_ultima_providencia'";
						$historial_juicios->setFuncion($funcion);
						$historial_juicios->setParametros($parametros);
						$resultado=$historial_juicios->Insert();
						
						
						$traza=new TrazasModel();
						$_nombre_controlador = "MATRIZ JUICIOS";
						$_accion_trazas  = "INSERTO NUEVO JUICIO";
						$_parametros_trazas = $_id_juicios;
						$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
						
						
					}catch(Exception $e){
							
						$this->view("Error",array(
								"resultado"=>"Eror al Insertar Juicio ->". $e
						));
						exit();
					}
					
				}else{
					
					$_fecha_emision_juicios='null';
					$_fecha_ultima_providencia='null';
					
					
					try {
					
						//// INSERTO JUICIO
					
						$funcion3 = "ins_juicios_liventy";
						$parametros3 = "'$_id_entidades','$_id_ciudad','$_juicio_referido_titulo_credito','$_id_abogado','$_id_titulo_credito','$_id_clientes','$_id_estados_procesales_juicios', $_fecha_emision_juicios,'$_id_estados_auto_pago_juicios','$_juicio_referido_titulo_credito','$_year_juicios',$_fecha_ultima_providencia,'$_estrategia_seguir','$_observaciones','$_descripcion_estado_procesal','$_orden','$_regional','$_cuantia_inicial','$_riesgo_actual'";
						$juicios->setFuncion($funcion3);
						$juicios->setParametros($parametros3);
						$resultado3=$juicios->Insert();
						
						
						$resultJuicios = $juicios->getBy("id_ciudad='$_id_ciudad' AND id_usuarios='$_id_abogado' AND id_clientes='$_id_clientes' AND id_titulo_credito='$_id_titulo_credito'");
						$_id_juicios=$resultJuicios[0]->id_juicios;
						
						
						$historial_juicios = new HistorialJuiciosModel();
						
						$funcion = "ins_historial_juicios_dos";
						$parametros = " '$_id_juicios', '$_id_estados_procesales_juicios'";
						$historial_juicios->setFuncion($funcion);
						$historial_juicios->setParametros($parametros);
						$resultado=$historial_juicios->Insert();
						
						
						$traza=new TrazasModel();
						$_nombre_controlador = "MATRIZ JUICIOS";
						$_accion_trazas  = "INSERTO NUEVO JUICIO";
						$_parametros_trazas = $_id_juicios;
						$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
							
					}catch(Exception $e){
							
						$this->view("Error",array(
								"resultado"=>"Eror al Insertar Juicio ->". $e
						));
						exit();
					}
					
				}
				
				
				}
				
			}
			
			
			
			
			
		}
		
		$this->redirect("MatrizJuicios", "index3");
		
	}
	
	
	
	public function Imprimir_ProvidenciaLevantamiento()
	{
		session_start();
		$providencias= new ProvidenciasModel();
		$asignacion_secretarios = new AsignacionSecretariosModel();
		$juicios = new JuiciosModel();
		
		
		if(isset($_POST['generar']))
		{
	
	
			$id_juicios= $_POST['id_juicios'];
			$id_clientes= $_POST['id_clientes'];
			$id_titulo_credito= $_POST['id_titulo_credito'];
			$fecha_avoco= $_POST['fecha_levantamiento'];
			$hora_avoco= $_POST['hora_levantamiento'];
			$razon_avoco= $_POST['razon_levantamiento'];
			$numero_oficio= $_POST['numero_oficio'];
			$numero_oficio1= $_POST['numero_oficio1'];
			$numero_oficio2= $_POST['numero_oficio2'];
			$numero_oficio3= $_POST['numero_oficio3'];
			$dirigido_levantamiento= $_POST['dirigido_levantamiento'];
			
			$nombre_usuario_saliente= $_POST['nombre_usuario_saliente'];
			
			
			$id_estados_procesales_juicios = $_POST['id_estados_procesales_juicios'];
			
			
			
			
			$id_tipo_providencias=2;
			$consecutivo= new ConsecutivosModel();
			$resultConsecutivo= $consecutivo->getBy("documento_consecutivos='PROVIDENCIAS_LEVANTAMIENTO'");
			$identificador_providencias=$resultConsecutivo[0]->real_consecutivos;
			$ruta_providencias="Providencias_Levantamiento";
				
			$nombre_archivo_providencias=$ruta_providencias.$identificador_providencias;
			
			$id_impulsor=$_SESSION['id_usuarios'];
			$resultSecre = $asignacion_secretarios->getBy("id_abogado_asignacion_secretarios ='$id_impulsor'");
			$id_secretario=$resultSecre[0]->id_secretario_asignacion_secretarios;
			
				
			
				
				
			$funcion = "ins_providencias_levantamiento";
			$parametros = "'$id_tipo_providencias','$identificador_providencias', '$nombre_archivo_providencias','$ruta_providencias', '$fecha_avoco', '$hora_avoco', '$razon_avoco', '$id_juicios', '$id_clientes', '$id_titulo_credito', '$numero_oficio', '$numero_oficio1', '$numero_oficio2', '$numero_oficio3', '$dirigido_levantamiento', '$id_impulsor', '$id_secretario'";
			$providencias->setFuncion($funcion);
			$providencias->setParametros($parametros);
			$resultado=$providencias->Insert();
				
			$consecutivo->UpdateBy("real_consecutivos=real_consecutivos+1", "consecutivos", "documento_consecutivos='PROVIDENCIAS_LEVANTAMIENTO'");
				
			if($id_estados_procesales_juicios>0){
			
				$juicios->UpdateBy("id_estados_procesales_juicios='$id_estados_procesales_juicios'", "juicios", "id_juicios='$id_juicios'");
					
				$historial_juicios= new HistorialJuiciosModel();
				
				$funcion = "ins_historial_juicios";
				$parametros = " '$id_juicios', '$id_estados_procesales_juicios', '$fecha_avoco'";
				$historial_juicios->setFuncion($funcion);
				$historial_juicios->setParametros($parametros);
				$resultado=$historial_juicios->Insert();
			}
			
			$juicios->UpdateBy("fecha_ultima_providencia='$fecha_avoco'", "juicios", "id_juicios='$id_juicios'");
			
			
			$traza=new TrazasModel();
			$_nombre_controlador = "MATRIZ JUICIOS";
			$_accion_trazas  = "Genero Providencia de Levantamiento";
			$_parametros_trazas = $id_juicios;
			$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
			
			
	
			$parametros = array();
	
			$parametros['id_juicios']=isset($id_juicios)?trim($id_juicios):0;
			$parametros['id_clientes']=isset($id_clientes)?trim($id_clientes):0;
			$parametros['id_titulo_credito']=isset($id_titulo_credito)?trim($id_titulo_credito):0;
			$parametros['id_rol']= $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
			$parametros['fecha_levantamiento']=isset($fecha_avoco)?trim($fecha_avoco):0;
			$parametros['hora_levantamiento']=isset($hora_avoco)?trim($hora_avoco):0;
			$parametros['razon_levantamiento']=isset($razon_avoco)?trim($razon_avoco):0;
			$parametros['numero_oficio']=isset($numero_oficio)?trim($numero_oficio):0;
			$parametros['numero_oficio1']=isset($numero_oficio1)?trim($numero_oficio1):'';
			$parametros['numero_oficio2']=isset($numero_oficio2)?trim($numero_oficio2):'';
			$parametros['numero_oficio3']=isset($numero_oficio3)?trim($numero_oficio3):'';
			$parametros['nombre_usuario_saliente']=isset($nombre_usuario_saliente)?trim($nombre_usuario_saliente):'';
			
			$parametros['dirigido_levantamiento']=isset($dirigido_levantamiento)?trim($dirigido_levantamiento):'';
			$parametros['ruta_providencias']=$ruta_providencias;
			$parametros['nombre_archivo_providencias']=$nombre_archivo_providencias;
			$pagina="contProvidenciaLevantamiento.aspx";
	
			$conexion_rpt = array();
			$conexion_rpt['pagina']=$pagina;
	
			$this->view("ReporteRpt", array(
					"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
			));
	
	
			die();
	
	
		}
		
	}
	
	//---------------Para la providencia de levantamineto-----//
	//---------------D.N--------------------------------------//

	public function verProvidenciaLevantamiento()
	{
		session_start();
		
		$juicios = new JuiciosModel();
		
		if(isset($_POST['visualizar'])  )
		{
			
			$columnas="j.id_juicios, j.juicio_referido_titulo_credito, c.identificacion_clientes,c.nombres_clientes,
					  c.identificacion_garantes, c.nombre_garantes, p.nombre_provincias, t.numero_titulo_credito, 
					  j.fecha_emision_juicios, j.cuantia_inicial, j.fecha_ultima_providencia, vs.id_abogado, 
                      vs.impulsores, vs.id_secretario, vs.secretarios, ci.id_ciudad, ci.nombre_ciudad ,
                      j.numero_juicios, vs.cargo_secretarios,vs.cargo_impulsores, vs.sexo_secretarios, 
                      vs.sexo_impulsores , c.identificacion_clientes_1, c.nombre_clientes_1, c.identificacion_clientes_2,
					  nombre_clientes_2, identificacion_clientes_3, c.nombre_clientes_3, identificacion_garantes_1, 
                      nombre_garantes_1, c.identificacion_garantes_2, nombre_garantes_2,identificacion_garantes_3, 
					  c.nombre_garantes_3, correo_clientes, correo_clientes_1, correo_clientes_2, c.correo_clientes_3, 
					  c.direccion_clientes_1, c.direccion_clientes_2, c.direccion_clientes_3, c.cantidad_clientes, 
                      c.cantidad_garantes,c.sexo_clientes, c.sexo_clientes_1,c.sexo_clientes_3,c.sexo_clientes_2,c.sexo_garantes, 
					  c.sexo_garantes_1,c.sexo_garantes_2,c.sexo_garantes_3";
			
			$tablas=" public.clientes c
					INNER JOIN public.titulo_credito t
					ON c.id_clientes = t.id_clientes
					INNER JOIN public.juicios j 
					ON t.id_titulo_credito = j.id_titulo_credito
					INNER JOIN public.asignacion_secretarios_view vs
					ON vs.id_abogado = t.id_usuarios 
					INNER JOIN public.estados_procesales_juicios ep
					ON j.id_estados_procesales_juicios = ep.id_estados_procesales_juicios
					INNER JOIN  public.provincias p
					ON c.id_provincias = p.id_provincias
					INNER JOIN public.ciudad ci
					ON t.id_ciudad = ci.id_ciudad";
			
			$where = "1=1";
			
			
			
			$id_juicios= isset($_POST['id_juicios'])?$_POST['id_juicios']:0;
			
			$id_clientes= isset($_POST['id_clientes'])?$_POST['id_clientes']:0;
			$id_titulo_credito= isset($_POST['id_titulo_credito'])?$_POST['id_titulo_credito']:0;
			$fecha_avoco= isset($_POST['fecha_levantamiento'])?$_POST['fecha_levantamiento']:0;
			$hora_avoco= isset($_POST['hora_levantamiento'])?$_POST['hora_levantamiento']:0;
			$razon_avoco= isset($_POST['razon_levantamiento'])?$_POST['razon_levantamiento']:"";
			$numero_oficio= isset($_POST['numero_oficio'])?$_POST['numero_oficio']:0;
			$dirigido_levantamiento= isset($_POST['dirigido_levantamiento'])?$_POST['dirigido_levantamiento']:0;
			
			$where.=$id_juicios!=0?" AND j.id_juicios='$id_juicios' ":"";
			
			//echo " ".$columnas."\r".$tablas."\t".$where;
			
			$dtdatos=$juicios->getCondiciones($columnas, $tablas, $where, "j.id_juicios");
			
			//para los parametros
			$fecha=""; $hora=""; $dirigidos="";$coactivadopri=""; $coactivados=""; $garantespri=""; $garantes="";
			
			$fecha=$fecha_avoco==0?date('d-m-Y'):$fecha_avoco;
			$hora=$hora_avoco==0?date('H:i:s'):"";
			$dirigidos=$dirigido_levantamiento==0?"":$dirigido_levantamiento;
			
			//condiciones para llenar los coactivados y garantes
			if(!empty($dtdatos))
			{
				if($dtdatos[0]->cantidad_clientes>0)
				{
					if($dtdatos[0]->sexo_clientes=='F')
					{
						$coactivadopri=" de la Coactivada <b>".$dtdatos[0]->nombres_clientes." </b>";
						$coactivados=$coactivadopri;
					}else{
						
						$coactivadopri=" del Coactivado <b>".$dtdatos[0]->nombres_clientes." </b>";
						$coactivados=$coactivadopri;
					}
				}
				
				switch ($dtdatos[0]->cantidad_clientes)
				{
					case 2:
						$coactivados=" de los coactivados ".$dtdatos[0]->nombres_clientes." ";
					break;
				}
			}
			
			
			//creacion del diccionario de datos
			$dicContenido = array(
					'COACTIVADOPRI'=>$coactivadopri,
					'GARANTEPRI'=>$garantespri,
					'CIUDAD'=>$dtdatos[0]->nombre_ciudad,
					'FECHA'=>$fecha,
					'HORA'=>$hora,
					'OPERACION'=>$dtdatos[0]->numero_titulo_credito,
					'NOMBRESEC'=>$dtdatos[0]->secretarios,
					'CARGOSEC'=>$dtdatos[0]->cargo_secretarios,
					'NOMBREABG'=>$dtdatos[0]->impulsores,
					'CARGOABG'=>$dtdatos[0]->cargo_impulsores,
					'NOMBRECIT'=>'',
					'CARGOCIT'=>'',
					'RAZON2'=>$razon_avoco,
					'COACTIVADOS'=>$coactivados,
					'GARANTES'=>$garantes,
					'DIRIGIDOS'=>$dirigidos,
					'NOTIFICADOR'=>""
			
			);
				
			
			
			//echo 'llego'; die();
			$this->verReporte('PLevantamiento',array('dicContenido'=>$dicContenido,'dtdatos'=>$dtdatos,'razon_avoco'=>$razon_avoco));
			
			//include_once 'view/reportes/PLevantamientoRpt.php';
		}
		
		//echo 'hola';
		
	}
	
	
	
	
	
	
	
	
	public function index5()
	{


		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
		
			$id_rol= $_SESSION['id_rol'];
		
			if ($id_rol==3){
		
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
		
				$tablas   = "public.usuarios,
                     public.ciudad";
		
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
		
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
						
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
		
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
						
						
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
						
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
							  clientes.correo_garantes_2, 
							  clientes.correo_garantes_3, 
							  clientes.correo_garantes_4, 
							  clientes.direccion_garantes_1, 
							  clientes.direccion_garantes_2, 
							  clientes.direccion_garantes_3, 
							  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios'";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
		
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
		
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
		
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
		
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
						
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
						
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
						
						
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
		
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
		
							
						//comienza paginacion
		
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
		
						if($action == 'ajax')
						{
		
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
		
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
		
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
		
		
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
		
							$count_query   = $cantidadResult;
		
							$total_pages = ceil($cantidadResult/$per_page);
		
							if ($cantidadResult>0)
							{
		
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
		
									
		
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
		
									$html.='<tr>';
									$html.='<td style="font-size: 15px;"><span class="pull-right"><a href="index.php?controller=MatrizJuicios&action=Imprimir_Oficios_Datos&id_juicios='. $res->id_juicios .'&id_clientes='. $res->id_clientes.'&id_titulo_credito='. $res->id_titulo_credito.'&juicio_referido_titulo_credito='. $res->juicio_referido_titulo_credito.'&numero_titulo_credito='. $res->numero_titulo_credito.'&nombres_clientes='. $res->nombres_clientes.'&identificacion_clientes='. $res->identificacion_clientes.'&nombre_garantes='. $res->nombre_garantes.'&identificacion_garantes='. $res->identificacion_garantes.'&nombre_garantes_1='. $res->nombre_garantes_1.'&identificacion_garantes_1='. $res->identificacion_garantes_1.'" target="_blank"><i class="glyphicon glyphicon-print"></i></a></span></td>';
										
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><a href="javascript:null()" id="'.$res->id_juicios.'?/&'.$i.'?/&'.$res->regional.'?/&'.$res->juicio_referido_titulo_credito.'?/&'.$res->year_juicios.'?/&'.$res->identificacion_clientes.'?/&'.$res->nombres_clientes.'?/&'.$res->nombre_garantes.'?/&'.$res->identificacion_garantes.'?/&'.$res->nombre_provincias.'?/&'.$res->numero_titulo_credito.'?/&'.$res->fecha_emision_juicios.'?/&'.$res->cuantia_inicial.'?/&'.$res->riesgo_actual.'?/&'.$res->nombre_estados_procesales_juicios.'?/&'.$res->descripcion_estado_procesal.'?/&'.$res->fecha_ultima_providencia.'?/&'.$res->estrategia_seguir.'?/&'.$res->observaciones.'?/&'.$res->impulsores.'?/&'.$res->secretarios.'?/&'.$res->id_provincias.'?/&'.$res->id_estados_procesales_juicios.'?/&'.$res->id_clientes.'?/&'.$res->id_titulo_credito.'?/&'.$res->identificacion_clientes_1.'?/&'.$res->nombre_clientes_1.'?/&'.$res->identificacion_clientes_2.'?/&'.$res->nombre_clientes_2.'?/&'.$res->identificacion_clientes_3.'?/&'.$res->nombre_clientes_3.'?/&'.$res->identificacion_garantes_1.'?/&'.$res->nombre_garantes_1.'?/&'.$res->identificacion_garantes_2.'?/&'.$res->nombre_garantes_2.'?/&'.$res->identificacion_garantes_3.'?/&'.$res->nombre_garantes_3.'?/&'.$res->correo_clientes.'?/&'.$res->correo_clientes_1.'?/&'.$res->correo_clientes_2.'?/&'.$res->correo_clientes_3.'?/&'.$res->direccion_clientes.'?/&'.$res->direccion_clientes_1.'?/&'.$res->direccion_clientes_2.'?/&'.$res->direccion_clientes_3.'"  onclick="editar_matriz(this)" ><i class="glyphicon glyphicon-edit"></i></a></td>';
									$html.='</tr>';
		
								}
		
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
		
							echo $html;
							die();
		
						}
		
							
						
		
						
							
							
					}
		
					$this->view("MatrizJuiciosOficios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv
		
		
		
					));
		
		
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
		
					));
		
					exit();
				}
					
			}
		
		
		
		
		
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
		
		}
			
			
		
		
	}
	
	
	
	
	
	
	public function index6()
	{
	
	
		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$id_rol= $_SESSION['id_rol'];
	
			if ($id_rol==3){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
	
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
	
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
	
	
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
	
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad,
								public.historial_juicios";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_abogado='$_id_usuarios' AND juicios.id_juicios= historial_juicios.id_juicios";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
	
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
	
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
	
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
	
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
	
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
	
	
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
	
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
							
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
	
									
	
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
	
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									//$html.='<td style="font-size: 15px;"><a href="javascript:null()" id="'.$res->id_juicios.'?/&'.$i.'?/&'.$res->regional.'?/&'.$res->juicio_referido_titulo_credito.'?/&'.$res->year_juicios.'?/&'.$res->identificacion_clientes.'?/&'.$res->nombres_clientes.'?/&'.$res->nombre_garantes.'?/&'.$res->identificacion_garantes.'?/&'.$res->nombre_provincias.'?/&'.$res->numero_titulo_credito.'?/&'.$res->fecha_emision_juicios.'?/&'.$res->cuantia_inicial.'?/&'.$res->riesgo_actual.'?/&'.$res->nombre_estados_procesales_juicios.'?/&'.$res->descripcion_estado_procesal.'?/&'.$res->fecha_ultima_providencia.'?/&'.$res->estrategia_seguir.'?/&'.$res->observaciones.'?/&'.$res->impulsores.'?/&'.$res->secretarios.'?/&'.$res->id_provincias.'?/&'.$res->id_estados_procesales_juicios.'?/&'.$res->id_clientes.'?/&'.$res->id_titulo_credito.'?/&'.$res->identificacion_clientes_1.'?/&'.$res->nombre_clientes_1.'?/&'.$res->identificacion_clientes_2.'?/&'.$res->nombre_clientes_2.'?/&'.$res->identificacion_clientes_3.'?/&'.$res->nombre_clientes_3.'?/&'.$res->identificacion_garantes_1.'?/&'.$res->nombre_garantes_1.'?/&'.$res->identificacion_garantes_2.'?/&'.$res->nombre_garantes_2.'?/&'.$res->identificacion_garantes_3.'?/&'.$res->nombre_garantes_3.'?/&'.$res->correo_clientes.'?/&'.$res->correo_clientes_1.'?/&'.$res->correo_clientes_2.'?/&'.$res->correo_clientes_3.'?/&'.$res->direccion_clientes.'?/&'.$res->direccion_clientes_1.'?/&'.$res->direccion_clientes_2.'?/&'.$res->direccion_clientes_3.'"  onclick="editar_matriz(this)" ><i class="glyphicon glyphicon-edit"></i></a></td>';
									$html.='</tr>';
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt_historial"]))
						{
						
						
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							$parametros['fecha_providencias']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_providencias']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
						
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
								
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
								
							$pagina="contHistorialJuicios.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
						
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
						
							die();
						
						}
						
	
	
							
							
					}
	
					$this->view("MatrizHistorialJuicios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
					
			}
	
	
			
			
			if($id_rol==5){
				


				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
				
				$tablas   = "public.usuarios,
                     public.ciudad";
				
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
				
				$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
					
				$tablas   = "public.asignacion_secretarios_view";
					
				$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
					
				$id       = "asignacion_secretarios_view.id_abogado";
				$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
				
				
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuiciosSecretarios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
				
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
				
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						$id_abogado=$_POST['id_abogado'];
				
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
				
				
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
				
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
								clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
							  clientes.correo_garantes_2, 
							  clientes.correo_garantes_3, 
							  clientes.correo_garantes_4, 
							  clientes.direccion_garantes_1, 
							  clientes.direccion_garantes_2, 
							  clientes.direccion_garantes_3, 
							  clientes.direccion_garantes_4";
							
							
							
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad,
								public.historial_juicios";
							
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
						juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_secretario='$_id_usuarios'
						AND juicios.id_juicios=historial_juicios.id_juicios";
							
						$id="juicios.orden";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						$where_6 = "";
				
						$where_13 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
				
				
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
				
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
				
						if($id_abogado!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
								
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
				
						if($identificacion_clientes_1!=""){$where_13=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
				
				
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
				
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5.$where_6 . $where_13 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
				
						//echo $where_to ; die();
						//comienza paginacion
				
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
				
						if($action == 'ajax')
						{
				
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
				
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
				
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
				
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
				
				
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
				
							$count_query   = $cantidadResult;
				
							$total_pages = ceil($cantidadResult/$per_page);
				
							if ($cantidadResult>0)
							{
				
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Correo Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Dirección Cliente 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 1</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 2</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 3</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante 4</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='<th style="text-align: left;  font-size: 10px;"></th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
				
									
				
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
										
				
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->correo_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->direccion_clientes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_1.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_2.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes_3.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									$html.='</tr>';
				
				
				
								}
				
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
				
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
				
							echo $html;
							die();
				
						}
				
							
						if(isset($_POST["reporte_rpt_historial"]))
						{
				
								
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							$parametros['fecha_providencias']=(isset($_POST['fecha_providencias']))?trim($_POST['fecha_providencias']):0;
							$parametros['hora_providencias']=(isset($_POST['hora_providencias']))?trim($_POST['hora_providencias']):0;
								
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
								
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
				
							$pagina="contHistorialJuicios.aspx";
				
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
				
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
				
							die();
				
						}
				
						
							
							
					}
				
					$this->view("MatrizHistorialJuiciosSecretarios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul
				
				
				
					));
				
				
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
				
					));
				
					exit();
				}
					
				
				
				
			}
	
	
			
			
			
			
			
			
			if($id_rol==23){
				
				



				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
				
				$juicios = new JuiciosModel();
				
				$ciudad = new CiudadModel();
				$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
				
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuiciosCordinador";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
				if (!empty($resultPer))
				{
				
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
				
						$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
						$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
						$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
						$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
						$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
						$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
						
						$id_estados_procesales_juicios=(isset($_POST['id_estados_procesales_juicios']))?$_POST['id_estados_procesales_juicios']:0;
							
							
							
						$columnas = " juicios.id_juicios,
								  juicios.orden,
								  juicios.regional,
								  juicios.juicio_referido_titulo_credito,
								  juicios.year_juicios,
								  clientes.id_clientes,
								  clientes.identificacion_clientes,
								  clientes.nombres_clientes,
								  clientes.nombre_garantes,
								  clientes.identificacion_garantes,
								clientes.identificacion_clientes_1,
								clientes.nombre_clientes_1,
								clientes.identificacion_clientes_2,
								clientes.nombre_clientes_2,
								clientes.identificacion_clientes_3,
								clientes.nombre_clientes_3,
								clientes.identificacion_garantes_1,
								clientes.nombre_garantes_1,
								clientes.identificacion_garantes_2,
								clientes.nombre_garantes_2,
								clientes.identificacion_garantes_3,
								clientes.nombre_garantes_3,
								clientes.correo_clientes,
								clientes.correo_clientes_1,
								clientes.correo_clientes_2,
								clientes.correo_clientes_3,
								clientes.direccion_clientes,
								clientes.direccion_clientes_1,
								clientes.direccion_clientes_2,
								clientes.direccion_clientes_3,
									clientes.cantidad_clientes,
								  clientes.cantidad_garantes,
								  clientes.sexo_clientes,
								  clientes.sexo_clientes_1,
								  clientes.sexo_clientes_2,
								  clientes.sexo_clientes_3,
								  clientes.sexo_garantes,
								  clientes.sexo_garantes_1,
								  clientes.sexo_garantes_2,
								  clientes.sexo_garantes_3,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  titulo_credito.id_titulo_credito,
								  titulo_credito.numero_titulo_credito,
								  juicios.fecha_emision_juicios,
								  juicios.cuantia_inicial,
								  juicios.riesgo_actual,
								  estados_procesales_juicios.id_estados_procesales_juicios,
								  estados_procesales_juicios.nombre_estados_procesales_juicios,
								  juicios.descripcion_estado_procesal,
								  juicios.fecha_ultima_providencia,
								  juicios.estrategia_seguir,
								  juicios.observaciones,
								  asignacion_secretarios_view.id_abogado,
								  asignacion_secretarios_view.impulsores,
								  asignacion_secretarios_view.id_secretario,
								  asignacion_secretarios_view.secretarios,
								  ciudad.id_ciudad,
								  ciudad.nombre_ciudad,
								clientes.correo_garantes_1, 
								  clientes.correo_garantes_2, 
								  clientes.correo_garantes_3, 
								  clientes.correo_garantes_4, 
								  clientes.direccion_garantes_1, 
								  clientes.direccion_garantes_2, 
								  clientes.direccion_garantes_3, 
								  clientes.direccion_garantes_4";
				
				
				
						$tablas=" public.clientes,
							  public.titulo_credito,
							  public.juicios,
							  public.asignacion_secretarios_view,
							  public.estados_procesales_juicios,
							  public.provincias,
							  public.ciudad,
								public.historial_juicios";
				
						$where="clientes.id_clientes = titulo_credito.id_clientes AND
							clientes.id_provincias = provincias.id_provincias AND
							titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
							asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND
							juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND
							asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND juicios.id_juicios=historial_juicios.id_juicios";
				
						$id="juicios.id_juicios";
				
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						$where_6 = "";
						$where_7 = "";
						$where_8= "";
				
				
				
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				
						if($id_ciudad!=0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
				
						if($id_secretario!=0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
							
						if($id_impulsor!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
							
							
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
								
							if($fechaDesde != "" && $fechaHasta == ""){
				
								$fechaHasta='2018/12/01';
								$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
				
							}
							if($fechaDesde == "" && $fechaHasta != ""){
				
								$fechaDesde='1800/01/01';
								$where_7 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
				
							}
						}
							
						if($id_estados_procesales_juicios!=0){$where_8=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
							
							
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5 . $where_6.$where_7. $where_8;
				
				
						//comienza paginacion
				
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
				
						if($action == 'ajax')
						{
				
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
				
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
				
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
				
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
				
				
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
				
							$count_query   = $cantidadResult;
				
							$total_pages = ceil($cantidadResult/$per_page);
				
							if ($cantidadResult>0)
							{
				
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
								$html.='<th style="text-align: left;  font-size: 10px;">Ord.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Regional</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Año Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cedula Coactivado</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Coactivado</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombres Garante</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Auto Pago</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Riesgo Actual</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Estrategia a Seguir</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Observaciones</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
				
				
				
								$i=0;
				
								foreach ($resultSet as $res)
								{
				
									$i++;
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->regional.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->year_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_garantes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_emision_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->riesgo_actual.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->estrategia_seguir.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->observaciones.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									$html.='</tr>';
				
				
				
								}
				
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section> </div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
								
				
				
							}else{
				
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
				
							}
				
							echo $html;
							die();
				
						}
				
				
						if(isset($_POST["reporte_rpt_historial"]))
						{
				
				
							$parametros = array();
							$parametros['id_ciudad']=isset($_POST['id_ciudad'])?trim($_POST['id_ciudad']):0;
							$parametros['id_secretario']=isset($_POST['id_secretario'])?trim($_POST['id_secretario']):0;
							$parametros['id_abogado']=isset($_POST['id_impulsor'])?trim($_POST['id_impulsor']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
								
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
				
								if($fechaDesde != "" && $fechaHasta == ""){
										
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
										
								}
								if($fechaDesde == "" && $fechaHasta != ""){
										
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
				
				
							$pagina="contHistorialJuicios.aspx";
				
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
				
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
				
							die();
				
						}
				
				
					}
				
					$this->view("MatrizHistorialJuiciosCordinador",array(
							"resultSet"=>$resultSet, "resultDatos"=>$resultDatos, "resultEstadoProcesal"=>$resultEstadoProcesal
				
				
				
					));
				
				
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
				
					));
				
					exit();
				}
				
				
				
			}
			
			
			
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
	
			));
	
		}
			
			
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function index7()
	{
	
	
		session_start();
			
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
	
			$id_rol= $_SESSION['id_rol'];
	
			if ($id_rol==3){
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
					
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuicios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
	
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
	
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
	
	
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
	
						$columnas = " titulo_credito.numero_titulo_credito, 
									  clientes.nombres_clientes, 
									  provincias.nombre_provincias, 
									  juicios_restructuracion.fecha_providencia_restructuracion, 
									  asignacion_secretarios_view.secretarios, 
									  asignacion_secretarios_view.impulsores, 
									  tipo_restructuracion.nombre_tipo_restructuracion, 
									  juicios.juicio_referido_titulo_credito, 
									  juicios_restructuracion.levantamiento_medida, 
									  juicios_restructuracion.archivado_restructuracion";
							
							
							
						$tablas=" public.titulo_credito, 
								  public.juicios, 
								  public.clientes, 
								  public.juicios_restructuracion, 
								  public.provincias, 
								  public.asignacion_secretarios_view, 
								  public.tipo_restructuracion,
								  public.estados_procesales_juicios";
							
						$where="juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
							  clientes.id_clientes = titulo_credito.id_clientes AND
							  juicios_restructuracion.id_juicios = juicios.id_juicios AND
							  provincias.id_provincias = clientes.id_provincias AND
							  asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND
							  tipo_restructuracion.id_tipo_restructuracion = juicios_restructuracion.id_tipo_restructuracion AND asignacion_secretarios_view.id_abogado='$_id_usuarios'";
														
						$id="titulo_credito.numero_titulo_credito";
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
	
						$where_6 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
	
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
	
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_5 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
	
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_5 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_5 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
	
						if($identificacion_clientes_1!=""){$where_6=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
	
	
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
	
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4.$where_5. $where_6 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
							
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
									
								$html.='<th style="text-align: left;  font-size: 10px;"># Orden</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombre Cliente</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Tipo</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Levantamiento Medida</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Proceso Archivado</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
	
									
	
								$i=0;
									
								foreach ($resultSet as $res)
								{
									
									$levantamiento="";
									$proceso="";
									
										
									if ($res->levantamiento_medida =="t"){ $levantamiento="Si";}else{$levantamiento="No";};
									if ($res->archivado_restructuracion == "t"){ $proceso= "Si";}else{$proceso= "No";};
									
									
									
									$i++;
	
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_providencia_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_tipo_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$levantamiento.'</td>';
									$html.='<td style="font-size: 9px;">'.$proceso.'</td>';
									$html.='</tr>';
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
								
	
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt_restructuración"]))
						{
	
	
							$parametros = array();
							$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
	
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
	
								}
								if($fechaDesde == "" && $fechaHasta != ""){
	
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
	
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
	
							$pagina="contMatrizRestructuracion.aspx";
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
	
	
	
							
							
					}
	
					$this->view("MatrizRestructuracionJuicios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
					
			}
	
	
				
				
			if($id_rol==5){
	
	
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
					
				$juicios = new JuiciosModel();
					
				$ciudad = new CiudadModel();
				$columnas = " usuarios.id_ciudad,
					  ciudad.nombre_ciudad,
					  usuarios.nombre_usuarios";
	
				$tablas   = "public.usuarios,
                     public.ciudad";
	
				$where    = "ciudad.id_ciudad = usuarios.id_ciudad AND usuarios.id_usuarios = '$_id_usuarios'";
				$id       = "usuarios.id_ciudad";
				$resultDatos=$ciudad->getCondiciones($columnas ,$tablas ,$where, $id);
	
				$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
					
				$tablas   = "public.asignacion_secretarios_view";
					
				$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
					
				$id       = "asignacion_secretarios_view.id_abogado";
				$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
	
	
				$provincias = new ProvinciasModel();
				$resultProv =$provincias->getAll("nombre_provincias");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
					
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuiciosSecretarios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
					
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
							
						$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
						$numero_titulo_credito=$_POST['numero_titulo_credito'];
	
						$id_provincias=$_POST['id_provincias'];
						$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
						$id_abogado=$_POST['id_abogado'];
	
						$identificacion_clientes=$_POST['identificacion_clientes'];
						$identificacion_clientes_1=$_POST['identificacion_clientes_1'];
						$identificacion_clientes_2=$_POST['identificacion_clientes_2'];
						$identificacion_clientes_3=$_POST['identificacion_clientes_3'];
	
	
						$identificacion_garantes=$_POST['identificacion_garantes'];
						$identificacion_garantes_1=$_POST['identificacion_garantes_1'];
						$identificacion_garantes_2=$_POST['identificacion_garantes_2'];
						$identificacion_garantes_3=$_POST['identificacion_garantes_3'];
	
						$columnas = " titulo_credito.numero_titulo_credito,
									  clientes.nombres_clientes,
									  provincias.nombre_provincias,
									  juicios_restructuracion.fecha_providencia_restructuracion,
									  asignacion_secretarios_view.secretarios,
									  asignacion_secretarios_view.impulsores,
									  tipo_restructuracion.nombre_tipo_restructuracion,
									  juicios.juicio_referido_titulo_credito,
									  juicios_restructuracion.levantamiento_medida,
									  juicios_restructuracion.archivado_restructuracion";
							
							
							
						$tablas=" public.titulo_credito,
								  public.juicios,
								  public.clientes,
								  public.juicios_restructuracion,
								  public.provincias,
								  public.asignacion_secretarios_view,
								  public.tipo_restructuracion,
								  public.estados_procesales_juicios";
							
						$where="juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						clientes.id_clientes = titulo_credito.id_clientes AND
						juicios_restructuracion.id_juicios = juicios.id_juicios AND
						provincias.id_provincias = clientes.id_provincias AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND
						tipo_restructuracion.id_tipo_restructuracion = juicios_restructuracion.id_tipo_restructuracion AND asignacion_secretarios_view.id_secretario='$_id_usuarios'";
						
						$id="titulo_credito.numero_titulo_credito";
						
						
							
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						$where_6 = "";
	
						$where_13 = "";
						$where_7 = "";
						$where_8 = "";
						$where_9 = "";
						$where_10 = "";
						$where_11 = "";
						$where_12 = "";
	
	
							
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
							
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes like '$identificacion_clientes'";}
							
						if($id_provincias!=0){$where_3=" AND provincias.id_provincias='$id_provincias'";}
	
						if($id_estados_procesales_juicios!=0){$where_4=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
	
						if($id_abogado!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
	
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_6 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
	
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_6 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_6 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
	
						if($identificacion_clientes_1!=""){$where_13=" AND clientes.identificacion_clientes_1 like'$identificacion_clientes_1'";}
						if($identificacion_clientes_2!=""){$where_7=" AND clientes.identificacion_clientes_2 like '$identificacion_clientes_2'";}
						if($identificacion_clientes_3!=""){$where_8=" AND clientes.identificacion_clientes_3 like '$identificacion_clientes_3'";}
	
	
						if($identificacion_garantes!=""){$where_9=" AND clientes.identificacion_garantes like '$identificacion_garantes'";}
						if($identificacion_garantes_1!=""){$where_10=" AND clientes.identificacion_garantes_1 like '$identificacion_garantes_1'";}
						if($identificacion_garantes_2!=""){$where_11=" AND clientes.identificacion_garantes_2 like '$identificacion_garantes_2'";}
						if($identificacion_garantes_3!=""){$where_12=" AND clientes.identificacion_garantes_3 like '$identificacion_garantes_3'";}
							
	
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5.$where_6 . $where_13 . $where_7 . $where_8 . $where_9.$where_10. $where_11.$where_12;
	
						//echo $where_to ; die();
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
									
								$html.='<th style="text-align: left;  font-size: 10px;"># Orden</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombre Cliente</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Tipo</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Levantamiento Medida</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Proceso Archivado</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
									
	
								$i=0;
									
								foreach ($resultSet as $res)
								{
									
									$levantamiento="";
									$proceso="";
										
									
									if ($res->levantamiento_medida =="t"){ $levantamiento="Si";}else{$levantamiento="No";};
									if ($res->archivado_restructuracion == "t"){ $proceso= "Si";}else{$proceso= "No";};
										
										
									
									$i++;
	
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_providencia_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_tipo_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$levantamiento.'</td>';
									$html.='<td style="font-size: 9px;">'.$proceso.'</td>';
									$html.='</tr>';
									
	
	
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
								
	
									
							}else{
									
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
									
							}
	
							echo $html;
							die();
	
						}
	
							
						if(isset($_POST["reporte_rpt_restructuración"]))
						{
	
	
							$parametros = array();
							$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
							$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_provincias']=(isset($_POST['id_provincias']))?trim($_POST['id_provincias']):0;
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
									
								if($fechaDesde != "" && $fechaHasta == ""){
	
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
	
								}
								if($fechaDesde == "" && $fechaHasta != ""){
	
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['identificacion_clientes_1']=(isset($_POST['identificacion_clientes_1']))?trim($_POST['identificacion_clientes_1']):'';
							$parametros['identificacion_clientes_2']=(isset($_POST['identificacion_clientes_2']))?trim($_POST['identificacion_clientes_2']):'';
							$parametros['identificacion_clientes_3']=(isset($_POST['identificacion_clientes_3']))?trim($_POST['identificacion_clientes_3']):'';
	
							$parametros['identificacion_garantes']=(isset($_POST['identificacion_garantes']))?trim($_POST['identificacion_garantes']):'';
							$parametros['identificacion_garantes_1']=(isset($_POST['identificacion_garantes_1']))?trim($_POST['identificacion_garantes_1']):'';
							$parametros['identificacion_garantes_2']=(isset($_POST['identificacion_garantes_2']))?trim($_POST['identificacion_garantes_2']):'';
							$parametros['identificacion_garantes_3']=(isset($_POST['identificacion_garantes_3']))?trim($_POST['identificacion_garantes_3']):'';
	
							$pagina="contMatrizRestructuracion.aspx";
	
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
	
	
							
							
					}
	
					$this->view("MatrizRestructuracionJuiciosSecretarios",array(
							"resultSet"=>$resultSet, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
					
	
	
	
			}
	
	
				
				
				
				
				
				
			if($id_rol==23){
	
	
	
	
	
				$_id_usuarios= $_SESSION['id_usuarios'];
				$resultSet="";
				$registrosTotales = 0;
				$arraySel = "";
	
				$juicios = new JuiciosModel();
	
				$ciudad = new CiudadModel();
				$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
					
				$estado_procesal = new EstadosProcesalesModel();
				$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");
	
				$tipo_restructuracion = new TipoRestructuracionModel();
			    $resultRestruc =$tipo_restructuracion->getAll("nombre_tipo_restructuracion");
					
				$permisos_rol = new PermisosRolesModel();
				$nombre_controladores = "MatrizJuiciosCordinador";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
	
				if (!empty($resultPer))
				{
	
					if(isset($_POST["juicio_referido_titulo_credito"]))
					{
	
						$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
						$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
						$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
						$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
						$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
						$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
							
						$id_estados_procesales_juicios=(isset($_POST['id_estados_procesales_juicios']))?$_POST['id_estados_procesales_juicios']:0;
						$id_tipo_restructuracion=(isset($_POST['id_tipo_restructuracion']))?$_POST['id_tipo_restructuracion']:0;
						
						$levantamiento_medida=(isset($_POST['levantamiento_medida']))?$_POST['levantamiento_medida']:'';
						$archivado_restructuracion=(isset($_POST['archivado_restructuracion']))?$_POST['archivado_restructuracion']:'';
						
							
						$columnas = " titulo_credito.numero_titulo_credito,
									  clientes.nombres_clientes,
									  provincias.nombre_provincias,
									  juicios_restructuracion.fecha_providencia_restructuracion,
									  asignacion_secretarios_view.secretarios,
									  asignacion_secretarios_view.impulsores,
									  tipo_restructuracion.nombre_tipo_restructuracion,
									  juicios.juicio_referido_titulo_credito,
									  juicios_restructuracion.levantamiento_medida,
									  juicios_restructuracion.archivado_restructuracion";
							
							
							
						$tablas=" public.titulo_credito,
								  public.juicios,
								  public.clientes,
								  public.juicios_restructuracion,
								  public.provincias,
								  public.asignacion_secretarios_view,
								  public.tipo_restructuracion,
								  public.estados_procesales_juicios,
								public.ciudad";
							
						$where="asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND juicios.id_estados_procesales_juicios = estados_procesales_juicios.id_estados_procesales_juicios AND titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						clientes.id_clientes = titulo_credito.id_clientes AND
						juicios_restructuracion.id_juicios = juicios.id_juicios AND
						provincias.id_provincias = clientes.id_provincias AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND
						tipo_restructuracion.id_tipo_restructuracion = juicios_restructuracion.id_tipo_restructuracion";
						
						$id="titulo_credito.numero_titulo_credito";
						
						
					
	
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4 = "";
						$where_5 = "";
						$where_6 = "";
						$where_7 = "";
						$where_8= "";
						$where_9 = "";
						$where_10= "";
	
	
	
						if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
	
						if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
	
						if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
	
						if($id_ciudad!=0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
	
						if($id_secretario!=0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
							
						if($id_impulsor!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
							
						if($id_tipo_restructuracion!=0){$where_6=" AND tipo_restructuracion.id_tipo_restructuracion='$id_tipo_restructuracion'";}
							
						/*para las fechas*/
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
						{
							$fechaDesde=$_POST["fcha_desde"];
							$fechaHasta=$_POST["fcha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_7 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
	
							if($fechaDesde != "" && $fechaHasta == ""){
	
								$fechaHasta='2018/12/01';
								$where_7 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
	
							}
							if($fechaDesde == "" && $fechaHasta != ""){
	
								$fechaDesde='1800/01/01';
								$where_7 = " AND DATE(juicios_restructuracion.fecha_providencia_restructuracion) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
	
							}
						}
							
						if($id_estados_procesales_juicios!=0){$where_8=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
						if($levantamiento_medida!=""){$where_9=" AND juicios_restructuracion.levantamiento_medida='$levantamiento_medida'";}
						if($archivado_restructuracion!=""){$where_10=" AND juicios_restructuracion.archivado_restructuracion='$archivado_restructuracion'";}
							
							
						$where_to  = $where . $where_0 . $where_1 . $where_2 . $where_3 . $where_4 . $where_5 . $where_6.$where_7. $where_8.$where_9. $where_10;
	
	
						//comienza paginacion
	
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
						if($action == 'ajax')
						{
	
							$html="";
							$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
	
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
	
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
	
	
							$resultSet=$juicios->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
	
							$count_query   = $cantidadResult;
	
							$total_pages = ceil($cantidadResult/$per_page);
	
							if ($cantidadResult>0)
							{
	
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<div class="pull-left">';
								$html.='<span class="form-control"><strong>Registros: </strong>'.$cantidadResult.'</span>';
								$html.='<input type="hidden" value="'.$cantidadResult.'" id="total_query" name="total_query"/>' ;
								$html.='</div></div>';
								$html.='<div class="col-lg-12 col-md-12 col-xs-12">';
								$html.='<section style="height:425px; overflow-y:scroll;">';
								$html.='<table class="table table-hover">';
								$html.='<thead>';
								$html.='<tr class="info">';
									
								$html.='<th style="text-align: left;  font-size: 10px;"># Orden</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombre Cliente</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Provincia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Fecha Providencia</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Secretario</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Impulsor</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Tipo</th>';
								$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Levantamiento Medida</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Proceso Archivado</th>';
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
									
	
	
	
								$i=0;
	
								foreach ($resultSet as $res)
								{
	
									$levantamiento="";
									$proceso="";
									
										
									if ($res->levantamiento_medida =="t"){ $levantamiento="Si";}else{$levantamiento="No";};
									if ($res->archivado_restructuracion == "t"){ $proceso= "Si";}else{$proceso= "No";};
										
									
									
									$i++;
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_provincias.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->fecha_providencia_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->secretarios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->impulsores.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_tipo_restructuracion.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->juicio_referido_titulo_credito.'</td>';
									$html.='<td style="font-size: 9px;">'.$levantamiento.'</td>';
									$html.='<td style="font-size: 9px;">'.$proceso.'</td>';
									$html.='</tr>';
	
	
	
								}
	
								$html.='</tbody>';
								$html.='</table>';
								$html.='</section></div>';
								$html.='<div class="table-pagination pull-right">';
								$html.=''. $this->paginate("index.php", $page, $total_pages, $adjacents).'';
								$html.='</div>';
	
	
							}else{
	
								$html.='<div class="alert alert-warning alert-dismissable">';
								$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								$html.='<h4>Aviso!!!</h4> No hay datos para mostrar';
								$html.='</div>';
	
							}
	
							echo $html;
							die();
	
						}
	
	
						if(isset($_POST["reporte_rpt_restructuración"]))
						{
	
	
							$parametros = array();
							$parametros['id_ciudad']=isset($_POST['id_ciudad'])?trim($_POST['id_ciudad']):0;
							$parametros['id_secretario']=isset($_POST['id_secretario'])?trim($_POST['id_secretario']):0;
							$parametros['id_abogado']=isset($_POST['id_impulsor'])?trim($_POST['id_impulsor']):0;
							$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
							$parametros['id_estados_procesales_juicios']=(isset($_POST['id_estados_procesales_juicios']))?trim($_POST['id_estados_procesales_juicios']):0;
							$parametros['id_tipo_restructuracion']=(isset($_POST['id_tipo_restructuracion']))?trim($_POST['id_tipo_restructuracion']):0;
							$parametros['levantamiento_medida']=(isset($_POST['levantamiento_medida']))?trim($_POST['levantamiento_medida']):'';
							$parametros['archivado_restructuracion']=(isset($_POST['archivado_restructuracion']))?trim($_POST['archivado_restructuracion']):'';
							
							$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
							$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
							$parametros['id_rol'] = $_SESSION['id_rol']?trim($_SESSION['id_rol']):0;
							
							/*para las fechas*/
							$fechaDesde="";$fechaHasta="";
							if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
							{
								$fechaDesde=$_POST["fcha_desde"];
								$fechaHasta=$_POST["fcha_hasta"];
								if ($fechaDesde != "" && $fechaHasta != "")
								{
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
	
								if($fechaDesde != "" && $fechaHasta == ""){
	
									$fechaHasta='2018/12/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
	
								}
								if($fechaDesde == "" && $fechaHasta != ""){
	
									$fechaDesde='1800/01/01';
									$parametros['fecha_desde'] = $fechaDesde;
									$parametros['fecha_hasta'] = $fechaHasta;
								}
							}
	
	
							$pagina="contMatrizRestructuracion.aspx";
	
							$conexion_rpt = array();
							$conexion_rpt['pagina']=$pagina;
							//$conexion_rpt['port']="59584";
	
							$this->view("ReporteRpt", array(
									"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
							));
	
							die();
	
						}
	
	
					}
	
					$this->view("MatrizRestructuracionJuiciosCordinador",array(
							"resultSet"=>$resultSet, "resultDatos"=>$resultDatos, "resultEstadoProcesal"=>$resultEstadoProcesal, "resultRestruc"=>$resultRestruc
	
	
	
					));
	
	
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Matriz Juicios"
	
					));
	
					exit();
				}
	
	
	
			}
				
				
				
	
		}
		else
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
	
			));
	
		}
			
	
	}
	
	
}
?>