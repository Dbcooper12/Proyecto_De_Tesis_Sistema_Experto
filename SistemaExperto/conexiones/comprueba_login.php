<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try{
        $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
        mysqli_set_charset($conexion,"utf8");

        $user = mysqli_real_escape_string($conexion,$_POST['dni']);
        $pass = md5(mysqli_real_escape_string($conexion,$_POST['password']));

        $query = mysqli_query($conexion,"SELECT * FROM alumnos WHERE dni= $user AND password= '$pass'");

        $resultado = mysqli_num_rows($query);
        if($resultado>0){
            session_start();
            $_SESSION["dni"]=$_POST["dni"];
           header("location:../src/principal.php");
        }else{ 
                echo '<script type="text/javascript">'
                ,'function mostrar(){
                 alert("Datos incorrectos, Intente nuevamente");
                 }'
                 ,'function registro() {
                     window.location="../index.php";
                     }'
                , 'mostrar();','registro();'
                , '</script>'; 
             
        } 

    }catch(Exception $e){
        die("Error:".$e->getMessage());
    }


    ?> 
</body>
</html>