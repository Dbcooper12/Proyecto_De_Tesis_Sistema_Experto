<?php   
 //require_once "../conexionesColaborador/variableSession.php";  
 require_once "../logica/Apoderado.class.php"; 
if(empty($_GET['id'])){
    header("location:listaAlumnos.php");
}
$iduser=$_GET['id']; 

$objApoderado = new Apoderado();
$result = $objApoderado->obtenerDatosAapoderado($iduser);
  
    foreach( $result as  $data_a){
      $ID_Alumnos=$data_a['cod_apoderado'];
      $nombre_apo=$data_a['nombre_apo'];
      $apellito_pater_apo=$data_a['apellido_pater_apo'];
      $apellito_mater_apo=$data_a['apellido_mater_apo']; 
      $celular_apo=$data_a['celular_apo'];
      $direccion_apo=$data_a['direccion_apo'];
      $dni_apo=$data_a['dni_apo'];
      $correo_apo=$data_a['correo_apo'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Apoderado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href = "../css/editarAlumnos.css">
</head>
<script type="text/javascript">

    function irAlumno(){
        window.location="../srcColaborador/editarApoderado.php";
    }
    
</script>
<body>
        <?php 
        require_once "../srcColaborador/header.php";
        ?>
				<a href="listaAlumnos.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de alumnos</a>
			</nav>
		</div>
        <form action ="../conexionesColaborador/editarApoderado.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/2921/2921222.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2>Apoderado </h2>
              <table class="table table-condensed">
              <tbody> 
                      <tr>
                      <input type="hidden" name="cod_apoderado" value="<?php echo $ID_Alumnos?>"  >
                        <td style="text-align: center;vertical-align: middle;">Apellido Paterno:</td>
                        <td><input  minlength="4" maxlength="20"pattern="[a-zA-Z]+" type="text" class="form-control input-sm"  name="apellido_pater_apo"  value="<?php echo $apellito_pater_apo ?>"  ></td>
                       
                     </tr> 
                     <tr>
                     <td style="text-align: center;vertical-align: middle;" >Apellido Materno:</td>
                        <td><input minlength="4" maxlength="20"pattern="[a-zA-Z]+" type="text"  class="form-control input-sm" name="apellido_mater_apo" value="<?php echo $apellito_mater_apo ?>"  ></td>
                        
                     </tr>
                     <tr>
                     <td style="text-align: center;vertical-align: middle;">Nombres:</td>
                        <td><input minlength="4" maxlength="20"pattern="[a-zA-Z]+" type="text"   class="form-control input-sm" name="nombre_apo"  value="<?php echo $nombre_apo ?>"  ></td>
                      
                     </tr>
                      <tr> 
                    <td style="text-align: center;vertical-align: middle;">Celular:</td>
                    <td> <input minlength="9" maxlength="9" pattern="[0-9]+" type="text" class="form-control input-sm" name="celular_apo"  value="<?php echo $celular_apo?>"   required></td>
                      </td>
                    </tr>    
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Direccion:</td>
                    <td> <input minlength="4" maxlength="30" class="form-control input-sm" name="direccion_apo" value="<?php echo $direccion_apo?>"   required></td>
                      </td>
                    </tr> 
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Dni:</td>
                    <td> <input minlength="8" maxlength="8" pattern="[0-9]+" type="text" class="form-control input-sm" name="dni_apo" value="<?php echo $dni_apo?>"   required></td>
                      </td> 
                    </tr>
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Correo:</td>
                    <td> <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" class="form-control input-sm" name="correo_apo" value="<?php echo $correo_apo?>"  required></td>
                      </td> 
                    </tr>
                    </tbody> 
                  </table> 
                  <input type="submit" value="Actualizar datos"  >
            </form>
           
            <center>
            
            </center>
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