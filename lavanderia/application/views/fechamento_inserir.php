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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Tags > Fechamento</small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-1"> </div>
            <div class="col-lg-10">

                <form class="form-horizontal" method="post" action="<?= base_url();?>fechamentos/salvar/">
                    <fieldset>
                        
                        <input type="hidden" name="operacao" value="inserir" />
<!--                        <div class="form-group">
                            <label class="col-md-1 control-label" for="apto">Apto</label>   
                          <div class="col-md-4">
                          <input id="apto" name="apto_nome" type="text" placeholder="Informe o apartamento" class="form-control input-md" required="">
                          
                          </div>
                        </div>-->
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="descricao">Nome</label>      
                          <div class="col-md-4">                      
                          <input id="nome" name="descricao" type="text" placeholder="Informe o nome" class="form-control input-md" required="">

                          </div>
                        </div>
                        <!-- Text input-->
                        <?php // _debug($fechamentos)?>
                        <div class="form-group">
                             <label class="col-md-1 control-label" for="dataini">Data Inicial</label>    
                          <div class="col-md-4">
                              <input name="dataini" type="text" class="date form-control datepicker"  required="required" value="<?=dataBR($fechamentos[0]->proxdataini)?>"  />                          

                          </div>
                        </div>
                        <div class="form-group">
                             <label class="col-md-1 control-label" for="datafin">Data Final</label>    
                          <div class="col-md-4">
                            <input name="datafin" type="text"  class="date form-control datepicker"  required="required"    />                          

                          </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="enviar"> </label>
                            <div class="col-md-4">
                            <button id="enviar" name="enviar" class="btn btn-primary">Salvar</button>
                            <a href="<?= base_url();?>fechamentos/" class="btn btn-warning">Cancelar</a>
                            </div>
                        </div>

                    </fieldset>
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
    