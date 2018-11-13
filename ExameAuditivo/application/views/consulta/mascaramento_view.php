<!--<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Mascaramento</h4> 
</div>-->
<form   action="<?= base_url('index.php/Mascaramento/salvar/') ?>" method="post">
    <div class="form-group col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div> 
    <input type="hidden" value="<?= $id ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <fieldset class="fieldset-rodrigo">
            <legend class="legend-rodrigo"><h4>Mascaramento</h4></legend>    
            <table>

                <tbody>
                    <tr>
                        <th colspan="2"><label  for="appendedcheckbox">V.A.</label></th>                        
                        <td>
                            <div style="width:100px; margin-right:8px;">
                                <input name="codMascaramento" class="input-rodrigo"   type="hidden"  value="<?= $mascaramento[0]->codMascaramento ?>">     
                                <input style="width:100px; " id="appendedcheckbox" name="mascaramentoVA" class="input-rodrigo" value="<?= $mascaramento[0]->VA ?>">     
                            </div>
                        </td>                                                              

                        <th colspan="2" ><label  for="appendedcheckbox">Cor</label></th>                        
                        <td>
                            <div style="width:100px; margin-right:8px;">
                                <select style="width:100px; " id="Cor" name="Cor" class="input-rodrigo" >
                                    <option></option>
                                    <option value="E" <?= $mascaramento[0]->COR_VAR == 'E' ? 'selected' : ''; ?>  >Azul</option>
                                    <option value="D" <?= $mascaramento[0]->COR_VAR == 'D' ? 'selected' : ''; ?>   >Vermelho</option>
                                    <option value="ED" <?= $mascaramento[0]->COR_VAR == 'ED' ? 'selected' : ''; ?>   >Azul/Vermelho</option>
                                </select>
                            </div>
                        </td>                                                              
                    </tr>
                    <tr>
                        <th rowspan="2"><label  for="appendedcheckbox">V.O.</label></th>                        
                        <th ><label  for="appendedcheckbox">O.D.</label></th>                        
                        <td>
                            <div style="width:100px; margin-right:8px;">
                                <input  style="width:100px; " id="appendedcheckbox" name="mascaramentoVOOD" class="input-rodrigo"  value="<?= $mascaramento[0]->VOOD ?>">     
                            </div>
                        </td>                                                              
                    </tr>
                    <tr>

                        <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                        <td>
                            <div style="width:100px; margin-right:8px;">
                                <input style="width:100px; " id="appendedcheckbox" name="mascaramentoVOOE" class="input-rodrigo"   value="<?= $mascaramento[0]->VOOE ?>" >     
                            </div>
                        </td>                                                              
                    </tr>


                </tbody></table>
        </fieldset>
    </div>


</form>

