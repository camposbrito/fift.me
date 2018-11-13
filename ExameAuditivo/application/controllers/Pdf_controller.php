<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_controller extends CI_Controller {

    public function index($id = null) {

//generate the PDF!    
// As PDF creation takes a bit of memory, we're saving the created file in downloads/ 
//        $pdfFilePath = FCPATH . "downloads\GoBuyAndSell.pdf";
//        echo $pdfFilePath;
        
        $pdfFilePath = "the_pdf_output.pdf";
        $data['page_title'] = 'PDF'; // pass data to the view  
//        if (file_exists($pdfFilePath) == FALSE) {
//        ini_set('memory_limit', '100M');
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822));
        $this->load->model('Terceiro_model');
        $data = $this->Terceiro_model->get_terceiros();
//            _debug($data );
        $html = "<table border=1 cellspacing = 0 cellpadding = 3>";
        foreach ($data as $row) {
            $title = $row->Descricao;
            $name = $row->Senha;
            $description = $row->Ativo;
            $price = $row->Administrativo;
            $phone = $row->CRFA;
            $location = $row->Empresa;
            $added_date = $row->Gestor;
            $html .= "<tr>";
            $html .= '<td>' . $title . '</td>';
            $html .= '<td>' . $name . '</td>';
            $html .= "</tr>";
        }
            $html .= "<tr>";
            $html .= '<td><img class="centro" src="http://camposbrito.com.br/projetobley/report/OD_v1.php?Consulta=7143d7fbadfa4693b9eec507d9d37443"></td>';
            $html .= '<td><img class="centro" src="http://camposbrito.com.br/projetobley/report/OE_v1.php?Consulta=7143d7fbadfa4693b9eec507d9d37443"></td>';
            
            $html .= "</tr>";
        $html .= "</table>";
//        echo $html;
        $pdf->WriteHTML($html); // write the HTML into the PDF 
//        $pdf->Output($pdfFilePath, "D"); // save to file because we can 
                $pdf->Output();
//                redirect("/user_controller/loadReportview");
    }

}
