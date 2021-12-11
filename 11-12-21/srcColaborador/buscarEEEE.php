<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Buscar alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href = "../css/listaAlumnos.css">
</head>

<body>  
<?php 
        require_once "../srcColaborador/header.php";
        ?>
				<a href="listaAlumnos.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de alumnos</a>
			</nav>
		</div>
        <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h3 > <img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 50px;height:50px;"> Lista de alumnos</h3>   
                      <a href="gestionarAlumnos.php" class="btn_new">Crear Alumno <img src="https://image.flaticon.com/icons/png/512/1632/1632686.png" alt="información" style="width: 20px;height: 20px;"></a>  
                <?php 
                $busqueda = $_REQUEST['busqueda'];
                if(empty($busqueda)){
                    header("location:listaAlumnos.php");
                }                 
                ?>
             <form action="buscarAlumno.php" method="get" class="form_search"   >             
                <input type="text" name="busqueda" placeholder="Buscar por apellido"value="<?php echo $busqueda;?>" >
                <input type="submit" value="Buscar" class="btn_search"  >             
             </form>             
             </div>
             <br> 
             <table>
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Dni</th>
                     <th>Edad</th>
                     <th>Grado</th>
                     <th>Sexo</th>
                     <th>Estado</th>
                     <th>Acciones</th>
                 </tr>
                 </thead>
                 <?php
                  require_once "../conexiones/variableSession.php"; 
                  require_once "../conexiones/abrirConexion.php"; 
                 $sql_registro = "SELECT COUNT(*) as total FROM alumnos WHERE (nombres LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%'  OR edad LIKE '%$busqueda%'  OR sexo LIKE '%$busqueda%'  OR grado LIKE '%$busqueda%'  OR estado LIKE '%$busqueda%')";
                 $resultado_registro =$base->prepare($sql_registro);
                 $resultado_registro->execute();                 
                 $result_register= $resultado_registro->fetchColumn();
                 $por_pag = 5;
                 if(empty($_GET['pagina'])){
                     $pagina=1;
                 }else{
                     $pagina = $_GET['pagina'];
                 }

                 $desde =($pagina-1)*$por_pag;
                 $total_paginas= ceil($result_register/$por_pag);

                 $sql="SELECT ID_Alumnos,nombres,apellidos,dni,edad,grado,sexo,estado FROM alumnos WHERE (nombres LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%'  OR edad LIKE '%$busqueda%'  OR sexo LIKE '%$busqueda%'  OR grado LIKE '%$busqueda%'  OR estado LIKE '%$busqueda%') LIMIT $desde,$por_pag";
    
                     $resultado = mysqli_query($conexion,$sql);
                     $result = mysqli_num_rows($resultado);
                 if($result>0){
                    while($data= mysqli_fetch_array($resultado)){
                        ?>
                         <tr>
                        <td data-titulo="ID:"><?php echo $data['ID_Alumnos'] ?></td>
                        <td data-titulo="Nombre:"><?php echo $data['nombres'] ?></td>
                        <td data-titulo="Apellidos:"><?php echo $data['apellidos'] ?></td>
                        <td data-titulo="Dni:"><?php echo $data['dni'] ?></td>
                        <td data-titulo="Edad:"><?php echo $data['edad'] ?></td>
                        <td data-titulo="Grado:"><?php echo $data['grado'] ?></td>
                        <td data-titulo="Sexo:"><?php echo $data['sexo'] ?></td>
                        <td data-titulo="Estado:"><?php echo $data['estado'] ?></td>
                        <td>
                        <a class ="link_edit" onclick="confirmarDelete1()" href="editarAlumnos.php?id=<?php  echo $data['ID_Alumnos'] ?>"><img src="https://image.flaticon.com/icons/png/512/2919/2919592.png" alt="información" style="width: 20px;height: 20px;"> Editar</a>|
                      <?php if($data['ID_Alumnos']!=1){ ?>
                        <a class ="link_delete" onclick="return mostrar()" href="../conexiones/eliminarAlumno.php?id=<?php  echo $data["ID_Alumnos"] ?>" >Eliminar<img src="https://t4.ftcdn.net/jpg/01/71/83/85/240_F_171838554_uJDqVi55tYVMkhEOKthFCFsrp8364AAo.jpg" alt="información" style="width: 35px;height: 35px;"></a>
                      <?php } ?>    
                    </td>
                    </tr>
                  <?php  } 
                 } 
                   ?>  
             </table>
           <?php 
            if($total_paginas!=0){
           ?>
             <div class="paginador" >
                 <ul style="padding: 15px;list-style: none;background: #FFF;margin-top: 15px;display: flex; justify-content:flex-end;border-radius:4px; overflow: auto;">
                 <?php  
                 if($pagina!=1){

                
                 ?>   
                 <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda ?>" style=" color: #428bca; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">|<<</a> </li>
                     <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda ?>"style=" color: #428bca; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;"><<<</a> </li>
                   <?php }
                   ?>
                   
                   <?php
                     for($i=1; $i <=$total_paginas; $i++){
                         if($i==$pagina){
                            echo '<li " style=" color: #FFF; border: 1px solid #428bca;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;background:#428bca;"> '.$i.'</li> ';
                             
                         }else{
                            echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.' " style=" color: #428bca; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">'.$i.'</a> </li> ';
                      }
                      
                     }
                     if($pagina !=$total_paginas){                     
                      ?> 
                     <li><a href="?pagina=<?php echo $pagina+1; ?>&busqueda=<?php echo $busqueda ?> "style=" color: #428bca; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>></a> </li>
                     <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda ?>"style=" color: #428bca; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>|</a> </li>
                        <?php }?>
                    </ul>
             </div> 
             <?php
            }
             ?>
             </div>
             <?php 
                require_once "footer.php";
                ?>
	</header>
    <div class="capa"></div>
            <!------- Navegador--------->
        <?php
            require_once "navegador.php";
        ?>

            <script src="../js/alertas.js"></script> 
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
</body>
</html>