<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_pdf {

    function m_pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded..');
    }

    function load($param = NULL) {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';

        if ($param == NULL) {
            $param = '"en-GB-x","A4","","",1,1,1,1,1,1,1,"L"';
        }
//        echo $param;
        return new mPDF($param);
    }

}
