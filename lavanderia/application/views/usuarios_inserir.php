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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Usuarios > Cadastrar</small>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-1"> </div>
            <div class="col-lg-10">

                <form class="form-horizontal" method="post" action="<?= base_url();?>usuarios/salvar/">
                    <fieldset>                        
                        <input type="hidden" name="operacao" value="inserir" />
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="nome">Nome</label>   
                          <div class="col-md-4">
                          <input id="nome" name="nome" type="text" placeholder="Informe o Nome" class="form-control input-md" required="">
                          
                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="email">E-mail</label>      
                          <div class="col-md-4">                      
                          <input id="email" name="email" type="email" placeholder="Informe o E-mail" class="form-control input-md" required="">

                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                             <label class="col-md-1 control-label" for="login">Login</label>    
                          <div class="col-md-4">

                          <input id="login" name="login" type="text" placeholder="Informe o Login" pattern="[a-zA-Z]+" class="form-control input-md" required="">

                          </div>
                        </div>
                        <div class="form-group">
                             <label class="col-md-1 control-label" for="senha">Senha</label>    
                          <div class="col-md-4">

                              <input id="senha" name="senha" type="password" placeholder="Informe o Senha"  class="form-control input-md" required="">

                          </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="rfid"> </label>
                            <div class="col-md-4">
                            <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
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
    