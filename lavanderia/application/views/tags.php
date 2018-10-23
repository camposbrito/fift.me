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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Tags</small>
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
                    <form action="<?= base_url() ?>tags/salvar" method="post">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>
                        <input type="hidden" name="apto" value="<?=$apto;?>" />
                        <input type="hidden" name="operacao" value="alterar" />
                        <a href="<?= base_url() ?>tags/inserir/<?=$apto;?>" class="btn btn-warning">Cadastrar</a>
                        <a href="<?= base_url() ?>apartamentos/" class="btn btn-info">Apartamentos</a>
                        <div class="clearfix"><p></div>
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1">Apto				</th>
                                        <th class="col-lg-8">Nome</th>
                                        <th class="col-lg-1">RFID</th>                                        
                                        <th class="col-lg-1 "></th>                                        
                                        <th class="col-lg-1 "></th>                                        
                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach ($tags as $key => $value) {
                                            echo '<tr>';
                                            echo '<td>'.$value->apto.'</td>';
                                            echo '<td><input type="text" class="form-control" 
                                                        onkeyup="
                                                                    var start = this.selectionStart;
                                                                    var end = this.selectionEnd;
                                                                    this.value = this.value.toUpperCase();
                                                                    this.setSelectionRange(start, end);
                                                                " 
                                                        name="nome['.$value->id.']" required="required" value="'.$value->nome.'"/></td>';
                                            echo '<td><input type="text" pattern="[a-zA-Z0-9]+" title="Serial do RFID" class="form-control" 
                                            onkeyup="
                                                        var start = this.selectionStart;
                                                        var end = this.selectionEnd;
                                                        this.value = this.value.toUpperCase();
                                                        this.setSelectionRange(start, end);
                                                    "  
                                            name="tag['.$value->id.']" required="required" value="'.$value->tag.'"/></td>';
                                            echo '<td>  <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="admin['.$value->id.']" value="1"  '.habilitado($value->admin).'> Admin
                                                            </label>
                                                        </div>
                                                  </td>';
                                           
                                            echo '<td>  <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="excluir['.$value->id.']" value="1"> 
                                                                <span class="label label-danger">Excluir</span>
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
    