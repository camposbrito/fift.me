<?php

class Login_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model', 'usuario');
    }

    public function Logar() {
        $Login = $this->input->post('login');
        $Senha = md5($this->input->post('senha'));
 
//        $this->output->enable_profiler(true);
        return $this->usuario->autenticar($Login, $Senha);
    }

    public function TrocaSenha() {
        $usuario = $this->usuario->find($this->session->userdata('login'));
        if (md5($this->input->post('CurrPass')) == $usuario[0]->senha) {
            if (md5($this->input->post('NewPass')) == md5($this->input->post('NewPassRepeat'))) {
                $this->usuario->TrocarSenha($usuario, md5($this->input->post('NewPass')));
                $mensagem = 'Senha alterada com sucesso';
            } else {
                $mensagem = 'A senhas devem ser iguais';
            }
        } else {
            $mensagem = 'A senha atual não confere';
        }
        $this->Log_model->save('Troca de senha: '.$mensagem );    
        return $mensagem;
    }

}
