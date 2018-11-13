<?php

class Impedanciometria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        $dados['Equipamento'] = $this->input->post('Equipamento');
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['Meatoscopia_OD'] = $this->input->post('Meatoscopia_OD');
        $dados['Meatoscopia_OE'] = $this->input->post('Meatoscopia_OE');
        $dados['PressaoOMLD'] = valueOfInteger($this->input->post('PressaoOMLD'));
        $dados['PressaoOMLE'] = valueOfInteger($this->input->post('PressaoOMLE'));
        $dados['Mais200LD'] = valueOfNumeric($this->input->post('Mais200LD'));
        $dados['Mais200LE'] = valueOfNumeric($this->input->post('Mais200LE'));


        $dados['ComplacenciaOD_Min'] = valueOfNumeric($this->input->post('ComplacenciaOD_Min'));
        $dados['ComplacenciaOD_Max'] = valueOfNumeric($this->input->post('ComplacenciaOD_Max'));
        if (($dados['ComplacenciaOD_Min'] == '') && ($dados['ComplacenciaOD_Max'] == '')) {
            $dados['ComplacenciaOD_Res'] = NULL;
        } else {
            $dados['ComplacenciaOD_Res'] = valueOfNumeric($this->input->post('ComplacenciaOD_Max')) - valueOfNumeric($this->input->post('ComplacenciaOD_Min'));
        }

        $dados['ComplacenciaOE_Max'] = valueOfNumeric($this->input->post('ComplacenciaOE_Max'));
        $dados['ComplacenciaOE_Min'] = valueOfNumeric($this->input->post('ComplacenciaOE_Min'));
        if (($dados['ComplacenciaOE_Min'] == '') && ($dados['ComplacenciaOE_Max'] == '')) {
            $dados['ComplacenciaOE_Res'] = NULL;
        } else {
            $dados['ComplacenciaOE_Res'] = valueOfNumeric($this->input->post('ComplacenciaOE_Max')) - valueOfNumeric($this->input->post('ComplacenciaOE_Min'));
        }
//        _debug($dados);
        if ($this->input->post('codImpedanciometria') <= 0) {
            $this->db->insert('impedanciometria', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codImpedanciometria'));
            $this->db->update('impedanciometria', $dados);
        }

//        var_dump($this->input->post());
        $this->output->enable_profiler(FALSE);
    }

    public function getImpedanciometria($Consulta) {
        $this->output->enable_profiler(FALSE);
        return $this->db->select('i.*')->join('impedanciometria i ', 'i.Consulta = c.cod', 'left')->get_where('consulta c', array('c.cod' => $Consulta))->result();
    }

}
