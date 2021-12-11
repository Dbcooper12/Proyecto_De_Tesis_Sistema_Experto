
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
try{   
  require_once "../logica/Colaborador.class.php";
  $nombre = $_POST['nombre'];
  $apellido_materno = $_POST['apellido_materno'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $password = $_POST['password'];
  $pass_cifrado= password_hash($password,PASSWORD_DEFAULT);
  $dni = $_POST['dni'];
  $celular = $_POST['celular']; 
  $correo = $_POST['correo'];   
  $estado= $_POST['estado']; 
  $cargo= $_POST['cargo']; 

  $objColaborador= new Colaborador();
  $resultado = $objColaborador->registarColaborador($nombre,$apellido_materno,$apellido_paterno,$celular,$dni,$correo,$pass_cifrado,$estado,$cargo);
    
  if($resultado){
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
     ,'<script type="text/javascript">'
    ,'function mostrar(){ 
      Swal.fire({
        type: "success",
        title: "Colaborador regitrado",
        text: "¡Exitosamente!",    
        showConfirmButton: true,
      }).then(function(result){
        if(result.value){
          window.location="../srcColaborador/listaPsicologo.php";
        } 
      });     
      }' 
    , 'mostrar();'  
    , '</script>'; 
  }else{
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
    ,'<script type="text/javascript">'
   ,'function mostrar(){ 
     Swal.fire({
       type: "success",
       title: "Colaborador no se pudo regitrar",
       text: "¡Error!",    
       showConfirmButton: true,
     }).then(function(result){
       if(result.value){
         window.location="../srcColaborador/listaPsicologo.php";
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