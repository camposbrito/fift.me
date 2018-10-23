<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio.</small>
                </h1>
                 
                        <div class="form-group breadcrumb">
                            <form action="" method="post">
                                 
                                <label class="col-md-1 control-label" for="ref" style="text-align: right">REF.:</label>  
                                <div class="col-md-2">
                                    <input id="ref" name="ref" type="text"  required="required" readonly="" placeholder="Informe a referência" class="date form-control input-md datepicker"  value="<?=$ref;?>">                                                      
                                 </div>
                                <button id="btn" name="btn" type="submit" class="btn btn-primary">Trocar</button>
                            </form>
                        <div class="clearfix"></div>
                    </div>
            
            </div>
        </div>
        <!-- /.row -->

        <!--        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div-->
        <!-- /.row -->
        <?php
        $TempoTotal['A'] = 0;
        $PrecoTotal['A'] = 0;
        $TempoTotal['B'] = 0;
        $PrecoTotal['B'] = 0;
        if ($this->session->userdata('lavanderia') == 'A') {
            foreach ($LogMaquinas['A'] as $value) {
                $PrecoTotal['A'] += $value->precoTotal;
                $TempoTotal['A'] += $value->tempoTotal;
            }
        }
        if ($this->session->userdata('lavanderia') == 'B') {
            foreach ($LogMaquinas['B'] as $value) {
                $PrecoTotal['B'] += $value->precoTotal;
                $TempoTotal['B'] += $value->tempoTotal;
            }
        }
        ?>
        <div class="panel panel-default" id="accordion">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Lavanderia <?= $this->session->userdata('lavanderia'); ?> - Resumo </h3>
                <a data-toggle="collapse" href="#collapse1">Visualizar</a>
            </div>
            <div  id="collapse1" class="panel-body panel-collapse collapse">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $AptosAtivos[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Apartamentos Ativos</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>apartamentos/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $MaquinasAtivas[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Máquinas ativas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= formataMoeda($PrecoTotal[$this->session->userdata('lavanderia')]); ?></div>
                                    <div>Total para o Mês</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>utilizacao">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= formataNumero($TempoTotal[$this->session->userdata('lavanderia')] / 60); ?></div>
                                    <div>Tempo de Operação (hr.)</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>utilizacao">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>

                <!--/**/-->
                 <div class="col-lg-4 col-md-6">
                    <div class="panel panel-warning ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flash fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $SecadoraFuncionando[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Secadoras em funcionamento</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-4 col-md-6">
                    <div class="panel panel-warning ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-umbrella  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $SecadoraParada[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Secadoras desligadas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-4 col-md-6">
                    <div class="panel panel-warning ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-umbrella  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $SecadoraManutencao[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Secadoras em manutenção</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>                

                 <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wrench fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $LavadoraFuncionando[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Lavadoras em funcionamento</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $LavadoraParada[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Lavadoras desligadas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $LavadoraManutencao[$this->session->userdata('lavanderia')][0]->Qtde; ?></div>
                                    <div>Lavadoras em manutenção</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="<?= base_url() ?>maquinas/">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Lavanderia <?= $this->session->userdata('lavanderia'); ?> - Utilização por Máquina - Ref.: <?=$ref;?></h3>
                    <a data-toggle="collapse" href="#collapse2">Visualizar</a>
            </div>
            <div  id="collapse2" class="panel-body panel-collapse collapse">
                        <div id="morris-area-chart-<?= $this->session->userdata('lavanderia'); ?>"></div>
                    </div>
                </div>
            </div>
        </div>


        <!--<div class="row">-->


        <!--</div>-->

        <!-- /.row -->

        <div class="row">


        </div>

        <div class="row">    
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Lavanderia <?= $this->session->userdata('lavanderia'); ?> - Máquinas em uso por Apto</h3>
                    <a data-toggle="collapse" href="#collapse3">Visualizar</a>
            </div>
            <div  id="collapse3" class="panel-body panel-collapse collapse">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Máquina</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Apto</th>
                                        <th>Tempo Restante</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($Maquinas[$this->session->userdata('lavanderia')] as $maq) {
                                        echo "<tr>";
                                        echo "<td>" . $maq->maquina . "</td>";
                                        echo "<td>" . $maq->tipo . "</td>";
                                        echo "<td>" . $maq->estado . "</td>";
                                        echo "<td>" . $maq->apto . "</td>";
                                        echo "<td>" . $maq->tempoRestante . "</td>";
                                        echo "<td>" . $maq->condicao . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">                            
                            <a href="<?= base_url() ?>maquinas/">Gerenciar Máquinas <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Lavanderia <?= $this->session->userdata('lavanderia'); ?> - Ranking de Utilização por Moradores  - Ref.: <?=$ref;?></h3>
                    <a data-toggle="collapse" href="#collapse4">Visualizar</a>
            </div>
            <div  id="collapse4" class="panel-body panel-collapse collapse">
                        <div id="morris-donut-chart-<?= $this->session->userdata('lavanderia'); ?>"></div>
                        <div class="text-right">
                            <a href="<?= base_url() ?>Utilizacao">Utilização <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <?php
            if ($this->session->userdata('login') == 'camposbrito')
            {
        ?>
        <div class="row">
                   <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Utilização  - Ref.: <?=$ref;?></h3>
                                <a data-toggle="collapse" href="#collapse6">Visualizar</a>
            </div>
            <div  id="collapse6" class="panel-body panel-collapse collapse">
                                    <div class="panel-body">
                                        <div id="line-example"></div>
                                    </div>
                                </div>
                            </div>
                   </div>
            
            </div>
         <?php
            }
        ?>
        <?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.'. (ENVIRONMENT === 'development' ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '').'</p>' ?>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->   
</div>

