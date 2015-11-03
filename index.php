<?php
/**
 * index.php
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 */

session_start();

//configuramos la zona horaria
date_default_timezone_set('America/Mexico_City');

//cargamos el archivo de configuración
require_once 'config.inc.php';

//cargamos el core
require_once BASEPATH . 'core' . DIRECTORY_SEPARATOR . 'ErrorController.php';
require_once BASEPATH . 'core' . DIRECTORY_SEPARATOR . 'Controller.php';

new Controller();