<?php
header("Content-Type: text/html; charset=UTF-8", true);
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
    <head>
        <title>Exame Audiométrico - Infantil</title>
        <link rel="stylesheet" type="text/css" href="./_css/style.css" />
        <link rel="stylesheet" type="text/css" href="./_css/simone.style.css" />
    </head>
    <?php
    if (isset($_GET['Consulta'])) {
        include_once './_db/_autoload.php';
        include_once './_includes/function.php';

        @$Consulta = new obj('consulta c');
        @$rsC = @$Consulta->listar("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2, t1.CRFA as CRFA1, t2.CRFA as CRFA2 ", "MD5(c.Cod) = '" . @$_GET['Consulta'] . "'", array("left join terceiro t2 on t2.cod = c.terceiro1", "left join terceiro t1 on t1.cod = c.terceiro"));


        @$Paciente = new obj('paciente p');
        @$rsP = @$Paciente->buscarByCondicao("Cod =" . @$rsC[0]['Paciente'], false);

        @$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
        @$interval = @$date->diff(new DateTime(date("Y/m/d"))); // data definida

        @$Consulta_has_Audiometrico = new obj('consulta_has_exameaudiometrico');
        @$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

        @$Consulta_has_Audiometrico = new obj('consulta_has_exameaudiometrico');
        @$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

        @$AudiometriaCampoLivre = new obj('audiometriacampolivre');
        @$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'", true);

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

                    <div class="descricao">Nacionalidade: </div>
                    <div class="sublinhado  w150"> <?= @$rsP[0]['Nacionalidade'] ?> </div>
                    <div class="descricao">Data de Nascimento:</div>
                    <div class="sublinhado w100">  <?= dataBR(@$rsP[0]['DataNascimento']) ?> </div>
                    <div class="descricao ">Sexo: </div>
                    <div class="sublinhado w80"> 
                        <?php
                        switch (@$rsP[0]['Sexo']) {
                            case 'M':echo 'Masculino';
                                break;
                            case 'F':echo 'Feminino';
                                break;
                            default :echo '';
                                break;
                        }
                        ?>
                    </div>
                    <div class="descricao">Idade:</div>
                    <div class="sublinhado w116">  <?= calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']); ?></div>
                    <div class="clear"></div>

                    <div class="descricao">Audiómetro:</div>
                    <div class="sublinhado w450">  <?= isset($rsE[0]['Descricao']) ? utf8_encode(@$rsE[0]['Descricao']) : "" ?></div>
                    <div class="descricao">Calibração:</div>
                    <div class="sublinhado w168"><?= isset($rsEC) ? dataBR(@$rsEC[0]['Calibracao']) : ""; ?></div>
                    <div class="clear h41"></div>
                    <div class="titulo">INSTRUMENTOS E SONS AMBIENTAIS</div>
                    <table class="tabela pequeno h200" style="margin-top:0px" border="1" cellpadding="5" cellspacing="0">
                        <tr>
                            <th>INSTRUMENTOS</th>
                            <th style="width: 83px">REAGIU?</th>
                            <th style="width: 83px">FONTE INT.</th>
                            <th style="width: 83px">MÉDIA INT.</th>
                            <th style="width: 83px">FRACA INT.</th>
                            <th>TIPO REAÇÃO</th>
                        </tr>
                        <?php
                        @$InstrumentoSonsAmbientais = new obj('instrumentos i');


                        @$condicao = "";
                        @$ordem = " i.cod;";
                        @$Campos = "i.Cod,
					       i.Descricao Instrumento,
					       isa.Reagiu,
					       isa.Forte,
					       isa.Media,
					       isa.Fraca,
					       tr.Descricao TipoReacao";
                        @$join = array("left JOIN instrumentossonsambientais isa on i.Cod = isa.instrumento  and MD5(isa.consulta) = '" . @$_GET['Consulta'] . "'",
                            "left join tiporeacao tr on tr.Cod = isa.TipoReacao");
                        @$rs = @$InstrumentoSonsAmbientais->listar(@$Campos, @$condicao, @$join, @$ordem);
                        foreach (@$rs as $linha) {
                            ?>
                            <tr>			
                                <td><?php echo utf8_encode(@$linha['Instrumento']) ?></td>
                                <td style="text-align: center;font-weight: 900;"><?php echo ((@$linha['Reagiu'] == 'S' ? "SIM" : (@$linha['Reagiu'] == 'N' ? 'NÃO' : ""))) ?></td>
                                <td style="text-align: center;font-weight: 900;"><?php echo ((@$linha['Forte'] == 'S' ? "SIM" : (@$linha['Forte'] == 'N'  ? "NÃO" : ""))) ?></td>
                                <td style="text-align: center;font-weight: 900;"><?php echo ((@$linha['Media'] == 'S' ? "SIM" : (@$linha['Media'] == 'N'  ? "NÃO" : ""))) ?></td>
                                <td style="text-align: center;font-weight: 900;"><?php echo ((@$linha['Fraca'] == 'S' ? "SIM" : (@$linha['Fraca'] == 'N'  ? "NÃO" : ""))) ?></td>
                                <td style="font-weight: 900;"><?php echo utf8_encode(@$linha['TipoReacao']) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>			
                    <div class="clear h36"></div>
                    <div class="Coluna1">			
                        <div class="nofloat" style="margin: 0;padding: 0">
                            <table class="tabela centro pequeno">
                                <tr><td colspan="7"  style="border-width: 0 0 1px 0 "><U>TOM PURO (EM CAMPO)</U></td></tr>
                                <tr class="h30">
                                    <td  class="w50">FREQ</td>
                                    <td class="w50">0,25k Hz</td>
                                    <td class="w50">0,5k Hz</td>
                                    <td class="w50">1k Hz</td>
                                    <td class="w50">2k Hz</td>
                                    <td class="w50">4k Hz</td>
                                    <!-- <td class="w50">8k Hz</td> -->
                                </tr>			
                                <tr class="h46">
                                    <td colspan="01">INT. <br>dB</td>
                                    <td class="f10"><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq025']) ?> </td>
                                    <td class="f10"><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq05']) ?> </td>
                                    <td class="f10"><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq1']) ?> </td>
                                    <td class="f10"><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq2']) ?> </td>
                                    <td class="f10"><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq4']) ?> </td>
                                    <!-- <td><?= ImprimeCampoLivre('E', @$rsAud[0]['Freq8']) ?> </td> -->
                                </tr>			
                            </table>
                        </div>
                        <div class="clear h25"></div>
                        <div class="nofloat">
                            <?php
                            @$LDF = new obj('ldf');
                            @$rsLDF = @$LDF->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'", true);
                            ?>
                            <table class="tabela pequeno w381" style="float: left;"  cellpadding="5" cellspacing="0">						
                                <tr class="h18">
                                    <td colspan="5" style="border-width: 0 0 1px 0 " class="centro"><u>LIMIAR DE DETECÇÃO DA FALA</u></td> 
                                </tr>						
                                <tr class="h26" style="border-width:1px 1px 1px 0px" >
                                    <td class="w15" style="border-width:0px 0 0px 1px">Campo:</td>
                                    <td colspan="3" style="border-width:0px 0 0px 0px" class="w40 direita f10 "><?= ImprimeCampoLivreColor('E', @$rsAud[0]['LDF']) ?></td>

                                    <td style="border-width:1px  0px 1px 0" colspan="2"></td>
                                    <td style="border-width:1px  1px 1px 0">dB</td>
                                </tr>
                                <tr class="h25">
                                    <td style="border-width:1px 0 1px 1px" rowspan="2" >Fone:</td>
                                    <td colspan="2" class="w15" style="border-width:1px  0px 0px 0">O.D</td>
                                    <td align="right" style="border-width:1px  0px 0px 0" class="f10"><?= ImprimeCampoLivreColor('D', isset($rsLDF[0]['OD_dB']) ? @$rsLDF[0]['OD_dB'] : "") ?> </td>
                                    <td align="left" style="border-width:1px  1px 0px 0"> dB</td>

                                </tr>
                                <tr class="h25">	
                                    <td colspan="2" style="border-width:0px  0px 1px 0">O.E</td>
                                    <td class="w130 f10" align="right" style="border-width:0px  0px 1px 0"  ><?= ImprimeCampoLivreColor('E', isset($rsLDF[0]['OE_dB']) ? @$rsLDF[0]['OE_dB'] : "") ?> </td>
                                    <td class="w130" align="left" style="border-width:0px  1px 1px 0">dB</td>

                                </tr>
                            </table>
                        </div>
                        <div class="clear h25"></div>	
                        <div class="noFloat">
                            <?php
                            @$IRF = new obj('iprf');
                            @$rsIPRF = @$IRF->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'")
                            ?>
                            <table class="tabela pequeno w380" style="float: left;" border="0" cellpadding="5" cellspacing="0" >
                                <tr class="h18">
                                    <td colspan="7" style="border-width:0px 0 1px 0px" align="center" ><u>ÍNDICE DE RECONHECIMENTO DE FALA</u></td>  
                                </tr>
                                <tr class="h25" >
                                    <td colspan="2" style="border-width:0px 0px 0px 1px">Campo:</td>    
                                    <td style="border-width:0px 0px 1px 0px">dB</td>
                                    <td style="border-width:0px 0px 1px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado direita f10"><?= ImprimeColor('E', @$rsAud[0]['IRF_MONO']) ?></div></td>
                                    <td style="border-width:0px 0px 1px 0px">% mon.</td>
                                    <td style="border-width:0px 0px 1px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado  direita f10" ><?= ImprimeColor('E', @$rsAud[0]['IRF_DISSI']) ?></div></td>
                                    <td style="border-width:0px 1px 1px 0px">% dis.</td>
                                </tr>
                                <tr class="h25">
                                    <td style="border-width:1px 0px 1px 1px" rowspan="2" class="w80" >Fone:</td>
                                    <td style="border-width:0px 0px 0px 0px">OE</td>
                                    <td style="border-width:0px 0px 0px 0px">dB</td>
                                    <td style="border-width:0px 0px 0px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado direita f10"><?= ImprimeColor('D', isset($rsIPRF[0]['OD_dB']) ? (@$rsIPRF[0]['OD_Mono']) : "") ?></div></td>
                                    <td style="border-width:0px 0px 0px 0px">% mon.</td>
                                    <td style="border-width:0px 0px 0px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado direita f10"><?= ImprimeColor('D', isset($rsIPRF[0]['OD_dB']) ? (@$rsIPRF[0]['OD_Dissil']) : "") ?></div></td>
                                    <td style="border-width:0px 1px 0px 0px">% dis.</td>
                                </tr>
                                <tr class="h25">
                                    <td style="border-width:0px 0px 1px 0px">OD</td>
                                    <td style="border-width:0px 0px 1px 0px">dB</td>
                                    <td style="border-width:0px 0px 1px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado direita f10"><?= ImprimeColor('E', isset($rsIPRF[0]['OE_dB']) ? (@$rsIPRF[0]['OE_Mono']) : "") ?></div></td>
                                    <td style="border-width:0px 0px 1px 0px">% mon.</td>
                                    <td style="border-width:0px 0px 1px 0px"><div style="width:50px; padding:0 5px;" class="sublinhado  direita f10"><?= ImprimeColor('E', isset($rsIPRF[0]['OE_dB']) ? (@$rsIPRF[0]['OE_Dissil']) : "") ?></div>						</td>
                                    <td style="border-width:0px 1px 1px 0px">% dis.</td>
                                </tr>
                            </table>
                        </div>		
                        <div class="clear h25"></div>
                        <div class="nofloat">
                            <?php
                            @$LRF = new obj('lrf');
                            @$rsLRF = @$LRF->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'")
                            ?>
                            <table class="tabela pequeno w381" style="float: left;"  cellpadding="5" cellspacing="0">						
                                <tr class="h18">
                                    <td colspan="5" style="border-width: 0 0 1px 0 " class="centro"><u>LIMIAR DE RECEPÇÃO DA FALA</u></td> 
                                </tr>						
                                <tr class="h26">
                                    <td class="w15" style="border-width:0px 0 0px 1px">Campo:</td>
                                    <td colspan="3" style="border-width:0px 0 0px 0px" class="w80 direita f10"><?= ImprimeCampoLivreColor('E', @$rsAud[0]['LRF']) ?></td>
                                    <td style="border-width:1px  0px 1px 0" colspan="2"></td>
                                    <td style="border-width:1px  1px 1px 0;padding: 0 8px;">dB</td>
                                </tr>
                                <tr class="h25">
                                    <td style="border-width:1px 0 1px 1px" rowspan="2" >Fone:</td>
                                    <td colspan="2" class="w15" style="border-width:1px  0px 0px 0">O.D</td>
                                    <td align="right" style="border-width:1px  0px 0px 0" class="f10"><?= ImprimeCampoLivreColor('D', isset($rsLRF[0]['OD_dB']) ? (@$rsLRF[0]['OD_dB']) : "") ?> </td>
                                    <td align="left" style="border-width:1px  1px 0px 0">&nbsp;dB</td>							
                                </tr>
                                <tr class="h25">	
                                    <td colspan="2" style="border-width:0px  0px 1px 0">O.E</td>
                                    <td class="w130 f10" align="right" style="border-width:0px  0px 1px 0"><?= ImprimeCampoLivreColor('E', isset($rsLRF[0]['OE_dB']) ? (@$rsLRF[0]['OE_dB']) : "") ?>   </td>
                                    <td class="w130" align="left" style="border-width:0px  1px 1px 0"> &nbsp;dB</td>
                                     <!--<td><?= ImprimeMascaramento('E', isset($rsLRF[0]['OE_Masc'])) ?></td>--> 
                                </tr>
                            </table>
                        </div>
                        <div class="clear h25"></div>
                    </div>

                    <div class="Coluna2">
                        <div class="grafico noFloat  centro w390 h345" style="margin: 0;padding: 0">
                            <?php echo "<img class='centro' src='./OEOD_v1.php?Consulta=" . @$_GET['Consulta'] . "'/>"; ?>
                        </div>
                        <div class="noFloat  w381" style="margin: 0;padding: 0">
                            <?php
                            @$Mascaramento = new obj('mascaramento');
                            @$rsMascaramento = @$Mascaramento->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'")
                            ?>
                            <table class="tabela pequeno w326 auto" border="0" cellpadding="5" cellspacing="0" style="float:left;">
                                <tr>
                                    <td rowspan="4" valign="top" align="center" style="padding:6px 6px; border-width:0" ><b>MASCARAMENTO:</b></td>
                                </tr>
                                <tr>
                                    <td style="border-width:0;padding: 0 16px 0 15px; text-align: left;"><span>VA </span></td>
                                    <td style="border-width:0;padding:0" colspan="2"><span style='text-align:left; padding: 0px 25px 0 15px;float: left !important;' class="w140 esquerda sublinhado f10"><?= ImprimeColor(isset($rsMascaramento[0]['COR_VAR']), isset($rsMascaramento[0]['VA']) ? (@$rsMascaramento[0]['VA']) : "") ?></span></td>
                                </tr>
                                <tr>
                                    <td style="border-width:0; padding: 0 15px 0 15px;" align="left" rowspan="2" class="w35" > VO  </td>
                                    <td style="border-width:0;padding:0" >O.D</td>
                                    <td style="border-width:0;padding:0" ><span class="w160 esquerda  sublinhado f10 " style="text-align:left; padding: 0px 25px 0 15px;float: left !important;width: 123px;"  ><?= ImprimeColor('D', isset($rsMascaramento[0]['VOOD']) ? (@$rsMascaramento[0]['VOOD']) : "") ?></span></td>
                                </tr>
                                <tr>
                                    <td style="border-width:0;padding:0" >O.E</td>
                                    <td style="border-width:0;padding:0" ><span class="w206 esquerda sublinhado f10" style="text-align:left; padding: 0px 25px 0 15px;float: left !important;width: 123px;"  ><?= ImprimeColor('E', isset($rsMascaramento[0]['VOOE']) ? (@$rsMascaramento[0]['VOOE']) : "") ?></span></td>
                                </tr>
                            </table>
                            <br>
                        </div>
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

                        <div class="TecnicasUtilizadas nofloat h84 semmargem" style="margin-top:27px;margin-left: 0px;" >
                            <table class="tabela pequeno"  style='border:0px solid black'>
                                <tr><td STYLE="border: 0PX SOLID BLACK;text-align:left;"><b>TÉCNICA UTILIZADA</b></td></tr>
                                <tr><td style="border-width: 0"><?php
                                        foreach (@$rs as $linha) {
                                            echo '<div class="selecionado">' . utf8_encode(@$linha['Selecionado']) . '</div>';
                                        }
                                        ?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="clear h1"></div>
                <div class="Parecer">
                    <?php
                    unset($tabela);
                    unset($ordem);
                    unset($join);
                    unset($condicao);
                    unset($Campos);
                    unset($rs);
                    @$campos = 'p.Descricao, ma.Descricao as Monitoramento';
                    @$join[] = ' left join monitoramentoaudiologico ma on ma.Cod = p.MonitoramentoAudiologico ';
                    @$Parecer = new obj('parecer p');
                    @$rsParecer = @$Parecer->listar(@$campos, "MD5(Consulta) = '" . @$_GET['Consulta'] . "'", @$join);
                    ?>
                    <span class="memo2 h110">Parecer: <?= isset($rsParecer[0]['Descricao']) ? utf8_encode(nl2br(@$rsParecer[0]['Descricao'])) : ""; ?></span>
                </div>
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
                <?php
                @$moni = isset($rsParecer[0]) ? str_split(trim(@$rsParecer[0]['Monitoramento']), 5) : "x";
                ?>
                <div class="Monitoramento h25"> Monitoramento Audiológico: (<?= @$moni[0] == 'Trime' ? '&nbsp;x&nbsp;' : '&nbsp;&nbsp;&nbsp;'; ?> ) TRIMESTRAL &nbsp;&nbsp;&nbsp;
                    (<?= @$moni[0] == 'Semes' ? '&nbsp;x&nbsp;' : '&nbsp;&nbsp;&nbsp;'; ?>   ) SEMESTRAL &nbsp;&nbsp;&nbsp;          
                    (<?= @$moni[0] == 'Anual' ? '&nbsp;x&nbsp;' : '&nbsp;&nbsp;&nbsp;'; ?>   ) ANUAL&nbsp;&nbsp;&nbsp;
                    (<?= @$moni[0] == 'A Cri' ? '&nbsp;x&nbsp;' : '&nbsp;&nbsp;&nbsp;'; ?> ) A CRITÉRIO MÉDICO
                </div>
                <?php
                unset($tabela);
                unset($ordem);
                unset($join);
                unset($condicao);
                unset($Campos);
                unset($rs);
                @$classificacao = new obj('classificacao cc');
                @$condicao = "";
                @$ordem = "";
                @$Campos = "  concat( CASE ifnull(c.Cod,0) 
								    WHEN 0 THEN '(&nbsp;&nbsp;&nbsp;)'
								    ELSE '( x )' END,'   ', IFNULL(cc.Descricao,'')) as Selecionado   ";
                @$join = array("left  join consulta c on cc.cod = c.classificacao and MD5(c.cod) = '" . @$_GET['Consulta'] . "'");
                @$rs = @$classificacao->listar(@$Campos, @$condicao, @$join, @$ordem, null, null, false);
                ?>
                <div class="pequeno Classificacao h25">CLASSIFICAÇÃO:
                    <?php
                    foreach (@$rs as $linha) {
                        echo @$linha['Selecionado'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    ?>

                </div>			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    			  

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
    <style type="text/css">
        div.selecionado {
            float: left;
            padding-right: 7px;
        }
        .tabela tr td {
            border: 1px solid black;
            padding: 3px 5px;
        }
    </style>	 
</body>
</html>
