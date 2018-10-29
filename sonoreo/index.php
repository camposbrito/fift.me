<?php
    session_start();
?>
<html>  
	<head> 
        <meta charset="utf-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <!-- <meta name="viewport" content="initial-scale=1">  -->
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- <meta name="viewport" content="width=device-width"> -->
        <!-- <meta name="viewport" content="">  -->
        <!-- <meta name="description" content=""-->
        <meta name="author" content="Rodrigo de Campos Brito"> 
 
		<title>SONOREO - Sistemas Inteligentes de Som e Imagem.</title>
        <link href="https://fonts.googleapis.com/css?family=Khand:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="./img/sonoreo_sticky.png">
        <link type="text/css" rel='stylesheet' type='text/css' href='css/pageload.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/sonoreo.css'>
		<link type="text/css" rel='stylesheet' type='text/css' href='css/quemsomos.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/diferenciais.css'> 
        <link type="text/css" rel='stylesheet' type='text/css' href='css/solucoes.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/clientes.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/contato.css'>
		<link type="text/css" rel='stylesheet' type='text/css' href='css/menu-initial.css'>
		<link type="text/css" rel='stylesheet' type='text/css' href='css/menu-secondary.css'>
		<link type="text/css" rel='stylesheet' type='text/css' href="css/bootstrap/css/bootstrap.css" >
        <link type="text/css" rel='stylesheet' type='text/css' href="css/responsive-icon-grid.css"> 
        <!-- Responsive
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Desktops.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Laptops_Desktops.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Tablets_Ipads_portrait_.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Tablets_Ipads_landscape.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Low_Resolutio_ Tablets_Mobiles_Landscape.css'>
        <link type="text/css" rel='stylesheet' type='text/css' href='css/Most_of_the_Smartphones_Mobiles_Portrait.css'> -->
        <!-- Responsive -->
        <!-- <script> -->
        <!-- <script> -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
		<!-- slideshow  -->
		<!-- <link href="css/fractionslider.css" rel="stylesheet" /> -->
		<!--script type="text/javascript" src="js/jquery.fractionslider.js"></script-->
        <script type="text/javascript" src="js/jquery.devrama.slider.js"></script>
        <script type="text/javascript" src="js/dots.js"></script>		
        <script type="text/javascript">
                $(function() {
                    // alert(screen.width);
                    // alert(screen.height );
                    $.post('some_script.php', { width: screen.width, height:screen.height }, function(json) {
                        if(json.outcome == 'success') {
                            // do something with the knowledge possibly?
                        } else {
                            alert('Unable to let PHP know what the screen resolution is!');
                        }
                    },'json');
                });
        </script>
	</head>
	<body>            
        <div class="se-pre-con">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
        </div>
        <header class="main_h esconder">
            <div class="row">    
                <div class="mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class='initial'> <!--collapse navbar-collapse -->
                    <ul class="nav navbar-nav  ">
                        <!-- <li class="hidden"><a href="#1"></a></li> -->
                        <li><a class="page-scroll" href=".home-slide" >HOME</a></li>
                        <li><a class="page-scroll" href=".QuemSomos-slide">QUEM SOMOS</a></li>
                        <li><a class="page-scroll" href=".Diferenciais">DIFERENCIAIS</a></li>
                        <li class="logo"><img  src=".\img\sonoreo.png"></li>
                        <li><a class="page-scroll" href=".solucoes-slide">SOLUÇÕES</a></li>
                        <li><a class="page-scroll" href=".Clientes">CLIENTES</a></li>
                        <li><a class="page-scroll" href=".Contato">CONTATO</a></li>
                    </ul>
                </nav>
                <nav class="secondary" > <!--collapse navbar-collapse -->
                        <ul class="nav navbar-nav-secondary  ">
                            <!-- <li class="hidden"><a href="#1"></a></li> -->
                            <li><a class="page-scroll" href=".home-slide" >HOME</a></li>
                            <li><a class="page-scroll" href=".QuemSomos-slide">QUEM SOMOS</a></li>
                            <li><a class="page-scroll" href=".Diferenciais">DIFERENCIAIS</a></li>
                            <li class="logo-secondary"><img src=".\img\sonoreo_sticky.png"></li>
                            <li><a class="page-scroll" href=".solucoes-slide">SOLUÇÕES</a></li>
                            <li><a class="page-scroll" href=".Clientes">CLIENTES</a></li>
                            <li><a class="page-scroll" href=".Contato">CONTATO</a></li>
                        </ul>
                    </nav>
            </div> <!-- / row -->
        </header>   
        <div id="home-slide" class="home-slide esconder" style="width: 100%; height: 100%;"></div>   
        <script type="text/javascript">
            var w = window.screen.availWidth ;
            console.debug(w);
            var div = document.getElementById("home-slide");
            if (w > 719)
            {
            div.innerHTML  = 
            " <div> "+                                   
                " <img class=\"logo-central\" data-pos=\"['23%', '110%', '30%', '35%']\" data-duration=\"10\" data-effect=\"move\" data-lazy-src=\"./img/bg_central.png\"/>  "+
                " <h4  data-pos=\"['20%', '110%', '24%', '3%']\"  data-duration=\"500\" data-effect=\"move\" class=\"frase1\">//IMAGEM</h4> "+
                " <p   data-pos=\"['-30%', '25%', '34%', '3%']\"  data-duration=\"500\" data-effect=\"move\" class=\"frase2\" style=\"text-align: right\">Tecnologia à serviço! <br>Instalações de projetores, telas, TV,s <br>e sistema de comunicação Indoor.</p> "+
                " <h4  data-pos=\"['56%', '-40%', '56%', '80%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase1\">//SOM</h4> "+
                " <p   data-pos=\"['-56%', '40%', '68%', '80%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase2\" style=\"text-align: left\">Flexibilidade e tecnologia!<br>Sistemas completos de som ambiente<br>com integração</p> "+
            " </div> "
            }
            else
            {
            div.innerHTML  = 
                " <div> "+                                   
                    " <img data-pos=\"['23%', '110%', '30%', '30%']\" data-duration=\"10\" data-effect=\"move\"  class=\"logo-central\"  data-lazy-src=\"./img/bg_central.png\"/>  "+
                    " <h4  data-pos=\"['20%', '110%', '08%', '21%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase1 center\">//IMAGEM</h4> "+
                    " <p   data-pos=\"['-30%', '25%', '14%', '21%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase2 center\" style=\"text-align: right\">Tecnologia à serviço! <br>Instalações de projetores, telas, TV,s <br>e sistema de comunicação Indoor.</p> "+
                    " <h4  data-pos=\"['56%', '-40%', '56%', '30%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase1 center\">//SOM</h4> "+
                    " <p   data-pos=\"['-56%', '40%', '64%', '20%']\" data-duration=\"500\" data-effect=\"move\" class=\"frase2 center\" style=\"text-align: left\">Flexibilidade e tecnologia!<br>Sistemas completos de som ambiente<br>com integração</p> "+
                " </div> "
            }
              
                                      
        </script>
    </div>    
    <section id="QuemSomos-slide"  class="QuemSomos-slide parallax parallax-3 skew-top-cw skew-bottom-cw QuemSomos esconder" >
    </section>    
    <script type="text/javascript">
        var w = window.screen.availWidth ;
        console.debug(w);
        var QuemSomos = document.getElementById("QuemSomos-slide");
        if (w > 719)
        {
            QuemSomos.innerHTML  = 
                                    "<div class=\"\"> "+
                                    "<span data-pos=\"['23%', '110%', '20%', '0%']\"data-duration=\"10\"data-effect=\"move\"class=\"form-group col-md-12\"> "+
                                    " <span class=\"col-md-2 col-xs-12 col-sm-12 col-lg-12\"><label class=\"col-md-12 control-label titulo destaque\"></span></label> "+
                                    " <span class=\"col-md-8 col-xs-12 col-sm-12 col-lg-12\"> "+
                                    " <label class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label titulo\">+20 ANOS <span class=\"cinza\">DE MERCADO</span></label> "+
                                    " <span>&nbsp;</span> "+
                                    " <label class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label subtitulo\">Somos especialistas em sistemas e instalações de sonorização e imagem, prezando pela máxima qualidade  "+
                                    " e dispondo de atenção para cada detalhe, chegando em altos níveis de personalização de acordo com as  "+
                                    " necessidades de cada projeto. Atuante há mais de 20 anos no mercado. </label> "+
                                    " </span> "+
                                    " <span class=\"col-md-2\"></span> "+
                                    " </span> "+
                                    " <span data-pos=\"['23%', '110%', '50%', '0%']\"data-duration=\"10\"data-effect=\"move\"class=\"form-group col-md-12\"> "+
                                    " <span class=\"space col-md-12 col-xs-12 col-sm-12 col-lg-1\"></span> "+
                                    " <span class=\"col-md-12 col-xs-12 col-sm-12 col-lg-10\"style=\"padding:0!important\"> "+
                                    " <ul class=\"col-md-12 col-xs-12 col-sm-12 col-lg-12\"> "+
                                    " <li class=\"col-md-4 col-xs-4 col-sm-4 col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"M\">&nbsp;&nbsp;&nbsp;</span>issão</h3> "+
                                    " <h2 class=\"Texto\"> Oferecer excelência em sistemas e projetos de sonorização e imagem através da vasta experiência "+
                                    " e conhecimento adquirido durante os anos de atuação, prezando pelo cuidado máximo com "+
                                    " os detalhes e visando a implantação de bens duráveis, obtendo a plena satisfação pelos "+
                                    " clientes.</h2> "+
                                    " </li> "+
                                    " <li class=\"col-md-4 col-xs-4 col-sm-4 col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"V\">&nbsp;&nbsp;&nbsp;</span>isão</h3> "+
                                    " <h2 h2 class=\"Texto\">Ser referência na área, fortalecer a marca e buscar constante crescimento atingindo os pólos "+
                                    " da grande Curitiba e buscando expansão gradativa.</h2> "+
                                    " </li> "+
                                    " <li class=\"col-md-4 col-xs-4 col-sm-4 col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"V\">&nbsp;&nbsp;&nbsp;</span>alores</h3> "+
                                    " <h2 class=\"Texto\">Prezamos pela seriedade de nosso trabalho, respeito mútuo, responsabilidade, cooperação e "+
                                    " acima de tudo, honestidade sob todos os aspectos.</h2> "+
                                    " "+
                                    " </li> "+
                                    " "+
                                    " </ul> "+
                                    " </span> "+
                                    " <span class=\"col-md-12 col-xs-12 col-sm-12 col-lg-1\"></span> "+
                                    " "+
                                    " </span> "+
                                    "</div> "
        }	
        else{
            QuemSomos.innerHTML  = 
                                    "<div class=\"\"> "+
                                    " "+
                                    " <span class=\"col-md-2 col-xs-12 col-sm-12 col-lg-12 titulo destaque control\">Quem Somos</span> "+
                                    " <span class=\"col-md-8 col-xs-12 col-sm-12 col-lg-12\"> "+
                                    " <label class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label titulo\">+20 ANOS <br><span class=\"cinza\">DE MERCADO</span></label> "+
                                    " <span>&nbsp;</span> "+
                                    " <span class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12  subtitulo\">Somos especialistas em sistemas e instalações de sonorização e imagem, prezando pela máxima qualidade   "+
                                    " e dispondo de atenção para cada detalhe, chegando em altos níveis de personalização de acordo com as  "+
                                    " necessidades de cada projeto. Atuante há mais de 20 anos no mercado. </span> "+
                                    " </span> "+
                                    " <span class=\"col-md-2\"></span> "+
                                    "   "+
                                    " <span  class=\"form-group col-md-12 col-xs-12 col-sm-12 \"> "+
                                     " <span class=\"col-md-12 col-xs-12 col-sm-12 col-lg-10\"style=\"padding:0!important\"> "+
                                    " <ul class=\"col-md-12 col-xs-12 col-sm-12 col-lg-12\"> "+
                                    " <li class=\"col-md-4 col-xs-12 col-sm-12 col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"M\">&nbsp;&nbsp;&nbsp;</span>issão</h3> "+
                                    " <h2 class=\"Texto\"> Oferecer excelência em sistemas e projetos de sonorização e imagem através da vasta experiência "+
                                    " e conhecimento adquirido durante os anos de atuação, prezando pelo cuidado máximo com "+
                                    " os detalhes e visando a implantação de bens duráveis, obtendo a plena satisfação pelos "+
                                    " clientes.</h2> "+
                                    " </li> "+
                                    " <li class=\"col-md-4 col-xs-12 col-sm-12 col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"V\">&nbsp;&nbsp;&nbsp;</span>isão</h3> "+
                                    " <h2 h2 class=\"Texto\">Ser referência na área, fortalecer a marca e buscar constante crescimento atingindo os pólos "+
                                    " da grande Curitiba e buscando expansão gradativa.</h2> "+
                                    " </li> "+
                                    " <li class=\"col-md-4 col-xs-12 col-sm-12col-lg-4\"> "+
                                    " <h3 class=\"cbp-ig-title\"><span class=\"V\">&nbsp;&nbsp;&nbsp;</span>alores</h3> "+
                                    " <h2 class=\"Texto\">Prezamos pela seriedade de nosso trabalho, respeito mútuo, responsabilidade, cooperação e "+
                                    " acima de tudo, honestidade sob todos os aspectos.</h2> "+
                                    " "+
                                    " </li> "+
                                    " "+
                                    " </ul> "+
                                    " </span> "+
                                    " <span class=\"col-md-12 col-xs-12 col-sm-12 col-lg-1\"></span> "+
                                    " "+
                                    " </span> "+
                                    "</div> "
        }																																																		
        </script>
        
                                      
        <section class="Diferenciais-slide module parallax parallax-3 skew-top-cw skew-bottom-cw esconder" >
            <div class="row Diferenciais">  
                <div class="container col-md-12" > 
                    <div class="left col-md-2 titulo">DIFERENCIAIS</div>
                    <div class="col-md-8">        
                    </div>
                    <div class="right col-md-2"></div>
                </div>
                <div class="container col-md-12 col-sm-12 col-xs-12  lista">
                    <div class="col-md-8  col-sm-12 col-xs-12 conteudo">
                        <ul>
                            <li class="projetos">
                                <div class="col-md-10 col-sm-12 col-xs-12 content">
                                    <h3 class="cbp-ig-title">PROJETOS PERSONALIZADOS | </h3>
                                    <h2>Os sistemas são projetados para total
                                         adequação às necessidades de
                                         cada ambiente</h2>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2 imagem">
                                    <img src="./img/png/icone-projetos-personalizados.png">
                                </div>
        
                            </li>
                            <li class="space">&nbsp;</li>
                            <li class="assistencia">
                                <div class="col-md-10 col-sm-9   col-xs-12  content">
                                    <h3 class="cbp-ig-title">ASSISTÊNCIA TÉCNICA PERMANENTE |</h3>
                                    <h2>Fornecemos assistência técnica e manutenção durante o
                                         período total de uso de nosso sistema, oferecendo
                                         conforto, comodidade e segurança</h2>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2 imagem">
                                    <img src="./img/png/icone-assistencia-permanente.png">
                                </div>
                            </li>
                            <li>&nbsp;</li>
                            <li class="experiencia">
                                <div class="col-md-10 col-sm-9   col-xs-12 content">
                                    <h3 class="cbp-ig-title">EXPERIÊNCIA CONSOLIDADA |</h3>
                                    <h2  >Os mais de 20 anos de experiência oferecem segurança, qualidade 
                                        garantida e rapidez na execução e adaptação dos projetos </h2>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2 imagem">
                                    <img src="./img/png/icone-experiencia-consolidada.png">
                                </div>
                            </li>
        
                        </ul>
                    </div>
                    <div class="right col-md-2 col-sm-0"></div>
                </div>
            </div>
        </section>
       
        <section class="solucoes-slide module parallax parallax-3 esconder" style="padding: 0; margin: 0"> 
        <?php 
            session_start();
            if ($_SESSION['screen_width'] < 719)
            {       
        ?>
            <div class="row Solucoes"  style="border:1px solid red; background:url('./img/png/solucoes-residencial.png') #f37027 no-repeat 0 0"  >                   
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">RESIDENCIAL</h2>
                <p   class="subtitulo">Aproveite os melhores momentos com a família!</p>
                <p   class="frase1-titulo-solucoes negrito">HOME CINEMA |&nbsp;</p>
                <p   class="frase1-solucoes ">Que tal um cinema em casa? Fazemos projetos de instalação para sistema de aúdio embutido, telas e instalação de projetores.</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE SOM ROOM BY ROOM |</p>
                <p   class="frase1-solucoes ">Som por toda casa. Churrasqueira, quartos, sala de estar, hall de entrada. Com possibilidade de adaptação onde quiser tocar a sua música ou reproduzir sua TV.</p>
                <p   class="frase1-titulo-solucoes negrito">INSTALAÇÃO INAPARENTE | </p>
                <p   class="frase1-solucoes "> Transforme seu ambiente sem modificar a arquitetura e decoração! Telas retráteis, projetores com lifts embutidos no teto, caixas de som na cor da parede/móvel ou com arandelas no teto, além de sistema de cabeamento inaparente
                </p>  
            </div>   
            <div class="row Solucoes"  style="background:url('./img/png/solucoes-igrejas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">IGREJAS</h2>
                <p   class="subtitulo">Audibilidade, nitidez e recursos para melhorar a qualidade das celebrações</p>
                <p   class="frase1-titulo-solucoes negrito">ESTRUTURA PARA ALTAR E MÚSICOS |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado oferecendo flexibilidade para músicos e equipamentos deuso contínuo. Equipamentos utilizados focados para acústica de igrejas e templos. </p>
                <p   class="frase1-titulo-solucoes negrito">PROJETORES / TV'S |</p>
                <p   class="frase1-solucoes negrito">Instalação de data shows, telas com retração automática e TV’s. Sistemas parafuncionamento em sincronia para acompanhamento de cantos, leituras, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">ACABAMENTO PERSONALIZADO | </p>
                <p   class="frase1-solucoes negrito"> Caixas discretas personalizadas na cor do acabamento amadeirado ou da pintura da paredecriando harmonia na decoração e arquitetura.</p>
                <p   class="frase1-titulo-solucoes negrito">CURSO PRÁTICO | </p>
                <p   class="frase1-solucoes negrito"> Oferecemos curso pós-instalação para ensinamento técnico sobre equipamentos e equalizações pertinentes ao local, para melhor aproveitamento por meio dos músicos, funcionários e presidentes.</p>
            </div>
            <div class="row Solucoes"   style="background:url('./img/png/solucoes-empresas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">EMPRESAS</h2>
                <p   class="subtitulo">Comodidade para facilitar o dia a dia.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE REUNIÕES MULTIMíDIA | </p>
                <p   class="frase1-solucoes negrito">Oferecemos sistemas completos ou básicos para sala de reuniõescom possibilidade de telas, televisões, microfones, sonorização, com recursos chamada viva-voz e vídeo-conferência. </p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas ou setores independentes..</p>
                <p   class="frase1-titulo-solucoes negrito">SOM AMBIENTE / RÁDIO INDOOR | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade de sistema integrado por meio de softwares onlines, conexão via USB,SD card, notebook, celular e bluetooth.</p>
                <p   class="frase1-titulo-solucoes negrito">SALA DE PALESTRAS | </p>
                <p   class="frase1-solucoes negrito"> Sistemas inteligentes integrados com sonorização, projetor e microfone para uma perfeita apresentação.</p>
            </div>
            <div class="row Solucoes"    style="padding:10px; background:url('./img/png/solucoes-lojas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2> 
                <h2  class="titulo2-solucoes">LOJAS</h2>
                <p   class="subtitulo">Oferecemos eficiência para facilitar a comunicação e o ensino no cotidiano</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas setorizadas independentes.</p>
                <p   class="frase1-titulo-solucoes negrito">COMUNICAÇÃO EXTERNA INTEGRADA |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado para áreas externas como pátio, refeitório, cancha, playground, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE AULA MULTIMÍDIA |</p>
                <p   class="frase1-solucoes negrito"> Projetores, telas interativas, TV’s e sons integrados para uso dentro da sala de aula.</p>
                <p   class="frase1-titulo-solucoes negrito">RÁDIO ESCOLA | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade para dar notícias, informações e envolver os alunos dentro do ambiente escolar.</p>
            </div>
            <div class="row Solucoes" style="padding:10px; background:url('./img/png/solucoes-escolas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">ESCOLAS</h2>
                <p   class="subtitulo">Oferecemos eficiência para facilitar a comunicação e o ensino no cotidiano</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas setorizadas independentes.</p>
                <p   class="frase1-titulo-solucoes negrito">COMUNICAÇÃO EXTERNA INTEGRADA |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado para áreas externas como pátio, refeitório, cancha, playground, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE AULA MULTIMÍDIA |</p>
                <p   class="frase1-solucoes negrito"> Projetores, telas interativas, TV’s e sons integrados para uso dentro da sala de aula.</p>
                <p   class="frase1-titulo-solucoes negrito">RÁDIO ESCOLA | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade para dar notícias, informações e envolver os alunos dentro do ambiente escolar.</p>
            </div>  
        <?php
            }
            else
            {
        ?>              
            <div class="row Solucoes"  style="border:1px solid red; background:url('./img/png/solucoes-residencial.png') #f37027 no-repeat 0 0"  >                   
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">RESIDENCIAL</h2>
                <p   class="subtitulo">Aproveite os melhores momentos com a família!</p>
                <p   class="frase1-titulo-solucoes negrito">HOME CINEMA |&nbsp;</p>
                <p   class="frase1-solucoes ">Que tal um cinema em casa? Fazemos projetos de instalação para sistema de aúdio embutido, telas e instalação de projetores.</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE SOM ROOM BY ROOM |</p>
                <p   class="frase1-solucoes ">Som por toda casa. Churrasqueira, quartos, sala de estar, hall de entrada. Com possibilidade de adaptação onde quiser tocar a sua música ou reproduzir sua TV.</p>
                <p   class="frase1-titulo-solucoes negrito">INSTALAÇÃO INAPARENTE | </p>
                <p   class="frase1-solucoes "> Transforme seu ambiente sem modificar a arquitetura e decoração! Telas retráteis, projetores com lifts embutidos no teto, caixas de som na cor da parede/móvel ou com arandelas no teto, além de sistema de cabeamento inaparente
                </p>  
            </div>   
            <div class="row Solucoes" data-lazy-background="./img/png/solucoes-igrejas.png" style="background:url('./img/png/solucoes-igrejas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">IGREJAS</h2>
                <p   class="subtitulo">Audibilidade, nitidez e recursos para melhorar a qualidade das celebrações</p>
                <p   class="frase1-titulo-solucoes negrito">ESTRUTURA PARA ALTAR E MÚSICOS |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado oferecendo flexibilidade para músicos e equipamentos deuso contínuo. Equipamentos utilizados focados para acústica de igrejas e templos. </p>
                <p   class="frase1-titulo-solucoes negrito">PROJETORES / TV'S |</p>
                <p   class="frase1-solucoes negrito">Instalação de data shows, telas com retração automática e TV’s. Sistemas parafuncionamento em sincronia para acompanhamento de cantos, leituras, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">ACABAMENTO PERSONALIZADO | </p>
                <p   class="frase1-solucoes negrito"> Caixas discretas personalizadas na cor do acabamento amadeirado ou da pintura da paredecriando harmonia na decoração e arquitetura.</p>
                <p   class="frase1-titulo-solucoes negrito">CURSO PRÁTICO | </p>
                <p   class="frase1-solucoes negrito"> Oferecemos curso pós-instalação para ensinamento técnico sobre equipamentos e equalizações pertinentes ao local, para melhor aproveitamento por meio dos músicos, funcionários e presidentes.</p>
            </div>
            <div class="row Solucoes" data-lazy-background="./img/png/solucoes-empresas.png"  style="background:url('./img/png/solucoes-empresas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">EMPRESAS</h2>
                <p   class="subtitulo">Comodidade para facilitar o dia a dia.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE REUNIÕES MULTIMíDIA | </p>
                <p   class="frase1-solucoes negrito">Oferecemos sistemas completos ou básicos para sala de reuniõescom possibilidade de telas, televisões, microfones, sonorização, com recursos chamada viva-voz e vídeo-conferência. </p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas ou setores independentes..</p>
                <p   class="frase1-titulo-solucoes negrito">SOM AMBIENTE / RÁDIO INDOOR | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade de sistema integrado por meio de softwares onlines, conexão via USB,SD card, notebook, celular e bluetooth.</p>
                <p   class="frase1-titulo-solucoes negrito">SALA DE PALESTRAS | </p>
                <p   class="frase1-solucoes negrito"> Sistemas inteligentes integrados com sonorização, projetor e microfone para uma perfeita apresentação.</p>
            </div>
            <div class="row Solucoes" data-lazy-background="./img/png/solucoes-lojas.png"  style="padding:10px; background:url('./img/png/solucoes-lojas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2> 
                <h2  class="titulo2-solucoes">LOJAS</h2>
                <p   class="subtitulo">Oferecemos eficiência para facilitar a comunicação e o ensino no cotidiano</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas setorizadas independentes.</p>
                <p   class="frase1-titulo-solucoes negrito">COMUNICAÇÃO EXTERNA INTEGRADA |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado para áreas externas como pátio, refeitório, cancha, playground, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE AULA MULTIMÍDIA |</p>
                <p   class="frase1-solucoes negrito"> Projetores, telas interativas, TV’s e sons integrados para uso dentro da sala de aula.</p>
                <p   class="frase1-titulo-solucoes negrito">RÁDIO ESCOLA | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade para dar notícias, informações e envolver os alunos dentro do ambiente escolar.</p>
            </div>
            <div class="row Solucoes" data-lazy-background="./img/png/solucoes-escolas.png"  style="padding:10px; background:url('./img/png/solucoes-escolas.png') #f37027 no-repeat 0 0"  >
                <h2  class="titulo1-solucoes">//SOLUÇÕES</h2>
                <h2  class="titulo2-solucoes">ESCOLAS</h2>
                <p   class="subtitulo">Oferecemos eficiência para facilitar a comunicação e o ensino no cotidiano</p>
                <p   class="frase1-titulo-solucoes negrito">SISTEMA DE COMUNICAÇÃO ROOM BY ROOM | </p>
                <p   class="frase1-solucoes negrito">Distribuições otimizadas por salas setorizadas independentes.</p>
                <p   class="frase1-titulo-solucoes negrito">COMUNICAÇÃO EXTERNA INTEGRADA |</p>
                <p   class="frase1-solucoes negrito">Sistema integrado para áreas externas como pátio, refeitório, cancha, playground, etc.</p>
                <p   class="frase1-titulo-solucoes negrito">SALAS DE AULA MULTIMÍDIA |</p>
                <p   class="frase1-solucoes negrito"> Projetores, telas interativas, TV’s e sons integrados para uso dentro da sala de aula.</p>
                <p   class="frase1-titulo-solucoes negrito">RÁDIO ESCOLA | </p>
                <p   class="frase1-solucoes negrito"> Possibilidade para dar notícias, informações e envolver os alunos dentro do ambiente escolar.</p>
            </div>  
        <?PHP        
            }
        ?>                    
        </section>
     
        <section class="module parallax parallax-3 skew-top-cw skew-bottom-cw Clientes esconder"  >  
                <div class="clientes-slide">                     
                <!-- <script type="text/javascript">
                    var w = window.screen.availWidth ;
                    console.debug(w);
                    var QuemSomos = document.getElementById("QuemSomos-slide"); -->
                    <div class="col-lg-7 nossos-clientes" data-pos="['-30%', '30%',    '0%', '0%']" data-duration="0" data-effect="move">
                        <script type="text/javascript">
                            $(function() {
                            $.post('some_script.php', { width: screen.width, height:screen.height }, function(json) {
                                if(json.outcome == 'success') {
                                    // do something with the knowledge possibly?
                                } else {
                                    alert('Unable to let PHP know what the screen resolution is!');
                                }
                            },'json');
                        });
                            </script>
                        <?php 
                           session_start();
                            if ($_SESSION['screen_width'] < 719)
                            {
                        ?>
                            <p data-pos="['-30%', '30%',    '6%', '20%']" data-duration="0" data-effect="move" class="frase1 pos1">Alguns de Nossos Clientes</p>
                            <p class="Caterpillar "   data-pos="['-30%', '25%',  '13%', '12%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_caterpillar.png"    alt="Caterpillar"></p> 
                            <p class="incepa"         data-pos="['-30%', '25%',  '12%', '50%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_incepa.png"         alt="incepa"></p> 
                            <p class="pernambucanas"  data-pos="['-30%', '25%',  '24%', '12%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_pernambucanas.png"  alt="pernambucanas"></p> 
                            <p class="pmcl "          data-pos="['-30%', '25%',  '24%', '50%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmcl.png"           alt="pmcl"></p> 
                            <p class="pr "            data-pos="['-30%', '25%',  '34%', '12%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pr.png"             alt="pr"></p> 
                            <p class="pmbn "          data-pos="['-30%', '25%',  '36%', '50%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmbn.png"           alt="pmbn"></p> 
                            <p class="senai "         data-pos="['-30%', '25%',  '49%', '12%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_senai.png"          alt="senai"></p> 
                            <p class="arq_curitiba "  data-pos="['-30%', '25%',  '48%', '50%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_arq_curitiba.png"   alt="arq_curitiba"></p> 
                            <p class="colatusso "     data-pos="['-30%', '25%',  '60%', '12%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_colatusso.png"      alt="colatusso"></p> 
                            <p class="aabb "          data-pos="['-30%', '25%',  '62%', '50%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_aabb.png"           alt="aabb"></p> 
                            <p class="inc "           data-pos="['-30%', '25%',  '72%', '28%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_inc.png"            alt="inc"></p> 
                        <?php
                        }
                        else
                        {
                        ?>
                            <p data-pos="['-30%', '30%',    '6%', '20%']" data-duration="0" data-effect="move" class="frase1 pos1">Alguns de</p> -->
                            <p data-pos="['-30%', '30%',    '9%', '14%']" data-duration="0" data-effect="move" class="frase2 pos2">Nossos</p>
                            <p data-pos="['-30%', '30%',   '20%', '10%']" data-duration="0" data-effect="move" class="frase2 pos3">Clientes</p>
                            <p class="Caterpillar "   data-pos="['-30%', '25%',   12%', '44%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_caterpillar.png"    alt="Caterpillar"></p> 
                            <p class="incepa"         data-pos="['-30%', '25%',   12%', '64%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_incepa.png"         alt="incepa"></p> 
                            <p class="pernambucanas"  data-pos="['-30%', '25%',   12%', '84%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_pernambucanas.png"  alt="pernambucanas"></p> 
                            <p class="pmcl "          data-pos="['-30%', '25%',  '30%', '39%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmcl.png"           alt="pmcl"></p> 
                            <p class="pr "            data-pos="['-30%', '25%',  '30%', '59%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pr.png"             alt="pr"></p> 
                            <p class="pmbn "          data-pos="['-30%', '25%',  '30%', '79%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmbn.png"           alt="pmbn"></p> 
                            <p class="senai "         data-pos="['-30%', '25%',  '50%', '29%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_senai.png"          alt="senai"></p> 
                            <p class="arq_curitiba "  data-pos="['-30%', '25%',  '50%', '49%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_arq_curitiba.png"   alt="arq_curitiba"></p> 
                            <p class="colatusso "     data-pos="['-30%', '25%',  '50%', '69%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_colatusso.png"      alt="colatusso"></p> 
                            <p class="aabb "          data-pos="['-30%', '25%',  '70%', '39%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_aabb.png"           alt="aabb"></p> 
                            <p class="inc "           data-pos="['-30%', '25%',  '70%', '59%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_inc.png"            alt="inc"></p>  
                            
                        <?PHP        
                        }
                        ?>
                        <!-- <p class="Caterpillar "   data-pos="['-30%', '25%',   12%', '44%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_caterpillar.png"    alt="Caterpillar"></p> 
                        <p class="incepa"         data-pos="['-30%', '25%',   12%', '64%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_incepa.png"         alt="incepa"></p> 
                        <p class="pernambucanas"  data-pos="['-30%', '25%',   12%', '84%']" data-duration="100" data-effect="move"><img class="img-responsive img1" src="./img/png/clientes/_pernambucanas.png"  alt="pernambucanas"></p> 
                        <p class="pmcl "          data-pos="['-30%', '25%',  '30%', '39%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmcl.png"           alt="pmcl"></p> 
                        <p class="pr "            data-pos="['-30%', '25%',  '30%', '59%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pr.png"             alt="pr"></p> 
                        <p class="pmbn "          data-pos="['-30%', '25%',  '30%', '79%']" data-duration="100" data-effect="move"><img class="img-responsive img2" src="./img/png/clientes/_pmbn.png"           alt="pmbn"></p> 
                        <p class="senai "         data-pos="['-30%', '25%',  '50%', '29%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_senai.png"          alt="senai"></p> 
                        <p class="arq_curitiba "  data-pos="['-30%', '25%',  '50%', '49%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_arq_curitiba.png"   alt="arq_curitiba"></p> 
                        <p class="colatusso "     data-pos="['-30%', '25%',  '50%', '69%']" data-duration="100" data-effect="move"><img class="img-responsive img3" src="./img/png/clientes/_colatusso.png"      alt="colatusso"></p> 
                        <p class="aabb "          data-pos="['-30%', '25%',  '70%', '39%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_aabb.png"           alt="aabb"></p> 
                        <p class="inc "           data-pos="['-30%', '25%',  '70%', '59%']" data-duration="100" data-effect="move"><img class="img-responsive img4" src="./img/png/clientes/_inc.png"            alt="inc"></p>  -->
                    </div>    
                </div>
        </section>
        
        <section class="Contato-slide module parallax parallax-3 skew-top-cw skew-bottom-cw Contato esconder">
                <div class=" contato">         
                    <span data-pos="['-30%', '7%',   '0%', '8%']" data-duration="0" data-effect="move"  >
                            <h2 data-pos="['-30%', '25%',  '8%', '-5%']" data-duration="100" data-effect="move" class="titulo2-solucoes">CONTATO</h2>   
                            <h5 class="frase2">Estamos a disposição para atendê-lo.<br>
                            Faça um orçamento conosco!
                        </h5>
                    </span>
                            <?php 
                           session_start();
                            // echo '<script> alert('.$_SESSION['screen_width'].');</script>';
                            if ($_SESSION['screen_width'] < 719)
                            {
                            ?>
                            <form  style="width: 78%;" data-pos="['-31%', '7%',   '16%', '10%']" data-duration="0" data-effect="move"  autocomplete="off" method="POST" >                        
                                <!-- <span class="formulario">                         -->
                                    <!-- <span class="textbox parallelogram nome"> -->
                                        <!-- <span class="skew-fix"> -->
                                            <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md">
                                        <!-- </span> -->
                                    <!-- </span> -->
                                    <br/>
                                    <!-- <span class="textbox parallelogram mail"> -->
                                        <!-- <span class="skew-fix"> -->
                                                <input id="mail" name="mail" type="text" placeholder="E-mail" class="form-control input-md">
                                        <!-- </span> -->
                                    <!-- </span> -->
                                    <br/>
                                    <!-- <span class="textbox parallelogram assunto"> -->
                                        <!-- <span class="skew-fix"> -->
                                                <select id="assunto" name="assunto" class="form-control"><option>Assunto</option><option value="1">Option one</option><option value="2">Option two</option></select>
                                        <!-- </span> -->
                                    <!-- </span>      -->
                                    <br/>
                                    <!-- <span class="area parallelogram mensagem"> -->
                                            <!-- <span class="skew-fix"> -->
                                                    <textarea class="form-control" rows="10" id="mensagem" name="mensagem" placeholder="Mensagem"></textarea>
                                            <!-- </span> -->
                                        <!-- </span>     ; -->
                                                
                                <!-- </span>                         -->
                                <br>
                                <input id="enviar" name="enviar" type="submit"  class="form-control input-md" value="Enviar"> 
                                       
                            </form>
                            <span data-pos="['-30%', '7%',   '100%', '0%']" data-duration="0" data-effect="move"  class=" footer">
                                <span class=" footer-slide">                           
                                    <span class="copyright">|<span class="ddd">(41)</span> 3032.3577</span><br>
                                    <span class="copyright">| contato@sonoreo.com.br</span><br>
                                    <span class="copyright">| Rua Centenário, 2877 - 83601-000 - Campo Largo-PR</span>                                   
                                </span>               	
                            </span> 
                            <span data-pos="['-30%', '7%',   '100%', '0%']" data-duration="0" data-effect="move"   class=" social">
                               
                                <ul class="list-inline social-buttons">
                                    <li> Acesse: <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </span>
                        <?php
                        }
                        else
                        {
                        ?>
                                <form  data-pos="['-32%', '7%',   '0%', '20%']" data-duration="0" data-effect="move"  autocomplete="off" method="POST" >                        
                                <span class="formulario">                        
                                    <span class="textbox parallelogram nome">
                                        <span class="skew-fix">
                                            <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md">
                                        </span>
                                    </span>
                                    <br/>
                                    <span class="textbox parallelogram mail">
                                        <span class="skew-fix">
                                                <input id="mail" name="mail" type="text" placeholder="E-mail" class="form-control input-md">
                                        </span>
                                    </span>
                                    <br/>
                                    <span class="textbox parallelogram assunto">
                                        <span class="skew-fix">
                                                <select id="assunto" name="assunto" class="form-control"><option>Assunto</option><option value="1">Option one</option><option value="2">Option two</option></select>
                                        </span>
                                    </span>     
                                    <br/>
                                    <span class="area parallelogram mensagem">
                                            <span class="skew-fix">
                                                    <textarea class="form-control" rows="10" id="mensagem" name="mensagem" placeholder="Mensagem"></textarea>
                                            </span>
                                        </span>     
                                      <br/>
                                      <span class="textbox parallelogram enviar">
                                        <span class="skew-fix">
                                            <input id="enviar" name="enviar" type="submit"  class="form-control input-md" value="Enviar"> 
                                        </span>
                                    </span>          
                                </span>                        
                            </form>
                            <span data-pos="['-30%', '7%',   '78%', '0%']" data-duration="0" data-effect="move"  class=" footer">
                                <span class=" footer-slide">                           
                                    <span class="copyright">|<span class="ddd">(41)</span> 3032.3577</span><br>
                                    <span class="copyright">| contato@sonoreo.com.br</span><br>
                                    <span class="copyright">| Rua Centenário, 2877 - 83601-000 - Campo Largo-PR</span>                                   
                                </span>               	
                            </span> 
                            <span data-pos="['-30%', '7%',   '80%', '65%']" data-duration="0" data-effect="move"   class=" social">
                                Acesse:
                                <ul class="list-inline social-buttons">
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </span>
                        <?PHP        
                        }
                        ?>
                    <!-- <img data-pos="['-30%', '7%',   '6%', '80%']" data-duration="0" data-effect="move"  style="width:150px" class="sonoreo_contato" src="./img/sonoreo_contato.png"/> -->
                    <!-- <footer> -->
                    
                <!-- </footer>     -->
            </div>            
              
        </section>   
            
        <!-- <script type="text/javascript" src="js/script.js"></script> -->
        
        <script type="text/javascript">
        $('.awesome-tooltip').tooltip({
    placement: 'left'
}); 
// Sticky Header
$(window).scroll(function() {
     if (!$('.mobile-toggle').is(':visible')){
        // if ($(window).scrollTop() > window.screen.availHeight - 160) {
        //     $('.main_h').addClass('sticky');
        //     $('nav.secondary').attr('style', 'display: table !important');
        //     $('nav.initial').css('display','none');
        //     // alert(4);
        // } else {
        //     $('.main_h').removeClass('sticky');
        //     $('nav.secondary').attr('style', 'display: none !important');
        //     $('nav.initial').css('display','table');        
        //     // alert(5);
        // }

        $('.home-slide').each(function(){
            //if(!isScrolledIntoView($(this))){
            if(!isElementInView($(this),false)){    
                $('.main_h').addClass('sticky',500);
                $('nav.secondary').attr('style', 'display: table !important',500);
                $('nav.initial').css('display','none',500);
            }
            else{
                $('.main_h').removeClass('sticky',500);
                $('nav.secondary').attr('style', 'display: none !important',500);
                $('nav.initial').css('display','table',500);
            }
          });
    }
    
    function isElementInView(element, fullyInView) {
        console.debug('isElementInView');
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height()  ;
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height() -160 ;

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
    function isScrolledIntoView(elem){
        console.debug('isScrolledIntoView');
        var $elem = $(elem);
        var $window = $(window);
    
        var docViewTop = $window.scrollTop();
        var docViewBottom = docViewTop + $window.height();
    
        var elemTop = $elem.offset().top;
        var elemBottom = elemTop + $elem.height();
    
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
});
$(window).resize(function(){
    // var scrollWidth = getBrowserScrollSize().width;
  
    // var w = window.screen.availWidth - scrollWidth;
    // var h = window.screen.availHeight; 	
    // var hPrincipal = h - 74;
    // var hSecondary = h - 111;
    // hPrincipal = h ;
    // hSecondary = h - 40;
    // $('.home-slide').height(hPrincipal);
});
// Mobile Navigation
$('.mobile-toggle').click(function() {
    if ($('.main_h').hasClass('open-nav')) {
        $('.main_h').removeClass('open-nav');

        $('nav.secondary').attr('style', 'display: none !important');
        
        $('nav.initial').fadeOut('fast'); 
        setTimeout(function() {
            $('nav.initial .logo img').css('width','70%'); 
        }, 500);
    } else {
        $('.main_h').addClass('open-nav');
        // setTimeout(function() {
            
        $('nav.initial').fadeIn('fast').css('display','table'); 
        //   }, 500);
         
        // if ($(window).scrollTop() > window.screen.availHeight - 160) {
            // $('.main_h').addClass('sticky');
            // $('nav.secondary').attr('style', 'display: table !important');
            // $('nav.initial').css('display','none');
            
        // } else {
            // $('.main_h').removeClass('sticky');
            $('nav.secondary').attr('style', 'display: none !important');
            // $('nav.initial').css('display','table'); 
            $('nav.initial .logo img').css('width','20%'); 
        // }
    }
});

$('.main_h li a').click(function() {
    if ($('.main_h').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_h').removeClass('open-nav');
        $('nav.secondary').attr('style', 'display: none !important');
        $('nav.initial').css('display','none');
    }
});

// navigation scroll lijepo radi materem
$('nav a').click(function(event) {
    var id = $(this).attr("href");
    var NavHeight = (($('.initial').height() == 0) ?  $('.navbar-nav-secondary').height() : $('.initial').height()) ;
    console.log( '-------------- ');
    console.log( 'Total: ' + NavHeight);
    console.log( 'id: ' +  id);
    console.log( 'navbar-nav-secondary: ' + $('.navbar-nav-secondary').height());
    console.log( 'secondary: ' + $('.secondary').height());
    console.log( '-------------- '); 
    if (NavHeight >= 74 ){
        if (id == '.slider-wrapper'){
            var offset = 100
        }else{
            var offset = 40
        }
    } 
    else if ((NavHeight >= 56 ) &&  (NavHeight <= 73 )){
        if (id == '.slider-wrapper'){
            var offset = 82
        }else{
            var offset = 22
        }
    }
    else if ((NavHeight >= 51 ) &&  (NavHeight <= 55 )){
        if (id == '.slider-wrapper'){
            var offset = 82
        }else{
            var offset = 40
        }
    }
    else{
            if (id == '.slider-wrapper'){
            var offset = 100
        }else{
            var offset = 40
        }
    }
    console.log('outerHeight: ' +$('.initial').outerHeight());
    console.log('Height: ' + $('.initial').height());
	console.log('offset: ' + offset);
    var target = $(id).offset().top - offset;
    $('html, body').animate({
        scrollTop: target
    }, 500);
    event.preventDefault();
}); 

function getBrowserScrollSize(){

    var css = {
        "border":  "none",
        "height":  "200px",
        "margin":  "0",
        "padding": "0",
        "width":   "200px"
    };

    var inner = $("<div>").css($.extend({}, css));
    var outer = $("<div>").css($.extend({
        "left":       "-1000px",
        "overflow":   "scroll",
        "position":   "absolute",
        "top":        "-1000px"
    }, css)).append(inner).appendTo("body")
    .scrollLeft(1000)
    .scrollTop(1000);

    var scrollSize = {
        "height": (outer.offset().top - inner.offset().top) || 0,
        "width": (outer.offset().left - inner.offset().left) || 0
    };

    outer.remove();
    return scrollSize;
}
$(document).ready(function(){
    $('.main_h').removeClass('esconder', 1000);               
    $('.home-slide').removeClass('esconder', 1000);
    $('section').removeClass('esconder', 1000);

    if ($('.main_h').hasClass('open-nav')) {
        if ($(window).scrollTop() > window.screen.availHeight - 160) {
            $('.main_h').addClass('sticky');
            $('nav.secondary').attr('style', 'display: table !important');
            $('nav.initial').css('display','none; ; height: 0');
            
        } else {
            $('.main_h').removeClass('sticky');
            $('nav.secondary').attr('style', 'display: none !important; height: 0');
            $('nav.initial').css('display','table');
            
        }
        // alert(1);
    }
    else{
        $('nav.initial').css('display','none;');   
        $('nav.secondary').css('display','none');
        // alert(2);
    }
   var scrollWidth = getBrowserScrollSize().width;
  
    var w = window.screen.availWidth - scrollWidth;
    var h = window.screen.availHeight; 	
    // var h = $(window).height();
    var hPrincipal = h - 74;
    var hSecondary = h - 111;
    hPrincipal = h ;
    hSecondary = h - 90;
    console.debug('---');
    console.debug(w);
    console.debug(hPrincipal);
    console.debug('---');
     // if (w > 719)
    {  
    var home = $('.home-slide').DrSlider(
                    {
                        width: w, //slide width
                        height: hPrincipal ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
                    }
                ); //Yes! that's it!
            }  
          
    var clientes = $('.clientes-slide').DrSlider(
					{
                        width: w, //slide width
                        height:  hSecondary,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
				); //Yes! that's it!

	var Diferenciais = $('.Diferenciais-slide').DrSlider(
					{
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
				); //Yes! that's it!
    if (w > 719){        
        var QuemSomos = $('.QuemSomos-slide').DrSlider(
                        {
                            width: w, //slide width
                            height: hSecondary ,  //slide height
                            navigationType: 'circle',
                            duration: 10000,
                            showProgress:true,
                            showNavigation: true,
                            showControl: true,
                            positionNavigation:'in-center-bottom'
                        }
                    ); //Yes! that's it!
    }    
	var Contato = $('.Contato-slide').DrSlider(
					{
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
                ); //Yes! that's it!
    var solucoes = $('.solucoes-slide').DrSlider(
                    {
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
                    }
    ); //Yes! that's it! 
            
   
});
//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function(event) {
    // Animate loader off screen   
    // alert(1);
    $(".se-pre-con").fadeOut("slow");  
    $('html, body').animate({
        scrollTop: 0
    }, 1);      
    event.preventDefault();
});
 

</script>

	</body>
</html>