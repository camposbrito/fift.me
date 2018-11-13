<!DOCTYPE unspecified PUBLIC "-//W3C//Ddiv HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.ddiv">
<html>
<head>
 	<title>Impedanciometria</title>
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
	
	@$Impedanciometria  =new obj('impedanciometria i');
	@$rsImp = @$Impedanciometria->buscarByCondicao("MD5(i.Consulta) = '".@$_GET['Consulta']."'");
	
	if (@$rsImp[0]['Equipamento'] > 0){
		@$Equipamento = new obj('equipamento e');
		@$rsE = @$Equipamento->buscarByCondicao("Cod=".@$rsImp[0]['Equipamento']);

		@$Equipamento_Calibracao = new obj('equipamento_calibracao ec');
        @$rsEC = @$Equipamento_Calibracao->buscarByCondicao("Cod=0" . @$rsImp[0]['equipamento_calibracao'], true);
  
	}
?>
<body>
	<div class="paper">
		<div class="table">
			<div class="descricao">Nome:</div> 
			<div class="sublinhado w580"> <?=utf8_encode(@$rsC[0]['PacienteNome']); ?></div>
			<div class="descricao">Data:</div>
			<div class="sublinhado w100"> <?=dataBR(@$rsC[0]['Data']); ?></div>
			<div class="sublinhado w5"> </div>
			<div class="clear h2"></div>
			<div class="descricao">RG:</div>
			<div class="sublinhado w200">  <?=@$rsP[0]['RG'] ?> </div>
			<div class="descricao">Data de Nascimento:</div>
			<div class="sublinhado w200">  <?=dataBR(@$rsP[0]['DataNascimento']) ?> </div>
			<div class="descricao">Idade:</div>
			<div class="sublinhado w146">  <?=(calculaIdade(@$rsC[0]['Data'], @$rsP[0]['DataNascimento']));?></div>
			<div class="sublinhado w5"> </div>
			<div class="sublinhado w1"> </div> 
			<div class="clear h2"></div>
			
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
			
			<div class="clear h2"></div>
			
			<div class="descricao">Impedanciômetro</div>
			<div class="sublinhado w450">  <?=isset($rsE)?utf8_encode(@$rsE[0]['Descricao']):"";?></div>
			<div class="descricao">Calibração:</div>
			<div class="sublinhado w140">  <?= isset($rsEC) ? dataBR(@$rsEC[0]['Calibracao']) : ""; ?></div>
			<div class="clear h1"></div>
			<div class="titulo">Impedanciometria</div>
			<div class="clear h1"></div>
			<table class="tabela w600 centro pequeno">
			<tr>
				<td style="border: 0"></td>
				<td style="border: 0"></td>
				<td class="w75">DIREITO</td>
				<td class="w75">ESQUERDO</td>
			</tr>			
			<?php 
				@$Meatoscopia = new obj('meatoscopia');
				if (@$rsImp[0]['Meatoscopia_OD'] > 0)
					@$Meatoscopia_OD = @$Meatoscopia->buscarByCondicao("Cod = ".@$rsImp[0]['Meatoscopia_OD']);
				if (@$rsImp[0]['Meatoscopia_OE'] > 0)
				@$Meatoscopia_OE = @$Meatoscopia->buscarByCondicao("Cod = ".@$rsImp[0]['Meatoscopia_OE']);
			?>
			<tr>
				<td colspan="2">MEATOSCOPIA</td>
				<td class="f10"><?=ImprimeColor('D',utf8_encode(isset($Meatoscopia_OD)?@$Meatoscopia_OD[0]['Descricao']:"")); ?> </td>
				<td class="f10"><?=ImprimeColor('E',utf8_encode(isset($Meatoscopia_OE)?@$Meatoscopia_OE[0]['Descricao']:"")); ?> </td>
			</tr>			
			<tr>
				<td colspan="2">PRESSÃO DE ORELHA MÉDIA</td>
				<td class="f10"><?=ImprimeColor('D',@$rsImp[0]['PressaoOMLD']);?>daPa</td>
				<td class="f10"><?=ImprimeColor('E',@$rsImp[0]['PressaoOMLE']);?>daPa</td>
			</tr>			
			<tr>
				<td colspan="2">
					COMPLACÊNCIA<br>
					<table class="sem_borda pequeno">
						<tr>
							<td class="direita">MÁXIMO RELAXAMENTO</td>
							<td class="w25">OD</td>
							<td class="w50 sublinhado f10" style="border-bottom: 1px solid black !important;"><?=ImprimeColor('D',@$rsImp[0]['ComplacenciaOD_Max']);?></td>
							<td class="w25">OE</td>
							<td class="w50 sublinhado f10" style="border-bottom: 1px solid black !important;"><?=ImprimeColor('E',@$rsImp[0]['ComplacenciaOE_Max']);?></td>
						</tr>
						<tr>
							<td class="direita">+200 mm H<sub>2</sub>0</td>
							<td class="w25">OD</td>
							<td class="w50 sublinhado f10" style="border-bottom: 1px solid black !important;"><?=ImprimeColor('D',@$rsImp[0]['ComplacenciaOD_Min']);?></td>
							<td class="w25 ">OE</td>
							<td class="w50 sublinhado f10" style="border-bottom: 1px solid black !important;"><?=ImprimeColor('E',@$rsImp[0]['ComplacenciaOE_Min']);?></td>
						</tr>
					</table>
				</td>
				<td class="f10"><?=ImprimeColor('D',@$rsImp[0]['ComplacenciaOD_Res']);?>ml/cc </td>
				<td class="f10"><?=ImprimeColor('E',@$rsImp[0]['ComplacenciaOE_Res']);?>ml/cc </td>
			</tr>			
			</table>
			<div class="grafico centro w390">
			 TIMPANOMETRIA 
			<br><?php 	echo " <img class='centro' src='./timpanometria.php?Consulta=".@$_GET['Consulta']."'/>";?>
			</div>
			<?php 
				@$FuncaoTubariaOD = new obj("funcaotubariaod f");
				@$rsF_OD = @$FuncaoTubariaOD->buscarByCondicao("MD5(f.Consulta) = '" .@$_GET['Consulta']."'");
				@$FuncaoTubariaOE = new obj("funcaotubariaoe f");
				@$rsF_OE = @$FuncaoTubariaOE->buscarByCondicao("MD5(f.Consulta) = '" .@$_GET['Consulta']."'");
				
			
			?>
			<div class="grafico centro w390 h298">
				<table class="tabela centro w222 h298">
					<tr><td style="border:0" colspan="3">PESQUISA DE FUNÇÃO TUBÁRIA</td></tr>
					<tr><td class="w111">INÍCIO</td><td class="w111" colspan="2">+200</td></tr>
					<tr><td>1ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;border-bottom: 1px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['1degl']?></td><td colspan="1" style="color:red;border-bottom: 1px solid black;border: 0;border-right: 1px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OE[0]['1degl']?></td></tr>
					<tr><td>2ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['2degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['2degl']?></td></tr>
					<tr><td>3ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['3degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['3degl']?></td></tr>
					<tr><td>4ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['4degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['4degl']?></td></tr>
					<tr><td>5ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['5degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['5degl']?></td></tr>
					<tr><td>6ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['6degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['6degl']?></td></tr>
					<tr><td>7ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-right: 0px solid black;width: 36px;border-bottom: 1px solid black;"><?=@$rsF_OD[0]['7degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-right: 1px solid black;border-bottom: 1px solid black;width: 36px"><?=@$rsF_OE[0]['7degl']?></td></tr>
					<tr><td>8ª degl</td><td class="f10" colspan="1" style="color:#27408B;border: 1px;border-bottom:1px solid black;border-right: 0px solid black;width: 36px;"><?=@$rsF_OD[0]['8degl']?></td><td class="f10" colspan="1" style="color:red;border: 0;border-bottom:1px solid black;border-right: 1px solid black;width:   36px"><?=@$rsF_OE[0]['8degl']?></td></tr>
				</table>
			</div>
			<div class="clear h1"></div>
			<table class="tabela centro small">
			<tr><td colspan="11">REFLEXO ESTAPEDIANO - dB</td></tr>
			<tr>
				<td></td>
				<td>LIMIAR <br>TONAL</td>
				<td>NÍVEL DE <br>REFLEXO</td>
				<td>DIF.</td>
				<td>T.D.</td>
				<td>IPSI <br>LATERAL</td>
				<td>LIMIAR <br>TONAL</td>
				<td>NÍVEL DE <br>REFLEXO</td>
				<td>DIF.</td>
				<td>T.D.</td>
				<td>IPSI <br>LATERAL</td>
			</tr>
			<?php 
			
				@$ReflexoEstapediano = new obj('reflexoestapedianofaixa ref');
				@$Campos = "re.*, ref.faixa, td.Descricao AS TD_OD_Desc , te.Descricao AS TD_OE_Desc";
				@$Condicao = "";
				@$joinREF = array("left join  reflexoestapediano re on ref.Cod = re.reflexoestapedianofaixa and MD5(Consulta_Cod) = '" . @$_GET['Consulta']."'",
								 "left join tipotdt td on td.cod = TD_OD",
								 "left join tipotdt te on te.cod = TD_OE");
				@$ordem = "ref.faixa asc";
				@$rsReflexo = @$ReflexoEstapediano->listar(@$Campos,null,@$joinREF,@$ordem,null,null,true);
				foreach (@$rsReflexo as $values) {
			?>
					<tr>
						<td><?=@$values['faixa'];?> Hz</td>
						<td><?=ImprimeColor('D',@$values['LimiarTonal_OD']);?> <?=ImprimeAusente('D',@$values['LimiarTonal_OD_ausente']);?><?=ImprimeNaoFeito('D',@$values['LimiarTonal_OD_NaoFeito']);?></td>
						<td><?=ImprimeColor('E',@$values['NivelReflexo_OD']);?><?=ImprimeAusente('E',@$values['NivelReflexo_OD_ausente']);?><?=ImprimeNaoFeito('E',@$values['NivelReflexo_OD_NaoFeito']);?></td>
						<td><?=ImprimeColor('D',@$values['Dif_OD']);?>			<?=ImprimeAusente('D',@$values['Dif_OD_ausente']);?><?=ImprimeNaoFeito('D',@$values['Dif_OD_NaoFeito']);?></td>
						<td><?=ImprimeColor('D',(@$values['TD_OD']>0?@$values['TD_OD_Desc']:""));?><?=ImprimeAusente('D',@$values['TD_OD_ausente']);?><?=ImprimeNaoFeito('D',@$values['TD_OD_NaoFeito']);?></td>
						<td><?=ImprimeColor('D',@$values['Ipsi_Lateral_OD']);?><?=ImprimeAusente('D',@$values['Ipsi_Lateral_OD_ausente']);?><?=ImprimeNaoFeito('D',@$values['Ipsi_Lateral_OD_NaoFeito']);?></td>
					
						<td><?=ImprimeColor('E',@$values['LimiarTonal_OE']);?>	<?=ImprimeAusente('E',@$values['LimiarTonal_OE_ausente']);?><?=ImprimeNaoFeito('E',@$values['LimiarTonal_OE_NaoFeito']);?></td>
						<td><?=ImprimeColor('D',@$values['NivelReflexo_OE']);?><?=ImprimeAusente('D',@$values['NivelReflexo_OE_ausente']);?><?=ImprimeNaoFeito('D',@$values['NivelReflexo_OE_NaoFeito']);?></td>
						<td><?=ImprimeColor('E',@$values['Dif_OE']);?>			<?=ImprimeAusente('E',@$values['Dif_OE_ausente']);?><?=ImprimeNaoFeito('E',@$values['Dif_OE_NaoFeito']);?></td>
						<td><?=ImprimeColor('E',(@$values['TD_OE']>0?@$values['TD_OE_Desc']:""));?><?=ImprimeAusente('E',@$values['TD_OE_ausente']);?><?=ImprimeNaoFeito('E',@$values['TD_OE_NaoFeito']);?></td>
						<td><?=ImprimeColor('E',@$values['Ipsi_Lateral_OE']);?><?=ImprimeAusente('E',@$values['Ipsi_Lateral_OE_ausente']);?><?=ImprimeNaoFeito('E',@$values['Ipsi_Lateral_OE_NaoFeito']);?></td>
					</tr>
			<?php }?>
			<tr>
				<td style="border:0"></td>
				<td colspan="4">DIREITO (SONDA NO ESQUERDO)</td><td>&nbsp;</td>
				<td colspan="4">ESQUERDO (SONDA NO DIREITO)</td><td>&nbsp;</td>
			</tr>
			</table>
			<div class="clear h1"></div>
			<div class="centro">PARECER FONOAUDIOLÓGICO</div>
			<div class="Parecer">
					<?php

						@$Parecer = new obj('parecer p');
						@$campos	='tod.Descricao as Timpanogramas_OD, toe.Descricao as Timpanogramas_OE,'.
								 'coe.Descricao as ComplacenciaOE, cod.Descricao as ComplacenciaOD,ReflexosEstapedianos';
						@$join  = array ('left join timpanograma tod on tod.Cod = p.Timpanogramas_OD', 
										'left join timpanograma toe on toe.Cod = p.Timpanogramas_OE', 
										'left join complacencia cod on cod.Cod = p.ComplacenciaOD',
										'left join complacencia coe on coe.Cod = p.ComplacenciaOE'); 
						@$rsParecer = @$Parecer->listar(@$campos, "MD5(p.Consulta) = '" .@$_GET['Consulta']."'",@$join );
					?>
				<table class="h65 memo ">
					<tr >
						<td class="w115">TIMPANOGRAMAS:</td>
						<td class="w25">OD:</td>
						<td class="sublinhado"><?=ImprimeColor('D',utf8_encode(@$rsParecer[0]['Timpanogramas_OD']))?></td>
					</tr>
					<tr  >
						<td>&nbsp;</td>
						<td>OE:</td>
						<td class="sublinhado"><?=ImprimeColor('E',utf8_encode(@$rsParecer[0]['Timpanogramas_OE']))?></td>
					</tr>
				</table>
				<div class="clear h1 "></div>
				<table class=" h65 memo ">
					<tr  >
						<td class="w240 h15">MEDIDAS DE COMPLACÊNCIA ESTÁTICA:</td>
						<td class="w25 h15">OD:</td>
						<td class="sublinhado h15"><?=ImprimeColor('D',utf8_encode(@$rsParecer[0]['ComplacenciaOD']))?></td>
					</tr>
					<tr class="">
						<td>&nbsp;</td>
						<td>OE:</td>
						<td class="sublinhado"><?=ImprimeColor('E',utf8_encode(@$rsParecer[0]['ComplacenciaOE']))?></td>
					</tr>
				</table>
				<div class="clear h1"></div>
				<table class="h65 ">
					<tr>
						<td colspan='1' class=' memo2 memo2r  h65'><font size="2"> REFLEXOS ESTAPEDIANOS:</font>
							<?=utf8_encode(@$rsParecer[0]['ReflexosEstapedianos']); ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="clear h1"></div>
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
</body>
</html>