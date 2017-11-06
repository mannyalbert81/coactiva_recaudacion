  	   <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
     

<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Matriz Juicios - coactiva 2017</title>
        
  <script src="view/js/Chart.js"></script>

    
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("Juicio","index2"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Listado de Titulos Registrados en Fomento que no constan en matriz de Liventy.</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  			
  			
  		 <div class="col-lg-2 col-md-2 xs-6">
			  	<p  class="formulario-subtitulo" style="" >Impulsor:</p>
				<select name="abogado" id="abogado"  class="form-control">
			      <option value=""><?php echo "--TODOS--";  ?> </option>
					<?php  foreach($usuariosdt as $res) {?>
						<option value="<?php echo $res->nombre_abg_secretario; ?>" ><?php echo $res->nombre_abg_secretario;  ?> </option>
			            <?php } ?>
			    </select>
		 </div>
  							
  		
      </div>
  		
  		
  		<div class="col-lg-12 col-md-12 xs-12 " style="text-align: center; margin-top: 10px">
  		    
		<button type="submit" formtarget="_blank" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
		
	     </div>
		 </div>
		    
		    </div>
	        </div>
	        </div>
         </form> 
         
        
     
      </div>
     
  </div>
    
      
     
    </head>
    <body style="background-color: #d9e3e4;">
      
     
     
   </body>  

    </html>   
    
  
  	