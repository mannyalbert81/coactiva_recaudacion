<?php 

$controladores=$_SESSION['controladores'];

 function getcontrolador($controlador,$controladores){
 	$display="display:none";
 	
 	if (!empty($controladores))
 	{
 	foreach ($controladores as $res)
 	{
 		if($res->nombre_controladores==$controlador)
 		{
 			$display= "display:block";
 			break;
 			
 		}
 	}
 	}
 	
 	return $display;
 }

?>


<div class="container" style="margin-top: 15px; " >
<div class="row">
<div class="col-xs-12">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>	
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown"  style="<?php echo getcontrolador("MenuAdministracion",$controladores) ?>">
        
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" ><?php echo " Administración" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          
        	<li style="<?php echo getcontrolador("Usuarios",$controladores) ?>">
        	<a href="index.php?controller=Usuarios&action=index"><span class="glyphicon glyphicon-user" aria-hidden="true"> Usuarios</span> </a>
		    </li>
			<li style="<?php echo getcontrolador("Roles",$controladores) ?>">
			<a href="index.php?controller=Roles&action=index"> <span class=" glyphicon glyphicon-asterisk" aria-hidden="true"> Roles de Usuario</span> </a>
			</li>
			<li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>">
			<a href="index.php?controller=PermisosRoles&action=index"><span class="glyphicon glyphicon-plus" aria-hidden="true"> Permisos Roles</span> </a>
			</li>
			<li style="<?php echo getcontrolador("Controladores",$controladores) ?>">
			<a href="index.php?controller=Controladores&action=index"><span class="glyphicon glyphicon-inbox" aria-hidden="true"> Controladores</span> </a>
			</li>
			<!-- 
			<li style="<?php echo getcontrolador("Repositorio",$controladores) ?>">
			<a href="index.php?controller=Repositorio&action=index"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Gestion Repositorios</span> </a>
			</li>
			 -->
			
</ul>
</li>

<!-- 

        <li class="dropdown" style="<?php echo getcontrolador("MenuProcesos",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Procesos" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          	<li style="<?php echo getcontrolador("AsignacionSecretarios",$controladores) ?>">
          	<a href="index.php?controller=AsignacionSecretarios&action=index"><span class="glyphicon glyphicon-copy" aria-hidden="true"> Asignacion Secretarios</span> </a>
            </li>
			<li style="<?php echo getcontrolador("FirmasDigitales",$controladores) ?>">
			<a href="index.php?controller=FirmasDigitales&action=index"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Firmas Digitales</span> </a>
            </li>
            <li style="<?php echo getcontrolador("Certificados",$controladores) ?>">
            <a href="index.php?controller=CertificadosElectronicos&action=index"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"> Registrar Certificado Electronico</span> </a>
            </li>
            <li style="<?php echo getcontrolador("FirmasDigitales",$controladores) ?>">
            <a href="index.php?controller=FirmasDigitales&action=firmarDocumento"><span class="glyphicon glyphicon-adjust" aria-hidden="true"> Firmar Documento</span> </a>
            </li>
            <li style="<?php echo getcontrolador("AsignacionTituloCredito",$controladores) ?>">
            <a href="index.php?controller=AsignacionTituloCredito&action=index"><span class="glyphicon glyphicon-adjust" aria-hidden="true"> Asignar Titulo Credito</span> </a>
            </li>
            <li style="<?php echo getcontrolador("ReasignarTitulo",$controladores) ?>">
            <a href="index.php?controller=ReasignarTitulo&action=index"><span class="glyphicon glyphicon-edit" aria-hidden="true"> Reasignar Titulo Credito</span> </a>
            </li>
            <li style="<?php echo getcontrolador("UsuariosAnteriores",$controladores) ?>">
        	<a href="index.php?controller=UsuariosAnteriores&action=index"><span class="glyphicon glyphicon-user" aria-hidden="true"> Usuarios Antiguos</span> </a>
		    </li>
			
</ul>
</li>
     
 -->   

         <li class="dropdown" style="<?php echo getcontrolador("MenuConsultas",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Procesos" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <!-- 
          <li style="<?php echo getcontrolador("Trazas",$controladores) ?>">
          <a href="index.php?controller=Trazas&action=index"><span class="glyphicon glyphicon-save-file" aria-hidden="true"> Auditoria del Sistema</span> </a>
          </li>
          <li style="<?php echo getcontrolador("Citaciones",$controladores) ?>">
          <a href="index.php?controller=Citaciones&action=consulta"><span class="glyphicon glyphicon-link" aria-hidden="true"> Citaciones</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaOficiosImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaOficiosImpulsores&action=consulta_oficios_impulsores_firmados"><span class="glyphicon glyphicon-copy" aria-hidden="true"> Oficios</span> </a>
          </li>
		  <li style="<?php echo getcontrolador("ConsultaCitacionesLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaCitacionesLiquidador&action=consulta_liquidador"><span class="glyphicon glyphicon-link" aria-hidden="true"> Citaciones</span> </a>
          </li>
           <li style="<?php echo getcontrolador("ConsultaOficiosLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaOficiosLiquidador&action=consulta_oficios_liquidador_firmados"><span class="glyphicon glyphicon-copy" aria-hidden="true"> Oficios</span> </a>
          </li>
          <li style="<?php echo getcontrolador("FirmarOficios",$controladores) ?>">
          <a href="index.php?controller=FirmarOficios&action=consulta_oficios_secretarios_firmados"><span class="glyphicon glyphicon-copy" aria-hidden="true"> Oficios</span> </a>
          </li>
          
          <li style="<?php echo getcontrolador("JuicioImpulsor",$controladores) ?>">
          <a href="index.php?controller=Juicio&action=consulta"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"> Juicios</span> </a>
          </li>
          <li style="<?php echo getcontrolador("JuicioSecretario",$controladores) ?>">
          <a href="index.php?controller=Juicio&action=consulta_secretario"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"> Juicios</span> </a>
          </li>
          
          <li style="<?php echo getcontrolador("Clientes",$controladores) ?>">
          <a href="index.php?controller=Clientes&action=consulta"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"> Clientes</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ClientesSecretarios",$controladores) ?>">
          <a href="index.php?controller=Clientes&action=consulta_secretario"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"> Clientes</span> </a>
          </li>
          
          <li style="<?php echo getcontrolador("ConsultaDocumentosImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosImpulsores&action=consulta_impulsores_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaDocumentosSecretarios",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosSecretarios&action=consulta_secretarios_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaAvocoImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoImpulsores&action=consulta_impulsores_avoco_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaAvocoSecretarios",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoSecretarios&action=consulta_secretarios_avoco_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>	
          <li style="<?php echo getcontrolador("ConsultaCordinador",$controladores) ?>">
          <a href="index.php?controller=ConsultaCordinador&action=consulta_cordinador"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Documentos Generales</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaCordinador",$controladores) ?>">
          <a href="index.php?controller=ConsultaCordinadorJuicios&action=index"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Consulta Juicios</span> </a>
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaDocumentosLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosLiquidador&action=consulta_liquidador_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaAvocoLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoLiquidador&action=consulta_liquidador_avoco_firmados"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>	
          -->  
           <li style="<?php echo getcontrolador("ActualizarMatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index3"><span class=" glyphicon glyphicon-edit" aria-hidden="true"> Actualizar Matriz Juicios</span> </a>
          </li>	
        
          <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Consulta Matriz Juicios</span> </a>
          </li>
          <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Matriz Juicios</span> </a>
          </li>	
          
          	
         
</ul>
</li>



     <li class="dropdown" style="<?php echo getcontrolador("CreacionDocumentos",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Creación de Documentos" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Providencia de Suspensión</span> </a>
          </li>	
          <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index4"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Providencia de Levantamiento de Suspensión</span> </a>
          </li>	
          
           <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index5"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Oficios</span> </a>
          </li>	
          
          <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>	
         
       
          
          	
         
</ul>
</li>



     <li class="dropdown" style="<?php echo getcontrolador("MenuReportes",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Reportes" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Estado Procesal</span> </a>
          </li>	
           <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Estado Procesal</span> </a>
          </li>	
          <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Estado Procesal</span> </a>
          </li>
          
          
           <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Actualización Matriz</span> </a>
          </li>	
           <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Actualización Matriz</span> </a>
          </li>	
          <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Actualización Matriz</span> </a>
          </li>
          
          
          
          <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index3"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Generación Providencias</span> </a>
          </li>	
           <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index3"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Generación Providencias</span> </a>
          </li>	
          <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=GraficasMatrizJuicios&action=index3"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Generación Providencias</span> </a>
          </li>
          <!-- 
          <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=Juicio&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Titulos Fomento</span> </a>
          </li>	
          
          <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=Juicio&action=index2"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Titulos Fomento</span> </a>
          </li>
           -->	
           
           
          <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index6"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Historial Juicios</span> </a>
          </li>	
          
           <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index6"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Historial Juicios</span> </a>
          </li>
          
           <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index6"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Historial Juicios</span> </a>
          </li>	
          
          
           <li style="<?php echo getcontrolador("MatrizJuicios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index7"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true"> Restructuración Juicios</span> </a>
          </li>	
          
           <li style="<?php echo getcontrolador("MatrizJuiciosSecretarios",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index7"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Restructuración Juicios</span> </a>
          </li>
          
           <li style="<?php echo getcontrolador("MatrizJuiciosCordinador",$controladores) ?>">
          <a href="index.php?controller=MatrizJuicios&action=index7"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true">  Restructuración Juicios</span> </a>
          </li>	
		  
		    <li style="<?php echo getcontrolador("Trazas",$controladores) ?>">
          <a href="index.php?controller=Trazas&action=index"><span class="glyphicon glyphicon-save-file" aria-hidden="true"> Auditoria del Sistema</span> </a>
          </li>
</ul>
</li>



<!-- 
          <li class="dropdown" style="<?php echo getcontrolador("MenuJuicios",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Juicios" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("JuicioMixto",$controladores) ?>">
          <a href="index.php?controller=Juicio&action=consulta_seguimiento_juicio"><span class="glyphicon glyphicon-sort" aria-hidden="true"> Seguimiento Juicio</span> </a>
          </li>
          <li style="<?php echo getcontrolador("AutoPagos",$controladores) ?>">
          <a href="index.php?controller=AutoPagos&action=index"><span class="glyphicon glyphicon-filter" aria-hidden="true"> Generar Auto Pago</span> </a>
          </li>
          <li style="<?php echo getcontrolador("AprobacionAutoPago",$controladores) ?>">
          <a href="index.php?controller=AprobacionAutoPago&action=index"><span class="glyphicon glyphicon-tasks" aria-hidden="true"> Aprobacion Auto Pagos</span> </a>
          </li>
    	  <li style="<?php echo getcontrolador("ImpresionAutoPago",$controladores) ?>">
    	  <a href="index.php?controller=ImpresionAutoPago&action=index"><span class=" glyphicon glyphicon-triangle-bottom" aria-hidden="true"> Impresion Auto Pagos</span> </a>
          </li>
          <li style="<?php echo getcontrolador("EtapasJuicios",$controladores) ?>">
    	  <a href="index.php?controller=EtapasJuicios&action=consulta_juicios"><span class=" glyphicon glyphicon-triangle-bottom" aria-hidden="true"> Actualizar Juicios</span> </a>
          </li>
          <li style="<?php echo getcontrolador("FichaJuicio",$controladores) ?>">
          <a href="index.php?controller=FichaJuicio&action=index"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"> Ficha Juicio</span> </a>
          </li>
</ul>
</li>

<li class="dropdown" style="<?php echo getcontrolador("MenuOficios",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Oficios" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("Oficios",$controladores) ?>">
          <a href="index.php?controller=Oficios&action=index"><span class="glyphicon glyphicon-leaf" aria-hidden="true"> Generar Oficios</span> </a>
          </li>
          

</ul>
</li>


<li class="dropdown" style="<?php echo getcontrolador("MenuCitaciones",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Citaciones" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("Citaciones",$controladores) ?>">
          <a href="index.php?controller=Citaciones&action=index"><span class=" glyphicon glyphicon-usd" aria-hidden="true"> Generar Citaciones</span> </a>
          </li>
          
</ul>
</li>
      
      
<li class="dropdown" style="<?php echo getcontrolador("MenuDocumentos",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Documentos" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li style="<?php echo getcontrolador("Documentos",$controladores) ?>">
          <a href="index.php?controller=Documentos&action=index"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Emisón de Providencias</span> </a>
          </li>   
          <li style="<?php echo getcontrolador("Avoco",$controladores) ?>">
          <a href="index.php?controller=AvocoConocimiento&action=index"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>           
          </li>
          
         
         
</ul>
</li>


<li class="dropdown" style="<?php echo getcontrolador("MenuFirmar",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Firmar Electronicamente" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
         
          <li style="<?php echo getcontrolador("FirmarOficios",$controladores) ?>">
          <a href="index.php?controller=FirmarOficios&action=consulta_oficios_secretarios"><span class="glyphicon glyphicon-leaf" aria-hidden="true"> Oficios</span> </a>
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaOficiosImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaOficiosImpulsores&action=consulta_oficios_impulsor"><span class="glyphicon glyphicon-leaf" aria-hidden="true"> Oficios</span> </a>
          </li>
		  
          <li style="<?php echo getcontrolador("ConsultaDocumentosImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosImpulsores&action=consulta_impulsores"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaDocumentosSecretarios",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosSecretarios&action=consulta_secretarios"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>           
          </li>
          
          <li style="<?php echo getcontrolador("ConsultaAvocoImpulsores",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoImpulsores&action=consulta_impulsores_avoco"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>
          <li style="<?php echo getcontrolador("ConsultaAvocoSecretarios",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoSecretarios&action=consulta_secretarios_avoco"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>           
          </li>
          <li style="<?php echo getcontrolador("Citaciones",$controladores) ?>">
          <a href="index.php?controller=Citaciones&action=consulta_firmar"><span class="glyphicon glyphicon-link" aria-hidden="true"> Citaciones</span> </a>
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaAvocoLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaAvocoLiquidador&action=consulta_liquidador_avoco"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Avoco Conocimiento</span> </a>
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaDocumentosLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaDocumentosLiquidador&action=consulta_liquidador"><span class=" glyphicon glyphicon-console" aria-hidden="true"> Providencias</span> </a>           
          </li>
		  
		  <li style="<?php echo getcontrolador("ConsultaOficiosLiquidador",$controladores) ?>">
          <a href="index.php?controller=ConsultaOficiosLiquidador&action=consulta_oficios_liquidador"><span class="glyphicon glyphicon-leaf" aria-hidden="true"> Oficios</span> </a>
          </li>
</ul>
</li>

--> 
<li class="dropdown"  style="<?php echo getcontrolador("DocumentosGenerados",$controladores) ?>">
        
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" ><?php echo " Documentos Generados" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
        	<li style="<?php echo getcontrolador("DocumentosGenerados",$controladores) ?>">
        	<a href="index.php?controller=DocumentosGenerados&action=index"><span class="glyphicon glyphicon-user" aria-hidden="true"> Documentos Generados</span> </a>
		    </li>			
			<!-- 
			<li style="<?php echo getcontrolador("Repositorio",$controladores) ?>">
			<a href="index.php?controller=Repositorio&action=index"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Gestion Repositorios</span> </a>
			</li>
			 -->
			
</ul>
</li>

<li class="dropdown" style="<?php echo getcontrolador("MenuSoporte",$controladores) ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-refresh" ><?php echo " Soporte" ;?> </span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li style="<?php echo getcontrolador("Incidencias",$controladores) ?>">
          <a href="index.php?controller=Incidencias&action=index"><span class="glyphicon glyphicon-user" aria-hidden="true"> Generar Incidencias</span> </a>
          </li>
          
          <li style="<?php echo getcontrolador("RespuestaIncidencias",$controladores) ?>">
          <a href="index.php?controller=RespuestaIncidencias&action=index"><span class="glyphicon glyphicon-user" aria-hidden="true"> Responder Incidencias</span> </a>
          </li>
          
</ul>
</li>



</ul>
    </div>
  </div>
</nav>
</div>
</div>
</div>