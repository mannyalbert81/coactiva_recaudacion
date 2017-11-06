<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Seguimiento Juicio - coactiva 2016</title>
        
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
				alertify.success("Has Pulsado en Buscar"); 
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
       
  
    
    </head>
    <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       
       
       <?php
       $resultMenu=array(0=>"Identificacion",1=>"Titulo Credito",2=>"Numero Juicio");
    	   
		?>
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
  <form action="<?php echo $helper->url("Juicio","consulta_seguimiento_juicio"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
  
     
     <div class="col-lg-12">
   <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
           <?php //no hay datos para editar?>
        
            <?php } } else {?>
		     
		      <h4 style="color:#ec971f;">Seguimiento Juicios</h4>
            	<hr/>
		
			    
			  <div class="col-lg-3">
			  	<p  class="formulario-subtitulo" >Selecione filtro:</p>
			  	<select name="criterio_busqueda" id="criterio_busqueda"  class="form-control" >
					<?php foreach($resultMenu as $val=>$desc) {?>
						<option value="<?php echo $val; ?>"  ><?php echo $desc ?> </option>
			        <?php } ?>
				</select> 			  
			  </div>
		    
		     
             	
             	
		    <div class="col-lg-3">
		    	<p  class="formulario-subtitulo" style="color: #ffffff;" >--</p>
			  <input type="text" name="contenido_busqueda" id="contenido_busqueda" value="" class="form-control"/>
			  <div id="mensaje_contenido_busqueda" class="errores"></div>
			  </div>
			  
			<div class="col-lg-2" style="text-align: center;" >
				<p  class="formulario-subtitulo" style="color: #ffffff;" >--</p>	
			  	<input type="submit" id="buscar" name="buscar"  value="Buscar" onClick="Ok()" class="btn btn-warning"/>
			</div>
			
              	
		     <?php } ?>
     
     </div>
     
      <div class="col-lg-12">
      
     <div style="">
     </div>
    		
		<div class="col-lg-12" style="margin: 5px;">	

	     <div class="col-lg-12">
		 <div class="col-lg-10"></div>
		 <div class="col-lg-2">
		 <span class="form-control" style="margin-bottom:0px;"><strong>Registros:</strong><?php if(!empty($resultSet)) echo "  ".count($resultSet);?></span>
		 </div>
		 </div>
		 <div class="col-lg-12">
        
       <section   style="height:400px;overflow-y:scroll;">
        <table class="table table-hover ">
	         <tr >
	    		
	    		<th style="color:#456789;font-size:80%;">Id Juicio</th>
	    		<th style="color:#456789;font-size:80%;">Entidad</th>
	    		<th style="color:#456789;font-size:80%;">Ciudad</th>
	    		<th style="color:#456789;font-size:80%;">Numero Juicio</th>
	    		<th style="color:#456789;font-size:80%;">Abogado Impulsor</th>
	    		<th style="color:#456789;font-size:80%;">Titulo Credito</th>
	    		<th style="color:#456789;font-size:80%;">Total</th>
	    		<th style="color:#456789;font-size:80%;">Cliente</th>
	    		<th style="color:#456789;font-size:80%;">Tipo</th>
	    		<th style="color:#456789;font-size:80%;">Descripcion</th>
	    		<th style="color:#456789;font-size:80%;">Estado Procesal</th>
	    		<th style="color:#456789;font-size:80%;">Fecha Emision</th>
	    		<th style="color:#456789;font-size:80%;">Estado Auto Pago</th>
	    		<th style="color:#456789;font-size:80%;">Nombre Archivado</th>
	    		<th style="color:#456789;font-size:80%;"></th>
	    		
	    		<th></th>
	    		<th></th>
	  		</tr>
            
	            <?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
	        		<tr>
	        		
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->id_juicios; ?></td>
	                   
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_entidades; ?></td>
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_ciudad; ?></td>
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->juicio_referido_titulo_credito; ?></td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_usuarios; ?>     </td> 
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->id_titulo_credito; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->total; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombres_clientes; ?>  </td>
		               
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_tipo_juicios; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->descipcion_auto_pago_juicios; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_estado_procesal_juicios; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->fecha_emision_juicios; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_estados_auto_pago_juicios; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_archivado_juicios; ?>  </td>
		                
		    		</tr>
		        <?php } } ?>
		        
      
        
            
            
       	</table>     
		     
      </section>
    </div>
		 </div>
      </div>
     
     </div>
     
     
  
</form>
    </div>
   </div>
     </body>  
    </html>   