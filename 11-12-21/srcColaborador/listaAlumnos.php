
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/listaAlumnos.css">
    
</head>

<body>
<script type="text/javascript">
        function mostrar(){ 
            var rp = confirm("desea eliminar a este alumno?");
             if(rp==true){
               return true;
             }
             return false; 
        }  
 </script>
 <header>
  
  
    </header> 
        <?php 
        require_once "../conexionesColaborador/variableSession.php"; 
        require_once "../srcColaborador/header.php"; 
        require_once "../logica/Alumno.class.php";    
        ?>
				 </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h3><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 50px;height: 50px;"> Lista de alumnos</h3>
                    <a href="gestionarApoderado.php" class="btn_new">Crear Apoderado <img src="https://image.flaticon.com/icons/png/512/1632/1632686.png" alt="CrearApoderado" style="width: 20px;height: 20px;"></a>
                      <a href="gestionarAlumnos.php" class="btn_new">Crear Alumno <img src="https://image.flaticon.com/icons/png/512/1632/1632686.png" alt="CrearAlumno" style="width: 20px;height: 20px;"></a>
                     <form action="buscarAlumno.php" method="get" class="form_search">             
                      <input type="text" name="busqueda" placeholder="Buscar alumno">
                     <input type="submit" value="Buscar" class="btn_search" >  
             
                     </form>
                    </div>
                   <br>  
                    <table id="myTable" class="table table-striped" style="width:100%"  >
                        <thead>
                        <tr> 
                            <th>Apellido y nombres</th>    
                            <th>Grado</th>  
                            <th>Tefono</th>
                            <th>Email</th>
                            <th>Apoderado</th> 
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <?php 

                 $objAlumno = new Alumno();
                 $result_register = $objAlumno->contadorAlumnos();
                 
                 $por_pag = 5;
                 if(empty($_GET['pagina'])){
                     $pagina=1;
                 }else{
                     $pagina = $_GET['pagina'];
                 }

                 $desde =($pagina-1)*$por_pag;
                 $total_paginas= ceil($result_register/$por_pag);               
                 $result = $objAlumno->listarAlumnosPorLimite($desde,$por_pag);
                 if(isset($result)&& !empty($result) && sizeof($result)>0){
                    foreach( $result as $data){
                        ?>
                        <tr> 
                        <td data-titulo="Nombre:"><?php echo $data['apellido_paterno_alum'] ." ". $data['apellido_mater_alum'] ." ". $data['nombre_alum'] ?></td> 
                        <td data-titulo="Grado:"><?php echo $data['grado_cod_grado'] ?></td>
                         
                        <td data-titulo="Telefono:"><?php echo $data['celular_alum'] ?></td>
                        <td data-titulo="Email:"><?php echo $data['correo_alum'] ?></td>

                        <td data-titulo="Apoderado"> <a href="apoderadoAlumno.php?id=<?php echo $data['apoderado_cod_apoderado'] ?>"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;"> ver apoderado</a> </td>
                      
                          <td>
                        <a class ="link_edit" onclick="confirmarDelete1()" href="editarAlumnos.php?id=<?php  echo $data['cod_alumno'] ?>"><img src="https://image.flaticon.com/icons/png/512/2919/2919592.png" alt="información" style="width: 20px;height: 20px;">Editar</a>| 
                    
                         <a class ="link_delete"  onclick="return mostrar()" href="../conexiones/eliminarAlumno.php?id=<?php  echo $data["cod_alumno"] ?>" ><img src="https://t4.ftcdn.net/jpg/01/71/83/85/240_F_171838554_uJDqVi55tYVMkhEOKthFCFsrp8364AAo.jpg" alt="información" style="width: 35px;height: 35px;">Eliminar</a>
                          
                    </td>
                    </tr>
                  <?php  } 
                 } 
                   ?>  
             </table>
            
             <div class="paginador" >
                 <ul style="padding: 15px;list-style: none;background: #FFF;margin-top: 15px;display: flex; justify-content:flex-end; border-radius:4px;  overflow: auto;">
                 <?php  
                 if($pagina!=1){ 
                 ?>   
                 <li><a href="?pagina=<?php echo 1; ?>" style=" color: #FFF; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">|<<</a> </li>
                     <li><a href="?pagina=<?php echo $pagina-1; ?>"style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;"><<<</a> </li>
                   <?php }
                   ?> 
                   <?php
                     for($i=1; $i <=$total_paginas; $i++){
                         if($i==$pagina){
                            echo '<li " style=" color: #FFF; border: 1px solid #0ca4ce;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;background:#0ca4ce;"> '.$i.'</li> ';
                             
                         }else{
                            echo '<li><a href="?pagina='.$i.'" style=" color: #FFF; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">'.$i.'</a> </li> ';
                      }
                      
                     }
                     if($pagina !=$total_paginas){

                     
                      ?> 
                     <li><a href="?pagina=<?php echo $pagina+1; ?>"style=" color: #FFF; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>></a> </li>
                     <li><a href="?pagina=<?php echo $total_paginas; ?>"style=" color: #FFF; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>|</a> </li>
                        <?php }?>
                    </ul>
             </div>

             </div>
             <?php 
                require_once "../src/footer.php";
                ?>
	</header>
    <div class="capa"></div>
        <!------- Navegador--------->
    <?php
        require_once "../srcColaborador/navegadorColaborador.php";
        ?>
            <script src="../js/jquery-3.3.1.min.js"></script>	 	
    <script src="../popper/popper.min.js"></script>	 	 	
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
	  
    <!--    Plugin sweet Alert 2  -->
	<script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
      
    <script src="../js/codigo.js"></script> 	 
            <script src="../js/jquery-3.3.1.min.js"></script>      
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
             
</body>
</html>