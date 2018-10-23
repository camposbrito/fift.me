<?php

class Contato_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'sugestao';
    }

    public function save() {
        $data['nome'] = $this->input->post('nome');
        $data['apto'] = $this->input->post('apto');
        $data['email'] = $this->input->post('email');
        $data['mensagem'] = $this->input->post('mensagem');
        $data['data'] = date('Y-m-d H:i:s', now());
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        return ($this->db->insert($this->tabela, $data));
    }

    public function Ativos() {
        return $this->LavanderiaA
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index() {
        return $this->db->order_by('data', 'desc')->get($this->tabela)->result();
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

}
