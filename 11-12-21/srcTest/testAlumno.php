<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mi información</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/testAlumno.css">
</head>

<body> 
 
<?php 
    require_once "../src/header.php"; 
    require_once "../conexiones/variableSession.php";    
    require_once "../logica/Test.class.php";  
    require_once "../logica/Alumno.class.php";      
    $n = $_SESSION["dni"];   
    try{ 
          $cod_test=$_POST['cod_test'];
          $cod_alumno=$_POST['cod_alumno'];
          $fecha=date("Y-j-n");
             
            $objTest = new Test();
         $lista_preguntas = $objTest->obtener_lista_preguntas();
           $objAlumno = new Alumno();
            $resultado = $objAlumno->obtenerDatosAlumno($n);
            foreach( $resultado as  $data){
                $nombre=$data['nombre_alum'];
                $apellidoM=$data['apellido_mater_alum'];
                $apellidoP=$data['apellido_paterno_alum'];
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
            }
        }catch(Exception $e){
            echo $e->getMessage(); 
       
        }finally{
        $base=null;
        }       
    ?> 
				<a href="../src/contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div> 

            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla"> 
                    <div class="contenedor_titulo" >
                  
                    <center style="background-color: #eefbfd;">
                    <img src="../img/banercolegio.jpg" alt="BannerColegio" class="bannerColegio"  >  <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div >  
                        <hr>
                    <h3>ESCALA PARA LA EVALUACIÓN DE LA ANSIEDAD DE HAMILTON</h3> <br> <br>               
                    <p class="letrasDerecha">*Hamilton, Escala de evaluación de Ansiedad Cognitiva-Somática.</p><br>
                    <p class="letrasDerecha" >*Adaptada por: Cabrejos Yovera Juan. </p><br> <br><br>
                    <div class="nombres" >
                    <p >Apellido y Nombre:<?php echo $apellidoP ." ". $apellidoM." ". $nombre?>  </p>
                    <p>Sexo:<?php echo $sexo ?>  </p>
                    <p>Grado:<?php echo $grado ?>  </p> 
                    <p>Fecha:<?php echo $fecha ?></p> <br><br> 
                    </div>
                   </div>
                    </div>
                    </div> 
                    <form action ="../conexionesTest/registrarPregunta.php" method="post">                    
                   
                    

                    <?php
                      for ($i=0;$i<count($lista_preguntas);$i++){
                    ?>

                    <div class="contenedor_tabla" style= "align-items: center;text-align: center;">                          
                          <div class="contenedor_titulo">
                            <div class="padding_interno"> 
                          <h1><?php echo ($i+1) . '.' . $lista_preguntas[$i]['descripcion'];?></h1> <br><br>
                            <div style="display:flex;flex-direction: column;"> 
                            <input type="hidden" name="cod_pregunta_alumno<?php echo ($i+1)?>" value="<?php echo $lista_preguntas[$i]['cod_pregunta_alumno']?>">
                            <div class="radiosP"><input  id="rd1" type="radio" name="t<?php echo ($i+1)?>" value="a" required><span>(A)Nunca</span> </input> <br></div>
                            <div class="radiosP"> <input id="rd1" type="radio" name="t<?php echo ($i+1)?>" value="b" required><span>(B)Algunas veces</span> </input> <br></div>
                            <div class="radiosP"><input id="rd2" type="radio" name="t<?php echo ($i+1)?>" value="c" required><span>(C)Regular / Varias veces</span> </input> <br></div>
                            <div class="radiosP"><input id="rd3" type="radio" name="t<?php echo ($i+1)?>" value="d" required><span>(D)Casi siempre</span> </input> <br></div>
                            <div class="radiosP"><input id="rd4" type="radio" name="t<?php echo ($i+1)?>" value="e" required><span>(E)Siempre</span> </input> <br></div>
                            </div>
                          </div>                                 
                          </div>
                    </div>

                    <?php
                      }
                    ?>

                    <input type="hidden" name="test_cod_test" value="<?php echo $cod_test;?>">
                    <input type="hidden" name="alumno_cod_alumno" value="<?php echo $cod_alumno;?>">


                    <center>
                    <input type="submit" value="Finalizar"  > </center>
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