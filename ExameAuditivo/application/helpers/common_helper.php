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

function CalculaIdade($DataConsulta, $DataNascimento) {

    $date = new DateTime($DataNascimento); // data de nascimento
    $interval = $date->diff(new DateTime($DataConsulta)); // data definida
    if ($interval->format('%Y') > 0)
        $ano = ( $interval->format('%Y') == 1 ) ? $interval->format('%Y Ano') : $interval->format('%Y Anos');
    else
        $ano = "";

    if ($interval->format('%m') > 0)
        $mes = ( $interval->format('%m') == 1 ) ? $interval->format('%m M�s') : $interval->format('%m Meses');
    else
        $mes = "";
    $delimiter = (isset($ano) && $ano != "" && isset($mes) && $mes != "") ? ", " : "";
    echo utf8_encode($ano . $delimiter . $mes);
}

function dataUS($vdata) {

    if (!empty($vdata)) {
        $dados = explode("/", $vdata);
        return ("" . trim($dados[2]) . "-" . trim($dados[1]) . "-" . trim($dados[0]) . "");
    } else {
        return false;
    }
}


function array_columns(array $array, $columnKey, $indexKey = null)
    {
        $result = array();
        foreach ($array as $subArray) {
            if (!is_array($subArray)) {
                continue;
            } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                $result[] = $subArray[$columnKey];
            } elseif (array_key_exists($indexKey, $subArray)) {
                if (is_null($columnKey)) {
                    $result[$subArray[$indexKey]] = $subArray;
                } elseif (array_key_exists($columnKey, $subArray)) {
                    $result[$subArray[$indexKey]] = $subArray[$columnKey];
                }
            }
        }
        return $result;
    }
function dataUS_($vdata) {
    echo $vdata . "<br/>";
    if (!empty($vdata)) {
        $datestring = '%Y-%m-%d';

        echo mdate($datestring, $vdata);

        return date_format($vdata, "Y-m-d");
        ;
    } else {
        return false;
    }
}

 

function ImprimeMascaramento($Orelha, $vlr) {
//    if (strtoupper($vlr) == 'S') {
//        $color = (strtoupper($Orelha) == 'D' ) ? "#27408B" : "red";
//        echo "<center><font class='f10'  color='" . $color . "'>" . ((strtoupper($vlr) == 'S') ? 'SN' : '') . "</font></center>";
//    }
    echo $vlr;
}

function ImprimeCampoLivre($Orelha, $vlr) {
    if ($vlr == null)
        echo "";
    else if ($vlr == 0) {
        
        echo "<img src='".base_url('assets/img/seta_baixo.png')."'/>";
    } else if ($vlr == -1) {
        echo "?";
    } else {
        //$color =  (strtoupper($Orelha) == 'E' )?"#27408B":(strtoupper($Orelha) == 'D' )?"red":"#111";
        $color = "#111"; //(strtoupper($Orelha) == 'E' )?"#27408B":"red";
        echo "<b><font class='f10' color='" . $color . "'>" . $vlr . "</font></b>";
    }
}

function ImprimeCampoLivreColor($Orelha, $vlr) {
//    if ($vlr == null) {
//        echo "";
//    } else if ($vlr == 0) {
//        
//        echo "<img src='".base_url('assets/img/seta_baixo.png')."'/>";
//    } else if ($vlr == -1) {
//        echo "?";
//    } else {
//        //$color = (strtoupper($Orelha) == 'E' )?"#27408B":"red";
//        $color = (strtoupper($Orelha) == 'E' ) ? "#27408B" : ((strtoupper($Orelha) == 'D' ) ? "red" : "#111");
//        echo "<font class='f10' color='" . $color . "'><b>" . $vlr . "</b></font> ";
//    }
    echo $vlr;
}

function ImprimeColor($Orelha, $vlr) {
    //if (strtoupper($vlr) == 'S'){
    $color = (strtoupper($Orelha) == 'E' ) ? "#27408B" : "red";
    echo "<b><font class='f10' color='" . $color . "'>" . $vlr . "</font></b>";
    //}
}

function SetaDireita() {
    echo "<img src='".base_url('assets/img/_seta_direita.png')."'/>";
}

function SetaEsquerda() {   
    echo "<img src='".base_url('assets/img/_seta_esquerda.png')."'/>";
}

function ImprimeAusente($Orelha, $vlr) {
    if (strtoupper($vlr) == 'S' && $Orelha == 'D') {
        
        echo "<img src='./_img/seta_baixo_vermelha.png' />";
    } elseif (strtoupper($vlr) == 'S' && $Orelha == 'E') {
        echo "<img src='./_img/seta_baixo_azul.png' />";
    }
}

function ImprimeNaoFeito($Orelha, $vlr) {
    if (strtoupper($vlr) == 'S' && $Orelha == 'D')
        echo "<img src='./_img/seta_traco_vermelha.png' />";
    elseif (strtoupper($vlr) == 'S' && $Orelha == 'E')
        echo "<img src='./_img/seta_traco_azul.png' />";
}

function ComplementaLinhas($txt) {

    if (strlen($txt) < 150)
        echo utf8_encode(str_repeat($txt, strlen($txt) - 150));
    else
        echo utf8_encode($txt);
}


function ValidaData($dat) {
    //	echo $dat."<br>";
    $dados = explode("/", "$dat"); // fatia a string $dat em pedados, usando / como referência
    $d = trim($dados[0]);
    $m = trim($dados[1]);
    $y = trim($dados[2]);

    return checkdate($m, $d, $y);
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

function dataBR_($vdata) {
    if (!empty($vdata)) {
        return date_format($vdata, "d/m/Y");
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

    if (isset($msg)) {
        if ((strpos(strtolower($dados['msg']), 'sucesso') >= 0)) {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 "> <div class="alert alert-success" role="alert">' . $dados['msg'] . '</div></div>';
        }
        if ((strpos(strtolower($dados['msg']), 'não') >= 0)) {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main"> <div class="alertalert-danger" role="alert">' . $dados['msg'] . '  </div></div>';
        } else {
            return '<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main"> <div class="alertalert-danger" role="alert">' . $dados['msg'] . '  </div></div>';
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
