<?php 
    
    require_once '../datos/conexion.php';

    class Apoderado extends Conexion {
        public function obtenerDatosAapoderado($codApoderado){ 
          try {
                $sql="SELECT cod_apoderado,nombre_apo,apellido_mater_apo,apellido_pater_apo,celular_apo,correo_apo,direccion_apo,dni_apo FROM apoderado  WHERE cod_apoderado=:p_codApoderado";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_codApoderado',$codApoderado);
                $sentecia->execute();  
                $resultado=$sentecia->fetchAll();  
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        } 
       
        
        public function registarApoderado($nombre,$apellido_materno,$apellido_paterno,$celular,$direccion,$dni,$correo){ 
            try {
                  $sql="INSERT INTO apoderado
                           (nombre_apo, 
                           apellido_mater_apo,
                           apellido_pater_apo,
                           celular_apo,
                           direccion_apo,
                           dni_apo,correo_apo)
                  VALUES (
                        :p_nombre,
                        :p_apellidoM,
                        :p_apellidoP,
                        :p_celular,
                        :p_direccion,
                        :p_dni,
                        :p_correo
                        )"; 
                  $sentecia =$this->dblink->prepare($sql);
                  $sentecia->bindParam(':p_nombre',$nombre);
                  $sentecia->bindParam(':p_apellidoM',$apellido_materno);
                  $sentecia->bindParam(':p_apellidoP',$apellido_paterno);
                  $sentecia->bindParam(':p_celular',$celular);       
                  $sentecia->bindParam(':p_direccion',$direccion);                   
                  $sentecia->bindParam(':p_dni',$dni);
                  $sentecia->bindParam(':p_correo',$correo); 
                  $sentecia->execute();    
                  return $sentecia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
        }   
        public function editarApoderado($nombre,$apellido_materno,$apellido_paterno,$celular,$direccion,$dni,$correo,$iduser){
            try {
                $sql="UPDATE apoderado 
                        SET 
                            nombre_apo=:p_nombre,
                            apellido_pater_apo=:p_apellidoP,
                            apellido_mater_apo=:p_apellidoM,
                            celular_apo=:p_celular,
                            direccion_apo=:p_direccion,
                            dni_apo=:p_dni,
                            correo_apo=:p_correo 
                        WHERE cod_apoderado=:p_iduser"; 
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_nombre',$nombre);
                $sentecia->bindParam(':p_apellidoM',$apellido_materno);
                $sentecia->bindParam(':p_apellidoP',$apellido_paterno);
                $sentecia->bindParam(':p_celular',$celular);       
                $sentecia->bindParam(':p_direccion',$direccion);                   
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->bindParam(':p_correo',$correo); 
                $sentecia->bindParam(':p_iduser',$iduser); 
                $sentecia->execute();    
                return $sentecia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }

        public function cargarDatos(){
            try{
                $sql = "SELECT cod_apoderado,nombre_apo,apellido_pater_apo,apellido_mater_apo FROM apoderado";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }catch(Exception $ex){
                throw $ex;
            }
        }
     } 

?>