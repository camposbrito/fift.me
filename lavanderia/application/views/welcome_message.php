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
                        <i class="fa fa-dashboard"></i> Lavanderia 
                    </li>
                </ol>
            </div>
        </div>
        
       
        <div class="row">
            <div class="col-lg-12">                        
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Bem vindo!</h3>
                        	
                        <br>
                        Essa é a página de apresentação da lavanderia do Bloco A e B do Condomínio Mondrian Home Studio. <br>
                        Esse é um espaço para os utilizadores dessa lavanderia colocarem seus comentários, opiniões e sugestões.<br>
                        Clicando no link <a href="<?= base_url(); ?><?= ($this->session->userdata('logged'))?'utilizacao':'relatorio'?>">“Relatório de Utilização”</a> é possível ver a utilização por apto e data.
                        <br>
                        <br>
                        Bom proveito!

                    </div>
             
                </div>
            </div>
            <?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.'. (ENVIRONMENT === 'development' ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '').'</p>' ?>
     
        </div>
       
            
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->   
</div>
 
    