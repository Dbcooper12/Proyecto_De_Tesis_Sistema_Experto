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
      require_once "../conexionesColaborador/variableSession.php";  
        
     require_once "../logica/Session.class.php";
 
       $n = $_SESSION["dni"]; 
       
       $objSession = new Session();
       $result = $objSession->obtenerDatosSessionColaborador($n); 
      foreach($result as $row  ){
         echo $row["nombre_colabo"]." ".$row["apellido_pater_colabo"]." ".$row["apellido_mater_colabo"];
        $dato= $row["cargocod_cargo"];
      } 
     ?>  </p> 
 <a href="miInformacionColaborador.php"><img src="https://image.flaticon.com/icons/png/512/942/942748.png" alt="información" style="width: 30px;height: 30px;"> Mi información</a>
      
     <?php 
      if($dato ==1){
        ?>
         <a href="listaAlumnos.php"><img src="https://image.flaticon.com/icons/png/512/1556/1556231.png" alt="información" style="width: 30px;height: 30px;"> Gestionar alumnos</a>
        <a href="listaPsicologo.php"><img src="https://image.flaticon.com/icons/png/512/1556/1556231.png" alt="información" style="width: 30px;height: 30px;"> Gestionar psicologos</a>
     <?php

      }else{
        ?>
        <a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/4228/4228742.png" alt="información" style="width: 30px;height: 30px;"> Gestionar Test</a>
        <a href="gestionarPreguntas.php"><img src="https://t3.ftcdn.net/jpg/04/56/59/68/240_F_456596862_M6mL863Tga14ibicVUUnlCd1bV54tJAx.jpg" alt="gestionartest" style="width: 30px;height: 30px;"> Modificar preguntas</a>
         <?php
      }
     ?>
			   <a href="../conexiones/cerrarConexion.php"><img src="https://image.flaticon.com/icons/png/512/1574/1574351.png" alt="información" style="width: 30px;height: 30px;"> Cerrar Sesion</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> 