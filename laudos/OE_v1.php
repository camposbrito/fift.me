<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
$debug = 'N';
require_once ('./_db/_autoload.php');
require_once ('./_includes/function.php');
require_once ("./_graph/src/jpgraph.php");
require_once ('_graph/src/jpgraph_line.php');
require_once ("./_graph/src/jpgraph_scatter.php");
require_once ("./_graph/src/jpgraph_regstat.php");
//Objeto
$obj = new obj('exameaudiometrico ea');
//Label dos eixox
$scale = array("","","","","","","","","","","","","","","","");

//Valores eixo VALE 
$rs = $obj->listar(
			"eaf.Simbolo,ea.*",
			"MD5(Consulta) = '" . $_GET['Consulta'] ."' AND eaf.Cod in (select Cod from exameaudiometricofaixa eaf1 WHERE eaf1.Simbolo in ('VALE', 'VAMLE', 'VOMLE', 'VOSMLE'))",
			array(
					"inner join exameaudiometricofaixa  eaf on eaf.Cod = ea.ExameAudiometricoFaixa",
					"inner join consulta_has_exameaudiometrico chea on chea.Cod = ea.consulta_has_exameaudiometrico  "
				 ),
			"eaf.Cod", null,null
		  );
	

	$EixoX  = array	(
						0.84,
						2.34,
						3.83,
						5.35,
						6.08,
						6.83,
						7.57,
						8.31
					);

	PopulaEixos(  array ('025','050','1','2','3','4','6','8'), $rs);
	function PopulaEixos($Field  							 , $Lista){		
		$i=0;
		global 			$EixoConectores_A_VAML,
						$EixoConectores_A_VAL,
						$EixoConectores_Eixo,
						$EixoConectores_Vlr,
						$EixoConectores,$EixoX,	$VALE    ,
						$VAMLE   ,
						$VOMLE   ,
						$VOSMLE	 ,
						$VALE_A  , 
						$VAMLE_A , 
						$VOMLE_A , 
						$VOSMLE_A,
						$VALE_E  , 
						$VAMLE_E , 
						$VOMLE_E , 
						$VOSMLE_E;
 		foreach ($Lista as $Linha)
		{
			if  ((preg_match("/VAL/i", $Linha['Simbolo'])) || (preg_match("/VAML/i", $Linha['Simbolo'])))
			{
				$EixoConectores[0] = ( ( $Linha[Valor_025]	<> null) && ($EixoConectores[0] == null ))? $Linha[Valor_025] : $EixoConectores[0]  ;	
				$EixoConectores[1] = ( ( $Linha[Valor_050]	<> null) && ($EixoConectores[1] == null ))? $Linha[Valor_050] : $EixoConectores[1]  ;	
				$EixoConectores[2] = ( ( $Linha[Valor_1]	<> null) && ($EixoConectores[2] == null ))? $Linha[Valor_1]	  : $EixoConectores[2]  ;
				$EixoConectores[3] = ( ( $Linha[Valor_2]	<> null) && ($EixoConectores[3] == null ))? $Linha[Valor_2]	  : $EixoConectores[3]  ;
				$EixoConectores[4] = ( ( $Linha[Valor_3]	<> null) && ($EixoConectores[4] == null ))? $Linha[Valor_3]	  : $EixoConectores[4]  ;
				$EixoConectores[5] = ( ( $Linha[Valor_4]	<> null) && ($EixoConectores[5] == null ))? $Linha[Valor_4]	  : $EixoConectores[5]  ;
				$EixoConectores[6] = ( ( $Linha[Valor_6]  	<> null) && ($EixoConectores[6] == null ))? $Linha[Valor_6]   : $EixoConectores[6]  ;	
				$EixoConectores[7] = ( ( $Linha[Valor_8]	<> null) && ($EixoConectores[7] == null ))? $Linha[Valor_8]	  : $EixoConectores[7]  ;
				 
				if (preg_match("/VAL/i", $Linha['Simbolo']))
				{
				 
					 $EixoConectores_A_VAL[0] =  $Linha["Ausente_025"]  ;	
					 $EixoConectores_A_VAL[1] =  $Linha["Ausente_050"]  ;		
					 $EixoConectores_A_VAL[2] =  $Linha["Ausente_1"]    ;	
					 $EixoConectores_A_VAL[3] =  $Linha["Ausente_2"]	; 	 
					 $EixoConectores_A_VAL[4] =  $Linha["Ausente_3"]	; 	 
					 $EixoConectores_A_VAL[5] =  $Linha["Ausente_4"]	; 	 
					 $EixoConectores_A_VAL[6] =  $Linha["Ausente_6"]	; 	 
					 $EixoConectores_A_VAL[7] =  $Linha["Ausente_8"]	; 	 
					                                                 
			 
				}
				
				if (preg_match("/VAML/i", $Linha['Simbolo']))
				{
					 
					 
					 $EixoConectores_A_VAML[0] =  $Linha["Ausente_025"]   ;	
					 $EixoConectores_A_VAML[1] =  $Linha["Ausente_050"]   ;		
					 $EixoConectores_A_VAML[2] =  $Linha["Ausente_1"]     ;	
					 $EixoConectores_A_VAML[3] =  $Linha["Ausente_2"]	 ;	 
					 $EixoConectores_A_VAML[4] =  $Linha["Ausente_3"]	 ;	 
					 $EixoConectores_A_VAML[5] =  $Linha["Ausente_4"]	 ;	 
					 $EixoConectores_A_VAML[6] =  $Linha["Ausente_6"]	 ;	 
					 $EixoConectores_A_VAML[7] =  $Linha["Ausente_8"]	 ;	
				}
					
			}                                          
			
			
 			{
 				$i = 0;
// 				_debug($Linha);
 				foreach ($Field as $Campo){
					if ($Linha['Valor_'.trim($Campo)]<> null ){
						${$Linha['Simbolo']."_E"}[] = $Linha['Ausente_'.trim($Campo)] =='S'?null:$EixoX[$i];
						${$Linha ['Simbolo']} [] = ($Linha ['Valor_' . trim ( $Campo )] == 0) ? 0.9 : (($Linha ['Valor_' . trim ( $Campo )] < 0) ? $Linha ['Valor_' . trim ( $Campo )] / 1.09 : (($Linha ['Valor_' . trim ( $Campo )] > 30)?$Linha ['Valor_' . trim ( $Campo )] * 1.08:$Linha ['Valor_' . trim ( $Campo )] * 1.1));
						${$Linha['Simbolo']."_A"}[] = $Linha['Ausente_'.trim($Campo)] =='S'?$EixoX[$i]:null;
					}	
				$i++;
 				}
			}
		}
	}
	if (isset($VALE) &&  isset($VAMLE))
	{
		$VALE_E_U[] 	= $VALE_E	[max(array_keys($VALE_E))];
		$VALE_E_U[] 	= $VAMLE_E	[min(array_keys($VAMLE_E))];
		
		$VALE_U[] 		= $VALE		[max(array_keys($VALE))];
		$VALE_U[] 		= $VAMLE	[min(array_keys($VAMLE))];
	} 
	foreach ($EixoConectores as $key => $Linha)
	{	
		if ( ($Linha <> null)  and (${"EixoConectores_A_VAL"}[$key] == 'N') and (${"EixoConectores_A_VAML"}[$key] == 'N') ){				
			//$EixoConectores_Vlr[$key] 	  = ( $Linha < 0 )? $Linha / 1.1 :$Linha * 1.1;
			$EixoConectores_Vlr [$key] = ($Linha == 0) ? 0.8 : (($Linha < 0) ? $Linha / 1.01 : (($Linha > 30)?  $Linha * 1.08 :  $Linha * 1.1));
			$EixoConectores_Eixo[$key] 	  = $EixoX[$key];
		}
		else{
			$EixoConectores_Vlr[$key] 	  = null;
			$EixoConectores_Eixo[$key] 	  = null;
			}
		
		$EixoConectores_Eixo[$key] 	  = $EixoX[$key];
		 
	}
 
	if ($debug == 'S'){	
		_debug($VALE);
		_debug($VAMLE);
		
		_debug($VALE_E);	
		_debug($VAMLE_E);
		
		_debug($VALE_U);
		_debug($VALE_E_U);
	}
	
$graph = new Graph(291.4,329,"auto");
$graph->SetFrame(true,'black',0);
$graph->SetBackgroundImage( './_img/bgaudiometrico.png', BGIMG_FILLFRAME);
$graph->SetScale("linlin",0,9,-20,130);
$graph->SetMarginColor('white');
$graph->Set90AndMargin(30,15,30,15);
$graph->SetAxisStyle(AXSTYLE_SIMPLE);
$graph->SetBox(true,'black');
//$graph->img->SetAntiAliasing(false);

$graph->ygrid->Show(false,false);
$graph->xgrid->Show(false,false);
$graph->ygrid->SetFill(false,'#fff@0.5','#fff@0.5');
$graph->xgrid->SetFill(false,'#fff@0.5','#fff@0.5');
$graph->xscale->ticks->Set(1,10);
$graph->yscale->ticks->Set(1,1);
$graph->xscale->ticks->SupressZeroLabel(true);
$graph->yscale->ticks->SupressZeroLabel(true);
$graph->xaxis->SetColor('black'); 
$graph->yaxis->SetColor('black','black');
$graph->yaxis->SetLabelSide(SIDE_BOTTOM);
$graph->xaxis->SetLabelSide(SIDE_BOTTOM);
$graph->yaxis->SetTickLabels($scale); 
$graph->xaxis->SetTickLabels($scale);
$graph->xaxis->SetPos(0);
$graph->yaxis->SetPos('min');
$graph->xaxis->title->SetAngle(90);
$graph->xaxis->title->SetMargin(15);
$graph->xaxis->SetTickSide(SIDE_DOWN);
$graph->yaxis->SetTickSide(SIDE_LEFT);
//$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,8);
//$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,8);

	if ($Debug){
		_debug(${"EixoConectores_A_VAL"});
		_debug(${"EixoConectores_A_VAML"});
	}
	$i = 0;	
	for ($j = 0; $j <= 8; $j++) {
		if (($EixoConectores_Vlr[$j] <> null) and (${"EixoConectores_A_VAL"}[$j] == 'N') and (${"EixoConectores_A_VAML"}[$j] == 'N')){
			${'EixoConectores_Eixo'.$i}[] = $EixoConectores_Eixo[$j];
			${'EixoConectores_Vlr'.$i}[]  = $EixoConectores_Vlr[$j];
			$Semaforo = false;
			if ($Debug)
			echo $j." < <br>";
			//$i++;
		}
		else 
		if ( (${"EixoConectores_A_VAL"}[$j] == 'S') or  (${"EixoConectores_A_VAML"}[$j] == 'S'))
		{
			if ($Debug)
				echo $j." << <br>";
			if (isset(${'EixoConectores_Eixo'.$i})){
				
				${'sp1_Conectores'.$i} = new LinePlot(${'EixoConectores_Eixo'.$i},${'EixoConectores_Vlr'.$i});	
				$graph->Add(${'sp1_Conectores'.$i});
				${'sp1_Conectores'.$i}->SetColor('#0000ff');
				${'sp1_Conectores'.$i}->SetStyle("dotted");
				 
				$i++;
				if ($EixoConectores_Vlr[$j] <> null)
				{
					${'EixoConectores_Eixo'.$i}[] = $EixoConectores_Eixo[$j];
					${'EixoConectores_Vlr'.$i}[]  = $EixoConectores_Vlr[$j];
				}
			}
			if ($Debug){
				echo 'EixoConectores_Eixo'.$i;
				_Debug(${'EixoConectores_Eixo'.$i} );
				_Debug(${'EixoConectores_Vlr'.$i}  );
			}
			$Semaforo = false;			
		} 
	}
	if ($Debug){
		echo "EixoConectores_Eixo";
		_debug($EixoConectores_Eixo);
		echo "EixoConectores_Vlr";
		_debug($EixoConectores_Vlr);
	}
	
	if (isset(${'EixoConectores_Eixo'.$i}))
	{
		if ($Debug){
			echo 'EixoConectores_Eixo'.$i."<br>";
			_debug(${'EixoConectores_Eixo'.$i});
			echo 'EixoConectores_Vlr'.$i."<br>";
			_debug(${'EixoConectores_Vlr'.$i});
		}	
		${'sp1_Conectores'.$i} = new LinePlot(${'EixoConectores_Eixo'.$i},${'EixoConectores_Vlr'.$i});	
		$graph->Add(${'sp1_Conectores'.$i});
		${'sp1_Conectores'.$i}->SetColor('#0000ff');
		${'sp1_Conectores'.$i}->SetStyle("dotted");
		//${'sp1_Conectores'.$i}->SetWeight(2);
		
	}
/*
*
*
*
*
*
*
*/

if (isset($VALE) &&  isset($VAMLE))
{
	//$VALD_E_U $VALD_U
	$sp1_U = new LinePlot($VALE_E_U,$VALE_U);
	//$sp1_U->mark->SetType(MARK_IMG,'./_img/VALD.png',0.6);
	$graph->Add($sp1_U);
	$sp1_U->SetColor('#0000ff');
	$sp1_U->SetStyle("dotted");
	$sp1_U->SetWeight(0);
}
if (isset($VALE)){
	$sp1 = new LinePlot($VALE_E,$VALE);
	$sp1->mark->SetType(MARK_IMG,'./_img/VALE.png',0.6);
	$graph->Add($sp1);
	$sp1->SetColor('#0000ff');
	$sp1->SetStyle("dotted");
	$sp1->SetWeight(0);
}
if (isset($VAMLE)){
	$sp2 = new LinePlot($VAMLE_E,$VAMLE);
	$sp2->mark->SetType(MARK_IMG,'./_img/VAMLE.png',0.6);
	$graph->Add($sp2);
	$sp2->SetColor('#0000ff');
	$sp2->SetStyle("dotted");
	$sp2->SetWeight(0);
}
if (isset($VOMLE)){
	$sp3 = new ScatterPlot($VOMLE_E,$VOMLE);
	$sp3->mark->SetType(MARK_IMG,'./_img/VOMLE.png',0.6);
	$graph->Add($sp3);
	$sp3->SetWeight(0);
}
if (isset($VOSMLE)){
	$sp4 = new ScatterPlot($VOSMLE_E,$VOSMLE);
	$sp4->mark->SetType(MARK_IMG,'./_img/VOSMLE.png',0.6);
	$graph->Add($sp4);
	$sp4->SetWeight(0);
}
//Ausentes
if (isset($VALE_A)){
	$sp_1 = new LinePlot($VALE_A,$VALE);
	$sp_1->mark->SetType(MARK_IMG,'./_img/VALE_A.png',0.6);
	$graph->Add($sp_1);
	$sp_1->SetColor('#0000ff');
	$sp_1->SetStyle("dotted");	
	$sp_1->SetWeight(0);
}
if (isset($VAMLE_A)){
	$sp_2 = new LinePlot($VAMLE_A,$VAMLE);
	$sp_2->mark->SetType(MARK_IMG,'./_img/VAMLE_A.png',0.6);
	$graph->Add($sp_2);
	$sp_2->SetColor('#0000ff');
	$sp_2->SetStyle("dotted");
	$sp_2->SetWeight(0);
}
if (isset($VOMLE_A)){
	$sp_3 = new ScatterPlot($VOMLE_A,$VOMLE);
	$sp_3->mark->SetType(MARK_IMG,'./_img/VOMLE_A.png',0.6);
	$graph->Add($sp_3);
	$sp_3->SetWeight(0);

}

if (isset($VOSMLE_A)){
	$sp_4 = new ScatterPlot($VOSMLE_A,$VOSMLE);
	$sp_4->mark->SetType(MARK_IMG,'./_img/VOSMLE_A.png',0.6);
	$graph->Add($sp_4);	
	$sp_4->SetWeight(0);

}



if ($debug == 'N')
$graph->Stroke();
?>
