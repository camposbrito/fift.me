 
<!--<head>-->
 	<!--<title>AUDIOMETRIA</title>-->
<link href="<?= base_url(); ?>assets/css/relatorios.css" rel="stylesheet">

<!--</head>-->
<?php
                                        
//		@$Consulta = new obj('consulta c');
//		@$rsC = @$Consulta->listar("c.*,t1.Descricao as Profissional1 , t2.Descricao as Profissional2, t1.CRFA as CRFA1, t2.CRFA as CRFA2 ","MD5(c.Cod) = '" .@$_GET['Consulta']."'", array("left join terceiro t2 on t2.cod = c.terceiro1","left join terceiro t1 on t1.cod = c.terceiro"));
//		
//		@$Paciente = new obj('paciente p');
//		@$rsP = @$Paciente->buscarByCondicao("Cod=" .@$rsC[0]['Paciente']);
//		
//		@$date = new DateTime(@$rsP[0]['DataNascimento']); // data de nascimento
//		@$interval = @$date->diff( new DateTime( date("Y/m/d") ) ); // data definida
//		
//		@$Consulta_has_Audiometrico  =new obj('consulta_has_exameaudiometrico');
//		@$rsCha = @$Consulta_has_Audiometrico->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'");
//		
//		@$AudiometriaCampoLivre  =new obj('audiometriacampolivre');
//		@$rsAud = @$AudiometriaCampoLivre->buscarByCondicao("MD5(Consulta) = '".@$_GET['Consulta']."'" ,true);
//				
//		
//		@$Equipamento = new obj('equipamento e');
//		@$rsE = @$Equipamento->buscarByCondicao("Cod=0".(@$rsCha[0]['Equipamento']>0?@$rsCha[0]['Equipamento']:@$rsAud[0]['Equipamento']));
//_debug($consulta);
//_debug($paciente);
//_debug($classificacoes);
?>
<!--<body>-->
	<div class="paper">
                
		<div class="table">
			<div class="descricao w50" style="float:left">Nome:</div> 
                        <div class="sublinhado w480" style="float:left"> <?=utf8_encode($consulta[0]->PacienteNome); ?></div>
			<div class="descricao w40" style="float:left">Data:</div>
			<div class="sublinhado w100" style="float:left"> <?=dataBR($consulta[0]->Data); ?></div>
			
			
			<div class="clear"></div>
			
			<div class="descricao w35">RG:</div>
			<div class="sublinhado w110">  <?=$paciente[0]->RG  ?> </div>
			<div class="descricao w150">Data de Nascimento:</div>
			<div class="sublinhado w100">  <?=dataBR($paciente[0]->DataNascimento ) ?> </div>
			<div class="descricao  w50">Idade:</div>
			<div class="sublinhado w120">  <?=utf8_encode(calculaIdade($consulta[0]->Data , $paciente[0]->DataNascimento) )?></div>
			 
			<div class="clear"></div>
			
			<div class="descricao  w100">Nacionalidade: </div>
			<div class="sublinhado  w100"> <?=$paciente[0]->Nacionalidade ?> </div>
			<div class="descricao  w50">Sexo: </div>
			<div class="sublinhado w100"> 
				<?php switch ($paciente[0]->Sexo) {
					case 'M':echo 'Masculino'; break;
					case 'F':echo 'Feminino'; break;
					default:echo ''; break;
				}?>
			</div>
			<div class="descricao  w80">Profissão: </div>
			<div class="sublinhado w200"> <?=utf8_encode($paciente[0]->Funcao);?></div>
		 
			
			<div class="clear"></div>
<!--			
		<div class="descricao">Audiômetro:</div>
			<div class="sublinhado w450">  <?=isset($equipamento)?utf8_encode($equipamento[0]->Descricao):"";?></div>
			<div class="descricao">Calibração:</div>
			<div class="sublinhado w150">  <?=isset($equipamento)?dataBR($equipamento[0]->Calibracao):"";?></div>
			<div class="sublinhado w5"> </div>
			<div class="sublinhado w1"> </div>
			<div class="clear"></div>
			-->	
 			<div class="titulo">AUDIOMETRIA</div>
			<div class="clear"></div>
			
			<div class="grafico w350 centro">OD</div>
			<div class="grafico w350 centro">OE</div>
			<div class="clear"></div>
			<div class="grafico centro w350">
					<?php 	echo " <img class='centro' src='http://camposbrito.com.br/projetobley/report/OD_v1.php?Consulta=".  md5($consulta[0]->Cod)."'/>";?>
			</div>
			<div class="grafico centro w350">
					<?php 	echo "<img class='centro' src='http://camposbrito.com.br/projetobley/report/OE_v1.php?Consulta=".md5($consulta[0]->Cod)."'/>";?>
			</div>
			<div class="clear"></div>
			