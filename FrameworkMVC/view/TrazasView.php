<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Actividades - coactiva 2016</title>
        
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
		
		
		
		<!-- TERMINA NOTIFICAIONES -->  
		
		

	 <script type="text/javascript">
	$(document).ready(function(){
		
		$("#Buscar").click(function(){
			
			
        	load_trazas(1);
			});
	});

	
	function load_trazas(pagina){

		
		//iniciar variables
		 var tra_fecha_desde=$("#fecha_desde").val();
		 var tra_fecha_hasta=$("#fecha_hasta").val();
		 var tra_contenido=$("#contenido").val();
		 var tra_ddl_accion=$("#ddl_accion").val();
		 var tra_ddl_criterio=$("#ddl_criterio").val();

				  var con_datos={
				  fecha_desde:tra_fecha_desde,
				  fecha_hasta:tra_fecha_hasta,
				  contenido:tra_contenido,
				  ddl_accion:tra_ddl_accion,
				  ddl_criterio:tra_ddl_criterio,			
				
				  action:'ajax',
				  page:pagina
				  };


		$("#trazas").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("Trazas","index");?>",
            type : "POST",
            async: true,			
			data: con_datos,
			 beforeSend: function(objeto){
			$("#trazas").html('<img src="view/images/ajax-loader.gif"> Cargando...');
			},
			success:function(data){

				
				$(".div_trazas").html(data).fadeIn('slow');
				$("#trazas").html("");

			}
		})
	}
	
	</script>
	<script>
	$(document).ready(function(){

		//alert("hola");
		$("#div_ddl_accion").hide();

		$("#ddl_criterio").change(function(){

			var ddl_criterio=$(this).val();

			if(ddl_criterio==3){
				//alert("hola");
				$("#div_ddl_accion").show();
				$("#div_contenido").hide();
				}else{
					$("#div_ddl_accion").hide();
					$("#div_contenido").show();
					}

			});
		
		});

		</script>
		
	
       <script> 
	$(document).ready(function(){

	       $("#fecha_hasta").change(function() {

                var startDate = new Date($('#fecha_desde').val());

                 var endDate = new Date($('#fecha_hasta').val());

                 if (startDate > endDate){
 
                    $("#mensaje_hasta").text("Fecha desde no debe ser mayor ");
		    		$("#mensaje_hasta").fadeIn("slow"); //Muestra mensaje de error  
		    		$("#fecha_hasta").val("");

                        }

               });

	       $( "#fecha_hasta" ).focus(function() {
				  $("#mensaje_hasta").fadeOut("slow");
			   });

        });
		</script>
		  </head>
    <body style="background-color: #d9e3e4;">
    
     
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       
       
       <?php
       
       $acciones=array(0=>"INSERTO NUEVO JUICIO",1=>"Actualizo tabla juicios",2=>"Actualizo tabla clientes", 3=>"Actualizo tabla titulo_credito", 4=>"Inserto o Actualizo tabla Restructuracion", 5=>"Genero Avoco Conocimiento");
       
		   
		?>
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
           
  
      
           <form action="<?php echo $helper->url("Trazas","Index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
     
     
                <br>         
             <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Lista de Actividades</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
     
      		
           
           
           <div class="col-lg-3 col-md-3 xs-6" id="div_desde">
         		<p class="formulario-subtitulo" >Desde:</p>
			  	<input type="date"  name="fecha_desde" id="fecha_desde" value="" class="form-control "/> 
			   <div id="mensaje_desde" class="errores"></div>
		 </div>
		 
		  <div class="col-lg-3 col-md-3 xs-6" id="div_hasta">
         		<p class="formulario-subtitulo" >Hasta:</p>
			  	<input type="date"  name="fecha_hasta" id="fecha_hasta" value="" class="form-control "/> 
			   <div id="mensaje_hasta" class="errores"></div>
		 </div>
           
            <div class="col-lg-4 col-md-4 xs-6" id="div_contenido">
         		<p class="formulario-subtitulo" >Contenido Busqueda:</p>
			  	<input type="text"  name="contenido" id="contenido" value="" class="form-control "/> 
			   <div id="mensaje_contenido" class="errores"></div>
		 </div>
          
           
          <div class="col-lg-4 col-md-4 xs-6" id="div_ddl_accion">
         		<p class="formulario-subtitulo" >Accion:</p>
			  	 <select name="ddl_accion" id="ddl_accion"  class="form-control">
                                    <?php foreach($acciones as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>"><?php echo $desc ?> </option>
                                    <?php } ?>
                                        
           </select>
			   <div id="mensaje_ddl_accion" class="errores"></div>
		 </div>
            
          
          
            <div class="col-lg-2 col-md-2 xs-6" id="div_ddl_criterio">
         		<p class="formulario-subtitulo" >Criterio:</p>
			  	 <select name="ddl_criterio" id="ddl_criterio"  class="form-control">
                                    <?php foreach($resulMenu as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>"><?php echo $desc ?> </option>
                                    <?php } ?>
                                        
           </select>
			   <div id="mensaje_criterio" class="errores"></div>
		 </div>
            
          
         
         </div>
         
          <div class="col-lg-12 col-md-12 xs-12 " style="text-align: center; margin-top: 10px">
  			   <button type="button" id="Buscar" name="Buscar" value="Buscar" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button>
          
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
		  
			  <div id="trazas" style="position: absolute;	text-align: center;	top: 10px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="div_trazas" ></div><!-- Datos ajax Final -->
		      </div>
		       <br>
				  
		 </div>
		 
		 </div>
		 
		
		 
		 </div>
		 
          </form>
         </div>
       <!-- termina formulario de busqueda -->
     
       
		 <br>
		 <br>
		 <br>
		 
		 <br>
		 <br>
		 <br>
      </div>
     
    <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
   
     </body>  
    </html>   