<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function getHead() {
    require_once(APPPATH . "views/common/head.php");
}

function getScripts() {
    require_once(APPPATH . "views/common/scripts.php");
}

function getFooter() {
    require_once(APPPATH . "views/common/footer.php");
}

function verificar_sessao($sessionData) {
//    _debug($sessionData);
//
    if (isset($sessionData->userdata['logado'])) {
        if (($sessionData->userdata['logado'] == false)) {
            redirect('Dashboard/login');
        }
    } else {
        redirect('Dashboard/login');
    }
}

function _debug($var) {
    echo "<pre>";
    print_R($var);
    echo "</pre>";
}
function _debugConsole($var) {
    echo "<script>";
    echo "console.log('$var')";
    echo "</script>";
}
function habilitado($var) {
    return $var == 1 ? 'checked=checked' : '';
}  
function dataUS_($vdata) {
    
    if (!empty($vdata)) {
        $datestring = '%Y-%m-%d';
        echo mdate($datestring, $vdata);
        return date_format($vdata, "Y-m-d");
    } else {
        return false;
    }
}
function _debbuging($var = null){        
    if (!isset($var))
        die (' Passar como parametro:  array_keys(get_defined_vars())'); 
    foreach ($var as $value) {
        if ($value != "var") {
            var_dump( $$value );
        }
    }
}
function formataMoeda2($valor){
    return 'R$ '.formataNumero($valor, 2);  
} 
function formataMoeda($valor){
    setlocale(LC_MONETARY, 'pt_BR');
    return money_format('%(#10n', $valor) ;  
} 
function formataNumero($valor, $precisao=0){     
    return number_format($valor,$precisao,',','.') ;  
}  
function dataBR($vdata) {
    if (!empty($vdata)) {
        $dados = explode(" ", $vdata);
        $dadoss = explode("-", $dados[0]);
        return ("$dadoss[2]/$dadoss[1]/$dadoss[0]");
    } else {
        return false;
    }
}
function dataHoraBR($vdata) {
    if (!empty($vdata)) {
        $dados = explode(" ", $vdata);
        $data = explode("-", $dados[0]);
        $hora =  $dados[1];
        return ("$data[2]/$data[1]/$data[0] $hora");
    } else {
        return false;
    }
}
function dataUS($vdata) {
 
    if (!empty($vdata)) {
        $dados = explode("/", $vdata);
        return ("$dados[2]-$dados[1]-$dados[0]");
    } else {
        return false;
    }
}

function dataBR_($vdata) {
    if (!empty($vdata)) {
        return date_format($vdata, "d/m/Y");
    } else {
        return false;
    }
}

function dataHoraBR_($vdata) {
    if (!empty($vdata)) {
        $date=date_create($vdata);
        return date_format($date, "d/m/Y H:i:s");
         
    } else {
        return false;
    }
}

function valueOfInteger($int) {
    return trim($int) != '' ? $int : null;
}

function valueOfNumeric($numeric) {
    return trim($numeric) != '' ? str_replace(',', '.', $numeric) : null;
}

function valueOfCheck($bool) {
    return trim($bool) == 'S' ? $bool : 'N';
}

function TratarMsg($msg = null) {
    $dados['msg'] = $msg;
    // echo "<script>alert(".$dados['msg'].")</script>";
    if (isset($msg)) {
        if ((strpos(strtolower($dados['msg']), 'sucesso') > 0) or (strpos(strtolower($dados['msg']), 'online') > 0)) {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 "> <div class="alert alert-success" role="alert">' . $dados['msg'] . '</div></div>';
        }
        if ((strpos(strtolower($dados['msg']), 'não') > 0) or (strpos(strtolower($dados['msg']), 'offline') > 0)) {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 "> <div class="alert alert-danger" role="alert">' . $dados['msg'] . '  </div></div>';
        } else {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 "> <div class="alert alert-danger" role="alert">' . $dados['msg'] . '  </div></div>';
        }
    }
}

function sucesso($mensagem = NULL) {
    $dados['msg'] = $mensagem;
    $this->load->view('includes/msg_sucesso', $dados);
}

function falha($mensagem = NULL) {
    $dados['msg'] = $mensagem;
    $this->load->view('includes/msg_erro', $dados);
}
