<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Test Colaborador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/testAlumno.css">
</head>

<body> 
 
<?php 
    require_once "../srcColaborador/header.php"; 
    require_once "../conexionesColaborador/variableSession.php";    
    require_once "../logica/Test.class.php";  
    require_once "../logica/Colaborador.class.php";      
      
    try{ 
            $n = $_SESSION["dni"];  
            $codAlumno=$_REQUEST['codAlumno'];  
            $objColaborador= new Colaborador();
            $result = $objColaborador->obtenerDatosColaborador($n);
              foreach( $result as  $data){
                $cod_colaborador=$data['cod_colaborador'];                
            }  

            $iduser=$_GET['id'];  
            $objTest = new Test(); 
            $lista_preguntas_colaborador = $objTest->obtener_lista_preguntas_colaborador();   
            
            
            
        }catch(Exception $e){
            echo $e->getMessage();        
        }      
    ?> 
			<a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de Test</a>
			     </nav>
		        </div> 

            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                  
                    <center style="background-color: #eefbfd;">
                     <img src="../img/banercolegio.jpg" alt="BannerColegio" class="bannerColegio"  ></h3> <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div class="">  
                        <hr>
                    <h3>ESCALA PARA LA EVALUACIÓN DE LA ANSIEDAD DE HAMILTON</h3> <br> <br>               
                    <p class="letrasDerecha">*Hamilton, Escala de evaluación de Ansiedad Cognitiva-Somática.</p><br>
                    <p class="letrasDerecha">*Adaptada por: Cabrejos Yovera Juan. </p><br> <br><br>
                    
                   </div>
                    </div>
                    </div>  
                    <form action ="../conexionesTest/registrarPreguntaColaborador.php" method="post">                    
                   
                    <?php
                      for ($i=0;$i<count($lista_preguntas_colaborador);$i++){
                    ?>

                    <div class="contenedor_tabla" style= "align-items: center;text-align: center;">                          
                          <div class="contenedor_titulo">
                            <div class="padding_interno"> 
                          <h1><?php echo ($i+1) . '.' . $lista_preguntas_colaborador[$i]['descripcion'];?></h1> <br> <br>
                            <div style="display:flex;flex-direction: column;"> 
                            <input type="hidden" name="cod_pregunta_psicologo<?php echo ($i+1)?>" value="<?php echo $lista_preguntas_colaborador[$i]['cod_pregunta_psicologo']?>">
                            <div class="radiosP"><input  id="rd2" type="radio" name="C<?php echo ($i+1)?>" value="1" required> <span>Si</span> </input> <br></div>
                            <div class="radiosP"> <input id="rd2" type="radio" name="C<?php echo ($i+1)?>" value="2" required> <span>No</span> </input> <br></div>
                             </div>
                          </div>                                 
                          </div>
                    </div>

                    <?php
                      }
                    ?>
                    <input type="hidden" name="test_cod_test" value="<?php echo $iduser;?>">
                    <input type="hidden" name="cod_colaborador" value="<?php echo $cod_colaborador;?>">
                    <input type="hidden" name="cod_alumno" value="<?php echo $codAlumno;?>">
                    <center>
                    <input type="submit" value="Finalizar"  > </center>
            </form>
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