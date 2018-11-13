<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
 
    public function index() {
        verificar_sessao($this->session);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $Dados['Stats'] = $this->dashboard->obter_estatisticas();
        foreach ($this->terceiro->listFonoaudiologos() as $fono){           
            $Dados['consultas_por_data'][$fono->Cod] = $this->dashboard->obter_consultas_por_data($fono->Cod);                        
            $Dados['consultas_por_data'][$fono->Cod]['nome'] = $fono->Descricao;
//            $Dados['consultas_por_data1'][$fono->Cod] = $this->dashboard->obter_consultas_por_data1($fono->Cod);                        
//            $Dados['consultas_por_data1'][$fono->Cod]['nome'] = $fono->Descricao;
//            $Dados['consultas_por_data'][$fono->Cod] = array_merge_recursive($Dados['consultas_por_data0'][$fono->Cod], $Dados['consultas_por_data1'][$fono->Cod]);
//            echo "<pre>";
//            var_dump($Dados['consultas_por_data0'][$fono->Cod]);
//            var_dump($Dados['consultas_por_data'][$fono->Cod]['nome']);
//            $terceiro1 = array();
//            $terceiro2 = array();
//            array_map(function($element){return $element['last_name'];}, $a);
//            $terceiro1 = array_columns($Dados['consultas_por_data0'][$fono->Cod], 'Consultas', 'Data');
//            $terceiro2 = array_column($Dados['consultas_por_data0'][$fono->Cod], 'Consultas', 'Data');
//           var_dump($terceiro1);
//             array_walk_recursive($terceiro1, function($item, $key) use (&$final){
//              $final[$key] =  isset($final[$key]) ?  $item + $final[$key] : $item;
//            });
//            array_walk_recursive($terceiro2, function($item, $key) use (&$final){
//              $final[$key] =  isset($final[$key]) ?  $item + $final[$key] : $item;
//            });
//
//            var_dump($final);
//            echo "</pre>";
        }                
        
        $Dados['consultas_total_funcionario'] = $this->dashboard->obter_consultas_total_funcionario();        
        $Dados['consultas_total_funcionario1'] = $this->dashboard->obter_consultas_total_funcionario('1');        
        $Dados['consultas_total_invalidas'] = $this->dashboard->obter_consultas_total_invalidas();
        $Dados['consultas_total_fechadas'] = $this->dashboard->obter_consultas_total_fechadas();
        $Dados['consultas_total_abertas'] = $this->dashboard->obter_consultas_total_abertas();
         
//        $this->output->enable_profiler($this->session->userdata['adm'] == true);
        $this->load->view('Dashboard', $Dados);
        $this->load->view('includes/footer');
    }
  
    public function login($dados = null) {
        $this->load->view('includes/header');
        $this->load->view('Login', $dados);
    }

    public function logar() {
        $Login = $this->input->post('login');
        $Senha = md5($this->input->post('senha'));
        $this->output->enable_profiler(false);
        $this->db->where('senha', $Senha);
        $this->db->where('login', $Login);
        $this->db->where('Ativo', 'S');

        $data['usuario'] = $this->db->get('terceiro')->result();
        if (count($data['usuario']) == 1) {
            $Dados['Nome'] = $data['usuario'][0]->Descricao;
            $Dados['Cod'] = $data['usuario'][0]->Cod;
            $Dados['Login'] = strtolower($data['usuario'][0]->Login);
            $Dados['logado'] = True;
            $Dados['adm'] = $data['usuario'][0]->Administrativo == 'S' ? TRUE : FALSE;
            $Dados['gestor'] = $data['usuario'][0]->Gestor == 'S' ? TRUE : FALSE;
            $Dados['Empresa_Usuario'] = $this->Empresas->find($data['usuario'][0]->Empresa);            
            $Dados['Empresa'] = '';
            $Dados['paciente'] = '';
            $Dados['dataNascimento'] = '';
            $Dados['periodoInicial'] ='';
            $Dados['periodoFinal'] = '';
            $Dados['profissional'] = '';
          
            $this->session->set_userdata($Dados);
            redirect('');
        } else {
            $data['erro'] = 'Verifique usuário e/ou senha.';
            $this->login($data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('Dashboard/Login');
    }

}
