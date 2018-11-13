    


<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h1 class="page-header">Funcionários</h1>
</div>

<div class="col-sm-11 col-sm-offset-0 col-md-12 col-md-offset-0 main">

    <table class="table">
        <tr>            
            <th>Cód.</th>
            <th>Nome</th>           
            <th>CRFA
            <th>Login</th>            	
            <th>Empresa</th>
            <th>Administrativo</th>
            <th>Gestor</th>
            <th>Ativo</th>
            <th class ="col-sm-2"><div class="col-md-11 right text-right"><a href="<?= base_url('index.php/Funcionario/Insert/') ?>" class="btn btn-sm btn-primary">Cadastrar</a> </div></th>            
        </tr>
        <?php
        foreach ($funcionarios as $paci) {
            ?>
            <tr>
                <td><?= $paci->Cod; ?></td>
                <td><?= $paci->Descricao; ?></td>
                <td><?= $paci->CRFA; ?></td>                                     
                <td><?= $paci->Login; ?></td>           
                <td><?= $paci->EmpresaDescricao; ?></td>           
                <td><?= $paci->Administrativo == 'S' ? 'Sim' : 'Não'; ?></td>    
                <td><?= $paci->Gestor == 'S' ? 'Sim' : 'Não'; ?></td>    
                <td><?= $paci->Ativo == 'S' ? 'Sim' : 'Não'; ?></td>           
                <td class="col-md-2 right text-right"> 
                    <div class="col-md-11 right text-right">
                        <a href="<?= base_url('index.php/Funcionario/Alter/' . $paci->Cod) ?>" class="btn btn-sm btn-primary btn-group">Alterar</a> 
                        <a href="<?= base_url('index.php/Funcionario/Delete/' . $paci->Cod) ?>" class="btn btn-sm btn-danger btn-group" onclick="return confirm('Deseja remover esse funcionario?')">Excluir</a> 
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>