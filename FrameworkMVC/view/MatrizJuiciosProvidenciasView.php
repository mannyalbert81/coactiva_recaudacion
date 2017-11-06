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
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>
		
       <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
                
            
        </style>
         
   

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


		 var con_id_estados_procesales_juicios_actualizar=$("#id_estados_procesales_juicios_actualizar").val();
		 var con_razon_providencias=$("#razon_providencias").val();
		 

		  var con_datos={
				  juicio_referido_titulo_credito:con_juicio_referido_titulo_credito,
				  numero_titulo_credito:con_numero_titulo_credito,
				  
				  id_provincias:con_id_provincias,
				  id_estados_procesales_juicios:con_id_estados_procesales_juicios,
				  fcha_desde:con_fechadesde,
				  fcha_hasta:con_fechahasta,
				  razon_providencias:con_razon_providencias,
				  identificacion_clientes:con_identificacion_clientes,
				  identificacion_clientes_1:con_identificacion_clientes_1,
				  identificacion_clientes_2:con_identificacion_clientes_2,
				  identificacion_clientes_3:con_identificacion_clientes_3,
				  id_estados_procesales_juicios_actualizar:con_id_estados_procesales_juicios_actualizar,
				  identificacion_garantes:con_identificacion_garantes,
				  identificacion_garantes_1:con_identificacion_garantes_1,
				  identificacion_garantes_2:con_identificacion_garantes_2,
				  identificacion_garantes_3:con_identificacion_garantes_3,
				  action:'ajax',
				  page:pagina
				  };


		$("#matriz").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("MatrizJuicios","index");?>",
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
		    
		    $("#reporte_rpt").click(function() 
			{
				
		    	var fecha_providencias = $("#fecha_providencias").val();
		    	var hora_providencias = $("#hora_providencias").val();
		    	var razon_providencias = $("#razon_providencias").val();
		    
		    	if (fecha_providencias == "")
		    	{
			    	
		    		$("#mensaje_fecha_providencias").text("Introduzca una Fecha");
		    		$("#mensaje_fecha_providencias").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha_providencias").fadeOut("slow"); //Muestra mensaje de error
		            
				}    
				
		    	if (hora_providencias == "")
		    	{
			    	
		    		$("#mensaje_hora_providencias").text("Introduzca una Hora");
		    		$("#mensaje_hora_providencias").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_hora_providencias").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		    	    	
				
		    	if (razon_providencias == "")
		    	{
		    		
		    		$("#mensaje_razon_providencias").text("Introduzca una razón");
		    		$("#mensaje_razon_providencias").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_razon_providencias").fadeOut("slow"); //Muestra mensaje de error
		            
				}

	}); 


		        $( "#fecha_providencias" ).focus(function() {
				  $("#mensaje_fecha_providencias").fadeOut("slow");
			    });
				
				$( "#hora_providencias" ).focus(function() {
					$("#mensaje_hora_providencias").fadeOut("slow");
    			});
				
    			
				$( "#razon_providencias" ).focus(function() {
					$("#mensaje_razon_providencias").fadeOut("slow");
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
        
        
        $sel_id_estados_procesales_juicios_actualizar="";
        $sel_razon_providencias="";
        
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
       	$sel_id_estados_procesales_juicios_actualizar=$_POST['id_estados_procesales_juicios_actualizar'];
       	$sel_razon_providencias=$_POST['razon_providencias'];
       	
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("MatrizJuicios","index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12" target="_blank">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Matriz Juicios Providencias Suspensión</h4>
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
		
	 
	     </div>
		 
		
	     
	     
	     
	      <div class="col-lg-12 col-md-12 xs-12" style="text-align: center; margin-top: 10px">
  		 		<div class="col-lg-4 col-md-4 col-xs-12" style="text-align: center; margin-top: 10px">
  		 		</div>
		 		<div class="col-lg-4 col-md-4 col-xs-12" style="text-align: center; margin-top: 10px">
		 		<div class="col-xs-12 col-md-12 col-lg-12">
			  		  	<input type="date"  name="fecha_providencias" id="fecha_providencias" value="" class="form-control" placeholder="dd/MM/aaaa"/>
		 		   <div id="mensaje_fecha_providencias" class="errores"></div>
			  	</div>
			  	<div class="col-xs-12 col-md-12 col-lg-12">
			  			<input type="time"  name="hora_providencias" id="hora_providencias" value="" class="form-control" placeholder="HH:mm"/>
		 		   <div id="mensaje_hora_providencias" class="errores"></div>
			  	</div>
			  
			  	<div class="col-xs-12 col-md-12 col-lg-12">
			  			<textarea type="text"  class="form-control" id="razon_providencias" name="razon_providencias" value="<?php echo $sel_razon_providencias;?>"  placeholder="Ingrese Razón"></textarea>
                   <div id="mensaje_razon_providencias" class="errores"></div>
			  	</div>
			  		<div class="col-xs-12 col-md-12 col-lg-12">
			  
   					<select name="id_estados_procesales_juicios_actualizar" id="id_estados_procesales_juicios_actualizar"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>"<?php if($sel_id_estados_procesales_juicios_actualizar==$res->id_estados_procesales_juicios){echo "selected";}?> ><?php echo $res->nombre_estados_procesales_juicios;  ?> </option>
			            <?php } ?>
				    </select>
				    </div>
					<button type="submit" id="reporte_rpt" name="reporte_rpt" value="reporte_rpt" class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Providencias</button>
		 		</div>
		 		<div class="col-lg-4 col-md-4 col-xs-12" style="text-align: center; margin-top: 10px">
		 		</div>	         
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
		 
	
      
       </form>
     
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
      
      
      
     
     
   </body>  

    </html>   
    
  

    
