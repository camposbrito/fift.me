<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>ACL com Dispositivo Acústico</h4>
</div>
<form action="<?= base_url('index.php/Audiometria_aasi/salvar/') ?>" method="post">
        <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
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
                <th class="text-center">LAF</th>
                <th class="text-center">LRF</th>
                <th class="text-center">IPRF % Mono</th>
                <th class="text-center">IPRF % Dissi</th>
            </tr>  
            <tr>
                <th class="text-right">OD+ | -OE dB</th>
            <input  type="hidden" class="form-control" name="CodAASIOEOD" value="<?= $aasi_OEOD[0]->Cod; ?>"/> 
            <td><input  type="number" class="form-control" name="Freq025OEOD" value="<?= $aasi_OEOD[0]->Freq025; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq05OEOD" value="<?= $aasi_OEOD[0]->Freq05; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq1OEOD" value="<?= $aasi_OEOD[0]->Freq1; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq2OEOD" value="<?= $aasi_OEOD[0]->Freq2; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq4OEOD" value="<?= $aasi_OEOD[0]->Freq4; ?>"/></td>
            <td><input  type="number" class="form-control" name="LDFOEOD" value="<?= $aasi_OEOD[0]->LDF; ?>"/></td>
            <td><input  type="number" class="form-control" name="LRFOEOD" value="<?= $aasi_OEOD[0]->LRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRFOEOD" value="<?= $aasi_OEOD[0]->IPRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRF_DISSOEOD" value="<?= $aasi_OEOD[0]->IPRF_DISS; ?>"/></td>
            </tr>
            <tr>
                <th class="text-right">OD dB</th>
            <input  type="hidden" class="form-control" name="CodAASIOD" value="<?= $aasi_OD[0]->Cod; ?>"/> 
            <td><input  type="number" class="form-control" name="Freq025OD" value="<?= $aasi_OD[0]->Freq025; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq05OD" value="<?= $aasi_OD[0]->Freq05; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq1OD" value="<?= $aasi_OD[0]->Freq1; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq2OD" value="<?= $aasi_OD[0]->Freq2; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq4OD" value="<?= $aasi_OD[0]->Freq4; ?>"/></td>
            <td><input  type="number" class="form-control" name="LDFOD" value="<?= $aasi_OD[0]->LDF; ?>"/></td>
            <td><input  type="number" class="form-control" name="LRFOD" value="<?= $aasi_OD[0]->LRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRFOD" value="<?= $aasi_OD[0]->IPRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRF_DISSOD" value="<?= $aasi_OD[0]->IPRF_DISS; ?>"/></td>
            </tr>
            <tr>
                <th class="text-right">OE dB</th>
            <input  type="hidden" class="form-control" name="CodAASIOE" value="<?= $aasi_OE[0]->Cod; ?>"/> 
            <td><input  type="number" class="form-control" name="Freq025OE" value="<?= $aasi_OE[0]->Freq025; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq05OE" value="<?= $aasi_OE[0]->Freq05; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq1OE" value="<?= $aasi_OE[0]->Freq1; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq2OE" value="<?= $aasi_OE[0]->Freq2; ?>"/></td>
            <td><input  type="number" class="form-control" name="Freq4OE" value="<?= $aasi_OE[0]->Freq4; ?>"/></td>
            <td><input  type="number" class="form-control" name="LDFOE" value="<?= $aasi_OE[0]->LDF; ?>"/></td>
            <td><input  type="number" class="form-control" name="LRFOE" value="<?= $aasi_OE[0]->LRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRFOE" value="<?= $aasi_OE[0]->IPRF; ?>"/></td>
            <td><input  type="number" class="form-control" name="IPRF_DISSOE" value="<?= $aasi_OE[0]->IPRF_DISS; ?>"/></td>
            </tr>
        </table>

    </div>

</form>

