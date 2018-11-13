<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
    <head>
        <title>RELATÓRIO DE AVALIAÇÃO DE PROCESSAMENTO AUDITIVO</title>
        <link rel="stylesheet" type="text/css" href="./_css/style.css" />
        <style type="text/css">
            td{ 
                /*border: 1px solid red;*/
            }
        </style>
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

                  
        @$lrf = new obj('lrf');
        @$rsLRF = @$lrf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

        @$ldf = new obj('ldf');
        @$rsLDF = @$ldf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");

        @$iprf = new obj('iprf');
        @$rsIPRF = @$iprf->buscarByCondicao("MD5(Consulta) = '" . @$_GET['Consulta'] . "'");
                        
        @$valoresreferencia = new obj('valoresreferencia');
        @$rsValoresreferencia = @$valoresreferencia->buscarByCondicao("Faixa = '" . @$_GET['Faixa'] . "'");                
        ?>
        <body>
            <div class="paper-branco">
                <table >
                    <tr>
                        <td><img width="250"  src="./_img/LogoClinicaCopec.png"/></td>
                        <!--<td>
                            <b>Fga. Luciana Zornig<br>
                            Especialista em Audiologia</b><br>
                            CRFa. PR-7372
                        </td>-->
                    </tr>
                </table>
                <table >
                    <tr>
                        <td class="titulo"><h4>RELATÓRIO DE AVALIAÇÃO DE PROCESSAMENTO AUDITIVO</h4></td>                       
                    </tr>
                </table>
                
                <table class="tabela2" >
                    <tr>
                        <td class="titulo bold" colspan="4">IDENTIFICAÇÃO</td>                       
                    </tr>
                    <tr>
                        <td width="8%">Nome:</td>
                        <td width="25%"><?= utf8_encode($rsC[0]['PacienteNome']); ?></td>
                        <td width="15%">Data de nascimento:</td>
                        <td width="25%"><?=dataBR(@$rsP[0]['DataNascimento']);?></td>
                    </tr>
                    <tr>
                        <td>Idade:</td>
                        <td><?=calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']);?></td>
                        <td>Data de avaliação:</td>
                        <td> <?= dataBR(@$rsC[0]['Data']); ?></td>
                    </tr>
                    <tr>
                        <td>Escolaridade:</td>
                        <td>???</td>
                        <td>Dominância manual:</td>
                        <td>???</td>
                    </tr>
                    <tr>
                        <td>Encaminhamento:</td>
                        <td>???</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Audiômetro:</td>
                        <td><?= isset($rsE) ? utf8_encode(@$rsE[0]['Descricao']) : ""; ?></td>
                        <td>Última calibração:</td>
                        <td><?= isset($rsE) ? dataBR(@$rsE[0]['Calibracao']) : ""; ?></td>
                    </tr>
                </table>
                <div class="clear h20"><br></div>
                <table class="tabela">
                    <tr class="h60">
                        <td width="10%" class="titulo bold">QUEIXA:</td>
                        <td></td>
                    </tr>
                </table>
                <div class="clear h20"><br></div>
                <table class="tabela-sem-borda">
                <tr >
                    <td class="titulo bold borda" colspan="13" width="75%">RESULTADOS</td>                       
                   <td class="sem-borda" ></td>    
                    <td Class="bold centro borda" colspan=6 width="25%">Valores de referência para a faixa etária</td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr>
                    <td class="borda-top borda-bottom borda-left">1. SRT:</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom">OD:</td>
                    <td class="borda-top borda-bottom"><?= ImprimeCampoLivreColor('D', @$rsLRF[0]['OD_dB']) ?></td>
                    <td class="borda-top borda-bottom">dB</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom">OE:</td>
                    <td class="borda-top borda-bottom"><?= ImprimeCampoLivreColor('E', @$rsLRF[0]['OE_dB']) ?></td>                    
                    <td class="borda-top borda-bottom">dB</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom borda-right"></td>                    
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-bottom borda-left"></td>        
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>            
                    <td class="borda-top borda-bottom borda-right "></td>                   
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td class="borda-top borda-bottom borda-left">2. IPRF (não sensibilizada):</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom">OD:</td>
                    <td class="borda-top borda-bottom"><?= ImprimeColor('D', (@$rsIPRF[0]['OD_Mono'] == 0 || @$rsIPRF[0]['OD_Mono'] == null) ? @$rsIPRF[0]['OD_Dissil'] : @$rsIPRF[0]['OD_Mono']) ?></td>
                    <td class="borda-top borda-bottom">%</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom">OE:</td>
                    <td class="borda-top borda-bottom"><?= ImprimeColor('E', (@$rsIPRF[0]['OE_Mono'] == 0 || @$rsIPRF[0]['OE_Mono'] == null) ? @$rsIPRF[0]['OE_Dissil'] : @$rsIPRF[0]['OE_Mono']) ?></td>                    
                    <td class="borda-top borda-bottom">%</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom borda-right"></td>                    
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-bottom borda-left"></td>      
                       <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>              
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[0]['Valor'])?></td>                   
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td class="borda-top borda-bottom borda-left">3. MLD:</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom">???</td>
                    <td class="borda-top borda-bottom">dB S/N</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom borda-right"></td>                    
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-bottom borda-left"></td>   
                       <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>                 
                    <td class="borda-top borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[1]['Valor'])?></td>                                  
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td class="borda-top borda-bottom borda-left">4. GIN:</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom"> </td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom">???</td>
                    <td class="borda-top borda-bottom">mseg.</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom borda-right"></td>                    
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-bottom borda-left"></td>                    
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[2]['Valor'])?></td>                               
                </tr>
                 <tr><td>&nbsp;</td></tr>                 
                <tr>
                    <td class="borda-top borda-bottom borda-left">5. SSI os PSI ??? (repetindo):</td>
                    <td class="borda-top borda-bottom">MCI relação -15</td>
                    <td class="borda-top borda-bottom">OD:</td>
                    <td class="borda-top borda-bottom">???</td>
                    <td class="borda-top borda-bottom">%</td>
                    <td class="borda-top borda-bottom">&nbsp;</td>
                    <td class="borda-top borda-bottom">OE:</td>
                    <td class="borda-top borda-bottom">???</td>                    
                    <td class="borda-top borda-bottom">%</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom">&nbsp;</td>                    
                    <td class="borda-top borda-bottom borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-bottom borda-left"></td>                    
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom"></td>
                    <td class="borda-top borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[3]['Valor'])?></td>                                   
                </tr>
                <tr><td>&nbsp;</td></tr>
                 <tr>
                    <td class="borda-top borda-left">6. PPS:</td>
                    <td class="borda-top">Imitando OD+OE:</td>
                    <td class="borda-top">???</td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top">&nbsp;</td>
                    <td class="borda-top ">Nomeando OD+OE:</td>
                    <td class="borda-top ">???</td>                    
                    <td class="borda-top "></td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top  borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-left"></td>                    
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top borda-right ">Versão Musiek</td>                   
                </tr>
                <tr>
                    <td class="borda-left">(880-1122 Hz)</td>
                    <td class="">Acertos:</td>
                    <td class="">???</td>
                    <td class="">%</td>
                    <td class=""></td>
                    <td class="">&nbsp;</td>
                    <td class="">Acertos:</td>
                    <td class="">???</td>                    
                    <td class="">%</td>                    
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "><?=utf8_encode(@$rsValoresreferencia[3]['Valor'])?></td>                   
                </tr>                
                <tr>
                    <td class=" borda-bottom borda-left"></td>
                    <td class=" borda-bottom">Inversões:</td>
                    <td class=" borda-bottom">???</td>
                    <td class=" borda-bottom">%</td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom">&nbsp;</td>
                    <td class=" borda-bottom">Inversões:</td>
                    <td class=" borda-bottom">???</td>                    
                    <td class=" borda-bottom">%</td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-bottom borda-left"></td>                    
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom borda-right "></td>                   
                </tr>                
                 <tr><td>&nbsp;</td></tr>
                 <tr>
                    <td class="borda-top borda-left">7. DCV:</td>
                    <td class="borda-top" colspan=2>Atenção livre:</td>
                    
                    <td class="borda-top">OD:</td>
                    <td class="borda-top">???</td>
                    <td class="borda-top">%</td>
                    <td class="borda-top ">OE:</td>
                    <td class="borda-top ">???</td>                    
                    <td class="borda-top ">%</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top  borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-left"></td>                    
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top borda-right ">	Versão Musiek</td>                   
                </tr>                              
                <tr>
                    <td class=" borda-bottom borda-left"></td>
                    <td class=" borda-bottom" colspan=2>Atenção dirigida</td>
                    <td class=" borda-bottom"></td>
                    
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom">&nbsp;</td>
                    <td class=" borda-bottom">OE:</td>
                    <td class=" borda-bottom">???</td>                    
                    <td class=" borda-bottom">%</td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                                  
                    <td class=" borda-bottom borda-right"></td>       
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-bottom borda-left"></td>                    
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class="borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[4]['Valor'])?></td>                          
                </tr>                
                 <tr><td>&nbsp;</td></tr>
                 <tr>
                    <td class="borda-top borda-left" colspan=2>8. Dicótico de dígitos:</td>
                    
                    <td class="borda-top"></td>
                    <td class="borda-top">OD:</td>
                    <td class="borda-top">???</td>
                    <td class="borda-top">%</td>
                    <td class="borda-top ">OE:</td>
                    <td class="borda-top ">???</td>    
                    <td class=" borda-top">%</td>                    
                    <td class=" borda-top"></td>                    
                    <td class=" borda-top"></td>                    
                    <td class=" borda-top"></td>                 
                    <td class="borda-top  borda-right"></td>     

                                                       
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-left"></td>                    
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top borda-right "><?=utf8_encode(@$rsValoresreferencia[6]['Valor'])?></td>                   
                </tr>                              
                <tr>
                    <td class=" borda-bottom borda-left">Atenção dirigida</td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    
                    <td class=" borda-bottom">OD:</td>
                    <td class=" borda-bottom">???</td>
                    <td class=" borda-bottom">%</td>
                    <td class=" borda-bottom">OE:</td>
                    <td class=" borda-bottom">???</td>                    
                    <td class=" borda-bottom">%</td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                    
                    <td class=" borda-bottom"></td>                                    
                    <td class=" borda-bottom borda-right"></td>     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-bottom borda-left"></td>                    
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom"></td>
                    <td class=" borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[7]['Valor'])?></td>                   
                </tr>                
                <tr><td>&nbsp;</td></tr>
                 <tr>
                    <td class="borda-top borda-left">9. SSW:</td>
                    <td class="borda-top"></td>
                    <td class="borda-top">DC:</td>
                    <td class="borda-top">???</td>
                    <td class="borda-top">%</td>
                    <td class="borda-top">&nbsp;</td>
                    <td class="borda-top ">EC:</td>
                    <td class="borda-top ">???</td>                    
                    <td class="borda-top ">%</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top ">&nbsp;</td>                    
                    <td class="borda-top  borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-top borda-left"></td>                    
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top"></td>
                    <td class="borda-top borda-right "><?=utf8_encode(@$rsValoresreferencia[8]['Valor'])?></td>                   
                </tr>
                 <tr>
                    <td class=" borda-left"></td>
                    <td class=""></td>
                    <td class="">DNC:</td>
                    <td class="">???</td>
                    <td class="">%</td>
                    <td class="">&nbsp;</td>
                    <td class=" ">ENC:</td>
                    <td class=" ">???</td>                    
                    <td class=" ">%</td>                    
                    <td class=" ">&nbsp;</td>                    
                    <td class=" ">&nbsp;</td>                    
                    <td class=" ">&nbsp;</td>                    
                    <td class="borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=" borda-right "></td>                   
                </tr>
                <tr>
                    <td class="borda-left"></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="">&nbsp;</td>
                    <td class=""></td>
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=""></td>                    
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "></td>                   
                </tr>                
                <tr>
                    <td class="borda-left"></td>
                    <td class=""></td>
                    <td class="">DNC</td>
                    <td class="">DC</td>
                    <td class="">EC</td>
                    <td class="">ENC</td>
                    <td class=""></td>
                    <td class=""></td>       
                    <td class="">ENC</td>
                    <td class="">EC</td>
                    <td class="">DC</td>
                    <td class="">DNC</td>             
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "></td>                   
                </tr>                
                <tr>
                    <td class="borda-left"></td>
                    <td class=""></td>
                    <td class="">???</td>
                    <td class="">???</td>
                    <td class="">???</td>
                    <td class="">???</td>
                    <td class=""></td>
                    <td class=""></td>       
                    <td class="">???</td>
                    <td class="">???</td>
                    <td class="">???</td>
                    <td class="">???</td>             
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "></td>                   
                </tr>                
                <tr>
                    <td class="borda-left">Efeito auditivo:</td>
                    <td class=""></td>
                    <td class="">???</td>
                    <td class="">/</td>
                    <td class="">???</td>
                    <td class="">=</td>
                    <td class="">???</td>
                    <td class=""></td>       
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>             
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "><?=utf8_encode(@$rsValoresreferencia[9]['Valor'])?></td>                   
                </tr>                
                <tr>
                    <td class="borda-left">Efeito de ordem:</td>
                    <td class=""></td>
                    <td class="">???</td>
                    <td class="">/</td>
                    <td class="">???</td>
                    <td class="">=</td>
                    <td class="">???</td>
                    <td class=""></td>       
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>             
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "><?=utf8_encode(@$rsValoresreferencia[10]['Valor'])?></td>                   
                </tr>                
                              
                             
                     <tr>
                    <td class="borda-left">Inversões:</td>
                    <td class=""></td>
                    <td class="">???</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>       
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>             
                    <td class=" borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class=" borda-left"></td>                    
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="borda-right "><?=utf8_encode(@$rsValoresreferencia[11]['Valor'])?></td>                   
                </tr>           
                <tr>
                    <td class="borda-bottom borda-left">Tipo A:</td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom" colspan=4>Não significativo</td>                                        
                    
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>       
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>             
                    <td class="borda-bottom borda-right"></td>                     
                    <td class="sem-borda" ></td>                    
                    <td class="borda-bottom borda-left"></td>                    
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom"></td>
                    <td class="borda-bottom borda-right "><?=utf8_encode(@$rsValoresreferencia[12]['Valor'])?></td>                   
                </tr>  
               
            </table>
            <table class="tabela-sem-borda">               
                <tr><td colspan=20 class="centro">Rua Nilo Peçanha, 602   -   Bom Retiro   -   CEP- 80.520-176  Curitiba - PR<br>Fone/Fax: (41) 3253-5450/9908-7191   nadja.back@clinicacognitiva.com.br</td></tr>
				</table>                
        </div>
        <div class="paper-branco quebrapagina">
            <table >
                <tr>
                    <td><img src="./_img/LogoClinicaCopec.png"/></td>
                    <td>
                        <b>Fga. Luciana Zornig<br>
                        Especialista em Audiologia</b><br>
                        CRFa. PR-7372
                    </td>
                </tr>
            </table>
            <table class="tabela-sem-borda centro ">
                <tr><td class="esquerda bolder borda-left borda-right borda-top">ANÁLISE DOS RESULTADOS:</td></tr>
                <tr><td class="esquerda h240 borda-left borda-right borda-bottom"> 
                ???
                </td></tr>  
                </table>
                <div class="clear h50"><br></div>                
                <table class="tabela-sem-borda centro ">
                <tr><td class="esquerda bolder borda-left borda-right borda-top">COMENTÁRIOS:</td></tr>
                <tr><td class="esquerda h240 borda-left borda-right borda-bottom"> 
                ???																	
                </td></tr>                        
            </table>
            <div class="clear h50"><br></div>
             <table class="tabela-sem-borda centro ">
                <tr>
                    <td class="esquerda h240 bolder borda-left borda-bottom borda-top">COMENTÁRIO FINAL:</td> 
                <td class="centro h240 borda-top borda-bottom borda-right"> 
                ???
               </td></tr> 
            </table>
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
            <div class="clear h20"><br></div>
            <table class="tabela-sem-borda">               
            <tr><td colspan=20 class="centro">Rua Nilo Peçanha, 602   -   Bom Retiro   -   CEP- 80.520-176  Curitiba - PR<br>Fone/Fax: (41) 3253-5450/9908-7191   nadja.back@clinicacognitiva.com.br</td></tr>
            </table>
 
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