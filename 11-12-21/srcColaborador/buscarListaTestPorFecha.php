
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/listaAlumnos.css">
    
</head>

<body>
 
 <header>
  
  
    </header> 
        <?php 
        require_once "../conexionesColaborador/variableSession.php"; 
        require_once "../srcColaborador/header.php"; 
        require_once "../logica/Test.class.php";    
        ?>
				<a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de test</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h3><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 50px;height: 50px;"> Lista de Test</h3>
                    <a href="gestionarTest.php" class="btn_new">Crear test <img src="https://image.flaticon.com/icons/png/512/1632/1632686.png" alt="CrearApoderado" style="width: 20px;height: 20px;"></a>
                    <?php 
                $busqueda = $_REQUEST['busqueda'];
                if(empty($busqueda)){
                    header("location:listaTest.php");
                }                 
                ?>  
                    <form action="buscarListaTestPorFecha.php" method="get" class="form_search">             
                      <input type="date" name="busqueda" placeholder="Buscar test">
                     <input type="submit" value="Buscar" class="btn_search" >  
             
                     </form>
                    </div>
                   <br>  
                    <table id="myTable" class="table table-striped" style="width:100%"  >
                        <thead>
                        <tr>
                            <th>Fecha inicio</th>     
                            <th>Fecha final</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <?php 

                 $objTest = new Test();
                 $result_register = $objTest->contadorTest();
                 
                 $por_pag = 5;
                 if(empty($_GET['pagina'])){
                     $pagina=1;
                 }else{
                     $pagina = $_GET['pagina'];
                 }

                 $desde =($pagina-1)*$por_pag;
                 $total_paginas= ceil($result_register/$por_pag);               
                 $result = $objTest->obtener_busqueda_test($busqueda,$desde,$por_pag);
                 
                 sort($result);
                 if(isset($result)&& !empty($result) && sizeof($result)>0){
                   // asort($result);
                    foreach( $result as $data){
                        
                        ?>
                        <tr>
                        <td data-titulo="Fecha inicio:"><?php echo $data['fecha_inicio'] ?></td> 
                        <td data-titulo="Fecha final:"><?php echo $data['fecha_final'] ?></td>
                        <td data-titulo="Decripcion:"><?php echo $data['descripcion'] ?></td>
                      
                        <td data-titulo="Estado:"><?php echo $data['estado'] ?></td>
                        
                        <td>
                        <a class ="link_edit" onclick="confirmarDelete1()" href="editarTest.php?id=<?php  echo $data['cod_test'] ?>"><img src="https://image.flaticon.com/icons/png/512/2919/2919592.png" alt="información" style="width: 20px;height: 20px;">Editar</a>| 
                    
                        <a href="listaTestAlumno.php?id=<?php echo $data['cod_test'] ?>"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;">Ver</a> 
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
                 <li><a href="?pagina=<?php echo 1; ?>" style=" border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">|<<</a> </li>
                     <li><a href="?pagina=<?php echo $pagina-1; ?>"style="  border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;"><<<</a> </li>
                   <?php }
                   ?> 
                   <?php
                     for($i=1; $i <=$total_paginas; $i++){
                         if($i==$pagina){
                            echo '<li " style=" border: 1px solid #0ca4ce;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;background:#0ca4ce;"> '.$i.'</li> ';
                             
                         }else{
                            echo '<li><a href="?pagina='.$i.'" style=" border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">'.$i.'</a> </li> ';
                      }
                      
                     }
                     if($pagina !=$total_paginas){

                     
                      ?> 
                     <li><a href="?pagina=<?php echo $pagina+1; ?>"style="  border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>></a> </li>
                     <li><a href="?pagina=<?php echo $total_paginas; ?>"style="  border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>|</a> </li>
                        <?php }?>
                    </ul>
             </div>

             </div>
             <?php 
                require_once "../srcColaborador/footer.php";
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
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
             
</body>
</html>