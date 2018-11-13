<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
     <h4>Limiar de Detecção de Fala | Limiar de Recepção de Fala</h4> 
</div>

<form   action="<?= base_url('index.php/Ldf_lrf/salvar/') ?>" method="post">
    
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" value="<?= $id ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <div class="col-sm-6" >
            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo"><h4>Limiar de Detecção de Fala</h4></legend>    
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>dB</th>
                            <th>Masc.</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.D.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input name="codLdf" class="input-rodrigo"   type="hidden"  value="<?= $ldf[0]->codLdf ?>">     
                                    <input type="number" id="appendedcheckbox" name="ldfOD_dB" class="input-rodrigo"   type="number"  value="<?= $ldf[0]->OD_dB ?>">                                             
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="checkbox" name="ldfOD_Masc" value="S" <?= $ldf[0]->OD_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                </div>
                            </td>                                
                        </tr>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="number" id="appendedcheckbox" name="ldfOE_dB" class="input-rodrigo"   type="number" value="<?= $ldf[0]->OE_dB ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="checkbox" name="ldfOE_Masc" value="S" <?= $ldf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                </div>
                            </td>                                
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <div class="col-sm-6" >
            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo"><h4>Limiar de Recepção de Fala</h4></legend>    
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>dB</th>
                            <th>Masc.</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.D.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input name="codLrf" class="input-rodrigo"   type="hidden"  value="<?= $lrf[0]->codLrf ?>">     
                                    <input type="number" id="appendedcheckbox" name="lrfOD_dB" class="input-rodrigo"   type="number"  value="<?= $lrf[0]->OD_dB ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="checkbox" name="lrfOD_Masc"  value="S"  <?= $lrf[0]->OD_Masc == 'S' ? 'checked' : ''; ?> ><label> S/N</label>                                        
                                </div>
                            </td>                                
                        </tr>
                        <tr>
                            <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="number" id="appendedcheckbox" name="lrfOE_dB" class="input-rodrigo"   type="number" value="<?= $lrf[0]->OE_dB ?>">     
                                </div>
                            </td>
                            <td>
                                <div style="width:65px; margin-right:8px;">
                                    <input type="checkbox" name="lrfOE_Masc" value="S" <?= $lrf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                </div>
                            </td>                                
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>  
</form>

