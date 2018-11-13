<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <div class="page-header"><h4>Weber</h4></div>
</div>
<form   action="<?= base_url('index.php/Weber/salvar/') ?>" method="post">
    <div class="form-group col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main ">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" value="<?= $weber[0]->Cod ?>" name="codWeber" >
    <input type="hidden" value="<?= $id ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
        <table class="table-condensed table-bordered  col-md-12 col-sm-12">
            <tr>
                <th></th>
                <th class="text-center"  >500 Hz</th>
                <th class="text-center"  >1000 Hz</th>
                <th class="text-center" >2000 Hz</th>
                <th class="text-center"  >4000 Hz</th>
            </tr>
            <tr>
                <th  class="text-right" style=" margin-right:8px;">                    
                    Orelha Direita
                </th>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_500_OD" <?= $weber[0]->Faixa_500_OD == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_1000_OD"  <?= $weber[0]->Faixa_1000_OD == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_2000_OD" <?= $weber[0]->Faixa_2000_OD == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_4000_OD" <?= $weber[0]->Faixa_4000_OD == 'S' ? 'checked' : ''; ?>>
                </td>   
            </tr>
            <tr>
                <th  class="text-right" style=" margin-right:8px;">                    
                    Orelha Esquerda
                </th>     
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_500_OE" <?= $weber[0]->Faixa_500_OE == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_1000_OE" <?= $weber[0]->Faixa_1000_OE == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_2000_OE" <?= $weber[0]->Faixa_2000_OE == 'S' ? 'checked' : ''; ?>>
                </td>   
                <td  class="text-center">
                    <input type="checkbox" value="S" name="Faixa_4000_OE" <?= $weber[0]->Faixa_4000_OE == 'S' ? 'checked' : ''; ?>>
                </td>     
            </tr>
        </table>     
    </div>

</form>
