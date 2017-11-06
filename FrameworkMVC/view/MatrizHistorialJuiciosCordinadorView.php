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
         
    
    
         <script>
	$(document).ready(function(){
		$("#id_secretario").change(function(){

            // obtenemos el combo de resultado combo 2
           var $ddl_impulsor = $("#id_impulsor");
       	

            // lo vaciamos
           var ddl_secretario = $(this).val();

          
          
            if(ddl_secretario != 0)
            {
            	 $ddl_impulsor.empty();
            	
            	 var datos = {
                   	   
           			   usuarios:$(this).val()
                  };
             
            	
         	   $.post("<?php echo $helper->url("MatrizJuicios","Impulsor"); ?>", datos, function(resultado) {

          		  if(resultado.length==0)
          		   {
          				$ddl_impulsor.append("<option value='0' >--TODOS--</option>");	
             	   }else{
             		    $ddl_impulsor.append("<option value='0' >--TODOS--</option>");
          		 		$.each(resultado, function(index, value) {
          		 			$ddl_impulsor.append("<option value= " +value.id_abogado +" >" + value.impulsores  + "</option>");	
                     		 });
             	   }	
            	      
         		  }, 'json');


            }
            
		//alert("hola;");
		});
        });
	
       

	</script>
   	
	<script>
	$(document).ready(function(){
		$("#id_ciudad").change(function(){

            // obtenemos el combo de resultado combo 2
           var $ddl_secretario = $("#id_secretario");
           var $ddl_impulsor = $("#id_impulsor");       	

            // lo vaciamos
           var ddl_ciudad = $(this).val();

          
           $ddl_secretario.empty();
           $ddl_impulsor.empty();

          
            if(ddl_ciudad != 0)
            {
            	
            	 var datos = {
                   	   
           			   ciudad:$(this).val()
                  };
             
            	


         	   $.post("<?php echo $helper->url("MatrizJuicios","Secrtetarios"); ?>", datos, function(resultSecretario) {

         		  if(resultSecretario.length==0)
          		   {
          				$ddl_secretario.append("<option value='0' >--TODOS--</option>");	
             	   }else{
             		  $ddl_secretario.append("<option value='0' >--TODOS--</option>");
         		 		$.each(resultSecretario, function(index, value) {
         		 			$ddl_secretario.append("<option value= " +value.id_usuarios +" >" + value.nombre_usuarios  + "</option>");	
                    		 });
             	   }

         		 		 	 		   
         		  }, 'json');

         	  
              	 var datos = {
                     	   
             			   id_ciudad:$(this).val()
                    };
               
              	
           	   $.post("<?php echo $helper->url("MatrizJuicios","Impulsor"); ?>", datos, function(resultado) {

           		   if(resultado.length==0)
           		   {
           				$ddl_impulsor.append("<option value='0' >--TODOS--</option>");	
              	   }else{
              		    $ddl_impulsor.append("<option value='0' >--TODOS--</option>");
           		 		$.each(resultado, function(index, value) {
           		 			$ddl_impulsor.append("<option value= " +value.id_usuarios +" >" + value.nombre_usuarios  + "</option>");	
                      		 });
              	   }

           		 		 	 		   
           		  }, 'json');



            }
            else
            {
                
              $ddl_secretario.append("<option value='0' >--TODOS--</option>");
         	  $ddl_impulsor.append("<option value='0' >--TODOS--</option>");

            }
            
		});
	});
		
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
		 var con_identificacion_clientes=$("#identificacion_clientes").val();
		 var con_id_secretario=$("#id_secretario").val();
		 var con_id_impulsor=$("#id_impulsor").val();
		 var con_id_ciudad=$("#id_ciudad").val();
		 
		 var con_fechadesde=$("#fcha_desde").val();
		 var con_fechahasta=$("#fcha_hasta").val();
		 var con_id_estados_procesales_juicios=$("#id_estados_procesales_juicios").val();

		 
			
		 
		 

		  var con_datos={
				  juicio_referido_titulo_credito:con_juicio_referido_titulo_credito,
				  numero_titulo_credito:con_numero_titulo_credito,
				  identificacion_clientes:con_identificacion_clientes,
				  id_secretario:con_id_secretario,
				  id_impulsor:con_id_impulsor,
				  id_ciudad:con_id_ciudad,
				  fcha_desde:con_fechadesde,
				  fcha_hasta:con_fechahasta,
				  id_estados_procesales_juicios:con_id_estados_procesales_juicios,
				 
				  action:'ajax',
				  page:pagina
				  };


		$("#matriz").fadeIn('slow');
		$.ajax({
			url:"<?php echo $helper->url("MatrizJuicios","index6");?>",
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

    </head>
    <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       <?php
       
  
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
       $sel_identificacion_clientes="";
       $sel_id_ciudad="";
       $sel_id_estados_procesales_juicios="";
      
        
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_id_ciudad=$_POST['id_ciudad'];
       
       	
       	
       
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("MatrizJuicios","index6"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12" target="_blank">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Historial Matriz Juicios</h4>
	         </div>
	         <div class="panel-body">
			
		    <div class="panel panel-default">
  			<div class="panel-body">
  		
  		<div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo" style="" >Juzgado:</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control">
			     <option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultDatos as $res) {?>
						<option value="<?php echo $res->id_ciudad; ?>"<?php if($sel_id_ciudad==$res->id_ciudad){echo "selected";}?> ><?php echo $res->nombre_ciudad;  ?> </option>
			            <?php } ?>
			    </select>
		 </div>
  		
  		  <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo" style="" >Secretarios:</p>
			  <select name="id_secretario" id="id_secretario"  class="form-control">
			  	<option value="0">--TODOS--</option>
			    </select>
		 </div>
		   	
		  <div class="col-lg-2 col-md-2 col-xs-12">
			  	<p  class="formulario-subtitulo" style="" >Impulsores:</p>
			  	<select name="id_impulsor" id="id_impulsor"  class="form-control">
			  	<option value="0">--TODOS--</option>
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
         		<p class="formulario-subtitulo" >Identificación:</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="<?php echo $sel_identificacion_clientes;?>" class="form-control "/> 
			    
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
         
		 <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Desde:</p>
			  	<input type="date"  name="fcha_desde" id="fcha_desde" value="<?php echo '';?>" class="form-control "/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Hasta:</p>
			  	<input type="date"  name="fcha_hasta" id="fcha_hasta" value="<?php echo '';?>" class="form-control "/> 
			    
		 </div>
		
          
           </div>
  		
  		
  		<div class="col-lg-12 col-md-12 col-xs-12" style="text-align: center; margin-top: 10px">
  		    
		 <button type="button" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
		 <button type="submit" id="reporte_rpt_historial" name="reporte_rpt_historial" value="Reporte"   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i></button>         
	  
	 
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
    
  
    