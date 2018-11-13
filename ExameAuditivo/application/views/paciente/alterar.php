<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h1 class="page-header">Paciente</h1>
</div>

<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <form class="form-horizontal" action="<?= base_url('index.php/Paciente/atualizar/') ?>" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Atualizar</legend>
            <input id="Cod" name="Cod" type="hidden" placeholder="Informe o nome" class="form-control  input-sm " required value="<?= $paciente[0]->Cod; ?>">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="Informe o nome" class="form-control  input-sm " required value="<?= $paciente[0]->Descricao; ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="dataNascimento">Data Nascimento</label>  
                <div class="col-md-4">
                    <input id="dataNascimento" name="dataNascimento" type="text" placeholder="Informe a Data de Nascimento" class="form-control  input-sm " required="" value="<?= dataBR($paciente[0]->DataNascimento); ?>">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="sexo">Sexo</label>
                <div class="col-md-4">
                    <select id="sexo" name="sexo" class="form-control" required  >
                        <option></option>
                        <option value="M" <?= $paciente[0]->Sexo == 'M' ? ' selected' : '' ?>  >Masculino</option>
                        <option value="F" <?= $paciente[0]->Sexo == 'F' ? ' selected' : '' ?> >Feminino</option>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="EstadoCivil">Estado Civil</label>
                <div class="col-md-4">
                    <select id="estadoCivil" name="estadoCivil" class="form-control" required  >
                        <option></option>
                        <option value="S" <?= $paciente[0]->EstadoCivil == 'S' ? ' selected ' : '' ?> >Solteiro(a)</option>
                        <option value="C" <?= $paciente[0]->EstadoCivil == 'C' ? ' selected ' : '' ?> >Casado(a)</option>
                        <option value="D" <?= $paciente[0]->EstadoCivil == 'D' ? ' selected ' : '' ?> >Divorciado(a)</option>
                        <option value="V" <?= $paciente[0]->EstadoCivil == 'V' ? ' selected ' : '' ?> >Viuvo(a)</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="RG">RG</label>  
                <div class="col-md-4">
                    <input id="rg" name="rg" type="text" placeholder="Informe o RG" class="form-control  input-sm "  value="<?= $paciente[0]->RG; ?>"> 

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nacionalidade">Nacionalidade</label>  
                <div class="col-md-4">
                    <input id="nacionalidade" name="nacionalidade" type="text" placeholder="Informe a Nacionalidade" class="form-control  input-sm "  value="<?= $paciente[0]->Nacionalidade; ?>" >

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="funcao">Função</label>  
                <div class="col-md-4">
                    <input id="funcao" name="funcao" type="text" placeholder="Informe a função" class="form-control  input-sm "  value="<?= $paciente[0]->Funcao; ?>" >

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="empresa">Empresa</label>  
                <div class="col-md-4">
                    <input id="empresa" name="empresa" type="text" placeholder="Informe a Empresa" class="form-control  input-sm "  value="<?= $paciente[0]->Empresa; ?>" >

                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="checkboxes"></label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="checkboxes-0">
                        <input type="checkbox" name="ativo" id="ativo" value="S"  "<?= $paciente[0]->Ativo == 'S' ? ' Checked ' : ''; ?>" >
                        Ativo
                    </label>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group ">
                <label class="col-md-4 control-label" for="buttonEnviar"></label>
                <div class="col-md-8 text-right">
                    <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
                    <a  href="<?= base_url('index.php/Paciente/'); ?>"   class="btn btn-sm btn-danger">Voltar</a>
                </div>
            </div>

        </fieldset>
    </form>

</div>
