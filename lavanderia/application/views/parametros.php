
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
                        <i class="fa fa-dashboard"></i> Lavanderia <?=$this->session->userdata('lavanderia');?> > <small>Parâmetros</small>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
      
        <div class="row">
            <div class="col-md-5">
                <form class="form-horizontal" method="post"  name="ChangeLavanderia" action="<?= base_url() ?>login/trocar">
                    <input type="hidden" name="controller" id="controller" value="<?=$this->router->fetch_class().'/'.$this->router->fetch_method() ?>"/>
                     
                    <div class="radio">
                    <label for="bloco-0">
                        <input type="radio" name="lavanderia" id="bloco-0" value="<?=$this->session->userdata('BlocoA')?>" <?= $lavanderia == $this->session->userdata('BlocoA') ? 'checked="checked"' : '' ?>>
                        Lavanderia <?=$this->session->userdata('BlocoA')?>
                    </label>
                </div>
                <div class="radio">
                    <label for="bloco-1">
                        <input type="radio" name="lavanderia" id="bloco-1" value="<?=$this->session->userdata('BlocoB')?>" <?= $lavanderia == $this->session->userdata('BlocoB') ? 'checked="checked"' : '' ?>>
                        Lavanderia <?=$this->session->userdata('BlocoB')?>
                    </label>
                </div>

               </form><p>
            </div> 
        </div>
        <div class="row">
            
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Preço/minuto</h3>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="<?= base_url() ?>parametros/salvar">
                            <fieldset>

                                <!-- Form Name -->


                                <!-- Prepended text-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="preco_sec">Secadora</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            <input id="preco_sec" name="preco_sec"  step="0.01" class="form-control" placeholder="Informe valor" type="number" required="required" value="<?=$preco_sec;?>">
                                        </div>
 
                                    </div>
                                </div>

                                <!-- Prepended text-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="preco_lav">Lavadora</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            <input id="preco_lav" name="preco_lav" step="0.01" class="form-control" placeholder="Informe valor" type="number" required="required"  value="<?=$preco_lav;?>">  
                                        </div>

                                    </div> 
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="atualizar"></label>
                                    <div class="col-md-4">
                                        <button  class="btn btn-primary">Atualizar</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Horário de Utilização</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?= base_url() ?>parametros/salvar">

                            <fieldset>


                                <!-- Prepended text-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="Secadora">Início</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">hh:mm</span>
                                            <input id="hora_inicio" name="hora_inicio" class="form-control" placeholder="Informe a hora" type="text" required="required"  accept="" value="<?=$hora_inicio;?>">
                                        </div>    
                                    </div>
                                </div>

                                <!-- Prepended text-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="prependedtext">Fim</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">hh:mm</span>
                                            <input id="hora_fim" name="hora_fim" class="form-control" placeholder="Informe a hora" type="text" required="required"  accept="" value="<?=$hora_fim;?>">
                                        </div>

                                    </div>
                                </div>

                                <!-- Button --> 
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="atualizar"></label>
                                    <div class="col-md-4">
                                        <button  class="btn btn-primary">Atualizar</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Máquinas simultâneas em uso por Apto</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?= base_url() ?>parametros/salvar">
                            <fieldset>
                                <input type="hidden" name="refresh" id="refresh" value="1">
                                <!-- Form Name -->
                                 <!-- Prepended text-->
                                <!-- <div class="form-group">                                    
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Quantidade</span>
                                            <input id="maxMaq" name="maxMaq" class="form-control" placeholder="Informe valor" type="number" required="required" value="<?=$maxMaq;?>">  
                                        </div>
                                    </div> 
                                </div> -->
                                <div class="form-group">                                    
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Secadora</span>
                                            <input id="maxSec" name="maxSec" class="form-control" placeholder="Informe valor" type="number" required="required" value="<?=$maxSec;?>">  
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Lavadora</span>
                                            <input id="maxLav" name="maxLav" class="form-control" placeholder="Informe valor" type="number" required="required" value="<?=$maxLav;?>">  
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                                      <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                                      <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>                                      
                                <!-- Button -->
                                <div class="form-group">                                    
                                    <div class="col-md-4">
                                        <button  class="btn btn-primary">Atualizar</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Tempo de Operação</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?= base_url() ?>parametros/salvar">
                            <fieldset>

                                <!-- Form Name -->
                                 <!-- Prepended text-->
                                <div class="form-group">                                    
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Minutos</span>
                                            <input id="tempo_maximo" name="tempo_maximo" class="form-control" placeholder="Informe valor" type="number" required="required" value="<?=$tempo_maximo;?>">  
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                                      <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                                      <div class="form-group">                                    
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>                                      
                                <!-- Button -->
                                <div class="form-group">                                    
                                    <div class="col-md-4">
                                        <button  class="btn btn-primary">Atualizar</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
           
        </div>
        <!-- /.row -->
 <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
    <!-- /.container-fluid -->


</div>
 
