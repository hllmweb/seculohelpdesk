<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_localizacao extends CI_Model {

    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ESPACO_LOCAL";
    }

    #LISTA LOCALIZACAO
    function get(){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    #LISTA ID LOCALIZACAO GET
    function get_ID($p){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$this->db->where('IDESPACO', $p['p_idespaco']);
    	$query = $this->db->get();

    	return $query->result_array(); 
    }

    function get_ID_Filter($p){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$this->db->where('IDESPACOLOCAL', $p['p_idespacolocal']);
    	$query = $this->db->get();

    	return $query->result_array(); 
    }

    #INSERE LOCALIZACAO
    function set($p){  
    	$data = array(
            'IDESPACO'          => $p['p_id_espaco'],
            'LOCAL'             => $p['p_local'],
            'OBSERVACAO'        => $p['p_observacao'],
            'ATIVO'             => $p['p_ativo'],
            'IDEXTERNO1'        => null,
            'IDEXTERNO2'        => null  
        );
        
        $this->db->insert($this->table, $data);
        $this->db->close();
    }

    #DELETA ESPAÇO
    function del($p){
        $this->db->where("IDESPACO", $p['p_idespaco']);
        $this->db->delete($this->table);
    }





}