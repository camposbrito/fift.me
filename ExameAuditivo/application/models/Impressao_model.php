<?php

class Impressao_model extends CI_Model {

    public function find_paciente($Consulta = null) {
        return $this->db->where('Cod', $Consulta)->get($this->tabela)->result();
    }

 

}
