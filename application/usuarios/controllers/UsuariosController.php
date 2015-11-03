<?php
/**
 * UsuariosController.php
 * Controlador principal del módulo de usuarios
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 * @package usuarios
 */

class UsuariosController extends Controller{
    
    public function __construct() {
        $this->_modulo = 'usuarios';
        $this->_modelo = 'UsuarioDao';
    }
    
    public function login(){
        $this->_vista = 'login';
        $this->validarVista();
        $this->cargarVista();
    }
}
