 <?php

#<?php
#Importas la librer�a PhpJasperLibrary
include_once('PhpJasperLibrary/class/tcpdf/tcpdf.php');
include_once("PhpJasperLibrary/class/PHPJasperXML.inc.php");
include_once ('conexion.php');

#Conectas a la base de datos
$server  = server;
$user    = user;
$pass    = pass;
$db      = db;
$driver  = driver;
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$estado=$_GET['estado'];

$directorio = $_SERVER ['DOCUMENT_ROOT'] . '/documentos/RazonDocumentos/';
$directorio1 = $_SERVER ['DOCUMENT_ROOT'] . '/documentos/Providencias/';
$directorio3 = $_SERVER ['DOCUMENT_ROOT'] . '/documentos/RazonProvidenciasUnida/';

		if ($estado == 'Visualizar') 
		{
			ob_clean();			
			$a=stripslashes($_GET['dato']);
			$_dato=urldecode($a);
			$_dato=unserialize($a);
			
			$PHPJasperXML = new PHPJasperXML ( "en", "TCPDF" );
			$PHPJasperXML->debugsql = false;
			$PHPJasperXML->arrayParameter=$_dato;
		    $PHPJasperXML->load_xml_file( "RazonDocumentosVisualizarReport.jrxml" );
			$PHPJasperXML->transferDBtoArray ( $server, $user, $pass, $db, $driver );
			$PHPJasperXML->outpage ( "I" );

		} else 
		{
	
				$id= $_GET['identificador'];
				$nombre=$_GET['nombre'];
				$nombre_documentos=$_GET['nombre_documentos'];
				$identificador_documento_unido=$_GET['identificador_documento_unido'];
				//aqui va la consulta
				$sql="SELECT
				razon_documentos.cuerpo_razon_documentos
				FROM
				public.razon_documentos,
				public.documentos
				WHERE
				documentos.id_documentos = razon_documentos.id_documentos AND
				razon_documentos.identificador= '$id'";
				
				$PHPJasperXML = new PHPJasperXML();
				$PHPJasperXML->arrayParameter=array("_sql" => $sql);
				$PHPJasperXML->load_xml_file("RazonDocumentosGuardarReport.jrxml");
				$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db, $driver);
				$PHPJasperXML->outpage("F",$directorio.$nombre.'.pdf');
	}
	
			class Pdf_concat extends FPDI {
			var $files = array();
		
			function setFiles($files) {
				$this->files = $files;
			}
				function concat() {
					foreach($this->files AS $file) {
						$pagecount = $this->setSourceFile($file);
						for ($i = 1; $i <= $pagecount; $i++) {
							$tplidx = $this->ImportPage($i);
							$s = $this->getTemplatesize($tplidx);
							$this->AddPage('P', array($s['w'], $s['h']));
							$this->useTemplate($tplidx);
						
					}
				}
			}
		}
		$file2merge=array($directorio1.$nombre_documentos.'.pdf', $directorio.$nombre.'.pdf');
		$pdf = new Pdf_concat();
		$pdf->setFiles($file2merge);
		$pdf->concat();
		$pdf->Output($directorio3.'RazonDocumentoUnido'.$identificador_documento_unido.'.pdf', "F");
	
		echo "<script type='text/javascript'>";
		echo "window.close()";
		echo "</script>";
		exit();

?>

