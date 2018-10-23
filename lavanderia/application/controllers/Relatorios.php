<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Relatorio_model', 'utilizacao');
        $this->load->model('Parametros_model', 'parametros');
        $this->load->library('Export');
        $this->load->helper('common_helper');
    }

    public function index() {
        $tag = $this->input->post('tag');
        $ref = $this->input->post('ref');              
        $date = date_create(date("d-m-Y"));
        foreach ($this->parametros->index() as $param) {
            $Dados[$param->parametro] = $param->valor;
        }
        $excel = $this->input->post('excel');
        $Dados['ref'] = (isset($ref) ? date_format(date_create(dataUS('01/' . $ref)), "m/Y") : date_format($date, "m/Y"));
   
        $Dados['tag'] = $tag;
        $Dados['excel'] = $excel;

        if ($excel == 1) {
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Utilização ref.' . date_format(date_create(dataUS('01/' . $Dados['ref'])), "Y-m"));
            $i = 0;

            $this->excel->getActiveSheet()->setCellValue('A1', 'Hora');
            $this->excel->getActiveSheet()->setCellValue('B1', 'Apto');
            $this->excel->getActiveSheet()->setCellValue('C1', 'Máquina');
            $this->excel->getActiveSheet()->setCellValue('D1', 'Tempo (min)');
            $this->excel->getActiveSheet()->setCellValue('E1', 'Preço');
            $this->excel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
            $i = 1;

            $apto = -1;
            $total = 0;
            $totalGeral = 0;
            foreach ($this->utilizacao->index($Dados['apto'], $Dados['ref']) as $value) {
                $imprimeTotal = $value->apto <> $apto && $apto > -1;
                if ($imprimeTotal) {
                    $i++;
                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, 'Total.: ' . $apto);
                    $this->excel->getActiveSheet()->getStyleByColumnAndRow(0, $i)->getFont()->setBold(true);
                    $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(4, $i, (float) $total, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
                    $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getFont()->setBold(true);
                    $total = 0;
                    $i++;
                }

                $i++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, dataHoraBR_($value->data_inicio));
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $i, $value->apto);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $i, $value->maquina);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $i, $value->tempo);
                $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(4, $i, (float) $value->preco, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getNumberFormat()->setFormatCode('R$ #,##0.00');

                $apto = $value->apto;
                $total += $value->preco;
                $totalGeral += $value->preco;
            }
            $i++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, 'Total.: ' . $apto);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(0, $i)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(4, $i, (float) $total, PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getFont()->setBold(true);
            //Total Geral
            $i++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, 'Total Geral.:');
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(0, $i)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->setCellValueExplicitByColumnAndRow(4, $i, (float) $totalGeral, PHPExcel_Cell_DataType::TYPE_NUMERIC);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getNumberFormat()->setFormatCode('R$ #,##0.00');
            $this->excel->getActiveSheet()->getStyleByColumnAndRow(4, $i)->getFont()->setBold(true);
            $filename = 'Utilização ref.' . $this->input->post('ref') . '.xls'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
        } else {
            $Dados['Log'] = $this->utilizacao->index($Dados['tag'], $Dados['ref']);
            $this->load->view('includes/header');
            $this->load->view('includes/menu');
            $this->load->view('relatorios', $Dados);
            $this->load->view('includes/footer');
        }
    }

}
