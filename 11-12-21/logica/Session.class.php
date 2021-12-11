<?php 
    
    require_once '../datos/conexion.php';

    class Session extends Conexion {

        public function obtenerDatosSessionAlumno($dni){ 
          try {  
                $sql="SELECT * FROM alumno WHERE dni_alum= :p_dni";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->execute();   
                return $sentecia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }        
        
        public function obtenerVariableNavegador($dni){
            
            try {  
                $sql="SELECT * FROM alumno WHERE dni_alum= :p_dni";
                $sentecia =$this->dblink->prepare($sql);
                $sentecia->bindParam(':p_dni',$dni);
                $sentecia->execute();    
                $resultado=$sentecia->fetchAll();
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }
           
        }
        public function obtenerDatosSessionColaborador($dni){ 
            try {  
                  $sql="SELECT * FROM colaborador WHERE dni_colabo= :p_dni";
                  $sentecia =$this->dblink->prepare($sql);
                  $sentecia->bindParam(':p_dni',$dni);
                  $sentecia->execute();   
                  return $sentecia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
          } 
     } 

?>