<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Reflexo Estapediano</h4>
</div>
<form action="<?= base_url('index.php/ReflexoEstapediano/salvar/') ?>" method="post">
    <div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <div class="form-group ">
            <label class="col-md-4 control-label" for="buttonEnviar"></label>
            <div class="col-md-8 text-right">
                <input type="submit" class="btn btn-sm btn btn-success" value="Salvar" id="salvar"/>
                <input type="button" class="btn btn-sm btn  btn-info"      id="atualizar_reflexoEstapediano" value="Atualizar">
                <a href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn  btn-danger">Voltar</a>
            </div>
        </div>
    </div>

    <?php
    $refl_500 = $reflexoEstapediano[0];
    $refl_1000 = $reflexoEstapediano[1];
    $refl_2000 = $reflexoEstapediano[2];
    $refl_4000 = $reflexoEstapediano[3];
    ?>
    <input type="hidden" value="<?= $consulta[0]->Cod ?>" name="Consulta">


    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0">
        <span class="col-sm-5 col-sm-offset-0 col-md-5 col-md-offset-0 ">
            <label class=" col-md-6 col-sm-6 text-center">Direito</label>
            <label class=" col-md-6 col-sm-6 text-center">(Sonda no Esquerdo)</label>
        </span>
        <label class=" col-md-2 col-sm-2 text-center"></label>

        <span class="col-sm-5 col-sm-offset-0 col-md-5 col-md-offset-0 ">
            <label class=" col-md-6 col-sm-6 text-center"></label>
            <label class=" col-md-6 col-sm-6 text-center">Direito</label>
        </span>
        <div class="col-md-5 col-sm-5 ">
            <div class="col-md-6 col-sm-8">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">Limiar Tonal </legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                        <input  type="hidden" class="form-control  input-sm  " name="Faixa500"  value="<?= $refl_500->CodFaixa; ?>"/>
                        <input  type="hidden" class="form-control  input-sm  " name="codReflexoestapediano500"  value="<?= $refl_500->Cod; ?>"/>
                        <td><input  type="number" class="form-control input-sm   " name="LimiarTonal_OD500" id="LimiarTonal_OD500"  value="<?= $refl_500->LimiarTonal_OD; ?>"/></td>
                        <td><input  type="checkbox" value="S" class=" " name="LimiarTonal_OD_ausente500"   <?= $refl_500->LimiarTonal_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_NaoFeito500"   <?= $refl_500->LimiarTonal_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                        <input  type="hidden" class="form-control  input-sm  " name="Faixa1000"  value="<?= $refl_1000->CodFaixa; ?>"/>    
                        <input  type="hidden" class="form-control  input-sm  " name="codReflexoestapediano1000"  value="<?= $refl_1000->Cod; ?>"/>
                        <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OD1000" id="LimiarTonal_OD1000"  value="<?= $refl_1000->LimiarTonal_OD; ?>"/></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_ausente1000"   <?= $refl_1000->LimiarTonal_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_NaoFeito1000"   <?= $refl_1000->LimiarTonal_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                        <input  type="hidden" class="form-control  input-sm  " name="Faixa2000"  value="<?= $refl_2000->CodFaixa; ?>"/>  
                        <input  type="hidden" class="form-control  input-sm  " name="codReflexoestapediano2000"  value="<?= $refl_2000->Cod; ?>"/>
                        <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OD2000"  id="LimiarTonal_OD2000" value="<?= $refl_2000->LimiarTonal_OD; ?>"/></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_ausente2000"   <?= $refl_2000->LimiarTonal_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_NaoFeito2000"   <?= $refl_2000->LimiarTonal_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                        <input  type="hidden" class="form-control  input-sm  " name="Faixa4000"  value="<?= $refl_4000->CodFaixa; ?>"/>   
                        <input  type="hidden" class="form-control  input-sm  " name="codReflexoestapediano4000"  id="codReflexoestapediano4000"  value="<?= $refl_4000->Cod; ?>"/>
                        <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OD4000" id="LimiarTonal_OD4000" value="<?= $refl_4000->LimiarTonal_OD; ?>"/></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_ausente4000"   <?= $refl_4000->LimiarTonal_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                        <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OD_NaoFeito4000"   <?= $refl_4000->LimiarTonal_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>                          
                    </table>
                </fieldset>
            </div>
            <div class="col-md-6 ">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">Nível de Reflexo</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OD500" id="NivelReflexo_OD500"  value="<?= $refl_500->NivelReflexo_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_ausente500"   <?= $refl_500->NivelReflexo_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_NaoFeito500"   <?= $refl_500->NivelReflexo_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OD1000"  value="<?= $refl_1000->NivelReflexo_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_ausente1000"   <?= $refl_1000->NivelReflexo_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_NaoFeito1000"   <?= $refl_1000->NivelReflexo_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OD2000" value="<?= $refl_2000->NivelReflexo_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_ausente2000"   <?= $refl_2000->NivelReflexo_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_NaoFeito2000"   <?= $refl_2000->NivelReflexo_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OD4000"  value="<?= $refl_4000->NivelReflexo_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_ausente4000"   <?= $refl_4000->NivelReflexo_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OD_NaoFeito4000"   <?= $refl_4000->NivelReflexo_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr> 
                    </table>
                </fieldset>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 ">
            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo">Dif.</legend>
                <table class="table-condensed ">
                    <tr>
                        <td  class="text-right">500</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OD500"  value="<?= $refl_500->Dif_OD; ?>" /> 
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OD500_"  value="<?= $refl_500->Dif_OD; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OD_NaoFeito500"   <?= $refl_500->Dif_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td  class="text-right">1.000</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OD1000"  value="<?= $refl_1000->Dif_OD; ?>"/> 
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OD1000_"  value="<?= $refl_1000->Dif_OD; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OD_NaoFeito1000"   <?= $refl_1000->Dif_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td class="text-right">2.000</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OD2000" value="<?= $refl_2000->Dif_OD; ?>"/>                        
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OD2000_" value="<?= $refl_2000->Dif_OD; ?>" disabled=""/></td>                            
                    <td><input  type="checkbox" value="S" class="" name="Dif_OD_NaoFeito2000"   <?= $refl_2000->Dif_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td class="text-right">4.000</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OD4000"  value="<?= $refl_4000->Dif_OD; ?>" /> 
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OD4000_"  value="<?= $refl_4000->Dif_OD; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OD_NaoFeito4000"   <?= $refl_4000->Dif_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr> 
                </table>
            </fieldset>
        </div>
        <div class="col-md-5 col-sm-5">
            <div class="col-md-6 col-sm-6">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">TDT</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OD500" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_500->TD_OD == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_500->TD_OD == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_ausente500"   <?= $refl_500->TD_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_NaoFeito500"   <?= $refl_500->TD_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OD1000" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_1000->TD_OD == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_1000->TD_OD == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_ausente1000"   <?= $refl_1000->TD_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_NaoFeito1000"   <?= $refl_1000->TD_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OD2000"class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_2000->TD_OD == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_2000->TD_OD == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_ausente2000"   <?= $refl_2000->TD_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_NaoFeito2000"   <?= $refl_2000->TD_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OD4000" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_4000->TD_OD == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_4000->TD_OD == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_ausente4000"   <?= $refl_4000->TD_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OD_NaoFeito4000"   <?= $refl_4000->TD_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr> 
                    </table>
                </fieldset>
            </div>

            <div class="col-md-6 ">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">IPSI Lateral</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OD500"  value="<?= $refl_500->Ipsi_Lateral_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_ausente500"   <?= $refl_500->Ipsi_Lateral_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_NaoFeito500"   <?= $refl_500->Ipsi_Lateral_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OD1000"  value="<?= $refl_1000->Ipsi_Lateral_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_ausente1000"   <?= $refl_1000->Ipsi_Lateral_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_NaoFeito1000"   <?= $refl_1000->Ipsi_Lateral_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OD2000"  value="<?= $refl_2000->Ipsi_Lateral_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_ausente2000"   <?= $refl_2000->Ipsi_Lateral_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_NaoFeito2000"   <?= $refl_2000->Ipsi_Lateral_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OD4000"  value="<?= $refl_4000->Ipsi_Lateral_OD; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_ausente4000"   <?= $refl_4000->Ipsi_Lateral_OD_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OD_NaoFeito4000"   <?= $refl_4000->Ipsi_Lateral_OD_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>                          
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
        <!--        <label class=" col-md-12 col-sm-12 text-center">Esquerdo (Sonda no Direito)</label>-->
        <span class="col-sm-5 col-sm-offset-0 col-md-5 col-md-offset-0 ">
            <label class=" col-md-6 col-sm-6 text-center">Esquerdo</label>
            <label class=" col-md-6 col-sm-6 text-center">(Sonda no Direito)</label>
        </span>
        <label class=" col-md-2 col-sm-2 text-center"></label>

        <span class="col-sm-5 col-sm-offset-0 col-md-5 col-md-offset-0 ">
            <label class=" col-md-6 col-sm-6 text-center"></label>
            <label class=" col-md-6 col-sm-6 text-center">Esquerdo</label>
        </span>
        <div class="col-md-5 col-sm-5">
            <div class="col-md-6 col-sm-6">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">Limiar Tonal</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OE500" id="LimiarTonal_OE500"  value="<?= $refl_500->LimiarTonal_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_ausente500"   <?= $refl_500->LimiarTonal_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_NaoFeito500"   <?= $refl_500->LimiarTonal_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OE1000" id="LimiarTonal_OE1000"  value="<?= $refl_1000->LimiarTonal_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_ausente1000"   <?= $refl_1000->LimiarTonal_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_NaoFeito1000"   <?= $refl_1000->LimiarTonal_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OE2000"  id="LimiarTonal_OE2000"  value="<?= $refl_2000->LimiarTonal_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_ausente2000"   <?= $refl_2000->LimiarTonal_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_NaoFeito2000"   <?= $refl_2000->LimiarTonal_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="LimiarTonal_OE4000"   id="LimiarTonal_OE4000"  value="<?= $refl_4000->LimiarTonal_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_ausente4000"   <?= $refl_4000->LimiarTonal_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="LimiarTonal_OE_NaoFeito4000"   <?= $refl_4000->LimiarTonal_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>                          
                    </table>
                </fieldset>
            </div>
            <div class="col-md-6 ">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">Nível de Reflexo</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OE500"  value="<?= $refl_500->NivelReflexo_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_ausente500"   <?= $refl_500->NivelReflexo_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_NaoFeito500"   <?= $refl_500->NivelReflexo_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OE1000"  value="<?= $refl_1000->NivelReflexo_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_ausente1000"   <?= $refl_1000->NivelReflexo_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_NaoFeito1000"   <?= $refl_1000->NivelReflexo_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OE2000"  value="<?= $refl_2000->NivelReflexo_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_ausente2000"   <?= $refl_2000->NivelReflexo_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_NaoFeito2000"   <?= $refl_2000->NivelReflexo_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="NivelReflexo_OE4000"  value="<?= $refl_4000->NivelReflexo_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_ausente4000"   <?= $refl_4000->NivelReflexo_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="NivelReflexo_OE_NaoFeito4000"   <?= $refl_4000->NivelReflexo_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr> 
                    </table>
                </fieldset>
            </div>
        </div>
        <div class="col-md-2 ">
            <fieldset class="fieldset-rodrigo">
                <legend class="legend-rodrigo">Dif.</legend>
                <table class="table-condensed ">
                    <tr>
                        <td  class="text-right">500</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OE500"  value="<?= $refl_500->Dif_OE; ?>"  /> 
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OE500_"  value="<?= $refl_500->Dif_OE; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OE_NaoFeito500"   <?= $refl_500->Dif_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td  class="text-right">1.000</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OE1000"  value="<?= $refl_1000->Dif_OE; ?>"  />
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OE1000_"  value="<?= $refl_1000->Dif_OE; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OE_NaoFeito1000"   <?= $refl_1000->Dif_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td class="text-right">2.000</td>
                    <input  type="hidden" class="form-control  input-sm  " name="Dif_OE2000"  value="<?= $refl_2000->Dif_OE; ?>"  />                           
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OE2000_"  value="<?= $refl_2000->Dif_OE; ?>" disabled=""/></td>                            
                    <td><input  type="checkbox" value="S" class="" name="Dif_OE_NaoFeito2000"   <?= $refl_2000->Dif_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr>
                    <tr>
                        <td class="text-right">4.000</td>
                    <input  type="hidden" class="form-control" name="Dif_OE4000"  value="<?= $refl_4000->Dif_OE; ?>"  /> 
                    <td><input  type="number" class="form-control  input-sm  " name="Dif_OE4000_"  value="<?= $refl_4000->Dif_OE; ?>" disabled=""/></td>
                    <td><input  type="checkbox" value="S" class="" name="Dif_OE_NaoFeito4000"   <?= $refl_4000->Dif_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                    </tr> 
                </table>
            </fieldset>
        </div>
        <div class="col-md-5 ">
            <div class="col-md-6 ">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">TDT</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OE500" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_500->TD_OE == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_500->TD_OE == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_ausente500"   <?= $refl_500->TD_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_NaoFeito500"   <?= $refl_500->TD_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OE1000" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_1000->TD_OE == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_1000->TD_OE == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_ausente1000"   <?= $refl_1000->TD_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_NaoFeito1000"   <?= $refl_1000->TD_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OE2000" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_2000->TD_OE == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_2000->TD_OE == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_ausente2000"   <?= $refl_2000->TD_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_NaoFeito2000"   <?= $refl_2000->TD_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td style="width: 120px;">
                                <select id="selectbasic" name="TD_OE4000" class="form-control  input-sm  "  >
                                    <option value=""></option>
                                    <option value="2" <?= $refl_4000->TD_OE == 2 ? ' selected ' : ''; ?>>POS</option>
                                    <option value="3" <?= $refl_4000->TD_OE == 3 ? ' selected ' : ''; ?>>NEG</option>
                                </select>
                            </td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_ausente4000"   <?= $refl_4000->TD_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="TD_OE_NaoFeito4000"   <?= $refl_4000->TD_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr> 
                    </table>
                </fieldset>
            </div>

            <div class="col-md-6 ">
                <fieldset class="fieldset-rodrigo">
                    <legend class="legend-rodrigo">IPSI Lateral</legend>
                    <table class="table-condensed ">
                        <tr>
                            <td  class="text-right">500</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OE500"  value="<?= $refl_500->Ipsi_Lateral_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_ausente500"   <?= $refl_500->Ipsi_Lateral_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_NaoFeito500"   <?= $refl_500->Ipsi_Lateral_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td  class="text-right">1.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OE1000"  value="<?= $refl_1000->Ipsi_Lateral_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_ausente1000"   <?= $refl_1000->Ipsi_Lateral_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_NaoFeito1000"   <?= $refl_1000->Ipsi_Lateral_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">2.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OE2000"  value="<?= $refl_2000->Ipsi_Lateral_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_ausente2000"   <?= $refl_2000->Ipsi_Lateral_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_NaoFeito2000"   <?= $refl_2000->Ipsi_Lateral_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>
                        <tr>
                            <td class="text-right">4.000</td>
                            <td><input  type="number" class="form-control  input-sm  " name="Ipsi_Lateral_OE4000"  value="<?= $refl_4000->Ipsi_Lateral_OE; ?>"/></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_ausente4000"   <?= $refl_4000->Ipsi_Lateral_OE_ausente == 'S' ? ' checked ' : ''; ?> /></td>
                            <td><input  type="checkbox" value="S" class="" name="Ipsi_Lateral_OE_NaoFeito4000"   <?= $refl_4000->Ipsi_Lateral_OE_NaoFeito == 'S' ? ' checked ' : ''; ?>/></td>                            
                        </tr>                          
                    </table>
                </fieldset>
            </div>
        </div>
    </div>

</form>


<script type="text/javascript">
    $("input[name$='LimiarTonal_OD500']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD500']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD500']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD500']").val(res);
            $("input[name$='Dif_OD500_']").val(res);
        } else {
            $("input[name$='Dif_OD500']").val("");
            $("input[name$='Dif_OD500_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OD500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OD1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OD1000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD1000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD1000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD1000']").val(res);
            $("input[name$='Dif_OD1000_']").val(res);
        } else {
            $("input[name$='Dif_OD1000']").val("");
            $("input[name$='Dif_OD1000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OD1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OD2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OD2000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD2000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD2000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD2000']").val(res);
            $("input[name$='Dif_OD2000_']").val(res);
        } else
        {
            $("input[name$='Dif_OD2000']").val("");
            $("input[name$='Dif_OD2000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OD2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OD4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OD4000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD4000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD4000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD4000']").val(res);
            $("input[name$='Dif_OD4000_']").val(res);
        } else {
            $("input[name$='Dif_OD4000']").val("");
            $("input[name$='Dif_OD4000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OD4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OD500']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OD500']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD500']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD500']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD500']").val(res);
            $("input[name$='Dif_OD500_']").val(res);
        } else {
            $("input[name$='Dif_OD500']").val("");
            $("input[name$='Dif_OD500_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OD500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OD1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OD1000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD1000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD1000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD1000']").val(res);
            $("input[name$='Dif_OD1000_']").val(res);
        } else {
            $("input[name$='Dif_OD1000']").val("");
            $("input[name$='Dif_OD1000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OD1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OD2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OD2000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD2000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD2000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD2000']").val(res);
            $("input[name$='Dif_OD2000_']").val(res);
        } else {
            $("input[name$='Dif_OD2000']").val("");
            $("input[name$='Dif_OD2000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OD2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OD4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OD4000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OD4000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OD4000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OD4000']").val(res);
            $("input[name$='Dif_OD4000_']").val(res);
        } else {
            $("input[name$='Dif_OD4000']").val("");
            $("input[name$='Dif_OD4000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OD4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OE500']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='Ipsi_Lateral_OE500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OE1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OE1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OE2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OE2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OE4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OE4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OE500']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='LimiarTonal_OE500']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE500']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE500']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE500']").val(res);
            $("input[name$='Dif_OE500_']").val(res);
        } else {
            $("input[name$='Dif_OE500_']").val("");
            $("input[name$='Dif_OE500_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OE500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OE1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OE1000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE1000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE1000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE1000']").val(res);
            $("input[name$='Dif_OE1000_']").val(res);
        } else {
            $("input[name$='Dif_OE1000']").val("");
            $("input[name$='Dif_OE1000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OE1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OE2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OE2000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE2000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE2000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE2000']").val(res);
            $("input[name$='Dif_OE2000_']").val(res);
        } else {
            $("input[name$='Dif_OE2000']").val("");
            $("input[name$='Dif_OE2000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OE2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OE4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='LimiarTonal_OE4000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE4000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE4000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE4000']").val(res);
            $("input[name$='Dif_OE4000_']").val(res);
        } else {
            $("input[name$='Dif_OE4000']").val("");
            $("input[name$='Dif_OE4000_']").val("");
        }
    });

    $("input[name$='LimiarTonal_OE4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OE500']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OE500']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE500']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE500']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE500']").val(res);
            $("input[name$='Dif_OE500_']").val(res);
        } else {
            $("input[name$='Dif_OE500']").val("");
            $("input[name$='Dif_OE500_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OE500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OE1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OE1000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE1000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE1000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE1000']").val(res);
            $("input[name$='Dif_OE1000_']").val(res);
        } else {
            $("input[name$='Dif_OE1000']").val("");
            $("input[name$='Dif_OE1000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OE1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OE2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OE2000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE2000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE2000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE2000']").val(res);
            $("input[name$='Dif_OE2000_']").val(res);
        } else {
            $("input[name$='Dif_OE2000']").val("");
            $("input[name$='Dif_OE2000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OE2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='NivelReflexo_OE4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='NivelReflexo_OE4000']").focusout(function () {
        var min = $("input[name$='LimiarTonal_OE4000']").val().replace(',', '.');
        var max = $("input[name$='NivelReflexo_OE4000']").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = max - min;
            $("input[name$='Dif_OE4000']").val(res);
            $("input[name$='Dif_OE4000_']").val(res);
        } else {
            $("input[name$='Dif_OE4000']").val("");
            $("input[name$='Dif_OE4000_']").val("");
        }
    });

    $("input[name$='NivelReflexo_OE4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OD500']").focus();
            e.preventDefault(e);
            return false;
        }
    });

    $("input[name$='Ipsi_Lateral_OD500']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OD1000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OD1000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OD2000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OD2000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='Ipsi_Lateral_OD4000']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("input[name$='Ipsi_Lateral_OD4000']").keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);
        if ((tecla == 13) || (tecla == 9)) {
            $("input[name$='LimiarTonal_OE500']").focus();
            e.preventDefault(e);
            return false;
        }
    });
    $("#atualizar_reflexoEstapediano").on("click", function () {
        if (arguments[1] === undefined) {
            var resposta = confirm("Deseja atualizar esse registro?");
        } else {
            resposta = true;
        }
        if (resposta == true) {
            //DESABILITANDO CAMPOS

            $("#LimiarTonal_OD500").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OD1000").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OD2000").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OD4000").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OE500").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OE1000").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OE2000").css("background-color", "#FFFAB5");
            $("#LimiarTonal_OE4000").css("background-color", "#FFFAB5");
            var base_url = '<?php echo site_url(); ?>';
            var controller = '/Audiometrico';
            var action = 'AudiometricoJSON';
            //requisicao ajax enviando os parâmetros via POST
            $.ajax({
                url: base_url + controller + '/' + action,
                type: 'POST',
                cache: false,
                data: $('form').serialize(),
                dataType: 'json',
                success: function (res) {
                    //populando os valores                     
                    $("#LimiarTonal_OD500").val(res.D[500]);
                    $("#LimiarTonal_OD1000").val(res.D[1000]);
                    $("#LimiarTonal_OD2000").val(res.D[2000]);
                    $("#LimiarTonal_OD4000").val(res.D[4000]);
                    $("#LimiarTonal_OD500").trigger('focusout');
                    $("#LimiarTonal_OD1000").trigger('focusout');
                    $("#LimiarTonal_OD2000").trigger('focusout');
                    $("#LimiarTonal_OD4000").trigger('focusout');
                    $("#LimiarTonal_OE500").val(res.E[500]);
                    $("#LimiarTonal_OE1000").val(res.E[1000]);
                    $("#LimiarTonal_OE2000").val(res.E[2000]);
                    $("#LimiarTonal_OE4000").val(res.E[4000]);
                    $("#LimiarTonal_OE500").trigger('focusout');
                    $("#LimiarTonal_OE1000").trigger('focusout');
                    $("#LimiarTonal_OE2000").trigger('focusout');
                    $("#LimiarTonal_OE4000").trigger('focusout');
                    //HABILITANDO CAMPOS
                    setTimeout(function () {
                        $("#LimiarTonal_OD500").css("background-color", "");
                        $("#LimiarTonal_OD1000").css("background-color", "");
                        $("#LimiarTonal_OD2000").css("background-color", "");
                        $("#LimiarTonal_OD4000").css("background-color", "");
                        $("#LimiarTonal_OE500").css("background-color", "");
                        $("#LimiarTonal_OE1000").css("background-color", "");
                        $("#LimiarTonal_OE2000").css("background-color", "");
                        $("#LimiarTonal_OE4000").css("background-color", "");
                    }, 250);

                }
            });
            return false;
        }
    });



</script>
<?php
if (
        ($consulta[0]->Fechamento == 'N' ) &&
        ($consulta[0]->Invalido == 'N' ) &&
        (
        $refl_500->Cod == 0 ||
        $refl_1000->Cod == 0 ||
        $refl_2000->Cod == 0 ||
        $refl_4000->Cod == 0
        ) &&
        (
        count($VALD) > 0 ||
        count($VALE) > 0 ||
        count($VAMLD) > 0 ||
        count($VAMLE) > 0
        )
) {
    echo '<script type="text/javascript" >';
    echo '$(document).ready(function () {';
    echo " $('#atualizar_reflexoEstapediano').trigger('click',[true]);";
    echo '})';
    echo '</script>';
}
?>