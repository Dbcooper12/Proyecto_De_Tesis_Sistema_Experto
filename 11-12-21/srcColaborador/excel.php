<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= Alumnos.xls");
require_once "../conexionesColaborador/variableSession.php";  
require_once "../logica/Alumno.class.php";  
require_once "../logica/Test.class.php";  
$grado = $_GET['grado'];
$estadoTabla = $_GET['estado'];
?>

<table >
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
                 
                 $por_pag = 15;
                 if(empty($_GET['pagina'])){
                     $pagina=1;
                 }else{
                     $pagina = $_GET['pagina'];
                 }
                     $iduser=$_GET['id'];                        
                     $objTest = new Test();
                     $alumno_cod_alumno=0;
                     $resultadoCod = $objTest-> obtenerCodAlumnoTest($iduser);
                 foreach( $resultadoCod as  $datas){
                                    
                    $alumno_cod_alumno=$datas['alumno_cod_alumno']; 
                    
                    $cod_test_alumno=$datas['cod_test_alumno'];                        
                  }  
                 $desde =($pagina-1)*$por_pag;
                 $total_paginas= ceil($result_register/$por_pag);               
                 $result = $objAlumno->listarAlumnosPorLimite($desde,$por_pag);
                 if(isset($result)&& !empty($result) && sizeof($result)>0){
                    foreach( $result as $data){
                        ?>
                        <tr>
                        <?php 
                        if($estadoTabla=='1'){
                            if($grado==$data['grado_cod_grado']){
                        if($data['cod_alumno']==$alumno_cod_alumno){ 
                          ?>   
                          <td data-titulo="Grado:"><?php echo $data['grado_cod_grado'] ?></td>
                        <td data-titulo="Nombre:"><?php echo $data['apellido_paterno_alum'] ." ". $data['apellido_mater_alum'] ." ". $data['nombre_alum'] ?></td> 
                       <td data-titulo="Telefono:"><?php echo $data['celular_alum'] ?></td>
                        <td data-titulo="Email:"><?php echo $data['correo_alum'] ?></td>
                       
                        <td data-titulo="Test:"> Test alumno Disponible</a></td> 
                        <?php
                         }
                        }
                    }else {
                        if($data['cod_alumno']!=$alumno_cod_alumno){ 
                        if($estadoTabla=='2'){
                            if($grado==$data['grado_cod_grado']){
                         ?>
                         <td data-titulo="Grado:"><?php echo $data['grado_cod_grado'] ?></td>
                         <td data-titulo="Nombre:"><?php echo $data['apellido_paterno_alum'] ." ". $data['apellido_mater_alum'] ." ". $data['nombre_alum'] ?></td> 
                         <td data-titulo="Telefono:"><?php echo $data['celular_alum'] ?></td>
                         <td data-titulo="Email:"><?php echo $data['correo_alum'] ?></td>
                          <td data-titulo="Test:">Falta test del alumno</a></td>
                        <?php
                         } }}
                     }
                         
                         ?> 
                    </tr>
                        <?php  } 
                 } 
                   ?>  
             </table>