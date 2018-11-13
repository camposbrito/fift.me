<link href="<?= base_url(); ?>assets/css/relatorios.css" rel="stylesheet">
<div class="paper">

    <!--<div class="table">-->
    <div class="descricao w50" style="float:left">Nome:</div> 
    <div class="sublinhado w480" style="float:left"> <?= ($consulta[0]->PacienteNome); ?></div>
    <div class="descricao w40" style="float:left">Data:</div>
    <div class="sublinhado w100" style="float:left"> <?= dataBR($consulta[0]->Data); ?></div>


    <div class="clear"></div>

    <div class="descricao w35">RG:</div>
    <div class="sublinhado w110">  <?= $paciente[0]->RG ?> </div>
    <div class="descricao w150">Data de Nascimento:</div>
    <div class="sublinhado w100">  <?= dataBR($paciente[0]->DataNascimento) ?> </div>
    <div class="descricao  w50">Idade:</div>
    <div class="sublinhado w120">  <?= (calculaIdade($consulta[0]->Data, $paciente[0]->DataNascimento) ) ?></div>

    <div class="clear"></div>

    <div class="descricao  w100">Nacionalidade: </div>
    <div class="sublinhado  w100"> <?= $paciente[0]->Nacionalidade ?> </div>
    <div class="descricao  w50">Sexo: </div>
    <div class="sublinhado w100"> 
        <?php
        switch ($paciente[0]->Sexo) {
            case 'M':echo 'Masculino';
                break;
            case 'F':echo 'Feminino';
                break;
            default:echo '';
                break;
        }
        ?>
    </div>
    <div class="descricao  w80">Profissão: </div>
    <div class="sublinhado w200"> <?= ($paciente[0]->Funcao); ?></div>		 		
    <div class="clear"></div>
    <div class="descricao">Audiômetro:</div>
    <div class="sublinhado w450">  <?= isset($equipamento) ? ($equipamento[0]->Descricao) : ""; ?></div>
    <div class="descricao">Calibração:</div>
    <div class="sublinhado w150">  <?= isset($equipamento) ? dataBR($equipamento[0]->Calibracao) : ""; ?></div>
    <div class="sublinhado w5"> </div>
    <div class="sublinhado w1"> </div>
    <div class="clear"></div>

    <div class="titulo">AUDIOMETRIA</div>
    <div class="clear"></div>

    <div class="grafico w350 centro">OD</div>
    <div class="grafico w350 centro">OE</div>
    <div class="clear"></div>
    <div class="grafico centro w350">
<?php echo " <img class='centro' src='http://camposbrito.com.br/projetobley/report/OD_v1.php?Consulta=" . md5($consulta[0]->Cod) . "'/>"; ?>
    </div>
    <div class="grafico centro w350">
<?php echo "<img class='centro' src='http://camposbrito.com.br/projetobley/report/OE_v1.php?Consulta=" . md5($consulta[0]->Cod) . "'/>"; ?>
    </div>
    <div class="clear"></div>
    <div class="TresCol">
        <div class="col1">


            <table class="tabela" style="height: 122px;">
                <tr><td colspan="2">LIMIAR DE RECEPÇÃO DA FALA</td> <td>MASC</td></tr>
                <!--<tr><td>O.D</td><td align="right" ><?= ImprimeCampoLivreColor('D', $LRF[0]->OD_dB) ?> dB</td><td class="f10"><?= ImprimeMascaramento('D', $LRF[0]->OD_Masc) ?></td></tr>-->
                <!--<tr><td>O.E</td><td align="right"  ><?= ImprimeCampoLivreColor('E', $LRF[0]->OE_dB) ?> dB</td><td class="f10"><?= ImprimeMascaramento('E', $LRF[0]->OE_Masc) ?></td></tr>-->
            </table>
        </div>
        <div class="col2">
            <table class="tabela" style="height: 122px;" border="1" cellpadding="5" cellspacing="0">
                <tr><td colspan="2">LIMIAR DE DETECÇÃO DA FALA</td> <td>MASC</td></tr>
                <!--<tr><td>O.D</td><td align="right"><?= ImprimeCampoLivreColor('D', $LDF[0]->OD_dB) ?> dB</td><td class="f10"><?= ImprimeMascaramento('D', $LDF[0]->OD_Masc) ?></td></tr>-->
                <!--<tr><td>O.E</td><td align="right"><?= ImprimeCampoLivreColor('E', $LDF[0]->OE_dB) ?> dB</td><td class="f10"><?= ImprimeMascaramento('E', $LDF[0]->OE_Masc) ?></td></tr>-->
            </table>
        </div>
        <div class="col3">

            <table class="tabela" border="1" cellpadding="5" cellspacing="0">
                <tr><td colspan="3" align="center">MASCARAMENTO</td></tr>
                <!--<tr><td>V.A <span class="f10" style='padding: 0 5px;'><?= ImprimeColor($mascaramento[0]->COR_VAR, $mascaramento[0]->VA) ?></span></td></tr>-->
                <!--<tr><td align="right">V.O  O.D  <span class="w175 sublinhado f10 "><?= ImprimeColor('D', $mascaramento[0]->VOOD) ?></span>-->
                        <div class="clear"></div>
                        <!--O.E <span class="w175 sublinhado f10"><?= ImprimeColor('E', $mascaramento[0]->VOOE) ?></span>-->
                    </td></tr>
            </table>


        </div>
    </div>
    <div class="clear"></div>
    <div class="DuasCol">
        <div class="col4">

            <table class="tabela" border="1" cellpadding="5" cellspacing="0">
                <tr><td colspan="4" align="center">ÍNDICE DE RECONHECIMENTO DE FALA</td> <td>MASC</td></tr>
                <tr>
                    <td rowspan="1">O.D.:</td>
                    <td><span class="w89 sublinhado direita"><?= ImprimeColor('D', $IPRF[0]->OD_dB) ?> dB</span></td>
                    <td><span class="w89 sublinhado direita"><?= ImprimeColor('D', $IPRF[0]->OD_Mono) ?>%</span><br>
                        <span class="w89 sublinhado direita"><?= ImprimeColor('D', $IPRF[0]->OD_Dissil) ?>%</span></td>
                    <td>monossílabos<br>dissílabos</td>
                    <!--<td><?= ImprimeMascaramento('D', $IPRF[0]->OD_Masc); ?></td>-->
                </tr>
                <tr>
                    <td rowspan="1">O.E.:</td>
                    <td><span class="w89 sublinhado direita"><?= ImprimeColor('E', $IPRF[0]->OE_dB) ?> dB</span></td>
                    <td><span class="w89 sublinhado direita"><?= ImprimeColor('E', $IPRF[0]->OE_Mono) ?>%</span><br>
                        <span class="w89 sublinhado direita"><?= ImprimeColor('E', $IPRF[0]->OE_Dissil) ?>%</span></td>
                    <td>monossílabos<br>dissílabos</td>
                    <!--<td><?= ImprimeMascaramento('E', $IPRF[0]->OE_Masc); ?></td>-->
                </tr>
            </table>
        </div>
        <div class="col5">


            <table class="tabela" border="1" cellpadding="5" cellspacing="0" style="width:331px;height: 136px;;">
                <tr><td colspan="6" align="center">WEBER</td></tr>
                <tr>
                    <td rowspan="1" style="height:106px" >O.D.:</td>
                    <td rowspan="1" valign="top">
                        0,5kHz 
                        <br><br>

                        <?= $Weber[0]->Faixa_500_OE == 'S' ? SetaEsquerda() : ""; ?>								 
                        <br>
                        <?= $Weber[0]->Faixa_500_OD == 'S' ? SetaDireita() : ""; ?>
                    </td>
                    <td rowspan="1" valign="top">
                        1kHz 
                        <br><br>
                        <?= $Weber[0]->Faixa_1000_OE == 'S' ? SetaEsquerda() : ""; ?>								 
                        <br>                  
                        <?= $Weber[0]->Faixa_1000_OD == 'S' ? SetaDireita() : ""; ?>
                    </td>
                    <td rowspan="1" valign="top">2kHz 
                        <br><br>			
                        <?= $Weber[0]->Faixa_2000_OE == 'S' ? SetaEsquerda() : ""; ?>								 
                        <br>
                        <?= $Weber[0]->Faixa_2000_OD == 'S' ? SetaDireita() : ""; ?>
                    </td>
                    <td rowspan="1" valign="top">4kHz 
                        <br><br>
                        <?= $Weber[0]->Faixa_4000_OE == 'S' ? SetaEsquerda() : ""; ?>								 
                                                <br>
                        <?= $Weber[0]->Faixa_4000_OD == 'S' ? SetaDireita() : ""; ?></td>
                    <td rowspan="1">O.E.:</td>
                </tr>
            </table>	
        </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
    <h3 class="centro normal">PARECER</h3>
    <div class="Parecer h120">

        <table >				

            <tr class="memo2 centro"><td >  <?= isset($Parecer[0]) ? (nl2br($Parecer[0]->Descricao)) : ""; ?></td>
            </tr>
        </table>			
    </div>
    <div class="clear"></div>
<?php
$moni = isset($Parecer[0]) ? str_split(trim($MonitoramentoAudiologico[0]->Descricao), 5) : "x";
?>
    <div class="Monitoramento"> Monitoramento Audiológico: (<?= $moni[0] == 'Trime' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?> ) TRIMESTRAL &nbsp;&nbsp;&nbsp;
        (<?= $moni[0] == 'Semes' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?>   ) SEMESTRAL &nbsp;&nbsp;&nbsp;          
        (<?= $moni[0] == 'Anual' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?>   ) ANUAL&nbsp;&nbsp;&nbsp;
        (<?= $moni[0] == 'A Cri' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?> ) A CRITÉRIO MÉDICO
    </div>
    <div class="clear"></div>
    <table class="w300 centro pequeno assinatura" style="margin-left:42px; float:left;width:100%;height:65px">
        <tr>
            <td class="w230" style="border:0"> <div class="<?php echo (isset($terceiro2[0]->Cod) && trim($terceiro2[0]->Cod)) ? 'sublinhado' : ''; ?> w300 "></div></td>
            <td class="w230" style="border:0"> <div class="sublinhado w300 "></div></td>
        </tr>
        <tr>
            <td class="w230" style="border:0"> <div class="w300 "><?php echo $terceiro2[0]->Descricao; ?></div></td>
            <td class="w230" style="border:0"> <div class="w300 "><?php echo $terceiro[0]->Descricao; ?></div></td>
        </tr>	
        <tr>
            <td class="w230" style="border:0"> <div class="w300 "><?php echo (isset($terceiro2[0]->Cod) && trim($terceiro2[0]->Cod)) ? 'CRFa:' : ''; ?> <?php echo $terceiro2[0]->CRFA; ?></div></td>
            <td class="w230" style="border:0"> <div class="w300 ">CRFa: <?php echo $terceiro[0]->CRFA; ?></div></td>
        </tr>			
    </table>
    <div class="clear"></div>

    <div class="pequeno Classificacao">CLASSIFICAÇÃO:
        <?php
        foreach ($classificacao as $linha) {

            echo $linha->Selecionado;
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        ?>

    </div> 
