<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <p><?= @TratarMsg($this->session->flashdata('msg')); ?></p>  
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Apartamentos</small>
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
                    <form action="<?= base_url() ?>apartamentos/salvar" method="post">
                        <button type="button" class="btn btn-primary" onclick="javascript:print()">Imprimir</button>
                        <!--<button type="reset" class="btn btn-primary">Calcelar Alterações</button>--> 
                        
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1">IP</th>                                        
                                        <th class="col-lg-1">Data</th>                                        
                                        <th class="col-lg-1">Apartamento</th>
                                        <th class="col-lg-2">Nome</th>                                        
                                        <th class="col-lg-7">Mensagem</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach ($livro as $key => $value) {
                                            echo '<tr>';
                                            echo '<td>'.$value->ip.'</td>';                                            
                                            echo '<td>'. dataHoraBR($value->data).'</td>';                                                                                        
                                            echo '<td>'.$value->apto.'</td>';                                            
                                            echo '<td>'.$value->nome.'</td>';                                            
                                            echo '<td>'.$value->mensagem.'</td>';                                            
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
    