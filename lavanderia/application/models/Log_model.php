<?php

class Log_model extends Generic_Model {
    
    
    
    function __construct() {
        parent::__construct();
        $this->tabela = 'LogOperacao';
        $this->cds = 'LogOperacao';
        $this->load->helper('common_helper');
        //  private function _get_datatables_query()        
        $this->table = 'LogOperacao';    
        $this->column_order = array(null, 'Data','Mensagem','IP','Browser','Usuario'); //set column field database for datatable orderable
        $this->column_search = array( 'Mensagem','Usuario'); //set column field database for datatable searchable
        $this->order = array('Data' => 'desc'); // default order
    }
    
    // function get_cd_list() {
    //     $this->output->enable_profiler(false);
    //     /* Array of table columns which should be read and sent back to DataTables. Use a space where
    //     * you want to insert a non-database field (for example a counter or static image)
    //     */
    //     $aColumns = array(
    //     'Data',
    //     'Mensagem',
    //     'IP',
    //     'Usuario',    
    //     'browser',
    //     'Cod'
    //     );
        
    //     /* Indexed column (used for fast and accurate table cardinality) */
    //     $sIndexColumn = "cod";
        
    //     /* Total data set length */
    //     $sQuery = "SELECT COUNT('" . $sIndexColumn . "') AS row_count FROM $this->cds";
    //     $rResultTotal = $this->db->query($sQuery);
    //     $aResultTotal = $rResultTotal->row();
    //     $iTotal = $aResultTotal->row_count;
        
    //     /*
    //     * Paging
    //     */
    //     $sLimit = "";
    //     $iDisplayStart = $this->input->get_post('start', true);
    //     $iDisplayLength = $this->input->get_post('length', true);
    //     if (isset($iDisplayStart) && $iDisplayLength != '-1') {
    //         $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
    //         intval($iDisplayLength);
    //     }
        
    //     $uri_string = $_SERVER['QUERY_STRING'];
    //     $uri_string = preg_replace("/%5B/", '[', $uri_string);
    //     $uri_string = preg_replace("/%5D/", ']', $uri_string);
        
    //     $get_param_array = explode("&", $uri_string);
    //     $arr = array();
    //     //        foreach ($get_param_array as $value) {
    //     //            $v = $value;
    //     //            $explode = explode("=", $v);
    //     //            $arr[$explode[0]] = $explode[1];
    //     //        }
        
    //     //        $index_of_columns = strpos($uri_string, "columns", 1);
    //     //        $index_of_start = strpos($uri_string, "start");
    //     //        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
    //     //        $columns_array = explode("&", $uri_columns);
    //     //        $arr_columns = array();
    //     //        foreach ($columns_array as $value) {
    //     //            $v = $value;
    //     //            $explode = explode("=", $v);
    //     //            if (count($explode) == 2) {
    //     //                $arr_columns[$explode[0]] = $explode[1];
    //     //            } else {
    //     //                $arr_columns[$explode[0]] = '';
    //     //            }
    //     //        }
        
    //     /*
    //     * Ordering
    //     */
    //     //        $sOrder = "ORDER BY ";
    //     //        $sOrderIndex = $arr['order[0][column]'];
    //     //        $sOrderDir = $arr['order[0][dir]'];
    //     //        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
    //     //        if ($bSortable_ == "true") {
    //     //            $sOrder .= $aColumns[$sOrderIndex] .
    //     //                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
    //     //        }
        
    //     /*
    //     * Filtering
    //     */
    //     //        $sWhere = "";
    //     //        $sSearchVal = $arr['search[value]'];
    //     //        if (isset($sSearchVal) && $sSearchVal != '') {
    //     //            $sWhere = "WHERE (";
    //     //            for ($i = 0; $i < count($aColumns); $i++) {
    //     //                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
    //     //            }
    //     //            $sWhere = substr_replace($sWhere, "", -3);
    //     //            $sWhere .= ')';
    //     //        }
        
    //     /* Individual column filtering */
    //     //        $sSearchReg = $arr['search[regex]'];
    //     //        for ($i = 0; $i < count($aColumns); $i++) {
    //     //            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
    //     //            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
    //     //                $search_val = $arr['columns[' . $i . '][search][value]'];
    //     //                if ($sWhere == "") {
    //     //                    $sWhere = "WHERE ";
    //     //                } else {
    //     //                    $sWhere .= " AND ";
    //     //                }
    //     //                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
    //     //            }
    //     //        }
        
        
    //     /*
    //     * SQL queries
    //     * Get data to display
    //     */
    //     $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
    //     FROM $this->cds order by Cod asc";
    //     /*$sWhere
    //     $sOrder
    //     $sLimit
    //     ";*/
    //     $rResult = $this->db->query($sQuery);
        
    //     /* Data set length after filtering */
    //     $sQuery = "SELECT FOUND_ROWS() AS length_count";
    //     $rResultFilterTotal = $this->db->query($sQuery);
    //     $aResultFilterTotal = $rResultFilterTotal->row();
    //     $iFilteredTotal = $aResultFilterTotal->length_count;
        
    //     /*
    //     * Output
    //     */
    //     $sEcho = $this->input->get_post('draw', true);
    //     $output = array(
    //     "draw" => intval($sEcho),
    //     "recordsTotal" => $iTotal,
    //     "recordsFiltered" => $iFilteredTotal,
    //     "data" => array()
    //     );
        
    //     foreach ($rResult->result_array() as $aRow) {
    //         $row = array();
    //         foreach ($aColumns as $col) {
    //             $row[] = $aRow[$col];
    //         }
    //         $output['data'][] = $row;
    //     }
        
    //     return $output;
    // }
    
    public function save($Mensagem) {          
        $data['Data'] = date("Y-m-d H:i:s");
        $data['IP'] = $this->input->ip_address();
        $data['browser'] = $this->agent->browser();
        if ($this->session->userdata('login') <> ''){
                $data['Usuario'] = $this->session->userdata('login');
        }
        $data['Mensagem'] = $Mensagem;
        $this->db->insert($this->tabela, $data);
    }
    
    public function index() {
        $this->output->enable_profiler(false);
        return $this->db
        ->order_by('data', 'desc')
        ->get($this->tabela . ' l')
        ->result();
    }
    
    
    
 
    
    private function _get_datatables_query()
    {
        
        //add custom filter here
        if($this->input->post('country'))
        {
            $this->db->where('country', $this->input->post('country'));
        }
        if($this->input->post('FirstName'))
        {
            $this->db->like('FirstName', $this->input->post('FirstName'));
        }
        if($this->input->post('LastName'))
        {
            $this->db->like('LastName', $this->input->post('LastName'));
        }
        if($this->input->post('address'))
        {
            $this->db->like('address', $this->input->post('address'));
        }
        
        $this->db->from($this->table);
        $i = 0;
        
        foreach ($this->column_search as $item) // loop column
        {
            if((isset($_POST['search'])) && ($_POST['search']['value'])) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                
                if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            }
            $i++;
        }
        // _debug($_POST['order']); 
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    public function get_datatables()
    {
        $this->output->enable_profiler(false);
        $this->_get_datatables_query();
        if((isset($_POST['length'])) && ($_POST['length'] != -1))
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function get_list_countries()
    {
        $this->db->select('country');
        $this->db->from($this->table);
        $this->db->order_by('country','asc');
        $query = $this->db->get();
        $result = $query->result();
        
        $countries = array();
        foreach ($result as $row)
        {
            $countries[] = $row->country;
        }
        return $countries;
    }
    
    
}