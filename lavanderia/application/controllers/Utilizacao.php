<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizacao extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('auth');
            $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
            
            $this->load->model('Fechamento_model', 'fechamento');     
               
//            $this->load->library('../controllers/Login');
            $this->load->library('Export');
            $this->load->helper('common_helper');
        }

	public function index($apto = null) 
	{                    
            $apartamento = $this->input->post('apto');
            $fechamentos = $this->fechamento->getUltimoFechamento();
            $this->output->enable_profiler(false);
            $bloco = $this->input->post('bloco');
            $Dados['lavanderia'] = isset($bloco)?$bloco: $this->session->userdata('lavanderia') ;
            $this->session->set_userdata($Dados);     
            $this->load->model('Utilizacao_model', 'utilizacao');     
            $DataI  = $this->input->post('DataI');
            $DataF = $this->input->post('DataF');
            $date = date_create(date("d-m-Y"));
            $Data = date('Y-m-d');
            $Dia = date('d')-1;
            $registro =  $this->input->post('registro');
            $excel = $this->input->post('excel');
            $Dados['DataI'] = (isset($DataI) ? date_format(date_create(dataUS($DataI)), "d/m/Y") : date('d/m/Y', strtotime( $fechamentos[0]->dataini )));
            $Dados['DataF'] = (isset($DataF) ? date_format(date_create(dataUS( $DataF)), "d/m/Y") : date('d/m/Y', strtotime( $fechamentos[0]->datafin )));
//            $Dados['DataI'] = (isset($DataI) ? date_format(date_create(dataUS($DataI)), "d/m/Y") : date('d/m/Y', strtotime($Data . ' - '.$Dia.' days')));;;
//            $Dados['DataF'] = (isset($DataF) ? date_format(date_create(dataUS( $DataF)), "d/m/Y") : date_format($date, "d/m/Y"));;
            $Dados['ref'] = (isset($ref)? date_format(date_create(dataUS('01/'.$ref)),"m/Y") : date_format($date,"m/Y"));
            $Dados['apto'] = (isset($apartamento))? $apartamento: $apto;
            $Dados['registro'] = $registro;
            $Dados['excel'] = $excel;
           
            if ($excel == 1)
            {                
                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Utilização ref.'. date_format(date_create(dataUS('01/'.$Dados['ref'])),"Y-m") );
                $i = 0;
                if ($registro==1){
                    $this->excel->getActiveSheet()->setCellValue('A1', 'Hora');
                    $this->excel->getActiveSheet()->setCellValue('B1', 'Hora');
                    $this->excel->getActiveSheet()->setCellValue('C1', 'Apto');
                    $this->excel->getActiveSheet()->setCellValue('D1', 'Máquina');
                    $this->excel->getActiveSheet()->setCellValue('E1', 'Tempo (min)');
                    $this->excel->getActiveSheet()->setCellValue('F1', 'Preço');
                    $this->excel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
                    $i = 1;
                 }                                  
                $apto = -1;
                $total = 0;
                $totalGeral = 0;
                foreach ($this->utilizacao->index($Dados['apto'], $Dados['DataI'], $Dados['DataF']) as $value) {
                    $imprimeTotal = $value->apto <> $apto && $apto >-1 ;                                       
                    if ($imprimeTotal){
                        $i++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0,$i, 'Total.: '.$apto);
                        $this->excel->getActiveSheet()->getStyleByColumnAndRow(0,$i)->getFont()->setBold(true);
                        $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(5,$i, (float)$total,PHPExcel_Cell_DataType::TYPE_NUMERIC); 
                        $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
                        $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getFont()->setBold(true);
                        $total = 0;                        
                        if ($registro == 1) {
                            $i++;
                        }
                    }
                    if ($registro==1){
                        $i++;   
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0,$i, dataHoraBR_($value->data_inicio));
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1,$i, dataHoraBR_($value->data_fim));
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2,$i, $value->apto);
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3,$i, $value->maquina);
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4,$i, $value->tempo);                                        
                        $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(5,$i, (float)$value->preco,PHPExcel_Cell_DataType::TYPE_NUMERIC); 
                        $this->excel->getActiveSheet()->getStyleByColumnAndRow(6,$i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
                    }                    
                    $apto = $value->apto;
                    $total += $value->preco;
                    $totalGeral += $value->preco;
                }
                $i++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0,$i, 'Total.: '.$apto);
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(0,$i)->getFont()->setBold(true);
                $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(5,$i, (float)$total,PHPExcel_Cell_DataType::TYPE_NUMERIC); 
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getFont()->setBold(true);
                //Total Geral
                $i++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0,$i, 'Total Geral.:');
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(0,$i)->getFont()->setBold(true);
                $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(5,$i, (float)$totalGeral,PHPExcel_Cell_DataType::TYPE_NUMERIC); 
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(5,$i)->getFont()->setBold(true);
                $filename='Utilização ref.'.$this->input->post('ref').'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
            }
            else{
                $Dados['Log'] = $this->utilizacao->index($Dados['apto'], $Dados['DataI'], $Dados['DataF']);
                $this->load->view('includes/header');
                $this->load->view('includes/menu');
                $this->load->view('utilizacao', $Dados);
                $this->load->view('includes/footer');
            }
	}
}
