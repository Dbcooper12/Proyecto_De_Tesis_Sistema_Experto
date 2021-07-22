<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/miInformacion.css">
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
               ?> 
               
            </span>
            <?php
    session_start();
    if(!isset($_SESSION["dni"])){
        header("location:../index.php");
    } 
    $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
    mysqli_set_charset($conexion,"utf8");

    $n = $_SESSION["dni"]; 
       
      $sql="SELECT * FROM alumnos where dni='$n'";
     
      $resultado = mysqli_query($conexion,$sql);
      
    while($data = mysqli_fetch_assoc($resultado)){
        $ID_Alumnos=$data['ID_Alumnos'];
        $nombre=$data['nombres'];
        $apellido=$data['apellidos'];
        $dni=$data['dni'];
        $edad=$data['edad'];
        $grado=$data['grado'];
        $sexo=$data['sexo'];
        $estado=$data['estado']; 
        $optionEdad = '<option value="'.$edad.'">'.$edad.'</option>';
        $optionGrado = '<option value="'.$grado.'">'.$grado.'</option>';
        $optionSexo = '<option value="'.$sexo.'">'.$sexo.'</option>';
        $optionEstado = '<option value="'.$estado.'">'.$estado.'</option>';

    } 

    ?>
				<a href="principal.php">Inicio</a>
				<a href="contactanos.php">Contacto</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h3>Datos personales</h3> <br>                    
                     
                    <div class="contenedor_datos">
                    <div class=""> 
                    <form action ="../conexiones/editarInformacion.php" method="post">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                      <input type="hidden" name="ID_Alumnos" value="<?php echo $ID_Alumnos?>"  >
                        <td class='col-md-3'>Nombres:</td>
                        <td><input type="text" class="form-control input-sm" name="nombre" value="<?php echo $nombre?>" required></td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" class="form-control input-sm" name="apellido" value="<?php echo $apellido?>" required></td>
                      </tr>
                      					  <tr>
                        <td>DNI:</td>
                        <td><input type="text" class="form-control input-sm" required name="dni" value="<?php echo $dni?>"></td>
                      </tr>

                      <tr>
                        <td>Edad:</td>
                        <td><select name="edad" id="edad" value="<?php echo $edad?>" class="notItemOne" required > 
             <?php
             echo $optionEdad;
             ?>
                <option value="" disabled=""  >Seleccionar Edad</option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>
                 <option value="14">14</option>
                 <option value="15">15</option>
                 <option value="16">16</option>
                 <option value="17">17</option>
             </select></td>
                      </tr> 
					  <tr>
                                     <td>Grado:</td>
                        <td> <select name="grado" id="grado" value="<?php echo $grado?>" class="notItemOne" required > 
             <?php
             echo $optionGrado;
             ?>
                  <option value="" disabled=""  >Seleccionar Grado</option>
                 <option value="Primero">Primero</option>
                 <option value="Segundo">Segundo</option>
                 <option value="Tercero">Tercero</option>
                 <option value="Cuarto">Cuarto</option>
                 <option value="Quinto">Quinto</option>
             </select></td>
                      </tr>
					  <tr>
                        <td>Sexo</td>
                        <td><select name="sexo" id="sexo" value="<?php echo $sexo?>" class="notItemOne" required > 
             <?php
            echo $optionSexo;
             ?>
             <option value="" disabled=""  >Seleccionar Sexo</option>
                 <option value="Masculino">Masculino</option>
                 <option value="Femenino">Femenino</option> 
         </select>  
        </td>
                      </tr> 
                      <tr>
                        <td> </td>
                       <td> <input type="submit" value="Actualizar datos"  ></td> 
                      </tr>

                    </tbody>
                    
                  </table>
                    </div>
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
            
        <p class="centrado"> 
 
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