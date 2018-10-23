<?php

class Usuarios_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'usuarios';
    }
 
    public function save() {
        if ($this->input->post('operacao') == 'inserir') {
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['login'] = $this->input->post('login');
            $data['ativo'] = 0;
            $data['senha'] = md5($this->input->post('senha'));
            $this->Log_model->save('Criação de usuário: ' .$this->input->post('login'). '(' .$this->input->post('nome').')' );    
            $this->db->insert($this->tabela, $data);
        } elseif ($this->input->post('operacao') == 'alterar') {
            $habilitados = $this->input->post('habilitado');
            foreach ($this->input->post('usuario') as $key => $value) {
                $ativo = isset($habilitados[$key]) ? 1 : 0;
                ($this->db->where(array('id' => $key))->where('ativo <> ' . $ativo)->update($this->tabela, array('ativo' => $ativo)));
            }
        }
    }

//    public function Ativos() {
//        return $this->db
//                        ->select("COUNT(1) Qtde")
//                        ->get_where('apto a', "a.habilitado = '1'")
//                        ->result();
//    }

    public function index($Cod = null, $ref = null) {
        return $this->db
                    ->order_by('nome')
                    ->get($this->tabela)
                    ->result();
    }
//
//    public function getTotalizador() {
//        return $this->LavanderiaA
//                        ->select('a.nome apto')
//                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
//                        ->join('apto a', 'a.id = l.apto_id')
//                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format(now(),'%Y-%m')")
//                        ->order_by('preco')
//                        ->order_by('(a.nome * 1)')
//                        ->order_by('l.data_inicio')
//                        ->group_by('a.nome')
//                        ->get($this->tabela . ' l')
//                        ->result();
//    }
//
    public function get($Cod = null) {
        return $this->db
                        ->where('id', $Cod)
                        ->get($this->tabela)
                        ->result();
    }
     public function find($login = null) {
        return $this->db->where('login', $login)->get($this->tabela)->result();
    }
       public function autenticar($Login = null, $Senha  = null) {
        $this->db->where('senha', $Senha);
        $this->db->where('login', $Login);
        $this->db->where('ativo', 1);   
       //$this->output->enable_profiler(true );
        return $this->db->get($this->tabela)->result();
        
    }    
    public function TrocarSenha($Login = null, $Senha  = null) {
        $data['senha'] = $Senha;
        $this->db->where(array('login' => $Login[0]->login))->update($this->tabela, $data); 
    }
}
