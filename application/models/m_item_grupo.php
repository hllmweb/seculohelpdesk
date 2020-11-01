<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_item_grupo extends CI_Model {
    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ITEM_GRUPO";
    }

    #LISTA GRUPO ITEM
    function get(){
    	$this->db->select("*");
        $this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    function get_ID_Filter($p){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('IDITEMGRUPO', $p['p_id_item_grupo']);
        $this->db->where('IDEMPRESA', $p['p_id_empresa']);
        $query = $this->db->get();

        return $query->result_array();
    }


}
?>