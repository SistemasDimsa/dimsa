<?php
/**
 * Controller.php
 * Controlador principal
 * @copyright (c) 2015, Soft Tech, Inc.
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 * @package core
 */

class Controller {
    
    protected $_modulo;
    protected $_controlador;
    protected $_modelo;
    protected $_accion;
    protected $_vista;
    protected $_datos = array();
    
    public function __construct(){
        //validamos si existe sesión
        if (isset($_SESSION['usuario'])){
            //validamos si existe módulo y acción
            if (isset($_GET['modulo'])){
                $modulo = filter_input(INPUT_GET, 'modulo', FILTER_SANITIZE_STRING);
                if (isset($_GET['accion'])){
                    $accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_STRING);
                }
                else{
                    $accion = $modulo;
                }
            }
            else{
                $modulo = $accion = 'inicio';
            }
        }
        else{
            $this->_modulo = 'usuarios';
            $this->_controlador = 'UsuariosController';
            $this->_accion = 'login';
            $this->_vista = 'login';
            $this->_modelo = 'UsuarioDao';
        }
        
        //cargamos el controlador, vista y modelo solicitados
        $this->validarControlador();
        $this->cargarControlador();
        $obj = new $this->_controlador;
        $this->validarAccion($obj);
        $accion = $this->accionToString();
        $obj->$accion();
    }
    
    protected function accionToString(){
        return (string) $this->_accion;
    }


    protected function validarControlador(){
        $controlador = BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR .
                $this->_controlador . '.php';
        if (!file_exists($controlador)){
            ErrorController::mostrarError(1);
        }
    }
    
    protected function cargarControlador(){
        $controlador = BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR .
                $this->_controlador . '.php';
        require_once $controlador;
    }
    
    protected function validarAccion($obj){
        if (!method_exists($obj, $this->accionToString())){
            ErrorController::mostrarError(2);
        }
    }
    
    protected function validarModelo(){
        $modelo =  BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR .
                $this->_modelo . '.php';
        
        if (!file_exists($modelo)){
            ErrorController::mostrarError(1);
        }
    }
    
    protected function cargarModelo(){
        $modelo =  BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR .
                $this->_modelo . '.php';
        
        require_once $modelo;
    }
    
    protected function validarVista(){
        $vista = BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR .
                $this->_vista . '.phtml';
        if (!file_exists($vista)){
            ErrorController::mostrarError(3);
        }
    }
    
    protected function cargarVista(){
        $vista = BASEPATH . 'application' . DIRECTORY_SEPARATOR . $this->_modulo . 
                DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR .
                $this->_vista . '.phtml';
        
        require_once $vista;
    }
}