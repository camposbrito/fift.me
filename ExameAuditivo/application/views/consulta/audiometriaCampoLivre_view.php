<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Audiometria Campo Livre</h4>
</div>
<form  action="<?= base_url('index.php/AudiometriaCampoLivre/salvar/') ?>" method="post">

    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-12 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>

    <input type="hidden" value="<?= $campolivre[0]->Cod ?>" name="codAudiometriaCampoLivre" >
    <input type="hidden" value="<?= $consulta[0]->Cod ?>" name="Consulta">
    <div class=" row col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <table class="table-condensed col-sm-12 col-md-10">
            <tr>
                <th class="col-md-2 text-right">FREQ.</th>
                <th class="text-center">0,25k</th>
                <th class="text-center">0,5k</th>
                <th class="text-center">1k</th>
                <th class="text-center">2k</th>
                <th class="text-center">4k</th>
                <th class="text-center">8k</th>
            </tr>
            <tr>
                <th class="text-right">INT. dB</th>
                <td><input  type="number" class="form-control" name="Freq025" value="<?= $campolivre[0]->Freq025; ?>"/></td>
                <td><input  type="number" class="form-control" name="Freq05" value="<?= $campolivre[0]->Freq05; ?>"/></td>
                <td><input  type="number" class="form-control" name="Freq1" value="<?= $campolivre[0]->Freq1; ?>"/></td>
                <td><input  type="number" class="form-control" name="Freq2" value="<?= $campolivre[0]->Freq2; ?>"/></td>
                <td><input  type="number" class="form-control" name="Freq4" value="<?= $campolivre[0]->Freq4; ?>"/></td>
                <td><input  type="number" class="form-control" name="Freq8" value="<?= $campolivre[0]->Freq8; ?>"/></td>
            </tr>
        </table>
    </div>
    <div class=" row col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <table class="table-condensed  col-md-10">
            <tr></tr>
            <tr>
                <td class="col-md-2 "> </td>
                <td class="col-md-2 text-right">LDF</td>
                <td><input  type="number" class="form-control" name="LDF"  value="<?= $campolivre[0]->LDF; ?>"/></td>
                <td>LRF</td>
                <td><input  type="number" class="form-control" name="LRF"  value="<?= $campolivre[0]->LRF; ?>"/></td>
                <td>IRF</td>
                <td><input  type="number" class="form-control" name="IRF_MONO"  value="<?= $campolivre[0]->IRF_MONO; ?>"/></td>
                <td>Monossílabos</td>
            </tr>
            <tr>
                <td> </td>
                <td colspan="5" class="text-right"></td>
                <td><input  type="number" class="form-control" name="IRF_DISSI"  value="<?= $campolivre[0]->IRF_DISSI; ?>"/></td>
                <td>Dissílabos</td>
            </tr>
        </table>

    </div>
    <div class=" row col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <table class="table-condensed  col-md-10">
            <th><label  class="text-right">Equipamento</label></th>
            <td colspan="8">

                <select id="equipamento" name="Equipamento" class="form-control" required="">
                    <option ></option>
                    <?php
                    foreach ($equipamentos as $equi) {
                        ?>
                        <option <?= $campolivre[0]->Equipamento == $equi->Cod ? ' selected ' : ''; ?> value="<?= $equi->Cod; ?>"><?= $equi->Descricao; ?></option>
                        <?php
                    }
                    ?>
                </select>

            </td>
        </table>

    </div>
</form>

