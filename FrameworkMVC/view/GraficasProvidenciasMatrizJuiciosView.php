  		   <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
     

<!DOCTYPE HTML>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Matriz Juicios - coactiva 2017</title>
        
  <script src="view/js/Chart.js"></script>

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
      
       
       <?php
       
  
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
       $sel_identificacion_clientes="";
       $sel_fcha_desde="";
       $sel_fcha_hasta="";
        $sel_id_abogado="";
        
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_fcha_desde=$_POST['fcha_desde'];
       	$sel_fcha_hasta=$_POST['fcha_hasta'];
       	$sel_id_abogado = $_POST['id_abogado'];
       
       }
       

       $data ="";
       
       if (!empty($resultEstadoProcesal_grafico)) {
       	 
       	$data="[";
       	 
       	foreach($resultEstadoProcesal_grafico as $res) {
       		 
       		$data.="'";
       		$data.=$res->impulsores."',";
       		 
       	}
       	 
       	$data.="]";
       	
       	
       	$data1="[";
       	 
       	foreach($resultEstadoProcesal_grafico as $res) {
       	
       		$data1.="'";
       		$data1.=$res->total."',";
       	
       	}
       	 
       	$data1.="]";
       	
       	
       	
       	// echo ($data1);
       	 
       }else{
       
       }
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form action="<?php echo $helper->url("GraficasMatrizJuicios","index3"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
         
                 <!-- comienxza busqueda  -->
                 
                 <br>         
         <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Generación Providencias</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  			
  			
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
         		<p class="formulario-subtitulo" ># Opreación:</p>
			  	<input type="text"  name="numero_titulo_credito" id="numero_titulo_credito" value="<?php echo $sel_numero_titulo_credito;?>" class="form-control "/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Identificación:</p>
			  	<input type="text"  name="identificacion_clientes" id="identificacion_clientes" value="<?php echo $sel_identificacion_clientes;?>" class="form-control "/> 
			    
		 </div>
		 
		   <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Fecha Desde:</p>
			  	<input type="date"  name="fcha_desde" id="fcha_desde" value="<?php echo $sel_fcha_desde;?>" class="form-control "/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 xs-6">
         		<p class="formulario-subtitulo" >Fecha Hasta:</p>
			  	<input type="date"  name="fcha_hasta" id="fcha_hasta" value="<?php echo $sel_fcha_hasta;?>" class="form-control "/> 
			    
		 </div>
      </div>
  		
  		
  		<div class="col-lg-12 col-md-12 xs-12 " style="text-align: center; margin-top: 10px">
  		
  		<button type="submit" onclick = "this.form.action = '<?php echo $helper->url("GraficasMatrizJuicios","index3"); ?>'; this.form.target = '_self'; this.form.submit()" id="buscar" name="buscar" value="Buscar"   class="btn btn-info" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i></button>
  		    
		 <?php  if (!empty($resultEstadoProcesal_grafico)) {	?>	 
	    
	    <button type="submit" id="reporte_rpt" name="reporte_rpt" value="Imprimir Gráfica" onclick = "this.form.action = '<?php echo $helper->url("GraficasMatrizJuicios","index3"); ?>'; this.form.target = '_blank'; this.form.submit()"  class="btn btn-success" style="margin-top: 10px;" ><i class="glyphicon glyphicon-print"></i> Imprimir Gráfica</button>         
	  
		<?php } ?>
	     </div>
		 </div>
		    
		    </div>
	        </div>
	        </div>
         </form> 
         <?php if(!empty($html)){?>
			<div class="col-lg-12 col-md-12 xs-12 " style="text-align: center; margin-top: 10px">
			<div class="col-lg-4 col-md-4 xs-4 ">
			</div>
			<div class="col-lg-4 col-md-4 xs-4 ">
			<?php echo $html;?>
			</div>
			<div class="col-lg-4 col-md-4 xs-4 ">
			</div>
			</div>
			
		
		<?php  }?>
         
         <form action="<?php echo $helper->url("GraficasMatrizJuicios","index3"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12" target="_blank">
      
       <?php  if (!empty($resultEstadoProcesal_grafico)) {	?>	 
	    <div class="col-lg-12 col-xs-12 col-md-12">
	    <div class="panel panel-info">
	     
		<div id="canvas-holder">
		<canvas id="chart-area" width="600" height="150"></canvas>
		</div>
		</div>
		</div>
		<?php } ?>	
		
		<br>
		<br>
		<br>
	 </form>
     
      </div>
     
  </div>
    
      
      <script>
		

	var barChartData = {
		
		labels : <?php echo $data;?>,
		datasets : [
			{
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : <?php echo $data1;?>
			}
		]

	}	
		
			var ctx3 = document.getElementById("chart-area").getContext("2d");
			
						
			window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
		
			</script>
			
			   <script type="text/javascript">
		$("#buscar").click(function(){
			var fechadesde=$("#fcha_desde").val();
			 var fechahasta=$("#fcha_hasta").val();
		
			 
		     if(fechadesde > fechahasta)
			 {
				 alert("Fecha desde no puede ser mayor");
				 return false;
		     }
			
			
				
			});
	
	</script>
    </head>
    <body style="background-color: #d9e3e4;">
      
     
     
   </body>  

    </html>   
    
  
  	