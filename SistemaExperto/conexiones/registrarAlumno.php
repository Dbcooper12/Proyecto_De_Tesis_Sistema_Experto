 

    <?php
 $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
 mysqli_set_charset($conexion,"utf8");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$password = $_POST['password'];
$pass_cifrado= md5($password);
$dni = $_POST['dni'];
$edad = $_POST['edad'];
$grado = $_POST['grado'];
$sexo = $_POST['sexo'];
$estado = $_POST['estado'];
 
 
 $r =mysqli_query($conexion,"INSERT INTO alumnos( dni, nombres, apellidos, edad, sexo, grado, estado, password) VALUES ($dni,'$nombre','$apellido',$edad,'$sexo','$grado','$estado','$pass_cifrado')");  
 
 if($r==true){
   echo '<script type="text/javascript">'
   ,'function mostrar(){
    alert("Se registro correctamente");
    }'
    ,'function registro() {
        window.location="../src/listaAlumnos.php";
        }'
   , 'mostrar();','registro();'
   , '</script>'; 
}
 
?>
 