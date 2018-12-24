<div class="container">
    <div class="row" >
        <div class="col-xs-4 col-sm-4  col-md-4 col-lg-4 col-xl-4 offset-lg-0 text-center"  >
            <div>
                <span>Equipamento</span>
                <div class="card"><span><?= $Parametros->Equipamento->Descricao;?><br></span></div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center" >
            <div>
                <span>Produto</span>
                <div class="card"><span><?= $Parametros->Produto->Descricao;?><br></span></div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center" >
            <div>
                <span>Operação</span>
                <div class="card"><span><?= $Parametros->Operacao->Descricao;?><br></span></div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid d-flex flex-column body-content justify-content-center">
    
    <form name="parametros" id="parametros" action="<?= base_url() ?>parametros/save" method="post"> 
        <button type="button" class="btn btn-primary" id="salvar-parametros" name="salvar-parametros">Salvar alterações</button>
        <button type="reset" class="btn btn-primary">Calcelar Alterações</button>   
        <input type="hidden" name="id" value="<?= $Parametros->id;?>"/> 
        <div class="form-group" style="">
            <div class="row" style="">
                <div class="col-sm-4">
                    <div class="form-group" style="">
                        <label>Equipamento&nbsp;</label>
                        <select name="Equipamento_id" class="form-control">
                            <?php
                                foreach ($Equipamento as $equip) {
                            ?>
                            <option value="<?=$equip->id;?>"><?=$equip->Descricao;?></option> 
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 col-5">
                    <div class="form-group" style="">
                        <label>Produto</label>
                        <select name="Produto_id" class="form-control">
                        <?php
                                foreach ($Produto as $equip) {
                            ?>
                            <option value="<?=$equip->id;?>"><?=$equip->Descricao;?></option> 
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" style="">
                        <label>Operação</label>
                        <select name="Operacao_id" class="form-control">
                        <?php
                                foreach ($Operacao as $equip) {
                            ?>
                            <option value="<?=$equip->id;?>"><?=$equip->Descricao;?></option> 
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="">
            <div class="col-sm-4">
                <div class="form-group" style="">
                    <label>Peçcas por Ciclo</label>
                    <input name="PecasPorCiclo" type="text" class="form-control" value="<?= $Parametros->PecasPorCiclo;?>">
                </div>
            </div>
            <div class="col-sm-4 col-5">
                <div class="form-group" style="">
                    <label>Tempo Ciclo (segundos)</label>
                    <input name="TempoMaximoCiclo" type="text" class="form-control" value="<?= $Parametros->TempoMaximoCiclo;?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group" style="">
                    <label contenteditable="true" spellcheckker="false">Quantidade Prevista&nbsp;</label>
                    <input name="QuantidadePrevistaTurno"  type="text" class="form-control" value="<?= $Parametros->QuantidadePrevistaTurno;?>">
                </div>
            </div>
        </div>        
    </form>
</div>
