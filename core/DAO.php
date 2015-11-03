<?php
/**
 * DAO.php
 * Clase para conexiones a base de datos por medio del patrón de diseño Singleton
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @package core
 */

class DAO {
    
    private $_dbh;
    private $_usuario = 'root';
    private $_contrasena = '';
    private $_dsn = 'mysql:host=localhost; dbname=dimsa_database';
    private static $_instancia = NULL;
    
    public static function obtenerInstancia(){
        if (!(self::$_instancia instanceof DAO)){
            self::$_instancia = new self();
        }
        
        return self::$_instancia;
    }
    
    private function __construct(){
        
    }
}
