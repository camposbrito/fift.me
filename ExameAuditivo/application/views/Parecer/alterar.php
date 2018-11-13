<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <h4><?= $titulo ?></h4>
</div>


<form class="form-horizontal" action="<?= $action ?>" method="post">
    <!-- Button (Double) -->
    <div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />                     
            <button type="reset" id="buttonCancel" name="buttonCancel" class="btn btn-sm btn-info">Reverter</button>
            <a  href="<?= $actBack . "/" . $obj[0]->CodConsulta; ?>"   class="btn btn-sm btn-danger">Voltar</a>

        </div>
    </div>
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <fieldset>
            <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $obj[0]->Cod; ?>">
            <input id="Consulta" name="Consulta" type="hidden"   class="form-control  input-sm " required value="<?= $obj[0]->CodConsulta; ?>">

            <div class="form-group">
                <label class="col-md-4 control-label" for="Timpanogramas_OD">Timpanograma O.D.</label>
                <div class="col-md-6">
                    <select id="Timpanogramas_OD" name="Timpanogramas_OD" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($timpanograma as $mea) {
                            ?>
                            <option <?= $obj[0]->Timpanogramas_OD == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="Timpanogramas_OE">Timpanograma O.E.</label>
                <div class="col-md-6">
                    <select id="Timpanogramas_OE" name="Timpanogramas_OE" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($timpanograma as $mea) {
                            ?>
                            <option <?= $obj[0]->Timpanogramas_OE == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="MeatoscopiaOD">Meatoscopia O.D.</label>
                <div class="col-md-6">
                    <select id="Meatoscopia_OD" name="MeatoscopiaOD" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($meatoscopia as $mea) {
                            ?>
                            <option <?= $obj[0]->MeatoscopiaOD == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="MeatoscopiaOE">Meatoscopia O.E.</label>
                <div class="col-md-6">
                    <select id="MeatoscopiaOE" name="MeatoscopiaOE" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($meatoscopia as $mea) {
                            ?>
                            <option <?= $obj[0]->MeatoscopiaOE == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="ComplacenciaOD">Complacência O.D.</label>
                <div class="col-md-6">
                    <select id="ComplacenciaOD" name="ComplacenciaOD" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($complacencia as $mea) {
                            ?>
                            <option <?= $obj[0]->ComplacenciaOD == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="ComplacenciaOE">Complacência O.E.</label>
                <div class="col-md-6">
                    <select id="ComplacenciaOE" name="ComplacenciaOE" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($complacencia as $mea) {
                            ?>
                            <option <?= $obj[0]->ComplacenciaOE == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="MonitoramentoAudiologico">Monitoramento Audiológico</label>
                <div class="col-md-6">
                    <select id="MonitoramentoAudiologico" name="MonitoramentoAudiologico" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($monitoramento as $mea) {
                            ?>
                            <option <?= $obj[0]->MonitoramentoAudiologico == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label id="teste" class="col-md-4 control-label text-left" for="Descricao">Parecer</label>  
                <div class="col-md-6">
                    <textarea rows="5"  id="Descricao" name="Descricao" type="text"   class="form-control input-sm  autofocus"  ><?= $obj[0]->Descricao; ?></textarea>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label id="teste"  class="col-md-4 control-label text-left" for="ReflexosEstapedianos">Reflexo Estapedianos</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="ReflexosEstapedianos" name="ReflexosEstapedianos" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->ReflexosEstapedianos; ?></textarea>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label id="teste"  class="col-md-4 control-label text-left" for="DadosAnamnese">Dados Anamnese</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="DadosAnamnese" name="DadosAnamnese" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->DadosAnamnese; ?></textarea>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="ProteseOD">Dispositivo O.D.</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="ProteseOD" name="ProteseOD" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->ProteseOD; ?></textarea>

                </div> 
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="ProteseOE">Dispositivo O.E.</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="ProteseOE" name="ProteseOE" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->ProteseOE; ?></textarea>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="ObservacaoCampolivre">Observação Campo Livre</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="ObservacaoCampolivre" name="ObservacaoCampolivre" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->ObservacaoCampolivre; ?></textarea>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="ObsProtese">Observação Dispositivo</label>  
                <div class="col-md-6">
                    <textarea rows="5" id="ObsProtese" name="ObsProtese" type="text" class="form-control input-sm  autofocus"  ><?= $obj[0]->ObsProtese; ?></textarea>

                </div>
            </div>




        </fieldset>
</form>
</div>
