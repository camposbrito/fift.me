<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Instrumentos e Sons Ambientais</h4>
</div>
<form action="<?= base_url('index.php/InstrumentoSonsAmbientais/salvar/') ?>" method="post">
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" value="<?= $consulta[0]->Cod ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <table class="table-condensed table-bordered col-md-12">
            <tr>
                <th class="col-md-3">INSTRUMENTOS</th>
                <th class="col-md-1 text-center col">Reagiu?</th>
                <th class="col-md-1 text-center">FORTE INT.</th>
                <th class="col-md-1 text-center">MÉDIA INT.</th>
                <th class="col-md-1 text-center">FRACA INT.</th>
                <th class="text-left col-md-6">TIPO REAÇÃO</th>
            </tr>
            <?php
            foreach ($instrumentossonsambientais as $key => $inst) {
                ?>
                <input type="hidden" value="<?= $inst->Cod ?>" name="codInstrumentossonsambientais[<?= $key ?>]" >
                <input type="hidden" value="<?= $inst->Instrumento ?>" name="Instrumento[<?= $key ?>]" >


                <tr>
                    <th><?= $inst->Descricao ?> </th>

                    <td class="text-center">
                        <div class="text-center" >
                            <label for="Reagiu[<?= $key ?>]">&nbsp;<input type="checkbox" name="Reagiu[<?= $key ?>]" id="Reagiu[<?= $key ?>]" <?= $inst->Reagiu == 'S' ? ' checked ' : ''; ?>value="S" >&nbsp;SIM</label>                                        
                        </div>
                    </td> 
                    <td class="text-center">
                        <div >
                            <label for="Forte[<?= $key ?>]" ><input type="checkbox" name="Forte[<?= $key ?>]" id="Forte[<?= $key ?>]"  <?= $inst->Forte == 'S' ? ' checked ' : ''; ?>value="S" >&nbsp;SIM</label>                                                                              
                        </div>
                    </td> 
                    <td class="text-center">
                        <div >
                            <label for="Media[<?= $key ?>]"><input type="checkbox" id="Media[<?= $key ?>]" name="Media[<?= $key ?>]"  <?= $inst->Media == 'S' ? ' checked ' : ''; ?>value="S" >&nbsp;SIM</label>                                                                               
                        </div>
                    </td> 
                    <td class="text-center">
                        <div >
                            <label for="Fraca[<?= $key ?>]"><input type="checkbox" name="Fraca[<?= $key ?>]" id="Fraca[<?= $key ?>]"  <?= $inst->Fraca == 'S' ? ' checked ' : ''; ?>value="S" >&nbsp;SIM</label>                                                                               
                        </div>
                    </td> 

                    <td >

                        <select id="equipamento"  name="TipoReacao[<?= $key ?>]"  class="form-control" >
                            <option ></option>
                            <?php
                            foreach ($tiposReacao as $equi) {
                                ?>
                                <option <?= $equi->Cod == $inst->TipoReacao ? "selected" : ""; ?> value="<?= $equi->Cod; ?>"><?= $equi->Descricao; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </td> 
                </tr>
            <?php } ?>
        </table>    

    </div>

</form>

