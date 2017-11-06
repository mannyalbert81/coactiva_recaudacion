<!DOCTYPE HTML>
<html lang="es">
     <head>
        <meta charset="utf-8"/>
        <title>Roles - coactiva 2016</title>
   
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
				alertify.success("Has Pulsado en Editar"); 
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

		    // cada vez que se cambia el valor del combo
		    $("#Guardar").click(function() 
			{
		   
		    	var nombre_rol = $("#nombre_rol").val();
		    
		   				
		    	if (nombre__rol == " ")
		    	{
			    	
		    		$("#mensaje_nombres").text("Introduzca nombre de rol ");
		    		$("#mensaje_nombres").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_nombres").fadeOut("slow"); //Muestra mensaje de error
		            
				}
		    	
		  }); 


		 
				
				$( "#nombre_rol" ).focus(function() {
					$("#mensaje_nombres").fadeOut("slow");
    			});
				    
		}); 

	</script>
    </head>
      <body style="background-color: #d9e3e4;">
    
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
  <div></div>
    
      <form action="<?php echo $helper->url("Roles","InsertaRoles"); ?>" method="post" class="col-lg-6">
            
            <h4 style="color:#ec971f;">Insertar Roles</h4>
            <hr/>
               <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
               
               <div class="row">
		       <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Nombres Roles</p>
			  	<input type="text"  name="nombre_rol" id="nombre_rol" value="<?php echo $resEdit->nombre_rol; ?>" class="form-control"/> 
			  	<input type="hidden"  name="id_rol"  value="<?php echo $resEdit->id_rol; ?>" class="form-control"/> 
			    <div id="mensaje_nombres" class="errores"></div>
			  </div>
			   </div>
	              
            
		     <?php } } else {?>
		     
		      <div class="row">
		       <div class="col-xs-6 col-md-6">
			  	<p  class="formulario-subtitulo" >Nombres Roles</p>
			  	<input type="text"  name="nombre_rol" id="nombre_rol" value="" class="form-control"/> 
			    <div id="mensaje_nombres" class="errores"></div>
			  </div>
			 </div>
		    <hr>
		          <!--  
	            	Nombre Rol: <input type="text" name="nombre_rol." value="<?php // echo $resEdit->nombre_rol; ?>" class="form-control"/>
		            
		    -->   
		            
		     <?php } ?>
		        
		         <div class="row" margin-top= "20px">
		          <div class="col-xs-6 col-md-6" style="text-align: center;" >
                  <input type="submit" value="Guardar" onClick="Ok()"  class="btn btn-success"/>
                  </div>
                  </div>
                  </form>
       
       
        <div class="col-lg-6">
            <h4 style="color:#ec971f;">Roles de Usuario</h4>
            <hr/>
        </div>
        <section class="col-lg-6 usuario" style="height:400px;overflow-y:scroll;">
        <table class="table table-hover">
	         <tr>
	    		<th style="color:#456789;font-size:80%;">Id</th>
	    		<th style="color:#456789;font-size:80%;">Nombre Rol</th>
	    		<th></th>
	    		<th></th>
	  		</tr>
            
	            <?php foreach($resultSet as $res) {?>
	        		<tr>
	                   <td style="color:#000000;font-size:80%;"> <?php echo $res->id_rol; ?>  </td>
		               <td style="color:#000000;font-size:80%;"> <?php echo $res->nombre_rol; ?>     </td> 
		               
		               <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Roles","index"); ?>&id_rol=<?php echo $res->id_rol; ?>" class="btn btn-warning" onClick="notificacion()" style="font-size:65%;">Editar</a>
			                </div>
			            
			             </td>
			             <td>   
			                	<div class="right">
			                    <a href="<?php echo $helper->url("Roles","borrarId"); ?>&id_rol=<?php echo $res->id_rol; ?>" class="btn btn-danger" onClick="Borrar()" style="font-size:65%;">Borrar</a>
			                </div>
			               
		               </td>
		    		</tr>
		        <?php } ?>
            
            <?php 
            
            //echo "<script type='text/javascript'> alert('Hola')  ;</script>";
            
            ?>
            
       	</table>     
      </section>
       
  
       
       <?php include("view/modulos/footer.php"); ?>
        </div>
      </div>
     </body>  
    </html>          