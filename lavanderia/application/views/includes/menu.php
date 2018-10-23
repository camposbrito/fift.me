<body>
    <?php 
    $usuario = '';    
 
    if ($this->session->userdata('logged')) {
        $urlLogin = '#';
        $usuario = $this->session->userdata('nome');
        $login = $this->session->userdata('login');
        $urlDashboard = base_url() . "dashboard/";
    } else {
        $urlDashboard = base_url() . "welcome/";
        $usuario = 'Login';
        $urlLogin = base_url() . "login/";      
    }  
    ?>               
    <nav class="no-print navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <a class="navbar-brand" href="<?= $urlDashboard; ?>">Dashboard <?=(ENVIRONMENT!='production'?' - ' . ENVIRONMENT:'');?></a>
        </div>
        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="<?= base_url() ?>contato/" class="dropdown-toggle"  >Sugestão/Reclamação</a>                    
            </li>
            <li class="dropdown">
                <a href="<?= base_url() ?>relatorio/" class="dropdown-toggle" >Relatório de Utilização</a>                    
            </li>
            <li class="dropdown">
                <a href="<?= base_url() ?>regras/" class="dropdown-toggle" >Regras</a>                    
            </li>
            <? if ($this->session->userdata('logged')){?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="<?= base_url() ?>apartamentos/">Apartamentos</a>
                    </li>
                    <li class="message-preview">
                        <a href="<?= base_url() ?>maquina/">Máquinas</a>
                    </li>                                               

                    <li class="message-preview">
                        <a href="<?= base_url() ?>parametros/">Parâmetros</a>
                    </li> 
                    <li class="message-preview">
                        <a href="<?= base_url() ?>sugestao/">Livro de Sugestão</a>
                    </li> 
                    <li class="message-preview">
                        <a href="<?= base_url() ?>utilizacao/">Utilização</a>
                    </li> 

                    <!--<li class="divider"></li>-->
                    <li class="message-preview">
                        <a href="<?= base_url() ?>metodos/">Mêtodos</a>
                    </li> 
                    <li class="message-preview">
                        <a href="<?= base_url() ?>fechamentos/">Fechamentos</a>
                    </li> 
                    <li class="message-preview">
                        <a href="<?= base_url() ?>balanco/">Balanço</a>
                    </li> 
                    <?php 
                     
                    if(($login == 'camposbrito') || ($login == 'admin')){  
                    ?>
                    <li class="message-preview"> 
                        <a href="<?= base_url() ?>log/">Log de alterações</a>
                    </li> 
                    <?}?>
                    <!--                        <li class="message-preview">
                                                <a href="<?= base_url() ?>permissoes/">Permissões</a>
                                            </li>                         -->
                    <li class="message-preview">
                        <a href="<?= base_url() ?>usuarios/">Usuários</a>
                    </li> 

                </ul>
            </li>
            <?}?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $usuario ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?  if (!$this->session->userdata('logged')){ ?>
                    <li>
                        <a href="<?= $urlLogin; ?>"><i class="fa fa-fw fa-user"></i> Entrar</a>
                    </li>                     
                    <?} else { ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModalSenha"><i class="fa fa-fw fa-user"></i> Trocar Senha</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-adjust"></i> Trocar de Lavanderia</a>
                    </li>
                  
                    <li>
                        <a href="<?= base_url() ?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                    <?}?>
                </ul>
            </li>
        </ul>
        </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <!--div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                </li>
                <li>
                    <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                </li>
                <li>
                    <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                </li>
                <li>
                    <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                </li>
            </ul>
        </div-->
        <!-- /.navbar-collapse -->
    </nav>
 