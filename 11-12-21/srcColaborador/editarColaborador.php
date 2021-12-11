<?php   
    require_once "../conexionesColaborador/variableSession.php";  
    require_once "../srcColaborador/header.php";  
    require_once "../logica/Colaborador.class.php"; 
      if(empty($_GET['id'])){
          header("location:listaPsicologo.php");
      }
        $iduser=$_GET['id']; 
        $objColaborador = new Colaborador();
        $result=$objColaborador->listarColaborador($iduser);
  
    foreach( $result as  $data){
      $ID_Alumnos=$data['cod_colaborador'];
      $nombre=$data['nombre_colabo'];
      $apellidoP=$data['apellido_mater_colabo'];
      $apellidoM=$data['apellido_pater_colabo'];
      $dni=$data['dni_colabo']; 
      if($data['estado_colaborador_cod_estado_colaborador']==1){
        $estado= 'Disponible'; 
      } if($data['estado_colaborador_cod_estado_colaborador']==2){
        $estado= 'No disponible'; 
      }  
      $telefono =$data['celular_colabo'];
      $email=$data['correo_colabo'];
    }  
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
        <form action ="../conexionesColaborador/editarColaborador.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/2921/2921222.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2>Editar colaborador</h2>
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
                        <td><input minlength="9" maxlength="9" pattern="[0-9]+"type="text" placeholder="celular" value="<?php echo $telefono?>" name="celular" required></td>
                        <td style="text-align: center;vertical-align: middle;">Correo:</td>
                        <td><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" placeholder="Correo" value="<?php echo $email?>" name="correo" required></td>
                      </tr>  

                      <tr>
                          <td style="text-align: center;vertical-align: middle;">Contraseña:</td>
                        <td><input type="password" placeholder="&#128273; Contraseña" name="password"   required > </td>   
                        <td style="text-align: center;vertical-align: middle;">Estado:</td>
                          <td> <select name="estado" id="estado" value="" class="notItemOne" required > 
                          <option value="" disabled="" selected >Seleccionar Estado</option>
                            <option value="1">Disponible</option>
                            <option value="2">No disponible</option>  
                        </select>  
                      </td>
                      <td style="text-align: center;vertical-align: middle;">Cargo:</td>
                          <td> <select name="cargo" id="cargo" value="" class="notItemOne" required > 
                          <option value="" disabled="" selected >Seleccionar cargo</option>
                            <option value="1">Directora</option>
                            <option value="2">Psicologo</option>  
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