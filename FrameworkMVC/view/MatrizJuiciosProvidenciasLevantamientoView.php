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

		 var con_lote_juicios=$("#lote_juicios").val();
		 	
		 var con_id_provincias=$("#id_provincias").val();
		 var con_id_estados_procesales_juicios=$("#id_estados_procesales_juicios").val();
		 var con_id_estados_procesales_juicios_actualizar=$("#id_estados_procesales_juicios_actualizar").val();
		 var con_fechadesde=$("#fcha_desde").val();
		 var con_fechahasta=$("#fcha_hasta").val();
		 var con_identificacion_clientes=$("#identificacion_clientes").val();
		 var con_identificacion_clientes_1=$("#identificacion_clientes_1").val();
		 var con_identificacion_clientes_2=$("#identificacion_clientes_2").val();
		 var con_identificacion_clientes_3=$("#identificacion_clientes_3").val();
var con_nombre_usuario_saliente=$("#nombre_usuario_saliente").val();
		 var con_razon_providencias=$("#razon_providencias").val();
		 

		 var con_identificacion_garantes=$("#identificacion_garantes").val();
		 var con_identificacion_garantes_1=$("#identificacion_garantes_1").val();
		 var con_identificacion_garantes_2=$("#identificacion_garantes_2").val();
		 var con_identificacion_garantes_3=$("#identificacion_garantes_3").val(); 
		 var con_numero_oficio=$("#numero_oficio").val(); 

		  var con_datos={
				  juicio_referido_titulo_credito:con_juicio_referido_titulo_credito,
				  numero_titulo_credito:con_numero_titulo_credito,

				  lote_juicios:con_lote_juicios,
				  id_provincias:con_id_provincias,
				  id_estados_procesales_juicios:con_id_estados_procesales_juicios,
				  id_estados_procesales_juicios_actualizar:con_id_estados_procesales_juicios_actualizar,
				  fcha_desde:con_fechadesde,
				  fcha_hasta:con_fechahasta,
				  razon_providencias:con_razon_providencias,
				  identificacion_clientes:con_identificacion_clientes,
				  identificacion_clientes_1:con_identificacion_clientes_1,
				  identificacion_clientes_2:con_identificacion_clientes_2,
				  identificacion_clientes_3:con_identificacion_clientes_3,
				  nombre_usuario_saliente:con_nombre_usuario_saliente,
				  identificacion_garantes:con_identificacion_garantes,
				  identificacion_garantes_1:con_identificacion_garantes_1,
				  identificacion_garantes_2:con_identificacion_garantes_2,
				  identificacion_garantes_3:con_identificacion_garantes_3,
				  numero_oficio:con_numero_oficio,
				  action:'ajax',
				  page:pagina
				  };


		$("#matriz").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("MatrizJuicios","index4");?>",
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

			var validarForm = false;

		    // cada vez que se cambia el valor del combo
		    $("#reporte_rpt").click(function() 
			{
		   
		    	var fecha_providencias = $("#fecha_providencias").val();
		     	var hora_providencias = $("#hora_providencias").val();
		     	  var numero_oficio  = $("#numero_oficio").val();
		     	
		    			
		    	if (fecha_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_fecha").text("Introduzca una Fecha");
		    		$("#mensaje_fecha").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
				}


		    	if (hora_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_hora").text("Introduzca una Hora");
		    		$("#mensaje_hora").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_hora").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
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
				
	/*
		    	if (razon_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_razon").text("Introduzca una Razón");
		    		$("#mensaje_razon").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_razon").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
				}
		    	*/
			}); 

	
				$( "#fecha_providencias" ).focus(function() {
					$("#mensaje_fecha").fadeOut("slow");
    			});

				$( "#hora_providencias" ).focus(function() {
					$("#mensaje_hora").fadeOut("slow");
    			});
				$( "#numero_oficio" ).focus(function() {
					$("#mensaje_numero_oficio").fadeOut("slow");
    			});

    			/*
					$( "#razon_levantamiento" ).focus(function() {
					$("#mensaje_razon").fadeOut("slow");
    			});
*/

		    		/*	$("button[type=submit]").click(function() {
					var accion = $(this).attr('name');
					var boton = $(this);

					if(accion=='visualizar')
						{
							var dialogo = $('#plpop');//framePL//plpop
							$('#closeView').css({'display':'inline-block','margin':'0px','padding':'6px,12px'});
							dialogo.css({'display':'block'});
							boton.css('display','none');
							
						}
					if(accion=='closeView')
					{
						var dialogo = $('#plpop');//framePL//plpop
						$('#closeView').css({'display':'none','margin':'0px'});
						dialogo.css({'display':'none'});
						$('#visualizar').css('display','inline-block');
						return false;
					}
					
			});*/
					    
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


    


    </head>
    <body style="background-color: #d9e3e4;">
    
      
       
       <?php
       
  
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
      
       $sel_id_provincias="";
       $sel_id_estados_procesales_juicios="";
        $sel_id_abogado="";
        $sel_id_estados_procesales_juicios_actualizar="";
        $sel_identificacion_clientes="";
        $sel_identificacion_clientes_1="";
        $sel_identificacion_clientes_2="";
        $sel_identificacion_clientes_3="";
        
         
        $sel_identificacion_garantes="";
        $sel_identificacion_garantes_1="";
        $sel_identificacion_garantes_2="";
        $sel_identificacion_garantes_3="";
        $sel_numero_oficio="";
        $sel_nombre_usuario_saliente="";
        $sel_razon_providencias="";
        
        $sel_lote_juicios="";
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       	$sel_id_provincias=$_POST['id_provincias'];
       	$sel_id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
       	$sel_id_abogado = $_POST['id_abogado'];
       	$sel_id_estados_procesales_juicios_actualizar=$_POST['id_estados_procesales_juicios_actualizar'];
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_identificacion_clientes_1=$_POST['identificacion_clientes_1'];
       	$sel_identificacion_clientes_2=$_POST['identificacion_clientes_2'];
       	$sel_identificacion_clientes_3=$_POST['identificacion_clientes_3'];
       	$sel_nombre_usuario_saliente=$_POST['nombre_usuario_saliente'];
       	$sel_identificacion_garantes=$_POST['identificacion_garantes'];
       	$sel_identificacion_garantes_1=$_POST['identificacion_garantes_1'];
       	$sel_identificacion_garantes_2=$_POST['identificacion_garantes_2'];
       	$sel_identificacion_garantes_3=$_POST['identificacion_garantes_3'];
       
       	$sel_numero_oficio=$_POST['numero_oficio'];
       	
       	$sel_razon_providencias=$_POST['razon_providencias'];
       	
       	
       	$sel_lote_juicios=$_POST['lote_juicios'];
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("MatrizJuicios","index4"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12" target="_blank">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Matriz Juicios Providencias Levantamiento de Suspensión</h4>
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
		 
		 <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo">Lote:</p>
			  	<select name="lote_juicios" id="lote_juicios"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultLote as $res) {?>
						<option value="<?php echo $res->lote_juicios; ?>"<?php if($sel_lote_juicios==$res->lote_juicios){echo "selected";}?> ><?php echo $res->lote_juicios;  ?> </option>
			            <?php } ?>
				</select>

         </div>
		 
		 
           </div>
  		</div>
  		
  		<div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
  		    
		 <button type="button" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
		 <br>
	     <button type="button" id="boton_opciones" name="boton_opciones" value="Reporte Matriz Juicios"   class="btn btn-warning" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Providencias Masivas</button>         
         <button type="button" id="boton_opciones1" name="boton_opciones1" style="display: none; margin-top: 10px;" value="Reporte Matriz Juicios"   class="btn btn-danger" ><i class="glyphicon glyphicon-print"></i> Cerrar Providencias Masivas</button>         
	  	  
	 
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
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos Providencias Levantamiento Masivas</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  							
  		<div class="col-lg-3 col-md-3 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Providencia:</p>
			  	<input type="date"  name="fecha_providencias" id="fecha_providencias" value="" class="form-control "/> 
			  	<div id="mensaje_fecha" class="errores"></div>
			   
		 </div>
		 
		  <div class="col-lg-3 col-md-3 col-xs-12">
         		<p class="formulario-subtitulo" >Hora Providencia:</p>
			  	<input type="time"  name="hora_providencias" id="hora_providencias" value="" class="form-control "/> 
			    <div id="mensaje_hora" class="errores"></div>
		 </div>
		 
		 
		   <div class="col-lg-12 col-md-12 xs-6" style="margin-top:10px;">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio:</p>
			  	<input type="text"  name="numero_oficio" id="numero_oficio" value="<?php echo $sel_numero_oficio;?>" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio" class="errores"></div>
		  </div>
		  
		    
		     
		    
		        <div class="col-lg-12 col-md-12 col-xs-12" style=" text-aling: justify;">
            	 <br><p align="justify"><font face="arial" size=2><b>NOTA:</b> Estimados usuarios el sistema automáticamente llena en la razón el siguiente texto.<br><b>RAZÓN.- </b> Siento por tal, que no se notifica con este auto a los coactivados, por cuanto aún no han sido citados.- "Ciudad" xxxx, "Fecha" xx xx xxxx xx xxx.- <b>CERTIFICO.-</b></font></p>
				 <FONT FACE="arial" SIZE=2 COLOR=red>(Si necesita cambiar el texto de la razón ingreselo en el siguiente campo, sin incluir las palabras <b>RAZÓN.- </b> y <b>CERTIFICO.-</b>)</FONT>
				
				</div>
		     
             <div class="col-xs-12 col-md-12" style="margin-top: 10px;">
		                          <p class="formulario-subtitulo" >Razón Providencias:</p>
                                  <textarea type="text"  class="form-control" id="razon_providencias" name="razon_providencias" value=""  placeholder="Ingrese Razón"></textarea>
                                 <div id="mensaje_razon" class="errores"></div>
             </div>
             
                 	
		     </div>
             </div>
		     </div>
	         </div>
	         </div>
	     
	     
	     
	     <div class="col-lg-12 col-md-12 col-xs-12 ">
	            <div class="col-lg-6 col-md-6 col-xs-12 ">
	            <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Abogado Anterior <br><FONT FACE="arial" SIZE=2 COLOR=red>(Llenar solo si usted esta remplazando a un abogado anterior)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p class="formulario-subtitulo" >Nombre Abogado Anterior:</p>
			  	<input type="text"  name="nombre_usuario_saliente" id="nombre_usuario_saliente" value="<?php echo $sel_nombre_usuario_saliente;?>" class="form-control" placeholder="Ej1. la Abogada xxxxxx xxxxxx           Ej2. el Abogado xxxxxx xxxxxx"/> 
	            </div>
	        	
	        	</div>
	        	</div>
	          </div>
	         <div class="col-lg-6 col-md-6 col-xs-12 ">
	         <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Nombre Estado Procesal <br><FONT FACE="arial" SIZE=2 COLOR=red>(Seleccionar solo si desea actualizar el estado procesal del juicio)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p  class="formulario-subtitulo">Actualizar Estado Procesal:</p>
			  	<select name="id_estados_procesales_juicios_actualizar" id="id_estados_procesales_juicios_actualizar"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>"<?php if($sel_id_estados_procesales_juicios==$res->id_estados_procesales_juicios){echo "selected";}?> ><?php echo $res->nombre_estados_procesales_juicios;  ?> </option>
			            <?php } ?>
				</select>

                 </div>
	        	
	        	</div>
	        	</div>
	          </div>
	          </div>
	     
	     
	     
	     <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center;" >
			  	  <button type="submit" id="reporte_rpt" name="reporte_rpt" value="reporte_rpt" class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Providencias</button>
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
    
  

    
