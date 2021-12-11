<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav> 
            <p class="centrado">
            Mi Perfil
            </p>
        <p class="centrado">
          
     <img alt="Logotipo de GNU (GNU is Not Unix)" src="https://image.flaticon.com/icons/png/512/3135/3135715.png" title="Logotipo de GNU (GNU is Not Unix)">
    </p>
            
        <p class="centrado">  
    <?php
        require_once "../conexiones/variableSession.php";        
        require_once "../logica/Session.class.php";   
 
       $dni = $_SESSION["dni"]; 
       
       $objSession = new Session();
       $resultado = $objSession->obtenerDatosSessionAlumno($dni);     
      foreach($resultado as $row  ){
         echo $row["nombre_alum"]." ".$row["apellido_paterno_alum"]." ".$row["apellido_mater_alum"];
        $dato= $row["cod_alumno"];
      }
     ?>  </p> 
			<a href="../src/miInformacion.php"><img src="https://image.flaticon.com/icons/png/512/942/942748.png" alt="información" style="width: 30px;height: 30px;"> Mi información</a>
			<a href="../srcTest/listaTest.php"><img src="https://image.flaticon.com/icons/png/512/4228/4228742.png" alt="información" style="width: 30px;height: 30px;">Test</a>
			<a href="../conexiones/cerrarConexion.php"><img src="https://image.flaticon.com/icons/png/512/1574/1574351.png" alt="información" style="width: 30px;height: 30px;"> Cerrar Sesion</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> 