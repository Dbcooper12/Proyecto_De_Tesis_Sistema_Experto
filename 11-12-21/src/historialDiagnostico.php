<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Historial diagnóstico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href = "../css/historialDiagnostico.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tourney:ital,wght@1,700&display=swap" rel="stylesheet">
   
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/plotly-latest.min.js"></script>
</head>

<body> 
<?php 
        require_once "header.php"; 
        ?>
				<a href="contactanos.php"><img src="https://image.flaticon.com/icons/png/512/1034/1034306.png" alt="información" style="width: 30px;height: 30px;"> Contacto</a>
			    </nav>
		        </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">
                    <h1 style="text-align:center;"> Historial de Diagnósticos</h1> <hr>

            <table >
                <thead>
                   
                    <tr>
                        <th >Diagnóstico</th>
                        <th>Fecha</th>                        
                    </tr>
                </thead>
                <?php
                        require_once "../conexiones/variableSession.php";  
                        require_once "../conexiones/abrirConexion.php"; 
                        $n = $_SESSION["dni"];  
                        $sql="SELECT * FROM alumnos where dni=$n"; 
                            $resultado = mysqli_query($conexion,$sql);
                            while($row = mysqli_fetch_assoc($resultado)){
                              $ID_Alumnos=$row['ID_Alumnos'];
                            }  
                          
                        $sql_registro = mysqli_query($conexion,"SELECT COUNT(*) as total FROM historialdiagnostico WHERE ID_Alumnos= $ID_Alumnos"); 
                        $result_register= mysqli_fetch_array($sql_registro);
                        $total_registro = $result_register['total'];
                        $por_pag = 5;
                        if(empty($_GET['pagina'])){
                            $pagina=1;
                        }else{
                            $pagina = $_GET['pagina'];
                        } 
                        $desde =($pagina-1)*$por_pag;
                        $total_paginas= ceil($total_registro/$por_pag);

                        $sql="SELECT ID_Alumnos,diagnostico,fecha FROM historialdiagnostico WHERE ID_Alumnos= $ID_Alumnos LIMIT $desde,$por_pag";
            
                            $resultado = mysqli_query($conexion,$sql);
                            $result = mysqli_num_rows($resultado);
                        if($result>0){
                            while($data= mysqli_fetch_array($resultado)){
                    
                      ?>                 
                    <tr> 
                   
                        <td data-titulo="Síntoma :"><?php echo $data['diagnostico'] ?></td>
                        <td data-titulo="Fecha - Hora :"><?php echo $data['fecha'] ?></td>
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
                         <li><a href="?pagina=<?php echo 1; ?>" style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">|<<</a> </li>
                          <li><a href="?pagina=<?php echo $pagina-1; ?>"style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;"><<<</a> </li>
                        <?php }
                        ?> 
                        <?php
                            for($i=1; $i <=$total_paginas; $i++){
                                if($i==$pagina){
                                    echo '<li " style="color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;"> '.$i.'</li> ';
                                    
                                }else{
                                    echo '<li><a href="?pagina='.$i.'" style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">'.$i.'</a> </li> ';
                            }
                            
                            }
                             if($pagina !=$total_paginas){ 
                             ?> 
                        <li><a href="?pagina=<?php echo $pagina+1; ?>"style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>></a> </li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>"style=" color: #0ca4ce; border: 1px solid #ddd;padding: 5px;display: inline-block;font-size: 14px;text-align: center;width: 35px;">>>|</a> </li>
                        <?php }?>
                    </ul>
                        </div> 
                    </div> 
                </div>
                <div class="contenedor_tabla"  > 
                    <div class="contenedor_titulo">

                    <h1 style="text-align:center;"> Gráfico </h1> 
                        <hr> 
                    <div id="cargaBarras">
                    <?php
                        require_once "../conexiones/abrirConexion.php";  
                        $conexion=conexion();
                        $sql="SELECT fecha,diagnostico
                        from historialdiagnostico WHERE ID_Alumnos= $ID_Alumnos order by diagnostico DESC";
                        $result=mysqli_query($conexion,$sql);
                        $valoresY=array();//montos
                        $valoresX=array();//fechas

                        while ($ver=mysqli_fetch_row($result)) {
                            $valoresY[]=$ver[1];
                            $valoresX[]=$ver[0];
                        }

                        $datosX=json_encode($valoresX);
                        $datosY=json_encode($valoresY);
                    ?>

                             <div id="graficaBarras"></div>

                            <script type="text/javascript">
                                function crearCadenaBarras(json){
                                    var parsed = JSON.parse(json);
                                    var arr = [];
                                    for(var x in parsed){
                                        arr.push(parsed[x]);
                                    }
                                    return arr;
                                }
                            </script>

                            <script type="text/javascript"> 
                                datosX=crearCadenaBarras('<?php echo $datosX ?>');
                                datosY=crearCadenaBarras('<?php echo $datosY ?>'); 
                                var data = [
                                    {
                                        x: datosX,
                                        y: datosY,
                                        type: 'bar'
                                    }
                                ];
                                Plotly.newPlot('graficaBarras', data);
                            </script>
                    </div>  
                </div>
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

</body>

</html>
 