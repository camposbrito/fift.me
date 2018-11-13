<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
<head>
 	<title>AUDIOMETRIA</title>
<link rel="stylesheet" type="text/css" href="./_css/style.css" />
</head>
<?php
	if (isset($_GET['Consulta']))
	{ 
		include_once './_db/_autoload.php';
		include_once './_includes/function.php';
	
		@$Consulta = new obj('consulta c');
		@$rsC = @$Consulta->listar("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2, t1.CRFA as CRFA1, t2.CRFA as CRFA2 ","MD5(c.Cod) = '" .@$_GET['Consulta']."'", array("left join terceiro t2 on t2.cod = c.terceiro1","left join terceiro t1 on t1.cod = c.terceiro"));
		
		@$Paciente = new obj('paciente p');
		@$rsP = @$Paciente->buscarByCondicao("Cod=" .@$rsC[0]['Paciente']);
		
		@$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
		@$interval = @$date->diff( new DateTime( date("Y/m/d") ) ); // data definida
		
		@$Consulta_has_Audiometrico  =new obj('consulta_has_exameaudiometrico');
		@$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'");
		
		@$AudiometriaCampoLivre  =new obj('audiometriacampolivre');
		@$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" ,true);
				
		
		@$Equipamento = new obj('equipamento e');
		@$rsE = @$Equipamento->buscarByCondicao("Cod=0".(@$rsCha[0]['Equipamento']>0?@$rsCha[0]['Equipamento']:@$rsAud[0]['Equipamento']));
?>
<body>
	<div class="paper">
		<div class="table">
			<div class="descricao">Nome:</div> 
			<div class="sublinhado w580"> <?=utf8_encode(@$rsC[0]['PacienteNome']); ?></div>
			<div class="descricao">Data:</div>
			<div class="sublinhado w100"> <?=dataBR(@$rsC[0]['Data']); ?></div>
			<div class="sublinhado w5"> </div>
			
			<div class="clear"></div>
			
			<div class="descricao">RG:</div>
			<div class="sublinhado w200">  <?=@$rsP[0]['RG'] ?> </div>
			<div class="descricao">Data de Nascimento:</div>
			<div class="sublinhado w200">  <?=dataBR(@$rsP[0]['DataNascimento']) ?> </div>
			<div class="descricao">Idade:</div>
			<div class="sublinhado w150">  <?=calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento'])?></div>
			<div class="sublinhado w5"> </div>
			<div class="sublinhado w1"> </div> 
			<div class="clear"></div>
			
			<div class="descricao">Nacionalidade: </div>
			<div class="sublinhado  w250"> <?=@$rsP[0]['Nacionalidade']?> </div>
			<div class="descricao ">Sexo: </div>
			<div class="sublinhado w100"> 
				<?php switch (@$rsP[0]['Sexo']) {
					case 'M':echo 'Masculino'; break;
					case 'F':echo 'Feminino'; break;
					default:echo ''; break;
				}?>
			</div>
			<div class="descricao">Profissão: </div>
			<div class="sublinhado w200"> <?=isset($rsP)?utf8_encode(@$rsP[0]['Funcao']):"";?></div>
			<div class="sublinhado w1"> </div>
			<div class="sublinhado w5"> </div>
			
			<div class="clear"></div>
			
			<div class="descricao">Audiômetro:</div>
			<div class="sublinhado w450">  <?=isset($rsE)?utf8_encode(@$rsE[0]['Descricao']):"";?></div>
			<div class="descricao">Calibração:</div>
			<div class="sublinhado w150">  <?=isset($rsE)?dataBR(@$rsE[0]['Calibracao']):"";?></div>
			<div class="sublinhado w5"> </div>
			<div class="sublinhado w1"> </div>
			<div class="clear"></div>
			
			<div class="titulo">AUDIOMETRIA</div>
			<div class="clear"></div>
			
			<div class="grafico w390 centro">OD</div>
			<div class="grafico w390 centro">OE</div>
			<div class="clear"></div>
			<div class="grafico centro w390">
					<?php 	echo " <img class='centro' src='./OD.php?Consulta=".@$_GET['Consulta']."'/>";?>
			</div>
			<div class="grafico centro w390">
					<?php 	echo "<img class='centro' src='./OE.php?Consulta=".@$_GET['Consulta']."'/>";?>
			</div>
			<div class="clear"></div>
			<div class="TresCol">
				<div class="col1">
					<?php 
						@$LRF = new obj('lrf');
						@$rsLRF = @$LRF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
					?>
					<table class="tabela" style="height: 122px;">
						<tr><td colspan="2">LIMIAR DE RECEPÇÃO DA FALA</td> <td>MASC</td></tr>
						<tr><td>O.D</td><td align="right" ><?=ImprimeCampoLivreColor('D',@$rsLRF[0]['OD_dB']) ?> dB</td><td class="f10"><?=ImprimeMascaramento('D',@$rsLRF[0]['OD_Masc']) ?></td></tr>
						<tr><td>O.E</td><td align="right"  ><?=ImprimeCampoLivreColor('E',@$rsLRF[0]['OE_dB']) ?> dB</td><td class="f10"><?=ImprimeMascaramento('E',@$rsLRF[0]['OE_Masc']) ?></td></tr>
					</table>
				</div>
				<div class="col2">
					<?php 
						@$LDF = new obj('ldf');
						@$rsLDF = @$LDF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta'] ."'")
					?>
					<table class="tabela" style="height: 122px;" border="1" cellpadding="5" cellspacing="0">
						<tr><td colspan="2">LIMIAR DE DETECÇÃO DA FALA</td> <td>MASC</td></tr>
						<tr><td>O.D</td><td align="right"><?=ImprimeCampoLivreColor('D',@$rsLDF[0]['OD_dB']) ?> dB</td><td class="f10"><?=ImprimeMascaramento('D',@$rsLDF[0]['OD_Masc']) ?></td></tr>
						<tr><td>O.E</td><td align="right"><?=ImprimeCampoLivreColor('E',@$rsLDF[0]['OE_dB']) ?> dB</td><td class="f10"><?=ImprimeMascaramento('E',@$rsLDF[0]['OE_Masc']) ?></td></tr>
					</table>
				</div>
				<div class="col3">
					<?php 
						@$Mascaramento = new obj('mascaramento');
						@$rsMascaramento = @$Mascaramento->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
					?>
					<table class="tabela" border="1" cellpadding="5" cellspacing="0">
						<tr><td colspan="3" align="center">MASCARAMENTO</td></tr>
						<tr><td>V.A <span class="f10" style='padding: 0 5px;'><?=ImprimeColor(@$rsMascaramento[0]['COR_VAR'],@$rsMascaramento[0]['VA']) ?></span></td></tr>
						<tr><td align="right">V.O  O.D  <span class="w175 sublinhado f10 "><?=ImprimeColor('D',@$rsMascaramento[0]['VOOD']) ?></span>
									 <div class="clear"></div>
									 O.E <span class="w175 sublinhado f10"><?=ImprimeColor('E',@$rsMascaramento[0]['VOOE'])?></span>
						</td></tr>
					</table>
					
					
				</div>
			</div>
			<div class="clear"></div>
			<div class="DuasCol">
				<div class="col4">
					<?php 
						@$IRF = new obj('iprf');
						@$rsIPRF = @$IRF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
					?>
					<table class="tabela" border="1" cellpadding="5" cellspacing="0">
						<tr><td colspan="4" align="center">ÍNDICE DE RECONHECIMENTO DE FALA</td> <td>MASC</td></tr>
						<tr>
							<td rowspan="1">O.D.:</td>
							<td><span class="w89 sublinhado direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_dB']) ?> dB</span></td>
							<td><span class="w89 sublinhado direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_Mono']) ?>%</span><br>
							<span class="w89 sublinhado direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_Dissil']) ?>%</span></td>
							<td>monossílabos<br>dissílabos</td>
							<td><?=ImprimeMascaramento('D',@$rsIPRF[0]['OD_Masc']);?></td>
						</tr>
						<tr>
							<td rowspan="1">O.E.:</td>
							<td><span class="w89 sublinhado direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_dB']) ?> dB</span></td>
							<td><span class="w89 sublinhado direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_Mono']) ?>%</span><br>
							<span class="w89 sublinhado direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_Dissil']) ?>%</span></td>
							<td>monossílabos<br>dissílabos</td>
							<td><?= ImprimeMascaramento('E',@$rsIPRF[0]['OE_Masc']);?></td>
						</tr>
					</table>
				</div>
				<div class="col5">
				
					<?php 
						@$weber = new obj('weber');
						@$rsWeber = @$weber->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'")
					?>
					<table class="tabela" border="1" cellpadding="5" cellspacing="0" style="width:331px;height: 136px;;">
						<tr><td colspan="6" align="center">WEBER</td></tr>
						<tr>
							<td rowspan="3" >O.D.:</td>
							<td rowspan="3" valign="top">
								0,5kHz 
								<br><br>
								<?=@$rsWeber[0]['Faixa_500_OE']=='S'?SetaEsquerda():"";?>								 
								<br>
								<?=@$rsWeber[0]['Faixa_500_OD']=='S'?SetaDireita():"";?>
							</td>
							<td rowspan="3" valign="top">
							1kHz 
							<br><br>
								<?=@$rsWeber[0]['Faixa_1000_OE']=='S'?SetaEsquerda():"";?>								 
								<br>                  
								<?=@$rsWeber[0]['Faixa_1000_OD']=='S'?SetaDireita():"";?>
							</td>
							<td rowspan="3" valign="top">2kHz 
							<br><br>			
								<?=@$rsWeber[0]['Faixa_2000_OE']=='S'?SetaEsquerda():"";?>								 
								<br>
								<?=@$rsWeber[0]['Faixa_2000_OD']=='S'?SetaDireita():"";?>
								</td>
							<td rowspan="3" valign="top">4kHz 
							<br><br>
								<?=@$rsWeber[0]['Faixa_4000_OE']=='S'?SetaEsquerda():"";?>								 
								<br>
								<?=@$rsWeber[0]['Faixa_4000_OD']=='S'?SetaDireita():"";?></td>
							<td rowspan="3">O.E.:</td>
						</tr>
					</table>	
				</div>
			</div>
			<div class="clear"></div>
			<div class="Parecer">
					<?php

						@$campos	='p.Descricao, ma.Descricao as Monitoramento';
						@$join[] = 'left join monitoramentoaudiologico ma on ma.Cod = p.MonitoramentoAudiologico '; 
						
						@$Parecer = new obj('parecer p');
						@$rsParecer = @$Parecer->listar(@$campos, "MD5(Consulta) = '".@$_GET['Consulta']."'",@$join );
					?>
				<table>				
				 
					<tr class="memo2"><td >Parecer: <?=isset($rsParecer[0])?utf8_encode(nl2br(@$rsParecer[0]['Descricao'])):""; ?></td>
					</tr>
				</table>			
			</div>
			<div class="clear"></div>
			<?php
				@$moni =isset($rsParecer[0])? str_split(trim(@$rsParecer[0]['Monitoramento']),5):"x";
			?>
			<div class="Monitoramento"> Monitoramento Audiológico: (<?=@$moni[0]=='Trime'?' x ':'&nbsp;&nbsp;&nbsp;'; ?> ) TRIMESTRAL &nbsp;&nbsp;&nbsp;
																   (<?=@$moni[0]=='Semes'?' x ':'&nbsp;&nbsp;&nbsp;'; ?>   ) SEMESTRAL &nbsp;&nbsp;&nbsp;          
																   (<?=@$moni[0]=='Anual'?' x ':'&nbsp;&nbsp;&nbsp;'; ?>   ) ANUAL&nbsp;&nbsp;&nbsp;
																   (<?=@$moni[0]=='A Cri'?' x ':'&nbsp;&nbsp;&nbsp;';  ?> ) A CRITÉRIO MÉDICO
			</div>
			<div class="clear"></div>
			<table class="w300 centro pequeno assinatura" style="margin-left:42px; float:left;width:100%;height:65px">
			<tr>
				<td class="w230" style="border:0"> <div class="<?php echo (isset($rsC[0]['Profissional2']) && trim($rsC[0]['Profissional2'])) ?'sublinhado' : '';  ?> w300 "></div></td>
				<td class="w230" style="border:0"> <div class="sublinhado w300 "></div></td>
			</tr>
			<tr>
				<td class="w230" style="border:0"> <div class="w300 "><?php echo @$rsC[0]['Profissional2'];?></div></td>
				<td class="w230" style="border:0"> <div class="w300 "><?php echo @$rsC[0]['Profissional1'];?></div></td>
			</tr>	
			<tr>
				<td class="w230" style="border:0"> <div class="w300 "><?php echo (isset($rsC[0]['Profissional2']) && trim($rsC[0]['Profissional2'])) ?'CRFa:' : '';  ?> <?php echo @$rsC[0]['CRFA2'];?></div></td>
				<td class="w230" style="border:0"> <div class="w300 ">CRFa: <?php echo @$rsC[0]['CRFA1'];?></div></td>
			</tr>			
			</table>
			<div class="clear"></div>
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
						@$join = array ("left  join consulta c on cc.cod = c.classificacao and  MD5(c.cod) = '".@$_GET['Consulta']."'");
						@$rs = @$classificacao -> listar(@$Campos,@$condicao,@$join,@$ordem,null,null,false);
			?>
			<div class="pequeno Classificacao">CLASSIFICAÇÃO:
			<?php 
				foreach (@$rs as $linha){
					echo @$linha['Selecionado'];
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
				}
			
			?>
			
			</div>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    			  
		
		</div>
	</div> 
		<script type="text/javascript">
	function PrintWindow() { 
		window.print(); 
		CheckWindowState(); 
	} 

	function CheckWindowState() { 
		if(document.readyState=="complete") { 
			window.close(); 
		} else { 
			setTimeout("CheckWindowState()", 10) 
		} 
	} 
//	PrintWindow();
</script> 
	<?php }?>
</body>
</html>