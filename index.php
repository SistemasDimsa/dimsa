<?php
/**
 * index.php
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

//cargamos el archivo de configuración
require_once 'config.inc.php';

//cargamos el core
require_once BASEPATH . 'core/ErrorController.php';
require_once BASEPATH . 'core/Controller.php';

new Controller();