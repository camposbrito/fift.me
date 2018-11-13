<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <div class="col-md-7 col-sm-7" ><h3>Cadastrar Consulta</h3></div> 
</div>

<div class="row  col-md-12  ">
    <div class=" col-md-9 col-md-offset-0 ">
        <form class="form-horizontal" action="<?= base_url('index.php/Consulta/salvar/') ?>" method="post">

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Paciente">Paciente</label>  
                <div class="col-md-0 col-md-offset-0">
                    <input id="Chave" name="Chave" type="hidden" placeholder="" class="form-control  input-sm " required="" value="-1">
                    <input id="Paciente" name="Paciente" type="hidden" placeholder="" class="form-control  input-sm " required="" value="<?= $paciente[0]->Cod ?>">
                    <!--<input  type="text" placeholder="" class="form-control  input-sm " required="" value="<?= $paciente[0]->Cod ?>" disabled="">-->
                </div>
                <div class="col-md-7 col-md-offset-0">
                    <input  id="PacienteNome" name="PacienteNome"  type="hidden" placeholder="" class="form-control  input-sm " required="" value="<?= $paciente[0]->Descricao ?>" >
                    <input   type="text" placeholder="" class="form-control  input-sm " required="" value="<?= $paciente[0]->Descricao ?>" disabled="">
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="profissional1">Profissional</label>
                <div class="col-md-7">
                    <select id="profissional1" name="profissional1" class="form-control" required="">
                        <option ></option>
                        <?php
                        foreach ($terceiros as $tec) {
                            ?>
                            <option value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="profissional2">Profissional</label>
                <div class="col-md-7">
                    <select id="profissional2" name="profissional2" class="form-control" >
                        <option ></option>
                        <?php
                        foreach ($terceiros as $tec) {
                            ?>
                            <option value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tipoexame">Tipo Exame</label>
                <div class="col-md-7">
                    <select id="tipoexame" name="tipoexame" class="form-control" required="">
                        <option ></option>
                        <?php
                        foreach ($tiposexame as $tec) {
                            ?>

                            <option value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="classificacao">Classificação</label>
                <div class="col-md-7">
                    <select id="classificacao" name="classificacao" class="form-control">
                        <option ></option>
                        <?php
                        foreach ($classificacoes as $tec) {
                            ?>
                            <option value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="RRA">Relata Repouso Acústico de</label>  
                <div class="col-md-8 col-md-offset-0">
                    <div class="col-md-6  col-md-offset-0" style="padding: 0">
                        <input id="RRA" name="RRA" type="text" placeholder="" class="form-control  input-sm "   >
                    </div>
                    <div class="col-md-4">
                        <span class="help-block"> h. (sic)</span>  
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="dataConsulta">Data Consulta</label>  
                <div class="col-md-2">
                    <input id="dataConsulta" name="dataConsulta" type="text" placeholder="Informe a Data da Consulta" class="form-control  input-sm " required="" value="<?=date("d/m/Y"); ?>">
                </div>
            </div>
            <!-- Select Multiple -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tecnicasutilizadas">Técnicas Utilizadas</label>
                <div class="col-md-7">
                    <select  style="height: 150px;"   id="tecnicasutilizadas" name="tecnicasutilizadas[]"  class="form-control" multiple="multiple">
                        <?php
                        foreach ($tecnicasutilizadas as $tec) {
                            ?>
                            <option value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group col-md-12 ">
                <label class="col-md-4 control-label " for=""></label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="invalido">
                        <input type="checkbox" name="invalido"  id="invalido"  value="S">
                        Inválido
                    </label>
                    <label class="checkbox-inline" for="fechado">
                        <input type="checkbox" name="fechado" id="fechado" value="S">
                        Fechado
                    </label>
                </div>
                <!-- Button (Double) -->
                <div class="form-group col-md-4  ">
                    
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
                        <a  href="<?= base_url('index.php/Consulta/' . $paciente[0]->Cod) ?>"   class="btn btn-sm btn-danger">Voltar</a>
                    </div>  

                </div>
            </div>


        </form>


    </div>
    <div class=" col-md-2 ">
        <!-- Button -->        
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Parecer</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Meatoscopia</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Audiométrico</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">LDF - LRF</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">IRF</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Mascaramento</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Weber</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Timpanometria</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Impedanciometria</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Reflexo Estapediano</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Audiometria Campo Livre</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">ACL com Dispositivo Acústico</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Instr. e Sons Ambientais</button>
        <button id="" name="" class="btn btn-sm btn-default col-md-12 form-control" disabled="">Função Tubária</button>

    </div>
</div>