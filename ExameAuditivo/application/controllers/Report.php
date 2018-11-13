<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

//    public function index($Consulta = null) {
//        $this->output->enable_profiler(FALSE);
//    }

    public function audiometria($Consulta = null) {
        $this->output->enable_profiler(FALSE);


        $this->db->select("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2, t1.CRFA as CRFA1, t2.CRFA as CRFA2 ");
        $this->db->from("consulta c");
        $this->db->join('terceiro t1', 't1.Cod = c.terceiro', 'left');
        $this->db->join('terceiro t2', 't2.Cod = c.terceiro1', 'left');

        $dados['rsC'] = json_decode(json_encode($this->db->get_where('', array('MD5(c.Cod)' => $Consulta))->result()), true);
//        print_r($dados);
//        @$Paciente = new obj('paciente p');
//        $dados['rsP'] = @$Paciente->buscarByCondicao("Cod=" . @$rsC[0]['Paciente']);
//
//        @$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
//        $dados['interval'] = @$date->diff(new DateTime(date("Y/m/d"))); // data definida
//
//        @$Consulta_has_Audiometrico = new obj('consulta_has_exameaudiometrico');
//        $dados['rsCha'] = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
//
//        @$AudiometriaCampoLivre = new obj('audiometriacampolivre');
//        $dados['rsAud'] = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'", true);
//
//
//        @$Equipamento = new obj('equipamento e');
//        $dados['rsE'] = @$Equipamento->buscarByCondicao("Cod=0" . (@$rsCha[0]['Equipamento'] > 0 ? @$rsCha[0]['Equipamento'] : @$rsAud[0]['Equipamento']));

        $dados['cod'] = $Consulta;
        $this->load->view('report/audiometria', $dados);
    }

    public function index() {
        $this->load->helper('common');
        $this->load->view('index');
    }

}
