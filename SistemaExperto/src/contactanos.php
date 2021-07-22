<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/contactanos.css">
</head>

<body>
<script type="text/javascript">
        function mostrar(){
           var  respuesta = confirm("estas seguro que deseas eliminar este alumno?");
           if(respuesta == true){
               return true;
           }else{
               return false;
           }
        }

        </script>
   
<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰ Sistema Experto</label>
		</div>
			<div class="logo">
                <!-- logo	---------------> 
    <p>
   </p> 
		 </div>
			<nav class="menu"> 
               <span  >  <?php
               date_default_timezone_set('America/Guatemala');
                function fechaC(){
                    $mes=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    return date('d')." de ". $mes[date('n')]. " de " .date('Y');
                } 
                echo fechaC(); 
               ?>  </span>
				<a href="principal.php">Inicio</a>
				<a href="contactanos.php">Contacto</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h3>Contactanos</h3> <br>
                    <h3>Lista de alumnos</h3>
              
                    </div>
            

             </div>
	</header>

    <div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav> 
            <p class="centrado">
            Mi Perfil
            </p>
        <p class="centrado">
          
     <img alt="Logotipo de GNU (GNU is Not Unix)" src="../img/perfil.png" title="Logotipo de GNU (GNU is Not Unix)">
    </p>
            
        <p class="centrado">  <?php
    session_start();
    if(!isset($_SESSION["dni"])){
        header("location:../index.php");
    }
    ?>
    <?php
       $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
       mysqli_set_charset($conexion,"utf8");

       $n = $_SESSION["dni"]; 
       
      $sql="SELECT * FROM alumnos where dni='$n'";
     
      $resultado = mysqli_query($conexion,$sql);
      while($row = mysqli_fetch_assoc($resultado)){
         echo $row["nombres"]."  ".$row["apellidos"];
        $dato= $row["ID_Alumnos"];
      }
     ?>  </p> 
			<a href="miInformacion.php">Mi informacion</a>
			<a href="#">Diagnostico</a>
			<a href="#">Historial de diagnostico</a>
            <?php 
            if($dato==1){ ?>
            <a href="gestionarAlumnos.php">Gestionar alumnos</a>
            <a href="#">Agregar Sintomas</a>
            <?php }
      mysqli_free_result($resultado); ?> 
            <a href="../conexiones/cerrarsesion.php">Cerrar Sesion</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> 

</body>

</html>