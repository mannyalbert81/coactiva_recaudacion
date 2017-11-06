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
		
		
		<link rel="stylesheet" href="view/css/pace-theme-center-atom.css" />
		 <script src="view/js/pace.js"></script>
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
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
		 


		 var con_fecha_avoco=$("#fecha_providencias").val();
		 var con_hora_avoco=$("#hora_providencias").val();
		 var con_nombre_impulsor_anterior= $("#nombre_impulsor_anterior").val();
		 var con_nombre_secretario_anterior= $("#nombre_secretario_anterior").val();
		 var con_tipo_avoco= $("#tipo_avoco").val();
		 var con_id_estados_procesales_juicios_actualizar= $("#id_estados_procesales_juicios_actualizar").val();
		 var con_numero_liquidacion= $("#numero_liquidacion").val();
		 var con_fecha_auto_pago=$("#fecha_auto_pago").val();
		 var con_razon_avoco= $("#razon_avoco").val();


		 
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


				  fecha_avoco:con_fecha_avoco,
				  hora_avoco:con_hora_avoco,
				  nombre_impulsor_anterior:con_nombre_impulsor_anterior,
				  nombre_secretario_anterior:con_nombre_secretario_anterior,
				  tipo_avoco:con_tipo_avoco,
				  id_estados_procesales_juicios_actualizar:con_id_estados_procesales_juicios_actualizar,
				  numero_liquidacion:con_numero_liquidacion,
				  fecha_auto_pago:con_fecha_auto_pago,
				  razon_avoco:con_razon_avoco,

				  action:'ajax',
				  page:pagina
				  };


		$("#matriz").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("MatrizJuicios","index2");?>",
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

		    $fechadesde=$('#fcha_desde');
		    if ($fechadesde[0].type!="date"){
		    $fechadesde.attr('readonly','readonly');
		    $fechadesde.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1900:2017"
	    		});
		    }

		    $fechahasta=$('#fcha_hasta');
		    if ($fechahasta[0].type!="date"){
		    $fechahasta.attr('readonly','readonly');
		    $fechahasta.datepicker({
	    		changeMonth: true,
	    		changeYear: true,
	    		dateFormat: "yy-mm-dd",
	    		yearRange: "1900:2017"
	    		});
		    }

		}); 

	</script>

 <script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#reporte_rpt").click(function() 
			{
		   
		    	var fecha_avoco = $("#fecha_providencias").val();
		     	var hora_avoco = $("#hora_providencias").val();
		     	var nombre_impulsor_anterior = $("#nombre_impulsor_anterior").val();
			    var nombre_secretario_anterior = $("#nombre_secretario_anterior").val();
			    var tipo_avoco = $("#tipo_avoco").val();
			    var numero_liquidacion = $("#numero_liquidacion").val();
			    var fecha_auto_pago = $("#fecha_auto_pago").val();


		
	   				
		    	if (fecha_avoco == "")
		    	{
			    	
		    		$("#mensaje_fecha").text("Introduzca una Fecha");
		    		$("#mensaje_fecha").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (hora_avoco == "")
		    	{
			    	
		    		$("#mensaje_hora").text("Introduzca una Hora");
		    		$("#mensaje_hora").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_hora").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (nombre_impulsor_anterior == "")
		    	{
			    	
		    		$("#mensaje_nombre_impulsor_anterior").text("Introduzca Impulsor Saliente");
		    		$("#mensaje_nombre_impulsor_anterior").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombre_impulsor_anterior").fadeOut("slow"); //Muestra mensaje de error
		            
				}

		    	if (nombre_secretario_anterior == "")
		    	{
			    	
		    		$("#mensaje_nombre_secretario_anterior").text("Introduzca Secretario Saliente");
		    		$("#mensaje_nombre_secretario_anterior").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombre_secretario_anterior").fadeOut("slow"); //Muestra mensaje de error
		            
				}

		    	if (tipo_avoco == 0)
		    	{
			    	
		    		$("#mensaje_tipo_avoco").text("Seleccione Tipo Avoco");
		    		$("#mensaje_tipo_avoco").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_tipo_avoco").fadeOut("slow"); //Muestra mensaje de error
		            
				}


				if(tipo_avoco == 1  && numero_liquidacion == ""){
					$("#mensaje_numero_liquidacion").text("Ingrese # Liquidación");
		    		$("#mensaje_numero_liquidacion").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}
				else 
		    	{
		    		$("#mensaje_numero_liquidacion").fadeOut("slow"); //Muestra mensaje de error
		            
				}

				if(tipo_avoco== 2 && numero_liquidacion == ""){
					$("#mensaje_numero_liquidacion").text("Ingrese # Liquidación");
		    		$("#mensaje_numero_liquidacion").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}
				else 
		    	{
		    		$("#mensaje_numero_liquidacion").fadeOut("slow"); //Muestra mensaje de error
		            
				}

				if(tipo_avoco == 1  && fecha_auto_pago == ""){
					$("#mensaje_fecha_auto_pago").text("Ingrese Fecha Auto Pago");
		    		$("#mensaje_fecha_auto_pago").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}
				else 
		    	{
		    		$("#mensaje_fecha_auto_pago").fadeOut("slow"); //Muestra mensaje de error
		            
				}

				if(tipo_avoco== 2 && fecha_auto_pago == ""){
					$("#mensaje_fecha_auto_pago").text("Ingrese Fecha Auto Pago");
		    		$("#mensaje_fecha_auto_pago").fadeIn("slow"); //Muestra mensaje de error
		            return false;
				}
				else 
		    	{
		    		$("#mensaje_fecha_auto_pago").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
			}); 

	
				$( "#fecha_providencias" ).focus(function() {
					$("#mensaje_fecha").fadeOut("slow");
    			});

				$( "#hora_providencias" ).focus(function() {
					$("#mensaje_hora").fadeOut("slow");
    			});
				$( "#nombre_impulsor_anterior" ).focus(function() {
					$("#mensaje_nombre_impulsor_anterior").fadeOut("slow");
    			});
				$( "#nombre_secretario_anterior" ).focus(function() {
					$("#mensaje_nombre_secretario_anterior").fadeOut("slow");
    			});

				$( "#tipo_avoco" ).focus(function() {
					$("#mensaje_tipo_avoco").fadeOut("slow");
    			});
				$( "#numero_liquidacion" ).focus(function() {
					$("#mensaje_numero_liquidacion").fadeOut("slow");
    			});
				$( "#fecha_auto_pago" ).focus(function() {
					$("#mensaje_fecha_auto_pago").fadeOut("slow");
    			});
					    
		}); 

	</script>
	

         <script >
			$(document).ready(function(){
					
				$("#boton_opciones").click(function(){
							
					$('#div_generar_masivo').toggle("slow");
					$('#boton_opciones').fadeOut("slow");
					$('#boton_opciones1').fadeIn("slow");
					
				});

				$("#boton_opciones1").click(function(){
					
					$('#div_generar_masivo').fadeOut("slow");
					$('#boton_opciones').fadeIn("slow");
					$('#boton_opciones1').fadeOut("slow");
					
				});
			});
		</script>

			<script >
			$(document).ready(function(){
			
				$("#div_generar_masivo").fadeOut("slow");
				$('#boton_opciones1').fadeOut("slow");
			});
			</script>
			
			
			 <script type="text/javascript">
      $(document).ready(function(){
          
      $("#tipo_avoco").click(function() {
			
          var tipo_avoco = $(this).val();
			
          if(tipo_avoco == 1 || tipo_avoco== 2)
          {
       	   $("#div_datos_pago_total").fadeIn("slow");
          }
       	
          else
          {
       	   $("#div_datos_pago_total").fadeOut("slow");
          }
         
	    });
	    
	    $("#tipo_avoco").change(function() {
			
              
              var tipo_avoco = $(this).val();
				
              
              if(tipo_avoco == 1 || tipo_avoco== 2)
              {
           	   $("#div_datos_pago_total").fadeIn("slow");
              }
           	
              else
              {
           	   $("#div_datos_pago_total").fadeOut("slow");
              }
              
              
		    });
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
        
        $sel_fecha_avoco="";
        $sel_hora_avoco="";
        $sel_nombre_impulsor_anterior="";
        $sel_nombre_secretario_anterior="";
        $sel_tipo_avoco="";
        $sel_id_estados_procesales_juicios_actualizar="";
        $sel_numero_liquidacion="";
        $sel_fecha_auto_pago="";
        $sel_razon_avoco="";
        
        
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
       
       	$sel_fecha_avoco=$_POST['fecha_providencias'];
       	$sel_hora_avoco=$_POST['hora_providencias'];
       	$sel_nombre_impulsor_anterior= $_POST['nombre_impulsor_anterior'];
       	$sel_nombre_secretario_anterior= $_POST['nombre_secretario_anterior'];
       	$sel_tipo_avoco= $_POST['tipo_avoco'];
       	$sel_id_estados_procesales_juicios_actualizar= $_POST['id_estados_procesales_juicios_actualizar'];
       	$sel_numero_liquidacion= $_POST['numero_liquidacion'];
       	$sel_fecha_auto_pago= $_POST['fecha_auto_pago'];
       	$sel_razon_avoco= $_POST['razon_avoco'];
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("MatrizJuicios","index2"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12" target="_blank">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Matriz Juicios Avoco Conocimiento</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  		
  			<div class="row">
  		 <div class="col-lg-2 col-md-2 xs-6">
			  	<p  class="formulario-subtitulo" style="" >Impulsor:</p>
			  	<select name="id_abogado" id="id_abogado"  class="form-control" readonly>
			   <option value="<?php echo $_SESSION['id_usuarios'];  ?>" <?php if($sel_id_abogado==$_SESSION['id_usuarios']){echo "selected";}?>  ><?php echo $_SESSION['nombre_usuarios'];  ?></option>  
			     
			    </select>
		 </div>
  							
  		<div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" ># Juicio:</p>
			  	<input type="text"  name="juicio_referido_titulo_credito" id="juicio_referido_titulo_credito" value="<?php echo $sel_juicio_referido_titulo_credito;?>" class="form-control "/> 
			   
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" ># Operación:</p>
			  	<input type="text"  name="numero_titulo_credito" id="numero_titulo_credito" value="<?php echo $sel_numero_titulo_credito;?>" class="form-control "/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Cliente 1:</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="<?php echo $sel_identificacion_clientes;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Cliente 2:</p>
			  	<input type="text"  name="identificacion_clientes_1" id="identificacion_clientes_1" value="<?php echo $sel_identificacion_clientes_1;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Cliente 3:</p>
			  	<input type="text"  name="identificacion_clientes_2" id="identificacion_clientes_2" value="<?php echo $sel_identificacion_clientes_2;?>" class="form-control "/> 
			    
		 </div>
		 </div>
		 
		 <div class="row">
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Cliente 4:</p>
			  	<input type="text"  name="identificacion_clientes_3" id="identificacion_clientes_3" value="<?php echo $sel_identificacion_clientes_3;?>" class="form-control "/> 
			    
		 </div>
		 
		 
		 
		 <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Garante 1:</p>
			  	<input type="text"  name="identificacion_garantes" id="identificacion_garantes" value="<?php echo $sel_identificacion_garantes;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Garante 2:</p>
			  	<input type="text"  name="identificacion_garantes_1" id="identificacion_garantes_1" value="<?php echo $sel_identificacion_garantes_1;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Garante 3:</p>
			  	<input type="text"  name="identificacion_garantes_2" id="identificacion_garantes_2" value="<?php echo $sel_identificacion_garantes_2;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >CI Garante 4:</p>
			  	<input type="text"  name="identificacion_garantes_3" id="identificacion_garantes_3" value="<?php echo $sel_identificacion_garantes_3;?>" class="form-control "/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 xs-6">
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
         <div class="col-lg-2 col-md-2 xs-6">
			  	<p  class="formulario-subtitulo">Provincia:</p>
			  	<select name="id_provincias" id="id_provincias"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultProv as $res) {?>
						<option value="<?php echo $res->id_provincias; ?>"<?php if($sel_id_provincias==$res->id_provincias){echo "selected";}?> ><?php echo $res->nombre_provincias;  ?> </option>
			            <?php } ?>
				</select>

         </div>
         
        
          <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Fecha Desde:</p>
			  	<input type="date"  name="fcha_desde" id="fcha_desde" value="<?php echo '';?>" class="form-control "/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Fecha Hasta:</p>
			  	<input type="date"  name="fcha_hasta" id="fcha_hasta" value="<?php echo '';?>" class="form-control "/> 
			    
		 </div>
        </div>
           </div>
  		
  		
  		<div class="col-lg-12 col-md-12 col-xs-12" style="text-align: center; margin-top: 10px">
  		    
		 <button type="button" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
	
	     <br>
	     <button type="button" id="boton_opciones" name="boton_opciones" value="Reporte Matriz Juicios"   class="btn btn-warning" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Avocos Masivos</button>         
          <button type="button" id="boton_opciones1" name="boton_opciones1" style="display: none; margin-top: 10px;" value="Reporte Matriz Juicios"   class="btn btn-danger" ><i class="glyphicon glyphicon-print"></i> Cerrar Avocos Masivos</button>         
	  	  
	     </div>
		 
     	</div>
		    </div>
	        </div>
	        </div>
         
         
        		 
        	
        	
        	
        	
        <div class="col-lg-12 col-md-12 col-xs-12 " id="div_generar_masivo" style="display: none;">
	     
	      <div class="col-lg-12 col-md-12 col-xs-12" style=" text-aling: justify; margin-top:20px;">
            	 <p align="justify"><b><font face="univers" size=3>***Estimados usuarios al generar un documento en el sistema, automáticamente se actualizara la fecha de última providencia del juicio***</font></b></p>
		  </div>
	     
	          <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos Avoco Conocimiento</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  							
  		<div class="col-lg-4 col-md-4 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Avoco:</p>
			  	<input type="date"  name="fecha_providencias" id="fecha_providencias" value="<?php echo $sel_fecha_avoco;?>" class="form-control "/> 
			  	<div id="mensaje_fecha" class="errores"></div>
			   
		 </div>
		 
		  <div class="col-lg-4 col-md-4 col-xs-12">
         		<p class="formulario-subtitulo" >Hora Avoco:</p>
			  	<input type="time"  name="hora_providencias" id="hora_providencias" value="<?php echo $sel_hora_avoco;?>" class="form-control "/> 
			  	<div id="mensaje_hora" class="errores"></div>
			    
		 </div>
		 
		  
    </div>
  		
  		
  		
  		
  		
                <div class="col-lg-6 col-md-6 col-xs-12" style="margin-top: 20px;">
	            <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Datos Abogado Impulsor <br><FONT FACE="arial" SIZE=2 COLOR=red>(Llenar solo si usted esta remplazando a un abogado anterior)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p class="formulario-subtitulo" >Impuslor Saliente:</p>
			  	<input type="text"  name="nombre_impulsor_anterior" id="nombre_impulsor_anterior" value="<?php echo $sel_nombre_impulsor_anterior; ?>" class="form-control" placeholder="Ejm. Abg. xxxx xxxx xxxx xxxx"/> 
	            <div id="mensaje_nombre_impulsor_anterior" class="errores"></div>
	            </div>
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p class="formulario-subtitulo">Impulsor Entrante:</p>
			  	<select name="id_abogado" id="id_abogado"  class="form-control" readonly>
			    <option value="<?php echo $_SESSION['id_usuarios'];  ?>" ><?php echo $_SESSION['nombre_usuarios'];  ?></option>  
			    </select>
		        </div>
		        
	        	</div>
	        	</div>
	           </div>
	          
	            <div class="col-lg-6 col-md-6 col-xs-12" style="margin-top: 20px;">
	            <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Datos Abogado Secretario<br><FONT FACE="arial" SIZE=2 COLOR=red>(Llenar solo si usted esta remplazando a un abogado anterior)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p class="formulario-subtitulo" >Secretario Saliente:</p>
			  	<input type="text"  name="nombre_secretario_anterior" id="nombre_secretario_anterior" value="<?php echo $sel_nombre_secretario_anterior; ?>" class="form-control" placeholder="Ejm. Abg. xxxx xxxx xxxx xxxx"/> 
	            <div id="mensaje_nombre_secretario_anterior" class="errores"></div>
	            </div>
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p  class="formulario-subtitulo">Secretario Entrante:</p>
			  	<select name="id_secretario" id="id_secretario"  class="form-control" readonly>
			  			<?php foreach($resultSecre as $res) {?>
						<option value="<?php echo $res->id_secretario; ?>" ><?php echo $res->secretarios;  ?> </option>
			            <?php } ?>
				</select>
                </div>
	        	
	        	</div>
	        	</div>
	           </div>
  		        <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: 20px;">
	            <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Tipo de Avoco Conocimiento<br><FONT FACE="arial" SIZE=2 COLOR=red>(Seleccionar el tipo de avoco obligatoriamente.)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	
  		         <div class="col-lg-6 col-md-6 col-xs-12" >
			  	<p  class="formulario-subtitulo">Tipo Avoco:</p>
			  	<select name="tipo_avoco" id="tipo_avoco"  class="form-control" >
			  		<option value="0"><?php echo "--Seleccione--";  ?> </option>
					<option value="1">AVOCO CONOCIMIENTO PAGO TOTAL</option>
					<option value="2">AVOCO CONOCIMIENTO SIMPLE</option>
					<option value="3">AVOCO CONOCIMIENTO Y SUSPENSIÓN</option>
			        
				</select>
				<div id="mensaje_tipo_avoco" class="errores"></div>
	            </div>
              
              <div class="col-lg-6 col-md-6 col-xs-12">
			  	<p  class="formulario-subtitulo">Actualizar Estado Procesal:</p>
			  	<select name="id_estados_procesales_juicios_actualizar" id="id_estados_procesales_juicios_actualizar"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>" ><?php echo $res->nombre_estados_procesales_juicios;  ?> </option>
			            <?php } ?>
				</select>
                 <FONT FACE="arial" SIZE=1.9 COLOR=red>(Seleccionar solo si desea actualizar el estado procesal del jucio.)</FONT>
                 </div>
              
	           
	                   
              <div id="div_datos_pago_total" style="display: none;">
	            <div class="col-lg-6 col-md-6 col-xs-12">
			  	<p class="formulario-subtitulo" >Número de Liquidación:</p>
			  	<input type="text"  name="numero_liquidacion" id="numero_liquidacion" value="<?php echo $sel_numero_liquidacion; ?>" class="form-control" placeholder="#"/> 
	            <div id="mensaje_numero_liquidacion" class="errores"></div>
	            </div>
	            
	           <div class="col-lg-4 col-md-4 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Auto Pago:</p>
			  	<input type="date"  name="fecha_auto_pago" id="fecha_auto_pago" value="<?php echo $sel_fecha_auto_pago; ?>" class="form-control "/> 
			  	<div id="mensaje_fecha_auto_pago" class="errores"></div>
			    </div>
	          </div> 
	          
	          <div class="col-lg-12 col-md-12 col-xs-12" style=" text-aling: justify;">
            	 <br><p align="justify"><font face="arial" size=2><b>NOTA:</b> Estimados usuarios el sistema automáticamente llena en la razón el siguiente texto.<br><b>RAZÓN.- </b> No se notificó con la providencia que antecede a los señores coactivados por no haber señalado domicilio legal.- "Ciudad" xxxx, "Fecha" xx xx xxxx xx xxx.- <b>CERTIFICO.-</b></font></p>
				 <FONT FACE="arial" SIZE=2 COLOR=red>(Si necesita cambiar el texto de la razón ingreselo en el siguiente campo, sin incluir las palabras <b>RAZÓN.- </b> y <b>CERTIFICO.-</b>)</FONT>
			  </div>
				   
             <div class="col-xs-12 col-md-12 col-lg-12" >
		                          <p class="formulario-subtitulo" >Razón Avoco:</p>
                                  <textarea type="text"  class="form-control" id="razon_avoco" name="razon_avoco" value=""  placeholder="Ingrese Razón"></textarea>
                                  
             </div>
  		
  		
	  		<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
	  		<button type="submit" id="reporte_rpt" name="reporte_rpt" value="Reporte Providencia"   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Avoco Conocimiento</button>
		 	</div>
  		
  		        </div>
	        	</div>
	            </div>
  		 
		</div>
		    
		    </div>
	        </div>
	        </div>
	         
	     
	     
	     
	   
	       	
	     </div>	 
        		 
        		 
        		 
        		 
        		 
        		 
		 
		 <div class="col-lg-12">
		 
	     <div class="col-lg-12">
	     
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
		 
	
      
       </form>
     
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
       
 
   </body>  

    </html>   
    
  
 
    
