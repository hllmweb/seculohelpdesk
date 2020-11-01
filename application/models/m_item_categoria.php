<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_item_categoria extends CI_Model {

    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ITEM_CATEGORIA";
    }

    #LISTA CATEGORIA ITEM
    function get(){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }


    function get_ID_Filter($p){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('IDCATEGORIA', $p['p_id_categoria']);
        $query = $this->db->get();

        return $query->result_array();
    }


}
?>