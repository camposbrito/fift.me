<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row header">
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Lavanderia <?= $this->session->userdata('lavanderia') ?>  > <small>Utilização</small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row no-print">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>utilizacao/">
                    <fieldset>

                        <!-- Form Name -->
                        <legend class="no-print">Buscar</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="apto">Apto</label>  
                            <div class="col-md-5">
                                <input id="apto" name="apto" type="number" placeholder="Digite o apartamento" class="form-control input-md"  value="<?= $apto; ?>">                  
                            </div>
                            <div class="col-md-5">
                                <div class="radio">
                                    <label for="bloco-0">
                                        <input type="radio" name="lavanderia" id="bloco-0" value="<?=$this->session->userdata('BlocoA')?>" <?= $lavanderia == $this->session->userdata('BlocoA') ? 'checked="checked"' : '' ?>>
                                        Lavanderia <?=$this->session->userdata('BlocoA')?>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="bloco-1">
                                        <input type="radio" name="lavanderia" id="bloco-1" value="<?=$this->session->userdata('BlocoB')?>" <?= $lavanderia == $this->session->userdata('BlocoB') ? 'checked="checked"' : '' ?>>
                                        Lavanderia <?=$this->session->userdata('BlocoB')?>
                                    </label>
                                </div>

                            </div>   
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="ref">Data</label>  
                            <div class="col-md-5">
                                <input id="DataI" name="DataI" type="text"  required="required"  placeholder="Informe a data para busca" class="date form-control input-md datepicker" readonly="" value="<?= $DataI; ?>">                                                      
                            </div>
                            <div class="col-md-1">
                                <label class="col-md-1 control-label" for="a"></label>
                                <span name="a" id="a"> à </span> 
                            </div>
                            <div class="col-md-5">
                                <input id="DataF" name="DataF" type="text"  required="required"  placeholder="Informe a data para busca" class="date form-control input-md datepicker" readonly="" value="<?= $DataF; ?>">                                                      
                            </div>
                        </div>
                        <div class="row">
                            <!-- Multiple Checkboxes -->
                            <div class="form-group col-md-5">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label for="registro">
                                            <input type="checkbox" name="registro" id="registro" value="1" <?= ($registro == 1) ? 'checked=checked' : '' ?> >Visualizar registros
                                        </label>
                                        <label for="excel">
                                            <input type="checkbox" name="excel" id="excel" value="1" <?= ($excel == 1) ? 'checked=checked' : '' ?> >Exportar para Excel
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group col-md-12">
                                <div class="col-md-5">
                                    <button id="btn-buscar-utilizacao" name="btn" class="btn btn-primary">Buscar</button>
                                    <button type="button" class="btn btn-primary" onclick="javascript:print()">Imprimir</button>
                                </div>
                            </div>
                        </div>
                        <legend>&nbsp;</legend> 
                    </fieldset>

                </form>
            </div>

        </div>   

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div id="table-utilizacao-loading" style="display:none;"><img src="http://gifimage.net/wp-content/uploads/2017/08/loading-bar-gif-1.gif"></div>
                <div id="table-utilizacao">
                    <div class="table-responsive">
                        <?php
                        $apto = -1;
                        $PrecoTotal = 0;
                        //Primeiro Cabeçalho
                        if (count($Log) > 0) {

                            echo '
                                    <table class="table table-bordered table-hover table-striped">';
                            if ($registro == 1) {
                                echo '    <thead>
                                        <tr>
                                            <th class="col-lg-2">Hora</th>
                                            <th class="col-lg-2">Apto</th>
                                            <th class="col-lg-2">Máquina</th>                                        
                                            <th class="col-lg-2">Tempo (min)</th>                                        
                                            <th class="col-lg-2">Preço</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>';
                            }
                        } else {
                            echo 'Nenhuma utilização encontrada!<br>';
                        }
                        $imprimeRodape = false;
                        $i = 0;
                        foreach ($Log as $key => $value) {
                            $imprimeRodape = (($value->apto - $apto) > 0 ) && $i > 0;
                            if (($imprimeRodape == true)) {
                                echo "<tr>";
                                echo '<td colspan=4><b>Total: ' . $apto . $this->session->userdata('lavanderia') . '</b></td>';
                                echo '<td>' . formataMoeda($PrecoTotal) . '</td>';
                                echo "</tr>";
                                if ($registro == 1) {
                                    echo '</tbody>
                                          </table>';

                                    echo '
                                    <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-2">Hora</th>
                                            <th class="col-lg-2">Apto</th>
                                            <th class="col-lg-2">Máquina</th>                                        
                                            <th class="col-lg-2">Tempo (min)</th>                                        
                                            <th class="col-lg-2">Preço</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>';
                                }
                                $imprimeRodape = false;
                                $PrecoTotal = 0;
                            }
                            if ($registro == 1) {
                                echo '<tr>';
                                echo '<td>' . dataHoraBR_($value->data_inicio) . '</td>';
                                echo '<td>' . $value->apto . $this->session->userdata('lavanderia') . '</td>';
                                echo '<td>' . $value->maquina . '</td>';
                                echo '<td>' . $value->tempo . '</td>';
                                echo '<td>' . formataMoeda($value->preco) . '</td>';
                                echo '</tr>';
                            }
                            $PrecoTotal += $value->preco; 
//                                _debugConsole("Apto Ante.: " . $apto ."\\nApto Atual: ".$value->apto ."\\nDiferença.: ".($value->apto - $apto)."\\n");                                                         
                            $apto = $value->apto;
                            $i++;
                        }
                        //Último Cabeçalho
                        if (count($Log) > 0) {
                            echo "<tr>";
                            echo '<td colspan=4><b>Total: ' . $value->apto . $this->session->userdata('lavanderia') . '</b></td>';
                            echo '<td>' . formataMoeda($PrecoTotal) . '</td>';
                            echo "</tr>";
                            echo '
                                </tbody>
                                </table>';
                        }
                        $imprimeRodape = false;
                        $PrecoTotal = 0;
                        ?>                                                            
                    </div>
                </div>    
                <!--<div class="text-right">-->
                    <!--<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>-->
                <!--</div>-->
                <!--</div>-->
            </div>
            <div class="col-lg-1"> </div>

        </div>
        <?php echo '<p class="footer no-print">Page rendered in <strong>{elapsed_time}</strong> seconds.' . (ENVIRONMENT === 'development' ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '') . '</p>' ?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->



</div>
