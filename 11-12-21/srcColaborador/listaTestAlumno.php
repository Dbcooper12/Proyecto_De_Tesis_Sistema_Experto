
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/listaTestAlumno.css">
    
</head>

<body>
 <header>
  
  
    </header> 
        <?php 
        require_once "../conexionesColaborador/variableSession.php"; 
        require_once "../srcColaborador/header.php"; 
        require_once "../logica/Alumno.class.php";  
        require_once "../logica/Test.class.php";   
        require_once "../logica/Colaborador.class.php";  
        $iduser=$_GET['id']; 
        $n = $_SESSION["dni"];    
        $objColaborador= new Colaborador();
        $result = $objColaborador->obtenerDatosColaborador($n);
          foreach( $result as  $data){
            $cod_colaborador=$data['cod_colaborador'];                
        }  
        ?>
				<a href="listaTest.php"><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 30px;height: 30px;"> Lista de Test</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                   <center> <h3><img src="https://image.flaticon.com/icons/png/512/2666/2666436.png" alt="información" style="width: 50px;height: 50px;"> Lista de alumnos</h3></center>
                  
                                <div>                                            
                        <table>
                                    <td> </td>
                            <td>
                            <form action="buscarGradoEstado.php?id=<?php  echo $iduser ?>" method="post" class="form_search">
                                    <label> Filtrar: Grado </label>  

                                        <select name="grado" id="grado" required  >  
                                            <option value="" disabled="" selected >Seleccionar Grado</option>
                                            <option value="1">Primero</option>
                                            <option value="2">Segundo</option>
                                            <option value="3">Tercero</option>
                                            <option value="4">Cuarto</option>
                                            <option value="5">Quinto</option>                 
                                        </select>
                                        <label> Estado: </label>
                                        <select name="estado" id="estado"  required >  
                                            <option value="" disabled="" selected >Seleccionar estado</option>
                                            <option value="1">Resolvieron test</option>
                                            <option value="2">No resolvieron test</option>
                                        </select> 
                                        <input type="submit" value="Buscar" class="btn_search" >   
                                </from> 
                            </td> 
                        </table>    
                        </div> 
                    </div>
                   <br>   
                    <table id="myTable" class="table table-striped" style="width:100%"  >
                        <thead>
                        <tr>
                            <th>Grado</th> 
                            <th>Apellido y nombres</th>   
                            <th>Tefono</th>
                            <th>Email</th> 
                            <th>Test</th> 
                        </tr>
                        </thead>
                        <?php 
                 $objAlumno = new Alumno();
                 $result_register = $objAlumno->contadorAlumnos();
                 
                 $por_pag = 10;
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
                        <td data-titulo="Grado:"><?php echo $data['grado_cod_grado'] ?></td> 
                        <td data-titulo="Nombre:"><?php echo $data['apellido_paterno_alum'] ." ". $data['apellido_mater_alum'] ." ". $data['nombre_alum'] ?></td> 
                        <td data-titulo="Telefono:"><?php echo $data['celular_alum'] ?></td>
                        <td data-titulo="Email:"><?php echo $data['correo_alum'] ?></td>
                        <?php 
                                                
                     $objTest = new Test();
                     $alumno_cod_alumno=0;
                     $resultadoCod = $objTest-> obtenerCodAlumnoTest($iduser);
                     foreach( $resultadoCod as  $datas){
                                    
                        $alumno_cod_alumno=$datas['alumno_cod_alumno']; 
                        
                        $cod_test_alumno=$datas['cod_test_alumno'];                        
                      }     
                        if($data['cod_alumno']==$alumno_cod_alumno){ 
                            
                            $resultado_estado = $objTest-> obtener_estado_psicologo($iduser,$cod_colaborador);
                            $estado_alumno_test='';
                            foreach($resultado_estado as $estado_alumno  ){                   
                                $estado_alumno_test= $estado_alumno["estado"];
                              }
                                        $colaborador_cod_colaborador=0;
                                        $resultadoCodColaborador = $objTest-> obtenerCodColaboradorTest($iduser);
                                        foreach( $resultadoCodColaborador as  $datas){ 
                                            
                                            $colaborador_cod_colaborador=$datas['cod_test_psicologo'];                        
                                        }          
                         
                              if($estado_alumno_test=='disponible'){
                                ?>
                       
                                <td data-titulo="Test:"><a href="testAlumnoColaborador.php?id=<?php echo $cod_test_alumno ?>"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;">Ver test alumno</a>
                                        | <a class ="link_edit" href="testRespuestaColaborador.php?id=<?php echo $colaborador_cod_colaborador ?>"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;">Ver test psicologo</a>| 
                                            <a href="#"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;">Ver Diagnostico</a>
                                    </td> 
                                    <?php      
                                }else{
                                    ?>
                                    <td data-titulo="Test:"><a href="testAlumnoColaborador.php?id=<?php echo $cod_test_alumno ?>"><img src="https://image.flaticon.com/icons/png/512/3515/3515397.png" alt="información" style="width: 20px;height: 20px;">Ver test alumno</a>
                                        | <a class ="link_edit" href="testColaborador.php?id=<?php  echo $iduser ?>&codAlumno=<?php echo $cod_test_alumno ?>"><img src="https://image.flaticon.com/icons/png/512/2919/2919592.png" alt="información" style="width: 20px;height: 20px;">Resolver test psicologo</a> 
                                    </td> 
                                    <?php
                                    }

                              }else{
                          ?>
                           <td data-titulo="Test:"> <img src="https://t4.ftcdn.net/jpg/01/71/83/85/240_F_171838554_uJDqVi55tYVMkhEOKthFCFsrp8364AAo.jpg" alt="información" style="width: 35px;height: 35px;">Falta resolver test</td>
                         <?php
                        }
                         ?> 
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
             <div class="contenedor_tablaD">
                    <div class="contenedor_titulo">
                   <center> <a class ="link_edit"  href="exceltodos.php?id=<?php  echo $iduser ?>"><img src="https://cdn-icons-png.flaticon.com/512/888/888850.png" alt="información" style="width: 20px;height: 20px;">Exportar</a> </center>
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