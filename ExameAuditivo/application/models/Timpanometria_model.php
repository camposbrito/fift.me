<?php

class Timpanometria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['Orelha'] = 'D';
        $dados['Valor_200_plus'] = valueOfNumeric($this->input->post('Valor_200_plusOD'));
        $dados['Valor_150_plus'] = valueOfNumeric($this->input->post('Valor_150_plusOD'));
        $dados['Valor_100_plus'] = valueOfNumeric($this->input->post('Valor_100_plusOD'));
        $dados['Valor_50_plus'] = valueOfNumeric($this->input->post('Valor_50_plusOD'));
        $dados['Valor_0'] = valueOfNumeric($this->input->post('Valor_0OD'));
        $dados['Valor_25_minus'] = valueOfNumeric($this->input->post('Valor_25_minusOD'));
        $dados['Valor_50_minus'] = valueOfNumeric($this->input->post('Valor_50_minusOD'));
        $dados['Valor_75_minus'] = valueOfNumeric($this->input->post('Valor_75_minusOD'));
        $dados['Valor_100_minus'] = valueOfNumeric($this->input->post('Valor_100_minusOD'));
        $dados['Valor_125_minus'] = valueOfNumeric($this->input->post('Valor_125_minusOD'));
        $dados['Valor_150_minus'] = valueOfNumeric($this->input->post('Valor_150_minusOD'));
        $dados['Valor_175_minus'] = valueOfNumeric($this->input->post('Valor_175_minusOD'));
        $dados['Valor_200_minus'] = valueOfNumeric($this->input->post('Valor_200_minusOD'));
        $dados['Valor_225_minus'] = valueOfNumeric($this->input->post('Valor_225_minusOD'));
        $dados['Valor_250_minus'] = valueOfNumeric($this->input->post('Valor_250_minusOD'));
        $dados['Valor_275_minus'] = valueOfNumeric($this->input->post('Valor_275_minusOD'));
        $dados['Valor_300_minus'] = valueOfNumeric($this->input->post('Valor_300_minusOD'));
        $dados['Valor_325_minus'] = valueOfNumeric($this->input->post('Valor_325_minusOD'));
        $dados['Valor_350_minus'] = valueOfNumeric($this->input->post('Valor_350_minusOD'));
        $dados['Valor_375_minus'] = valueOfNumeric($this->input->post('Valor_375_minusOD'));
        $dados['Valor_400_minus'] = valueOfNumeric($this->input->post('Valor_400_minusOD'));

        if ($this->input->post('codTimpanometriaOD') <= 0) {
            $this->db->insert('timpanometria', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codTimpanometriaOD'));
            $this->db->update('timpanometria', $dados);
        }

        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['Orelha'] = 'E';
        $dados['Valor_200_plus'] = valueOfNumeric($this->input->post('Valor_200_plusOE'));
        $dados['Valor_150_plus'] = valueOfNumeric($this->input->post('Valor_150_plusOE'));
        $dados['Valor_100_plus'] = valueOfNumeric($this->input->post('Valor_100_plusOE'));
        $dados['Valor_50_plus'] = valueOfNumeric($this->input->post('Valor_50_plusOE'));
        $dados['Valor_0'] = valueOfNumeric($this->input->post('Valor_0OE'));
        $dados['Valor_25_minus'] = valueOfNumeric($this->input->post('Valor_25_minusOE'));
        $dados['Valor_50_minus'] = valueOfNumeric($this->input->post('Valor_50_minusOE'));
        $dados['Valor_75_minus'] = valueOfNumeric($this->input->post('Valor_75_minusOE'));
        $dados['Valor_100_minus'] = valueOfNumeric($this->input->post('Valor_100_minusOE'));
        $dados['Valor_125_minus'] = valueOfNumeric($this->input->post('Valor_125_minusOE'));
        $dados['Valor_150_minus'] = valueOfNumeric($this->input->post('Valor_150_minusOE'));
        $dados['Valor_175_minus'] = valueOfNumeric($this->input->post('Valor_175_minusOE'));
        $dados['Valor_200_minus'] = valueOfNumeric($this->input->post('Valor_200_minusOE'));
        $dados['Valor_225_minus'] = valueOfNumeric($this->input->post('Valor_225_minusOE'));
        $dados['Valor_250_minus'] = valueOfNumeric($this->input->post('Valor_250_minusOE'));
        $dados['Valor_275_minus'] = valueOfNumeric($this->input->post('Valor_275_minusOE'));
        $dados['Valor_300_minus'] = valueOfNumeric($this->input->post('Valor_300_minusOE'));
        $dados['Valor_325_minus'] = valueOfNumeric($this->input->post('Valor_325_minusOE'));
        $dados['Valor_350_minus'] = valueOfNumeric($this->input->post('Valor_350_minusOE'));
        $dados['Valor_375_minus'] = valueOfNumeric($this->input->post('Valor_375_minusOE'));
        $dados['Valor_400_minus'] = valueOfNumeric($this->input->post('Valor_400_minusOE'));

        if ($this->input->post('codTimpanometriaOE') <= 0) {
            $this->db->insert('timpanometria', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codTimpanometriaOE'));
            $this->db->update('timpanometria', $dados);
        }
//        var_dump($this->input->post());
        $this->output->enable_profiler(false);
    }

    public function getTimpanometriaOD($Consulta) {
        return $this->db->select('t.cod as codTimpanometriaOD, t.*')->join('timpanometria t', 't.consulta = c.cod AND t.Orelha = "D" ', 'left')->order_by('orelha')->get_where('consulta c', array('c.cod' => $Consulta))->result();
    }

    public function getTimpanometriaOE($Consulta) {
        return $this->db->select('t.cod as codTimpanometriaOE, t.*')->join('timpanometria t', 't.consulta = c.cod AND t.Orelha = "E" ', 'left')->order_by('orelha')->get_where('consulta c', array('c.cod' => $Consulta))->result();
    }

    public function getCompletarImpedanciometriaOD($Cod) {
        $this->output->enable_profiler(false);
        $sql = " SELECT  t.Valor_200_plus as Minimo, 
                        (Select  max(oe.valor) from vTimpanometriaOD oe where oe.Consulta = t.Consulta) as Maximo, 
                        (Select  max(oe.valor) from vTimpanometriaOD oe where oe.Consulta = t.Consulta) - (t.Valor_200_plus)as Resultado,
                        (Select  min(faixa) from vTimpanometriaOD v where v.Consulta = t.Consulta and valor = Maximo) as Pressao, 
                        (Select  count(faixa) from vTimpanometriaOD v where v.Consulta = t.Consulta and valor = Maximo) as Qtde 
                 FROM    timpanometria t 
                 WHERE   t.Consulta = ? 
                 AND     t.Orelha = ? ";

        return $this->db->query($sql, array($this->input->post('Consulta'), 'D'))->result();
    }

    public function getCompletarImpedanciometriaOE($Cod) {
        $this->output->enable_profiler(false);
        $sql = " SELECT  t.Valor_200_plus as Minimo,
                        (Select  max(oe.valor) from vTimpanometriaOE oe where oe.Consulta = t.Consulta) as Maximo, 
                        (Select  max(oe.valor) from vTimpanometriaOE oe where oe.Consulta = t.Consulta) - (t.Valor_200_plus)as Resultado,
                        (Select  min(faixa) from vTimpanometriaOE v where v.Consulta = t.Consulta and valor = Maximo) as Pressao, 
                        (Select  count(faixa) from vTimpanometriaOE v where v.Consulta = t.Consulta and valor = Maximo) as Qtde 
                 FROM    timpanometria t 
                 WHERE   t.Consulta = ? 
                 AND     t.Orelha = ? ";
        return $this->db->query($sql, array($this->input->post('Consulta'), 'E'))->result();
    }

}
