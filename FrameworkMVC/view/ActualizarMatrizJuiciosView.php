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
     /*
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#actualizar").click(function() 
			{
		   
		    	var fecha_emision_juicios = $("#fecha_emision_juicios").val();
		     	var fecha_ultima_providencia = $("#fecha_ultima_providencia").val();
		     	
		    
		   				
		    	if (fecha_emision_juicios == "")
		    	{
			    	
		    		$("#mensaje_fecha_emision_juicios").text("Introduzca una Fecha");
		    		$("#mensaje_fecha_emision_juicios").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha_emision_juicios").fadeOut("slow"); //Muestra mensaje de error
		            
				}


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


		    	
		    	
		    	
			}); 

	
				$( "#fecha_emision_juicios" ).focus(function() {
					$("#mensaje_fecha_emision_juicios").fadeOut("slow");
    			});

				$( "#fecha_ultima_providencia" ).focus(function() {
					$("#mensaje_fecha_ultima_providencia").fadeOut("slow");
    			});
				
				
					    
		}); 
*/
	</script>
	
  
   
        
    <script type="text/javascript">
	$(document).ready(function(){
		//load_juicios(1);

		$("#buscar").click(function(){
			var fechadesde=$("#fcha_desde").val();
			 var fechahasta=$("#fcha_hasta").val();
			 var validar = true;
			 var mensaje ="";
			 
		     if(fechadesde>fechahasta)
			 {validar = false;mensaje="Fecha desde no puede ser mayor"}
			
			if(validar){
			load_matriz(1);
			}else{
				 alert(mensaje);
			}

			});
	});

	
	function load_matriz(pagina){
		
		//iniciar variables
		 var con_juicio_referido_titulo_credito=$("#juicio_referido_titulo_credito").val();
		 var con_numero_titulo_credito=$("#numero_titulo_credito").val();
		 var con_id_provincias=$("#id_provincias").val();
		 var con_id_estados_procesales_juicios=$("#id_estados_procesales_juicios").val();
		 var con_fechadesde=$("#fcha_desde").val();
		 var con_fechahasta=$("#fcha_hasta").val();
		 var con_identificacion_clientes=$("#identificacion_clientes").val();
		 var con_identificacion_clientes_1=$("#identificacion_clientes_1").val();
		 var con_identificacion_clientes_2=$("#identificacion_clientes_2").val();
		 var con_identificacion_clientes_3=$("#identificacion_clientes_3").val();


		 var con_identificacion_garantes=$("#identificacion_garantes").val();
		 var con_identificacion_garantes_1=$("#identificacion_garantes_1").val();
		 var con_identificacion_garantes_2=$("#identificacion_garantes_2").val();
		 var con_identificacion_garantes_3=$("#identificacion_garantes_3").val();
		 

		  var con_datos={
				  juicio_referido_titulo_credito:con_juicio_referido_titulo_credito,
				  numero_titulo_credito:con_numero_titulo_credito,
				  id_provincias:con_id_provincias,
				  id_estados_procesales_juicios:con_id_estados_procesales_juicios,
				  fcha_desde:con_fechadesde,
				  fcha_hasta:con_fechahasta,
				  
				  identificacion_clientes:con_identificacion_clientes,
				  identificacion_clientes_1:con_identificacion_clientes_1,
				  identificacion_clientes_2:con_identificacion_clientes_2,
				  identificacion_clientes_3:con_identificacion_clientes_3,
				  
				  identificacion_garantes:con_identificacion_garantes,
				  identificacion_garantes_1:con_identificacion_garantes_1,
				  identificacion_garantes_2:con_identificacion_garantes_2,
				  identificacion_garantes_3:con_identificacion_garantes_3,
				  
				  action:'ajax',
				  page:pagina
				  };


		$("#matriz").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("MatrizJuicios","index3");?>",
            type : "POST",
            async: true,			
			data: con_datos,
			 beforeSend: function(objeto){
			$("#matriz").html('<img src="view/images/ajax-loader.gif"> Cargando...');
			},
			success:function(data){
				$(".div_matriz").html(data).fadeIn('slow');
				$("#matriz").html("");
			}
		})
	}
	
	</script>
	
	
	 <script>

		$(document).ready(function(){

			$fechad=$('#fcha_desde').val();
		    $fechah=$('#fcha_hasta').val();
		    
		    if (typeof $fechad != "undefined" || $fechad != null || typeof $fechah != "undefined" || $fechah != null)
		    {
			    $fechadesde=$('#fcha_desde');
			    $fechahasta=$('#fcha_hasta');
			    if ($fechadesde[0].type!="date"){
			    $fechadesde.attr('readonly','readonly');
			    $fechadesde.datepicker({
		    		changeMonth: true,
		    		changeYear: true,
		    		dateFormat: "yy-mm-dd",
		    		yearRange: "1900:2017"
		    		});
			    }
	
			    
			    if ($fechahasta[0].type!="date"){
			    $fechahasta.attr('readonly','readonly');
			    $fechahasta.datepicker({
		    		changeMonth: true,
		    		changeYear: true,
		    		dateFormat: "yy-mm-dd",
		    		yearRange: "1900:2017"
		    		});
			    }
		    }

		    $fechaEmision=$('#fecha_emision_juicios');
		    if ($fechaEmision[0].type!="date"){
		    $fechaEmision.attr('readonly','readonly');
		    $fechaEmision.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1800:2017"
	    		});
		    }

		    $fechaUltProv=$('#fecha_ultima_providencia');
		    if ($fechaUltProv[0].type!="date"){
		    $fechaUltProv.attr('readonly','readonly');
		    $fechaUltProv.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1800:2017"
	    		});
		    }


		    $fechaResProv=$('#fecha_providencia_restructuracion');
		    if ($fechaResProv[0].type!="date"){
		    $fechaResProv.attr('readonly','readonly');
		    $fechaResProv.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1800:2017"
	    		});
		    }

		    

		}); 

	</script>
	
	

    </head>
    <body style="background-color: #d9e3e4;">
    
      
       
       <?php
       
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
       
       $sel_id_provincias="";
       $sel_id_estados_procesales_juicios="";
       $sel_id_abogado="";
       
       $sel_identificacion_clientes="";
       $sel_identificacion_clientes_1="";
       $sel_identificacion_clientes_2="";
       $sel_identificacion_clientes_3="";
        
       
       $sel_identificacion_garantes="";
       $sel_identificacion_garantes_1="";
       $sel_identificacion_garantes_2="";
       $sel_identificacion_garantes_3="";
       
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       
       	$sel_id_provincias=$_POST['id_provincias'];
       	$sel_id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
       	$sel_id_abogado = $_POST['id_abogado'];
       	
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_identificacion_clientes_1=$_POST['identificacion_clientes_1'];
       	$sel_identificacion_clientes_2=$_POST['identificacion_clientes_2'];
       	$sel_identificacion_clientes_3=$_POST['identificacion_clientes_3'];
       	
       	$sel_identificacion_garantes=$_POST['identificacion_garantes'];
       	$sel_identificacion_garantes_1=$_POST['identificacion_garantes_1'];
       	$sel_identificacion_garantes_2=$_POST['identificacion_garantes_2'];
       	$sel_identificacion_garantes_3=$_POST['identificacion_garantes_3'];
       	
       
       }
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
              <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
              	<form action="<?php echo $helper->url("MatrizJuicios","ActualizarMatriz"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
     
                       <br>         
         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Actualizar Datos Juicios</h4>
	         </div>
	         <div class="panel-body">
			            <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='modal_edit_orden' class='control-label'>Orden</label><br>
				        <input type='text' class='form-control' id='modal_edit_orden' name='modal_edit_orden' value="<?php echo $resEdit->id_juicios; ?>" readonly >
				        </div>
					    </div>
					    <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='regional' class='control-label'>Regional</label><br>
				        <input type='text' class='form-control' id='regional' name='regional' value="<?php echo $resEdit->regional; ?>" >
				        <input type='hidden' class='form-control'  id='id_juicios' name='id_juicios' value="<?php echo $resEdit->id_juicios; ?>" >
				        <input type='hidden' class='form-control'  id='id_clientes' name='id_clientes' value="<?php echo $resEdit->id_clientes; ?>">
				        <input type='hidden' class='form-control'  id='id_titulo_credito' name='id_titulo_credito' value="<?php echo $resEdit->id_titulo_credito; ?>"  >
						</div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='juicio_referido_titulo_credito' class='control-label'># Juicio</label><br>
				        <input type='text' class='form-control' id='juicio_referido_titulo_credito' name='juicio_referido_titulo_credito' value="<?php echo $resEdit->juicio_referido_titulo_credito; ?>">
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='year_juicios' class='control-label'>Año Juicio</label><br>
				        <input type='text' class='form-control' id='year_juicios' name='year_juicios' value="<?php echo $resEdit->year_juicios; ?>"  >
				        </div>
				        </div>
				         
			 </div>
		</div>
			
			
			 <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Actualizar Datos Cliente</h4>
	         </div>
	         <div class="panel-body">
			
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes' class='control-label'>Cedula Cliente 1</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes' name='identificacion_clientes' value="<?php echo $resEdit->identificacion_clientes; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombres_clientes' class='control-label'>Nombres Cliente 1</label><br>
				        <input type='text' class='form-control' id='nombres_clientes' name='nombres_clientes' value="<?php echo $resEdit->nombres_clientes; ?>"  >
				        </div>
				        </div>	
						
						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes" id="sexo_clientes"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_clientes =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_clientes =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>	

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes' class='control-label'>Correo Cliente 1</label><br>
				        <input type='email' class='form-control' id='correo_clientes' name='correo_clientes' value="<?php echo $resEdit->correo_clientes; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes' class='control-label'>Dirección Cliente 1</label><br>
				        <input type='text' class='form-control' id='direccion_clientes' name='direccion_clientes' value="<?php echo $resEdit->direccion_clientes; ?>"  >
				        </div>
				        </div>	

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_1' class='control-label'>Cedula Cliente 2</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_1' name='identificacion_clientes_1' value="<?php echo $resEdit->identificacion_clientes_1; ?>" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_1' class='control-label'>Nombres Cliente 2</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_1' name='nombre_clientes_1' value="<?php echo $resEdit->nombre_clientes_1; ?>"  >
				        </div>
				        </div>

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_1' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_1" id="sexo_clientes_1"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_clientes_1 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_clientes_1 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_1' class='control-label'>Correo Cliente 2</label><br>
				        <input type='email' class='form-control' id='correo_clientes_1' name='correo_clientes_1' value="<?php echo $resEdit->correo_clientes_1; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_1' class='control-label'>Dirección Cliente 2</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_1' name='direccion_clientes_1' value="<?php echo $resEdit->direccion_clientes_1; ?>" >
				        </div>
				        </div>

				       
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_2' class='control-label'>Cedula Cliente 3</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_2' name='identificacion_clientes_2' value="<?php echo $resEdit->identificacion_clientes_2; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_2' class='control-label'>Nombres Cliente 3</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_2' name='nombre_clientes_2' value="<?php echo $resEdit->nombre_clientes_2; ?>"  >
				        </div>
				        </div>

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_2' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_2" id="sexo_clientes_2"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_clientes_2 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_clientes_2 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_2' class='control-label'>Correo Cliente 3</label><br>
				        <input type='email' class='form-control' id='correo_clientes_2' name='correo_clientes_2' value="<?php echo $resEdit->correo_clientes_2; ?>" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_2' class='control-label'>Dirección Cliente 3</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_2' name='direccion_clientes_2' value="<?php echo $resEdit->direccion_clientes_2; ?>"  >
				        </div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_clientes_3' class='control-label'>Cedula Cliente 4</label><br>
				        <input type='text' class='form-control' id='identificacion_clientes_3' name='identificacion_clientes_3' value="<?php echo $resEdit->identificacion_clientes_3; ?>" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_clientes_3' class='control-label'>Nombres Cliente 4</label><br>
				        <input type='text' class='form-control' id='nombre_clientes_3' name='nombre_clientes_3' value="<?php echo $resEdit->nombre_clientes_3; ?>"  >
				        </div>
				        </div>
						
						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_clientes_3' class='control-label'>Sexo</label><br>
						<select name="sexo_clientes_3" id="sexo_clientes_3"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_clientes_3 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_clientes_3 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>

				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_clientes_3' class='control-label'>Correo Cliente 4</label><br>
				        <input type='email' class='form-control' id='correo_clientes_3' name='correo_clientes_3' value="<?php echo $resEdit->correo_clientes_3; ?>" >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_clientes_3' class='control-label'>Dirección Cliente 4</label><br>
				        <input type='text' class='form-control' id='direccion_clientes_3' name='direccion_clientes_3' value="<?php echo $resEdit->direccion_clientes_3; ?>"  >
				        </div>
				        </div>
			
			
			
			
			
		    </div>
		</div>
			
			<div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Actualizar Datos Garante</h4>
	         </div>
	         <div class="panel-body">
	        		   
	        		    <div class = 'row'>
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes' class='control-label'>Cedula Garante 1</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes' name='identificacion_garantes' value="<?php echo $resEdit->identificacion_garantes; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes' class='control-label'>Nombres Garante 1</label><br>
				        <input type='text' class='form-control' id='nombre_garantes' name='nombre_garantes' value="<?php echo $resEdit->nombre_garantes; ?>"  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes" id="sexo_garantes"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_garantes =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_garantes =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_1' class='control-label'>Correo Garante 1</label><br>
				        <input type='email' class='form-control' id='correo_garantes_1' name='correo_garantes_1' value="<?php echo $resEdit->correo_garantes_1; ?>" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_1' class='control-label'>Dirección Garante 1</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_1' name='direccion_garantes_1' value="<?php echo $resEdit->direccion_garantes_1; ?>"  >
				        </div>
				        </div>
				        
				        </div>	
				        
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_1' class='control-label'>Cedula Garante 2</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_1' name='identificacion_garantes_1' value="<?php echo $resEdit->identificacion_garantes_1; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_1' class='control-label'>Nombres Garante 2</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_1' name='nombre_garantes_1' value="<?php echo $resEdit->nombre_garantes_1; ?>"  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_1' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_1" id="sexo_garantes_1"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_garantes_1 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_garantes_1 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_2' class='control-label'>Correo Garante 2</label><br>
				        <input type='email' class='form-control' id='correo_garantes_2' name='correo_garantes_2' value="<?php echo $resEdit->correo_garantes_2; ?>" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_2' class='control-label'>Dirección Garante 2</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_2' name='direccion_garantes_2' value="<?php echo $resEdit->direccion_garantes_2; ?>"  >
				        </div>
				        </div>
				        </div>
				         
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_2' class='control-label'>Cedula Garante 3</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_2' name='identificacion_garantes_2' value="<?php echo $resEdit->identificacion_garantes_2; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_2' class='control-label'>Nombres Garante 3</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_2' name='nombre_garantes_2' value="<?php echo $resEdit->nombre_garantes_2; ?>"  >
				        </div>
				        </div>	

						<div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_2' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_2" id="sexo_garantes_2"  class="form-control">
							<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_garantes_2 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_garantes_2 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_3' class='control-label'>Correo Garante 3</label><br>
				        <input type='email' class='form-control' id='correo_garantes_3' name='correo_garantes_3' value="<?php echo $resEdit->correo_garantes_3; ?>" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_3' class='control-label'>Dirección Garante 3</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_3' name='direccion_garantes_3' value="<?php echo $resEdit->direccion_garantes_3; ?>"  >
				        </div>
				        </div>
				        </div>
				        
				        <div class = 'row'>
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='identificacion_garantes_3' class='control-label'>Cedula Garante 4</label><br>
				        <input type='text' class='form-control' id='identificacion_garantes_3' name='identificacion_garantes_3' value="<?php echo $resEdit->identificacion_garantes_3; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-4 col-lg-4'>
				        <div class='form-group'>
				        <label for='nombre_garantes_3' class='control-label'>Nombres Garante 4</label><br>
				        <input type='text' class='form-control' id='nombre_garantes_3' name='nombre_garantes_3' value="<?php echo $resEdit->nombre_garantes_3; ?>"  >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-1 col-lg-1'>
				        <div class='form-group'>
				        <label for='sexo_garantes_3' class='control-label'>Sexo</label><br>
						<select name="sexo_garantes_3" id="sexo_garantes_3"  class="form-control">
						<option value="" selected="selected">---</option>
										<option value="M"  <?php  if ( $resEdit->sexo_garantes_3 =='M')  echo ' selected="selected" ' ; ?> >M </option>
						            	<option value="F" <?php  if ( $resEdit->sexo_garantes_3 =='F')  echo ' selected="selected" ' ; ?> >F </option>
					    </select>
  						</div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='correo_garantes_4' class='control-label'>Correo Garante 4</label><br>
				        <input type='email' class='form-control' id='correo_garantes_4' name='correo_garantes_4' value="<?php echo $resEdit->correo_garantes_4; ?>" >
				        </div>
				        </div>	
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='direccion_garantes_4' class='control-label'>Dirección Garante 4</label><br>
				        <input type='text' class='form-control' id='direccion_garantes_4' name='direccion_garantes_4' value="<?php echo $resEdit->direccion_garantes_4; ?>"  >
				        </div>
				        </div>
				        </div>
				        
		    </div>
		</div>
		
		
		<div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Actualizar Datos Operación</h4>
	         </div>
	         <div class="panel-body">
						<div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='numero_titulo_credito' class='control-label'># Operación</label><br>
				        <input type='text' class='form-control' id='numero_titulo_credito' name='numero_titulo_credito' value="<?php echo $resEdit->numero_titulo_credito; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='fecha_emision_juicios' class='control-label'>Fecha Auto Pagos</label><br>
				        <input type='date' class='form-control' id='fecha_emision_juicios' name='fecha_emision_juicios' min="1800-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo $resEdit->fecha_emision_juicios; ?>"   >
				        <div id="mensaje_fecha_emision_juicios" class="errores"></div>
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='cuantia_inicial' class='control-label'>Cuantia Inicial</label><br>
				        <input type='text' class='form-control' id='cuantia_inicial' name='cuantia_inicial' value="<?php echo $resEdit->cuantia_inicial; ?>"  >
				        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='riesgo_actual' class='control-label'>Riesgo Actual</label><br>
				        <input type='text' class='form-control' id='riesgo_actual' name='riesgo_actual' value="<?php echo $resEdit->riesgo_actual; ?>">
				        </div>
				        </div>	
<br>
 						
 						<div class="col-xs-12 col-md-2 col-lg-2">
 						 <div class='form-group'>
			  			 <label for='id_provincias' class='control-label'>Provincia</label>
			  			<select name="id_provincias" id="id_provincias"  class="form-control" >
						<?php foreach($resultProv as $res) {?>
						<option value="<?php echo $res->id_provincias; ?>" <?php if ($res->id_provincias == $resEdit->id_provincias )  echo  ' selected="selected" '  ;  ?> ><?php echo $res->nombre_provincias; ?> </option>
						            
						<?php } ?>
						</select> 
			  			</div>
						</div>
						
						<div class="col-xs-12 col-md-2 col-lg-2">
 						 <div class='form-group'>
			  			 <label for='id_estados_procesales_juicios' class='control-label'>Estado Procesal</label>
			  			<select name="id_estados_procesales_juicios" id="id_estados_procesales_juicios"  class="form-control" >
						<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>" <?php if ($res->id_estados_procesales_juicios == $resEdit->id_estados_procesales_juicios )  echo  ' selected="selected" '  ;  ?> ><?php echo $res->nombre_estados_procesales_juicios; ?> </option>
						            
						<?php } ?>
						</select> 
			  			</div>
						</div>
						
					    <div class = 'col-xs-12 col-md-2 col-lg-2'>
				        <div class='form-group'>
				        <label for='fecha_ultima_providencia' class='control-label'>Fecha Ult Providencia</label><br>
				        <input type='date' class='form-control' id='fecha_ultima_providencia' name='fecha_ultima_providencia' min="1800-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo $resEdit->fecha_ultima_providencia; ?>"  >
				         <div id="mensaje_fecha_ultima_providencia" class="errores"></div>
				        </div>
				        </div>
				        
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='impulsores' class='control-label'>Impulsor</label><br>
				        <input type='text' class='form-control' id='impulsores' name='impulsores' value="<?php echo $resEdit->impulsores; ?>" readonly>
				        </div>
				        </div>
				        <div class = 'col-xs-12 col-md-3 col-lg-3'>
				        <div class='form-group'>
				        <label for='secretarios' class='control-label'>Secretario</label><br>
				        <input type='text' class='form-control' id='secretarios' name='secretarios' value="<?php echo $resEdit->secretarios; ?>" readonly>
				        </div>
				        </div>
 						
 						<br>
					    <div class = 'col-xs-12 col-md-6 col-lg-6'>
				        <div class='form-group'>
				        <label for='descripcion_estado_procesal' class='control-label'>Descripción Etapa Procesal</label><br>
				        <textarea type='text' class='form-control' id='descripcion_estado_procesal' name='descripcion_estado_procesal'  placeholder='Descripción'><?php echo $resEdit->descripcion_estado_procesal; ?></textarea>
                        </div>
				        </div>	
				        <div class = 'col-xs-12 col-md-6 col-lg-6'>
				        <div class='form-group'>
				        <label for='estrategia_seguir' class='control-label'>Estrategia Seguir</label><br>
				        <textarea type='text' class='form-control' id='estrategia_seguir' name='estrategia_seguir'  placeholder='Estrategia a Seguir'><?php echo $resEdit->estrategia_seguir; ?></textarea>
	                    </div>
				        </div>
				        <div class = 'col-xs-12 col-md-12 col-lg-12'>
				        <div class='form-group'>
				        <label for='observaciones' class='control-label'>Observaciones</label><br>
				        <textarea type='text' class='form-control' id='observaciones' name='observaciones'  placeholder='Observaciones'><?php echo $resEdit->observaciones; ?></textarea>
		                </div>
				        </div>
			
		    </div>
		</div>
	
	
		
	
			    <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Actualizar Datos Restructuración  (LLENAR SOLO SI TIENE RESTRUCTURACION DEL PROCESO)</h4>
	         	</div>
	        	<div class="panel-body">
			
					<?php if (count($resultEdit2) > 0)   { foreach($resultEdit2 as $resEdit2) {?>
					    
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        
				        <div class='form-group'>
				        <label for='fecha_emision_juicios' class='control-label'>Fecha Providencia A</label><br>
				        <input type='date' class='form-control' id='fecha_providencia_restructuracion' name='fecha_providencia_restructuracion' min="1800-01-01" max="<?php echo date('Y-m-d');?>" value="<?php    echo $resEdit2->fecha_providencia_restructuracion; ?>"   >
				        <div id="mensaje_fecha_emision_juicios" class="errores"></div>
				        </div>
				        </div>
				        
				         <div class="col-xs-12 col-md-4 col-lg-4">
 						 <div class='form-group'>
			  			 <label for='tipo_restructutacion' class='control-label'>Tipo Restructuración</label>
			  			<select name="tipo_restructutacion" id="tipo_restructutacion"  class="form-control" >
						<option value="0"  > SELECCIONE </option>
						<?php foreach($resultTipoRestructuracion as $res) {?>
						<option value="<?php echo $res->id_tipo_restructuracion; ?>" <?php if ($res->id_tipo_restructuracion == $resEdit2->id_tipo_restructuracion )  echo  ' selected="selected" '  ;  ?> ><?php echo $res->nombre_tipo_restructuracion; ?> </option>
						            
						<?php } ?>
						</select> 
			  			</div>
						</div>
						
						
						<div class="col-xs-12 col-md-3 col-lg-3">
 						 <div class='form-group'>
			  			 <label for='levantamiento_medidas' class='control-label'>Levantamiento de Medidas</label>
			  			
			  			<select name="levantamiento_medidas" id="levantamiento_medidas"  class="form-control" >
							<option value="0"  > SELECCIONE </option>
							
							<option value="TRUE"  <?php if ($resEdit2->levantamiento_medida == "t" ) { echo  ' selected="selected" '  ;}  ?> >SI </option>
							<option value="FALSE"  <?php if ($resEdit2->levantamiento_medida == "f" ){  echo  ' selected="selected" '  ;}  ?> >NO </option>
						
						</select> 
			  			</div>
						</div>
						
						<div class="col-xs-12 col-md-3 col-lg-3">
 						 <div class='form-group'>
			  			 <label for='archivado_restructuracion' class='control-label'>Archivado</label>
			  			<select name="archivado_restructuracion" id="archivado_restructuracion"  class="form-control" >
			  					<option value="0"  > SELECCIONE </option>
			 					<option value="TRUE"  <?php if ($resEdit2->archivado_restructuracion == "t" )  echo  ' selected="selected" '  ;  ?> >SI </option>
			    				<option value="FALSE"  <?php if ($resEdit2->archivado_restructuracion == "f" )  echo  ' selected="selected" '  ;  ?> >NO </option>
						
						</select> 
			  			</div>
						</div>
			
						<?php  } ?>	
						
						
					<?php   } else {?>
						
						<div class = 'col-xs-12 col-md-2 col-lg-2'>
				        
						<div class='form-group'>
				        <label for='fecha_providencia_restructuracion' class='control-label'>Fecha Providencia</label><br>
				        <input type='date' class='form-control' id='fecha_providencia_restructuracion' name='fecha_providencia_restructuracion' min="1800-01-01" max="<?php echo date('Y-m-d');?>" value="<?php    echo $resEdit->fecha_ultima_providencia; ?>"   >
				        <div id="mensaje_fecha_emision_juicios" class="errores"></div>
				        </div>
				        </div>
				        
				         <div class="col-xs-12 col-md-2 col-lg-2">
 						 <div class='form-group'>
			  			 <label for='tipo_restructutacion' class='control-label'>Tipo Restructuración</label>
			  			<select name="tipo_restructutacion" id="tipo_restructutacion"  class="form-control" >
						<option value="0"  > SELECCIONE </option>
						<?php foreach($resultTipoRestructuracion as $res) {?>
						<option value="<?php echo $res->id_tipo_restructuracion; ?>"  > <?php echo $res->nombre_tipo_restructuracion; ?> </option>
						            
						<?php } ?>
						</select> 
			  			</div>
						</div>
			
			
					     <div class="col-xs-12 col-md-3 col-lg-3">
 						 <div class='form-group'>
			  			 <label for='levantamiento_medidas' class='control-label'>Levantamiento de Medidas</label>
			  			<select name="levantamiento_medidas" id="levantamiento_medidas"  class="form-control" >
						<option value="0"  > SELECCIONE </option>
						<option value="TRUE"  > SI </option>
						<option value="FALSE"  > NO </option>            
						
						</select> 
			  			</div>
						</div>
			
						
			   	       <div class="col-xs-12 col-md-3 col-lg-3">
 						 <div class='form-group'>
			  			 <label for='archivado_restructuracion' class='control-label'>Archivado</label>
			  			<select name="archivado_restructuracion" id="archivado_restructuracion"  class="form-control" >
						<option value="0"  > SELECCIONE </option>
						<option value="TRUE"  > SI </option>
						<option value="FALSE"  > NO </option>            
						
						</select> 
			  			</div>
						</div>
			
						
					<?php  } ?>
		    	</div>
			</div>
	
	
		
		
		
		
			
			  <div class="row">
			  <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;" >
			   <button type="submit" id="actualizar" name="actualizar" value="Actualizar"   class="btn btn-success" style="margin-top: 10px;" > Actualizar</button>         
	 	
			  </div>
			</div> 
			<br>
			<br>
			<br>
			<br>
			
			</div>
            </form>
            
		     <?php } } else {?>
               <form action="<?php echo $helper->url("MatrizJuicios","index3"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12" target="_blank">
         
                 <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Actualizar Matriz Juicios</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  	
  		<div class="row">
  		 <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo" style="" >Impulsor:</p>
			  	<select name="id_abogado" id="id_abogado"  class="form-control" readonly>
			   <option value="<?php echo $_SESSION['id_usuarios'];  ?>" <?php if($sel_id_abogado==$_SESSION['id_usuarios']){echo "selected";}?>  ><?php echo $_SESSION['nombre_usuarios'];  ?></option>  
			     
			    </select>
		 </div>
  							
  		<div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" ># Juicio:</p>
			  	<input type="text"  name="juicio_referido_titulo_credito" id="juicio_referido_titulo_credito" value="<?php echo $sel_juicio_referido_titulo_credito;?>" class="form-control "/> 
			   
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" ># Operación:</p>
			  	<input type="text"  name="numero_titulo_credito" id="numero_titulo_credito" value="<?php echo $sel_numero_titulo_credito;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Cliente 1:</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="<?php echo $sel_identificacion_clientes;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Cliente 2:</p>
			  	<input type="text"  name="identificacion_clientes_1" id="identificacion_clientes_1" value="<?php echo $sel_identificacion_clientes_1;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Cliente 3:</p>
			  	<input type="text"  name="identificacion_clientes_2" id="identificacion_clientes_2" value="<?php echo $sel_identificacion_clientes_2;?>" class="form-control "/> 
			    
		 </div>
		 </div>
		 <div class="row">
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Cliente 4:</p>
			  	<input type="text"  name="identificacion_clientes_3" id="identificacion_clientes_3" value="<?php echo $sel_identificacion_clientes_3;?>" class="form-control "/> 
			    
		 </div>
		 
		 
		 
		 <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Garante 1:</p>
			  	<input type="text"  name="identificacion_garantes" id="identificacion_garantes" value="<?php echo $sel_identificacion_garantes;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Garante 2:</p>
			  	<input type="text"  name="identificacion_garantes_1" id="identificacion_garantes_1" value="<?php echo $sel_identificacion_garantes_1;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Garante 3:</p>
			  	<input type="text"  name="identificacion_garantes_2" id="identificacion_garantes_2" value="<?php echo $sel_identificacion_garantes_2;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >CI Garante 4:</p>
			  	<input type="text"  name="identificacion_garantes_3" id="identificacion_garantes_3" value="<?php echo $sel_identificacion_garantes_3;?>" class="form-control "/> 
			    
		 </div>
		 
		 
		 
		 <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo">Estado Procesal:</p>
			  	<select name="id_estados_procesales_juicios" id="id_estados_procesales_juicios"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>"<?php if($sel_id_estados_procesales_juicios==$res->id_estados_procesales_juicios){echo "selected";}?> ><?php echo $res->nombre_estados_procesales_juicios;  ?> </option>
			            <?php } ?>
				</select>

         </div>
		 </div>
         
		 <div class="row">
         <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo">Provincia:</p>
			  	<select name="id_provincias" id="id_provincias"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultProv as $res) {?>
						<option value="<?php echo $res->id_provincias; ?>"<?php if($sel_id_provincias==$res->id_provincias){echo "selected";}?> ><?php echo $res->nombre_provincias;  ?> </option>
			            <?php } ?>
				</select>

         </div>
         
        
		<div class="col-lg-2 col-md-2 col-xs-12">
			<p class="formulario-subtitulo" >Fecha Desde:</p>
			<input type="date"  name="fcha_desde" id="fcha_desde" value="<?php echo '';?>" class="form-control "/> 
		</div>
		<div class="col-lg-2 col-md-2 col-xs-12">
			<p class="formulario-subtitulo" >Fecha Hasta:</p>
			<input type="date"  name="fcha_hasta" id="fcha_hasta" value="<?php echo '';?>" class="form-control "/> 
		</div> 
        
         </div>
          
           </div>
  		
  		
  		<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
  		    
		 <button type="button" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
		  <a href="<?php echo $helper->url("MatrizJuicios","index3"); ?>&id_abogado=<?php echo $_SESSION['id_usuarios']; ?>" class="btn btn-warning" style="margin-top: 10px;"><i class="glyphicon glyphicon-plus"></i></a>
		<button type="submit" id="reporte_rpt_matriz" name="reporte_rpt_matriz" value="Reporte Matriz Juicios"   class="btn btn-success" style="margin-top: 10px;" ><i class="glyphicon glyphicon-print"></i> Matriz Juicios</button>         
	 	 	
	 
	     </div>
		 
		
	     
		</div>
		    
		    </div>
	        </div>
	        </div>
         
         
        		 
		 
		 <div class="col-lg-12 col-md-12 col-xs-12">
		 
	     <div class="col-lg-12 col-md-12 col-xs-12">
	     
	     <div style="height: 200px; display: block;">
		
		 <h4 style="color:#ec971f;"></h4>
			  <div>					
					<div id="matriz" style="position: absolute;	text-align: center;	top: 10px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="div_matriz" ></div><!-- Datos ajax Final -->
		      </div>
		       <br>
				  
		 </div>
		 
		 </div>
		 
		
		 
		 </div>
		 
	 <?php } ?>
      
       </form>
     <br>
			<br>
			
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
       
 
   </body>  

    </html>   
    
  

    
