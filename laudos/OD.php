<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
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
			"*",
			"MD5(Consulta) = '" . $_GET['Consulta'] ."'  AND eaf.Cod in (select Cod from exameaudiometricofaixa eaf1 WHERE eaf1.Simbolo in ('VALD', 'VAMLD', 'VOMLD', 'VOSMLD'))",
			array(
					"inner join exameaudiometricofaixa  eaf on eaf.Cod = ea.ExameAudiometricoFaixa",
					"inner join consulta_has_exameaudiometrico chea on chea.Cod = ea.consulta_has_exameaudiometrico  "
				 ),
			"eaf.Cod", null,null, false
		  );
	

	$EixoX  = array(
				0.80,
				2.30,
				3.80,
				5.25,
				6.05,
				6.78,
				7.55,
				8.30
			);

	PopulaEixos(  array ('025','050','1','2','3','4','6','8'), $rs);
	function PopulaEixos($Field  							 , $Lista){		
		$i=0;
		global 			$EixoConectores_Vlr,
						$EixoConectores_Vlr,
						$EixoConectores,
						$EixoX,	
						$VALD    ,
						$VAMLD   ,
						$VOMLD   ,
						$VOSMLD	 ,
						$VALD_A  , 
						$VAMLD_A , 
						$VOMLD_A , 
						$VOSMLD_A,
						$VALD_E  , 
						$VAMLD_E , 
						$VOMLD_E , 
						$VOSMLD_E;
 		foreach ($Lista as $Linha){			
 			if  ((preg_match("/VAL/i", $Linha['Simbolo'])) || (preg_match("/VAML/i", $Linha['Simbolo'])))
			{
	 
			}                                          
			
			
			//_Debug($EixoConectores);
			$i = 0;
			//_debug($Linha);
			foreach ($Field as $Campo){
				if ($Linha['Valor_'.trim($Campo)]<> null ){
				${$Linha['Simbolo']."_E"}[] = $Linha['Ausente_'.trim($Campo)] =='S'?null:$EixoX[$i];
					${$Linha['Simbolo']}[]   =( $Linha['Valor_'.trim($Campo)] < 0)? $Linha['Valor_'.trim($Campo)] / 1.0834 :$Linha['Valor_'.trim($Campo)] * 1.0834;
					${$Linha['Simbolo']."_A"}[] = $Linha['Ausente_'.trim($Campo)] =='S'?$EixoX[$i]:null;
				}	
			$i++;
			}
			
		}
	}
	if (isset($VALD) &&  isset($VAMLD))
		{
		$VALD_E_U[] 	= $VALD_E	[max(array_keys($VALD_E))];
		$VALD_E_U[] 	= $VAMLD_E	[min(array_keys($VAMLD_E))];
		
		$VALD_U[] 		= $VALD		[max(array_keys($VALD))];
		$VALD_U[] 		= $VAMLD	[min(array_keys($VAMLD))];
	} 

	$debug = 'N';
if ($debug == 'S'){	
	echo 'VALD_E_U';
	_DEBUG($VALD_E_U);
	
	echo '$VALD_U';
	_DEBUG($VALD_U);
 	echo '$VALD';
	_debug($VALD);
	echo '$VALD_E';	 
	_debug($VALD_E);
	echo '$VAMLD';
	_debug($VAMLD);
	echo '$VAMLD_E';
	_debug($VAMLD_E);
}
$graph = new Graph(291.4,329,"auto");
$graph->SetFrame(true,'black',0);
$graph->SetBackgroundImage( './_img/bgaudiometrico.png', BGIMG_FILLFRAME);
$graph->SetScale("linlin",0,9,-20,130);
$graph->SetMarginColor('white');
$graph->Set90AndMargin(30,15,30,15);
$graph->SetAxisStyle(AXSTYLE_SIMPLE);
$graph->SetBox(true,'black');

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
if (isset($VALD) &&  isset($VAMLD))
{
	//$VALD_E_U $VALD_U
	$sp1_U = new LinePlot($VALD_E_U,$VALD_U);
	//$sp1_U->mark->SetType(MARK_IMG,'./_img/VALD.png',0.6);
	$graph->Add($sp1_U);
	$sp1_U->SetColor('red');
}
if (isset($VALD)){
	$sp1 = new LinePlot($VALD_E,$VALD);
	$sp1->mark->SetType(MARK_IMG,'./_img/VALD.png',0.6);
	$graph->Add($sp1);
	$sp1->SetColor('red');
}
if (isset($VAMLD)){
	$sp2 = new LinePlot($VAMLD_E,$VAMLD);
	$sp2->mark->SetType(MARK_IMG,'./_img/VAMLD.png',0.6);
	$graph->Add($sp2);
	$sp2->SetColor('red');
}


 
if (isset($VOMLD)){
	$sp3 = new ScatterPlot($VOMLD_E,$VOMLD);
	$sp3->mark->SetType(MARK_IMG,'./_img/VOMLD.png',0.6);
	$graph->Add($sp3);
}
if (isset($VOSMLD)){
	$sp4 = new ScatterPlot($VOSMLD_E,$VOSMLD);
	$sp4->mark->SetType(MARK_IMG,'./_img/VOSMLD.png',0.6);
	$graph->Add($sp4);
}
//Ausentes
//_debug($VALD_A);
if (isset($VALD_A)){
	$sp_1 = new LinePlot($VALD_A,$VALD);
	$sp_1->mark->SetType(MARK_IMG,'./_img/VALD_A.png',0.6);
	$graph->Add($sp_1);
	$sp_1->SetColor('red');
	$sp_1->SetWeight(0);
}
if (isset($VAMLD_A)){
	$sp_2 = new LinePlot($VAMLD_A,$VAMLD);
	$sp_2->mark->SetType(MARK_IMG,'./_img/VAMLD_A.png',0.6);
	$graph->Add($sp_2);
	$sp_2->SetColor('red');
	$sp_2->SetWeight(0);
}
if (isset($VOMLD_A)){
	$sp_3 = new ScatterPlot($VOMLD_A,$VOMLD);
	$sp_3->mark->SetType(MARK_IMG,'./_img/VOMLD_A.png',0.6);
	$graph->Add($sp_3);
	$sp_3->SetWeight(0);
}

if (isset($VOSMLD_A)){
	$sp_4 = new ScatterPlot($VOSMLD_A,$VOSMLD);
	$sp_4->mark->SetType(MARK_IMG,'./_img/VOSMLD_A.png',0.6);
	$graph->Add($sp_4);
	$sp_4->SetWeight(0);
}

if ($debug == 'N')
$graph->Stroke();
?>
