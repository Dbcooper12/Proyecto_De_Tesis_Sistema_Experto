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
    require_once "../logica/Alumno.class.php";      
      
    try{ 
            $n = $_SESSION["dni"];  
            $iduser=$_GET['id']; 
            $objTest = new Test();
            $lista_preguntas = $objTest->obtenerTestAlumno($iduser);
             
            
            
            
        }catch(Exception $e){
            echo $e->getMessage();        
        }finally{
        $base=null;
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
                     <img src="../img/banercolegio.jpg" alt="BannerColegio" class="bannerColegio"><br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div >  
                        <hr>
                    <h3>ESCALA PARA LA EVALUACIÓN DE LA ANSIEDAD DE HAMILTON</h3> <br> <br>               
                    <p class="letrasDerecha">*Hamilton, Escala de evaluación de Ansiedad Cognitiva-Somática.</p><br>
                    <p class="letrasDerecha">*Adaptada por: Cabrejos Yovera Juan. </p><br> <br><br>
                    
                   </div>
                    </div>
                    </div> 
                     <?php
                      for ($i=0;$i<count($lista_preguntas);$i++){
                    ?>

                    <div class="contenedor_tabla" style= "align-items: center;text-align: center;">                          
                          <div class="contenedor_titulo">
                            <div class="padding_interno"> 
                          <h1><?php echo ($i+1) . '.' . $lista_preguntas[$i]['descripcion'];?></h1> <br> <br>
                            <div style="display:flex;flex-direction: column;"> 
                            <input type="hidden" name="cod_pregunta_alumno<?php echo ($i+1)?>" value="<?php echo $lista_preguntas[$i]['pregunta_alumno_cod_preguntas_alumno']?>">
                            <?php 
                              if($lista_preguntas[$i]['escala_hamilton_cod_escala']=='a'){
                                ?>
                               <div class="radiosP">  <span>(A)Nunca</span>  <br></div>
                                <?php
                              }
                              if($lista_preguntas[$i]['escala_hamilton_cod_escala']=='b'){
                                ?>
                               <div class="radiosP">   <span>(B)Algunas veces</span>  <br></div>
                                <?php
                              }
                              if($lista_preguntas[$i]['escala_hamilton_cod_escala']=='c'){
                            ?>
                              <div class="radiosP">  <span>(C)Regular / Varias veces </span>  <br></div>
                              <?php
                              }  
                              if($lista_preguntas[$i]['escala_hamilton_cod_escala']=='d'){
                              ?>
                               <div class="radiosP">  <span>(D)Casi siempre</span>  <br></div>
                             <?php
                              }   
                              if($lista_preguntas[$i]['escala_hamilton_cod_escala']=='e'){
                               ?>
                               <div class="radiosP"> <span>(E)Siempre</span> <br></div>
                            <?php
                              } ?>
                            </div>
                          </div>                                 
                          </div>
                    </div>

                    <?php
                      }
                    ?>

                    <input type="hidden" name="test_cod_test" value="<?php echo $cod_test;?>">
                    <input type="hidden" name="alumno_cod_alumno" value="<?php echo $cod_alumno;?>">
 
                    
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