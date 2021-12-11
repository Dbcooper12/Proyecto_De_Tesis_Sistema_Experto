<?php

require_once 'configuracion.php'; 

class Conexion{
    protected $dblink;
    
    public function __construct() {
        $this->abrirConexion();
        //echo "conexión abierta";
    }
    
    public function __destruct() {
        $this->dblink = NULL;
        //echo "Conexión cerrada";
    }
    
    protected function abrirConexion(){
        //$dbopts = parse_url(getenv('DATABASE_URL'));
        
        
        
        //$servidor = "pgsql:host=".SERVIDOR_BD.";port=".PUERTO_BD.";dbname=".NOMBRE_BD.";sslmode=".SSLMODE_BD;
        $servidor = "mysql:host=".SERVIDOR_BD.";port=".PUERTO_BD.";dbname=".NOMBRE_BD;
        $usuario = USUARIO_BD;
        $clave = CLAVE_BD;
        
        try {
            $this->dblink = new PDO($servidor, $usuario, $clave);
            $this->dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dblink->exec("SET CHARACTER SET utf8");
        } catch (Exception $exc) {
           echo  $exc->getMessage();
            
        }
        
        return $this->dblink;
    }
}