  	   <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>

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
        
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
         
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		
      
         
     <script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#agregar").click(function() 
			{
		   /*
		    	var fecha_emision_juicios = $("#fecha_emision_juicios").val();
		     	var fecha_ultima_providencia = $("#fecha_ultima_providencia").val();
		     	*/
		     	var numero_titulo_credito = $("#numero_titulo_credito").val();
		     	var juicio_referido_titulo_credito = $("#juicio_referido_titulo_credito").val();
		     	var id_provincias = $("#id_provincias").val();
		     	var id_estados_procesales_juicios = $("#id_estados_procesales_juicios").val();
		     	var juicio_referido_titulo_credito = $("#juicio_referido_titulo_credito").val();
		     
		     	
		     	
		    
		   				
		     	if (juicio_referido_titulo_credito == "")
		    	{
			    	
		    		$("#mensaje_juicio_referido_titulo_credito").text("Introduzca un Número Juicio");
		    		$("#mensaje_juicio_referido_titulo_credito").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_juicio_referido_titulo_credito").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		     	if (numero_titulo_credito == "")
		    	{
			    	
		    		$("#mensaje_numero_titulo_credito").text("Introduzca un Número Operación");
		    		$("#mensaje_numero_titulo_credito").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_numero_titulo_credito").fadeOut("slow"); //Muestra mensaje de error
		            
				}

			     /*	if (fecha_emision_juicios == "")
		    	{
			    	
		    		$("#mensaje_fecha_emision_juicios").text("Introduzca una Fecha");
		    		$("#mensaje_fecha_emision_juicios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha_emision_juicios").fadeOut("slow"); //Muestra mensaje de error
		            
				}*/
				
		    	
		    	

		    	if (id_provincias == "")
		    	{
			    	
		    		$("#mensaje_id_provincias").text("Seleccione Una Provincia");
		    		$("#mensaje_id_provincias").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_provincias").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	if (id_estados_procesales_juicios == "")
		    	{
			    	
		    		$("#mensaje_id_estados_procesales_juicios").text("Seleccione Un Estado Procesal");
		    		$("#mensaje_id_estados_procesales_juicios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_estados_procesales_juicios").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		     	
		     
		    	
/*

		    	if (fecha_ultima_providencia == "")
		    	{
			    	
		    		$("#mensaje_fecha_ultima_providencia").text("Introduzca una Fecha");
		    		$("#mensaje_fecha_ultima_providencia").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha_ultima_providencia").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		    	*/
		    	
		    	
			}); 

		    $( "#juicio_referido_titulo_credito" ).focus(function() {
				$("#mensaje_juicio_referido_titulo_credito").fadeOut("slow");
			});

			$( "#numero_titulo_credito" ).focus(function() {
				$("#mensaje_numero_titulo_credito").fadeOut("slow");
			});
	
			/*	$( "#fecha_emision_juicios" ).focus(function() {
					$("#mensaje_fecha_emision_juicios").fadeOut("slow");
    			});*/

				$( "#id_provincias" ).focus(function() {
					$("#mensaje_id_provincias").fadeOut("slow");
    			});

				$( "#id_estados_procesales_juicios" ).focus(function() {
					$("#mensaje_id_estados_procesales_juicios").fadeOut("slow");
    			});
    			
/*
				$( "#fecha_ultima_providencia" ).focus(function() {
					$("#mensaje_fecha_ultima_providencia").fadeOut("slow");
    			});
			*/
					    
		}); 

	</script>
	
  
   
        <script>

		$(document).ready(function(){

		 

		    $fecha=$('#fecha_emision_juicios');
		    if ($fecha[0].type!="date"){
		    	$fecha.attr('readonly','readonly');
		    	$fecha.datepicker({
		    		changeMonth: true,
		    		changeYear: true,
		    		dateFormat: "yy-mm-dd",
		    		yearRange: "1850:2017"
		    		});
		    }

		    $fecha=$('#fecha_ultima_providencia');
		    if ($fecha[0].type!="date"){
		    $fecha.attr('readonly','readonly');
		    $fecha.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1850:2017"
	    		});
		    }

		}); 

	</script> 
   

    </head>
    <body style="background-color: #d9e3e4;">
    
      
       
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
       

         

               <form action="<?php echo $helper->url("MatrizJuicios","AgregarJuicio"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
     
                       <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos del Juicio</h4>
	         </div>
	         <div class="panel-body">
			            <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='modal_edit_orden' class='control-label'>Orden</label><br>
				        <input type='text' class='form-control' id='modal_edit_orden' name='modal_edit_orden' value="" readonly >
				        </div>
					    </div>
					    <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='regional' class='control-label'>Regional</label><br>
				        <input type='text' class='form-control' id='regional' name='regional' value="" >
				       </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='juicio_referido_titulo_credito' class='control-label'># Juicio</label><br>
				        <input type='text' class='form-control' id='juicio_referido_titulo_credito' name='juicio_referido_titulo_credito' value="">
				        <div id="mensaje_juicio_referido_titulo_credito" class="errores"></div>
				        </div>
				         </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='year_juicios' class='control-label'>Año Juicio</label><br>
				        <input type='text' class='form-control' id='year_juicios' name='year_juicios' value=""  >
				        </div>
				        </div>	
			 </div>
		</div>
			
			
			 <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos del Cliente</h4>
	         </div>
	         <div class="panel-body">
			
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes' class='control-label'>Cedula Cliente 1</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes' name='identificacion_clientes' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombres_clientes' class='control-label'>Nombres Cliente 1</label><br>
				        <input type='text' class='form-control' id='nombres_clientes' name='nombres_clientes' value=""  >
				        </div>
				        </div>	
						
						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes" id="sexo_clientes"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F" >F </option>
					    </select>
  						</div>
				        </div>	

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes' class='control-label'>Correo Cliente 1</label><br>
				        <input type='email' class='form-control' id='correo_clientes' name='correo_clientes' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes' class='control-label'>Dirección Cliente 1</label><br>
				        <input type='text' class='form-control' id='direccion_clientes' name='direccion_clientes' value=""  >
				        </div>
				        </div>	

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_1' class='control-label'>Cedula Cliente 2</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_1' name='identificacion_clientes_1' value="" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_1' class='control-label'>Nombres Cliente 2</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_1' name='nombre_clientes_1' value=""  >
				        </div>
				        </div>

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_1' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_1" id="sexo_clientes_1"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F"  >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_1' class='control-label'>Correo Cliente 2</label><br>
				        <input type='email' class='form-control' id='correo_clientes_1' name='correo_clientes_1' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_1' class='control-label'>Dirección Cliente 2</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_1' name='direccion_clientes_1' value="" >
				        </div>
				        </div>

				       
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_2' class='control-label'>Cedula Cliente 3</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_2' name='identificacion_clientes_2' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_2' class='control-label'>Nombres Cliente 3</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_2' name='nombre_clientes_2' value=""  >
				        </div>
				        </div>

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_2' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_2" id="sexo_clientes_2"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M"  >M </option>
						            	<option value="F"  >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_2' class='control-label'>Correo Cliente 3</label><br>
				        <input type='email' class='form-control' id='correo_clientes_2' name='correo_clientes_2' value="" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_2' class='control-label'>Dirección Cliente 3</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_2' name='direccion_clientes_2' value=""  >
				        </div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_3' class='control-label'>Cedula Cliente 4</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_3' name='identificacion_clientes_3' value="" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_3' class='control-label'>Nombres Cliente 4</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_3' name='nombre_clientes_3' value=""  >
				        </div>
				        </div>
						
						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_3' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_3" id="sexo_clientes_3"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M"  >M </option>
						            	<option value="F"  >F </option>
					    </select>
  						</div>
				        </div>

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_3' class='control-label'>Correo Cliente 4</label><br>
				        <input type='email' class='form-control' id='correo_clientes_3' name='correo_clientes_3' value="" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_3' class='control-label'>Dirección Cliente 4</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_3' name='direccion_clientes_3' value=""  >
				        </div>
				        </div>
			
			
			
			
			
		    </div>
		</div>
			
			<div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos del Garante</h4>
	         </div>
	         <div class="panel-body">
	        		   
	        		    <div class = 'row'>
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes' class='control-label'>Cedula Garante 1</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes' name='identificacion_garantes' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes' class='control-label'>Nombres Garante 1</label><br>
				        <input type='text' class='form-control' id='nombre_garantes' name='nombre_garantes' value=""  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes" id="sexo_garantes"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F" >F </option>
					    </select>
  						</div>
				        </div>
				        
				         <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_1' class='control-label'>Correo Garante 1</label><br>
				        <input type='email' class='form-control' id='correo_garantes_1' name='correo_garantes_1' value="" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_1' class='control-label'>Dirección Garante 1</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_1' name='direccion_garantes_1' value=""  >
				        </div>
				        </div>
				        </div>	
				        
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_1' class='control-label'>Cedula Garante 2</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_1' name='identificacion_garantes_1' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_1' class='control-label'>Nombres Garante 2</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_1' name='nombre_garantes_1' value=""  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_1' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_1" id="sexo_garantes_1"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F" >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_2' class='control-label'>Correo Garante 2</label><br>
				        <input type='email' class='form-control' id='correo_garantes_2' name='correo_garantes_2' value="" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_2' class='control-label'>Dirección Garante 2</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_2' name='direccion_garantes_2' value=""  >
				        </div>
				        </div>
				        </div>
				         
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_2' class='control-label'>Cedula Garante 3</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_2' name='identificacion_garantes_2' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_2' class='control-label'>Nombres Garante 3</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_2' name='nombre_garantes_2' value=""  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_2' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_2" id="sexo_garantes_2"  class="form-control">
							<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F" >F </option>
					    </select>
  						</div>
				        </div>
				        
				          <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_3' class='control-label'>Correo Garante 3</label><br>
				        <input type='email' class='form-control' id='correo_garantes_3' name='correo_garantes_3' value="" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_3' class='control-label'>Dirección Garante 3</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_3' name='direccion_garantes_3' value=""  >
				        </div>
				        </div>
				        </div>
				        
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_3' class='control-label'>Cedula Garante 4</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_3' name='identificacion_garantes_3' value=""  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_3' class='control-label'>Nombres Garante 4</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_3' name='nombre_garantes_3' value=""  >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_3' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_3" id="sexo_garantes_3"  class="form-control">
						<option value="_" selected="selected">---</option>
										<option value="M" >M </option>
						            	<option value="F" >F </option>
					    </select>
  						</div>
				        </div>
				        
				          <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_4' class='control-label'>Correo Garante 4</label><br>
				        <input type='email' class='form-control' id='correo_garantes_4' name='correo_garantes_4' value="" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_4' class='control-label'>Dirección Garante 4</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_4' name='direccion_garantes_4' value=""  >
				        </div>
				        </div>
				        </div>
				        
		    </div>
		</div>
		
		
		<div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos de la Operación</h4>
	         </div>
	         <div class="panel-body">
						<div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='numero_titulo_credito' class='control-label'># Operación</label>
				        <input type='text' class='form-control' id='numero_titulo_credito' name='numero_titulo_credito' value=""  >
				         <div id="mensaje_numero_titulo_credito" class="errores"></div>
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='fecha_emision_juicios' class='control-label'>Fecha Auto Pago</label>
				        <input type='date' class='form-control' id='fecha_emision_juicios' min="1800-01-01" max="<?php echo date('Y-m-d');?>"  name='fecha_emision_juicios' value=""   >
				        <div id="mensaje_fecha_emision_juicios" class="errores"></div>
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='cuantia_inicial' class='control-label'>Cuantia Inicial</label>
				        <input type='text' class='form-control' id='cuantia_inicial' name='cuantia_inicial' value="0.00" >
				        <div id="mensaje_cuantia_inicial" class="errores"></div>
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='riesgo_actual' class='control-label'>Riesgo Actual</label>
				        <input type='text' class='form-control' id='riesgo_actual' name='riesgo_actual' value="">
				        </div>
				        </div>	
   
<br>


 						<div class="col-xs-12 col-md-2 col-lg-2">
 						 <div class='form-group'>
			  			 <label for='id_provincias' class='control-label'>Provincia</label>
			  			<select name="id_provincias" id="id_provincias"  class="form-control" >
			  			 <option value="" selected="selected">--Seleccione--</option>
						<?php foreach($resultProv as $res) {?>
						<option value="<?php echo $res->id_provincias; ?>" ><?php echo $res->nombre_provincias; ?></option>
						            
						<?php } ?>
						</select> 
						  <div id="mensaje_id_provincias" class="errores"></div>
			  			</div>
						</div>
						
						<div class="col-xs-12 col-md-2 col-lg-2">
 						 <div class='form-group'>
			  			 <label for='id_estados_procesales_juicios' class='control-label'>Estado Procesal</label>
			  			<select name="id_estados_procesales_juicios" id="id_estados_procesales_juicios"  class="form-control" >
						 <option value="" selected="selected">--Seleccione--</option>
						<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>" ><?php echo $res->nombre_estados_procesales_juicios; ?> </option>
						            
						<?php } ?>
						</select> 
						  <div id="mensaje_id_estados_procesales_juicios" class="errores"></div>
			  			</div>
						</div>
						
					    <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='fecha_ultima_providencia' class='control-label'>Fecha Ult Providencia</label>
				        <input type='date' class='form-control' id='fecha_ultima_providencia' name='fecha_ultima_providencia' min="1800-01-01" max="<?php echo date('Y-m-d');?>" value=""  >
				         <div id="mensaje_fecha_ultima_providencia" class="errores"></div>
				        </div>
				        </div>
				        
				        <div class="col-lg-3 col-md-3 col-xs-12">
				        <div class='form-group'>
			  			<label for='id_abogado'  class='control-label' >Impulsor:</label>
			  			<select name="id_abogado" id="id_abogado"  class="form-control" readonly>
			   			<option value="<?php echo $_SESSION['id_usuarios'];  ?>" <?php if($sel_id_abogado==$_SESSION['id_usuarios']){echo "selected";}?>  ><?php echo $_SESSION['nombre_usuarios'];  ?></option>  
			    		</select>
		 				</div>
		 				</div>
		 				
				         <div class="col-lg-3 col-md-3 col-xs-12">
				         <div class='form-group'>
			  			<label  for='id_secretario'   class='control-label'>Secretario:</label>
			  				<select name="id_secretario" id="id_secretario"  class="form-control" readonly>
						<?php foreach($resultSecre as $res) {?>
						<option value="<?php echo $res->id_secretario; ?>" ><?php echo $res->secretarios; ?></option>
						            
						<?php } ?>
						</select> 
		 				</div>
 						</div>
 						<br>
					    <div class = 'col-xs-12 col-md-6 col-lg-6'>
				        <div class='form-group'>
				        <label for='descripcion_estado_procesal' class='control-label'>Descripción Etapa Procesal</label><br>
				        <textarea type='text' class='form-control' id='descripcion_estado_procesal' name='descripcion_estado_procesal'  placeholder='Descripción'></textarea>
                        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-6 col-lg-6'>
				        <div class='form-group'>
				        <label for='estrategia_seguir' class='control-label'>Estrategia Seguir</label><br>
				        <textarea type='text' class='form-control' id='estrategia_seguir' name='estrategia_seguir'  placeholder='Estrategia a Seguir'></textarea>
	                    </div>
				        </div>
				        <div class = 'col-xs-12 col-md-12 col-lg-12'>
				        <div class='form-group'>
				        <label for='observaciones' class='control-label'>Observaciones</label><br>
				        <textarea type='text' class='form-control' id='observaciones' name='observaciones'  placeholder='Observaciones'></textarea>
		                </div>
				        </div>
			
		    
		</div>
			
			  <div class="row">
			  <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;" >
			   <button type="submit" id="agregar" name="agregar" value="Agregar"   class="btn btn-success" style="margin-top: 10px;" > Agregar</button>         
	 	
			  </div>
			</div> 
			<br>
			<br>
			<br>
			<br>
			
			</div>
            </form>
            
	
     <br>
			<br>
			
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
       
 
   </body>  

    </html>   
    
  

    
