
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand   " href="<?= base_url() ?>"><?=$this->session->userdata['Empresa_Usuario'][0]->Descricao;?> - <?= $this->session->userdata['Nome'] ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">                    
      <?php
//                var_dump($this->session->userdata);
                if (($this->session->userdata['adm'] == true) || ($this->session->userdata['Login'] == 'master')) {
                    ?>  
                <li><a href="<?= base_url() ?>index.php/Funcionario/">Funcionários</a></li>
                <?}?>
                <li><a href="<?= base_url() ?>index.php/Paciente/">Pacientes</a></li>

                <?php
//                var_dump($this->session->userdata);
                if (($this->session->userdata['adm'] == true) || ($this->session->userdata['Login'] == 'master')) {
                    ?>  
                    <li><a href="<?= base_url() ?>index.php/Empresas/">Empresas</a></li>
                    <li><a href="http://chamados.exameauditivo.com.br">Reportar Problemas</a></li> 
                    <li class="dropdown" disabled>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tabelas
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="<?= base_url('index.php/Classificacao') ?>">Classificação</a></li> 
                            <li><a href="<?= base_url('index.php/Equipamentos') ?>">Equipamentos</a></li>
                            <li><a href="<?= base_url('index.php/Instrumentos') ?>">Instrumentos</a></li> 
                            <li><a href="<?= base_url('index.php/Meatos') ?>">Meatoscopia</a></li>
                            <li><a href="<?= base_url('index.php/MedidasComplacencia') ?>" >Medidas de Complacência</a></li>
                            <li><a href="<?= base_url('index.php/Modelos') ?>" >Modelos</a></li>
                            <li><a href="<?= base_url('index.php/Monitoramento') ?>" >Monitoramento</a></li> 
                            <li><a href="<?= base_url('index.php/Relatorios') ?>" >Relatórios</a></li> 
                            <li><a href="<?= base_url('index.php/TecnicasUtilizadas') ?>" >Técnicas Utilizadas</a></li> 
                            <li><a href="<?= base_url('index.php/Timpanograma') ?>" >Timpanograma</a></li> 
                            <li><a href="<?= base_url('index.php/TipoReacao') ?>" >Tipo Reação</a></li> 
                            <li><a href="<?= base_url('index.php/TipoExame') ?>" >Tipo de Exame</a></li>
                            <li><a href="<?= base_url('index.php/TipoTDT') ?>" >Tipo TDT</a></li>


                        </ul>
                    </li>
                    
                <?php } ?>
                <li><a href="#"  data-toggle="modal" data-target="#myModal">Alterar Senha</a></li>
                <!--<li><a href="#" disabled>Perfil</a></li>-->
                <li><a href="<?= base_url() ?>index.php/Dashboard/logout">Logoff</a></li>
            </ul>

        </div>
    </div>

</nav>

