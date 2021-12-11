<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestionar Preguntas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/gestionarPreguntas.css">
</head>

<body> 
 
<?php  
    require_once "../conexionesColaborador/variableSession.php";  
    require_once "../srcColaborador/header.php";    
    require_once "../logica/Colaborador.class.php";      
    require_once "../logica/Test.class.php"; 
    $n = $_SESSION["dni"];  
 
       try{ 
         
          $objTest = new Test();
          $lista_preguntas = $objTest->obtener_lista_preguntas();
        
        }  catch(Exception $e){
            echo $e->getMessage();        
        }finally{
        $base=null;
        }       
      ?> 
    ?> 
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div>

            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;"> <img alt="Img_psicologo" src="https://cdn-icons-png.flaticon.com/512/2643/2643756.png" title="Img_psicologo"><br> </h3> 
                  </center> 
               </div>
            </div>

            <div class="cuadro_flex"> 
              <center>
            <div class="contenedor_tabla" style= "align-items: center;text-align: center;" > 
                    <div class="contenedor_titulo" >
                    <center style="background-color: #eefbfd;">
                    <h3 style="text-align: center;vertical-align: middle;">Preguntas</h3> <br>                    
                    </center>
                    <div class="contenedor_datos">
                    <div class="">  
                  <table class="table table-condensed">
                  <tbody>
                  <?php
                      for ($i=0;$i<count($lista_preguntas);$i++){
                    ?>
                      <tr> 
                      <h1><?php echo ($i+1) . '.' . $lista_preguntas[$i]['descripcion'];?></h1> <br> <br>
                             
                             
                       </tr> 
                      <?php
                      }
                    ?>
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