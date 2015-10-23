<?php
/**
 * Layout.php
 * Clase para el manejo del layout
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 * @package core
 */

class Layout {
    
    public function header(){
        require_once BASEPATH . 'core' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'header.phtml';
    }
    
    public function footer(){
        require_once BASEPATH . 'core' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'footer.phtml';
    }
}

$layout = new Layout();
$layout->header();