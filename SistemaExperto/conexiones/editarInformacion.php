<?php
 $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
 mysqli_set_charset($conexion,"utf8");

$iduser =$_POST['ID_Alumnos'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];  
$dni = $_POST['dni'];
$edad = $_POST['edad'];
$grado = $_POST['grado'];
$sexo = $_POST['sexo']; 
 
$r = mysqli_query($conexion,"UPDATE alumnos SET dni=$dni, nombres='$nombre', apellidos='$apellido', edad=$edad, sexo='$sexo', grado='$grado' WHERE ID_Alumnos= $iduser ");  
if($r==true){
    echo '<script type="text/javascript">'
    ,'function mostrar(){
     alert("Se actualizo correctamente");
     }'
     ,'function registro() {
         window.location="../src/principal.php";
         }'
    , 'mostrar();','registro();'
    , '</script>'; 
 }else{
    echo '<script type="text/javascript">'
    ,'function mostrar(){
     alert("se cometio un error al actualizar datos");
     }'
     ,'function registro() {
         window.location="../src/principal.php";
         }'
    , 'mostrar();','registro();'
    , '</script>'; 
 }

?>