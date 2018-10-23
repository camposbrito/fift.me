<div id="page-wrapper">

    <div class="container-fluid">
        <p><?= @TratarMsg($this->session->flashdata('msg')); ?></p>  
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    MONDRIAN <small>Home Studio</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Usuários</small>
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
                    <form action="<?= base_url() ?>usuarios/salvar" method="post" >
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>          
                        <a href="<?= base_url() ?>usuarios/inserir" class="btn btn-warning">Cadastrar</a>
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            <input type="hidden" name="operacao" value="alterar" />
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>login</th>
                                        <!--<th>Apto</th>-->
                                        <!--<th>Tempo Restante</th>-->
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                     foreach ($Usuarios as $met) {
                                        echo "<tr>";
                                        echo "<td>".$met->nome."</td>";
                                        echo "<td>".$met->email."</td>";
                                        echo "<td>".$met->login."</td>";
//                                         echo "<td>".$maq->Apto."</td>";
//                                         echo "<td>".$maq->TempoRestante."</td>";
                                        
                                                     echo '<td>  <div class="checkbox col-lg-12">
                                                            <label class="col-lg-12" text-align="center">
                                                                <input type="hidden" value="1" name="usuario['.$met->id.']"> 
                                                                <input type="checkbox" value="1" name="habilitado['.$met->id.']" '.habilitado($met->ativo).'>Ativo 
                                                            </label>
                                                        </div>
                                                  </td>';
                                        echo '<td text-align="center"><a href="'.base_url() .'permissoes/'.$met->id.'" class="btn col-lg-12 btn-info">Permissões</button></td>';
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
    