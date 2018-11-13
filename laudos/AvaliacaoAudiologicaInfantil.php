<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
<head>
<title>Exame Audiométrico - Infantil</title>
<link rel="stylesheet" type="text/css" href="./_css/style.css" />
</head>
<?php
if (isset($_GET['Consulta']) )
{
	include_once './_db/_autoload.php';
	include_once './_includes/function.php';

	@$Consulta = new obj('consulta c');
	@$rsC = @$Consulta->listar("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2 ","MD5(c.Cod) = '" .@$_GET['Consulta']."'", array("left join terceiro t2 on t2.cod = c.terceiro1","left join terceiro t1 on t1.cod = c.terceiro"));


	@$Paciente = new obj('paciente p');
	@$rsP = @$Paciente->buscarByCondicao("Cod =" .@$rsC[0]['Paciente'],false);

	@$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
	@$interval = @$date->diff( new DateTime( date("Y/m/d") ) ); // data definida

	@$Consulta_has_Audiometrico  =new obj('consulta_has_exameaudiometrico');
	@$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'");

	@$AudiometriaCampoLivre  =new obj('audiometriacampolivre');
	@$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'");

	@$Equipamento = new obj('equipamento e');
	if (isset($rsAud[0]['Equipamento']))
	@$rsE = @$Equipamento->buscarByCondicao("Cod=".@$rsAud[0]['Equipamento']);
	?>
<body>
	<div class="paper">
		<div class="table">
			<div class="descricao">Nome:</div>
			<div class="sublinhado w580">
			<?=utf8_encode(@$rsC[0]['PacienteNome']); ?>
			</div>
			<div class="descricao">Data:</div>
			<div class="sublinhado w100">
			<?=dataBR(@$rsC[0]['Data']); ?>
			</div>
			<div class="sublinhado w5"></div>
			<div class="clear"></div>

			<div class="descricao">Nacionalidade:</div>
			<div class="sublinhado  w150">
			<?=@$rsP[0]['Nacionalidade']?>
			</div>
			<div class="descricao">Data de Nascimento:</div>
			<div class="sublinhado w100">
			<?=dataBR(@$rsP[0]['DataNascimento']) ?>
			</div>
			<div class="descricao ">Sexo:</div>
			<div class="sublinhado w80">
			<?php switch (@$rsP[0]['Sexo']) {
				case 'M':echo 'Masculino'; break;
				case 'F':echo 'Feminino'; break;
				default:echo ''; break;
			}?>
			</div>
			<div class="descricao">Idade:</div>
			<div class="sublinhado w120">
			<?=calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']);?>
			</div>
			<div class="clear"></div>

			<div class="descricao">Audiômetro:</div>
			<div class="sublinhado w450">
			<?=isset($rsE[0]['Descricao'])?utf8_encode(@$rsE[0]['Descricao']):""?>
			</div>
			<div class="descricao">Calibração:</div>
			<div class="sublinhado w168">
			<?=isset($rsE[0]['Calibracao'])?dataBR(@$rsE[0]['Calibracao']):"";?>
			</div>
			<div class="clear"></div>
			<div class="titulo">INSTRUMENTOS E SONS AMBIENTAIS</div>
			<table class="tabela pequeno" style="margin-top: 0px" border="1"
				cellpadding="5" cellspacing="0">
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
				@$join = array ("left JOIN instrumentossonsambientais isa on i.Cod = isa.instrumento  and MD5(isa.consulta) = '" . @$_GET['Consulta']."'",
							   "left join tiporeacao tr on tr.Cod = isa.TipoReacao" );
				@$rs = @$InstrumentoSonsAmbientais -> listar(@$Campos,@$condicao,@$join,@$ordem);
				foreach (@$rs as $linha){
					?>
				<tr>
					<td><?php echo utf8_encode(@$linha['Instrumento'])?></td>
					<td style="text-align: center; font-weight: 900;"><?php echo utf8_encode((@$linha['Reagiu'] == 'S' ? "SIM":(@$linha['Reagiu'] == 'N'?"NÃO":""))) ?>
					</td>
					<td style="text-align: center; font-weight: 900;"><?php echo utf8_encode((@$linha['Forte'] == 'S' ? "SIM":(@$linha['Forte'] == 'N'?"NÃO":""))) ?>
					</td>
					<td style="text-align: center; font-weight: 900;"><?php echo utf8_encode((@$linha['Media'] == 'S' ? "SIM":(@$linha['Media'] == 'N'?"NÃO":""))) ?>
					</td>
					<td style="text-align: center; font-weight: 900;"><?php echo utf8_encode((@$linha['Fraca'] == 'S' ? "SIM":(@$linha['Fraca'] == 'N'?"NÃO":""))) ?>
					</td>
					<td style="font-weight: 900;"><?php echo utf8_encode(@$linha['TipoReacao'])?>
					</td>
				</tr>
				<?php }
				?>
			</table>
			<p>
			
			
			<div class="Coluna1">
				<div class="nofloat h95">
					<table class="tabela centro pequeno" style="height: 95px;">
						<tr>
							<td colspan="7">AUDIOMETRIA CAMPO LIVRE</td>
						</tr>
						<tr>
							<td class="w50">FREQ</td>
							<td class="w50">0,25k</td>
							<td class="w50">0,5k</td>
							<td class="w50">1k</td>
							<td class="w50">2k</td>
							<td class="w50">4k</td>
							<td class="w50">8k</td>
						</tr>
						<tr>
							<td colspan="01">INT. <br>dB</td>
							<td ><?=ImprimeColor('E',@$rsAud[0]['Freq025']) ?>
							</td>
							<td><?=ImprimeCampoLivre('E',@$rsAud[0]['Freq05']) ?>
							</td>
							<td><?=ImprimeCampoLivre('E',@$rsAud[0]['Freq1']) ?>
							</td>
							<td><?=ImprimeCampoLivre('E',@$rsAud[0]['Freq2']) ?>
							</td>
							<td><?=ImprimeCampoLivre('E',@$rsAud[0]['Freq4']) ?>
							</td>
							<td><?=ImprimeCampoLivre('E',@$rsAud[0]['Freq8']) ?>
							</td>
						</tr>
					</table>
				</div>
				<div class="nofloat h105">
				<?php
				@$LDF = new obj('ldf');
				@$rsLDF = @$LDF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
				?>
					<table class="tabela pequeno w185 h105"
						style="margin: 0px 10px 10px auto; height: 118px; float: left;"
						border="1" cellpadding="5" cellspacing="0">
						<tr>
							<td colspan="2">LIMIAR DE DETECÇÃO DA FALA</td>
							<td>MASC</td>
						</tr>
						<tr>
							<td class="w38">O.D</td>
							<td align="right"><?=ImprimeColor('D',@$rsLDF[0]['OD_dB']) ?> dB</td>
							<td class="f10" ><?=ImprimeMascaramento('D',@$rsLDF[0]['OD_Masc']) ?></td>
						</tr>
						<tr>
							<td>O.E</td>
							<td align="right"><?=ImprimeColor('E',@$rsLDF[0]['OE_dB']) ?> dB</td>
							<td class="f10" ><?=ImprimeMascaramento('E',@$rsLDF[0]['OE_Masc']) ?></td>
						</tr>
					</table>
					<?php
					@$LRF = new obj('lrf');
					@$rsLRF = @$LRF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
					?>
					<table class="tabela pequeno w185 h105"
						style="float: left; margin-top: 0px; height: 118px">
						<tr>
							<td colspan="2">LIMIAR DE RECEPÇÃO DA FALA</td>
							<td>MASC</td>
						</tr>
						<tr>
							<td class="w38">O.D</td>
							<td align="right"><?=ImprimeColor('D',@$rsLRF[0]['OD_dB']) ?> dB</td>
							<td><?=ImprimeMascaramento('D',@$rsLRF[0]['OD_Masc']) ?></td>
						</tr>
						<tr>
							<td>O.E</td>
							<td align="right"><?=ImprimeColor('E',@$rsLRF[0]['OE_dB']) ?> dB</td>
							<td><?=ImprimeMascaramento('E',@$rsLRF[0]['OE_Masc']) ?></td>
						</tr>
					</table>
				</div>
				<br>
				<div class="noFloat h130">
				<?php
				@$IRF = new obj('iprf');
				@$rsIPRF = @$IRF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
				?>
					<table class="tabela pequeno w380 h125" border="1" cellpadding="5"
						cellspacing="0">
						<tr>
							<td colspan="4" align="center">ÍNDICE DE RECONHECIMENTO DE FALA</td>
							<td>MASC</td>
						</tr>
						<tr>
							<td class="w38" rowspan="1">O.D.:</td>
							<td><span class="w89   direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_dB']) ?>
									dB</span></td>
							<td><span class="w89  sublinhado direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_Mono']) ?>%</span><br>
								<span class="w89 sublinhado direita"><?=ImprimeColor('D',@$rsIPRF[0]['OD_Dissil']) ?>%</span>
							</td>
							<td>monossílabos<br>dissílabos</td>
							<td><?=ImprimeMascaramento('D',@$rsIPRF[0]['OD_Masc']);?></td>
						</tr>
						<tr>
							<td class="w38" rowspan="1">O.E.:</td>
							<td><span class="w89  direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_dB']) ?>
									dB</span></td>
							<td><span class="w89 sublinhado direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_Mono']) ?>%</span><br>
								<span class="w89 sublinhado direita"><?=ImprimeColor('E',@$rsIPRF[0]['OE_Dissil']) ?>%</span>
							</td>
							<td>monossílabos<br>dissílabos</td>
							<td><?=ImprimeMascaramento('E',@$rsIPRF[0]['OE_Masc']);?></td>
						</tr>
					</table>
				</div>
				<div class="nofloat h105">
				<?php
				@$Mascaramento = new obj('mascaramento');
				@$rsMascaramento = @$Mascaramento->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" )
				?>
					<table class="tabela pequeno w185 h105" border="1" cellpadding="5"
						cellspacing="0" style="float: left;">
						<tr>
							<td colspan="3" align="center">MASCARAMENTO</td>
						</tr>
						<tr>
							<td>V.A <span style='padding: 0 5px;'><?=ImprimeColor(@$rsMascaramento[0]['COR_VAR'],@$rsMascaramento[0]['VA']) ?>
							</span></td>
						</tr>
						<tr>
							<td align="right">V.O O.D <span class="w130  sublinhado "><?=ImprimeColor('D',@$rsMascaramento[0]['VOOD']) ?>
							</span>
								<div class="clear"></div> O.E <span class="w130 sublinhado"><?=ImprimeColor('E',@$rsMascaramento[0]['VOOE']) ?>
							</span>
							</td>
						</tr>
					</table>
					<?php
					@$IRF = new obj('iprf');
					@$rsIPRF = @$IRF->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" );

					@$ldf = new obj('ldf');
					@$rsldf = @$ldf->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" );

					@$lrf = new obj('lrf');
					@$rslrf = @$lrf->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" );
					?>
					<table class="w169 h105 centro pequeno tabela"
						style="margin-left: 25px; float: left; border: 1px solid black;">
						<tr>
							<td colspan="3" align="center">CAMPO LIVRE</td>
						</tr>
						<tr>
							<td class="w10 direita" style="border: 0">LDF</td>
							<td class="w80" style="border: 0">
								<div class="sublinhado w100 direita">
								<?=ImprimeCampoLivre('E',@$rsAud[0]['LDF']) ?>
								</div></td>
							<td class="w10 esquerda" style="border: 0">dB</td>
						</tr>
						<tr>
							<td class="w10 direita" style="border: 0">LRF</td>
							<td class="w80" style="border: 0">
								<div class="sublinhado w100 direita">
								<?=ImprimeCampoLivre('E',@$rsAud[0]['LRF']) ?>
								</div></td>
							<td class="w10 esquerda" style="border: 0">dB</td>
						</tr>
						<tr>
							<td class="w10 direita" style="border: 0">IRF</td>
							<td class="w80" style="border: 0">
								<div class="sublinhado w100 direita">
								<?=ImprimeCampoLivre('E',@$rsAud[0]['IRF_MONO']) ?>
								</div></td>
							<td class="w10 esquerda" style="border: 0">%</td>
						</tr>
					</table>
				</div>

			</div>

			<div class="Coluna2">
				<div class="grafico noFloat  centro w390 h356">
				<?php 	echo "<img class='centro' src='./OEOD.php?Consulta=".@$_GET['Consulta']."'/>";?>
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
				@$join = array ("left join tecnicasutilizadas_has_consulta  tuc on tuc.tecnicasutilizadas_cod = tu.cod and MD5(tuc.Consulta) = '".@$_GET['Consulta']."'");
				@$rs = @$tecnicasutilizadas -> listar(@$Campos,@$condicao,@$join,@$ordem);
				//						_debug(@$rs);
				?>

				<div class="TecnicasUtilizadas nofloat h126 semmargem"
					style="margin-top: 27px; margin-left: 0px;">
					<table class="tabela pequeno h125" style='border: 1px solid black'>
						<tr>
							<td STYLE="border: 1PX SOLID BLACK; text-align: center">TÉCNICA
								UTILIZADA</td>
						</tr>
						<tr>
							<td><?php foreach (@$rs as $linha) {
								echo '<div class="selecionado">'.utf8_encode(@$linha['Selecionado']).'</div>';
							}?>
							</td>
						</tr>
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
		@$campos	='p.Descricao, ma.Descricao as Monitoramento';
		@$join[] = 'left join monitoramentoaudiologico ma on ma.Cod = p.MonitoramentoAudiologico ';
		@$Parecer = new obj('parecer p');
		@$rsParecer = @$Parecer->listar(@$campos, "MD5(Consulta) = '".@$_GET['Consulta']."'",@$join );
		?>
			<span class="memo2 h100">Parecer: <?=isset($rsParecer[0]['Descricao'])?utf8_encode(nl2br(@$rsParecer[0]['Descricao'])):"";?>
			</span>
		</div>
		<table class="w300 centro pequeno assinatura"
			style="margin-left: 42px; float: left; width: 100%; height: 65px">
			<tr>
				<td class="w230" style="border: 0">
					<div
						class="sublinhado w300 <?php @$profissional = @$rsC[0]['Profissional1']; echo (substr_count(@$profissional,'Ribas')?"ribas":(substr_count(@$profissional,'Zornig')?"zornig":(substr_count(@$profissional,'Bley')?"bley":"branco")));  ?>"></div>
				</td>
				<td class="w230" style="border: 0">
					<div
						class="sublinhado w300 <?php @$profissional = @$rsC[0]['Profissional2']; echo (substr_count(@$profissional,'Ribas')?"ribas":(substr_count(@$profissional,'Zornig')?"zornig":(substr_count(@$profissional,'Bley')?"bley":"branco")));  ?>"></div>
				</td>
			</tr>
		</table>
		<div class="clear"></div>
		<?php
		@$moni =isset($rsParecer[0])? str_split(trim(@$rsParecer[0]['Monitoramento']),5):"x";
		?>
		<div class="Monitoramento h25">
			Monitoramento Audiológico: (
			<?=@$moni[0]=='Trime'?'&nbsp;x&nbsp;':'&nbsp;&nbsp;&nbsp;'; ?>
			) TRIMESTRAL &nbsp;&nbsp;&nbsp; (
			<?=@$moni[0]=='Semes'?'&nbsp;x&nbsp;':'&nbsp;&nbsp;&nbsp;'; ?>
			) SEMESTRAL &nbsp;&nbsp;&nbsp; (
			<?=@$moni[0]=='Anual'?'&nbsp;x&nbsp;':'&nbsp;&nbsp;&nbsp;'; ?>
			) ANUAL&nbsp;&nbsp;&nbsp; (
			<?=@$moni[0]=='A Cri'?'&nbsp;x&nbsp;':'&nbsp;&nbsp;&nbsp;';  ?>
			) A CRITÉRIO MÉDICO
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
		@$join = array ("left  join consulta c on cc.cod = c.classificacao and MD5(c.cod) = '".@$_GET['Consulta']."'");
		@$rs = @$classificacao -> listar(@$Campos,@$condicao,@$join,@$ordem,null,null,false);
		?>
		<div class="pequeno Classificacao h25">
			CLASSIFICAÇÃO:
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
