<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
class Pages_Controller extends CI_Controller { 
 
  public function index($page = 'home', $consulta = 0)
{
  
// Se o arquivo correspondente não existir no diretório, erro
//    if ( ! file_exists('application/views/report/' . $page . '.php'))
//    {
//        show_404();
//    }
// 
    // Título da página é o próprio nome com a primeira letra em maiúsculo
    $data['consulta'] = $consulta;
 
    // "Monta" a apresentação usando as views
//    $this->load->view('templates/header', $data);
    //		include_once '../';
//		include_once '../';
    $this->load->view('report/files/_db/_autoload.php');
    $this->load->view('report/files/_includes/function.php');
    $this->load->view('report/files/' . $page, $data);
//    $this->load->view('templates/footer', $data);
}
 
}