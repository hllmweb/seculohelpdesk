<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_espaco extends CI_Model {
    public $table;
    public $schema;
    public $stored;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table    = "BD_APLICACAO.GMAN_ESPACO";
        $this->schema   = "BD_APLICACAO";
        $this->stored   = "SP_GMAN_CONSULTA";
    }

    #ST0RED PROCEDURED
    function sp_gman_consulta($p){
        $cursor = '';
        $dados = array(
            array('name'    =>  ':P_OPERACAO',         'value' => $p['p_operacao']),
            array('name'    =>  ':P_IDEMPRESA',        'value' => $p['p_idempresa']),
            array('name'    =>  ':P_IDLOGIN',          'value' => $p['p_idlogin']),
            array('name'    =>  ':P_VALOR',            'value' => $p['p_valor']),
            array('name'    =>  ':P_CURSOR',           'value' => $cursor, 'type' => OCI_B_CURSOR)
        );
        $query = $this->db->procedure($this->schema,$this->stored, $dados);
        return $query;
    }

    #LISTA ESPAÇO
    function get(){
    	$this->db->select("*");
        $this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    #LISTA ESPAÇO GET
    function get_ID($p){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$this->db->where('IDESPACO', $p['p_idespaco']);
    	$query = $this->db->get();

    	return $query->result_array(); 
    }

    #INSERE ESPAÇO
    function set($p){  
    	$data = array(
            'IDEMPRESA'         => $p['p_id_empresa'],
            'DESCRICAO'         => $p['p_descricao']
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