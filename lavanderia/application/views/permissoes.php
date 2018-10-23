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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Permissões > <?=$Usuario[0]->nome;?></small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-1"> </div>
            <div class="col-lg-10">
<!--                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                    </div>-->
                    <!--<div class="panel-body">-->
                    <form action="<?= base_url() ?>permissoes/salvar" method="post">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button> 
                        <a href="<?= base_url() ?>usuarios" class="btn btn-warning">Voltar</a> 
                        
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            <input type="hidden" name="id_usuario" value="<?=$Usuario[0]->id;?>"/>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1">Identificação</th>
                                        <th class="col-lg-8"></th>
                                        <!--<th class="col-lg-1"></th>-->                                        
                                        <!--<th class="col-lg-1"></th>-->                                        
                                        <!--<th class="col-lg-1 "></th>-->                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach ($Permissoes as $key => $value) {
                                            echo '<tr>';
                                            echo '<td>'.$value->identificacao.'</td>';                                            
                                            echo '<td>  <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="permissao['.$value->id.']" value="1" '.habilitado($value->TemPermissao).'> Tem Permissão
                                                            </label>
                                                        </div>
                                                  </td>'; 
                                            echo '</tr>';                                                                                    
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
    