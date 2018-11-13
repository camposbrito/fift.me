<?php

class Terceiro_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_terceiros() {
        return $this->db->get_where('terceiro', array('Ativo' => 'S'))->result();
    }
   public function get_terceiro($id) {
   
        return $this->db->get_where('terceiro', array('Cod' => $id))->result();
    }

    public function listFonoaudiologosFiltros() {
        if ($this->session->userdata['adm'] == true) {
            return $this->db->get_where('terceiro', array( 'CRFA <>' => ''))->result();
        } else {
            return $this->db->get_where('terceiro', array( 'CRFA <>' => '', 'Empresa' => $this->session->userdata['Empresa_Usuario'][0]->Cod))->result();
        }
    }
    
    public function listFonoaudiologos() {
        if ($this->session->userdata['adm'] == true) {
            return $this->db->get_where('terceiro', array('Ativo' => 'S', 'CRFA <>' => ''/*, 'Cod'=> 9*/))->result();
        } else {
            return $this->db->get_where('terceiro t', array('Ativo' => 'S', 'CRFA <>' => '', 'Empresa' => $this->session->userdata['Empresa_Usuario'][0]->Cod))->result();
        } 
    }

    public function salvar() {
        $this->output->enable_profiler(FALSE);
    }

}
