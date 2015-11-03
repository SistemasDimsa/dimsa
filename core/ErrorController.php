<?php
/**
 * ErrorController.php
 * Controlador para el manejo de errores
 * @copyright (c) 2015, Soft Tech, Inc.
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 * @package core
 */

class ErrorController {
    
    public static $_titulo;
    public static $_error;
    
    public static function mostrarError($tipo){
        switch($tipo){
            case 1:
            case 2:
            case 3:
                self::$_titulo = 'Error 404';
                self::$_error = 'Página no encontrada. El recurso al que estás '
                        . 'tratando de accesar no existe. Intentalo más tarde';
                break;
            case 4:
                self::$_titulo = 'Error 403';
                self::$_error = 'Acceso denegado o prohibido. Por favor inicia '
                        . 'sesión antes de accesar a la página solicitada. Si el'
                        . ' problema aún persiste, puede que no tengas los '
                        . 'permisos necesarios. Contacta al administrador del '
                        . 'sistema';
                break;
        }
        
        require_once BASEPATH . 'core/views/error.phtml';
        exit();
    }
}