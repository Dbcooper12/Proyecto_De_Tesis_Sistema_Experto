
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
          
       require_once "../logica/Apoderado.class.php";   
          try{ 
                  $iduser=$_POST['cod_apoderado'];
                  $nombre_apo=$_POST['nombre_apo'];
                  $apellido_pater_apo=$_POST['apellido_pater_apo'];
                  $apellido_mater_apo=$_POST['apellido_mater_apo']; 
                  $celular_apo=$_POST['celular_apo'];
                  $direccion_apo=$_POST['direccion_apo'];
                  $dni_apo=$_POST['dni_apo'];
                  $correo_apo=$_POST['correo_apo']; 
              
                  $objAlumno = new Apoderado();
                  $resultado = $objAlumno->editarApoderado($nombre,$apellido_materno,$apellido_paterno,$celular,$direccion,$dni,$correo,$iduser);
                  
              if($resultado){
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
                  ,'<script type="text/javascript">'
                  ,'function mostrar(){ 
                  Swal.fire({
                    type: "success",
                    title: "Apoderado editado",
                    text: "¡Exitosamente!",    
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
                  title: "Apoderado no se pudo editar",
                  text: "¡Vuelva a intentarlo!",    
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