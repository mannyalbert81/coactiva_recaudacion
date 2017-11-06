<?php
require "../phpqrcode/qrlib.php";

class CrearQrController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}

	
	
	
	public function index(){
	
	
		session_start();
		$titulo_credito = new TituloCreditoModel();
		$resultSet="";
		
						$columnas = "titulo_credito.id_titulo_credito, titulo_credito.numero_titulo_credito";
						$tablas="public.titulo_credito";
						$where="1=1";
						$id="titulo_credito.id_titulo_credito";
						$resultSet=$titulo_credito->getCondiciones($columnas, $tablas, $where, $id);
							
						
						$registros=0;
						if(!empty($resultSet)){
							
							
							foreach ($resultSet as $res)
							{
								$id_titulo_credito=$res->id_titulo_credito;
								$numero_titulo_credito=$res->numero_titulo_credito;
								
								
								if($numero_titulo_credito!=""){
								
							
									
									
							   $dir = $_SERVER['DOCUMENT_ROOT'].'/coactiva_liventy/qr/';
								
								$filename = $dir.$numero_titulo_credito.'.png';
								$tamaño = 10; //Tamaño de Pixel
								$level = 'Q'; //Precisión Baja
								$framSize = 3; //Tamaño en blanco
								$contenido = $numero_titulo_credito; //Texto
								
								QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
								
								echo '<img src="'.$dir.basename($filename).'" /><hr/>';
								
								$data = file_get_contents($dir.basename($filename));
								$logo_especies = pg_escape_bytea($data);
								
								$colval = "imagen_qr = '{$logo_especies}'";
								$tabla = "titulo_credito";
								$where = "id_titulo_credito = '$id_titulo_credito'";
								$resultado=$titulo_credito->UpdateBy($colval, $tabla, $where);
								}else{
									$registros++;
									
								}
							}
							
							echo $registros;
						}
						
						
					
						
						
					
							
		
	
		$this->view("CreacionQr",array(
				"resultSet"=>$resultSet
					
		
		
		));
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
?>