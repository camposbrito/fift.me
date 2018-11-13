<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h1 class="page-header"><?= $titulo ?></h1>
</div>

<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <form class="form-horizontal" action="<?= $action ?>" method="post">
        <fieldset>

            <!-- Form Name -->   
            <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $funcionario[0]->Cod; ?>">

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Descrição</label>  
                <div class="col-md-4">
                    <input id="Descricao" name="Descricao" type="text" placeholder="Informe o Nome" class="form-control  input-sm " value="<?= $funcionario[0]->Descricao; ?>" required="">

                </div>
            </div>

            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Ativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Ativo">
                            <input type="checkbox" name="Ativo" id="Ativo" value="S" <?= $funcionario[0]->Ativo == 'S' ? 'Checked' : ''; ?>>
                            Ativo
                        </label>
                    </div>
                </div>
            </div>




            <!-- Button (Double) -->
            <div class="form-group ">
                <label class="col-md-4 control-label" for="buttonEnviar"></label>
                <div class="col-md-8 text-right">
                    <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
                    <button  class="btn btn-sm btn-info " disabled=""  >Resetar senha</button>
                    <button  type="button"  class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal">Alterar senha</button>                        
                    <button type="reset" id="buttonCancel" name="buttonCancel" class="btn btn-sm btn-info">Reverter</button>
                    <a class="btn btn-sm btn-danger"  href="<?= base_url('index.php/funcionario/') ?>">Voltar</a>
                </div>
            </div>

        </fieldset>
    </form>

</div>

