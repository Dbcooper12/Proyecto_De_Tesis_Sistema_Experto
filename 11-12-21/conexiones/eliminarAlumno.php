
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
        if(empty($_GET['id'])|| $_GET['id']==1){
            header("location:listaAlumnos.php");
        } 
        $id=$_GET['id'];
        $objAlumno = new Alumno();
        $resultado = $objAlumno->eliminarAlumno($id);

        if($resultado){
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
          ,'<script type="text/javascript">'
         ,'function mostrar(){ 
             
           Swal.fire({
             type: "error", 
             title: "Alumno eliminado ",
             text: "",    
             buttons: ["cancelar", true],
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
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
          ,'<script type="text/javascript">'
         ,'function mostrar(){ 
             
           Swal.fire({
             type: "error", 
             title: "Error al eliminar!",
             text: "",    
             buttons: ["cancelar", true],
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

        
?> 
<script src="../js/jquery-3.3.1.min.js"></script>	 	
    <script src="../popper/popper.min.js"></script>	 	 	
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
	  
    <!--    Plugin sweet Alert 2  -->
	<script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
      
    <script src="../js/codigo.js"></script> 	 
</body>
</html>
 
