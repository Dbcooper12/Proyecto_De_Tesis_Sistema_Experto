<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Contactanos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/contactanos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tourney:ital,wght@1,700&display=swap" rel="stylesheet">
</head>

<body> 
<?php 
        require_once "header.php";
        require_once "../conexiones/variableSession.php";  
        ?>
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;">Contacto</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <center>
                    <h3 style="text-align:center;"> Contactanos</h3> <br>
                    <hr>
                    </center>
                    <div class="cuadro_texto">
                    <div class="texto_contact" style =" display:flex; text-align: center; flex-direction: column;">   
                <div class="Cuadro_imagen" > 
                    
                    <img src="../img/colegioinicio.jpg" alt="cantactanos fotos"  class="imagentex">
                    
                </div>
                 <br> <br> 
                 <div class="texto_contact" style ="    ">  
                <center>
                <div class="contactanosdiv">  
                    <h3>CONTACTANOS &nbsp;</h3> <hr>  
                     <img src="https://st2.depositphotos.com/1144386/7770/v/600/depositphotos_77705004-stock-illustration-original-square-with-round-corners.jpg" alt=""  class="imagm" style="width: 30px;height:30px;" >
                     <span style="font-size:17px">Facebook.com/iepsantalucialambayeque</span>
                      <span></span> <hr>
                      <img src="data:image/png;base64,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" alt=""  class="imagm" style="width: 30px;height:30px;" >
                     <span style="font-size:17px"> santalucialambayeque@gmail.com</span>
                      <span></span> <hr> 
                      <img src="https://images.vexels.com/media/users/3/205069/isolated/preview/f207045d96c258fed664305f0ac2c5bd-icono-de-auricular-de-telefono-azul.png" alt=""  class="imagm" style="width: 30px;height:30px;" >
                      <span style="font-size:17px">LLAMOS AL NÚMERO&nbsp; - 955 378 633</span> <br>
                      <span></span> <hr> 
                </div>
                </center>
                <div style="diplay:flex;">
                <h3 id="tit3" style=" display: flex;  justify-content: center; ">Nos Ubicamos en</h3>
        <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Las%20Palmeras,%20Lambayeque%2014013,%20Per%C3%BA+(Santa%20Lucia)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" class="mapa" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div> </div>
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