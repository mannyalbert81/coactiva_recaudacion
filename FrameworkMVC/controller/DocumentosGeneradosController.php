<?php
class DocumentosGeneradosController extends ControladorBase{
    
public function __construct() {
   parent::__construct();
}
   
public function index(){
	
session_start();
		
	if (isset(  $_SESSION['usuario_usuarios']) )
		{
		
			$clientes = new ClientesModel();
			$ciudad = new CiudadModel();
			$estado_procesal = new EstadosProcesalesModel();
			$resultEstadoProcesal = null;
			$provincias = new ProvinciasModel();
			$resultProv = null;
			
			$nombre_controladores = "Clientes";
			$id_rol= $_SESSION['id_rol'];			
			$resultPerVer= $clientes->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
			$resultSet = "";
			$resultEdit = "";
			
			
			if (!empty($resultPerVer))
			{
				$resultEstadoProcesal = $estado_procesal->getAll("nombre_estados_procesales_juicios");
				$resultProv = $provincias->getAll("nombre_provincias");
				
				$_id_usuarios = $_SESSION['id_usuarios'];
				
				$columnas ="";
				$tablas = "";
				$where = "";
				$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
				if($action == 'ajax')
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
					
					$documento = $_POST['documento'];
					$tipo_documento = $_POST['tipo_documento'];
					$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
					//paratipodocumento
					$tipo_doc = "";
					switch ($documento)
					{
						case "AC" :
							$tipo_doc="AC";
							$columnas = "ju.regional,tc.id_titulo_credito,ju.id_juicios,tc.numero_titulo_credito, ju.numero_juicios, cl.identificacion_clientes
								,cl.nombres_clientes , asv.id_abogado ,asv.impulsores ,asv.id_secretario ,asv.secretarios
								,ju.cuantia_inicial,ep.nombre_estados_procesales_juicios , ac.id_avoco_conocimiento AS \"id_documento\" , ac.nombre_documento AS \"nombre_doc\"
								, ac.ruta_documento AS \"ruta_doc\" ,ju.fecha_emision_juicios,ju.fecha_ultima_providencia ,ju.descripcion_estado_procesal
								,ac.creado AS \"fecha_creado\" ";
							
							$where = " 1=1 AND asv.id_abogado='$_id_usuarios' ";
							
							if($tipo_documento=="ALL")
							{
								$tablas = " juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN avoco_conocimiento ac  ON ac.id_juicios = ju.id_juicios ";
								
							}else if($tipo_documento==1)
							{
								$tablas = " juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN avoco_conocimiento ac  ON ac.id_juicios = ju.id_juicios 
								 AND ac.tipo_avoco = 1";
								
							}else if($tipo_documento==2)
							{
								$tablas = " juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN avoco_conocimiento ac  ON ac.id_juicios = ju.id_juicios
								 AND ac.tipo_avoco = 2";
								
							}else if($tipo_documento==3)
							{
								$tablas = " juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN avoco_conocimiento ac  ON ac.id_juicios = ju.id_juicios 
								AND ac.tipo_avoco = 3";
								
							}
							
							break;
							
						case "OF" :
							$tipo_doc="OF";
							$columnas = "ju.regional,tc.id_titulo_credito,ju.id_juicios,tc.numero_titulo_credito, ju.numero_juicios, cl.identificacion_clientes
							,cl.nombres_clientes , asv.id_abogado ,asv.impulsores ,asv.id_secretario ,asv.secretarios
							,ju.cuantia_inicial,ep.nombre_estados_procesales_juicios , of.id_oficios  AS \"id_documento\" , of.nombre_oficio AS \"nombre_doc\"
							, of.ruta_oficio AS \"ruta_doc\" ,ju.fecha_emision_juicios,ju.fecha_ultima_providencia ,ju.descripcion_estado_procesal
							, of.creado AS \"fecha_creado\" ";
							
							$tablas = " juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
							INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
							INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
							INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
							INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
							INNER JOIN oficios of  ON of.id_juicios = ju.id_juicios";
							
							$where = " 1=1 AND asv.id_abogado='$_id_usuarios' ";
							break;
							
						case "PR" :
							$tipo_doc="PR";
							$columnas=" ju.regional,tc.id_titulo_credito,ju.id_juicios,tc.numero_titulo_credito, ju.numero_juicios, cl.identificacion_clientes
							,cl.nombres_clientes , asv.id_abogado ,asv.impulsores ,asv.id_secretario ,asv.secretarios
							, pr.id_providencias  AS \"id_documento\" , pr.nombre_archivo_providencias AS \"nombre_doc\" , pr.ruta_providencias AS \"ruta_doc\"
							,ju.fecha_emision_juicios,ju.cuantia_inicial, ep.nombre_estados_procesales_juicios,ju.descripcion_estado_procesal
							,ju.fecha_ultima_providencia, pr.creado AS \"fecha_creado\"";
							
							$where=" 1=1 AND asv.id_abogado='$_id_usuarios'";
							
							if($tipo_documento=="ALL")
							{
								$tablas=" juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN providencias pr  ON pr.id_juicios = ju.id_juicios
								INNER JOIN tipo_providencias tpr ON tpr.id_tipo_providencias = pr.id_tipo_providencias	";
								
								
								
							}else if($tipo_documento=="PL")
							{
								$tablas=" juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN providencias pr  ON pr.id_juicios = ju.id_juicios
								INNER JOIN tipo_providencias tpr ON tpr.id_tipo_providencias = pr.id_tipo_providencias
								AND pr.id_tipo_providencias = 2";
								
								$where=" 1=1 AND asv.id_abogado='$_id_usuarios'";
								
							}else if($tipo_documento=="PS")
							{
								$tablas=" juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN providencias pr  ON pr.id_juicios = ju.id_juicios
								INNER JOIN tipo_providencias tpr ON tpr.id_tipo_providencias = pr.id_tipo_providencias
								AND pr.id_tipo_providencias = 1";
								
								$where=" 1=1 AND asv.id_abogado='$_id_usuarios'";
							}
							
							break;
							
						case "ALL" :
							
						$columnas=" ju.regional,tc.id_titulo_credito,ju.id_juicios,tc.numero_titulo_credito, ju.numero_juicios, cl.identificacion_clientes
									,cl.nombres_clientes , asv.id_abogado ,asv.impulsores ,asv.id_secretario ,asv.secretarios
									, pr.id_providencias , pr.nombre_archivo_providencias,ju.fecha_emision_juicios 
									, pr.ruta_providencias";
							
						$tablas=" juicios ju INNER JOIN  titulo_credito tc ON tc.id_titulo_credito = ju.id_titulo_credito
								INNER JOIN clientes cl ON cl.id_clientes = ju.id_clientes 
								INNER JOIN provincias pv ON pv.id_provincias = cl.id_provincias
								INNER JOIN estados_procesales_juicios ep ON ep.id_estados_procesales_juicios = ju.id_estados_procesales_juicios
								INNER JOIN asignacion_secretarios_view asv ON asv.id_abogado = tc.id_usuarios
								INNER JOIN providencias pr  ON pr.id_juicios = ju.id_juicios
								INNER JOIN tipo_providencias tpr ON tpr.id_tipo_providencias = pr.id_tipo_providencias
								AND pr.id_tipo_providencias = 1";
							
						$where=" 1=1 AND asv.id_abogado='$_id_usuarios'";
						
						break;
					}
					
					if($juicio_referido_titulo_credito!=""){$where.=" AND ju.juicio_referido_titulo_credito='$juicio_referido_titulo_credito'";}
						
					if($numero_titulo_credito!=""){$where.=" AND tc.numero_titulo_credito='$numero_titulo_credito'";}
					
					if($identificacion_clientes!=""){$where.=" AND cl.identificacion_clientes like '$identificacion_clientes'";}
					
					if($id_provincias!=0){$where.=" AND pv.id_provincias='$id_provincias'";}
						
					if($id_estados_procesales_juicios!=0){$where.=" AND ep.id_estados_procesales_juicios='$id_estados_procesales_juicios'";}
						
					if($identificacion_clientes_1!=""){$where.=" AND cl.identificacion_clientes_1 like'$identificacion_clientes_1'";}
					if($identificacion_clientes_2!=""){$where.=" AND cl.identificacion_clientes_2 like '$identificacion_clientes_2'";}
					if($identificacion_clientes_3!=""){$where.=" AND cl.identificacion_clientes_3 like '$identificacion_clientes_3'";}
					
					if($identificacion_garantes!=""){$where.=" AND cl.identificacion_garantes like '$identificacion_garantes'";}
					if($identificacion_garantes_1!=""){$where.=" AND cl.identificacion_garantes_1 like '$identificacion_garantes_1'";}
					if($identificacion_garantes_2!=""){$where.=" AND cl.identificacion_garantes_2 like '$identificacion_garantes_2'";}
					if($identificacion_garantes_3!=""){$where.=" AND cl.identificacion_garantes_3 like '$identificacion_garantes_3'";}
					
					/*para las fechas*/
					$fechaDesde="";$fechaHasta="";
					if(isset($_POST["fcha_desde"])&&isset($_POST["fcha_hasta"]))
					{
						$fechaDesde=$_POST["fcha_desde"];
						$fechaHasta=$_POST["fcha_hasta"];
						if ($fechaDesde != "" && $fechaHasta != "")
						{
							$where .= " AND DATE(ju.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
						}
							
						if($fechaDesde != "" && $fechaHasta == ""){
					
							$fechaHasta='2018/12/01';
							$where .= " AND DATE(ju.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					
						}
						if($fechaDesde == "" && $fechaHasta != ""){
					
							$fechaDesde='1800/01/01';
							$where .= " AND DATE(ju.fecha_ultima_providencia) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
					
						}
					}
						

					$this->Buscador($page,$columnas,$tablas,$where,$tipo_doc);
				
					exit();
				}
			}
			
			
			
			$this->view("DocumentosGenerados",array(
					"resultSet"=>$resultSet, "resultEdit" =>$resultEdit,"resultEstadoProcesal"=>$resultEstadoProcesal,
					"resultProv"=>$resultProv
			
			));
			
			
		}
		else 
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
			
		}
		
	}
	
	public function Buscador($page=1,$columnas,$tablas,$where_to,$tipo=null)
	{
		$doc=($tipo!="")?$tipo:"ALL";
		$juicios = new JuiciosModel();
		$html="";
		$id="ju.orden";
	$resultSet=$juicios->getCantidad("*", $tablas, $where_to);
	
	$cantidadResult=(int)$resultSet[0]->total;

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
		$html.='<th style="text-align: left;  font-size: 10px;"># Juicio</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Cedula Cliente Principal</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Nombres Cliente Principal</th>';
		$html.='<th style="text-align: left;  font-size: 10px;"># Operación</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Fecha Creacion Doc</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Cuantía Inicial</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Estado Procesal</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Descripción Etapa Procesal</th>';
		$html.='<th style="text-align: left;  font-size: 10px;">Fecha Última Providencia</th>';
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
			$html.='<td style="font-size: 15px;"><span class="pull-right"><a target="_blank" href="index.php?controller=DocumentosGenerados&action=verDoc&documento='.$res->id_documento.'-'.$res->ruta_doc.'-'.$res->nombre_doc.'&id_juicios='. $res->id_juicios.' "><i class="glyphicon glyphicon-picture"></i></a></span></td>';
			$html.='<td style="font-size: 9px;">'.$i.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->numero_juicios.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->identificacion_clientes.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->nombres_clientes.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->numero_titulo_credito.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->fecha_creado.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->cuantia_inicial.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->nombre_estados_procesales_juicios.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->descripcion_estado_procesal.'</td>';
			$html.='<td style="font-size: 9px;">'.$res->fecha_ultima_providencia.'</td>';
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
	
	}
	
	public function paginate($reload, $page, $tpages, $adjacents) {
	
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out = '<ul class="pagination pagination-large">';
	
		// previous label
	
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_Documentos(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_Documentos(".($page-1).")'>$prevlabel</a></span></li>";
	
		}
	
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_Documentos(1)'>1</a></li>";
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
				$out.= "<li><a href='javascript:void(0);' onclick='load_Documentos(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load_Documentos(".$i.")'>$i</a></li>";
			}
		}
	
		// interval
	
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}
	
		// last
	
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load_Documentos($tpages)'>$tpages</a></li>";
		}
	
		// next
	
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load_Documentos(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
	
		$out.= "</ul>";
		return $out;
	}
	
	public function verDoc()
	{
		session_start();
		if (isset($_SESSION['usuario_usuarios']) )
		{
			$id_juicios = $_GET['id_juicios'];
			$documento = $_GET['documento'];
			$arraydoc = explode('-', $documento);
			
		//para produccion
			//$mi_pdf = 'F:/coactiva/Documentos/'.$arraydoc[1].'/'.$arraydoc[2].'.pdf';
		
		//para pruebas			
			$mi_pdf = 'C:/Users/M/Desktop/paraservidor/'.$arraydoc[1].'/'.$arraydoc[2].'.pdf';
			
			header('Content-type: application/pdf');
			header('Content-Disposition: inline; filename="'.$mi_pdf.'"');
			readfile($mi_pdf);
		}
	}
	
	
}
?>
