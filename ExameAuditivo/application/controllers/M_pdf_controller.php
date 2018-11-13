<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_pdf_controller extends CI_Controller {

    public function index($Consulta) { // As PDF creation takes a bit of memory, we're saving the created file in downloads/ 
        // ...
		// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
		$pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
		$data['page_title'] = 'Hello world'; // pass data to the view
		 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="😉" draggable="false" class="emoji">
			$html = $this->load->view('pdf_report', $data, true); // render the view into HTML
			 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="😉" draggable="false" class="emoji">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect("/downloads/reports/$filename.pdf");
		// ...
    }

}
  