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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Tags > Apartamento > <?=$apto[0]->nome;?></small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-1"> </div>
            <div class="col-lg-10">

                <form class="form-horizontal" method="post" action="<?= base_url();?>tags/salvar/">
                    <fieldset>
                        <input type="hidden" name="apto" value="<?=$apto[0]->id;?>" />
                        <input type="hidden" name="operacao" value="inserir" />
<!--                        <div class="form-group">
                            <label class="col-md-1 control-label" for="apto">Apto</label>   
                          <div class="col-md-4">
                          <input id="apto" name="apto_nome" type="text" placeholder="Informe o apartamento" class="form-control input-md" required="">
                          
                          </div>
                        </div>-->
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Nome</label>      
                          <div class="col-md-4">                      
                          <input id="nome" name="nome" type="text" placeholder="Informe o nome" class="form-control input-md" required="">

                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                             <label class="col-md-1 control-label" for="rfid">RFID</label>    
                          <div class="col-md-4">

                          <input id="rfid" name="rfid" type="text" placeholder="Informe o RFID" pattern="[a-zA-Z0-9]+" class="form-control input-md" required="">

                          </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="rfid"> </label>
                            <div class="col-md-4">
                                <button id="enviar" type="submit" name="enviar" class="btn btn-primary">Salvar</button>
                                <a href="<?= base_url();?>tags/<?=$apto[0]->id;?>" class="btn btn-warning">Cancelar</a>
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
    