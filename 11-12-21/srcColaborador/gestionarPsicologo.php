<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registrar Psicologo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
    <link rel="stylesheet" href = "../css/gestionarAlumnos.css">
</head>
<body>
    <?php 
    require_once "../conexionesColaborador/variableSession.php"; 
    require_once "../srcColaborador/header.php"; 
        
        ?>
				<a href="../srcColaborador/listaPsicologo.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px; "> Lista de Psicologos</a>
			</nav>
		</div>
          
            <form action ="../conexionesColaborador/registrarPsicologo.php" method="post">
        <div style="text-align:center;">
        <img src="https://image.flaticon.com/icons/png/512/4117/4117111.png" alt="información" style="width: 60px;height: 60px;text-align:center;">
        </div>
             <h2> Registro de colaborador</h2>
             <table class="table table-condensed">
                    <tbody>
                      <tr> 
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;">Nombres:</td>
                        <td>  <input minlength="4" maxlength="15"pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Nombres" name="nombre" required> </td>
                        <td style="text-align: center;vertical-align: middle;">Apellido paterno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido paterno" name="apellido_paterno" required></td>
                        <td style="text-align: center;vertical-align: middle;">Apellido materno:</td>
                        <td><input minlength="4" maxlength="25" pattern="[a-zA-Z]+" type="text" placeholder="&#128113; Apellido materno" name="apellido_materno" required></td>
                       </tr> 
                      
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Dni:</td>
                        <td><input minlength="8" maxlength="8" pattern="[0-9]+" type="text" placeholder="&#128113; Dni" name="dni" required></td>
                        <td style="text-align: center;vertical-align: middle;">celular:</td>
                        <td><input minlength="9" maxlength="9" pattern="[0-9]+"type="text" placeholder="celular" name="celular" required></td>
                        <td style="text-align: center;vertical-align: middle;">Correo:</td>
                        <td><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" placeholder="Correo" name="correo" required></td>
                    </tr>  
                     <tr>
                           <td style="text-align: center;vertical-align: middle;">Contraseña:</td>
                         <td><input type="password" placeholder="&#128273; Contraseña" name="password"  required > </td>   
                           <td style="text-align: center;vertical-align: middle;">Estado:</td>
                           <td>  <select name="estado" id="estado" required >  
                               <option value="" disabled="" selected >Seleccionar Estado</option>
                                <option value="1">Disponible</option>
                                <option value="2">No disponible</option>                 
                               </select>
                        </td>
                        <td style="text-align: center;vertical-align: middle;">Cargo:</td>
                    <td> <select name="cargo" id="cargo" required > 
                        <option value="" disabled="" selected >Seleccionar cargo</option>
                            <option value="1">Directora</option>
                            <option value="2">Psicologo</option>  
                        </select>  
                      </td>
                      </tr>  
                    </tbody> 
                  </table>
            <input type="submit" value="Guardar"  > 
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