<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/principal.css">
    <link rel="stylesheet" href = "../css/all.mim.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
</head>

<body>  
        <?php 
        require_once "../src/header.php"; 
       // require_once "../conexionesColaborador/variableSession.php";  
        ?>
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <center>
                    <img src="../img/logo.jpg" alt="logosantalucia" style="text-align: center;max-width:100%">
                    <h3 style="">I.E.P. Santa Lucía</h3> <br>
                    </center>
                    <hr>
                    <div class="contenedor_img" >
                        <img src="../img/contactanos.jpg" alt="fotocolegio" class="fotocolegio" >
                        <div class="contenedor_letra" style=" padding: 1rem;">
                        <h1>
                        Ofrecemos una sólida formación personalizada e integral, trabajamos en conjunto con la familia.
                        </h1>
                        <span>
                        Los valores son parte de la formación integral del la I.E.P Santa Lucia. Formamos jóvenes católicos, solidarios, respetuosos, analíticos y con un alto nivel académico que destacan por sus excelentes resultados en la vida personal, universitaria y profesional logrando así marcar la diferencia.
                        </span>
                        </div>
                    </div>

                </div> 
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



