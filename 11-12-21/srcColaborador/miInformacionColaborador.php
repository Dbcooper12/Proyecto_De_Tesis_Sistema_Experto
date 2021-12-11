<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mi información</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/miInformacionPsicologo.css">
</head>

<body> 
 
<?php  
    require_once "../conexionesColaborador/variableSession.php";  
    require_once "../srcColaborador/header.php";    
    require_once "../logica/Colaborador.class.php"; 
    $n = $_SESSION["dni"];  

    $objColaborador= new Colaborador();
    $result = $objColaborador->obtenerDatosColaborador($n);
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
        if ($data['cargocod_cargo'] ==1){
          $cargo ='Directora';
        }else{
          $cargo ='Psicologo';
        }
        $optionEstado = '<option value="'.$estado.'">'.$estado.'</option>'; 
        $telefono =$data['celular_colabo'];
        $email=$data['correo_colabo'];

        $optionCargo = '<option value="'.$cargo.'">'.$cargo.'</option>'; 
    }  
    ?> 
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div>

            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;"> <img alt="Img_psicologo" src="https://cdn-icons-png.flaticon.com/512/2643/2643756.png" title="Img_psicologo"><br> <?php echo $apellidoP ." ". $apellidoM." ". $nombre ?></h3> <br>                    
                    <h3> <?php echo $cargo?>  </h3>
                  </center> 
               </div>
            </div>

            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;">Datos personales psicologo</h3> <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div class="">  
                  <table class="table table-condensed">
                  <tbody>
                      <tr> 
                        <input type="hidden" name="cod_psicologo" value="<?php echo $ID_Alumnos?>">
                        <td class='col-md-3' style="text-align: center;vertical-align: middle;">Apellidos y Nombres:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $apellidoP ." ". $apellidoM." ". $nombre ?>" readonly="true"></td>
                      </tr> 
                      
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Dni:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $dni?>" readonly="true"></td>
                      </tr> 
                      <tr>
                         <td style="text-align: center;vertical-align: middle;">celular:</td>
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $telefono?>" readonly="true"></td> 
                      </tr>    
                      <tr>
                          <td style="text-align: center;vertical-align: middle;">Correo:</td>    
                          <td><input  type="text" class="form-control input-sm"   value="<?php echo $email?>" readonly="true"></td>    
                      </tr> 
                      <tr>  
                        <td style="text-align: center;vertical-align: middle;">Estado:</td>         
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo $estado?>" readonly="true"></td>    
                      </tr> 
                      <tr>
                        <td style="text-align: center;vertical-align: middle;">Cargo:</td>                
                        <td><input  type="text" class="form-control input-sm"   value="<?php echo  $cargo?>" readonly="true"></td>      
                      </tr> 
                    </tbody> 
                  </table>
                
                    </div>
                    </div> 
             </div>
  </div>
      </center>
       
</div>  
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