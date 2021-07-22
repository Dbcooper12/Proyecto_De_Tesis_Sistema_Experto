
<?php 
 $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
 mysqli_set_charset($conexion,"utf8");

if(empty($_GET['id'])|| $_GET['id']==1){
    header("location:listaAlumnos.php");
}
$iduser=$_GET['id'];
$sql= mysqli_query($conexion,"select * from alumnos where ID_Alumnos=$iduser");

$resultado_sql = mysqli_num_rows($sql);
if($resultado_sql==0){
    header("location:listaAlumnos.php");
}else{
    while($data = mysqli_fetch_array($sql)){
        $ID_Alumnos=$data['ID_Alumnos'];
        $respuesta =mysqli_query($conexion,"DELETE FROM alumnos WHERE ID_Alumnos= $ID_Alumnos");  
 
        
        header("location:../src/listaAlumnos.php");

    }
} 

?>
 
