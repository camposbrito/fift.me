<div  class="col-md-12 main">    
    <form class="form col-sm-12 col-md-12 " action="<?= base_url('index.php/paciente/') ?>" method="post" id="pesquisa" name="pesquisa">
        <fieldset class="fieldset"> 
            <legend class="legend">Paciente > Pesquisar:</legend>


            <div class="form-group col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
                <label for="email">Paciente:</label>
                <input type="text" class="form-control input-sm   input-group col-sm-offset-0  col-md-offset-0" name="paciente" value="<?= $paciente; ?>">
            </div>
            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <label for="pwd">Data Nascimento:</label>
                <input  type="text" class="form-control  input-sm   input-group" name="dataNascimento" id="dataNascimento"   value="<?= $dataNascimento; ?>">
            </div>

            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <label for="pwd">Período:</label>
                <input  type="text" class="form-control  input-sm   input-group" name="periodoInicial"  id="periodoInicial"   value="<?= $periodoInicial; ?>">
            </div>


            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <label for="pwd">à</label>
                <input  type="text" class="form-control  input-sm   input-group" name="periodoFinal"  id="periodoFinal"   value="<?= $periodoFinal; ?>">
            </div>


            <div class="form-group col-sm-3 col-sm-offset-0 col-md-3 col-md-offset-0 ">
                <label for="pwd">Profissional</label>
                <select id="profissional2" name="profissional" class="form-control  input-sm   input-group">
                    <option ></option>
                    <?php
                    foreach ($terceiros as $tec) {
                        ?>
                        <option  <?= $profissional == $tec->Cod ? "selected" : ""; ?> value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <label for="Empresa">Empresa:</label>
                <input type="text" class="form-control  input-sm   input-group" name="Empresa"  value="<?= $Empresa; ?>">
            </div>
            <div class="form-group col-sm-1 col-sm-offset-0 col-md-1 col-md-offset-0 ">
                <label for="enviar">&nbsp;</label>
                <input  name="enviar"  type="submit" class="pull-left text-left btn btn-warning" value="Pesquisar"> 
            </div>

        </fieldset>

    </form> 
</div>