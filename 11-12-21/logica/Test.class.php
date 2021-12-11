<?php 
    
    require_once '../datos/conexion.php';

    class Test extends Conexion {

        public function obtenerFechaTest($cod){ 
         
          try {  
                $sql="SELECT * FROM test WHERE cod_test= :p_cod";
                $sentencia =$this->dblink->prepare($sql);
                $sentencia->bindParam(':p_cod',$cod);
                $sentencia->execute();   
                return $sentencia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }        
        
        public function registarTest($fecha_inicio,$fecha_final,$descripcion){ 
            try {
                  $sql="INSERT INTO test
                         (fecha_inicio,fecha_final,descripcion) 
                  VALUES (  
                            :p_fecha_inicio,
                            :p_fecha_final,
                            :p_descripcion          
                          )";
                  $sentencia =$this->dblink->prepare($sql);
                  $sentencia->bindParam(':p_fecha_inicio',$fecha_inicio);
                  $sentencia->bindParam(':p_fecha_final',$fecha_final);
                  $sentencia->bindParam(':p_descripcion',$descripcion); 
                  $sentencia->execute();    
                  return $sentencia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
        }
 

        public function editarTest($fecha_inicio,$fecha_final,$descripcion,$iduser){
            try {
                $sql="UPDATE test 
                        SET 
                        fecha_inicio=:p_fecha_inicio,
                        fecha_final=:p_fecha_final,
                        descripcion=:p_descripcion    
                 WHERE cod_test=:p_iduser";
                $sentencia =$this->dblink->prepare($sql);
                $sentencia->bindParam(':p_fecha_inicio',$fecha_inicio);
                $sentencia->bindParam(':p_fecha_final',$fecha_final);
                $sentencia->bindParam(':p_descripcion',$descripcion); 
                $sentencia->bindParam(':p_iduser',$iduser);
                $sentencia->execute();    
                return $sentencia;
                
            } catch (Exception $exc) {
                throw $exc;
            }
        }
        
        public function contador(){

            $archivo="contador.txt";
            $f = fopen($archivo,"r");
            $contador = 0;
            if($f){
                $contador = fread ($f, filesize($archivo));
                $contador = $contador +1;
                fclose($f);
            }

            $f=fopen($archivo,"w+");
            if($f){
                fwrite($f,$contador);
                fclose($f);
            }

            return $contador;
        }

        public function contadorTest(){
            try{
                $sql = "SELECT COUNT(*) as total FROM test";
                $sentencia =$this->dblink->prepare($sql);
                $sentencia->execute();                 
                $resultado= $sentencia->fetchColumn();
                return $resultado;
            }catch (Exception $exc) {
                throw $exc;
            }                
        }
        
        public function listarTestPorLimite($desde,$por_pag){
            try{
            $sql="SELECT *,(case when fecha_inicio > NOW()then 'inactivo' ELSE(case when fecha_final<NOW()then 'finalizado' ELSE (case when NOW() BETWEEN fecha_inicio AND fecha_final then 'activo' ELSE 'x' END)END)END)AS estado FROM test ORDER BY fecha_inicio DESC LIMIT $desde,$por_pag";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->execute();    
            $resultado=$sentencia->fetchAll();
            return $resultado;
        }catch (Exception $exc) {
            throw $exc;
        }      
        }
        
        public function listarTest($iduser){
            try{
                $sql="SELECT * FROM test where cod_test=:p_user";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_user',$iduser);
                $sentencia->execute();  
                $resultado=$sentencia->fetchAll(); 
                return $resultado;

            }catch(Exception $ex){
                throw $ex;
            }
            
        }
        public function eliminarTest($codigo){ 
            try {
                  $sql="DELETE FROM test WHERE cod_test=:p_codigo";
                  $sentencia =$this->dblink->prepare($sql);
                  $sentencia->bindParam(':p_codigo',$codigo);
                  $sentencia->execute();   
                  return $sentencia;
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
          }  
 
    // Preguntas del Test
    public function obtener_lista_preguntas(){
        try {  
            $sql="SELECT cod_pregunta_alumno,descripcion FROM pregunta_alumno order by 1";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->execute();                  
            $resultado=$sentencia->fetchAll();   
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }

    }
        public function obtener_pregunta($id){
            try {  
                $sql="SELECT cod_pregunta_alumno,descripcion FROM pregunta_alumno WHERE cod_pregunta_alumno= :p_id";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_id',$id);
                $sentencia->execute();                  
                $resultado=$sentencia->fetch();   
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }

        }
      
        public function registarRespuestaTest($test_cod_test, $alumno_cod_alumno, $detalle){ 
            try {
                $estado='disponible';
                $sql="INSERT INTO test_alumno
                                     (test_cod_test,
                                     alumno_cod_alumno,
                                     estado) 
                                     VALUES (
                                         :p_cod_test,
                                         :p_cod_alumno,
                                         :p_estado
                                         )";
                    $sentencia =$this->dblink->prepare($sql);
                    $sentencia->bindParam(':p_cod_test',$test_cod_test);
                    $sentencia->bindParam(':p_cod_alumno',$alumno_cod_alumno); 
                    $sentencia->bindParam(':p_estado',$estado); 
                    $sentencia->execute();    

                    $test_alumno_cod_test_alumno = $this->dblink->lastInsertId();

                    for ($i=0;$i<14;$i++){
                        $pregunta_alumno_cod_preguntas_alumno =  $detalle['cod_pregunta_alumno'.($i+1)];
                        $escala_hamilton_cod_escala =  $detalle['t'.($i+1)];

                        $sql="INSERT INTO test_alumno_pregunta(
                            test_alumno_cod_test_alumno,
                            pregunta_alumno_cod_preguntas_alumno,
                            escala_hamilton_cod_escala) 
                        VALUES (:p_test_alumno_cod_test_alumno,
                        :p_pregunta_alumno_cod_preguntas_alumno,
                                :p_escala_hamilton_cod_escala
                                )"; 
                        $sentencia =$this->dblink->prepare($sql);
                        $sentencia->bindParam(':p_test_alumno_cod_test_alumno',$test_alumno_cod_test_alumno);
                        $sentencia->bindParam(':p_pregunta_alumno_cod_preguntas_alumno',$pregunta_alumno_cod_preguntas_alumno);
                        $sentencia->bindParam(':p_escala_hamilton_cod_escala',$escala_hamilton_cod_escala); 
                        $sentencia->execute();
                    }


                    return true; 
                  
              } catch (Exception $exc) {
                  throw $exc;
              }
        }

        public function obtenerCodAlumnoTest($id){
            try {  
                $sql="SELECT * FROM test_alumno WHERE test_cod_test= :p_id";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_id',$id);
                $sentencia->execute();                  
                $resultado=$sentencia->fetchAll();   
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }

        }
        public function obtenerCodColaboradorTest($id){
            try {  
                $sql="SELECT * FROM test_psiocologo WHERE test_cod_test= :p_id";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_id',$id);
                $sentencia->execute();                  
                $resultado=$sentencia->fetchAll();   
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }

        }
        public function obtenerTestAlumno($id){
            try {  
                $sql="SELECT pregunta_alumno_cod_preguntas_alumno,descripcion,escala_hamilton_cod_escala 
                            FROM test_alumno_pregunta 
                            INNER JOIN pregunta_alumno 
                            ON test_alumno_pregunta.pregunta_alumno_cod_preguntas_alumno = pregunta_alumno.cod_pregunta_alumno 
                        WHERE test_alumno_cod_test_alumno= :p_id";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_id',$id);
                $sentencia->execute();                  
                $resultado=$sentencia->fetchAll();   
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }

        }
        public function obtenerTestColaborador($id){
            try {  
                $sql="SELECT pregunta_psicologo_cod_pregunta_psicologo,descripcion,factor_riesgo_cod_factor_riesgo 
                FROM factor_psicologo_pregunta 
                INNER JOIN pregunta_psicologo 
                ON factor_psicologo_pregunta.pregunta_psicologo_cod_pregunta_psicologo = pregunta_psicologo.cod_pregunta_psicologo 
                WHERE test_psiocologo_cod_test_psicologo=:p_id";
                $sentencia =$this->dblink->prepare($sql); 
                $sentencia->bindParam(':p_id',$id);
                $sentencia->execute();                  
                $resultado=$sentencia->fetchAll();   
                return $resultado;
                
            } catch (Exception $exc) {
                throw $exc;
            }

        }
           // Preguntas del Test colaborador
    public function obtener_lista_preguntas_colaborador(){
        try {  
            $sql="SELECT cod_pregunta_psicologo,descripcion FROM pregunta_psicologo order by 1";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->execute();                  
            $resultado=$sentencia->fetchAll();   
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }

    }
    public function registarRespuestaTestColaborador($test_cod_test, $psicologo_cod_psicologo,$test_alumno_cod_test_alumno, $detalle){ 
        try {
            $estado='disponible';
            $sql="INSERT INTO test_psiocologo
                                 (test_cod_test,
                                 psicologo_cod_psicologo,
                                 estado,
                                 test_alumno_cod_test_alumno) 
                                 VALUES (
                                     :p_cod_test,
                                     :p_cod_psicologo,
                                     :p_estado,
                                     :p_test_alumno_cod_test_alumno )";
                $sentencia =$this->dblink->prepare($sql);
                $sentencia->bindParam(':p_cod_test',$test_cod_test);
                $sentencia->bindParam(':p_cod_psicologo',$psicologo_cod_psicologo); 
                $sentencia->bindParam(':p_estado',$estado); 
                $sentencia->bindParam(':p_test_alumno_cod_test_alumno',$test_alumno_cod_test_alumno);
                $sentencia->execute();    

                $test_psiocologo_cod_test_psicologo = $this->dblink->lastInsertId();

                for ($i=0;$i<7;$i++){
                    $pregunta_psicologo_cod_pregunta_psicologo =  $detalle['cod_pregunta_psicologo'.($i+1)];
                    $factor_riesgo_cod_factor_riesgo =  $detalle['C'.($i+1)];

                    $sql="INSERT INTO factor_psicologo_pregunta(
                        test_psiocologo_cod_test_psicologo,
                        pregunta_psicologo_cod_pregunta_psicologo,
                        factor_riesgo_cod_factor_riesgo) 
                    VALUES (:p_test_psiocologo_cod_test_psicologo,
                    :p_pregunta_psicologo_cod_pregunta_psicologo,
                            :p_factor_riesgo_cod_factor_riesgo
                            )"; 
                    $sentencia =$this->dblink->prepare($sql);
                    $sentencia->bindParam(':p_test_psiocologo_cod_test_psicologo',$test_psiocologo_cod_test_psicologo);
                    $sentencia->bindParam(':p_pregunta_psicologo_cod_pregunta_psicologo',$pregunta_psicologo_cod_pregunta_psicologo);
                    $sentencia->bindParam(':p_factor_riesgo_cod_factor_riesgo',$factor_riesgo_cod_factor_riesgo); 
                    $sentencia->execute();
                }


                return true; 
              
          } catch (Exception $exc) {
              throw $exc;
          }
    }
   
    public function obtener_busqueda_test($busqueda,$desde,$por_pag){
        try {  
            $sql="SELECT *,(case when fecha_inicio > NOW()then 'inactivo' ELSE(case when fecha_final<NOW()then 'finalizado' ELSE (case when NOW() BETWEEN fecha_inicio AND fecha_final then 'activo' ELSE 'x' END)END)END)AS estado FROM test WHERE (fecha_inicio LIKE :p_busqueda OR fecha_final LIKE :p_busqueda)LIMIT  $desde,$por_pag";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->bindParam(':p_busqueda',$busqueda); 
            $sentencia->execute();                  
            $resultado=$sentencia->fetchAll();   
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }

    }
    public function contador_test_busqueda($busqueda){
        try{
             
            $sql = "SELECT COUNT(*) as total FROM test WHERE (fecha_inicio LIKE :p_busqueda OR fecha_final LIKE :p_busqueda)";
            $sentencia =$this->dblink->prepare($sql);
            $sentencia->bindParam(':p_busqueda',$busqueda);
            $sentencia->execute();                 
            $resultado= $sentencia->fetchColumn();
            return $resultado;
        }catch (Exception $exc) {
            throw $exc;
        }                
    }
    public function obtener_estado_alumno($test_cod_test,$alumno_cod_alumno){
        try { ;
            $sql="SELECT estado FROM test_alumno WHERE test_cod_test = :p_test_cod_test and alumno_cod_alumno=:p_alumno_cod_alumno";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->bindParam(':p_test_cod_test',$test_cod_test); 
            $sentencia->bindParam(':p_alumno_cod_alumno',$alumno_cod_alumno); 
            $sentencia->execute();                  
            $resultado=$sentencia->fetchAll();   
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        } 
    }
    public function obtener_estado_psicologo($test_cod_test,$psicologo_cod_psicologo){
        try { ;
            $sql="SELECT estado FROM test_psiocologo WHERE test_cod_test = :p_test_cod_test and psicologo_cod_psicologo=:p_psicologo_cod_psicologo";
            $sentencia =$this->dblink->prepare($sql); 
            $sentencia->bindParam(':p_test_cod_test',$test_cod_test); 
            $sentencia->bindParam(':p_psicologo_cod_psicologo',$psicologo_cod_psicologo); 
            $sentencia->execute();                  
            $resultado=$sentencia->fetchAll();   
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        } 
    } 

     } 

?>