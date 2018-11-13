<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h1 class="page-header">Funcionário</h1>
</div>


<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <form class="form-horizontal" action="<?= base_url('index.php/Funcionario/save/') ?>" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Cadastrar</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Nome</label>  
                <div class="col-md-4">
                    <input id="Descricao" name="Descricao" type="text" placeholder="Informe o Nome" class="form-control  input-sm " required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="CRFA">CRFA</label>  
                <div class="col-md-2">
                    <input id="CRFA" name="CRFA" type="text" placeholder="Informe o CRFA" class="form-control  input-sm ">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Login">Login</label>  
                <div class="col-md-2">
                    <input required="" id="Login" name="Login" type="text" placeholder="Informe o Login" class="form-control  input-sm ">

                </div>
            </div>


            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Administrativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Administrativo-0">
                            <input type="checkbox" name="Administrativo" id="Administrativo" value="S">
                            Privilégio Administrativo
                        </label>
                    </div>
                </div>
            </div>

            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Ativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Ativo">
                            <input type="checkbox" name="Ativo" id="Ativo" value="S">
                            Ativo
                        </label>
                    </div>
                </div>
            </div>




            <div class="form-group ">
                <label class="col-md-4 control-label" for="buttonEnviar"></label>
                <div class="col-md-8 text-right">
                    <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
                    <!--<button  class="btn btn-sm btn-info " disabled=""  >Resetar senha</button>-->
                    <!--<button  type="button"  class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal">Alterar senha</button>-->                        
                    <button type="reset" id="buttonCancel" name="buttonCancel" class="btn btn-sm btn-info">Reverter</button>
                    <a class="btn btn-sm btn-danger"  href="<?= base_url('index.php/Funcionario/') ?>">Voltar</a>
                </div>
            </div>

        </fieldset>
    </form>

</div>
