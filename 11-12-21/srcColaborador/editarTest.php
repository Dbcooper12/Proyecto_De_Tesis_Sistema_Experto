<?php   
    require_once "../conexionesColaborador/variableSession.php";  
    require_once "../srcColaborador/header.php";  
    require_once "../logica/Test.class.php"; 
      if(empty($_GET['id'])){
          header("location:listaPsicologo.php");
      }
        $iduser=$_GET['id']; 
        $objColaborador = new Test();
        $result=$objColaborador->listarTest($iduser);
  
    foreach( $result as  $data){
      $ID_Alumnos=$data['cod_test'];
      $fecha_inicio=$data['fecha_inicio'];
      $fecha_final=$data['fecha_final'];
      $descripcion=$data['descripcion'];     
     
    }  
   ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Editar test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href = "../css/editarAlumnos.css">
</head>
<body>
        <?php 
        require_once "../srcColaborador/header.php";
        ?>
				<a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de test</a>
			</nav>
		</div>
        <form action ="../conexionesTest/editarTest.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/2921/2921222.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2>Editar test</h2>
              <table class="table table-condensed">
              <tbody>
                      <tr> 
                      <input type="hidden" name="cod_test" value="<?php echo $ID_Alumnos?>"  >
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;">Fecha inicio:</td>
                        <td>  <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio?>" required> </td>
                        <td style="text-align: center;vertical-align: middle;">Fecha Final:</td>
                        <td><input type="date" name="fecha_final" value="<?php echo $fecha_final?>" required></td>  
                       </tr>                      
                      <tr>
                      <td style="text-align: center;vertical-align: middle;">Descripcion:</td>
                        <td><input  type="text" placeholder="Descripcion" name="descripcion"  value="<?php echo $descripcion?>" required></td>
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