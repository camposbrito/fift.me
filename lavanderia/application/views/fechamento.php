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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Fechamento</small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">

            <!--<div class="col-lg-1"> </div>-->
            <div class="col-lg-12">
<!--                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                    </div>-->
                    <!--<div class="panel-body">-->
                    <form action="<?= base_url() ?>fechamentos/salvar" method="post">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>
                        
                        <input type="hidden" name="operacao" value="alterar" />
                        <a href="<?= base_url() ?>fechamentos/inserir/" class="btn btn-warning">Cadastrar</a>
                        <!--<a href="<?= base_url() ?>apartamentos/" class="btn btn-info">Apartamentos</a>-->
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-lg-4">Nome</th>
                                        <th class="col-lg-2">Data Inicial</th>
                                        <th class="col-lg-2">Data Final</th>                                        
                                        <!-- <th class="col-lg-1 ">Lavanderia A</th>                                        
                                        <th class="col-lg-1 ">Lavanderia B</th>                                         -->
                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach ($fechamentos as $key => $value) {
                                            echo '<tr>';
                                            echo '<td><input type="text" class="form-control" name="descricao['.$value->id.']" required="required" value="'.$value->descricao.'"/></td>';
                                            echo '<td><input id="DataI" type="text" readonly="" class="date form-control datepicker" name="dataini['.$value->id.']" required="required" value="'.dataBR($value->dataini).'"/></td>';
                                            echo '<td><input id="DataF"type="text" readonly="" class="date form-control datepicker" name="datafin['.$value->id.']" required="required" value="'.dataBR($value->datafin).'"/></td>';                                                                                      
                                            // echo '<td><span   class="form-control" >  '.formataMoeda($lavanderiaA[$key][0]->preco).' </span></td>';
                                            // echo '<td><span   class="form-control" >  '.formataMoeda($lavanderiaB[$key][0]->preco).' </span></td>';
                                            
                                           
//                                           echo '<td text-align="center"><a href="'.base_url() .'fechamentos/'.$value->id.'" class="btn col-lg-12  btn-danger">Excluir</button></td>';
                                            echo '</tr>';    
                                          
                                        }
//                                        _debug($lavanderiaA);
                                    
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
            <!--<div class="col-lg-1"> </div>-->
                
        </div>
            <?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.'. (ENVIRONMENT === 'development' ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '').'</p>' ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

     

    </div>
    