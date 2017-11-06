<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Asignacion Titulo Credito - coactiva 2016</title>
        
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
       
       
        <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#Guardar").click(function() 
			{
		    
		    	var id_ciudad= $("#id_ciudad").val();
		     		    	
		    	
		    	if (id_ciudad == 0)
		    	{
			    	
		    		$("#mensaje_id_ciudad").text("Seleccione una Ciudad");
		    		$("#mensaje_id_ciudad").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_ciudad").fadeOut("slow"); //Muestra mensaje de error
		            
				}    
				
		
			}); 


		        $( "#id_ciudad" ).focus(function() {
				  $("#mensaje_id_ciudad").fadeOut("slow");
			    });
				
				
		}); 

	</script>
       
       
     <script>
	$(document).ready(function(){
		
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
             
            	


         	   $.post("<?php echo $helper->url("AsignacionTituloCredito","returnImpulsorbyciudad"); ?>", datos, function(resultUsuarioImpulC) {

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
	            alert('Debes seleccionar un Titulo de Credito.');
	            return false;
	        }

	      
	    }); 

	});
	</script>

    <script>
    $(document).ready(function(){
        $("#marcar_todo").change(function () {
            if ($(this).is(':checked')) {
               
                $(".marcados").prop('checked', true); 
            } else {
                
                $("input:checkbox").prop('checked', false);
                $("input[type=checkbox]").prop('checked', false);
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
		   
		?>
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
     
      <form action="<?php echo $helper->url("AsignacionTituloCredito","InsertaAsignacionTituloCredito"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
    
    <div class="col-lg-5">
    <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
           <?php //no hay datos para editar?>
        
            
		     <?php } } else {?>
		     
		 
		    <h4 style="color:#ec971f;">Asignar Titulos Credito</h4>
            	<hr/>
		   	<div class="col-xs-6">
			  	<p  class="formulario-subtitulo" >Juzgado</p>
			  	<select name="id_ciudad" id="id_ciudad"  class="form-control" >
					<option value="0">--Seleccione--</option>
					<?php foreach($resultCiu as $resCiu) {?>
						<option value="<?php echo $resCiu->id_ciudad; ?>"  ><?php echo $resCiu->nombre_ciudad; ?> </option>
			        <?php } ?>
			        	   
		   </select> 
		   <div id="mensaje_id_ciudad" class="errores"></div>			  
			  </div>
			  
			  
		
		  
		    <div class="col-xs-6">
			  <p  class="formulario-subtitulo" >Abogado(a)</p>
	            	 <select name="id_usuarioImpulsor" id="id_usuarioImpulsor"  class="form-control">
						<option value="0"  > -- SIN ESPECIFICAR -- </option>			
								    	
									</select>
		   		   
		    </div>
			  
			  <div class="row">
			  <div class="col-xs-12 col-md-12" style="text-align: center; margin-top:20px" >
			  	<input type="submit" id="Guardar" name="Guardar" value="Guardar" onClick="Ok()" class="btn btn-success"/>
			  <hr>
			  </div>
			  
			</div>   
			 
		
			 
			
			
      
             	
		     <?php } ?>
    </div>
    
    
    <div  class="col-lg-7">
     <h4 style="color:#ec971f;">Lista de titulo</h4>
            <hr/>
    		<div class="col-xs-3">
			
           <input type="text"  name="contenido_busqueda" id="contenido_busqueda" value="" class="form-control"/>
          
            </div>
            
           <div class="col-xs-3">
           <select name="criterio_busqueda" id="criterio_busqueda"  class="form-control">
                                    <?php foreach($resultMenu_busqueda as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>" <?php //if ($resRol->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $desc ?> </option>
                                    <?php } ?>
                                        
           </select>
           
           </div>
           
           <div class="col-xs-2" >

		     	<input type="submit" id="buscar" name="buscar"    onclick="this.form.action='<?php echo $helper->url("AsignacionTituloCredito","index"); ?>'" value="buscar" class="btn btn-info"/>

			</div>
			
			<div class="col-lg-4">
		 <span class="form-control" style="margin-bottom:0px;"><strong>Registros:</strong><?php if(!empty($resultDatos)) echo "  ".count($resultDatos);?></span>
		 </div>
		
	<div class="col-xs-12">
      
      
        
       <section   style="height:400px;overflow-y:scroll;width: 655px;">
        <table class="table table-hover ">
	         <tr >
	    		<th style="color:#456789;font-size:80%;"><input type="checkbox" id="marcar_todo" class="checkbox"> </th>
	    		<th style="color:#456789;font-size:80%;">Nº Titulo Credito</th>
	    		<th style="color:#456789;font-size:80%;">Numero de Identifiación</th>
	    		<th style="color:#456789;font-size:80%;">Nombres Cliente</th>
	    		<th style="color:#456789;font-size:80%;">Celular Cliente</th>
	    		<th style="color:#456789;font-size:80%;">Total</th>
	    		<th style="color:#456789;font-size:80%;">Fecha Corte</th>
	    		<th style="color:#456789;font-size:80%;">Juzgado</th>
	    		
	    		<th></th>
	    		<th></th>
	  		</tr>
            
	            <?php if (!empty($resultDatos)) {  foreach($resultDatos as $res) {?>
	        		<tr>
	        		<th style="color:#456789;font-size:80%;"><input type="checkbox" id="id_titulo_credito[]"   name="id_titulo_credito[]"  value="<?php echo $res->id_titulo_credito; ?>" class="marcados"></th>
	                 
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->numero_titulo_credito; ?></td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->identificacion_clientes; ?>     </td> 
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombres_clientes; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->celular_clientes; ?>  </td>
		                <td style="color:#000000;font-size:80%;"> <?php echo $res->total_total_titulo_credito; ?>  </td>
		                 <td style="color:#000000;font-size:80%;"> <?php echo $res->fecha_corte; ?>  </td>
		                 <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_ciudad; ?>  </td>
		             
		              
		           	   <td>
			           		
			                <hr/>
		               </td>
		    		</tr>
		        <?php } } ?>
		        
      
        
            <?php 
          
            
            ?>
            
       	</table>     
		     
      </section>
        
        </div>
    </div>
    
    </form>
  

    </div>
   </div>
     </body>  
    </html>   