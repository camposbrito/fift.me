<?php

class Funcionario_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'terceiro';
    }

    public function save() {
        $this->output->enable_profiler(false);
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Login'] = $this->input->post('Login');
        if ($this->input->post('Cod') == '') {
            $data['Senha'] = md5($this->input->post('Login'));
        }
        $data['Administrativo'] = $this->input->post('Administrativo') == 'S' ? 'S' : 'N';
        $data['Gestor'] = $this->input->post('Gestor') == 'S' ? 'S' : 'N';
        $data['Empresa'] = $this->input->post('empresa');
        $data['CRFA'] = $this->input->post('CRFA');
        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
        if ($this->input->post('Cod') == '') {
            return ($this->db->insert('terceiro', $data));
        } else {
            $this->db->where('cod', $this->input->post('Cod'));
            return $this->db->update('terceiro', $data);
        }
    }

    public function cadastrar() {
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Login'] = $this->input->post('Login');
        $data['Senha'] = md5($this->input->post('Login'));
        $data['Administrativo'] = $this->input->post('Administrativo') == 'S' ? 'S' : 'N';
        $data['Gestor'] = $this->input->post('Gestor') == 'S' ? 'S' : 'N';
        $data['CRFA'] = $this->input->post('CRFA');
        $data['Empresa'] = $this->input->post('empresa');
        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
        return ($this->db->insert('terceiro', $data));
    }

    public function atualizar() {
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Login'] = $this->input->post('Login');
        $data['Empresa'] = $this->input->post('empresa');
        $data['Administrativo'] = $this->input->post('Administrativo') == 'S' ? 'S' : 'N';
        $data['Gestor'] = $this->input->post('Gestor') == 'S' ? 'S' : 'N';
        $data['CRFA'] = $this->input->post('CRFA');
        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
        $this->db->where('cod', $this->input->post('Cod'));
        return $this->db->update('terceiro', $data);
    }

    public function listAll() {

        //return $this->db->get($this->tabela)->result();
        return $this
                        ->db
                        ->select('t.*, e.Descricao EmpresaDescricao ')
                        ->join('empresa e', 'e.cod =  t.Empresa', 'LEFT')
//                ->order_by('c.Data', 'DESC')
                        ->get_where($this->tabela . ' t')
                        ->result();
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

}
