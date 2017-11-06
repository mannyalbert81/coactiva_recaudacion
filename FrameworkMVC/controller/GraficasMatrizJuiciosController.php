<?php
class GraficasMatrizJuiciosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    //maycol
public function index(){
	
		session_start();
		
		$id_rol= $_SESSION['id_rol'];
		
		if ($id_rol==3){
		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
		$html="";
		$juicios = new JuiciosModel();
			
		
			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
	    $resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
	    $resultEstadoProcesal_grafico="";
	    $res_juicios="";
		
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuicios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
		
			if(isset($_POST["buscar"]))
			{
			     
				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_provincias=$_POST['id_provincias'];
				$id_abogado=$_POST['id_abogado'];
				$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
		
				
				
				$columnas="COUNT(id_juicios) as total, estados_procesales_juicios.id_estados_procesales_juicios, 
  							estados_procesales_juicios.nombre_estados_procesales_juicios";
				$tablas=" public.juicios, 
 						 public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito";
				$grupo="estados_procesales_juicios.nombre_estados_procesales_juicios, estados_procesales_juicios.id_estados_procesales_juicios";
				$id="estados_procesales_juicios.nombre_estados_procesales_juicios, id_estados_procesales_juicios";
				
				
				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";
				$where_6 = "";
				
				if($id_estados_procesales_juicios!=0){$where_0=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
				if($id_abogado!=0){$where_1=" AND titulo_credito.id_usuarios='$id_abogado'";}
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				if($id_provincias!=0){$where_5=" AND provincias.id_provincias='$id_provincias'";}
				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
						
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					
				}
				$where_to  = $where . $where_0 . $where_1. $where_2 . $where_3 . $where_4 . $where_5 . $where_6;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
				
				
				
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
						
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ESTADO PROCESAL</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
						
					foreach ($resultEstadoProcesal_grafico as $res)
					{	
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->nombre_estados_procesales_juicios.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
						
					$html.='</tbody>';
					$html.='</table>';
				
						
						
						
				}else{
						
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No hay Datos';
					$html.='</div>';
						
				}
					
				
				
				
			}
				
			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
					
					
				$pagina="contGraficas.aspx";
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
			
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}
				
				
				
			$this->view("GraficasMatrizJuicios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "html"=>$html
						
		
		
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
	
	
	
	
	
	
	if ($id_rol==5){
		
		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
		$html="";
		$juicios = new JuiciosModel();
			
		$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
			
		$tablas   = "public.asignacion_secretarios_view";
			
		$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
			
		$id       = "asignacion_secretarios_view.id_abogado";
		$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);
		
			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
	
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosSecretarios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
	
			if(isset($_POST["buscar"]))
			{
	
				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_provincias=$_POST['id_provincias'];
				$id_abogado=$_POST['id_abogado'];
				$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
	
	
	
				$columnas="COUNT(id_juicios) as total, estados_procesales_juicios.id_estados_procesales_juicios,
  							estados_procesales_juicios.nombre_estados_procesales_juicios";
				$tablas=" public.juicios,
 						 public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
						clientes.id_provincias = provincias.id_provincias AND
						titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
						asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_secretario='$_id_usuarios'";
				$grupo="estados_procesales_juicios.nombre_estados_procesales_juicios, estados_procesales_juicios.id_estados_procesales_juicios";
				$id="estados_procesales_juicios.nombre_estados_procesales_juicios, id_estados_procesales_juicios";
	
	
				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";
				$where_6 = "";
	
				if($id_estados_procesales_juicios!=0){$where_0=" AND estados_procesales_juicios.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
				if($id_abogado!=0){$where_1=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				if($id_provincias!=0){$where_5=" AND provincias.id_provincias='$id_provincias'";}
				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
				
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
						
				}
				$where_to  = $where . $where_0 . $where_1. $where_2 . $where_3 . $where_4 . $where_5 . $where_6;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
	
	
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ESTADO PROCESAL</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->nombre_estados_procesales_juicios.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No hay Datos';
					$html.='</div>';
				
				}
					
	
			}
	
			if(isset($_POST["reporte_rpt"]))
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
				
				
				$pagina="contGraficas.aspx";
			
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
			
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
			
				die();
			
			}
	
	
			$this->view("GraficasMatrizJuiciosSecretarios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul, "html"=>$html
	
	
	
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
		
		
		$juicios = new JuiciosModel();
		
		$ciudad = new CiudadModel();
		$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		
		$html="";
		
		
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosCordinador";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
		
		if (!empty($resultPer))
		{
		
			if(isset($_POST["buscar"]))
			{
		
				$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
				$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
				$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
				$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
				$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
				$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
		        //$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
					
				$columnas="COUNT(id_juicios) as total, estados_procesales_juicios.id_estados_procesales_juicios,
  							estados_procesales_juicios.nombre_estados_procesales_juicios";
				$tablas=" public.juicios,
 						  public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
						  public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad";
				$grupo="estados_procesales_juicios.nombre_estados_procesales_juicios, estados_procesales_juicios.id_estados_procesales_juicios";
				$id="estados_procesales_juicios.nombre_estados_procesales_juicios, id_estados_procesales_juicios";
				
		
				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";
				$where_6 = "";
		
		
		
				if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				if($id_ciudad>0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
				if($id_secretario>0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
				if($id_impulsor>0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
				
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
						
				}
			
				$where_to  = $where . $where_0 . $where_1. $where_2 . $where_3 . $where_4 . $where_5 . $where_6;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
				
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ESTADO PROCESAL</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->nombre_estados_procesales_juicios.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No hay Datos';
					$html.='</div>';
				
				}
	
			}
			
			if(isset($_POST["reporte_rpt"]))
			{
			
			
				$parametros = array();
				$parametros['id_ciudad']=isset($_POST['id_ciudad_1'])?trim($_POST['id_ciudad_1']):0;
				$parametros['id_secretario']=isset($_POST['id_secretario_1'])?trim($_POST['id_secretario_1']):0;
				$parametros['id_abogado']=isset($_POST['id_impulsor_1'])?trim($_POST['id_impulsor_1']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
			
				$pagina="contGraficas.aspx";
			
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
			
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
			
				die();
			
			}
		
			
			$this->view("GraficasMatrizJuiciosCordinador",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>"", "resultDatos"=>$resultDatos, "html"=>$html
					
					
	
	
	
			));
		
		
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Acceso a Graficas Matriz Juicios"
		
			));
		
			exit();
		}
		
		
		
		
	}
	
	
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












public function index2(){

	session_start();

	$id_rol= $_SESSION['id_rol'];

	if ($id_rol==3){
		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
			
		$juicios = new JuiciosModel();
			

			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		$html="";
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuicios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_abogado=$_POST['id_abogado'];
				


				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad";
				
				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";


				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";

				if($id_abogado!=0){$where_1=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				
				
				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
					
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta == ""){
					
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
							
					}
				}
				$where_to  = $where . $where_1. $where_2 . $where_3 . $where_4 . $where_5 ;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);

				
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL ACTUALIZACIONES</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}


			}

			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}	
					
					
				$pagina="contGraficasActualizacionMatrizJuicios.aspx";
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
					
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}



			$this->view("GraficasActualizacionMatrizJuicios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "html"=>$html



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






	if ($id_rol==5){

		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
			
		$juicios = new JuiciosModel();
			
		$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
			
		$tablas   = "public.asignacion_secretarios_view";
			
		$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
			
		$id       = "asignacion_secretarios_view.id_abogado";
		$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);

			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		$html="";
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosSecretarios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_abogado=$_POST['id_abogado'];
				


				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad AND asignacion_secretarios_view.id_secretario='$_id_usuarios'";
				
				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";
				

				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";

				if($id_abogado!=0){$where_1=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}

				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
						
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$where_5 = " AND DATE(juicios.modificado) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
							
					}
				}
				$where_to  = $where . $where_1. $where_2 . $where_3 . $where_4 . $where_5 ;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);


				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL ACTUALIZACIONES</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}

			}

			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
				$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}
					
				$pagina="contGraficasActualizacionMatrizJuicios.aspx";
					
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}


			$this->view("GraficasActualizacionMatrizJuiciosSecretarios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul,
					"html"=>$html



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


		$juicios = new JuiciosModel();

		$ciudad = new CiudadModel();
		$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		$html="";
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosCordinador";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );

		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
				$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
				$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
				$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
				$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
				$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
				//$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
					
				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad";
				
				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";
				

				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";
				$where_6 = "";



				if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				if($id_ciudad!=0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
				if($id_secretario!=0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
				if($id_impulsor!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
				$fechaDesde="";$fechaHasta="";
				if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
				{
				
					$fechaDesde=$_POST["fcha_desde"];
					$fechaHasta=$_POST["fcha_hasta"];
					if ($fechaDesde != "" && $fechaHasta != "")
					{
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					}
				
					if($fechaDesde != "" && $fechaHasta == ""){
							
						$fechaHasta='2018/12/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta != ""){
							
						$fechaDesde='1800/01/01';
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							
					}
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$where_6 = " AND DATE(juicios.modificado) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
							
					}
				}
					
				$where_to  = $where . $where_0 . $where_1. $where_2 . $where_3 . $where_4 . $where_5  . $where_6;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);

				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
					$html.='<section style="height:250px;overflow-y:scroll;">';
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL ACTUALIZACIONES</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
					$html.='</section>';
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}

			}
				
			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_ciudad']=isset($_POST['id_ciudad_1'])?trim($_POST['id_ciudad_1']):0;
				$parametros['id_secretario']=isset($_POST['id_secretario_1'])?trim($_POST['id_secretario_1']):0;
				$parametros['id_abogado']=isset($_POST['id_impulsor_1'])?trim($_POST['id_impulsor_1']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
					
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}
					
				$pagina="contGraficasActualizacionMatrizJuicios.aspx";
					
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}

			$this->view("GraficasActualizacionMatrizJuiciosCordinador",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>"", "resultDatos"=>$resultDatos,
					"html"=>$html


			));


		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Acceso a Graficas Matriz Juicios"

			));

			exit();
		}




	}


}


























public function index3(){

	session_start();

	$id_rol= $_SESSION['id_rol'];

	if ($id_rol==3){
		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
			
		$juicios = new JuiciosModel();
			

			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
        $html="";
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuicios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_abogado=$_POST['id_abogado'];
				


				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad";

				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";


				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";

				if($id_abogado!=0){$where_1=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
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
					
					if($fechaDesde == "" && $fechaHasta == ""){
						
						$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
						
					}
					
				}
				$where_to  = $where . $where_1. $where_2 . $where_3 . $where_4 . $where_5 ;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL PROVIDENCIAS</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}
				


			}

			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_abogado']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
						
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}
					
					
					
				$pagina="contGraficasProvidenciasMatrizJuicios.aspx";
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
					
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}



			$this->view("GraficasProvidenciasMatrizJuicios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "html"=>$html



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






	if ($id_rol==5){

		$_id_usuarios= $_SESSION['id_usuarios'];
		$resultSet="";
		$registrosTotales = 0;
		$arraySel = "";
			
		$juicios = new JuiciosModel();
			
		$columnas = " asignacion_secretarios_view.id_abogado,
					  asignacion_secretarios_view.impulsores";
			
		$tablas   = "public.asignacion_secretarios_view";
			
		$where    = "public.asignacion_secretarios_view.id_secretario = '$_id_usuarios'";
			
		$id       = "asignacion_secretarios_view.id_abogado";
		$resultImpul=$juicios->getCondiciones($columnas ,$tablas ,$where, $id);

			
		$provincias = new ProvinciasModel();
		$resultProv =$provincias->getAll("nombre_provincias");
			
		$estado_procesal = new EstadosProcesalesModel();
		$resultEstadoProcesal =$estado_procesal->getAll("nombre_estados_procesales_juicios");;
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		$html="";
			
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosSecretarios";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=$_POST['juicio_referido_titulo_credito'];
				$numero_titulo_credito=$_POST['numero_titulo_credito'];
				$identificacion_clientes=$_POST['identificacion_clientes'];
				$id_abogado=$_POST['id_abogado'];
				


				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad  AND asignacion_secretarios_view.id_secretario = '$_id_usuarios'";

				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";


				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";

				if($id_abogado!=0){$where_1=" AND asignacion_secretarios_view.id_abogado='$id_abogado'";}
				if($juicio_referido_titulo_credito!=""){$where_2=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_3=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_4=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
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
					
					if($fechaDesde == "" && $fechaHasta == ""){
					
						$where_5 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
					
					}
				}
				$where_to  = $where . $where_1. $where_2 . $where_3 . $where_4 . $where_5 ;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
				
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL PROVIDENCIAS</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
				
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}
				


			}

			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_secretario']=$_SESSION['id_usuarios']?trim($_SESSION['id_usuarios']):0;
				$parametros['id_abogado']=isset($_POST['id_abogado'])?trim($_POST['id_abogado']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
						
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}
					
				$pagina="contGraficasProvidenciasMatrizJuicios.aspx";
					
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}


			$this->view("GraficasProvidenciasMatrizJuiciosSecretarios",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>$resultEstadoProcesal, "resultProv"=>$resultProv, "resultImpul"=>$resultImpul, "html"=>$html



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


		$juicios = new JuiciosModel();

		$ciudad = new CiudadModel();
		$resultDatos=$ciudad->getBy("nombre_ciudad='Quito' OR nombre_ciudad='Guayaquil'");
			
		$resultEstadoProcesal_grafico="";
		$res_juicios="";
		$html="";
		$permisos_rol = new PermisosRolesModel();
		$nombre_controladores = "MatrizJuiciosCordinador";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $juicios->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );

		if (!empty($resultPer))
		{

			if(isset($_POST["buscar"]))
			{

				$juicio_referido_titulo_credito=(isset($_POST['juicio_referido_titulo_credito']))?$_POST['juicio_referido_titulo_credito']:'';
				$numero_titulo_credito=(isset($_POST['numero_titulo_credito']))?$_POST['numero_titulo_credito']:'';
				$identificacion_clientes=(isset($_POST['identificacion_clientes']))?$_POST['identificacion_clientes']:'';
				$id_secretario=(isset($_POST['id_secretario']))?$_POST['id_secretario']:0;
				$id_impulsor=(isset($_POST['id_impulsor']))?$_POST['id_impulsor']:0;
				$id_ciudad=(isset($_POST['id_ciudad']))?$_POST['id_ciudad']:0;
				//$id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
					
				$columnas="COUNT(id_juicios) as total, asignacion_secretarios_view.impulsores";
				$tablas="public.juicios,
 				      public.estados_procesales_juicios, public.clientes, public.provincias, public.titulo_credito, public.asignacion_secretarios_view,
				      public.ciudad";
				$where="estados_procesales_juicios.id_estados_procesales_juicios = juicios.id_estados_procesales_juicios AND clientes.id_clientes = titulo_credito.id_clientes AND
				clientes.id_provincias = provincias.id_provincias AND
				titulo_credito.id_titulo_credito = juicios.id_titulo_credito AND
				asignacion_secretarios_view.id_abogado = titulo_credito.id_usuarios AND asignacion_secretarios_view.id_ciudad = ciudad.id_ciudad";

				$grupo="asignacion_secretarios_view.impulsores";
				$id="asignacion_secretarios_view.impulsores";


				$where_0 = "";
				$where_1 = "";
				$where_2 = "";
				$where_3 = "";
				$where_4 = "";
				$where_5 = "";
				$where_6 = "";




				if($juicio_referido_titulo_credito!=""){$where_0=" AND juicios.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
				if($numero_titulo_credito!=""){$where_1=" AND titulo_credito.numero_titulo_credito='$numero_titulo_credito'";}
				if($identificacion_clientes!=""){$where_2=" AND clientes.identificacion_clientes='$identificacion_clientes'";}
				if($id_ciudad!=0){$where_3=" AND ciudad.id_ciudad='$id_ciudad'";}
				if($id_secretario!=0){$where_4=" AND asignacion_secretarios_view.id_secretario='$id_secretario'";}
				if($id_impulsor!=0){$where_5=" AND asignacion_secretarios_view.id_abogado='$id_impulsor'";}
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
					if($fechaDesde == "" && $fechaHasta == ""){
				
						$where_6 = " AND DATE(juicios.fecha_ultima_providencia) BETWEEN '1800/01/01' AND '2018/12/01'  ";
							
					
					}
				}
					
				$where_to  = $where . $where_0 . $where_1. $where_2 . $where_3 . $where_4 . $where_5 . $where_6 ;
				$resultEstadoProcesal_grafico=$juicios->getCondiciones_grupo($columnas, $tablas, $where_to, $grupo, $id);
				$html="";
				if (!empty($resultEstadoProcesal_grafico))
				{
				
					$html.='<section style="height:250px;overflow-y:scroll;">';
					$html.='<table class="table table-hover">';
					$html.='<thead>';
					$html.='<tr class="info">';
					$html.='<th style="text-align: left;  font-size: 11px;">ABOGADO IMPULSOR</th>';
					$html.='<th style="text-align: left;  font-size: 11px;">TOTAL PROVIDENCIAS</th>';
					$html.='</tr>';
					$html.='</thead>';
					$html.='<tbody>';
				
					foreach ($resultEstadoProcesal_grafico as $res)
					{
						$html.='<tr>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->impulsores.'</td>';
						$html.='<td style="text-align: left; font-size: 11px;">'.$res->total.'</td>';
						$html.='</tr>';
				
					}
				
					$html.='</tbody>';
					$html.='</table>';
					$html.='</section>';
				
				
				
				}else{
				
					$html.='<div class="alert alert-warning alert-dismissable">';
					$html.='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					$html.='<h4>Aviso!!!</h4> No existe actualizaciones de su matriz en la fecha seleccionada.';
					$html.='</div>';
				
				}
				

			}

			if(isset($_POST["reporte_rpt"]))
			{
					
					
				$parametros = array();
				$parametros['id_ciudad']=isset($_POST['id_ciudad_1'])?trim($_POST['id_ciudad_1']):0;
				$parametros['id_secretario']=isset($_POST['id_secretario_1'])?trim($_POST['id_secretario_1']):0;
				$parametros['id_abogado']=isset($_POST['id_impulsor_1'])?trim($_POST['id_impulsor_1']):0;
				$parametros['juicio_referido_titulo_credito']=(isset($_POST['juicio_referido_titulo_credito']))?trim($_POST['juicio_referido_titulo_credito']):'';
				$parametros['numero_titulo_credito']=(isset($_POST['numero_titulo_credito']))?trim($_POST['numero_titulo_credito']):'';
				$parametros['identificacion_clientes']=(isset($_POST['identificacion_clientes']))?trim($_POST['identificacion_clientes']):'';
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
						
					if($fechaDesde == "" && $fechaHasta == ""){
							
						$fechaDesde='1800/01/01';
						$fechaHasta='2018/12/01';
						$parametros['fecha_desde'] = $fechaDesde;
						$parametros['fecha_hasta'] = $fechaHasta;
							
					}
				
				}
					
				$pagina="contGraficasProvidenciasMatrizJuicios.aspx";
					
				$conexion_rpt = array();
				$conexion_rpt['pagina']=$pagina;
				//$conexion_rpt['port']="59584";
					
				$this->view("ReporteRpt", array(
						"parametros"=>$parametros,"conexion_rpt"=>$conexion_rpt
				));
					
				die();
					
			}

			$this->view("GraficasProvidenciasMatrizJuiciosCordinador",array(
					"resultEstadoProcesal_grafico"=>$resultEstadoProcesal_grafico,"resultEstadoProcesal"=>"", "resultDatos"=>$resultDatos, "html"=>$html



			));


		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Acceso a Graficas Matriz Juicios"

			));

			exit();
		}


	}


}


	
}
?>
