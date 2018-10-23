<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row no-print">
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Utilização</small>
                    </li>
                </ol>
            </div>
        </div>

         
        <div class="row no-print">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>relatorio/">
                    <fieldset>
                    
                    <!-- Form Name -->
                    <legend>Buscar</legend>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-1 control-label" for="apto">TAG</label>  
                      <div class="col-md-5">
                          <input id="tag" name="tag" type="text" title="Preencha o campo TAG"  placeholder="Digite número do TAG" class="form-control input-md" required="" value="<?=$tag;?>">                  
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="ref">Data</label>  
                        <div class="col-md-5">
                            <input id="ref" name="ref" type="text"  required="required" readonly="" placeholder="Informe a data para busca" class="date form-control input-md datepicker" value="<?=$ref;?>">                                                      
                        </div>
                    </div>
                     <div class="row">
             
                    <!-- Button -->
                    <div class="form-group col-md-6">
                      <label class="col-md-4 control-label" for="btn"></label>
                      <div class="col-md-12">
                        <button id="btn" name="btn" class="btn btn-primary">Buscar</button>
                        <button id="btn" name="btn" class="btn btn-primary" onclick="javascript:print()">Imprimir</button>
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
                    <form>
                        <div class="table-responsive">
                        <?php
                            $apto = -1;
                            $PrecoTotal = 0;
                            //Primeiro Cabeçalho
                            if (count($Log) > 0){
                                echo '
                                <b>Atenção:</b><br/>
                                Tempo máximo por operação: '.$tempo_maximo.' minutos<br/>
                                Preço da <b>lavadora</b>: R$ '.$preco_lav.'/minuto<br/>
                                Preço da <b>secadora</b>: R$ '.$preco_sec.'/minuto<br/>
                                <small><i>Os preços apresentados acima valem para o mês '.date('m/Y') .'.<br/> 
                                Para meses anteriores, os preços aqui registrados correspondem aos valores praticados naquele período</i></small><br/>';
                                echo '
                                    <table class="table table-bordered table-hover table-striped">';

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
                            else if (isset($tag))
                            {
                                echo 'Nenhuma utilização encontrada!<br>';
                            }
                            $imprimeRodape = false;
                            $i =0;                            
                            foreach ($Log as $key => $value) {
                                $imprimeRodape = (($value->apto - $apto) > 0 ) && $i > 0;                                        
                                if (($imprimeRodape == true) ){
                                    echo "<tr>";
                                    echo '<td colspan=4><b>Total: '.$apto.'</b></td>'; 
                                    echo '<td>'.  formataMoeda($PrecoTotal).'</td>';  
                                    echo "</tr>";
                                    
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
                                    
                                    $imprimeRodape = false;
                                    $PrecoTotal = 0;
                                    
                                }  
                                     
                                    echo '<tr>';
                                    echo '<td>'.dataHoraBR_($value->data_inicio).'</td>';
                                    echo '<td>'.$value->apto.'</td>';
                                    echo '<td>'.$value->maquina.'</td>';
                                    echo '<td>'.$value->tempo.'</td>';
                                    echo '<td>'.formataMoeda($value->preco).'</td>';                                                                                        
                                    echo '</tr>';      
                                
                                $PrecoTotal += $value->preco;                                
//                                _debugConsole("Apto Ante.: " . $apto ."\\nApto Atual: ".$value->apto ."\\nDiferença.: ".($value->apto - $apto)."\\n");                                                         
                                $apto = $value->apto; 
                                $i++;
                            }  
                            //Último Cabeçalho
                            if (count($Log)>0){
                                echo "<tr>";
                                echo '<td colspan=4><b>Total: '.$value->apto.'</b></td>';  
                                echo '<td>'.  formataMoeda($PrecoTotal).'</td>';  
                                echo "</tr>";
                                echo '
                                </tbody>
                                </table>';
                                
                            }
                            $imprimeRodape = false;
                            $PrecoTotal = 0;
                        ?>                                                            
                        </div>
                        
                    </form>    
                        <!--<div class="text-right">-->
                            <!--<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>-->
                        <!--</div>-->
                    <!--</div>-->
                </div>
            <div class="col-lg-1"> </div>
                
        </div>
            <?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.'. (ENVIRONMENT === 'development' ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '').'</p>' ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

     

    </div>
