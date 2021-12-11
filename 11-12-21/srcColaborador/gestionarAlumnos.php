<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestionar Alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
    <link rel="stylesheet" href = "../css/gestionarAlumnos.css">
</head>
<script type="text/javascript">
        function regresar(){ 
            window.location="../srcColaborador/listaAlumnos.php";
        }  
 </script>
<body>
    <?php 
    require_once "../conexionesColaborador/variableSession.php"; 
    require_once "../srcColaborador/header.php"; 
        require_once "../logica/Apoderado.class.php";
        $obj = new Apoderado();
        ?>
				<a href="../srcColaborador/listaAlumnos.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px; "> Lista de alumnos</a>
			</nav>
		</div>
          
            <form action ="../conexiones/registrarAlumno.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/4117/4117111.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2> Registro de alumnos</h2>
             <table class="table table-condensed">
                    <tbody>
                      <tr> 
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;">Nombres:</td>
                        <td>  <input minlength="4" maxlength="15"pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Nombres" name="nombre" required> </td>
                        <td style="text-align: center;vertical-align: middle;">Apellido paterno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido materno" name="apellido_materno" required></td>
                        <td style="text-align: center;vertical-align: middle;">Apellido materno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido paterno" name="apellido_paterno" required></td>
                       </tr> 
                      
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Dni:</td>
                        <td><input minlength="8" maxlength="8" pattern="[0-9]+" type="text" placeholder="&#128113; Dni" name="dni" required></td>
                        <td style="text-align: center;vertical-align: middle;">celular:</td>
                        <td><input minlength="9" maxlength="9" pattern="[0-9]+"type="text" placeholder="celular" name="celular" required></td>
                        
                 <td style="text-align: center;vertical-align: middle;"> Fecha nacimiento:</td> 
                          <td> <input type="date" name="fecha" required> </td>
                     </tr>  

                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Correo:</td>
                        <td><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" placeholder="Correo" name="correo" required></td>
                         <td style="text-align: center;vertical-align: middle;"> Dirección:</td> 
                          <td>  <input minlength="4" maxlength="25" type="text" placeholder="Dirección" name="direccion" required> </td>
                          <td style="text-align: center;vertical-align: middle;">Contraseña:</td>
                        <td><input type="password" placeholder="&#128273; Contraseña" name="password"  required > </td>   
                      </tr> 
                      <tr> 
                     <td style="text-align: center;vertical-align: middle;">Grado:</td>
                        <td>  <select name="grado" id="grado" required >  
                    <option value="" disabled="" selected >Seleccionar Grado</option>
                        <option value="1">Primero</option>
                        <option value="2">Segundo</option>
                        <option value="3">Tercero</option>
                        <option value="4">Cuarto</option>
                        <option value="5">Quinto</option>                 
                    </select>
                    </td>
                    <td style="text-align: center;vertical-align: middle;">Sexo:</td>
                    <td> <select name="sexo" id="sexo" required > 
                        <option value="" disabled="" selected >Seleccionar Sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>  
                        </select>  
                      </td>
                    </tr> 
                    <tr> 
                <td style="text-align: center;vertical-align: middle;">Estado:</td>
                <td> <select name="estado" id="estado" required > 
                    <option value="" disabled="" selected >Seleccionar Estado</option>
                    <option value="1">Matriculado</option>
                    <option value="2">Retirado</option>  
                    </select>    
            </td>
            <td style="text-align: center;vertical-align: middle;">Apoderado:</td>
                   <td> <select name="apoderado" id="apoderado" required > 
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
                  <div>
                  <input type="button" onclick="regresar()" name="volver atrás" value="volver atrás">
                  </div>
                  <div>
                  <input type="submit" value="Guardar"  > 
                  </div>
            </form>

        </div>
       
           
            <?php 
                require_once "../src/footer.php";
                ?>
            
	</header>
    <div class="capa"></div>
<!------- Navegador--------->
    <?php
    require_once "navegadorColaborador.php";
    ?>
     	 
  
</body>
</html>