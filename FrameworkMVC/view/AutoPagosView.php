 <!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Auto Pagos - coactiva 2016</title>
        
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
				alertify.success("Has Pulsado en Guardar"); 
				return false;
			}
			
			function Borrar(){
				alertify.success("Has Pulsado en Borrar"); 
				return false; 
			}

			function notificacion(){
				alertify.success("Has Pulsado en Buscar"); 
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
     
       <script>
	$(document).ready(function(){
		$("#id_ciudad").change(function(){

            // obtenemos el combo de resultado combo 2
           var $ddl_agente = $("#id_usuarioAgente");
       	

            // lo vaciamos
           var ddl_ciudad = $(this).val();

          
           $ddl_agente.empty();

          
            if(ddl_ciudad != 0)
            {
            	
            	 var datos = {
                   	   
           			   ciudad:$(this).val()
                  };
             
            	


         	   $.post("<?php echo $helper->url("AutoPagos","returnAgentesbyciudad"); ?>", datos, function(resultUsuarioAgenteC) {

         		 		$.each(resultUsuarioAgenteC, function(index, value) {
         		 			$ddl_agente.append("<option value= " +value.id_usuarios +" >" + value.nombre_usuarios  + "</option>");	
                    		 });

         		 		 	 		   
         		  }, 'json');


            }
            else
            {
                
         	   $ddl_resultado.empty();

            }
		//alert("hola;");
		});

		$("#id_ciudad").change(function(){

            // obtenemos el combo de resultado combo 2
           var $ddl_impulsor = $("#id_usuarioImpulsor");
       	

            // lo vaciamos
           var ddl_ciudad = $(this).val();

          
            $ddl_impulsor.empty();

          
            if(ddl_ciudad != 0)
            {
            	
            	 var datos = {
                   	   
           			   ciudad:$(this).val()
                  };
             
            	


         	   $.post("<?php echo $helper->url("AutoPagos","returnImpulsorbyciudad"); ?>", datos, function(resultUsuarioImpulC) {

         		 		$.each(resultUsuarioImpulC, function(index, value) {
            		 	    $ddl_impulsor.append("<option value= " +value.id_usuarios +" >" + value.nombre_usuarios  + "</option>");	
                    		 });

         		 		 	 		   
         		  }, 'json');


            }
            else
            {
                
         	   $ddl_impulsor.empty();

            }
		//alert("hola;");
		});
		});
	
       

	</script>
      <script >
		$(document).ready(function(){

			$("#Guardar").click(function()

			{

				var contenido = $("#contenido").val();
				var fecha_asignacion= $("#fecha_asignacion").val();
				var id_ciudad= $("#id_ciudad").val();
				    
				if (contenido != "" && fecha_asignacion==0)
		    	{
					$("#mensaje_criterio").text("Seleccione una fecha");
		    		$("#mensaje_criterio").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_criterio").fadeOut("slow"); //Muestra mensaje de error
		    		
		            
				}    

				if (criterio !=0 && fecha_asignacion=="")
		    	{

			    	
		    		$("#mensaje_contenido").text("Ingrese Contenido a buscar");
		    		$("#mensaje_contenido").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    	
		    		
			    }
		    	else 
		    	{
		    		$("#mensaje_contenido").fadeOut("slow"); //Muestra mensaje de error
		            
				}    
				if (id_ciudad != "" && id_ciudad==0)
		    	{

			    	
		    		$("#mensaje_ciudad").text("Ingrese una ciudad");
		    		$("#mensaje_ciudad").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    	
		    		
			    }
		    	else 
		    	{
		    		$("#mensaje_ciudad").fadeOut("slow"); //Muestra mensaje de error
		            
				}    

					
				
			});


			$( "#fecha_asignacion" ).focus(function() {
				  $("#mensaje_contenido").fadeOut("slow");
			    });

			$( "#fecha_asignacion" ).focus(function() {
				  $("#mensaje_criterio").fadeOut("slow");
			    });
			$( "#id_ciudad" ).focus(function() {
				  $("#mensaje_ciudad").fadeOut("slow");
			    });
		   
			
		});
			</script >
        
    
    		    <script>
       $(document).ready(function(){

    	  
    	   $("#Guardar").prop("disabled","disabled");
    	  
 

            $(".marcados").click(function(){

            	var cant = $("input:checked").length;
            	
                if(cant!=0)
                {
            	
          	     $("#Guardar").prop("disabled","");
          	   
                }else
                    {
                	  
               	      $("#Guardar").prop("disabled","disabled");
               	   
                    }
                
                });
 	 });
       </script>
			
	
    <script>
    $(document).ready(function(){
        $("#marcar_todo").change(function () {
            if ($(this).is(':checked')) {
               
                $(".marcados").prop('checked', true); 
				 $("#Guardar").prop("disabled","");
         	   
            } else {
                
                $("input:checkbox").prop('checked', false);
                $("input[type=checkbox]").prop('checked', false);
				 $("#Guardar").prop("disabled","disabled");
            }
        });
        });
    </script>

    <script >
	        $(document).ready(function() {
			$('#Guardar').click(function(){
		        var selected = '';  
		          
		        $('.marcados').each(function(){
		            if (this.checked) {
		                selected +=$(this)+' esta '+$(this).val()+', ';
		            }
		        }); 
	
		        if (selected != '') {
		            return true;
		        }
		        else{
		            alert('Debes seleccionar un Titulo Credito.');
		            return false;
		        }
	
	
		      
		    }); 
	
		});
		</script>
		
    </head>
    <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       
       
       <?php
       
     	$resultMenu_busqueda=array(0=>"Todos",1=>"Identificacion",2=>"Titulo Credito");
     	
     	
     
     	$sel_nombre_usuarios= "";
     	$sel_id_ciudad="";
     	$sel_fecha_asignacion="";
   
     		
     	if($_SERVER['REQUEST_METHOD']=='POST' )
     		{
     			
     			$sel_nombre_usuarios= $_POST['id_usuarioAgente'];
     			$sel_id_ciudad=$_POST['id_ciudad'];
     			$sel_fecha_asignacion=$_POST['fecha_asignacion'];
     	
     		}
     	
     		 
     			
     	
		   
		?>
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
     
      <form action="<?php echo $helper->url("AutoPagos","InsertaAutoPagos"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
    
    <div class="col-lg-5">
    <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
           <?php //no hay datos para editar?>
        
            
		     <?php } } else {?>
		     
		 
		    <h4 style="color:#ec971f;">Auto Pagos</h4>
            	<hr/>
            	
            <div class="col-xs-5">
			  <p  class="formulario-subtitulo" >Fecha de Emisión </p>
	          <input type="date" id="fecha_asignacion" name="fecha_asignacion" class="form-control" value="<?php echo $sel_fecha_asignacion;?>">
		   	<div id="mensaje_criterio" class="errores"></div>	   
		    </div>
            	
		   	<div class="col-xs-5">
			  	<p  class="formulario-subtitulo" >Juzgado</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control" readonly>
					<?php foreach($resultCiu as $resCiu) {?>
						<option value="<?php echo $resCiu->id_ciudad; ?>" <?php if($sel_id_ciudad==$resCiu->id_ciudad){echo "selected";}?> ><?php echo $resCiu->nombre_ciudad; ?> </option>
			        <?php } ?>
				</select>
				<div id="mensaje_ciudad" class="errores"></div>	    			  
			  </div>
			  
			  <div class="col-xs-1"  style="width: 400px;">
			<hr>
			</div>
		
		  
		    
		    
			   <div class="col-xs-5">
			  <p  class="formulario-subtitulo" >Agente Judicial </p>
	            	 <select name="id_usuarioAgente" id="id_usuarioAgente"  class="form-control">
						<?php foreach($resultUsu as $res) {?>
						<option value="<?php echo $res->id_usuarios; ?>" <?php if($sel_nombre_usuarios==$res->id_usuarios){echo "selected";}?> ><?php echo $res->nombre_usuarios; ?> </option>
			        <?php } ?>		
								    	
			</select>
		   		   
		    </div>
		    
			
			<div class="col-xs-5" >
			  <p  class="formulario-subtitulo" >Estado </p>
	            	 <select name="id_estado" id="id_estado"  class="form-control" readonly>
						<?php foreach($resultEstado as $resEst) {?>
						<option value="<?php echo $resEst->id_estado; ?>"  ><?php echo $resEst->nombre_estado; ?> </option>
			        <?php } ?>		</select>
		   		   
		    </div>
		    <div class="col-xs-1"  style="width: 400px;">
			<hr>
			</div>
		    
		    
		    
			  <div class="col-xs-10" style="text-align: center;" >
			 <input type="submit" id="Guardar" name="Guardar" value="Guardar" class="btn btn-success"/>
			  </div>
			 
			<div class="col-xs-1"  style="width: 400px;">
			<hr>
			</div>
			 
			
			
      
             	
		     <?php } ?>
    </div>
    
    
    <div  class="col-lg-7">
     <h4 style="color:#ec971f;">Lista de titulo credito</h4>
            <hr/>
    		<div class="col-xs-3">
			
           <input type="text"  name="contenido_busqueda" id="contenido_busqueda" value="" class="form-control"/>
           <div id="mensaje_contenido_busqueda" class="errores"></div>
            </div>
            
           <div class="col-xs-3">
           <select name="criterio_busqueda" id="criterio_busqueda"  class="form-control">
                                    <?php foreach($resultMenu_busqueda as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>" <?php //if ($resRol->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $desc ?> </option>
                                    <?php } ?>
                                         
           </select>
           <div id="mensaje_criterio" class="errores"></div>
           </div>
           
           <div class="col-xs-2" >
		          <input type="submit" id="buscar" name="buscar"  onclick="this.form.action='<?php echo $helper->url("AutoPagos","index"); ?>'" value="buscar"  class="btn btn-info"/>
			</div>
			<div class="col-lg-4">
		 <span class="form-control" style="margin-bottom:0px;"><strong>Registros:</strong><?php if(!empty($resultDatos)) echo "  ".count($resultDatos);?></span>
		 </div>
		
	<div class="col-xs-12">
       <div class="col-lg-12">
		 
		 
       <section   style="height:400px; width:600px; overflow-y:scroll;">
        <table class="table table-hover">
	         <tr>
	    		<th style="color:#456789;font-size:80%;"><input type="checkbox" id="marcar_todo" class="checkbox"> </th>
	    		<th style="color:#456789;font-size:80%;">Nº Titulo Credito</th>
	    		<th style="color:#456789;font-size:80%;">Numero de Identifiación</th>
	    		<th style="color:#456789;font-size:80%;">Nombres Cliente</th>
				
				<th style="color:#456789;font-size:80%;">Fecha Emisión</th>
	    		<th style="color:#456789;font-size:80%;">Valor Capital</th>
	    		<th style="color:#456789;font-size:80%;">Valor Auto Pago</th>
	    		
	    		
	    		
	  		</tr>
            
	            <?php if (!empty($resultDatos)) {  foreach($resultDatos as $res) {?>
	        		<tr>
	        		<th style="color:#456789;font-size:80%;"><input type="checkbox" id="id_titulo_credito[]"   name="id_titulo_credito[]"  value="<?php echo $res->id_titulo_credito; ?>" class="marcados"></th>
	                 
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->numero_titulo_credito; ?></td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->identificacion_clientes; ?>     </td> 
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombres_clientes; ?>  </td>
		              
				   <td style="color:#000000;font-size:80%;"> <?php echo $res->fecha_emision; ?>  </td>
		              <td style="color:#000000;font-size:80%;"> <?php echo $res->total; ?>     </td> 
					   <td style="color:#000000;font-size:80%;"> <?php echo $res->total_total_titulo_credito; ?>     </td> 
		             
		    		</tr>
		        <?php } } ?>
		        
      
        
            <?php 
          
            
            ?>
            
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