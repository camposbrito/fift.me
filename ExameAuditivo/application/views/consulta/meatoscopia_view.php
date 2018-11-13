<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
     <h4>Meatoscopia</h4>
</div>

<form   action="<?= base_url('index.php/Meatoscopia/salvarConsulta/') ?>" method="post">
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main ">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" name="consulta" value="<?= $id; ?>"
           <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <div class="col-sm-6">

            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo"><h4>Normal (Visualização da membrana timpanica)</h4></legend>   
                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">

                    <div class="col-md-4">
                        <label class="checkbox-inline" for="meatoscopia_normal_OD">
                            <input type="hidden" name="meatoscopia_normal_Cod" id="meatoscopia_normal_Cod" value = "<?= $meatoscopia_normal[0]->Cod ?>" > 
                            <input type="checkbox" name="meatoscopia_normal_OD" id="meatoscopia_normal_OD" <?= $meatoscopia_normal[0]->OD == 'S' ? 'checked' : ''; ?> value="S">Orelha Direita</label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-inline" for="meatoscopia_normal_OE">
                            <input type="checkbox" name="meatoscopia_normal_OE" id="meatoscopia_normal_OE" <?= $meatoscopia_normal[0]->OE == 'S' ? 'checked' : ''; ?> value="S">Orelha Esquerda</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-sm-6">

            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo"><h4>Alterada (Não visualização da membrana timpanica)</h4></legend>   
                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">

                    <div class="col-md-4">
                        <label class="checkbox-inline" for="meatoscopia_alterada_OD">
                            <input type="hidden" name="meatoscopia_alterada_Cod" id="meatoscopia_alterada_Cod" value = "<?= $meatoscopia_alterada[0]->Cod ?>" > 
                            <input type="checkbox" name="meatoscopia_alterada_OD" id="meatoscopia_alterada_OD" <?= $meatoscopia_alterada[0]->OD == 'S' ? 'checked' : ''; ?> value="S">Orelha Direita</label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-inline" for="meatoscopia_alterada_OE">
                            <input type="checkbox" name="meatoscopia_alterada_OE" id="meatoscopia_alterada_OE" <?= $meatoscopia_alterada[0]->OE == 'S' ? 'checked' : ''; ?> value="S">Orelha Esquerda</label>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</form>

</div>

</form>
