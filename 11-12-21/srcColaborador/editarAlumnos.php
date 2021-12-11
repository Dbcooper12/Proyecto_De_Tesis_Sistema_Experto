<?php   
    require_once "../conexionesColaborador/variableSession.php";  
    require_once "../logica/Alumno.class.php";  
    require_once "../logica/Apoderado.class.php";
      if(empty($_GET['id'])){
          header("location:listaAlumnos.php");
      }
        $iduser=$_GET['id']; 
        $objAlumno = new Alumno();
        $result=$objAlumno->listarAlumnos($iduser);
  
    foreach( $result as  $data){
          $ID_Alumnos=$data['cod_alumno'];
          $nombre=$data['nombre_alum'];
          $apellidoM=$data['apellido_mater_alum'];
          $apellidoP=$data['apellido_paterno_alum'];
          $dni=$data['dni_alum'];
          $edad=$data['fecha_nacimiento']; 
              if($data['grado_cod_grado']==1){
                $grado='Primero';
              }if($data['grado_cod_grado']==2){
                $grado='Segundo';
              }if($data['grado_cod_grado']==3){
                $grado='Tercero';
              }if($data['grado_cod_grado']==4){
                $grado='Cuarto';
              }if($data['grado_cod_grado']==5){
                $grado='Quinto'; } 
     
        
      $sexo=$data['sexo_alum'];
      if($data['estado_alumno_cod_estado']==1){
         $estado='Matriculado'; 
      }
      if($data['estado_alumno_cod_estado']==2){
        $estado='Retirado'; 
     }
     if($data['estado_alumno_cod_estado']==3){
      $estado='Suspendido'; 
     }
     $apoderado=$data['apoderado_cod_apoderado'];
     $celular =$data['celular_alum']; 
    
     $direccion = $data['direccion_alum'];
      $telefono =$data['celular_alum'];
      $email=$data['correo_alum'];

      $optionGrado = '<option value="'.$grado.'">'.$grado.'</option>';
      $optionSexo = '<option value="'.$sexo.'">'.$sexo.'</option>';
      $optionEstado = '<option value="'.$estado.'">'.$estado.'</option>';
      $optionApoderado = '<option value="'.$apoderado.'">'.$apoderado.'</option>';
       
    }
        $obj = new Apoderado();
      
   ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Editar alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href = "../css/editarAlumnos.css">
</head>
<body>
        <?php 
        require_once "../srcColaborador/header.php";
        ?>
				<a href="listaAlumnos.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de alumnos</a>
			</nav>
		</div>
        <form action ="../conexiones/editarAlumno.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/2921/2921222.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2>Editar alumno</h2>
              <table class="table table-condensed">
              <tbody>
                      <tr> 
                      <input type="hidden" name="cod_alumno" value="<?php echo $ID_Alumnos?>"  >
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;">Nombres:</td>
                        <td>  <input minlength="4" maxlength="15"pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Nombres" value="<?php echo $nombre?>" name="nombre" required> </td>
                        <td style="text-align: center;vertical-align: middle;">Apellido materno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido materno" value="<?php echo $apellidoM?>" name="apellido_materno" required></td>
                        <td style="text-align: center;vertical-align: middle;">Apellido paterno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido paterno" value="<?php echo $apellidoP?>"name="apellido_paterno" required></td>
                       </tr> 
                      
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Dni:</td>
                        <td><input minlength="8" maxlength="8" pattern="[0-9]+" type="text" placeholder="&#128113; Dni" value="<?php echo $dni?>" name="dni" required></td>
                        <td style="text-align: center;vertical-align: middle;">celular:</td>
                        <td><input minlength="9" maxlength="9" pattern="[0-9]+"type="text" placeholder="celular" value="<?php echo $celular?>" name="celular" required></td>
                        
                 <td style="text-align: center;vertical-align: middle;"> Fecha Nacimiento:</td> 
                          <td>  <input   type="date"  name="fecha" value="<?php echo $edad?>" required> </td>
                     </tr>  

                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Correo:</td>
                        <td><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" placeholder="Correo" value="<?php echo $email?>" name="correo" required></td>
                         <td style="text-align: center;vertical-align: middle;"> Dirección:</td> 
                          <td>  <input minlength="4" maxlength="25" type="text" placeholder="Dirección" name="direccion" value="<?php echo $direccion?>" required> </td>
                          <td style="text-align: center;vertical-align: middle;">Contraseña:</td>
                        <td><input type="password" placeholder="&#128273; Contraseña" name="password"   required > </td>   
                      </tr> 
                      <tr> 
                     <td style="text-align: center;vertical-align: middle;">Grado:</td>
                     <td> <select name="grado" id="grado" value="<?php echo $grado?>" class="notItemOne" required > 
                     <option value="" disabled="" selected >Seleccionar Grado</option> 
                        <option value="1">Primero</option>
                        <option value="2">Segundo</option>
                        <option value="3">Tercero</option>
                        <option value="4">Cuarto</option>
                        <option value="5">Quinto</option>                 
                    </select>
                    </td>
                    <td style="text-align: center;vertical-align: middle;">Sexo:</td>
                    <td> <select name="sexo" id="sexo" value="<?php echo $sexo?>" class="notItemOne" required > 
                    <option value="" disabled="" selected >Seleccionar Sexo</option> 
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>  
                        </select>  
                      </td>
                    </tr> 
                    <tr> 
                <td style="text-align: center;vertical-align: middle;">Estado:</td>
                <td> <select name="estado" id="estado" value="<?php echo $estado?>" class="notItemOne" required > 
                <option value="" disabled="" selected >Seleccionar Estado</option>
                    <option value="1">Matriculado</option>
                    <option value="2">Retirado</option>  
                    </select>    
            </td>
                   <td style="text-align: center;vertical-align: middle;">Apoderado:</td>
                   <td> <select name="apoderado" id="apoderado" value="" class="notItemOne" required > 
                   <option value="" disabled="" selected >Seleccionar Apoderado</option>                  
                   <?php 
                     $resultado = $obj->cargarDatos(); 
                     for ($i = 0; $i < count($resultado); $i++) {                          
                           echo '<option value="'.$resultado[$i]["cod_apoderado"].'">'.$resultado[$i]["nombre_apo"]." ".$resultado[$i]["apellido_pater_apo"]." ".$resultado[$i]["apellido_mater_apo"].'</option>';
                      }
                    ?>                    
                    </select>    
                  </td>
                  </tr> 
                    </tbody> 
                  </table> 
            <input type="submit" value="Actualizar datos"  >
            </form>
            <?php 
                require_once "../src/footer.php";
                ?>
	</header>
    <div class="capa"></div>
<!------- Navegador--------->
<?php
require_once "../srcColaborador/navegadorColaborador.php";
?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
</body>
</html>