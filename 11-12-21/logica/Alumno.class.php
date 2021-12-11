<?php 
    
    require_once '../datos/conexion.php';

    class Alumno extends Conexion {

        public function obtenerDatosAlumno($dni){ 
          try {
                $sql="SELECT * FROM alumno where dni_alum=:p_dni";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->execute();  
                $resultado=$sentecia->fetchAll();  
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        } 
        
        public function registarAlumno($nombre,$apellido_materno,$apellido_paterno,$fecha,$sexo,$pass_cifrado,$dni,$celular,$correo,$direccion,$grado,$estado,$apoderado){ 
            try {
                  $sql="INSERT INTO alumno
                            (nombre_alum,
                            apellido_paterno_alum,
                            apellido_mater_alum,
                            fecha_nacimiento,
                            sexo_alum,
                            contraseña_alum,
                            dni_alum,
                            celular_alum,
                            correo_alum,
                            direccion_alum,
                            apoderado_cod_apoderado, 
                            grado_cod_grado,
                            estado_alumno_cod_estado) 
                  VALUES (
                            :p_nombre,
                            :p_apellido_materno,
                            :p_apellido_paterno,
                            :p_fecha,:p_sexo,
                            :p_password,:p_dni,
                            :p_celular,
                            :p_correo,
                            :p_direccion,
                            :p_apoderado,
                            :p_grado,
                            :p_estado
                      )";
                  $sentecia =$this->dblink->prepare($sql);
                  $sentecia->bindParam(':p_nombre',$nombre);
                  $sentecia->bindParam(':p_apellido_materno',$apellido_materno);
                  $sentecia->bindParam(':p_apellido_paterno',$apellido_paterno);
                  $sentecia->bindParam(':p_fecha',$fecha);
                  $sentecia->bindParam(':p_sexo',$sexo);
                  $sentecia->bindParam(':p_password',$pass_cifrado);
                  $sentecia->bindParam(':p_dni',$dni);
                  $sentecia->bindParam(':p_celular',$celular);                  
                  $sentecia->bindParam(':p_correo',$correo);
                  $sentecia->bindParam(':p_direccion',$direccion);                  
                  $sentecia->bindParam(':p_apoderado',$apoderado);
                  $sentecia->bindParam(':p_grado',$grado);
                  $sentecia->bindParam(':p_estado',$estado);
                  $sentecia->execute();    
                  return $sentecia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
        }     

        public function editarAlumno($nombre,$apellido_materno,$apellido_paterno,$fecha,$sexo,$pass_cifrado,$dni,$celular,$correo,$direccion,$grado,$estado,$apoderado,$iduser){
            try {
                $sql="UPDATE alumno 
                        SET 
                        nombre_alum=:p_nombre,
                        apellido_paterno_alum=:p_apellido_materno,
                        apellido_mater_alum=:p_apellido_materno,
                        contraseña_alum=:p_password,
                        dni_alum=:p_dni,
                        celular_alum=:p_celular,
                        fecha_nacimiento=:p_fecha,
                        correo_alum=:p_correo,
                        direccion_alum=:p_direccion,
                        grado_cod_grado=:p_grado,
                        sexo_alum=:p_sexo,
                        estado_alumno_cod_estado=:p_estado,
                        apoderado_cod_apoderado=:p_apoderado
                 WHERE cod_alumno=:p_iduser";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_nombre',$nombre);
                $sentecia->bindParam(':p_apellido_materno',$apellido_materno);
                $sentecia->bindParam(':p_apellido_paterno',$apellido_paterno);
                $sentecia->bindParam(':p_fecha',$fecha);
                $sentecia->bindParam(':p_sexo',$sexo);
                $sentecia->bindParam(':p_password',$pass_cifrado);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->bindParam(':p_celular',$celular);                  
                $sentecia->bindParam(':p_correo',$correo);
                $sentecia->bindParam(':p_direccion',$direccion);                  
                $sentecia->bindParam(':p_apoderado',$apoderado);
                $sentecia->bindParam(':p_grado',$grado);
                $sentecia->bindParam(':p_estado',$estado); 
                $sentecia->bindParam(':p_iduser',$iduser);
                $sentecia->execute();    
                return $sentecia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }
        
        public function contadorAlumnos(){
            try{
                $sql = "SELECT COUNT(*) as total FROM alumno";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->execute();                 
                $resultado= $sentecia->fetchColumn();
                return $resultado;
            }catch (Exception $exc) {
                throw $exc;
            }                
        }

        public function listarAlumnosPorLimite($desde,$por_pag){
            try{
            $sql="SELECT 
                    cod_alumno,
                    nombre_alum,
                    apellido_paterno_alum,
                    apellido_mater_alum,
                    dni_alum,grado_cod_grado,
                    sexo_alum,
                    apoderado_cod_apoderado,
                    celular_alum,
                    correo_alum 
                FROM alumno order by grado_cod_grado,apellido_paterno_alum ASC
                LIMIT $desde,$por_pag";
            $sentecia =$this->dblink->prepare($sql); 
            $sentecia->execute();    
            $resultado=$sentecia->fetchAll();
            return $resultado;
        }catch (Exception $exc) {
            throw $exc;
        }      
        }
        
        public function listarAlumnos($iduser){
            try{
                $sql="SELECT * FROM alumno where cod_alumno=:p_user";
                $sentecia =$this->dblink->prepare($sql); 
                $sentecia->bindParam(':p_user',$iduser);
                $sentecia->execute();  
                $resultado=$sentecia->fetchAll(); 
                return $resultado;

            }catch(Exception $ex){
                throw $ex;
            }
            
        }
        public function eliminarAlumno($codigo){ 
            try {
                  $sql="DELETE FROM alumno WHERE cod_alumno=:p_codigo";
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