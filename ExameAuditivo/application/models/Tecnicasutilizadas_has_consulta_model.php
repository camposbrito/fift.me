<?php

class Tecnicasutilizadas_has_consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function get_consulta_tecnicasutilizadas($consulta) {
        return $this->db->get_where('tecnicasutilizadas_has_consulta', array('Consulta' => $consulta))->result();
    }

    public function get_tecnicasutilizadas() {
        return $this->db->get_where('tecnicasutilizadas', array('Ativo' => 'S'))->result();
    }

    public function salvar_tecnicas($tecnicas, $consulta) {
        if (isset($tecnicas)) {
            if (count($tecnicas) > 0) {
                $virg = '';
                $_tecnicas = '';
                foreach ($tecnicas as $tecs) {
                    $_tecnicas .= $virg . $tecs;
                    $virg = ',';
                }
            }
        }

        $this->db->delete('tecnicasutilizadas_has_consulta', array('Consulta' => $consulta));
        foreach ($tecnicas as $tecs) {
            $dados['TecnicasUtilizadas_Cod'] = $tecs;
            $dados['Consulta'] = $consulta;
            $this->db->insert('tecnicasutilizadas_has_consulta', $dados);
        }
    }

    public function salvar() {
        $this->output->enable_profiler(FALSE);
    }

    

}
