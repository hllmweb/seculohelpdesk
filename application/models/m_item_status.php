<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_item_status extends CI_Model {

    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ITEM_STATUS";
    }

    #LISTA STATUS ITEM
    function get(){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    #LISTA O FILTRO
    function get_ID_Filter($p){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('IDITEMSTATUS', $p['p_id_item_status']);
        $query = $this->db->get();

        return $query->result_array();
    }

}
?>