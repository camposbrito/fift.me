<p><?= @TratarMsg($this->session->flashdata('msg')); ?></p>  
<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h2><?= $titulo; ?></h2>
</div>

<div id="ajax" >   
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <div class=" col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">

            <table class="table col-md-12 ">
                <tr>            
                    <th  class ="col-sm-1">Cód.</th>
                    <th  class ="col-sm-3">Descrição</th>                     
                    <th  class ="col-sm-3">Ativo</th>                     
                    <th  class ="col-sm-3"><a href="<?= $actInsert ?>" class="btn btn-sm btn-primary pull-right">Cadastrar</a> </th>            
                </tr>
                <?php
                foreach ($objs as $obj) {
                    ?>
                    <tr>
                        <td><?= $obj->Cod; ?></td>
                        <td><?= $obj->Descricao; ?></td>
                        <td><?= $obj->Ativo == 'S' ? 'Sim' : 'Não'; ?></td>           
                        <td class="col-md-12 right text-right">                            
                            <a href="<?= base_url($actAlter . $obj->Cod) ?>" class="btn btn-sm btn-primary btn-group">Alterar</a> 
                            <a href="<?= base_url($actDelete . $obj->Cod) ?>" class="btn btn-sm btn-danger btn-group" onclick="return confirm('Deseja remover esse registro?')">Excluir</a> 
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>



    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alteração de senha</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url('index.php/funcionario/atualizar_senha/') ?>" method="post">
                <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $funcionario[0]->Cod; ?>">
                <div class="modal-body">



                    <div class="form-group">
                        <div id="divcheck" class="col-md-5">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-primary" name="enviarsenha" id="enviarsenha" disabled="">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

