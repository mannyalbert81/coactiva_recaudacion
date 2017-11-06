<!DOCTYPE HTML>
<html lang="es">
     <head>
         <meta charset="utf-8"/>
        <title>Firmar Documentos - coactiva 2016</title>
        
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>
		
         <!-- AQUI NOTIFICAIONES -->
		<script type="text/javascript" src="view/css/lib/alertify.js"></script>
		<link rel="stylesheet" href="view/css/themes/alertify.core.css" />
		<link rel="stylesheet" href="view/css/themes/alertify.default.css" />
		
		
		
		<script>

		function Ok(){
				alertify.success("Has Pulsado en Aceptar"); 
				return false;
			}
			
			function Borrar(){
				alertify.success("Has Pulsado en Borrar"); 
				return false; 
			}

			function notificacion(){
				alertify.success("Has Pulsado en Editar"); 
				return false; 
			}
		</script>
		
		
		
		<!-- TERMINA NOTIFICAIONES -->
		
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
        
        
        
         <script >
	

	</script>
        
        
        
    </head>
      <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
      
       <?php
	   $id_usuario="";
	   $cadenaNombres="";
	   $cadenaIds="";
	   $rutaFiles="";
	   $nombre_usuario="";
	   $nombre_controlador="";
	   $nombre_accion="";
	   
       if($resultUsuario!="")
	   {
		   $id_usuario=$resultUsuario;
		   $cadenaNombres=$resultnombreFiles;
		   $cadenaIds=$resultIds;
		   $rutaFiles=$ruta;
		   $nombre_usuario=$nombreUsuario;
		   $nombre_controlador=$controlador;
		   $nombre_accion=$accion;
	   }
		?>

  
  <div class="container">
  
     <div class="row" style="background-color: #ffffff;">
  
  	      <form action="<?php echo $helper->url("CertificadosElectronicos","index"); ?>" enctype="multipart/form-data"  method="post" class="col-lg-6">
           
            <h4 style="color:#ec971f;">Firmar Documentos</h4>
            <hr/>
            
           
          <?php if ($msg!="") { ?>
          
              <div class="row">
				 
		    	<div class="col-xs-12 col-md-12">
				
				<span style="height: 400px">
				<?php $Msg=$msg; echo $Msg; ?>
				</span>
		    	
		         </div>
		         
			  </div>
          	
		     <?php  } else {?>
		    	
		   
		    	
		    	 <div class="row">
				 
		    	<div class="col-xs-6 col-md-6">
				
				<!--  
				<applet code="verfirma.Certificados.class" archive="Certificados.jar" codebase="http://186.4.241.148:4000/FrameworkMVC/view/" type="application/x-java-applet;jpi-version=7" width="1100" height="400">
				<param name="idUsuario" value="<?php echo $id_usuario; ?>">
				<param name="listaFiles" value="<?php echo $cadenaNombres; ?>">
				<param name="rutaFiles" value="<?php echo $rutaFiles; ?>">
				<param name="listaIds" value="<?php echo $cadenaIds; ?>">
				</applet>
				-->
				
				<?php 
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				
					$codebase="http://186.4.241.148:80/coactiva_liventy/FrameworkMVC/view/";
					$code="firmarDocumentos.SignDocuments.class";
					$archive="fimarDocumentos.jar";
					

				 $aplet = '<applet code='.$code.' archive='.$archive.' codebase='.$codebase.' type="application/x-java-applet;jpi-version=7" width="1100" height="400">'.
				'<param name="idUsuario" value="'.$id_usuario.'">'.
				'<param name="listaFiles" value="'.$cadenaNombres.'">'.
				'<param name="rutaFiles" value="'.$rutaFiles.'">'.
				'<param name="listaIds" value="'.$cadenaIds.'">'.
				'<param name="usuario" value="'.$nombre_usuario.'">'.
				'<param name="ctrl" value="'.$nombre_controlador.'">'.
				'<param name="acc" value="'.$nombre_accion.'">'.
				'</applet>';
				?>
				
				<?php echo $aplet;
				//$aplet;?>
				
				<?php //para pruebas
				/*
				echo $id_usuario;
				echo $cadenaNombres;
				echo $rutaFiles;
				echo $cadenaIds;
				echo $nombre_usuario;
				echo $nombre_controlador;
				echo $nombre_accion;*/
				//termina pruebas
				?>
		    	
		         </div>
		         
			  </div>
	 	       
			<hr>
		     <?php } ?>
		
    </form>
       
       
            
            
   </div>    
 
  </div>
       
       <?php include("view/modulos/footer.php"); ?>
        
     </body>  
    </html>          
