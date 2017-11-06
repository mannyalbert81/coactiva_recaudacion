  	 
     

<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Matriz Juicios - coactiva 2017</title>
        
         
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
		
    	 <script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#generar").click(function() 
			{
		   
		    	var fecha_providencias = $("#fecha_levantamiento").val();
		     	var hora_providencias = $("#hora_levantamiento").val();
		     
		        var numero_oficio  = $("#numero_oficio").val();
		        var dirigido_levantamiento  = $("#dirigido_levantamiento").val();
		    	var razon_providencias = $("#razon_levantamiento").val();
		    			
		    	if (fecha_providencias == "")
		    	{
			    	
		    		$("#mensaje_fecha").text("Introduzca una Fecha");
		    		$("#mensaje_fecha").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (hora_providencias == "")
		    	{
			    	
		    		$("#mensaje_hora").text("Introduzca una Hora");
		    		$("#mensaje_hora").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_hora").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	

		    	if (numero_oficio == "")
		    	{
			    	
		    		$("#mensaje_numero_oficio").text("Introduzca # Oficio y Fecha");
		    		$("#mensaje_numero_oficio").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_numero_oficio").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (dirigido_levantamiento == "")
		    	{
			    	
		    		$("#mensaje_dirigido").text("Introduzca a quién va Dirigido");
		    		$("#mensaje_dirigido").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_dirigido").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	if (razon_providencias == "")
		    	{
			    	
		    		$("#mensaje_razon").text("Introduzca una Razón");
		    		$("#mensaje_razon").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_razon").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
			}); 

	
				$( "#fecha_levantamiento" ).focus(function() {
					$("#mensaje_fecha").fadeOut("slow");
    			});

				$( "#hora_levantamiento" ).focus(function() {
					$("#mensaje_hora").fadeOut("slow");
    			});
				

				$( "#numero_oficio" ).focus(function() {
					$("#mensaje_numero_oficio").fadeOut("slow");
    			});
				$( "#dirigido_levantamiento" ).focus(function() {
					$("#mensaje_dirigido").fadeOut("slow");
    			});

				$( "#razon_levantamiento" ).focus(function() {
					$("#mensaje_razon").fadeOut("slow");
    			});
					    
		}); 

	</script>
	

    </head>
    <body style="background-color: #d9e3e4;">
    
        <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       <?php
       
  
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
       $sel_identificacion_clientes="";
       $sel_id_provincias="";
       $sel_id_estados_procesales_juicios="";
        $sel_id_abogado="";
        
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_id_provincias=$_POST['id_provincias'];
       	$sel_id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
       	$sel_id_abogado = $_POST['id_abogado'];
       
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("MatrizJuicios","Imprimir_ProvidenciaLevantamiento"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos Providencia Levantamiento</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  							
  		<div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Fecha Providencia:</p>
			  	<input type="date"  name="fecha_levantamiento" id="fecha_levantamiento" value="" class="form-control "/> 
			  	<div id="mensaje_fecha" class="errores"></div>
			    <input type="hidden"  name="id_juicios" id="id_juicios" value="<?php echo $datos['id_juicios']; ?>" class="form-control"/ readonly>
			    <input type="hidden"  name="id_clientes" id="id_clientes" value="<?php echo $datos['id_clientes']; ?>" class="form-control"/ readonly>
			    <input type="hidden"  name="id_titulo_credito" id="id_titulo_credito" value="<?php echo $datos['id_titulo_credito']; ?>" class="form-control"/ readonly>
			  
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Hora Providencia:</p>
			  	<input type="time"  name="hora_levantamiento" id="hora_levantamiento" value="" class="form-control "/> 
			    <div id="mensaje_hora" class="errores"></div>
		 </div>
		 
		  <div class="col-lg-4 col-md-4 xs-6">
         		<p class="formulario-subtitulo" >Cliente:</p>
			  	<input type="text"  name="nombres_clientes" id="nombres_clientes" value="<?php echo $datos['nombres_clientes']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" ># Juicio:</p>
			  	<input type="text"  name="juicio_referido_titulo_credito" id="juicio_referido_titulo_credito" value="<?php echo $datos['juicio_referido_titulo_credito']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" ># Operación:</p>
			  	<input type="text"  name="numero_titulo_credito" id="numero_titulo_credito" value="<?php echo $datos['numero_titulo_credito']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		   <div class="col-lg-12 col-md-12 xs-6">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 1:</p>
			  	<input type="text"  name="numero_oficio" id="numero_oficio" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio" class="errores"></div>
		  </div>
		  
		   <div class="col-lg-12 col-md-12 xs-6">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 2:</p>
			  	<input type="text"  name="numero_oficio1" id="numero_oficio1" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio1" class="errores"></div>
		  </div>
		  
		   <div class="col-lg-12 col-md-12 xs-6">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 3:</p>
			  	<input type="text"  name="numero_oficio2" id="numero_oficio2" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio2" class="errores"></div>
		  </div>
		  
		   <div class="col-lg-12 col-md-12 xs-6">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 4:</p>
			  	<input type="text"  name="numero_oficio3" id="numero_oficio3" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio3" class="errores"></div>
		  </div>
		   
		    <div class="col-xs-12 col-md-12">
		                          
		                          <p class="formulario-subtitulo" >Dirigido A:</p>
                                  <textarea type="text"  class="form-control" id="dirigido_levantamiento" name="dirigido_levantamiento" value=""  placeholder="Ingrese a quién va Dirigido"></textarea>
                                 <div id="mensaje_dirigido" class="errores"></div>
             </div>
             <div class="col-xs-12 col-md-12">
		                          
		                          <p class="formulario-subtitulo" >Razón Providencias:</p>
                                  <textarea type="text"  class="form-control" id="razon_levantamiento" name="razon_levantamiento" value=""  placeholder="Ingrese Razón"></textarea>
                                 <div id="mensaje_razon" class="errores"></div>
             </div>
		
         
          
           </div>
  		
  		
  		
  		
  		
  		
  		<div class="col-lg-12 col-md-12 xs-12 " style="text-align: center; margin-top: 10px">
  		    
		 <button type="submit" id="generar" name="generar" value=""   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Providencia</button>         
	  
	 
	     </div>
		 
		
	     
		</div>
		    
		    </div>
	        </div>
	        </div>
         
         
       </form>
     
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
      
      
      
     
     
   </body>  

    </html>   
    
  

    
