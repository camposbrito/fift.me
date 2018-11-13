<?php

class Funcaotubaria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['0degl'] = valueOfInteger($this->input->post('degl0_oe'));
        $dados['1degl'] = valueOfInteger($this->input->post('degl1_oe'));
        $dados['2degl'] = valueOfInteger($this->input->post('degl2_oe'));
        $dados['3degl'] = valueOfInteger($this->input->post('degl3_oe'));
        $dados['4degl'] = valueOfInteger($this->input->post('degl4_oe'));
        $dados['5degl'] = valueOfInteger($this->input->post('degl5_oe'));
        $dados['6degl'] = valueOfInteger($this->input->post('degl6_oe'));
        $dados['7degl'] = valueOfInteger($this->input->post('degl7_oe'));
        $dados['8degl'] = valueOfInteger($this->input->post('degl8_oe'));
        if ($this->input->post('codFuncaotubariaOE') <= 0) {
            $this->db->insert('funcaotubariaoe', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codFuncaotubariaOE'));
            $this->db->update('funcaotubariaoe', $dados);
        }
        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['0degl'] = valueOfInteger($this->input->post('degl0_od'));
        $dados['1degl'] = valueOfInteger($this->input->post('degl1_od'));
        $dados['2degl'] = valueOfInteger($this->input->post('degl2_od'));
        $dados['3degl'] = valueOfInteger($this->input->post('degl3_od'));
        $dados['4degl'] = valueOfInteger($this->input->post('degl4_od'));
        $dados['5degl'] = valueOfInteger($this->input->post('degl5_od'));
        $dados['6degl'] = valueOfInteger($this->input->post('degl6_od'));
        $dados['7degl'] = valueOfInteger($this->input->post('degl7_od'));
        $dados['8degl'] = valueOfInteger($this->input->post('degl8_od'));

        if ($this->input->post('codFuncaotubariaOD') <= 0) {
            $this->db->insert('funcaotubariaod', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codFuncaotubariaOD'));
            $this->db->update('funcaotubariaod', $dados);
        }

//        var_dump($this->input->post());
        $this->output->enable_profiler(false);
    }

}
