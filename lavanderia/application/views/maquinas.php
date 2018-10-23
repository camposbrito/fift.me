<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Maquinas</small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5">
                <form class="form-horizontal" method="post"  name="ChangeLavanderia" action="<?= base_url() ?>login/trocar">
                    <input type="hidden" name="controller" id="controller" value="<?=$this->router->fetch_class().'/'.$this->router->fetch_method() ?>"/>
                     
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
               </form><p>
            </div>  
            
            <div id="table-ajax-loading" style="display:none;"><img src="http://gifimage.net/wp-content/uploads/2017/08/loading-bar-gif-1.gif"></div>
             
            <div class="col-lg-12">
<!--                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                    </div>-->
                    <!--<div class="panel-body">-->
                    <form action="<?= base_url() ?>maquinas/salvar" method="post">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>                        
                        <div class="clearfix"><p></div>
                        <div class="table-responsive table-ajax">
                            
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Máquina</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Ult. Apto</th>
                                        <th>Tempo Restante</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                     foreach ($Maquinas as $maq) {
                                         echo "<tr>";
                                         echo "<td>".$maq->maquina."</td>";
                                         echo "<td>".$maq->tipo."</td>";
                                         echo "<td>".$maq->estado."</td>";
                                         echo "<input type='hidden' value='1' name='maquina[".$maq->maquina."]'>";
                                         echo "<td>".$maq->apto."</td>";
                                         echo "<td>".$maq->tempoRestante."</td>";
                                        echo '<td>  <div class="checkbox col-lg-12">
                                                        <label class="col-lg-12" text-align="center">
                                                            <input type="checkbox" value="1" name="habilitado['.$maq->maquina.']" '.habilitado($maq->habilitado).'>Habilitado 
                                                        </label>
                                                    </div>
                                                </td>';
                                        // echo "<td>".$maq->Condicao."</td>";
                                         echo "</tr>";
                                         
                                     }
                                     ?>
                                </tbody>
                            </table>
                            
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
    