
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
 require_once "../logica/Alumno.class.php";  
 try{ 
  $iduser=$_POST['cod_alumno'];
  $nombre = $_POST['nombre'];
  $apellido_materno = $_POST['apellido_materno'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $password = $_POST['password'];
  $pass_cifrado= password_hash($password,PASSWORD_DEFAULT);
  $dni = $_POST['dni'];
  $celular = $_POST['celular'];
  $fecha = $_POST['fecha'];
  $correo = $_POST['correo'];
  $direccion = $_POST['direccion'];
  $grado = $_POST['grado'];
  $sexo= $_POST['sexo'];
  $estado= $_POST['estado'];
  $apoderado= $_POST['apoderado']; 

  $objSession = new Alumno();
  $resultado = $objSession->editarAlumno($nombre,$apellido_materno,$apellido_paterno,$fecha,$sexo,$pass_cifrado,$dni,$celular,$correo,$direccion,$grado,$estado,$apoderado,$iduser);
  
 if($resultado){
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
            ,'<script type="text/javascript">'
            ,'function mostrar(){ 
            Swal.fire({
              type: "success",
              title: "Alumno regitrado",
              text: "¬°Exitosamente!",    
              showConfirmButton: true,
            }).then(function(result){
              if(result.value){
                window.location="../srcColaborador/listaAlumnos.php";
              } 
            });     
            }' 
            , 'mostrar();'  
            , '</script>'; 
 }else{
        echo'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
            ,'<script type="text/javascript">'
            ,'function mostrar(){ 
            Swal.fire({
            type: "success",
            title: "Alumno no regitrado",
            text: "¬°Vuelva a intentarlo!",    
            showConfirmButton: true,
            }).then(function(result){
            if(result.value){
              window.location="../srcColaborador/listaAlumnos.php";
            } 
            });     
            }' 
            , 'mostrar();'  
            , '</script>'; 
 }

}catch(Exception $e){
  echo $e->getMessage(); 

}finally{
$base=null;
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