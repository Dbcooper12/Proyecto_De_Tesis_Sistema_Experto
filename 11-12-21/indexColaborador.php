<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Iniciar Session</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href = "css/index.css"> 
</head>
<script type="text/javascript">

    function irAlumno(){
        window.location="index.php";
    }
    function irPsicologo(){
        window.location="indexColaborador.php";
    }

</script>
<body> 
            <form action ="conexionesColaborador/comprobarLoginColaborador.php" method="post">
            <h1 style="text-align:center; color: #00bcd6;">  I.E.P. Santa Lucía</h1>
                <center>
                <img src="img/logo.jpg" alt="logosantalucia" style="text-align: center;width: 100px;">
                </center>
                <div style="display:flex;"> 
                <center>
             <button type="button" onclick="irAlumno()"><img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="imgagen_alumno"style="width: 20px;height: 20px;" ><span class="tab-text">Alumno</span></button> 
             <button type="button"  onclick="irPsicologo()"><img src="https://cdn-icons-png.flaticon.com/128/3143/3143113.png" alt="imagen_psicologo"style="width: 20px;height: 20px;"><span class="tab-text">Colaborador</span></button> 
             </center>
            </div>
                    <h2>Inicio de sesión colaborador</h2>    
                    <input minlength="8" maxlength="8" type="text" placeholder="&#128113; Dni" name="dni" pattern="[0-9]+" required> 
                    <input type="password" placeholder="&#128273; Contraseña" name="password" required > 
                    <input type="submit" value="Ingresar"  >
             
</body>
</html>