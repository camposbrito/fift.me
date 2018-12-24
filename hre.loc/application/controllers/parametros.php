<?php defined('BASEPATH') OR exit('No direct script access allowed');

class parametros extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "Parametros_Model" );
		$this->load->model ( "Equipamento_Model" );
		$this->load->model ( "Produto_Model" );
		$this->load->model ( "Operacao_Model" );
		
	}

	public function get() { 
		$res 				= $this->Parametros_Model->get()[0];
		$res->Equipamento 	= $this->Equipamento_Model->get($res->Equipamento_id)[0];
		$res->Produto 		= $this->Produto_Model->get($res->Produto_id)[0];
		$res->Operacao 		= $this->Operacao_Model->get($res->Operacao_id)[0];	
		echo json_encode($res);
	}

	public function salvar() { 
		$this->output->enable_profiler(true); 	
		$res 				= $this->Parametros_Model->save();
		echo $res;
		// redirect(base_url()); 
	} 

	public function index() {      
        // $bloco = $this->session->userdata('lavanderia');
        // $Dados['lavanderia'] = isset($bloco)?$bloco:$this->session->userdata('BlocoA') ; 
        // $Dados['Maquinas'] = $this->maquina->indexOtimizado();        
        // $this->output->enable_profiler(true );
		// $this->load->view('includes/header'); 
		$this->load->view('includes/includes');
		// $this->load->view('includes/menu');
		$res['Parametros'] 		= $this->Parametros_Model->get()[0];
		$res['Parametros'] 	->Equipamento 	= $this->Equipamento_Model->get($res['Parametros']->Equipamento_id)[0];
		$res['Parametros'] 	->Produto 		= $this->Produto_Model->get($res['Parametros'] ->Produto_id)[0];
		$res['Parametros'] 	->Operacao 		= $this->Operacao_Model->get($res['Parametros'] ->Operacao_id)[0];	
		$res['Equipamento'] 	= $this->Equipamento_Model->getAll();
		$res['Produto'] 		= $this->Produto_Model->getAll();
		$res['Operacao'] 		= $this->Operacao_Model->getAll();
		// echo "<pre>";
		// print_r($res);
		// echo "<pre>";
        $this->load->view('parametros', $res);
        $this->load->view('includes/footer');
    }
}