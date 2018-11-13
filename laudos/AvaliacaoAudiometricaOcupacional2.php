<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
    <head>
        <title>Avaliação Audiométrica Ocupacional</title>
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

        @$AudiometriaCampoLivre = new obj('audiometriacampolivre');
        @$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

        @$Equipamento = new obj('equipamento e');
        @$rsE = @$Equipamento->buscarByCondicao("Cod=0" . (@$rsCha[0]['Equipamento'] > 0 ? @$rsCha[0]['Equipamento'] : @$rsAud[0]['Equipamento']));
        ?>
        <body>
            <div class="paper">
                <div class="table">
                    <div class="Logo"><img alt="Clinica Copec" width="250px" src="./_img/LogoClinicaCopec.png" /></div>
                    <div class="Equipe">Katia Ribas<br> Luciana Zornig<br> Simone Bley</div>

                    <div class="clear h1"></div>
                    <div class="titulo">Avaliação Audiométrica Ocupacional</div>


                    <div class="descricao">Empresa:</div> 
                    <div class="sublinhado w500"> <?= utf8_encode(@$rsC[0]['Empresa']); ?></div>
                    <div class="descricao">Data do Exame:</div>
                    <div class="sublinhado w104"> <?= dataBR(@$rsC[0]['Data']); ?></div>
                    <div class="sublinhado w5"> </div>
                    <div class="clear h9"></div>

                    <div class="descricao">Nome:</div> 
                    <div class="sublinhado w500"> <?= utf8_encode($rsC[0]['PacienteNome']); ?></div>
                    <div class="descricao">RG:</div>
                    <div class="sublinhado w200">  <?= @$rsP[0]['RG'] ?> </div>
                    <div class="clear h9"></div>

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
                    <div class="descricao">Estado Civil:</div>
                    <div class="sublinhado w100">  
                    <?php 
                      switch ( substr(@$rsC[0]['EstadoCivil'],0,1)) {
                        case 's':echo 'Solteiro(a)';
                            break;
                        case 'c':echo 'Casado(a)';
                            break;
                        
                        case 'd':echo 'Divorciado(a)';
                            break;
                        
                        case 'v':echo 'Viuvo(a)';
                            break;
                        default:echo '';
                            break;
                    }
                     
                    



                    
                    
                    
                    ?> </div>
                    <div class="descricao">Data de Nascimento:</div>
                    <div class="sublinhado w120">  <?= dataBR(@$rsP[0]['DataNascimento']) ?> </div>
                    <div class="descricao">Idade:</div>
                    <div class="sublinhado w130">  <?= calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']); ?></div>
                    <div class="sublinhado w5"> </div>
                    <div class="sublinhado w1"> </div> 
                    <div class="clear"></div>
                    <div class="descricao">Data Calibração:</div>
                    <div class="sublinhado w100">  <?= isset($rsE) ? dataBR(@$rsE[0]['Calibracao']) : ""; ?></div>
                    <div class="descricao">Audiômetro:</div>
                    <div class="sublinhado w200">  <?= isset($rsE) ? utf8_encode(@$rsE[0]['Descricao']) : ""; ?></div>
                    <div class="descricao">Função: </div>
                    <div class="sublinhado w227"> <?= isset($rsC) ? utf8_encode(@$rsP[0]['Funcao']) : ""; ?></div>
                    <div class="clear h9"></div>
                    <div class="TipoExame">
                        <?php
                        @$TipoExame = new obj("tipoexame te");
                        @$camposTE = "       concat( te.Descricao,'&nbsp;&nbsp;&nbsp;', CASE ifnull(c.cod,0) 
							    WHEN 0 THEN '(&nbsp;&nbsp;&nbsp;&nbsp;)'
							    ELSE '( x )' END) as Selecionado";

                        @$joinTE = array('left join consulta c on c.TipoExame = te.Cod and MD5(c.cod) = \'' . @$_GET['Consulta'] . "'");
                        @$CondicaoTE = "te.ativo = 'S'";
                        @$OrdemTE = "te.descricao asc";
                        @$rsTE = @$TipoExame->listar(@$camposTE, @$CondicaoTE, @$joinTE, @$OrdemTE, null, null  );
                        foreach (@$rsTE as $TE) {
                            echo "<div class='selecionado'>";
                            echo utf8_encode(@$TE['Selecionado']);
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="clear"></div>
                    <div class="titulo">Dados Relevantes da Anamnese</div>
                    <?php
                    @$Parecer = new obj('parecer p');
                    @$rsParecer = @$Parecer->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                    ?>
                    <table>
                        <tr>
                        <tr>	
                            <td colspan='1' class='h100 memo2f memo2 centro'>
                    <?= utf8_encode(nl2br(@$rsParecer[0]['DadosAnamnese'])); ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                    unset($ordem);
                    unset($join);
                    unset($condicao);
                    unset($Campos);
                    unset($rs);
                    @$meatoscopia = new obj('meatoscopia m');
                    @$ordem = 'm.Cod';
                    @$condicao = "m.ativo = 'S'";
                    @$Campos = " concat( '<span class=\"w570\" style=\"float:none !important\"><span  style=\"float:none !important\" class=\"w80\">', IFNULL(m.Descricao,''),'</span>', CASE ifnull(cm.OD,'N') 
						    WHEN 'N' THEN '(&nbsp;&nbsp;&nbsp;&nbsp;)'
						    ELSE '(&nbsp;x&nbsp;)' END, 'OD&nbsp;&nbsp;',  CASE ifnull(cm.OE,'N') 
						    WHEN 'N' THEN '(&nbsp;&nbsp;&nbsp;&nbsp;)'
						    ELSE '(&nbsp;x&nbsp;)' END, 'OE</span>' ) as Selecionado  ";
                    @$join = array("inner join consulta_meatoscopia cm on cm.meatoscopia = m.cod and MD5(cm.consulta) = '" . @$_GET['Consulta'] . "'");
                    @$rs = @$meatoscopia->listar(@$Campos, @$condicao, @$join, @$ordem);
                    ?>
                    <table>
                        <tr>
                            <td class="w50">
                                <b>MEATOSCOPIA:</b>
                            </td>
                            <?php
                            @$complemento = "<td>";
                            foreach (@$rs as $linha) {
                                echo @$complemento;
                                echo utf8_encode(@$linha['Selecionado']);
                                echo "</td>";
                                @$complemento = "<tr><td></td><td>";
                            }
                            ?>
                        </tr>
                        <?php
                        @$lrf = new obj('lrf');
                        @$rsLRF = @$lrf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

                        @$ldf = new obj('ldf');
                        @$rsLDF = @$ldf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

                        @$iprf = new obj('iprf');
                        @$rsIPRF = @$iprf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        ?>
                    </table>
                    <div class="titulo">AUDIOGRAMA</div>
                    <div class="grafico w390 centro">OD</div>
                    <div class="grafico w390 centro">OE</div>
                    <div class="grafico centro w390">
    <?php echo " <img class='centro' src='./OD_v1.php?Consulta=" . @$_GET['Consulta'] . "'/>"; ?>
                        <table style="width: 80%;margin-left: 58px;" > 
                            <tr >
                                <td class="w10">LRF</td>
                                <td class="sublinhado w65 centro"><?= ImprimeCampoLivreColor('D', @$rsLRF[0]['OD_dB']) ?></td>
                                <td class="w10" style="float: left">dB</td>
                                <td class="w1">&nbsp;</td>
                                <td class="w10 ">IRF</td>
                                <td class="sublinhado w65 centro"><?= ImprimeColor('D', (@$rsIPRF[0]['OD_Mono'] == 0 || @$rsIPRF[0]['OD_Mono'] == null) ? @$rsIPRF[0]['OD_Dissil'] : @$rsIPRF[0]['OD_Mono']) ?></td>
                                <td class="w10 "style="float: left">%</td>
                            </tr>
                        </table>		
                    </div>
                    <div class="grafico centro w390">
                    <?php echo "<img class='centro' src='./OE_v1.php?Consulta=" . @$_GET['Consulta'] . "'/>"; ?>
                        <table style="width: 80%;margin-left: 58px; " > 

                            <tr >
                                <td class="w10 ">LRF</td>
                                <td class="sublinhado w65 centro"><?= ImprimeCampoLivreColor('E', @$rsLRF[0]['OE_dB']) ?></td>
                                <td class="w10 "style="float: left">dB</td>
                                <td class="w1">&nbsp;</td>
                                <td class="w10 ">IRF</td>
                                <td class="sublinhado w65 centro"><?= ImprimeColor('E', (@$rsIPRF[0]['OE_Mono'] == 0 || @$rsIPRF[0]['OE_Mono'] == null) ? @$rsIPRF[0]['OE_Dissil'] : @$rsIPRF[0]['OE_Mono']) ?></td>
                                <td class="w10 "style="float: left">%</td>
                            </tr>
                        </table>
                    </div>
                    <div class="clear"></div>
                    <div class="Parecer">
                        <div class="titulo">parecer audiológico</div>
                        <table>				
                            <tr>	
                                <td colspan='2' class='centro h106'>
                                    <?= utf8_encode(nl2br(@$rsParecer[0]['Descricao'])); ?> 
                                </td>
                            </tr>
                            <tr><td colspan="2"><small>* RELATA REPOUSO ACÚSTICO DE  <span class="sublinhado w40 centro" style="float:none !important;padding-left: 40px;"><?= @$rsC[0]['RRA']; ?></span>. (sic)</small></td></tr>



    <!--<tr> <td colspan="2" class="centro"><small>Avenida Silva Jardim, 2042 
                                                                            Condomínio Landmark - 14º andar 
                                                                            Rebouças - CEP: 80.250-200
                                                                            Curitiba - PR</small></td></tr>
    <tr> <td class="centro" colspan="2"> <small>e-mail: cpaa@bol.com.br</small></td></tr>-->
                        </table>			
                        <div class="clear"></div>
                        <table class="w300 centro pequeno assinatura" style="margin-left:42px; float:left;width:100%;height:65px">
                            <tr>
                                <td class="w230" style="border:0"> <div class="sublinhado w300 "></div></td>
                                <td class="w230" style="border:0"> <div class="sublinhado w300 "></div></td>
                            </tr>
                            <tr>
                                <td class="w230" style="border:0"> <div class="w300 ">ASSINATURA DO FUNCIONÁRIO</div></td>
                                <td class="w230" style="border:0"> <div class="w300 "><?php echo @$rsC[0]['Profissional1']; ?></div></td>
                            </tr>	
                            <tr>
                                <td class="w230" style="border:0"> <div class="w300 "></div></td>
                                <td class="w230" style="border:0"> <div class="w300 ">CRFa: <?php echo @$rsC[0]['CRFA1']; ?></div></td>
                            </tr>			
                        </table>
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