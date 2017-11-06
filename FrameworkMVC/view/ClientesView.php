


<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Clientes - coactiva 2016</title>
        
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
		
        
        
        <script>
			function abrir() {
			//open('/FrameworkMVC/view/ireports/ContClientesReport.php','','top=500,left=500,width=500,height=500') ;
			open('','','top=500,left=500,width=500,height=500') ;
            
			}
			</script>
			
		   <!-- AQUI NOTIFICAIONES -->
		<script type="text/javascript" src="view/css/lib/alertify.js"></script>
		<link rel="stylesheet" href="view/css/themes/alertify.core.css" />
		<link rel="stylesheet" href="view/css/themes/alertify.default.css" />
		
		
		
		<script>

		function Ok(){
				alertify.success("Has Pulsado en Guardar"); 
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
		$(document).ready(function(){

			$("#Buscar").click(function()

			{

				var contenido = $("#contenido").val();
				var criterio= $("#criterio").val();

				if (contenido != "" && criterio==0)
		    	{
					$("#mensaje_criterio").text("Seleccione filtro de busqueda");
		    		$("#mensaje_criterio").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_criterio").fadeOut("slow"); //Muestra mensaje de error
		    		
		            
				}    

				if (criterio !=0 && contenido=="")
		    	{

			    	
		    		$("#mensaje_contenido").text("Ingrese Contenido a buscar");
		    		$("#mensaje_contenido").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    	
		    		
			    }
		    	else 
		    	{
		    		$("#mensaje_contenido").fadeOut("slow"); //Muestra mensaje de error
		            
				}    


				

		
				
			});


			$( "#contenido" ).focus(function() {
				  $("#mensaje_contenido").fadeOut("slow");
			    });

			$( "#criterio" ).focus(function() {
				  $("#mensaje_criterio").fadeOut("slow");
			    });
		   
			
		});
			</script >
        
        
        
			
			
			<script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#Guardar").click(function() 
			{
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;

		    	var identificacion_clientes = $("#identificacion_clientes").val();
		    	var nombres_clientes = $("#nombres_clientes").val();
		    	var telefono_clientes = $("#telefono_clientes").val();
		    	var celular_clientes = $("#celular_clientes").val();
		    	var direccion_clientes = $("#direccion_clientes").val();
		    	
		    	
		    	
		    	if (identificacion_clientes == "")
		    	{
			    	
		    		$("#mensaje_identificacion_clientes").text("Introduzca una Identificacion");
		    		$("#mensaje_identificacion_clientes").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_identificacion_clientes").fadeOut("slow"); //Muestra mensaje de error
		            
				}    
				
		    	if (nombres_clientes == "")
		    	{
			    	
		    		$("#mensaje_nombres_clientes").text("Introduzca un Nombre");
		    		$("#mensaje_nombres_clientes").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombres_clientes").fadeOut("slow"); //Muestra mensaje de error
		            
				}  

		    	if (telefono_clientes == "")
		    	{
			    	
		    		$("#mensaje_telefono_clientes").text("Introduzca un Teléfono");
		    		$("#mensaje_telefono_clientes").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_telefono_clientes").fadeOut("slow"); //Muestra mensaje de error
		            
				} 

		    	if (celular_clientes == "")
		    	{
			    	
		    		$("#mensaje_celular_clientes").text("Introduzca un Celular");
		    		$("#mensaje_celular_clientes").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_celular_clientes").fadeOut("slow"); //Muestra mensaje de error
		            
				}

		    	if (direccion_clientes == "")
		    	{
			    	
		    		$("#mensaje_direccion_clientes").text("Introduzca una Dirección");
		    		$("#mensaje_direccion_clientes").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_direccion_clientes").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		    	

		    					    

			}); 

		    $( "#identificacion_clientes" ).focus(function() {
				  $("#mensaje_identificacion_clientes").fadeOut("slow");
			    });
				
		        $( "#nombres_clientes" ).focus(function() {
				  $("#mensaje_nombres_clientes").fadeOut("slow");
			    });

		        $( "#telefono_clientes" ).focus(function() {
					  $("#mensaje_telefono_clientes").fadeOut("slow");
				    });
		        $( "#celular_clientes" ).focus(function() {
					  $("#mensaje_celular_clientes").fadeOut("slow");
				    });
		        $( "#direccion_clientes" ).focus(function() {
					  $("#mensaje_direccion_clientes").fadeOut("slow");
				    });
				
		
				
		      
				    
		}); 

	</script>
	
    </head>
    <body style="background-color: #d9e3e4;" >
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       
       
       <?php
    
		?>
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
  <div></div>
    
      <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("Clientes","InsertaClientes"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-6">
            
         
        	    <h4 style="color:#ec971f;">Insertar Clientes</h4>
            	<hr/>
            	
		   		
            
          <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
            
            
         <div class="row">
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Tipo Identificacion</p>
			  	<select name="id_tipo_identificacion" id="id_tipo_identificacion"  class="form-control" >
					<?php foreach($resultTipoIdent as $resTipoIdent) {?>
					<option value="<?php echo $resTipoIdent->id_tipo_identificacion; ?>"  <?php if ($resTipoIdent->id_tipo_identificacion == $resEdit->id_tipo_identificacion ) echo ' selected="selected" '  ; ?> ><?php echo $resTipoIdent->nombre_tipo_identificacion; ?> </option>
						   <?php } ?>
				</select> 
			  </div>
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Numero de Identificación</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="<?php echo $resEdit->identificacion_clientes; ?>" class="form-control" readonly/> 
			    <div id="mensaje_identificacion_clientes" class="errores"></div>
			  <input type="hidden"  name="id_clientes"  value="<?php echo $resEdit->id_clientes; ?>" class="form-control"/> 
			  </div>
			   </div>
			   
			   
		    <div class="row">
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Nombres Cliente</p>
			  	<input type="text" name="nombres_clientes" id="nombres_clientes" value="<?php echo $resEdit->nombres_clientes; ?>" class="form-control"/>
			  <div id="mensaje_nombres_clientes" class="errores"></div>
			  </div>
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Teléfono</p>
			  	<input type="text" name="telefono_clientes" id="telefono_clientes" value="<?php echo $resEdit->telefono_clientes; ?>" class="form-control"/>
			  <div id="mensaje_telefono_clientes" class="errores"></div>
			  </div>
		    </div>
		    
		     <div class="row">
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Celular </p>
			  	<input type="text" name="celular_clientes" id="celular_clientes" value="<?php echo $resEdit->celular_clientes; ?>" class="form-control"/>
			  <div id="mensaje_celular_clientes" class="errores"></div>
			  </div>
			  
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Dirección</p>
			  	<input type="text" name="direccion_clientes" id="direccion_clientes" value="<?php echo $resEdit->direccion_clientes; ?>" class="form-control"/>
			  <div id="mensaje_direccion_clientes" class="errores"></div>
			  </div>
			  
		    </div>
		    
		    
		    <div class="row">
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Juzgado</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control" >
					<?php foreach($resultCiu as $res) {?>
						<option value="<?php echo $res->id_ciudad; ?>" <?php if ($res->id_ciudad == $resEdit->id_ciudad ) echo ' selected="selected" '  ; ?>  ><?php echo $res->nombre_ciudad; ?> </option>
						
			        <?php } ?>
				</select> 
			  </div>
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Tipo Persona</p>
			  	<select name="id_tipo_persona" id="id_tipo_persona"  class="form-control" >
					<?php foreach($resultTipoPer as $res) {?>
						<option value="<?php echo $res->id_tipo_persona; ?>"  <?php if ($res->id_tipo_persona == $resEdit->id_tipo_persona ) echo ' selected="selected" '  ; ?>  ><?php echo $res->nombre_tipo_persona; ?> </option>
						
			        <?php } ?>
				</select> 
			  </div>
		    </div>
		    
		    
		     <div class="row">
		    <div class="col-xs-6 col-md-6" style="margin-top:10px">
			  	<p  class="formulario-subtitulo" >Nombres Garante</p>
			  	<input type="text"  name="nombre_garantes" id="nombre_garantes" value="<?php echo $resEdit->nombre_garantes; ?>" class="form-control" /> 
			    <div id="mensaje_nombre_garantes" class="errores"></div>
			</div>
			  
			   
			   
		   
		    <div class="col-xs-6 col-md-6" style="margin-top:10px">
			  	<p  class="formulario-subtitulo" >Numero de Identificación Garante</p>
			  	<input type="text" name="identificacion_garantes" id="identificacion_garantes" value="<?php echo $resEdit->identificacion_garantes; ?>" class="form-control" readonly/>
			  <div id="mensaje_identificacion_garantes" class="errores"></div>
			    <input type="hidden"  name="id_clientes"  value="<?php echo $resEdit->id_clientes; ?>" class="form-control"/> 
			  </div>
		     </div>
		    
		    <hr>
		    
         
            
            
		     <?php } } else {?>
		    
		    <div class="row">
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Tipo Identificacion</p>
			  	<select name="id_tipo_identificacion" id="id_tipo_identificacion"  class="form-control" >
					<?php foreach($resultTipoIdent as $resTipoIdent) {?>
						<option value="<?php echo $resTipoIdent->id_tipo_identificacion; ?>"  ><?php echo $resTipoIdent->nombre_tipo_identificacion; ?> </option>
			        <?php } ?>
				</select> 
			  </div>
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Numero de Identificación</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="" class="form-control"/> 
			    <div id="mensaje_identificacion_clientes" class="errores"></div>
			  </div>
			   </div>
			   
			   
		    <div class="row">
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Nombres </p>
			  	<input type="text" name="nombres_clientes" id="nombres_clientes" value="" class="form-control"/>
			  <div id="mensaje_nombres_clientes" class="errores"></div>
			  </div>
			  
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Teléfono</p>
			  	<input type="text" name="telefono_clientes" id="telefono_clientes" value="" class="form-control"/>
			  <div id="mensaje_telefono_clientes" class="errores"></div>
			  </div>
			  
		    </div>
		    
		    <div class="row">
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Celular </p>
			  	<input type="text" name="celular_clientes" id="celular_clientes" value="" class="form-control"/>
			  <div id="mensaje_celular_clientes" class="errores"></div>
			  </div>
			  
			  <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Dirección</p>
			  	<input type="text" name="direccion_clientes" id="direccion_clientes" value="" class="form-control"/>
			  <div id="mensaje_direccion_clientes" class="errores"></div>
			  </div>
			  
		    </div>
		    
		    
		    <div class="row">
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Juzgado</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control" >
					<?php foreach($resultCiu as $res) {?>
						<option value="<?php echo $res->id_ciudad; ?>"  ><?php echo $res->nombre_ciudad; ?> </option>
			        <?php } ?>
				</select> 
			  </div>
		    
		    <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Tipo Persona</p>
			  	<select name="id_tipo_persona" id="id_tipo_persona"  class="form-control" >
					<?php foreach($resultTipoPer as $res) {?>
						<option value="<?php echo $res->id_tipo_persona; ?>"  ><?php echo $res->nombre_tipo_persona; ?> </option>
			        <?php } ?>
				</select> 
			  </div>
			   </div>
			   
			   <div class="row">
			   <div class="col-xs-6 col-md-6" style="margin-top:10px">
			  	<p  class="formulario-subtitulo" >Nombres Garante</p>
			  	<input type="text"  name="nombre_garantes" id="nombre_garantes" value="" class="form-control"/> 
			    <div id="mensaje_nombre_garantes" class="errores"></div>
			  </div>
			   
			   
		    <div class="col-xs-6 col-md-6" style="margin-top:10px">
		     <p  class="formulario-subtitulo" >Numero de Identificación Garante</p>
		 	<input type="text" name="identificacion_garantes" id="identificacion_garantes" value="" class="form-control"/>
			  <div id="mensaje_identificacion_garantes" class="errores"></div>
			  </div>
			  </div>
			  
		     
		    <hr>
		    
		   
               	
		     <?php } ?>
		       <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	<input type="submit" id="Guardar" name="Guardar" value="Guardar" onClick="Ok()"class="btn btn-success"/>
			  </div>
			</div>     
               
		
		 <hr>
          
          </form>
       
         <!-- termina el form -->
       
        <div class="col-lg-6">
            <h4 style="color:#ec971f;">Lista de Clientes</h4>
           
     <!-- empieza formulario de busqueda -->
     
            <hr>
        <div class="row">
           <form action="<?php echo $helper->url("Clientes","index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
           
           <div class="col-lg-4">
           <input type="text"  name="contenido" id="contenido" value="" class="form-control"/>
           <div id="mensaje_contenido" class="errores"></div>
            </div>
            
           <div class="col-lg-4">
           <select name="criterio" id="criterio"  class="form-control">
                                    <?php foreach($resultMenu as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>" <?php //if ($resRol->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $desc ?> </option>
                                    <?php } ?>
                                        
           </select>
           <div id="mensaje_criterio" class="errores"></div>
           </div>
          
           
          
           <div class="col-lg-4">
           <input type="submit" id="Buscar" name="Buscar" value="Buscar"  class="btn btn-default"/>
           </div>
        
          </form>
          
       <!-- termina formulario de busqueda -->
        
         
       <section class="col-lg-12  usuario" style="height:400px;overflow-y:scroll;">
        <table class="table table-hover ">
	         <tr >
	    		<th style="color:#456789;font-size:80%;">Id</th>
	    		<th style="color:#456789;font-size:80%;">Identifiación</th>
	    		<th style="color:#456789;font-size:80%;">Nombres Cliente </th>
	    		<th style="color:#456789;font-size:80%;">Teléfono</th>
	    		<th style="color:#456789;font-size:80%;">Celular</th>
	    		<th style="color:#456789;font-size:80%;">Dirección</th>
	    		<th style="color:#456789;font-size:80%;">Juzgado</th>
	    		<th style="color:#456789;font-size:80%;">Nombres Garante</th>
	    		<th style="color:#456789;font-size:80%;">Identificación Garante</th>
	    		
	    		
	    		<th></th>
	    		<th></th>
	  		</tr>
            
	            <?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
	        		<tr>
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->id_clientes; ?></td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->identificacion_clientes; ?>     </td> 
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombres_clientes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->telefono_clientes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->celular_clientes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->direccion_clientes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_ciudad; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_garantes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->identificacion_garantes; ?>  </td>
		             
		              
		           	   <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Clientes","index"); ?>&id_clientes=<?php echo $res->id_clientes; ?>" class="btn btn-warning" onClick="notificacion()" style="font-size:65%;">Editar</a>
			                </div>
			            
			             </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("Clientes","borrarId"); ?>&id_clientes=<?php echo $res->id_clientes; ?>" class="btn btn-danger" onClick="Borrar()" style="font-size:65%;">Borrar</a>
			                </div>
			              
		               </td>
		               
		               <td>   
			                	
			               <hr/>
		               </td>
		    		</tr>
		        <?php } } ?>
            
            <?php 
            
            //echo "<script type='text/javascript'> alert('Hola')  ;</script>";
            //<a href="javascript:abrir('/FrameworkMVC/view/ireports/ContClientesReport.php')" class="btn btn-success" style="font-size:65%;">Reporte</a>
            
            ?>
            
       	</table>     
		     
      </section>
        
        </div>
       
       
      
      </div>
      </div>
   </div>
     </body>  
    </html>   