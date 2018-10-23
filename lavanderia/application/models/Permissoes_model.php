<?php

class Permissoes_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'permissoes';
    }

    public function save() {
        $data['id_usuario'] = $this->input->post('id_usuario');
        $this->db->delete($this->tabela, array('id_usuario' => $data['id_usuario']));
        foreach ($this->input->post('permissao') as $key => $value) {
            $data['id_metodo'] = $key;
            $this->db->insert($this->tabela, $data);
        }
    }

    public function Ativos() {
        return $this->db
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index($cod = NULL) {
        return $this
                        ->db
                        ->select("m.id")
                        ->select("m.classe")
                        ->select("m.metodo")
                        ->select("m.identificacao")
                        ->select(" m.privado")
                        ->select("CASE when p.id_metodo > 0 THEN '1' ELSE '0' END TemPermissao")
                        ->join('metodos m', '1=1')
                        ->join($this->tabela . ' p', 'p.id_usuario = u.id and p.id_metodo = m.id', 'left')
                        ->order_by('m.identificacao')
                        ->get_where('usuarios u', 'u.id = ' . $cod)
                        ->result();
    }

    public function get($id_usuario, $id_metodo) {
        return $this->db->get_where($this->tabela, array('id_metodo' => $id_metodo, 'id_usuario' => $id_usuario))->result();
    }

}
