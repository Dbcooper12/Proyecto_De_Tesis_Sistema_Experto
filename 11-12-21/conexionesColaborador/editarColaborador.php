<?php
    require_once "../logica/Colaborador.class.php"; 
    try {
               $iduser =$_POST['cod_psicologo'];
               $nombre_psico = $_POST['nombre_psico'];
               $apellido_pater_apo=$_POST['apellido_pater_psico'];
               $apellido_mater_apo=$_POST['apellido_mater_psico'];
               $dni_apo= $_POST['dni_psico']; 
               $password = $_POST['contraseña_psico'];
               $contrase = password_hash($password,PASSWORD_DEFAULT);
               $estado = $_POST['estado']; 
               $celular_apo =$_POST['celular_psico'];
               $correo_apo=$_POST['correo']; 
               $cargo =$_POST['cargo'];
                  $objColaborador= new Colaborador();
                  $result = $objColaborador->editarColaborador($nombre_psico,$apellido_mater_apo,$apellido_pater_apo,$contrase,$dni_apo,$celular_apo,$correo_apo,$estado,$cargo,$iduser);

                  if($result){
                              echo '<script type="text/javascript">'
                              ,'function mostrar(){
                              alert("Se actualizo correctamente");
                              }'
                              ,'function registro() {
                                    window.location="../srcColaborador/listaPsicologo.php";
                                    }'
                              , 'mostrar();','registro();'
                              , '</script>'; 
                     }else{
                              echo '<script type="text/javascript">'
                              ,'function mostrar(){
                              alert("se cometio un error al actualizar datos");
                              }'
                              ,'function registro() {
                                 window.location="../srcColaborador/listaPsicologo.php";
                                    }'
                              , 'mostrar();','registro();'
                              , '</script>'; 
                     }
                  } catch (Exception $exc) {
                        throw $exc;
                    }

        ?>