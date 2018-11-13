<?php

function arrendodamento($vlr, $casa = 0) {
    return round($vlr, $casa);
}

function fmt($x) {
    if (!empty($x))
        return number_format($x, 2, ",", ".");
}

function fmtMonetario($x, $simbolo = '') {
    if (!empty($x))
        return $simbolo . "&nbsp;" . number_format($x, 2, ",", ".");
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
function fmtMonetarioReal($x, $simbolo = '') {
    return $simbolo . "&nbsp;" . number_format($x, 2, ",", ".");
}

function dataUS($vdata) {
    if (!empty($vdata)) {
        $data = explode("/", $vdata);
        return ("" . trim($data[2]) . "-" . trim($data[1]) . "-" . trim($data[0]) . "");
    } else
        return false;
}

function data_dia($vdata) {
    if (!empty($vdata)) {
        $data = explode(" ", $vdata);
        $datas = explode("-", $data[0]);
        if ($datas[2] > 0)
            return "$datas[2]";
        else
            return "";
    } else
        return false;
}

function dia_da_semana($date) {
    $data = explode("-", $date);
    $hora = null;
    $minuto = null;
    $segundo = null;
    if ($data[2] > 0) {
        $dia_semana_eng = date("D", mktime($hora, $minuto, $segundo, $data[1], $data[2], $data[0]));
        switch ($dia_semana_eng) {
            case 'Mon' :
                $dia_semana_port = 2;
                $text = "Segunda-Feira";
                break;

            case 'Tue' :
                $dia_semana_port = 3;
                $text = "Ter�a-Feira";
                break;

            case 'Wed' :
                $dia_semana_port = 4;
                $text = "Quarta-Feira";
                break;

            case 'Thu' :
                $dia_semana_port = 5;
                $text = "Quinta-Feira";
                break;

            case 'Fri' :
                $dia_semana_port = 6;
                $text = "Sexta-Feira";
                break;

            case 'Sat' :
                $text = "Sabado";
                $dia_semana_port = 7;
                break;

            case 'Sun' :
                $text = "Domingo";
                $dia_semana_port = 1;
                break;
        }
        return $text;
    } else
        return '';
}

function dia_da_semana_abreviado($date) {
    $data = explode("-", $date);
    $hora = null;
    $minuto = null;
    $segundo = null;
    $dia_semana_eng = date("D", mktime($hora, $minuto, $segundo, $data[1], $data[2], $data[0]));
    switch ($dia_semana_eng) {
        case 'Mon' :
            $dia_semana_port = 2;
            $text = "Seg";
            break;

        case 'Tue' :
            $dia_semana_port = 3;
            $text = "Ter";
            break;

        case 'Wed' :
            $dia_semana_port = 4;
            $text = "Qua";
            break;

        case 'Thu' :
            $dia_semana_port = 5;
            $text = "Qui";
            break;

        case 'Fri' :
            $dia_semana_port = 6;
            $text = "Sex";
            break;

        case 'Sat' :
            $text = "Sab";
            $dia_semana_port = 7;
            break;

        case 'Sun' :
            $text = "Dom";
            $dia_semana_port = 1;
            break;
    }
    return $text;
}

function dataBR($vdata) {
    if (!empty($vdata)) {
        $data = explode(" ", $vdata);
        $datas = explode("-", $data[0]);
        return ("$datas[2]/$datas[1]/$datas[0]");
    } else
        return false;
}

function hora($vdata) {
    if (!empty($vdata)) {
        $data = explode(" ", $vdata);
        return $data[1];
    } else
        return false;
}

function datatimeBR($vdata) {
    if (!empty($vdata)) {
        $data = explode("-", $vdata);
        return ("$data[2]/$data[1]/$data[0]");
    } else
        return false;
}

function virgulaporPonto($vParametro) {
    if (!empty($vParametro)) {
        $aux = str_replace(",", ".", $vParametro);
    }
    return $aux;
}

function SubtrairTemp($tmpFinal, $tmpInicial) { //Calcular Final - Inicial, formato HH:NN:SS
    $tmpFinal = explode(":", $tmpFinal);
    $ss_fn = ($tmpFinal[0] * 3600) + ($tmpFinal[1] * 60) + ($tmpFinal[2]);

    $tmpInicial = explode(":", $tmpInicial);
    $ss_in = ($tmpInicial[0] * 3600) + ($tmpInicial[1] * 60) + ($tmpInicial[2]);

    $ss_rs = $ss_fn - $ss_in;

    // Agora formata novamente a data ...

    $nn_rs = 0;
    $hr_rs = 0;

    while ($ss_rs > 59) {
        $ss_rs = $ss_rs - 60;
        $nn_rs = $nn_rs + 1;
        if ($nn_rs >= 60) {
            $nn_rs = 0;
            $hr_rs = $hr_rs + 1;
        }
    }
    return zero($hr_rs) . ":" . zero($nn_rs);
}

function alerta($value) {
    echo "<script type='text/javascript'>";
    echo "alert('$value')";
    echo "</script>";
}

function debug($value) {
    echo '<script type="text/javascript">';
    echo "console.log('$value')";
    echo "</script>";
}

function _debug($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function _debugr($object, $name = '', $line = 0, $debug = 'N') {
    if ($debug == 'S') {
        print ( '\'' . $name . '\' : ');
        print ('Line: ' . $line . "</br>");
        if (is_array($object)) {
            print ( '<pre>');
            print_r($object);
            print ( '</pre>');
        } else {
            var_dump($object);
        }
        echo "</br>";
    }
}

function detectar_Browser($valor) {
    $useragent = $valor;

    if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'IE';
    } elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Opera';
    } elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Firefox';
    } elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Chrome';
    } elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Safari';
    } else {
        // browser not recognized!
        $browser_version = 0;
        $browser = 'other';
    }
    return "$browser $browser_version";
}

function enviar_mail($nomeremetente, $remetente, $assunto, $mensagem) {
    $destinatario = "rodrigo@camposbrito.com.br";
    $nomedestinatario = "Vicenza Turismo";
    require_once("class.phpmailer.php"); // Chama o arquivo da classe
    date_default_timezone_set('America/Sao_Paulo');
    $mail = new PHPMailer();   // Cria a inst�ncia
    try {
        $mail->SetLanguage("br"); // Define o Idioma
        $mail->CharSet = "iso-8859-1"; // Define a Codifica��o
        $mail->IsSMTP(); // Define que ser� enviado por SMTP
        $mail->IsMail();
        $mail->Host = "smtp.camposbrito.com.br";
        $mail->SMTPDebug = false;
        $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autentica��o
        $mail->SMTPSecure = "auto";
        //$mail->Host = "smtp.gmail.com";
        //$mail->Host = "googlemail.com";
        $mail->Port = 587;
        $mail->Username = "rodrigo@camposbrito.com.br";
        $mail->Password = "campos83*";
        $mail->IsHTML(true); // Enviar como HTML
        $mail->From = $remetente; // Define o Remetente
        $mail->FromName = $nomeremetente; // Nome do Remetente
        $mail->Priority = 3;
        $mail->Subject = "[" . $assunto . "]"; // Define o Assunto
        $mail->Body = $mensagem . '<br>';
        $mail->AddAddress($destinatario, $nomedestinatario);
        $mail->AddBCC("camposbrito@gmail.com", "Rodrigo de Campos Brito");
        if ($mail->Send()) {
            $mail->ClearAddresses();
            return true;
        } else {
            return false;
        }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
    }
}

function enviar_mail2($nomeremetente, $remetente, $assunto, $mensagem) {
//	$destinatario2 = "administrador@vicenzaturismo.com.br";
//	$nomedestinatario2 = "Vicenza Turismo";
    $destinatario2 = "camposbrito@gmail.com";
    $nomedestinatario2 = "RcBrito";
    require_once("class.phpmailer.php"); // Chama o arquivo da classe
    date_default_timezone_set('America/Sao_Paulo');
    $mail = new PHPMailer();   // Cria a inst�ncia
    try {
        $mail->SetLanguage("br"); // Define o Idioma
        $mail->CharSet = "iso-8859-1"; // Define a Codifica��o
        $mail->IsMail(); // Define que ser� enviado por SMTP
//		$mail->Host = "smtp.vicenzaturismo.com.br";
        $mail->SMTPDebug = true;
//		$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autentica��o
//		$mail->SMTPSecure = "auto";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "administrador@vicenzaturismo.com.br";
        $mail->Password = "administrador01*";
        $mail->IsHTML(true); // Enviar como HTML
        $mail->From = $remetente; // Define o Remetente
        $mail->FromName = $nomeremetente; // Nome do Remetente
        $mail->Priority = 3;
        $mail->Subject = "[" . $assunto . "]"; // Define o Assunto
        $mail->Body = $mensagem . '<br>';
        $mail->AddAddress($destinatario2, $nomedestinatario2);
        $mail->AddBCC("camposbrito@gmail.com", "Rodrigo de Campos Brito");
        $mail->AddBCC("zehluiz.rf@gmail.com", "Zeh");
        if ($mail->Send()) {
            $mail->ClearAddresses();
            return true;
        } else {
            return false;
        }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
    }
}

function enviar_mail_w_destinatario($nomedestinatario, $destinatario, $nomeremetente, $remetente, $assunto, $mensagem) {
//	$destinatario = "rodrigo@camposbrito.com.br";
//	$nomedestinatario = "Vicenza Turismo";
    require_once("class.phpmailer.php"); // Chama o arquivo da classe
    date_default_timezone_set('America/Sao_Paulo');
    $mail = new PHPMailer();   // Cria a inst�ncia
    try {
        $mail->SetLanguage("br"); // Define o Idioma
        $mail->CharSet = "iso-8859-1"; // Define a Codifica��o
        $mail->IsSMTP(); // Define que ser� enviado por SMTP
        $mail->Host = "smtp.camposbrito.com.br";
        $mail->SMTPDebug = true;
        $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autentica��o
        $mail->SMTPSecure = "auto";
        //$mail->Host = "smtp.gmail.com";
        //$mail->Host = "googlemail.com";
        $mail->Port = 587;
        $mail->Username = "rodrigo@camposbrito.com.br";
        $mail->Password = "campos83*";
        $mail->IsHTML(true); // Enviar como HTML
        $mail->From = $remetente; // Define o Remetente
        $mail->FromName = $nomeremetente; // Nome do Remetente
        $mail->Priority = 3;
        $mail->Subject = "[" . $assunto . "]"; // Define o Assunto
        $mail->Body = $mensagem . '<br>';
        $mail->AddAddress($destinatario, $nomedestinatario);
        $mail->AddBCC("camposbrito@gmail.com", "Rodrigo de Campos Brito");
        if ($mail->Send()) {
            $mail->ClearAddresses();
            return true;
        } else {
            return false;
        }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
    }
}

function enviar_mail_w_destinatario_w_autentication($nomedestinatario, $destinatario, $nomeremetente, $remetente, $assunto, $mensagem) {
//	$destinatario = "rodrigo@camposbrito.com.br";
//	$nomedestinatario = "Vicenza Turismo";
    require_once("class.phpmailer.php"); // Chama o arquivo da classe
    date_default_timezone_set('America/Sao_Paulo');
    $mail = new PHPMailer();   // Cria a inst�ncia
    try {
        $mail->SetLanguage("br"); // Define o Idioma
        $mail->CharSet = "iso-8859-1"; // Define a Codifica��o
        $mail->IsSMTP(); // Define que ser� enviado por SMTP
        $mail->Host = " smtp.gmail.com";
        $mail->Port = 587;
//		$mail->IsSMTP(); 
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = true;
        $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autentica��o
        $mail->SMTPSecure = "auto";
        $mail->Username = "administrador@vicenzaturismo.com.br";
        $mail->Password = "administrador01*";
        $mail->IsHTML(true); // Enviar como HTML
        $mail->From = $remetente; // Define o Remetente
        $mail->FromName = $nomeremetente; // Nome do Remetente
        $mail->Priority = 3;
        $mail->Subject = "[" . $assunto . "]"; // Define o Assunto
        $mail->Body = $mensagem . '<br>';
        $mail->AddAddress($destinatario, $nomedestinatario);
        $mail->AddBCC("camposbrito@gmail.com", "Rodrigo de Campos Brito");
        if ($mail->Send()) {
            $mail->ClearAddresses();
            return true;
        } else {
            return false;
        }
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
    }
}

/**
 * Calcula a idade levando em considera��o anos bisextos
 * @param dateUS $DataConsulta Data da Consulta
 * @param dateUS $DataNascimento Data de Nascimento
 * @param integer $y Ano
 * @return array
 */
function calculaIdadeS($DataConsulta, $DataNascimento) {
    date_default_timezone_set('America/Sao_Paulo');
    $dn = explode('-', $DataNascimento);
    $dc = explode('-', $DataConsulta);
    $days = call_user_func_array('gregoriantojd', $dc) - gregoriantojd($dn[1], $dn[2], $dn[0]);
    $aux = $days / 365.2425;
    $years = floor($aux);
    $days = floor(365.2425 * ( $aux - $years ));
    $months = 0;

    /**
     * Como os meses de fevereiro com 29 dias j� foram levados em considera��o no c�lculo
     * anterior, no c�lculo de meses consideramos fevereiro como tendo apenas 28 dias.
     */
    while ($days >= 28) {
        $sub = 28;

        if (( $m % 2 ) == 1)
            $sub = 31;
        if ($m != 2)
            $sub = 30;

        if ($sub <= $days) {
            $days -= $sub;

            $m = $m == 12 ? 1 : $m + 1;
            ++$months;
        } else
            break;
    }

    $idade = array('y' => $years, 'm' => $months, 'd' => $days);

    if ($idade['y'] <= '0') {
        echo ' ', $idade['m'], ' mese(s)';
    } else {
        //Se tiver meses printa isso
        echo ' ', $idade['y'], ' ano(s)';
    }
}

function CalculaIdade($DataConsulta, $DataNascimento) {

    $date = new DateTime($DataNascimento); // data de nascimento
    $interval = $date->diff(new DateTime($DataConsulta)); // data definida
    if ($interval->format('%Y') > 0)
        $ano = ( $interval->format('%Y') == 1 ) ? $interval->format('%Y Ano') : $interval->format('%Y Anos');
    else
        $ano = "";

    if ($interval->format('%m') > 0)
        $mes = ( $interval->format('%m') == 1 ) ? $interval->format('%m Mes') : $interval->format('%m Meses');
    else
        $mes = "";
    $delimiter = (isset($ano) && $ano != "" && isset($mes) && $mes != "") ? ", " : "";
    echo utf8_encode($ano . $delimiter . $mes);
}

function ImprimeMascaramento($Orelha, $vlr) {
    if (strtoupper($vlr) == 'S') {
        $color = (strtoupper($Orelha) == 'D' ) ? "#27408B" : "red";
        echo "<center><font class='f10'  color='" . $color . "'>" . ((strtoupper($vlr) == 'S') ? 'SN' : '') . "</font></center>";
    }
}

function ImprimeCampoLivre($Orelha, $vlr) {
    if ($vlr == null)
        echo "";
    else if ($vlr == 0) {
        echo "<img src='./_img/seta_baixo.png' />";
    } else if ($vlr == -1) {
        echo "?";
    } else {
        //$color =  (strtoupper($Orelha) == 'E' )?"#27408B":(strtoupper($Orelha) == 'D' )?"red":"#111";
        $color = "#111"; //(strtoupper($Orelha) == 'E' )?"#27408B":"red";
        echo "<b><font class='f10' color='" . $color . "'>" . $vlr . "</font></b>";
    }
}

function ImprimeCampoLivreColor($Orelha, $vlr) {
    if ($vlr == null) {
        $vlr = "";
    } else {
        if ($vlr == 0) {
            $complemento = (strtoupper($Orelha) == 'E' ) ? '_azul' : ((strtoupper($Orelha) == 'D' ) ? '_vermelha' : '');
            $vlr = "<img src='./_img/seta_baixo".$complemento.".png' />";
        } else if ($vlr == -1) {
            $vlr = "?";
        }
        $color = (strtoupper($Orelha) == 'E' ) ? "#27408B" : ((strtoupper($Orelha) == 'D' ) ? "red" : "#111");
        echo "<b><font class='f10 " . $Orelha . "' color='" . $color . "'>" . $vlr . "</font></b>";
    }
}

function ImprimeColor($Orelha, $vlr) {
    //if (strtoupper($vlr) == 'S'){
    $color = (strtoupper($Orelha) == 'E' ) ? "#27408B" : "red";
    echo "<b><font class='f10' color='" . $color . "'>" . $vlr . "</font></b>";
    //}
}

function SetaDireita() {
    echo "<img src='./_img/_seta_direita.png'/>";
}

function SetaEsquerda() {
    echo "<img src='./_img/_seta_esquerda.png'/>";
}

function ImprimeAusente($Orelha, $vlr) {
    if (strtoupper($vlr) == 'S' && $Orelha == 'D')
        echo "<img src='./_img/seta_baixo_vermelha.png' />";
    elseif (strtoupper($vlr) == 'S' && $Orelha == 'E')
        echo "<img src='./_img/seta_baixo_azul.png' />";
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

?>