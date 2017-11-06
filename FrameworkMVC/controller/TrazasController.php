<?php
class TrazasController extends ControladorBase{
	public function __construct() {
		parent::__construct();
	}
	public function index(){
		
		session_start();
		$resulMenu=array(0=>'TODOS',1=>'Usuario', 2=>'Controladores', 3=>'Accion');
	
		//Creamos el objeto usuario
		$trazas = new TrazasModel();
		$usuarios=new UsuariosModel();
		//Conseguimos todos los usuarios
		$resultSet=$trazas->getAll("id_trazas");
	
	
	
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			
			
			$trazas = new TrazasModel();
			//Notificaciones
			$trazas->MostrarNotificaciones($_SESSION['id_usuarios']);
			
			
			$nombre_controladores = "Trazas";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $trazas->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
				
				if(isset($_POST["ddl_accion"]) )
				{
					
					
					$columnas = "trazas.id_trazas, usuarios.usuario_usuarios, usuarios.nombre_usuarios, trazas.nombre_controlador, trazas.accion_trazas, trazas.parametros_trazas, trazas.creado";
					$tablas="public.trazas, public.usuarios";
					$where="usuarios.id_usuarios = trazas.id_usuarios";
					$id="trazas.id_trazas";
					
					$accion="";	
					
					$id_accion = $_POST["ddl_accion"];
					
					switch ($id_accion){
					
						case 0: 
						$accion = "INSERTO NUEVO JUICIO";
						break; 
						case 1: 
						$accion = "Actualizo tabla juicios";
						break; 
						case 2: 
						$accion = "Actualizo tabla clientes";
						break;
						case 3:
							$accion = "Actualizo tabla titulo_credito";
							break;
						case 4:
							$accion = "Inserto o Actualizo tabla Restructuracion";
							break;
							case 5:
								$accion = "Genero Avoco Conocimiento";
								break;
							
							
							
					}
					
					$criterio = $_POST["ddl_criterio"];
					$contenido = $_POST["contenido"];
					
						
						$where_0 = "";
						$where_1 = "";
						$where_2 = "";
						$where_3 = "";
						$where_4="";
								
						switch ($criterio) 
						{
							case 0:
								$where_0 = " ";
								break;
							case 1:
								//USUARIO
								$where_1 = " AND  usuarios.nombre_usuarios LIKE '$contenido'  ";
								break;
							case 2:
								//Controladores
								$where_2 = " AND trazas.nombre_controlador LIKE '$contenido'  ";
								break;
							case 3:
								//Accion
								$where_3 = " AND trazas.accion_trazas LIKE '$accion' ";
								break;
							
							
						}
						
						
						
						$fechaDesde="";$fechaHasta="";
						if(isset($_POST["fecha_desde"])&&isset($_POST["fecha_hasta"]))
						{
							$fechaDesde=$_POST["fecha_desde"];
							$fechaHasta=$_POST["fecha_hasta"];
							if ($fechaDesde != "" && $fechaHasta != "")
							{
								$where_4 = " AND DATE(trazas.creado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
							}
						
							if($fechaDesde != "" && $fechaHasta == ""){
									
								$fechaHasta='2018/12/01';
								$where_4 = " AND DATE(trazas.creado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
							if($fechaDesde == "" && $fechaHasta != ""){
									
								$fechaDesde='1800/01/01';
								$where_4 = " AND DATE(trazas.creado) BETWEEN '$fechaDesde' AND '$fechaHasta'  ";
									
							}
						}
							
							
							
						$where_to  = $where .  $where_0 . $where_1 . $where_2 . $where_3 . $where_4 ;
						
						//Comienza la paginacion
						$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
						
						if($action == 'ajax')
						{
						
							$html="";
							$resultSet=$trazas->getCantidad("*", $tablas, $where_to);
							$cantidadResult=(int)$resultSet[0]->total;
						
							$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
						
							$per_page = 50; //la cantidad de registros que desea mostrar
							$adjacents  = 9; //brecha entre páginas después de varios adyacentes
							$offset = ($page - 1) * $per_page;
						
							$limit = " LIMIT   '$per_page' OFFSET '$offset'";
						
						
							$resultSet=$trazas->getCondicionesPag($columnas, $tablas, $where_to, $id, $limit);
						
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
									
								$html.='<th style="text-align: left;  font-size: 10px;">Usuario.</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Nombre</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Controlador</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Acción</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Paramtros</th>';
								$html.='<th style="text-align: left;  font-size: 10px;">Creado</th>';		
								$html.='</tr>';
								$html.='</thead>';
								$html.='<tbody>';
						
									
						
								$i=0;
									
								foreach ($resultSet as $res)
								{
									$i++;
						
									$html.='<tr>';
									$html.='<td style="font-size: 9px;">'.$i.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_usuarios.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->nombre_controlador.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->accion_trazas.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->parametros_trazas.'</td>';
									$html.='<td style="font-size: 9px;">'.$res->creado.'</td>';
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
				else{
					
					
					
				}
				
	
	
				$this->view("Trazas",array(
						"resultSet"=>$resultSet,"resulMenu"=>$resulMenu
							
				));
	
	
	
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Trazas"
	
				));
	
				exit();
			}
	
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
				$out.= "<li><span><a href='javascript:void(0);' onclick='load_trazas(1)'>$prevlabel</a></span></li>";
			}else {
				$out.= "<li><span><a href='javascript:void(0);' onclick='load_trazas(".($page-1).")'>$prevlabel</a></span></li>";
		
			}
		
			// first label
			if($page>($adjacents+1)) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_trazas(1)'>1</a></li>";
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
					$out.= "<li><a href='javascript:void(0);' onclick='load_trazas(1)'>$i</a></li>";
				}else {
					$out.= "<li><a href='javascript:void(0);' onclick='load_trazas(".$i.")'>$i</a></li>";
				}
			}
		
			// interval
		
			if($page<($tpages-$adjacents-1)) {
				$out.= "<li><a>...</a></li>";
			}
		
			// last
		
			if($page<($tpages-$adjacents)) {
				$out.= "<li><a href='javascript:void(0);' onclick='load_trazas($tpages)'>$tpages</a></li>";
			}
		
			// next
		
			if($page<$tpages) {
				$out.= "<li><span><a href='javascript:void(0);' onclick='load_trazas(".($page+1).")'>$nextlabel</a></span></li>";
			}else {
				$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
			}
		
			$out.= "</ul>";
			return $out;
		}
		

}