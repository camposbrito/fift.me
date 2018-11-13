<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4>Função Tubária</h4>
</div>
<form class="form-horizontal" action="<?= base_url('index.php/FuncaoTubaria/salvar/') ?>" method="post">
    <div class="form-group col-md-6 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" value="<?= $funcaotubariaoe[0]->Cod ?>" name="codFuncaotubariaOE" >
    <input type="hidden" value="<?= $funcaotubariaod[0]->Cod ?>" name="codFuncaotubariaOD" >
    <input type="hidden" value="<?= $consulta[0]->Cod ?>" name="Consulta">

    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <fieldset class="fieldset-rodrigo">

                    <!-- Form Name -->
                    <legend class="legend-rodrigo">+200 O.D</legend> 

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">1ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl1_oe" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaoe[0]->degl1; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">2ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl2_oe" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaoe[0]->degl2; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">3ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl3_oe" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaoe[0]->degl3; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">4ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl4_oe" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaoe[0]->degl4; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">5ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl5_oe" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaoe[0]->degl5; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">6ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl6_oe" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaoe[0]->degl6; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">7ª degl </label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl7_oe" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaoe[0]->degl7; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">8ª degl </label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl8_oe" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaoe[0]->degl8; ?>">

                        </div>
                    </div>


                </fieldset>   
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <fieldset class="  fieldset-rodrigo">

                    <!-- Form Name -->
                    <legend class="legend-rodrigo">+200 O.E</legend> 

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">1ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl1_od" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaod[0]->degl1; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">2ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl2_od" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaod[0]->degl2; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">3ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl3_od" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaod[0]->degl3; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">4ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl4_od" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaod[0]->degl4; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">5ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl5_od" type="text" placeholder="" class="form-control  input-sm "  value="<?= $funcaotubariaod[0]->degl5; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">6ª degl</label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl6_od" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaod[0]->degl6; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">7ª degl </label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl7_od" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaod[0]->degl7; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">8ª degl </label>  
                        <div class="col-md-4">
                            <input id="textinput" name="degl8_od" type="text" placeholder="" class="form-control  input-sm " value="<?= $funcaotubariaod[0]->degl8; ?>">

                        </div>
                    </div>


                </fieldset>
            </div>
        </div>

    </div>   


    
</form>
