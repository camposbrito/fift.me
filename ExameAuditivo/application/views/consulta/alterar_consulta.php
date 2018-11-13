<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <div class="col-md-7 col-sm-7" ><h3>Alterar Consulta</h3></div> 
</div>


<div class="row  col-md-12  ">
    <div class=" col-md-9 col-sm-9 col-md-offset-0 col-sm-offset-0 ">
        <form class="form-horizontal"  action="<?= base_url('index.php/Consulta/salvar/') ?>" method="post">

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4  text-left control-label" for="Paciente2">Paciente</label>  
                <div class="col-md-2 col-md-offset-0  col-sm-offset-0">
                    <input id="Chave" name="Chave" type="hidden" placeholder="" class="form-control  input-sm " required="" value="<?= $consulta[0]->Cod ?>">
                    <input id="Paciente" name="Paciente" type="hidden" placeholder="" class="form-control  input-sm " required="" value="<?= $consulta[0]->Paciente ?>" >
                    <input type="hidden"     id="Paciente2" name="Paciente2" class="form-control  input-sm " required="" value="<?= $consulta[0]->Paciente ?>" disabled="">
                </div>
                <div class="col-md-7  col-md-offset-0">

                    <input id="PacienteNome" name="PacienteNome" type="text" placeholder="" class="form-control  input-sm " required="" value="<?= $consulta[0]->PacienteNome ?>" disabled="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="profissional1">Profissional</label>
                <div class="col-md-7">
                    <select id="profissional1" name="profissional1" class="form-control" required="" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?> >
                        <option ></option>
                        <?php
                        foreach ($terceiros as $tec) {
                            ?>
                            <option <?= $tec->Cod == $consulta[0]->Terceiro ? 'selected' : ''; ?> value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
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
                    <select id="profissional2" name="profissional2" class="form-control" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                        <option ></option>
                        <?php
                        foreach ($terceiros as $tec) {
                            ?>
                            <option <?= $tec->Cod == $consulta[0]->Terceiro1 ? 'selected' : ''; ?>  value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
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
                    <select id="tipoexame" name="tipoexame" class="form-control"   <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                        <option ></option>
                        <?php
                        foreach ($tiposexame as $tec) {
                            ?>

                            <option  <?= $tec->Cod == $consulta[0]->TipoExame ? 'selected' : ''; ?> value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
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
                    <select id="classificacao" name="classificacao" class="form-control" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                        <option ></option>
                        <?php
                        foreach ($classificacoes as $tec) {
                            ?>
                            <option  <?= $tec->Cod == $consulta[0]->Classificacao ? 'selected' : ''; ?> value="<?= $tec->Cod; ?>"><?= $tec->Descricao; ?></option>
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
                        <input id="RRA" name="RRA" type="text" placeholder="" class="form-control  input-sm "   value="<?= $consulta[0]->RRA ?>" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                    </div>
                    <div class="col-md-4">
                        <span class="help-block"> h. (sic)</span>  
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="dataConsulta">Data Consulta</label>  
                <div class="col-md-2">
                    <input id="dataConsulta" name="dataConsulta" type="text" placeholder="Informe a Data da Consulta" class="form-control  input-sm fa fa-calendar" required="" value="<?= dataBR($consulta[0]->Data); ?>">
                </div>
            </div>
            <!-- Select Multiple -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tecnicasutilizadas">Técnicas Utilizadas</label>
                <div class="col-md-7">
                    <select  style="height: 150px;" id="tecnicasutilizadas" name="tecnicasutilizadas[]" class="form-control" multiple="multiple" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S' ) ? ' disabled ' : '' ?> >
                        <?php
                        $virg = '';
                        $tecnicas = '';
//                        var_dump($tecnicasutilizadas_has_consulta);
                        foreach ($tecnicasutilizadas_has_consulta as $tecs) {
                            $tecnicas .= $virg . $tecs->TecnicasUtilizadas_Cod;
                            $virg = ',';
                        }
                        var_dump($tecnicas);
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
                <div class="col-md-3">
                    <label class="checkbox-inline" for="invalido">
                        <input type="checkbox" value='S' name="invalido" id="invalido"  <?= 'S' == $consulta[0]->Invalido ? 'checked' : ''; ?> value="S" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                        Inválido
                    </label>
                    <label class="checkbox-inline" for="fechamento">
                        <input type="checkbox" value='S'  name="fechamento" id="fechamento" <?= 'S' == $consulta[0]->Fechamento ? 'checked' : ''; ?> value="S" <?= ($consulta[0]->Invalido == 'S' || $consulta[0]->Fechamento == 'S') ? ' disabled ' : '' ?>>
                        Fechado
                    </label>
                </div>
                <div  id="Consultas" class="form-group col-md-5  ">
                    <label class="col-md-0 control-label" for="buttonEnviar"></label>
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-sm btn btn-success" value="Salvar"  id="salvar" />
                        <a  href="<?= base_url('index.php/Consulta/' . $consulta[0]->Paciente) ?>"   class="btn btn-sm btn btn-danger">Voltar</a>                        
                        <a name="ImprimirConsulta" class="dropdown-toggle dropdown btn btn-sm btn-warning btn-group" data-consulta="<?=md5($consulta[0]->Cod); ?>" data-toggle="modal" data-target="#myModalConsulta" href="#" >Imprimir</a>   
                        
                        </li>  

                    </div>  

                </div>
            </div>

            <!-- Button (Double) -->

        </form>


    </div>

    <div class=" col-md-2  col-sm-3  ">
        <!-- Button -->        
        <a href="<?= base_url('index.php/Parecer/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Parecer</a>
        <a href="<?= base_url('index.php/Meatoscopia/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn  btn-default col-md-12 form-control" >Meatoscopia</a>
        <a href="<?= base_url('index.php/Audiometrico/' . $consulta[0]->Cod . '/') ?>" class="btn btn-sm btn btn-default col-md-12 form-control" >Audiométrico</a>        
        <a href="<?= base_url('index.php/Ldf_lrf/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >LDF - LRF</a>
        <a href="<?= base_url('index.php/Irf/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >IRF</a>
        <a href="<?= base_url('index.php/Mascaramento/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Mascaramento</a>
        <a href="<?= base_url('index.php/Weber/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn  btn-default col-md-12 form-control" >Weber</a>
        <a href="<?= base_url('index.php/Timpanometria/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Timpanometria</a>
        <a href="<?= base_url('index.php/Impedanciometria/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn  btn-default col-md-12 form-control" >Impedanciometria</a>
        <a href="<?= base_url('index.php/ReflexoEstapediano/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn  btn-default col-md-12 form-control" >Reflexo Estapediano</a>
        <a href="<?= base_url('index.php/AudiometriaCampoLivre/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Audiometria Campo Livre</a>
        <a href="<?= base_url('index.php/Audiometria_aasi/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >ACL com Dispositivo Acústico</a>
        <? if (($this->session->userdata['Empresa_Usuario'][0]->Descricao == 'CPAA') || ($this->session->userdata['adm'] == true)) { ?>
            <a href="<?= base_url('index.php/InstrumentoSonsAmbientais/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Instr. e Sons Ambientais</a>
        <? } ?>
        <a href="<?= base_url('index.php/FuncaoTubaria/' . $consulta[0]->Cod . '/') ?> " class="btn btn-sm btn btn-default col-md-12 form-control" >Função Tubária</a>

    </div>
</div>

<script type="text/javascript">

    var tecnicasArray = [<?= $tecnicas; ?>];

    $('#tecnicasutilizadas').val(tecnicasArray)
</script>



<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModalConsulta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Impressão de Relatórios</h4>
            </div>
            <div id="Imprime" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>        
            </div>
        </div>
    </div>
</div>  
 