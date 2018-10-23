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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Mêtodos</small>
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
                    <form action="<?= base_url() ?>metodos/salvar" method="post">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>                        
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Mêtodos</th>
                                        <th>Identificação</th>
                                        <!--<th>Apto</th>-->
                                        <!--<th>Tempo Restante</th>-->
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                     foreach ($Metodos as $met) {
                                         echo "<tr>";
                                         echo "<td>".$met->classe."</td>";
                                         echo "<td>".$met->metodo."</td>";
                                         echo "<td>".$met->identificacao."</td>";
//                                         echo "<td>".$maq->Apto."</td>";
//                                         echo "<td>".$maq->TempoRestante."</td>";
                                                     echo '<td>  <div class="checkbox col-lg-12">
                                                            <label class="col-lg-12" text-align="center">
                                                                <input type="checkbox" name="privado['.$met->id.']" value="1" '.habilitado($met->privado).'>Privado 
                                                            </label>
                                                        </div>
                                                  </td>';
//                                         echo "<td>".$maq->Condicao."</td>";
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
    