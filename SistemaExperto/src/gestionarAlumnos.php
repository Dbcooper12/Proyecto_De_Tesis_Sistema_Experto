<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestionar Alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href = "../css/gestionarAlumnos.css">
</head>
<body>
<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰ Sistema Experto</label>
		</div>
			<div class="logo">
                <!-- logo	---------------> 
    <p>
   </p> 
		 </div>
			<nav class="menu"> 
               <span  >  <?php
               date_default_timezone_set('America/Guatemala');
                function fechaC(){
                    $mes=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    return date('d')." de ". $mes[date('n')]. " de " .date('Y');
                } 
                echo fechaC(); 
               ?>  </span>
				<a href="principal.php">Inicio</a>
				<a href="listaAlumnos.php">Lista de alumnos</a>
			</nav>
		</div>
        <form action ="../conexiones/registrarAlumno.php" method="post">
             <h2>Registro de alumnos</h2>
             <input type="text" placeholder="&#128113; Nombres" name="nombre" required> 
             <input type="text" placeholder="&#128113; Apellidos" name="apellido" required> 
             <input type="password" placeholder="&#128273; Contrase;a" name="password"required >
             <input type="text" placeholder="&#128113; DNI" name="dni" required>
             <select name="edad" id="edad" required >  
                <option value="" disabled="" selected >Seleccionar Edad</option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>
                 <option value="14">14</option>
                 <option value="15">15</option>
                 <option value="16">16</option>
                 <option value="17">17</option>
            
             </select>
             <select name="grado" id="grado" required >  
             <option value="" disabled="" selected >Seleccionar Grado</option>
                 <option value="Primero">Primero</option>
                 <option value="Segundo">Segundo</option>
                 <option value="Tercero">Tercero</option>
                 <option value="Cuarto">Cuarto</option>
                 <option value="Quinto">Quinto</option>
                 
             </select>
             <select name="sexo" id="sexo" required > 
             <option value="" disabled="" selected >Seleccionar Sexo</option>
                 <option value="Masculino">Masculino</option>
                 <option value="Femenino">Femenino</option> 
                
             </select>  
             <select name="estado" id="estado" required > 
             <option value="" disabled="" selected >Seleccionar Estado</option>
                 <option value="Matriculado">Matriculado</option>
                 <option value="Retirado">Retirado</option> 
                 
             </select>   
             
            <input type="submit" value="Guardar"  >
	</header>
    <div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav> 
            <p class="centrado">
            Mi Perfil
            </p>
        <p class="centrado">
          
     <img alt="Logotipo de GNU (GNU is Not Unix)" src="../img/perfil.png" title="Logotipo de GNU (GNU is Not Unix)">
    </p>
            
        <p class="centrado">  <?php
    session_start();
    if(!isset($_SESSION["dni"])){
        header("location:../index.php");
    }
    ?>
    <?php
       $conexion=mysqli_connect("localhost","root","admin","bdalumnos");
    
       mysqli_set_charset($conexion,"utf8");

       $n = $_SESSION["dni"]; 
       
     $sql="SELECT * FROM alumnos where dni='$n'";
    
     $resultado = mysqli_query($conexion,$sql);
     while($row = mysqli_fetch_assoc($resultado)){
        echo $row["nombres"]."  ".$row["apellidos"];

     }
     mysqli_free_result($resultado);
 
         ?>  </p> 
			<a href="miInformacion.php">Mi informacion</a>
			<a href="#">Diagnostico</a>
			<a href="#">Historial de diagnostico</a>
            <a href="gestionarAlumnos.php">Gestionar alumnos</a>
            <a href="#">Agregar Sintomas</a>
            <a href="../conexiones/cerrarsesion.php">Cerrar Sesion</a>
			 
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> 
   
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
</body>
</html>