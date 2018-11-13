<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_pdf_pdf_controller extends CI_Controller {

    public function index($id) { 
    
    // As PDF creation takes a bit of memory, we're saving the created file in downloads/ 
//        this data will be passed on to the view
//        $this->output->enable_profiler(true);
//        $data['the_content'] = 'mPDF and CodeIgniter are cool!';
//        $data['tecnicasutilizadas_has_consulta']   = $this->tecnicasutilizadas_has_consulta->get_consulta_tecnicasutilizadas($id);
//        $data['tecnicasutilizadas']                = $this->tecnicasutilizadas_has_consulta->get_tecnicasutilizadas();
////        $data['terceiros']                         = $this->terceiro->listFonoaudiologos();
//        $data['tiposexame']                        = $this->tipoExame->listActive();
//        $data['classificacoes']                    = $this->classificacao->listActive();
        $data['consulta']                           = $this->consulta->get_consulta($id);
        $data['paciente']                           = $this->paciente->get_paciente($data['consulta'][0]->Paciente );
        $data['Consulta_has_Audiometrico']          = $this->Consulta_Audiometrico->getByConsulta($data['consulta'][0]->Cod);
        $data['equipamento']                        = $this->equipamento->find($data['Consulta_has_Audiometrico'][0]->Equipamento );
        //load the view, pass the variable and do not show it but "save" the output into $html variable
//        _debug($data);
        ini_set('memory_limit','32M');
        $html = $this->load->view('pdf_output', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = $data['consulta'][0]->PacienteNome.".pdf";

        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $style = file_get_contents(base_url()."assets/css/relatorios.css");
        
//        $pdf->WriteHTML($style,1);
//        echo $html;;
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, "D");;
//        $pdf->Output();
    }

}
