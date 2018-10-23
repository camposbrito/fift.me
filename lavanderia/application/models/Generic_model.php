<?php

class Generic_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->output->enable_profiler($this->session->userdata('logged') && ENVIRONMENT == 'development');
        if (($this->session->userdata('logged'))  && ($this->session->userdata('lavanderia') == ''))
        {
            $this->session->sess_destroy();
        } 
        else if ($this->session->userdata('logged')) {         
            $lavanderia = $this->session->userdata('lavanderia');   
            $this->dBLavanderia = $this->load->database($lavanderia, TRUE);
            $connected = $this->dBLavanderia->initialize();
            $Dados['online'] = ($connected == 1?true:false);
            
            // $this->dBLavanderia = $this->load->database('B', TRUE);
            // $connected = $this->dBLavanderia->initialize();
            // $Dados['online']['B'] = ($connected == 1?true:false);

            $this->session->set_userdata($Dados);
            if (!$connected) 
            {
                $this->session->set_flashdata('msg', "Lavanderia Bloco ".$lavanderia.": Offline.");
                $this->dBLavanderia = $this->load->database('default', TRUE);

            }
            else {
                $this->session->set_flashdata('msg', "Lavanderia Bloco ".$lavanderia.": Online.");
            }
        } else {
            $this->dBLavanderia = $this->load->database('default', TRUE);
        }
    }

}
