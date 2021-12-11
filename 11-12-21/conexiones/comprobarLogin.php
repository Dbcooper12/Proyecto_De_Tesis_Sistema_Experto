 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">	 
    <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">   
    <link rel="stylesheet" href="../plugins/animate.css/animate.css"> 
</head>
<body> 
    <?php
     require_once "../logica/Session.class.php";
    try{ 
        $dni = htmlentities(addslashes($_POST['dni']));
        $pass = htmlentities(addslashes($_POST['password']));

        $contador=0;  

        $objSession = new Session();
        $resultado = $objSession->obtenerDatosSessionAlumno($dni);
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($pass,$registro['contraseña_alum'])){
                $contador++;
            }
        } 

        if($contador>=1){
            session_start();
            $_SESSION["dni"]=$_POST["dni"]; 
           header("location:../src/principal.php");
        }else{ 
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
                ,'<script type="text/javascript">'
                ,'function mostrar(){
                    Swal.fire({ 
                        type: "error",
                        title: "Usuario no registrado",
                        text: "¡Inicie sesion nuevamente!",        
                        showConfirmButton: true,
                    }).then(function(result){
                      if(result.value){
                        window.location="../index.php";
                      } 
                    });
                 }' 
                , 'mostrar();' 
                , '</script>';  
              
        } 

    }catch(Exception $e){
        die("Error:".$e->getMessage());
    } 
    ?>  
    <script src="../js/jquery-3.3.1.min.js"></script>	 	
    <script src="../popper/popper.min.js"></script>	 	 	
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
	  
    <!--    Plugin sweet Alert 2  -->
	<script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
      
    <script src="../js/codigo.js"></script> 	 
</body>
</html>