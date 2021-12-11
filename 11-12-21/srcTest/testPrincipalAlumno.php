<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/testPrincipalAlumno.css">
</head>

<body> 
 
<?php 
    require_once "../src/header.php"; 
    require_once "../conexiones/variableSession.php";    
    require_once "../logica/Test.class.php";  
    require_once "../logica/Alumno.class.php";     
    $n = $_SESSION["dni"]; 
    
    $iduser=$_GET['id'];   
   
        $objTest = new Test();
        $result = $objTest->obtenerFechaTest($iduser);
        foreach( $result as  $data){
          $cod_test=$data['cod_test'];
          $fecha_inicio=$data['fecha_inicio'];
          $fecha_final=$data['fecha_final'];
          $descripcion=$data['descripcion'];     
        }
        $objAlumno = new Alumno();
        $resultado = $objAlumno->obtenerDatosAlumno($n);
            
        foreach( $resultado as  $datas){
            $cod_alumno=$datas['cod_alumno'];
        }
      
    ?> 
				<a href="../src/contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div> 

            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                    <form action ="../srcTest/testAlumno.php" method="post">
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;"><?php echo $descripcion?></h3> <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div class="">  
                    <div style="padding: 3em;"}> 
                    <h3 style="display: flex;justify-content: flex-start;">INSTRUCCIONES:</h3> <br>
                    <span style="display: flex;justify-content: flex-start;">
                    Lea cuidadosamente. </span><br>
                    <div style="display: flex; flex-direction: column;">
                        <span >
                        A continuación, se presentan una serie de frases que se refieren a las reacciones que la gente comúnmente manifiesta cuando se enfrenta a situaciones de la vida que se tornan conflictivas. 
                        No es necesario presentar todas para señalar que cualquiera de los indicadores está presente.</span><br>
                        <span>Preocupe identificar con una X cómo han aparecido estas reacciones en usted. 
                            La información que proporcione servirá para conocer las formas de ayudar a superar esta problemática, 
                            razón por la que le pedimos que conteste cada una de las frases de manera real y verídica. Gracias.</span>
                    </div> <br><br>
                   <div style="display: flex; align-items: flex-start; flex-direction: column;">
                    <span>(A)	Nunca</span> 
                    <span>(B)	Algunas veces</span> 
                    <span>(C)	Regular / Varias veces </span> 
                    <span>(D)	Casi siempre</span> 
                    <span>(E)	Siempre</span> 

                    </div> 
                    <br><br>
                  <table class="table table-condensed">
                  <tbody>
                      <tr> 
                       <input type="hidden" name="cod_test" value="<?php echo $cod_test?>">
                       <input type="hidden" name="cod_alumno" value="<?php echo $cod_alumno?>">
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;">Fecha Inicio:</td>
                      <td class='col-md-3' style="text-align: center;vertical-align: middle;"><?php echo $fecha_inicio?></td> 
                        <td style="text-align: center;vertical-align: middle;">Fecha Final:</td>
                        <td class='col-md-3' style="text-align: center;vertical-align: middle;"><?php echo $fecha_final?></td> 
                          </tr> 
                    </tbody> 
                  </table>
                
                    </div>
                    </div> 
                    <center>
                    <input type="submit" value="INICIAR"  > </center>
            </form>
             </div>
  </div>
      </center>
       
</div>  

  <?php 
    require_once "../src/footer.php";
  ?> 
	</header> 
    <div class="capa"></div>
<!------- Navegador--------->
<?php
require_once "../src/navegador.php";
?>  
</body>

</html>