  	
      
     

<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Matriz Juicios - coactiva 2017</title>
        
    <script type="text/javascript" src="view/js/qrcode.js"></script>
	<body onload="update_qrcode();">
     
   

    </head>
    <body style="background-color: #d9e3e4;">
    
     
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       

         

               <form action="<?php echo $helper->url("CreacionQr","index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
     
               <br>         
        
        <?php if (!empty($resultSet)) { ?>
         <input type="text" id="msg"  name="msg" value="<?php $resultSet; ?> ">
  	   
  	  <?php }?>
        
			  <div class="row">
			  <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;" >
			   <button type="submit" id="btn_guardar_qr" name="btn_guardar_qr" value="Agregar"   class="btn btn-success" style="margin-top: 10px;" > Agregar</button>         
	 	
			  </div>
			</div> 
			
            </form>
    
			
      </div>
     
  </div>
      <!-- termina
       busqueda  -->
       
 
   </body>  

    </html>   
    
  

    
