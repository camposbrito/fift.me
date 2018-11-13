<?php

class Paciente_model extends CI_Model {

    public function save() {
        /*
          if ($this->input->post('Chave') > 0) {
          return ($this->db->insert('terceiro', $data));
          } else {
          $this->db->where('cod', $this->input->post('Cod'));
          return $this->db->update('terceiro', $data);
          }
         */
        $this->output->enable_profiler(FALSE);
    }

    public function record_count() {
        return $this->get_pacientes();
    }

    public function get_pacientes($limiting = False, $limit = null, $start = null) {
        $this->db->select('p.Cod, p.Descricao, p.DataNascimento, max(c.data) as UltimaConsulta, 
                            (
                              SELECT descricao 
                              FROM terceiro t 
                              INNER JOIN consulta c1 ON c1.terceiro = t.cod 
                              WHERE c1.cod = c.Cod
                            ) AS Terceiro,
                            (
                              SELECT descricao 
                              FROM terceiro t 
                              INNER JOIN consulta c1 ON c1.terceiro1 = t.cod 
                              WHERE c1.cod = c.Cod
                            ) AS Terceiro1');
        $this->db->distinct();
        
        $enter = FALSE;
         if ($this->session->userdata['paciente'] != '') {
            $this->db->or_like('p.Descricao', $this->session->userdata['paciente'], 'left');
            $enter = TRUE;
        }
        if ($this->session->userdata['dataNascimento'] != '') {
            $this->db->where('DataNascimento', dataUS($this->session->userdata['dataNascimento']));
            $enter = TRUE;
        }
        if ($this->session->userdata['periodoInicial'] != '') {
            $this->db->where('Data >=', dataUS($this->session->userdata['periodoInicial']));
            $enter = TRUE;
        }
        if ($this->session->userdata['periodoFinal'] != '') {
            $this->db->where('Data <=', dataUS($this->session->userdata['periodoFinal']));
            $enter = TRUE;
        }
        if ($this->session->userdata['profissional'] != '') {
            $this->db->group_start();
        }
        if ($this->session->userdata['profissional'] != '') {
            $this->db->where('terceiro', $this->session->userdata['profissional']);
            $enter = TRUE;
        }
        if ($this->session->userdata['profissional'] != '') {
            $this->db->or_where('terceiro1', $this->session->userdata['profissional']);
            $enter = TRUE;
        }
        if ($this->session->userdata['profissional'] != ''){
            $this->db->group_end();
        }
        if ($this->session->userdata['Empresa'] != '') {
            $this->db->like('p.Empresa', $this->session->userdata['Empresa']);
            $enter = TRUE;
        }
        if ($this->session->userdata['adm'] != true){
            $this->db->join('terceiro t', 't.cod = '.$this->session->userdata['Cod'].' and t.Empresa = p.Empresa_Usuario', 'INNER');
        }
        $this->db->join('consulta c', 'c.Paciente = p.Cod', 'LEFT');
        $this->db->group_by('p.Cod, p.Descricao, p.DataNascimento'); 
        $this->db->order_by('c.data', 'DESC');
        $this->db->order_by('p.Descricao', 'ASC');
        if ($limiting) {
            $this->db->limit($limit, $start);
        }
        $this->db->from('paciente p');
            
        if ($limiting) {
            $this->output->enable_profiler(false);
            return $this->db->get()->result();
        } else {
            return $this->db->count_all_results();
        }
        
    }

    function get_paciente($Paciente) {
//        $this->output->enable_profiler(true);
        return $this->db->get_where('paciente', array('cod' => $Paciente))->result();
    }

}
