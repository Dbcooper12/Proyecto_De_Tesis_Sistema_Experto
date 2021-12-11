<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mi información</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/miInformacion.css">
</head>

<body> 
 
<?php 
    require_once "header.php"; 
    require_once "../conexiones/variableSession.php";    
    require_once "../logica/Alumno.class.php";    
    require_once "../logica/Apoderado.class.php"; 
    $n = $_SESSION["dni"];   
    $objAlumno = new Alumno();
    $resultado = $objAlumno->obtenerDatosAlumno($n);
          
      foreach( $resultado as  $data){
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
          $grado='Quinto';
        } 
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
    }  

 //apoderado 
        $objApoderado = new Apoderado();
        $resultt = $objApoderado->obtenerDatosAapoderado($apoderado);
        foreach( $resultt as  $data_a){
        $nombre_apo=$data_a['nombre_apo'];
        $apellito_pater_apo=$data_a['apellido_pater_apo'];
        $apellito_mater_apo=$data_a['apellido_mater_apo']; 
        $celular_apo=$data_a['celular_apo'];
        $direccion_apo=$data_a['direccion_apo'];
        $dni_apo=$data_a['dni_apo'];
        $correo_apo=$data_a['correo_apo'];
      }
      
    ?> 
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;"> <img alt="Logotipo de GNU (GNU is Not Unix)" src="https://cdn-icons-png.flaticon.com/512/948/948256.png" title="Logotipo de GNU (GNU is Not Unix)"><br> <?php echo $apellidoP ." ". $apellidoM." ". $nombre ?></h3> <br>                    
                    
                  </center>
            <div class="contenedor_datos"> 
               </div>
            </div>
    </div>
</div>
            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd; padding: 3rem;">
                    <h3 style="text-align: center;vertical-align: middle;">Datos personales del alumno</h3> <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div class="">                    
                  <table class="table table-condensed">
                    <tbody> 
                      <tr>
                      <td style="text-align: center;vertical-align: middle;">Dni:</td> 
                      <td><input  type="text" class="form-control input-sm"   value="<?php echo $dni?>" readonly="true"></td>
                      </tr>
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Apellidos y Nombres:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $apellidoP ." ". $apellidoM." ". $nombre ?>" readonly="true"></td>
                       </tr> 
                       <tr>
                        <td style="text-align: center;vertical-align: middle;">Fecha Nacimiento:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $edad ?>" readonly="true"></td>
                       </tr> 
                       <tr>
                    <td style="text-align: center;vertical-align: middle;">Direccion:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $direccion?>" readonly="true" required></td>
                      </td>
                    </tr> 
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Correo:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $email?>" readonly="true"></td>
                       </tr>
                       <tr> 
                    <td style="text-align: center;vertical-align: middle;">Teléfono móvil:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $celular?>" readonly="true" required></td>
                      </td>
                    </tr>   
                      <tr> 
                    <td style="text-align: center;vertical-align: middle;">Sexo:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $sexo?>" readonly="true" required></td>
                      </td>
                    </tr>    
                    
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Estado:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $estado?>" readonly="true" required></td>
                      </td>
                    </tr>
                    </tbody> 
                  </table>
                  
                    </div>
                    </div> 
             </div>
  </div>
      </center> 


      <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd; padding: 3rem;">
                    <h3 style="text-align: center;vertical-align: middle;">Datos academicos</h3> <br>                
                    </center>
                    <div class="contenedor_datos">
                    <div class="">                    
                  <table class="table table-condensed">
                    <tbody> 
                    <tr> 
                    <td style="text-align: center;vertical-align: middle;">Nivel:</td>
                    <td> <input  class="form-control input-sm"  value="Secundario" readonly="true" required></td>
                      </td>
                    </tr>    
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Grado:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $grado?>" readonly="true" required></td>
                      </td>
                    </tr> 
                    </tbody> 
                  </table>
                  
                    </div>
                    </div> 
             </div>
  </div>
      </center>  

        </div>  
    <div class="cuadro_flex"> 
    <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
      <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;padding: 2rem;">
                    <h3 style="text-align: center;vertical-align: middle;">Datos de Persona de Contacto</h3> <br>                    
                    </center>
            <div class="contenedor_datos">
                <div class=""> 
                <table class="table table-condensed">
                    <tbody> 
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Contacto:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $apellito_pater_apo ." ". $apellito_mater_apo." ". $nombre_apo ?>" readonly="true"></td>
                       </tr> 
                      <tr> 
                    <td style="text-align: center;vertical-align: middle;">Celular:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $celular_apo?>" readonly="true" required></td>
                      </td>
                    </tr>    
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Direccion:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $direccion_apo?>" readonly="true" required></td>
                      </td>
                    </tr> 
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Dni:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $dni_apo?>" readonly="true" required></td>
                      </td> 
                    </tr>
                    <tr>
                    <td style="text-align: center;vertical-align: middle;">Cooreo:</td>
                    <td> <input  class="form-control input-sm"  value="<?php echo $correo_apo?>" readonly="true" required></td>
                      </td> 
                    </tr>
                    </tbody> 
                  </table>
               </div>
            </div>
    </div>
</div> 
</div>  

  <?php 
    require_once "footer.php";
  ?> 
	</header> 
    <div class="capa"></div>
<!------- Navegador--------->
<?php
require_once "navegador.php";
?>  
</body>

</html>