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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Sugestão/Reclamação</small>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row"> 
            <!--<div class="col-lg-1"></div>-->
            <div class="col-lg-12">
                <form class="form-horizontal" action="<?= base_url() ?>contato/salvar"  method="post">
                <fieldset>

                <!-- Text input-->
                <div class="form-group">
                  <div class="col-md-4">
                  <input id="nome" name="nome" type="text" placeholder="Informe seu nome" value="<?=$nome;?>" class="form-control input-md" required="">

                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                  <input id="email" name="email" type="email" placeholder="Informe seu e-mail" value="<?=$email;?>" class="form-control input-md" required="">
                  </div>
                </div>

                <!-- Text input-->
                <div class="form-group"> 
                  <div class="col-md-4">
                  <input id="apto" name="apto" type="text" placeholder="Informe seu apartamento" value="<?=$apto;?>" class="form-control input-md" required="">

                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group"> 
                  <div class="col-md-4">                     
                      <textarea class="form-control" placeholder="Escreva sua mensagem " required="" id="mensagem" rows="10" name="mensagem"><?=$mensagem;?></textarea>
                  </div>
                </div>
   <!-- Textarea -->
                <div class="row"> 
                  <div class="col-md-3">                     
                    <?php echo $recaptcha_html; ?> 
                  </div>
            

             
                  <div class="col-md-4">
                    
                    <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
                  </div>
                </div>

                </fieldset>
                </form>

            </div>

        </div>   
         
         
            <?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.'. (ENVIRONMENT === 'development' ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '').'</p>' ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

     

    </div>
