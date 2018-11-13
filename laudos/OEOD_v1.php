<?php
header ( "Content-Type: text/html; charset=ISO-8859-1", true );
$debug = 'N';
require_once ('./_db/_autoload.php');
require_once ('./_includes/function.php');
require_once ("./_graph/src/jpgraph.php");
require_once ('_graph/src/jpgraph_line.php');
require_once ("./_graph/src/jpgraph_scatter.php");
require_once ("./_graph/src/jpgraph_regstat.php");
// Objeto
$obj = new obj ( 'exameaudiometrico ea' );
// Label dos eixox
$scale = array (
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"" 
);

// Valores eixo VALE
$rs = $obj->listar ( "eaf.Simbolo,ea.*", "MD5(Consulta) = '" . $_GET ['Consulta'] . "' AND eaf.Cod in (select Cod from exameaudiometricofaixa eaf1 WHERE eaf1.Simbolo in ('VALE', 'VAMLE', 'VOMLE', 'VOSMLE'))", array (
		"inner join exameaudiometricofaixa  eaf on eaf.Cod = ea.ExameAudiometricoFaixa",
		"inner join consulta_has_exameaudiometrico chea on chea.Cod = ea.consulta_has_exameaudiometrico  " 
), "eaf.Cod", null, null );

$rs2 = $obj->listar ( "eaf.Simbolo,ea.*", "MD5(Consulta) = '" . $_GET ['Consulta'] . "' AND eaf.Cod in (select Cod from exameaudiometricofaixa eaf1 WHERE eaf1.Simbolo in ('VALD', 'VAMLD', 'VOMLD', 'VOSMLD'))", array (
		"inner join exameaudiometricofaixa  eaf on eaf.Cod = ea.ExameAudiometricoFaixa",
		"inner join consulta_has_exameaudiometrico chea on chea.Cod = ea.consulta_has_exameaudiometrico  " 
), "eaf.Cod", null, null );

$EixoX = array (
		0.84,
		2.34,
		3.83,
		5.35,
		6.08,
		6.83,
		7.57,
		8.31 
);
PopulaEixos_E ( array ('025','050','1','2','3','4','6','8'), $rs );
function PopulaEixos_E($Field, $Lista) {
	$i = 0;
	global $EixoConectores_A_VAML_E, $EixoConectores_A_VAL_E, $EixoConectores_Eixo_E, $EixoConectores_Vlr_E, $EixoConectores_E, $EixoX, $VALE, $VAMLE, $VOMLE, $VOSMLE, $VALE_A, $VAMLE_A, $VOMLE_A, $VOSMLE_A, $VALE_E, $VAMLE_E, $VOMLE_E, $VOSMLE_E, $debug;
	_debugr ( $Lista, 'Lista', __LINE__, $debug );
	_debugr ( $Field, 'Field', __LINE__, $debug );
	foreach ( $Lista as $Linha ) {
		if ((preg_match ( "/VAL/i", $Linha ['Simbolo'] )) || (preg_match ( "/VAML/i", $Linha ['Simbolo'] ))) {
			$EixoConectores_E [0] = (($Linha [Valor_025] != null) && ($EixoConectores_E [0] == null)) ? $Linha [Valor_025] : $EixoConectores_E [0];
			$EixoConectores_E [1] = (($Linha [Valor_050] != null) && ($EixoConectores_E [1] == null)) ? $Linha [Valor_050] : $EixoConectores_E [1];
			$EixoConectores_E [2] = (($Linha [Valor_1] != null) && ($EixoConectores_E [2] == null)) ? $Linha [Valor_1] : $EixoConectores_E [2];
			$EixoConectores_E [3] = (($Linha [Valor_2] != null) && ($EixoConectores_E [3] == null)) ? $Linha [Valor_2] : $EixoConectores_E [3];
			$EixoConectores_E [4] = (($Linha [Valor_3] != null) && ($EixoConectores_E [4] == null)) ? $Linha [Valor_3] : $EixoConectores_E [4];
			$EixoConectores_E [5] = (($Linha [Valor_4] != null) && ($EixoConectores_E [5] == null)) ? $Linha [Valor_4] : $EixoConectores_E [5];
			$EixoConectores_E [6] = (($Linha [Valor_6] != null) && ($EixoConectores_E [6] == null)) ? $Linha [Valor_6] : $EixoConectores_E [6];
			$EixoConectores_E [7] = (($Linha [Valor_8] != null) && ($EixoConectores_E [7] == null)) ? $Linha [Valor_8] : $EixoConectores_E [7];
			
			if (preg_match ( "/VAL/i", $Linha ['Simbolo'] )) {
				$EixoConectores_A_VAL_E [0] = $Linha ["Ausente_025"];
				$EixoConectores_A_VAL_E [1] = $Linha ["Ausente_050"];
				$EixoConectores_A_VAL_E [2] = $Linha ["Ausente_1"];
				$EixoConectores_A_VAL_E [3] = $Linha ["Ausente_2"];
				$EixoConectores_A_VAL_E [4] = $Linha ["Ausente_3"];
				$EixoConectores_A_VAL_E [5] = $Linha ["Ausente_4"];
				$EixoConectores_A_VAL_E [6] = $Linha ["Ausente_6"];
				$EixoConectores_A_VAL_E [7] = $Linha ["Ausente_8"];
			}
			
			if (preg_match ( "/VAML/i", $Linha ['Simbolo'] )) {
				$EixoConectores_A_VAML_E [0] = $Linha ["Ausente_025"];
				$EixoConectores_A_VAML_E [1] = $Linha ["Ausente_050"];
				$EixoConectores_A_VAML_E [2] = $Linha ["Ausente_1"];
				$EixoConectores_A_VAML_E [3] = $Linha ["Ausente_2"];
				$EixoConectores_A_VAML_E [4] = $Linha ["Ausente_3"];
				$EixoConectores_A_VAML_E [5] = $Linha ["Ausente_4"];
				$EixoConectores_A_VAML_E [6] = $Linha ["Ausente_6"];
				$EixoConectores_A_VAML_E [7] = $Linha ["Ausente_8"];
			}
		}
		$i = 0;
		_debugr ( $Linha, 'Lista', __LINE__, $debug );
		foreach ( $Field as $Campo ) {
			if ($Linha ['Valor_' . trim ( $Campo )] != null) {
				${$Linha ['Simbolo'] . "_E"} [] = $Linha ['Ausente_' . trim ( $Campo )] == 'S' ? null : $EixoX [$i];
				${$Linha ['Simbolo']} [] = ($Linha ['Valor_' . trim ( $Campo )] == 0) ? 0.9 : (($Linha ['Valor_' . trim ( $Campo )] < 0) ? $Linha ['Valor_' . trim ( $Campo )] / 1.09 : (($Linha ['Valor_' . trim ( $Campo )] > 30) ? $Linha ['Valor_' . trim ( $Campo )] * 1.08 : $Linha ['Valor_' . trim ( $Campo )] * 1.1));
				${$Linha ['Simbolo'] . "_A"} [] = $Linha ['Ausente_' . trim ( $Campo )] == 'S' ? $EixoX [$i] : null;
			}
			$i ++;
		}
	}
}
/* */
PopulaEixos_D ( array (
		'025',
		'050',
		'1',
		'2',
		'3',
		'4',
		'6',
		'8' 
), $rs2 );
function PopulaEixos_D($Field, $Lista) {
	$i = 0;
	global $EixoConectores_A_VAML_D, $EixoConectores_A_VAL_D, $EixoConectores_Eixo_D, $EixoConectores_Vlr_D, $EixoConectores_D, $EixoX, $VALD, $VAMLD, $VOMLD, $VOSMLD, $VALD_A, $VAMLD_A, $VOMLD_A, $VOSMLD_A, $VALD_E, $VAMLD_E, $VOMLD_E, $VOSMLD_E;
	
	foreach ( $Lista as $Linha ) {
		if ((preg_match ( "/VAL/i", $Linha ['Simbolo'] )) || (preg_match ( "/VAML/i", $Linha ['Simbolo'] ))) {
			$EixoConectores_D [0] = (($Linha [Valor_025] != null) && ($EixoConectores_D [0] == null)) ? $Linha [Valor_025] : $EixoConectores_D [0];
			$EixoConectores_D [1] = (($Linha [Valor_050] != null) && ($EixoConectores_D [1] == null)) ? $Linha [Valor_050] : $EixoConectores_D [1];
			$EixoConectores_D [2] = (($Linha [Valor_1] != null) && ($EixoConectores_D [2] == null)) ? $Linha [Valor_1] : $EixoConectores_D [2];
			$EixoConectores_D [3] = (($Linha [Valor_2] != null) && ($EixoConectores_D [3] == null)) ? $Linha [Valor_2] : $EixoConectores_D [3];
			$EixoConectores_D [4] = (($Linha [Valor_3] != null) && ($EixoConectores_D [4] == null)) ? $Linha [Valor_3] : $EixoConectores_D [4];
			$EixoConectores_D [5] = (($Linha [Valor_4] != null) && ($EixoConectores_D [5] == null)) ? $Linha [Valor_4] : $EixoConectores_D [5];
			$EixoConectores_D [6] = (($Linha [Valor_6] != null) && ($EixoConectores_D [6] == null)) ? $Linha [Valor_6] : $EixoConectores_D [6];
			$EixoConectores_D [7] = (($Linha [Valor_8] != null) && ($EixoConectores_D [7] == null)) ? $Linha [Valor_8] : $EixoConectores_D [7];
			
			if (preg_match ( "/VAL/i", $Linha ['Simbolo'] )) {
				
				$EixoConectores_A_VAL_D [0] = $Linha ["Ausente_025"];
				$EixoConectores_A_VAL_D [1] = $Linha ["Ausente_050"];
				$EixoConectores_A_VAL_D [2] = $Linha ["Ausente_1"];
				$EixoConectores_A_VAL_D [3] = $Linha ["Ausente_2"];
				$EixoConectores_A_VAL_D [4] = $Linha ["Ausente_3"];
				$EixoConectores_A_VAL_D [5] = $Linha ["Ausente_4"];
				$EixoConectores_A_VAL_D [6] = $Linha ["Ausente_6"];
				$EixoConectores_A_VAL_D [7] = $Linha ["Ausente_8"];
			}
			
			if (preg_match ( "/VAML/i", $Linha ['Simbolo'] )) {
				
				$EixoConectores_A_VAML_D [0] = $Linha ["Ausente_025"];
				$EixoConectores_A_VAML_D [1] = $Linha ["Ausente_050"];
				$EixoConectores_A_VAML_D [2] = $Linha ["Ausente_1"];
				$EixoConectores_A_VAML_D [3] = $Linha ["Ausente_2"];
				$EixoConectores_A_VAML_D [4] = $Linha ["Ausente_3"];
				$EixoConectores_A_VAML_D [5] = $Linha ["Ausente_4"];
				$EixoConectores_A_VAML_D [6] = $Linha ["Ausente_6"];
				$EixoConectores_A_VAML_D [7] = $Linha ["Ausente_8"];
			}
		}
		
		$i = 0;
		_debugr ( $Linha, 'Linha', __LINE__, $debug );
		foreach ( $Field as $Campo ) {
			if ($Linha ['Valor_' . trim ( $Campo )] != null) {
				${$Linha ['Simbolo'] . "_E"} [] = $Linha ['Ausente_' . trim ( $Campo )] == 'S' ? null : $EixoX [$i];
				${$Linha ['Simbolo']} [] = ($Linha ['Valor_' . trim ( $Campo )] == 0) ? 0.9 : (($Linha ['Valor_' . trim ( $Campo )] < 0) ? $Linha ['Valor_' . trim ( $Campo )] / 1.09 : (($Linha ['Valor_' . trim ( $Campo )] > 30) ? $Linha ['Valor_' . trim ( $Campo )] * 1.08 : $Linha ['Valor_' . trim ( $Campo )] * 1.1));
				${$Linha ['Simbolo'] . "_A"} [] = $Linha ['Ausente_' . trim ( $Campo )] == 'S' ? $EixoX [$i] : null;
			}
			$i ++;
		}
	}
}

if (isset ( $VALE ) && isset ( $VAMLE )) {
	$VALE_E_U [] = $VALE_E [max ( array_keys ( $VALE_E ) )];
	$VALE_E_U [] = $VAMLE_E [min ( array_keys ( $VAMLE_E ) )];
	
	$VALE_U [] = $VALE [max ( array_keys ( $VALE ) )];
	$VALE_U [] = $VAMLE [min ( array_keys ( $VAMLE ) )];
}
foreach ( $EixoConectores_E as $key => $Linha_E ) {
	if (($Linha_E != null) and (${"EixoConectores_A_VAL_E"} [$key] == 'N') and (${"EixoConectores_A_VAML_E"} [$key] == 'N')) {
	
		$EixoConectores_Vlr_E [$key] = ($Linha_E == 0) ? 0.8 : (($Linha_E < 0) ? $Linha_E / 1.01 : (($Linha_E > 30) ? $Linha_E * 1.08 : $Linha_E * 1.1));
		$EixoConectores_Eixo_E [$key] = $EixoX [$key];
	} else {
		$EixoConectores_Vlr_E [$key] = null;
		$EixoConectores_Eixo_E [$key] = null;
	}
	
	$EixoConectores_Eixo_E [$key] = $EixoX [$key];
}

if (isset ( $VALD ) && isset ( $VAMLD )) {
	$VALD_E_U [] = $VALD_E [max ( array_keys ( $VALD_E ) )];
	$VALD_E_U [] = $VAMLD_E [min ( array_keys ( $VAMLD_E ) )];
	
	$VALD_U [] = $VALD [max ( array_keys ( $VALD ) )];
	$VALD_U [] = $VAMLD [min ( array_keys ( $VAMLD ) )];
}

foreach ( $EixoConectores_D as $key => $Linha_D ) {
	if (($Linha_D != null) and (${"EixoConectores_A_VAL_D"} [$key] == 'N') and (${"EixoConectores_A_VAML_D"} [$key] == 'N')) {
		$EixoConectores_Vlr_D [$key] = ($Linha_D == 0) ? 0.8 : (($Linha_D < 0) ? $Linha_D / 1.01 : (($Linha_D > 30) ? $Linha_D * 1.08 : $Linha_D * 1.1));
		$EixoConectores_Eixo_D [$key] = $EixoX [$key];
	} else {
		$EixoConectores_Vlr_D [$key] = null;
		$EixoConectores_Eixo_D [$key] = null;
	}
	
	$EixoConectores_Eixo_D [$key] = $EixoX [$key];
}

$graph = new Graph ( 291.4, 329, "auto" );
$graph->SetFrame ( true, 'black', 0 );
$graph->SetBackgroundImage ( './_img/bgaudiometrico.png', BGIMG_FILLFRAME );
$graph->SetScale ( "linlin", 0, 9, - 20, 130 );
$graph->SetMarginColor ( 'white' );
$graph->Set90AndMargin ( 30, 15, 30, 15 );
$graph->SetAxisStyle ( AXSTYLE_SIMPLE );
$graph->SetBox ( true, 'black' );

$graph->ygrid->Show ( false, false );
$graph->xgrid->Show ( false, false );
$graph->ygrid->SetFill ( false, '#fff@0.5', '#fff@0.5' );
$graph->xgrid->SetFill ( false, '#fff@0.5', '#fff@0.5' );
$graph->xscale->ticks->Set ( 1, 10 );
$graph->yscale->ticks->Set ( 1, 1 );
$graph->xscale->ticks->SupressZeroLabel ( true );
$graph->yscale->ticks->SupressZeroLabel ( true );
$graph->xaxis->SetColor ( 'black' );
$graph->yaxis->SetColor ( 'black', 'black' );
$graph->yaxis->SetLabelSide ( SIDE_BOTTOM );
$graph->xaxis->SetLabelSide ( SIDE_BOTTOM );
$graph->yaxis->SetTickLabels ( $scale );
$graph->xaxis->SetTickLabels ( $scale );
$graph->xaxis->SetPos ( 0 );
$graph->yaxis->SetPos ( 'min' );
$graph->xaxis->title->SetAngle ( 90 );
$graph->xaxis->title->SetMargin ( 15 );
$graph->xaxis->SetTickSide ( SIDE_DOWN );
$graph->yaxis->SetTickSide ( SIDE_LEFT );
// $graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,8);
// $graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,8);

 _debugr ( $EixoConectores_Eixo_E, "EixoConectores_Eixo_E", __LINE__, $debug );
 _debugr ( $EixoConectores_Vlr_E, "EixoConectores_Vlr_E", __LINE__, $debug );
 _debugr ( ${"EixoConectores_A_VAL_E"}, 'EixoConectores_A_VAL_E', __LINE__, $debug );
 _debugr ( ${"EixoConectores_A_VAML_E"}, 'EixoConectores_A_VAML_E', __LINE__, $debug );
 $i = 0;
 for($j = 0; $j <= 8; $j ++) {
 if (($EixoConectores_Vlr_E [$j] != null) and (${"EixoConectores_A_VAL_E"} [$j] == 'N') and (${"EixoConectores_A_VAML_E"} [$j] == 'N')) {
 ${'EixoConectores_Eixo_E' . $i} [] = $EixoConectores_Eixo_E [$j];
 ${'EixoConectores_Vlr_E' . $i} [] = $EixoConectores_Vlr_E [$j];
 $Semaforo = false;
 if ($debug == 'S')
 echo $j . " < <br>";
 // $i++;
 } else if ((${"EixoConectores_A_VAL_E"} [$j] == 'S') or (${"EixoConectores_A_VAML_E"} [$j] == 'S')) {
 if ($debug == 'S')
 echo $j . " << <br>";
 if (isset ( ${'EixoConectores_Eixo_E' . $i} )) {

 ${'sp1_Conectores' . $i} = new LinePlot ( ${'EixoConectores_Eixo_E' . $i}, ${'EixoConectores_Vlr_E' . $i} );
 $graph->Add ( ${'sp1_Conectores' . $i} );
 ${'sp1_Conectores' . $i}->SetColor ( '#0000ff' );
 ${'sp1_Conectores' . $i}->SetStyle ( "dotted" );

 $i ++;
 if ($EixoConectores_Vlr_E [$j] != null) {
 ${'EixoConectores_Eixo_E' . $i} [] = $EixoConectores_Eixo_E [$j];
 ${'EixoConectores_Vlr_E' . $i} [] = $EixoConectores_Vlr_E [$j];
 }
 }
 _debugr ( ${'EixoConectores_Eixo_E' . $i}, 'EixoConectores_Eixo_E' . $i, __LINE__, $debug );
 _debugr ( ${'EixoConectores_Vlr_E' . $i}, 'EixoConectores_Vlr_E' . $i, __LINE__, $debug );
 $Semaforo = false;
 }
 }


 if (isset ( ${'EixoConectores_Eixo_E' . $i} )) {
 _debugr ( ${'EixoConectores_Eixo_E' . $i}, 'EixoConectores_Eixo_E' . $i, __LINE__, $debug );
 _debugr ( ${'EixoConectores_Vlr_E' . $i}, 'EixoConectores_Vlr_E' . $i, __LINE__, $debug );
 ${'sp1_Conectores_E' . $i} = new LinePlot ( ${'EixoConectores_Eixo_E' . $i}, ${'EixoConectores_Vlr_E' . $i} );
 $graph->Add ( ${'sp1_Conectores_E' . $i} );
 ${'sp1_Conectores_E' . $i}->SetColor ( '#0000ff' );
 ${'sp1_Conectores_E' . $i}->SetStyle ( "dotted" );
 // ${'sp1_Conectores'.$i}->SetWeight(2);
 } else {
 _debugr ( 'Nada a plottar', 'MSG', __LINE__, $debug );
 }

/**
 * ****************************************************************************
 */
_debugr ( ${'EixoConectores_Eixo_D' }, 'EixoConectores_Eixo_D', __LINE__, $debug );
_debugr ( ${'EixoConectores_Vlr_D' }, 'EixoConectores_Vlr_D', __LINE__, $debug );
_debugr ( ${"EixoConectores_A_VAL_D"}, 'EixoConectores_A_VAL_D', __LINE__, $debug );
_debugr ( ${"EixoConectores_A_VAML_D"}, 'EixoConectores_A_VAML_D', __LINE__, $debug );
$i = 0;
for($j = 0; $j <= 8; $j ++) {
	if (($EixoConectores_Vlr_D [$j] != null) and (${"EixoConectores_A_VAL_D"} [$j] == 'N') and (${"EixoConectores_A_VAML_D"} [$j] == 'N')) {
		${'EixoConectores_Eixo_D' . $i} [] = $EixoConectores_Eixo_D [$j];
		${'EixoConectores_Vlr_D' . $i} [] = $EixoConectores_Vlr_D [$j];
		$Semaforo = false;
		if ($debug == 'S')
			echo $j . " < <br>";
		// $i++;
	} else if ((${"EixoConectores_A_VAL_D"} [$j] == 'S') or (${"EixoConectores_A_VAML_D"} [$j] == 'S')) {
		if ($debug == 'S')
			echo $j . " << <br>";
		if (isset ( ${'EixoConectores_Eixo_D' . $i} )) {
			
			${'sp1_Conectores' . $i} = new LinePlot ( ${'EixoConectores_Eixo_D' . $i}, ${'EixoConectores_Vlr_D' . $i} );
			$graph->Add ( ${'sp1_Conectores' . $i} );
			${'sp1_Conectores' . $i}->SetColor ( 'red' );
			// ${'sp1_Conectores'.$i}->SetStyle("dotted");
			
			$i ++;
			if ($EixoConectores_Vlr_D [$j] != null) {
				${'EixoConectores_Eixo_D' . $i} [] = $EixoConectores_Eixo_D [$j];
				${'EixoConectores_Vlr_D' . $i} [] = $EixoConectores_Vlr_D [$j];
			}
		}
		_debugr ( ${'EixoConectores_Eixo_D' . $j}, 'EixoConectores_Eixo_D' . $j, __LINE__, $debug );
		_debugr ( ${'EixoConectores_Vlr_D' . $j}, 'EixoConectores_Vlr_D' . $j, __LINE__, $debug );
		$Semaforo = false;
	}
}

if (isset ( ${'EixoConectores_Eixo_D' . $i} )) {
	if ($debug == 'S') {
		echo $j . " <<< <br>";
		_debugr ( ${'EixoConectores_Eixo_D' . $i}, 'EixoConectores_Eixo_D' . $i, __LINE__, $debug );
		_debugr ( ${'EixoConectores_Vlr_D' . $i}, 'EixoConectores_Vlr_D' . $i, __LINE__, $debug );
	}
	${'sp1_Conectores_D' . $i} = new LinePlot ( ${'EixoConectores_Eixo_D' . $i}, ${'EixoConectores_Vlr_D' . $i} );
	$graph->Add ( ${'sp1_Conectores_D' . $i} );
	${'sp1_Conectores_D' . $i}->SetColor ( 'red' );
	${'sp1_Conectores_D' . $i}->SetStyle ( "solid" );
	$graph->img->SetAntiAliasing ( false );
	// ${'sp1_Conectores'.$i}->SetWeight('1');
} else {
	_debugr ( 'Nada a plottar', '', __LINE__, $debug );
}

_debugr ( ${"EixoConectores_A_VAL_D"}, "EixoConectores_A_VAL_D", __LINE__, $debug );
_debugr ( ${"EixoConectores_A_VAML_D"}, "EixoConectores_A_VAML_D", __LINE__, $debug );
_debugr ( $EixoConectores_Eixo_D, "EixoConectores_Eixo_D", __LINE__, $debug );
_debugr ( $EixoConectores_Vlr_D, "EixoConectores_Vlr_D", __LINE__, $debug );

if (isset ( $VALE ) && isset ( $VAMLE )) {
	// $VALD_E_U $VALD_U
	$sp1E_U = new LinePlot ( $VALE_E_U, $VALE_U );
	$graph->Add ( $sp1E_U );
	$sp1E_U->SetColor ( '#0000ff' );
	$sp1E_U->SetStyle ( "dotted" );
	$sp1E_U->SetWeight ( 0 );
}

if (isset ( $VALD ) && isset ( $VAMLD )) {
	// $VALD_E_U $VALD_U
	$sp1D_U = new LinePlot ( $VALD_E_U, $VALD_U );
	$graph->Add ( $sp1D_U );
	$sp1D_U->SetColor ( 'red' );
	$sp1D_U->SetWeight ( 0 );
}

if (isset ( $VALE )) {
	$sp1 = new LinePlot ( $VALE_E, $VALE );
	$sp1->mark->SetType ( MARK_IMG, './_img/VALE.png', 0.6 );
	$graph->Add ( $sp1 );
	$sp1->SetColor ( '#0000ff' );
	$sp1->SetStyle ( "dotted" );
	$sp1->SetWeight ( 0 );
}
if (isset ( $VAMLE )) {
	$sp2 = new LinePlot ( $VAMLE_E, $VAMLE );
	$sp2->mark->SetType ( MARK_IMG, './_img/VAMLE.png', 0.6 );
	$graph->Add ( $sp2 );
	$sp2->SetColor ( '#0000ff' );
	$sp2->SetStyle ( "dotted" );
	$sp2->SetWeight ( 0 );
}
if (isset ( $VOMLE )) {
	$sp3 = new ScatterPlot ( $VOMLE_E, $VOMLE );
	$sp3->mark->SetType ( MARK_IMG, './_img/VOMLE.png', 0.6 );
	$graph->Add ( $sp3 );
	$sp3->SetWeight ( 0 );
}
if (isset ( $VOSMLE )) {
	$sp4 = new ScatterPlot ( $VOSMLE_E, $VOSMLE );
	$sp4->mark->SetType ( MARK_IMG, './_img/VOSMLE.png', 0.6 );
	$graph->Add ( $sp4 );
	$sp4->SetWeight ( 0 );
}
// Ausentes
if (isset ( $VALE_A )) {
	$sp_1 = new LinePlot ( $VALE_A, $VALE );
	$sp_1->mark->SetType ( MARK_IMG, './_img/VALE_A.png', 0.6 );
	$graph->Add ( $sp_1 );
	$sp_1->SetColor ( '#0000ff' );
	$sp_1->SetStyle ( "dotted" );
	$sp_1->SetWeight ( 0 );
}
if (isset ( $VAMLE_A )) {
	$sp_2 = new LinePlot ( $VAMLE_A, $VAMLE );
	$sp_2->mark->SetType ( MARK_IMG, './_img/VAMLE_A.png', 0.6 );
	$graph->Add ( $sp_2 );
	$sp_2->SetColor ( '#0000ff' );
	$sp_2->SetStyle ( "dotted" );
	$sp_2->SetWeight ( 0 );
}
if (isset ( $VOMLE_A )) {
	$sp_3 = new ScatterPlot ( $VOMLE_A, $VOMLE );
	$sp_3->mark->SetType ( MARK_IMG, './_img/VOMLE_A.png', 0.6 );
	$graph->Add ( $sp_3 );
	$sp_3->SetWeight ( 0 );
}

if (isset ( $VOSMLE_A )) {
	$sp_4 = new ScatterPlot ( $VOSMLE_A, $VOSMLE );
	$sp_4->mark->SetType ( MARK_IMG, './_img/VOSMLE_A.png', 0.6 );
	$graph->Add ( $sp_4 );
	$sp_4->SetWeight ( 0 );
}

if (isset ( $VALD )) {
	$sp11 = new LinePlot ( $VALD_E, $VALD );
	$sp11->mark->SetType ( MARK_IMG, './_img/VALD.png', 0.6 );
	$graph->Add ( $sp11 );
	$sp11->SetColor ( 'red' );
	$sp11->SetWeight ( 0 );
}
if (isset ( $VAMLD )) {
	$sp22 = new LinePlot ( $VAMLD_E, $VAMLD );
	$sp22->mark->SetType ( MARK_IMG, './_img/VAMLD.png', 0.6 );
	$graph->Add ( $sp22 );
	$sp22->SetColor ( 'red' );
	$sp22->SetWeight ( 0 );
}
if (isset ( $VOMLD )) {
	$sp33 = new ScatterPlot ( $VOMLD_E, $VOMLD );
	$sp33->mark->SetType ( MARK_IMG, './_img/VOMLD.png', 0.6 );
	$graph->Add ( $sp33 );
	$sp33->SetWeight ( 0 );
}
if (isset ( $VOSMLD )) {
	$sp44 = new ScatterPlot ( $VOSMLD_E, $VOSMLD );
	$sp44->mark->SetType ( MARK_IMG, './_img/VOSMLD.png', 0.6 );
	$graph->Add ( $sp44 );
	$sp44->SetColor ( '#ff0000' );
	$sp44->SetWeight ( 0 );
}
// Ausentes
// _debugr($VALD_A);
if (isset ( $VALD_A )) {
	$sp_11 = new LinePlot ( $VALD_A, $VALD );
	$sp_11->mark->SetType ( MARK_IMG, './_img/VALD_A.png', 0.6 );
	$graph->Add ( $sp_11 );
	$sp_11->SetColor ( 'red' );
	$sp_11->SetWeight ( 0 );
}
if (isset ( $VAMLD_A )) {
	$sp_22 = new LinePlot ( $VAMLD_A, $VAMLD );
	$sp_22->mark->SetType ( MARK_IMG, './_img/VAMLD_A.png', 0.6 );
	$graph->Add ( $sp_22 );
	$sp_22->SetColor ( 'red' );
	$sp_22->SetWeight ( 0 );
}
if (isset ( $VOMLD_A )) {
	$sp_33 = new ScatterPlot ( $VOMLD_A, $VOMLD );
	$sp_33->mark->SetType ( MARK_IMG, './_img/VOMLD_A.png', 0.6 );
	$graph->Add ( $sp_33 );
	$sp_33->SetWeight ( 0 );
}

if (isset ( $VOSMLD_A )) {
	$sp_44 = new ScatterPlot ( $VOSMLD_A, $VOSMLD );
	$sp_44->mark->SetType ( MARK_IMG, './_img/VOSMLD_A.png', 0.6 );
	$graph->Add ( $sp_44 );
	$sp_44->SetWeight ( 0 );
}

if ($debug == 'N')
	$graph->Stroke ();
?>
