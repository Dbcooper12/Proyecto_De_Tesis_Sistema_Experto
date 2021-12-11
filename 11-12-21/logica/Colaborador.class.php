<?php 
    
    require_once '../datos/conexion.php';

    class Colaborador extends Conexion {

        public function obtenerDatosColaborador($dni){ 
          try {
                $sql="SELECT * FROM colaborador where dni_colabo=:p_dni";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->execute();  
                $resultado=$sentecia->fetchAll();  
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        } 
        
        public function registarColaborador($nombre,$apellido_materno,$apellido_paterno,$celular,$dni,$correo,$pass_cifrado,$estado,$cargo){ 
            try {
                  $sql="INSERT INTO colaborador 
                        (nombre_colabo,
                        apellido_mater_colabo, 
                        apellido_pater_colabo,
                        celular_colabo,
                        dni_colabo,
                        correo_colabo,
                        contraseña_colabo,
                        estado_colaborador_cod_estado_colaborador,
                        cargocod_cargo)
                  VALUES (
                            :p_nombre,
                            :p_apellido_materno,
                            :p_apellido_paterno, 
                            :p_celular,
                            :p_dni,
                            :p_correo,
                            :p_password,
                            :p_estado_colaborador,
                            :p_cargo
                      )";
                  $sentecia =$this->dblink->prepare($sql);
                  $sentecia->bindParam(':p_nombre',$nombre);
                  $sentecia->bindParam(':p_apellido_materno',$apellido_materno);
                  $sentecia->bindParam(':p_apellido_paterno',$apellido_paterno);                  
                  $sentecia->bindParam(':p_celular',$celular);                   
                  $sentecia->bindParam(':p_dni',$dni);                               
                  $sentecia->bindParam(':p_correo',$correo); 
                  $sentecia->bindParam(':p_password',$pass_cifrado);    
                  $sentecia->bindParam(':p_estado_colaborador',$estado);
                  $sentecia->bindParam(':p_cargo',$cargo);
                  $sentecia->execute();    
                  return $sentecia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
        }     

        public function editarColaborador($nombre,$apellido_materno,$apellido_paterno,$pass_cifrado,$dni,$celular,$correo,$estado,$cargo,$iduser){
            try {
                $sql="UPDATE colaborador 
                        SET 
                        nombre_colabo=:p_nombre,
                        apellido_pater_colabo=:p_apellido_paterno,
                        apellido_mater_colabo=:p_apellido_materno,
                        contraseña_colabo=:p_password,
                        dni_colabo=:p_dni,
                        celular_colabo=:p_celular,                        
                        correo_colabo=:p_correo,
                        estado_colaborador_cod_estado_colaborador=:p_estado_colaborador,
                        cargocod_cargo=:p_cargo
                 WHERE cod_colaborador=:p_iduser";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_nombre',$nombre);
                $sentecia->bindParam(':p_apellido_materno',$apellido_materno);
                $sentecia->bindParam(':p_apellido_paterno',$apellido_paterno);
                $sentecia->bindParam(':p_password',$pass_cifrado);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->bindParam(':p_celular',$celular);                  
                $sentecia->bindParam(':p_correo',$correo); 
                $sentecia->bindParam(':p_estado_colaborador',$estado);
                $sentecia->bindParam(':p_cargo',$cargo); 
                $sentecia->bindParam(':p_iduser',$iduser);
                $sentecia->execute();    
                return $sentecia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }
        
        public function contadorColaborador(){
            try{
                $sql = "SELECT COUNT(*) as total FROM colaborador";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->execute();                 
                $resultado= $sentecia->fetchColumn();
                return $resultado;
            }catch (Exception $exc) {
                throw $exc;
            }                
        }

        public function listarPsicologoPorLimite($desde,$por_pag){
            try{
            $sql="SELECT 
                    *
                FROM colaborador 
                LIMIT $desde,$por_pag";
            $sentecia =$this->dblink->prepare($sql); 
            $sentecia->execute();    
            $resultado=$sentecia->fetchAll();
            return $resultado;
        }catch (Exception $exc) {
            throw $exc;
        }      
        }
        
        public function listarColaborador($iduser){
            try{
                $sql="SELECT * FROM colaborador where cod_colaborador=:p_user";
                $sentecia =$this->dblink->prepare($sql); 
                $sentecia->bindParam(':p_user',$iduser);
                $sentecia->execute();  
                $resultado=$sentecia->fetchAll(); 
                return $resultado;

            }catch(Exception $ex){
                throw $ex;
            }
            
        }
        public function eliminarColaborador($codigo){ 
            try {
                  $sql="DELETE FROM colaborador WHERE cod_colaborador=:p_codigo";
                  $sentecia =$this->dblink->prepare($sql);
                  $sentecia->bindParam(':p_codigo',$codigo);
                  $sentecia->execute();   
                  return $sentecia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
          } 
        
    } 

?>