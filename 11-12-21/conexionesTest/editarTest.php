<?php
    require_once "../logica/Test.class.php"; 
    try {
               $iduser =$_POST['cod_test'];
               $fecha_inicio = $_POST['fecha_inicio'];
               $fecha_final=$_POST['fecha_final'];
               $descripcion=$_POST['descripcion'];
                
               if($fecha_inicio>$fecha_final){
                  echo '<script type="text/javascript">'
                  ,'function mostrar(){
                  alert("Error, la fecha de inicio no puede ser mayor a la fecha final");
                  }'
                  ,'function registro() {
                        window.location="../srcColaborador/listaTest.php";
                        }'
                  , 'mostrar();','registro();'
                  , '</script>';
               }else{
                  $objColaborador= new Test();
                  $result = $objColaborador->editarTest($fecha_inicio,$fecha_final,$descripcion,$iduser);
                  if($result){
                        echo '<script type="text/javascript">'
                        ,'function mostrar(){
                        alert("Se actualizo correctamente");
                        }'
                        ,'function registro() {
                              window.location="../srcColaborador/listaTest.php";
                              }'
                        , 'mostrar();','registro();'
                        , '</script>'; 
               }else{
                  echo '<script type="text/javascript">'
                  ,'function mostrar(){
                  alert("se cometio un error al actualizar datos");
                  }'
                  ,'function registro() {
                     window.location="../srcColaborador/listaTest.php";
                        }'
                  , 'mostrar();','registro();'
                  , '</script>'; 
                     }
                    }
               } catch (Exception $exc) {
                        throw $exc;
                    }

        ?>