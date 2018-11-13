<div style="padding-top: 0; padding-bottom: 0" class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h3 style="padding-top: 0; padding-bottom: 0">Consultas do Paciente:<b> <?= $paciente[0]->Descricao; ?></b> </h3>    
</div>
<!--<div class="row">;-->


<!--</div>-->
<div class=" col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <table id="Consultas" class="table  col-md-12 ">
        <tr>            
            <th>Cód.</th>
            <th>Data Consulta</th> 
            <th>Profissional</th>
            <th>Fechada</th>
            <th>Inválida</th>
            <th class="text-right col-sm-3">
                <a href="<?= base_url('index.php/Paciente/') ?>" class="btn btn-sm btn-danger text-right btn-group">Voltar</a>
                <a href="<?= base_url('index.php/Consulta/cadastro/' . $paciente[0]->Cod) ?>" class="btn btn-sm btn-primary  text-right btn-group">Cadastrar</a>
            </th>            
        </tr> 
        <?php
        $datestring = '%d/%m/%Y %h:%i';
        foreach ($consultas as $paci) {
            ?>
            <tr>
                <td><?= $paci->Cod; ?></td>
                <td><?= dataBR($paci->Data); ?></td>           
                <td><?= $paci->Profissional1 ?> <?= $paci->Profissional2 == '' ? '' : ' / ' ?> <?= $paci->Profissional2 ?> </td>
                <td><?= $paci->Fechamento == 'S' ? 'SIM' : 'NÃO'; ?></td>
                <td><?= $paci->Invalido == 'S' ? 'SIM' : 'NÃO'; ?></td>
                <td class="text-right">
                    <a name="ImprimirConsulta" class="dropdown-toggle dropdown btn btn-sm btn-warning btn-group" data-consulta="<?=md5($paci->Cod); ?>" data-toggle="modal" data-target="#myModalConsulta" href="#" >Imprimir</a>   
                    <a href="<?= base_url('index.php/Consulta/alterar/' . $paci->Cod) ?>" class="btn btn-sm btn-primary btn-group" >Visualizar</a> 
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

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
