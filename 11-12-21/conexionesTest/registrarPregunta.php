
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


 //echo "<pre>";
 //print_r($_POST);
 $resultado = $_POST;
 //echo 
 count($resultado);
 for ($i=0;$i<14;$i++){
   //echo 
   $resultado['cod_pregunta_alumno'.($i+1)].'<br>';
 }



 echo '</pre>';
 //exit;
  require_once "../logica/Test.class.php";   
    try{ 
        $test_cod_test = $_POST['test_cod_test'];
        $alumno_cod_alumno=$_POST['alumno_cod_alumno'];

        $objTest = new Test();
        $resultado = $objTest->registarRespuestaTest($test_cod_test, $alumno_cod_alumno, $resultado);

    if($resultado){
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
      ,'<script type="text/javascript">'
     ,'function mostrar(){ 
       Swal.fire({
         type: "success",
         title: "Test regitrado",
         text: "¡Exitosamente!",    
         showConfirmButton: true,
       }).then(function(result){
         if(result.value){
           window.location="../srcTest/listaTest.php";
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
         title: "Test no se pudo regitrar",
         text: "¡Error!",    
         showConfirmButton: true,
       }).then(function(result){
         if(result.value){
           window.location="../srcTest/listaTest.php";
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