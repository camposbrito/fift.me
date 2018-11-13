<div style="padding: 0 40px" class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h3>Timpanometria</h5>
</div>

<form  class="form-horizontal" action="<?= base_url('index.php/Timpanometria/salvar/') ?>" method="post">
    <div style="margin: 0px" class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <div style="padding: 0 40px" class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <input type="hidden" value="<?= $timpanometria['OD'][0]->codTimpanometriaOD ?>" name="codTimpanometriaOD" >
        <input type="hidden" value="<?= $timpanometria['OE'][0]->codTimpanometriaOE ?>" name="codTimpanometriaOE" >
        <input type="hidden" value="<?= $id ?>" name="Consulta">
        <div style="padding: 0 40px" class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <fieldset class="fieldset-rodrigo">

                        <!-- Form Name -->
                        <legend class="legend-rodrigo">Lado Direito</legend> 

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+200</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_200_plusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_200_plus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+150</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_150_plusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_150_plus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+100</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_100_plusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_100_plus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+50</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_50_plusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_50_plus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">0</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_0OD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula"  value="<?= $timpanometria['OD'][0]->Valor_0 ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-25</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_25_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_25_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-50 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_50_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_50_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-75 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_75_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_75_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-100 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_100_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_100_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-125 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_125_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_125_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-150 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_150_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_150_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-175 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_175_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_175_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-200 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_200_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_200_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-225 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_225_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_225_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-250 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_250_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_250_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-275 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_275_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_275_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-300 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_300_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_300_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-325</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_325_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_325_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput"> -350 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_350_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_350_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-375</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_375_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_375_minus ?>">

                            </div>
                        </div>

                        <!-- -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput"> -400</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_400_minusOD" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OD'][0]->Valor_400_minus ?>">

                            </div>
                        </div>

                    </fieldset>    
                </div>
                <div class="col-md-6 col-sm-6">
                    <fieldset class="fieldset-rodrigo">


                        <legend class="legend-rodrigo">Lado Esquerdo</legend>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+200</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_200_plusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_200_plus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+150</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_150_plusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_150_plus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+100</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_100_plusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_100_plus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">+50</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_50_plusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_50_plus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">0</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_0OE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula"  value="<?= $timpanometria['OE'][0]->Valor_0 ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-25</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_25_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_25_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-50 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_50_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_50_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-75 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_75_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_75_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-100 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_100_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_100_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-125 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_125_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_125_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-150 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_150_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_150_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-175 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_175_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_175_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-200 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_200_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_200_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-225 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_225_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_225_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-250 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_250_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_250_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-275 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_275_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_275_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-300 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_300_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_300_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-325</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_325_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_325_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput"> -350 </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_350_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_350_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">-375</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_375_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_375_minus ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput"> -400</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="Valor_400_minusOE" type="number" step="0.01" placeholder="" class="form-control input-sm   pula" value="<?= $timpanometria['OE'][0]->Valor_400_minus ?>">

                            </div>
                        </div>

                    </fieldset>    
                </div>
            </div>

        </div>

</form>
<style type="text/css">
    .form-group {
        margin-bottom: 2px;
    }
</style>
</div>