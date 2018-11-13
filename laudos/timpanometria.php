<?php 
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	require_once ('./_db/_autoload.php');
	require_once ('./_includes/function.php');
	require_once ('./_graph/src/jpgraph.php');
	require_once ('./_graph/src/jpgraph_line.php');
	require_once ('./_graph/src/jpgraph_scatter.php');
	
	$label = array("-300", "","-200", "", "-100","", "0","", "+100","", "+200");
	$scale = array("","","","","","","","","","","","","","","","");
	$obj = new obj('impedanciometria i');
	$rs = $obj->buscarByCondicao("MD5(i.Consulta) = '" . $_GET['Consulta']."'");
	$Join=null;
	$TimpanometriaOD = new obj("vTimpanometriaOD t");
	$TimpanometriaOE = new obj("vTimpanometriaOE t");
	$Campos = "t.cod, t.faixa, t.valor";
	//$Join[]="inner join timpanometria_faixa tf on tf.cod = t.timpanometria_faixa";
	$Condiction ="MD5(t.consulta) = '" .$_GET['Consulta'] ."' and t.valor is not null";
	$Order ="t.faixa desc";
	
	$rsOD = $TimpanometriaOD->listar($Campos,$Condiction,$Join,$Order,null,null,false);
	$rsOE = $TimpanometriaOE->listar($Campos,$Condiction,$Join,$Order,null,null,false);
	//Orelha Direita
	//$datay1 = array(($rs[0]['Mais200LD']==null?0:$rs[0]['Mais200LD'])); //Eixo +200
	//$datay2 = array(0);   //Fixo
	$DifZeroOD = null;
	if (isset($rsOD)){
		foreach ($rsOD as $linha){
			if (!isset($DifZeroOD))
				$DifZeroOD	= $linha['valor'];
			$datay1[] = $linha['faixa'];
			$datay2[] = ($linha['valor'] - $DifZeroOD) -0.01;
		} 
	}
	
	//Orelha Esquerda
	//$datay3 = array(($rs[0]['Mais200LE']==null?0:$rs[0]['Mais200LE'])); //Eixo +200
	//$datay4 = array(0);	  //Fixo
	$DifZeroOE = null;	
	if (isset($rsOE))
	{
	foreach ($rsOE as $linha)
		{
			if (!isset($DifZeroOE))
				$DifZeroOE	= $linha['valor'];
			$datay3[] = $linha['faixa'];
			$datay4[] = ($linha['valor'] - $DifZeroOE) +0.01;
		}
	} 	
	/*
	//Orelha Direita
	$datay1 = array($rs[0]['Mais200LD'], //Eixo +200
					$rs[0]['PressaoOMLD'], 	  //Pressão Ouvido Médio	
					200); //Fixo
	$datay2 = array(0,	  //Fixo	
					$rs[0]['ComplacenciaOD_Res'],  //Complacencia Resultado
					0);   //Fixo
	//Orelha Esquerda
	$datay3 = array($rs[0]['Mais200LE'], //Eixo +200
					$rs[0]['PressaoOMLE'], 	  //Pressão Ouvido Médio	
					200); //Fixo
	$datay4 = array(0,	  //Fixo	
					$rs[0]['ComplacenciaOE_Res'],  //Complacencia Resultado
					0);   //Fixo
					
	*/					
	// Setup the graph
	$graph = new Graph(350,300,"auto");
	$graph->SetBackgroundImage( './_img/bgtimpanometria.png', BGIMG_FILLFRAME);
	$graph->SetScale("linlin",0,2.5, -300,200);
	
	//$theme_class= new UniversalTheme;
	//$graph->SetTheme($theme_class);
	
	//$graph->title->Set("Line Plots with Markers");
	$graph->SetAxisStyle(AXSTYLE_SIMPLE);
	
	$graph->SetBox(true, 'black');
	$graph->ygrid->SetFill(false,'#fff@0.5','#fff@0.5');
	$graph->xgrid->SetFill(false,'#fff@0.5','#fff@0.5');
	$graph->xscale->ticks->Set(0.1,50);
	$graph->yscale->ticks->Set(0.5,0.1);
	$graph->xaxis->SetPos(0);
	$graph->yaxis->SetPos('max');
	$graph->yaxis->SetLabelSide(SIDE_RIGHT);
	$graph->xaxis->SetLabelSide(SIDE_BOTTOM);
	$graph->xaxis->SetTickLabels($scale);
	$graph->yaxis->SetTickLabels($scale);
	$graph->SetMargin(10,30,10,30);
	$graph->xaxis->SetColor('black'); 
	$graph->yaxis->SetColor('black','black');
	$graph->ygrid->Show(false,false);
	//$graph->box_color('white');	$graph->xgrid->Show(false,false);
	
	// Create the plot
	if (isset($datay2)){
		$p1 = new LinePlot($datay2,$datay1);
		$graph->Add($p1);
		// Use an image of favourite car as marker
		$p1->mark->SetType(MARK_IMG,'./_img/od.png',0.4);
		$p1->SetColor('#ff0000');
	}
	if (isset($datay4)){
		$p2 = new LinePlot($datay4,$datay3);
		$graph->Add($p2);
		$p2->mark->SetType(MARK_IMG,'./_img/oe.png',0.4);
		$p2->SetColor('#0000ff');
	}
	
	
	
	$graph->Stroke();

?>