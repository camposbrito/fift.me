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
			"eaf.Simbolo,ea.*",
			"MD5(Consulta) = '" . $_GET['Consulta'] ."' AND eaf.Cod in (select Cod from exameaudiometricofaixa eaf1 WHERE eaf1.Simbolo in ('VALE', 'VAMLE', 'VOMLE', 'VOSMLE'))",
			array(
					"inner join exameaudiometricofaixa  eaf on eaf.Cod = ea.ExameAudiometricoFaixa",
					"inner join consulta_has_exameaudiometrico chea on chea.Cod = ea.consulta_has_exameaudiometrico  "
				 ),
			"eaf.Cod", null,null
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
		global $EixoX,	$VALE    ,
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
 		foreach ($Lista as $Linha){
// 			echo "=====[ $i  ]======";
// 			foreach ($Linha as $Line)
 			{
 				$i = 0;
// 				_debug($Linha);
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
	}
	if (isset($VALE) &&  isset($VAMLE))
	{
		$VALE_E_U[] 	= $VALE_E	[max(array_keys($VALE_E))];
		$VALE_E_U[] 	= $VAMLE_E	[min(array_keys($VAMLE_E))];
		
		$VALE_U[] 		= $VALE		[max(array_keys($VALE))];
		$VALE_U[] 		= $VAMLE	[min(array_keys($VAMLE))];
	} 
	$debug = 'N';
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
if (isset($VALE) &&  isset($VAMLE))
{
	//$VALD_E_U $VALD_U
	$sp1_U = new LinePlot($VALE_E_U,$VALE_U);
	//$sp1_U->mark->SetType(MARK_IMG,'./_img/VALD.png',0.6);
	$graph->Add($sp1_U);
	$sp1_U->SetColor('#0000ff');
	$sp1_U->SetStyle("dotted");
}
if (isset($VALE)){
	$sp1 = new LinePlot($VALE_E,$VALE);
	$sp1->mark->SetType(MARK_IMG,'./_img/VALE.png',0.6);
	$graph->Add($sp1);
	$sp1->SetColor('#0000ff');
	$sp1->SetStyle("dotted");
}
if (isset($VAMLE)){
	$sp2 = new LinePlot($VAMLE_E,$VAMLE);
	$sp2->mark->SetType(MARK_IMG,'./_img/VAMLE.png',0.6);
	$graph->Add($sp2);
	$sp2->SetColor('#0000ff');
	$sp2->SetStyle("dotted");
}
if (isset($VOMLE)){
	$sp3 = new ScatterPlot($VOMLE_E,$VOMLE);
	$sp3->mark->SetType(MARK_IMG,'./_img/VOMLE.png',0.6);
	$graph->Add($sp3);
}
if (isset($VOSMLE)){
	$sp4 = new ScatterPlot($VOSMLE_E,$VOSMLE);
	$sp4->mark->SetType(MARK_IMG,'./_img/VOSMLE.png',0.6);
	$graph->Add($sp4);
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
