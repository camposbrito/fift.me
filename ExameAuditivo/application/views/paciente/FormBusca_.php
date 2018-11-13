<div  class="col-md-12 main">    
    <form style="padding: 0;height: 54px;" class="form  col-sm-12 col-md-12 " action="<?= base_url('index.php/Paciente/Pesquisar') ?>" method="post" id="pesquisa" name="pesquisa">
        <span class="fieldset">             
            <div class="form-group col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
                <input placeholder="Paciente" type="text" class="form-control input-sm   input-group" name="paciente" value="<?= $paciente; ?>">
            </div>
            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <input placeholder="Data Nascimento" type="text" class="form-control  input-sm   input-group" name="dataNascimento" id="dataNascimento"   value="<?= $dataNascimento; ?>">
            </div>

            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                
                <input placeholder="Data Consulta Inicial" type="text" class="form-control  input-sm   input-group" name="periodoInicial"  id="periodoInicial"   value="<?= $periodoInicial; ?>">
            </div>


            <div class="form-group col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-0 ">
                <input placeholder="Data Consulta Final" type="text" class="form-control  input-sm   input-group" name="periodoFinal"  id="periodoFinal"   value="<?= $periodoFinal; ?>">
            </div>


            <div class="form-group col-sm-3 col-sm-offset-0 col-md-3 col-md-offset-0 ">
                <select placeholder="Profissional"  id="profissional2" name="profissional" class="form-control  input-sm   input-group">
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
                <input placeholder="Empresa" type="text" class="form-control  input-sm   input-group" name="Empresa"  value="<?= $Empresa; ?>">
            </div>
            <div class="form-group col-sm-1 col-sm-offset-0 col-md-1 col-md-offset-0 ">
                <input  name="enviar" id="enviar"  type="submit" class="form-control   pull-left text-left btn btn-warning" value=">>"> 
            </div>

        </span>

    </form> 
</div>