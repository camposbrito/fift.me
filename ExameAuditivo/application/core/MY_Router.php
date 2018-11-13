<?php

class MY_Router extends CI_Router {

    function __construct() {
        parent::__construct();
    }

    function _validate_request($segments) {
        // Comprueba que el controlador no existe
        if (!file_exists(APPPATH . 'controllers/' . $segments[0] . '.php')) {
            $segments = array("page", "load", $segments[0]);
        }
        return parent::_validate_request($segments);
    }

}

