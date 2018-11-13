<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h2 class="page-header"><?= $titulo ?></h2>
</div>

<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <form class="form-horizontal" action="<?= $action ?>" method="post">
        <fieldset>

            <!-- Form Name -->   
            <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $obj[0]->Cod; ?>">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Cod.</label>  
                <div class="col-md-1">
                    <input  type="text"  class="form-control input-sm  col-md-1" value="<?= $obj[0]->Cod; ?>" disabled="">

                </div> 
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Descrição</label>  
                <div class="col-md-4">
                    <input id="Descricao" name="Descricao" type="text" placeholder="Informe o Nome" class="form-control input-sm  autofocus" value="<?= $obj[0]->Descricao; ?>" required="">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Obs</label>  
                <div class="col-md-5">
                    <textarea rows="5" id="Obs" name="Obs" type="text" placeholder="Informe uma observação" class="form-control input-sm  autofocus"  required=""><? echo $obj[0]->Obs; ?></textarea>
                </div>
            </div>
            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Ativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Ativo">
                            <input type="checkbox" name="Ativo" id="Ativo" value="S" <?= $obj[0]->Ativo == 'S' ? 'Checked' : ''; ?>>
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
                    <button type="reset" id="buttonCancel" name="buttonCancel" class="btn btn-sm btn-info">Reverter</button>
                    <a  href="<?= $actBack ?>"   class="btn btn-sm btn-danger">Voltar</a>

                </div>
            </div>

        </fieldset>
    </form>

</div>
