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

