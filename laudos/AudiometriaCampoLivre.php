<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
    <head>
        <title>Audiometria Campo Livre</title>
        <link rel="stylesheet" type="text/css" href="./_css/style.css" />
    </head>

    <?php
    if (isset($_GET['Consulta'])) {
        include_once './_db/_autoload.php';
        include_once './_includes/function.php';
        @$Consulta = new obj('consulta c');
        @$rsC = @$Consulta->listar("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2, t1.CRFA as CRFA1, t2.CRFA as CRFA2 ", "MD5(c.Cod) = '" . @$_GET['Consulta'] . "'", array("left join terceiro t2 on t2.cod = c.terceiro1", "left join terceiro t1 on t1.cod = c.terceiro"));

        @$Paciente = new obj('paciente p');
        @$rsP = @$Paciente->buscarByCondicao("Cod=" . @$rsC[0]['Paciente']);

        @$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
        @$interval = @$date->diff(new DateTime(date("Y/m/d"))); // data definida

        @$Consulta_has_Audiometrico = new obj('consulta_has_exameaudiometrico');
        @$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
        // _debug($rsCha );
        @$AudiometriaCampoLivre = new obj('audiometriacampolivre');
        @$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
        // _debug($rsAud);
        @$Equipamento = new obj('equipamento e');
        @$rsE = @$Equipamento->buscarByCondicao("Cod=0" . (@$rsCha[0]['Equipamento'] > 0 ? @$rsCha[0]['Equipamento'] : @$rsAud[0]['Equipamento']));

        @$Equipamento_Calibracao = new obj('equipamento_calibracao ec');
        @$rsEC = @$Equipamento_Calibracao->buscarByCondicao("Cod=0" . (@$rsCha[0]['equipamento_calibracao'] > 0 ? @$rsCha[0]['equipamento_calibracao'] : @$rsAud[0]['equipamento_calibracao']));
        ?>
        <body>
            <div class="paper">
                <div class="table">
                    <div class="descricao">Nome:</div> 
                    <div class="sublinhado w580"> <?= utf8_encode(@$rsC[0]['PacienteNome']); ?></div>
                    <div class="descricao">Data:</div>
                    <div class="sublinhado w100"> <?= dataBR(@$rsC[0]['Data']); ?></div>
                    <div class="sublinhado w5"> </div>

                    <div class="clear"></div>

                    <div class="descricao">RG:</div>
                    <div class="sublinhado w200">  <?= @$rsP[0]['RG'] ?> </div>
                    <div class="descricao">Data de Nascimento:</div>
                    <div class="sublinhado w200">  <?= dataBR(@$rsP[0]['DataNascimento']) ?> </div>
                    <div class="descricao">Idade:</div>
                    <div class="sublinhado w146">  <?= calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']); ?></div>
                    <div class="sublinhado w5"> </div>
                    <div class="sublinhado w1"> </div> 
                    <div class="clear"></div>

                    <div class="descricao">Nacionalidade: </div>
                    <div class="sublinhado  w250"> <?= @$rsP[0]['Nacionalidade'] ?> </div>
                    <div class="descricao ">Sexo: </div>
                    <div class="sublinhado w100"> 
                        <?php
                        switch (@$rsP[0]['Sexo']) {
                            case 'M':echo 'Masculino';
                                break;
                            case 'F':echo 'Feminino';
                                break;
                            default:echo '';
                                break;
                        }
                        ?> 
                    </div>
                    <div class="descricao">Profissão: </div>
                    <div class="sublinhado w200"> <?= isset($rsP) ? utf8_encode(@$rsP[0]['Funcao']) : ""; ?></div>
                    <div class="sublinhado w1"> </div>
                    <div class="sublinhado w5"> </div>

                    <div class="clear"></div>

                    <div class="descricao">Audiômetro</div>
                    <div class="sublinhado w450">  <?= isset($rsE) ? utf8_encode(@$rsE[0]['Descricao']) : ""; ?></div>
                    <div class="descricao">Calibração:</div>
                    <div class="sublinhado w140">  <?= isset($rsEC) ? dataBR(@$rsEC[0]['Calibracao']) : ""; ?></div>
                    <div class="sublinhado w5"> </div>
                    <div class="sublinhado w5"> </div>
                    <div class="sublinhado w5"> </div>
                    <div class="sublinhado w1"> </div>
                    <div class="clear  h30"></div>
                    <div class="titulo">Audiometria Campo Livre</div>
                    <div class="clear h30"></div>
                    <!--			-->
                    <table class="tabela w600 centro pequeno">
                        <tr>
                            <td class="Freq">FREQ</td>
                            <td class="Freq">0,25k Hz</td>
                            <td class="Freq">0,5k Hz</td>
                            <td class="Freq">1k Hz</td>
                            <td class="Freq">2k Hz</td>
                            <td class="Freq">4k Hz</td>
                            <td class="Freq">8k Hz</td>
                        </tr>			
                        <tr>
                            <td colspan="01">INT. <br>dB</td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq025']) ?> </td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq05']) ?> </td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq1']) ?> </td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq2']) ?> </td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq4']) ?> </td>
                            <td class="f10"><?= ImprimeCampoLivre("E", @$rsAud[0]['Freq8']) ?> </td>
                        </tr>			
                    </table>

                    <div class="clear h30"></div>
                    <table class="tabela w600 centro pequeno" style="">
                        <tr>
                            <td colspan="2" class="FreqAASI w154">LIMIAR DE DETECTABILIDADE<br> DE FALA</td>
                            <td colspan="2" class="FreqAASI w154">LIMIAR DE RECEPÇÃO<br> DE FALA</td>
                            <td colspan="2" class="FreqAASI">ÍNDICE DE RECONHECIMENTO<br> DE FALA</td>
                        </tr>	
                        <?php
                        @$IRF = new obj('iprf');
                        @$rsIPRF = @$IRF->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

                        @$ldf = new obj('ldf');
                        @$rsldf = @$ldf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

                        @$lrf = new obj('lrf');
                        @$rslrf = @$lrf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>		
                        <tr>
                            <td style="border-right:0 " ><span class="w134  direita "><span class="f10 direita"><?= ImprimeCampoLivreColor('', @$rsAud[0]['LDF']); ?></span>  </span></td><td style="border-left:0 ">dB</td>
                            <td  style="border-right:0 "><span class="w134  direita "><span class="f10 direita"><?= ImprimeCampoLivreColor('', @$rsAud[0]['LRF']); ?></span>  </span></td><td style="border-left:0 ">dB</td>
                            <td><span class="w89 sublinhado direita f10"><?= @$rsAud[0]['IRF_MONO'] ?> <span style="font-size: 8pt !Important">%</span></span> <br>
                                <span class="w89 sublinhado direita  f10"><?= @$rsAud[0]['IRF_DISSI'] ?><span style="font-size: 8pt !Important">%</span></span> </td>
                            <td>monossílabos<br>dissílabos</td>
                        </tr>			
                    </table>
                    <div class="clear h30"></div>
                    <?php
                    @$Parecer = new obj('parecer p');
                    @$campos = 'p.*';
                    @$rsParecer = @$Parecer->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                    ?>		
                    <div class="Parecer">
                        <table>				
                            <tr><td class="centro "><h3 class="normal">PARECER</h3></td></tr>
                            <tr>
                                <td class="memo2 h100 centro"><?= utf8_encode(nl2br(@$rsParecer[0]['ObservacaoCampolivre'])); ?></td>
                            </tr>
                        </table>	
                    </div>






                    <table class="tabela w600 centro pequeno">
                        <tr><td colspan="10" style="border:0;   " class="centro"><h3 style=" font-size: 11pt; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                font-weight: 500;">AUDIOMETRIA COM DISPOSITIVO ACÚSTICO</h3></td></tr>
                        <tr>	
                            <td class="Freq"></td>
                            <td class="Freq">0,25k Hz </td>
                            <td class="Freq">0,5k Hz </td> 
                            <td class="Freq">1k Hz </td>
                            <td class="Freq">2k Hz </td>
                            <td class="Freq">4k Hz </td>
                            <td class="Freq">LDF</td>
                            <td class="Freq">LRF</td>
                            <td class="Freq">IRF% <br> MONO</td>
                            <td class="Freq">IRF% <br> DISS</td>

                        </tr>			
                        <?php
                        @$audiometriacomaasioeod = new obj("audiometriacomaasioeod");
                        @$rsoeod = @$audiometriacomaasioeod->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>
                        <tr>
                            <td>OD+<br>&nbsp;OE <sub>dB</sub></td>
                            <td class="f10"><?=ImprimeCampoLivre('E', @$rsoeod[0]['Freq025']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E', @$rsoeod[0]['Freq05']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E', @$rsoeod[0]['Freq1']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E', @$rsoeod[0]['Freq2']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E', @$rsoeod[0]['Freq4']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivreColor('',@$rsoeod[0]['LDF']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivreColor('',@$rsoeod[0]['LRF']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E',@$rsoeod[0]['IPRF']); ?></td>
                            <td class="f10"><?=ImprimeCampoLivre('E',@$rsoeod[0]['IPRF_DISS']); ?></td>

                        </tr>			
                        <?php
                        @$audiometriacomaasiod = new obj("audiometriacomaasiod");
                        @$rsod = @$audiometriacomaasiod->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>
                        <tr style="font-weight: 900;">
                            <td>OD <sub>dB</sub></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['Freq025']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['Freq05']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['Freq1']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['Freq2']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['Freq4']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['LDF']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('D', @$rsod[0]['LRF']); ?></td>
                            <td class="f10"><?= ImprimeColor('D', @$rsod[0]['IPRF']); ?></td>
                            <td class="f10"><?= ImprimeColor('D', @$rsod[0]['IPRF_DISS']); ?></td>

                        </tr>			
                        <?php
                        @$audiometriacomaasioe = new obj("audiometriacomaasioe");
                        @$rsoe = @$audiometriacomaasioe->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>
                        <tr style="font-weight: 900;">
                            <td>OE <sub>dB</sub></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['Freq025']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['Freq05']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['Freq1']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['Freq2']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['Freq4']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['LDF']); ?></td>
                            <td class="f10"><?= ImprimeCampoLivreColor('E', @$rsoe[0]['LRF']); ?></td>
                            <td class="f10"><?= ImprimeColor('E', @$rsoe[0]['IPRF']); ?></td>
                            <td class="f10"><?= ImprimeColor('E', @$rsoe[0]['IPRF_DISS']); ?></td>

                        </tr>			
                    </table>
                    <div class="clear"></div>


                    <!--			-->
                    <div class="clear"></div>
                    <div class="Parecer">

                        <table>
                            <tr class="memo h30" style=""><td class="w25 centro">OD:</td><td style="font-weight: 900; line-height: normal" class="  centro w720"><?= ImprimeColor('D', utf8_encode(nl2br(@$rsParecer[0]['ProteseOD']))) ?></td></tr>
                            <tr class="memo" style=""><td class="centro">OE:</td>            <td style="font-weight: 900;line-height: normal" class="  centro w720"><?= ImprimeColor('E', utf8_encode(nl2br(@$rsParecer[0]['ProteseOE']))) ?></td></tr>
                        </table>


                    </div>
                    <div class="Parecer">
                        <?php
                        @$Parecer = new obj('parecer p');
                        @$campos = 'p.*';
                        @$rsParecer = @$Parecer->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>

                        <table>	
                            <tr><td class="centro"><h3 style="padding: 10px 0 0 0" class="normal">PARECER DISPOSITIVO ACÚSTICO</h3></td></tr>
                            <tr>
                                <td class="memo2 memo2S h50 centro"> <?= utf8_encode(nl2br(@$rsParecer[0]['ObsProtese'])); ?></td>
                            </tr>
                        </table>			
                    </div>
                    <div class="clear"></div>
                    <?php
                    unset($tabela);
                    unset($ordem);
                    unset($join);
                    unset($condicao);
                    unset($Campos);
                    unset($rs);
                    @$tecnicasutilizadas = new obj('tecnicasutilizadas tu');
                    @$condicao = "";
                    @$ordem = "";
                    @$Campos = " concat( CASE ifnull(tuc.consulta,0) 
								    WHEN 0 THEN '(&nbsp;&nbsp;&nbsp;  )'
								    ELSE '(&nbsp;x&nbsp;)' END,'   ', IFNULL(tu.Descricao,'')) as Selecionado ";
                    @$join = array("left join tecnicasutilizadas_has_consulta  tuc on tuc.tecnicasutilizadas_cod = tu.cod and MD5(tuc.Consulta) = '" . @$_GET['Consulta'] . "'");
                    @$rs = @$tecnicasutilizadas->listar(@$Campos, @$condicao, @$join, @$ordem);
//						_debug(@$rs);
                    ?>
                    <div class="TecnicasUtilizadas" style="margin-top:25px;width: 100%;" >
                        <div class="selecionado center" style="width: 773px;text-align:left"><b>TÉCNICA UTILIZADA</b></div><br>
                        <?php
                        foreach (@$rs as $linha) {
                            echo '<div class="selecionado">' . utf8_encode(@$linha['Selecionado']) . '</div>';
                        }
                        ?>
                    </div>
                    <?php
                    unset($join);
                    @$campos = 'p.Descricao, ma.Descricao as Monitoramento';
                    @$join[] = ' join monitoramentoaudiologico ma on ma.Cod = p.MonitoramentoAudiologico ';
                    @$Parecer = new obj('parecer p');
                    @$rsParecer = @$Parecer->listar(@$campos, "MD5(p.Consulta) = '" . @$_GET['Consulta'] . "'", @$join);
                    ?>
                    <?php
                    @$moni = isset($rsParecer[0]) ? str_split(trim(@$rsParecer[0]['Monitoramento']), 5) : "x";
                    ?>
                    <div class="clear"></div>
                    <table class="w300 centro pequeno assinatura" style="margin-left:42px; float:left;width:100%;height:65px">
                        <tr>
                            <td class="w230" style="border:0"> <div class="<?php echo (isset($rsC[0]['Profissional2']) && trim($rsC[0]['Profissional2'])) ? 'sublinhado' : ''; ?> w300 "></div></td>
                            <td class="w230" style="border:0"> <div class="sublinhado w300 "></div></td>
                        </tr>
                        <tr>
                            <td class="w230" style="border:0"> <div class="w300 "><?php echo @$rsC[0]['Profissional2']; ?></div></td>
                            <td class="w230" style="border:0"> <div class="w300 "><?php echo @$rsC[0]['Profissional1']; ?></div></td>
                        </tr>	
                        <tr>
                            <td class="w230" style="border:0"> <div class="w300 "><?php echo (isset($rsC[0]['Profissional2']) && trim($rsC[0]['Profissional2'])) ? 'CRFa:' : ''; ?> <?php echo @$rsC[0]['CRFA2']; ?></div></td>
                            <td class="w230" style="border:0"> <div class="w300 ">CRFa: <?php echo @$rsC[0]['CRFA1']; ?></div></td>
                        </tr>			
                    </table>
                    <div class="clear"></div>
                    <div class="Monitoramento" style="padding:0"> MONITORAMENTO AUDIOLÓGICO: (<?= @$moni[0] == 'Trime' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?> ) TRIMESTRAL &nbsp;&nbsp;&nbsp;
                        (<?= @$moni[0] == 'Semes' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?>   ) SEMESTRAL &nbsp;&nbsp;&nbsp;          
                        (<?= @$moni[0] == 'Anual' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?>   ) ANUAL&nbsp;&nbsp;&nbsp;
                        (<?= @$moni[0] == 'A Cri' ? ' x ' : '&nbsp;&nbsp;&nbsp;'; ?> ) A CRITÉRIO MÉDICO
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                function PrintWindow() {
                    window.print();
                    CheckWindowState();
                }

                function CheckWindowState() {
                    if (document.readyState == "complete") {
                        window.close();
                    } else {
                        setTimeout("CheckWindowState()", 10)
                    }
                }
    //PrintWindow();
            </script> 
        <?php }
        include_once('./_includes/GA_tracking.php');
        ?> 
    </body>
</html>