<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function audiometria($id, $pdf) {
        $data['consulta'] = $this->consulta->get_consulta($id);
        $data['paciente'] = $this->paciente->get_paciente($data['consulta'][0]->Paciente);
        $data['Consulta_has_Audiometrico'] = $this->Consulta_Audiometrico->getByConsulta($data['consulta'][0]->Cod);
        $data['equipamento'] = $this->equipamento->find($data['Consulta_has_Audiometrico'][0]->Equipamento);
        $data['LDF'] = $this->ldf_lrf->get_ldf($id);
        $data['LRF'] = $this->ldf_lrf->get_lrf($id);
        $data['IPRF'] = $this->irf->get_iprf($id);
        $data['Weber'] = $this->weber->getWeber($id);
        
        $data['Parecer'] = $this->parecer->getParecer($id);        
        $data['mascaramento'] = $this->mascaramento->get_mascaramento($id);
        $data['terceiro'] = $this->terceiro->get_terceiro($data['consulta'][0]->Terceiro );;
        $data['terceiro2'] = $this->terceiro->get_terceiro($data['consulta'][0]->Terceiro2 ); 
        
        $data['tecnicasutilizadas_has_consulta']   = $this->tecnicasutilizadas_has_consulta->get_consulta_tecnicasutilizadas($id);
        $data['MonitoramentoAudiologico'] = $this->monitoramento->Find($data['Parecer'][0]->MonitoramentoAudiologico); 
        
        $data['classificacao'] = $this->classificacao->get_classificacao_report($id);
//          $this->output->enable_profiler(true);
            
//            _debug($data);
        $html = $this->load->view('impressao/Audiometria_view', $data, true);
        if ($pdf == 'pdf') {
            ini_set('memory_limit', '32M');
            $this->load->library('m_pdf');
            $style = file_get_contents(base_url() . "assets/css/relatorios.css");
            $pdfFilePath = $data['consulta'][0]->PacienteNome . ".pdf";
            $pdf = $this->m_pdf->load();
            $pdf->WriteHTML($style, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            $pdf->Output();
        } else {
          
            echo $html;
        }
    }

    public function index() {
        $this->load->helper('common');
        $this->load->view('index');
    }

}
