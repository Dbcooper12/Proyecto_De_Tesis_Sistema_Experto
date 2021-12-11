<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestionar test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
    <link rel="stylesheet" href = "../css/gestionarApoderado.css">
</head>
<script type="text/javascript">
        function regresar(){ 
            window.location="../srcColaborador/listaTest.php";
        }  
 </script>
<body>
    <?php 
        require_once "../conexionesColaborador/variableSession.php";  
        require_once "../srcColaborador/header.php";
        ?>
				<a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px; "> Lista de test</a>
			</nav>
		</div> 
        <form action ="../conexionesTest/registrarTest.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/4117/4117111.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2> Registro de Test</h2>
             <table class="table table-condensed">
                    <tbody>
                      <tr> 
                   <!-------   <input type="hidden" name="cod_apoderado" value="<?php //echo $ID_Alumnos?>"  > -->
                        <td class='col-md-3' style="text-align: center;vertical-align: middle;">Fecha inicio:</td>
                        <td>  <input type="date" name="fecha_inicio" required> </td>
                        <td style="text-align: center;vertical-align: middle;">Fecha Final:</td>
                        <td><input type="date" name="fecha_final" required></td>                    
                    </tr>  
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Descripcion:</td>
                        <td><input  type="text" placeholder="descripcion" name="descripcion" required></td> 
                    </tr>             
                      </tbody> 
                  </table>
                  <div>
                  <input type="button" onclick="regresar()" name="volver atrás" value="volver atrás">
                  </div>
                  <div>
                  <input type="submit" value="Guardar"  > 
                  </div>
            </form> 
            <?php 
                require_once "../srcColaborador/footer.php";
                ?>
            
	</header>
    <div class="capa"></div>
<!------- Navegador--------->
    <?php
    require_once "navegadorColaborador.php";
    ?>
     	 
  
</body>
</html>