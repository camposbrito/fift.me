<div  class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Audiometrico</h4> 
</div>
<form   action="<?= base_url('index.php/Audiometrico/salvar/') ?>" method="post">
    <!-- Button (Double) -->
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />            
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <div style="padding: 0 40px" class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <div class="container col-sm-12 col-md-12    ">
            <table class="table-responsive  col-md-12" >
                <thead>
                    <tr>
                        <th></th>
                        <th>0,25k</th>
                        <th>0,50k</th>
                        <th>1k</th>
                        <th>2k</th>
                        <th>3k</th>
                        <th>4k</th>
                        <th>6k</th>
                        <th>8k</th>
                    </tr>
                </thead>
                <tbody>
                <input type="hidden" value="<?= $id ?>" name="Consulta">
                <?php foreach ($audiometrico as $aud) { ?>
                    <input type="hidden" value="<?= $aud->CodExameAudiometrico ?>" name="CodExameAudiometrico[<?= $aud->CodFaixa ?>]">
                    <tr>
                        <th ><label  for="appendedcheckbox"><?= $aud->Descricao ?></label></th>                        
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_025[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_025 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_025[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_025 == 'S' ? 'checked' : ''; ?> >                                      
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_050[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_050 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_050[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_050 == 'S' ? 'checked' : ''; ?> >                                                                           
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_1[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_1 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_1[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_1 == 'S' ? 'checked' : ''; ?> >                                          
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_2[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_2 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_2[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_2 == 'S' ? 'checked' : ''; ?> >                                    
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_3[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_3 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_3[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_3 == 'S' ? 'checked' : ''; ?> >                                      
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_4[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_4 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_4[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_4 == 'S' ? 'checked' : ''; ?> >                                   
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_6[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_6 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_6[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_6 == 'S' ? 'checked' : ''; ?> >                                  
                            </div>
                        </td>
                        <td>
                            <div style="width:68px; margin-right:8px;">
                                <input id="appendedcheckbox" name="Valor_8[<?= $aud->CodFaixa ?>]" class="input-rodrigo  input-sm  "type="number" value="<?= $aud->Valor_8 ?>" >                                
                                <input type="checkbox"  class="check-rodrigo" value="S" name="Ausente_8[<?= $aud->CodFaixa ?>]" <?= $aud->Ausente_8 == 'S' ? 'checked' : ''; ?> >                                     
                            </div>
                        </td>

                    </tr>

                    <?php
                    $equipamento = $aud->Equipamento;
                }
                ?>
                <tr>      
                    <th><label  class="text-right">Equipamento</label></th>
                    <td colspan="8">

                        <select required="" id="equipamento" name="equipamento" class="form-control" >
                            <option ></option>
                            <?php
                            foreach ($equipamentos as $equi) {
                                ?>
                                <option <?= $equipamento == $equi->Cod ? 'selected' : ''; ?> value="<?= $equi->Cod; ?>"><?= $equi->Descricao; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <div class="container  col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">            
            <div class="col-md-3" >
                <fieldset class="fieldset-rodrigo" style="height:184px">
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
                                    <div style="width:68px; margin-right:8px;">
                                        <input name="codLdf" class="input-rodrigo  input-sm  "  type="hidden"  value="<?= $ldf[0]->codLdf ?>">     
                                        <input id="appendedcheckbox" name="ldfOD_dB" class="input-rodrigo  input-sm  "  type="number"  value="<?= $ldf[0]->OD_dB ?>">                                             
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input type="checkbox" name="ldfOD_Masc" value="S" <?= $ldf[0]->OD_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                    </div>
                                </td>                                
                            </tr>
                            <tr>
                                <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="ldfOE_dB" class="input-rodrigo  input-sm  "  type="number" value="<?= $ldf[0]->OE_dB ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input type="checkbox" name="ldfOE_Masc" value="S" <?= $ldf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                    </div>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="col-md-3" >
                <fieldset class="fieldset-rodrigo" style="height:184px">
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
                                    <div style="width:68px; margin-right:8px;">
                                        <input name="codLrf" class="input-rodrigo  input-sm  "  type="hidden"  value="<?= $lrf[0]->codLrf ?>">     
                                        <input id="appendedcheckbox" name="lrfOD_dB" class="input-rodrigo  input-sm  "  type="number"  value="<?= $lrf[0]->OD_dB ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input type="checkbox" name="lrfOD_Masc" value="S" <?= $lrf[0]->OD_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                    </div>
                                </td>                                
                            </tr>
                            <tr>
                                <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="lrfOE_dB" class="input-rodrigo  input-sm  "  type="number" value="<?= $lrf[0]->OE_dB ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input type="checkbox" name="lrfOE_Masc" value="S" <?= $lrf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>><label> S/N</label>                                        
                                    </div>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="col-md-3">

                <fieldset class="fieldset-rodrigo" style="height:184px">
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
                                    <div style="width:68px; margin-right:8px;">
                                        <input name="codIprf" class="input-rodrigo  input-sm  "  type="hidden"  value="<?= $iprf[0]->codIprf ?>">     
                                        <input id="appendedcheckbox" name="iprfOD_dB" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OD_dB ?>">     
                                    </div>
                                </td>

                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="iprfOD_Mono" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OD_Mono ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="iprfOD_Dissil" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OD_Dissil ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input name="iprfOD_Masc" value="S"  type="checkbox" <?= $iprf[0]->OD_Masc == 'S' ? 'checked' : ''; ?>>                                    
                                    </div>
                                </td>                                
                            </tr>
                            <tr>
                                <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="iprfOE_dB" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OE_dB ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="iprfOE_Mono" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OE_Mono ?>">     
                                    </div>
                                </td>
                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input id="appendedcheckbox" name="iprfOE_Dissil" class="input-rodrigo  input-sm  "  type="number" value="<?= $iprf[0]->OE_Dissil ?>">     
                                    </div>
                                </td>

                                <td>
                                    <div style="width:68px; margin-right:8px;">
                                        <input name="iprfOE_Masc" value="S" type="checkbox" <?= $iprf[0]->OE_Masc == 'S' ? 'checked' : ''; ?>>                                    
                                    </div>
                                </td>                                
                            </tr>
                        </tbody></table>
                </fieldset>
            </div>   
            <div class="col-md-3">
                <fieldset class="fieldset-rodrigo" style="height:184px">
                    <legend class="legend-rodrigo"><h4>Mascaramento</h4></legend>    
                    <table>

                        <tbody>
                            <tr>
                                <th colspan="2"><label  for="appendedcheckbox">V.A.</label></th>                        
                                <td>
                                    <div style="width:100px; margin-right:8px;">
                                        <input name="codMascaramento" class="input-rodrigo  input-sm  "  type="hidden"  value="<?= $mascaramento[0]->codMascaramento ?>">     
                                        <input style="width:100px; " id="appendedcheckbox" name="mascaramentoVA" class="input-rodrigo  input-sm  "    value="<?= $mascaramento[0]->VA ?>">     
                                    </div>
                                </td>                                                              

                                <th colspan="2" ><label  for="appendedcheckbox">Cor</label></th>                        
                                <td>
                                    <div style="width:80px; margin-right:8px;">
                                        <select style="width:80px; " id="Cor" name="Cor" class="input-rodrigo  input-sm  ">
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
                                        <input  style="width:100px; " id="appendedcheckbox" name="mascaramentoVOOD" class="input-rodrigo  input-sm  "   value="<?= $mascaramento[0]->VOOD ?>">     
                                    </div>
                                </td>                                                              
                            </tr>
                            <tr>

                                <th ><label  for="appendedcheckbox">O.E.</label></th>                        
                                <td>
                                    <div style="width:100px; margin-right:8px;">
                                        <input style="width:100px; " id="appendedcheckbox" name="mascaramentoVOOE" class="input-rodrigo  input-sm  "    value="<?= $mascaramento[0]->VOOE ?>" >     
                                    </div>
                                </td>                                                              
                            </tr>


                        </tbody></table>
                </fieldset>



            </div>
        </div>  
    </div>
</div>

</form>

