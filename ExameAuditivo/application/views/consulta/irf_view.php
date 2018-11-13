<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">    
    <div class="page-header"><h4>Índice de Reconhecimento de Fala</h4></div>
</div>
<form   action="<?= base_url('index.php/Irf/salvar/') ?>" method="post">
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>


    <input type="hidden" value="<?= $id ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <div class="col-sm-12">

            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo"><h4>Índice de Reconhecimento de Fala</h4></legend>    
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>dB</th>
                            <th>%Mono.</th>
                            <th>%Dissi.</th>
                            <th>Masc.</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.D.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input name="codIprf" class="input-rodrigo"   type="hidden"  value="<?= $iprf[0]->codIprf ?>">     
                                    <input id="appendedcheckbox" name="iprfOD_dB" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OD_dB ?>">     
                                </div>
                            </td>

                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input id="appendedcheckbox" name="iprfOD_Mono" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OD_Mono ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input id="appendedcheckbox" name="iprfOD_Dissil" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OD_Dissil ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input name="iprfOD_Masc" value="S"  type="checkbox" <?= $iprf[0]->OD_Masc == 'S' ? 'checked' : ''; ?>>                                    
                                </div>
                            </td>                                
                        </tr>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input id="appendedcheckbox" name="iprfOE_dB" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OE_dB ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input id="appendedcheckbox" name="iprfOE_Mono" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OE_Mono ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input id="appendedcheckbox" name="iprfOE_Dissil" class="input-rodrigo"   type="number" value="<?= $iprf[0]->OE_Dissil ?>">     
                                </div>
                            </td>

                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input name="iprfOE_Masc" value="S" type="checkbox" <?= $iprf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>>                                    
                                </div>
                            </td>                                
                        </tr>
                    </tbody></table>
            </fieldset>                   
        </div>
    </div>



</form>
