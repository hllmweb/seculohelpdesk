<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_item extends CI_Model {

    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ITEM";
    }

    #LISTA ITEM
    function get(){
    	$this->db->select("*");
    	$this->db->from($this->table);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    #LISTA ID ITEM GET
    function get_ID($p){
    	$this->db->select("*");
    	$this->db->from($this->table);
        $this->db->where('IDESPACOLOCAL', $p['p_idespacolocal']);
        $this->db->or_where('IDITEM', $p['p_id_item']);
    	$query = $this->db->get();

    	return $query->result_array(); 
    }

    #LISTA ID ITEM GET FILTER
    function get_ID_Filter($p){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->or_where('IDITEM', $p['p_id_item']);
        $query = $this->db->get();

        return $query->result_array();
    }

    #INSERE ITEM
    function set($p){  
    	$data = array(
            'IDITEMGRUPO'         => $p['p_id_item_grupo'],
            'IDEMPRESA'           => $p['p_id_empresa'],
            'IDCATEGORIA'         => $p['p_id_item_categoria'],
            'DESCRICAO'           => $p['p_descricao'],
            'IDFABRICANTE'        => $p['p_id_fabricante'],  
            'DTFABRICACAO'        => $p['p_dt_fabricacao'],
            'IDPATRIMONIO'        => $p['p_id_patrimonio'],
            'TIPOITEM'            => $p['p_tipo_item'],
            'DTCOMPRA'            => $p['p_dt_compra'],
            'VALORCOMPRA'         => $p['p_valor_compra'],
            'NOTAFISCAL'          => $p['p_nota_fiscal'],
            'DTFIMGARANTIA'       => $p['p_dt_fim_garantia'],
            'OBSERVACAO'          => $p['p_observacao'],
            'IMGPRINCIPAL'        => $p['p_img_principal'],
            'ATIVO'               => $p['p_ativo'],
            'DTDESATIVADO'        => $p['p_dt_desativado'],
            'IDESPACOLOCAL'       => $p['p_id_espaco_local'],
            'IDITEMSTATUS'        => $p['p_id_item_status'],
            'IDESPACOLOCAL_ANT'   => $p['p_id_espaco_local_ant']
        );
        
        $this->db->insert($this->table, $data);
        $this->db->close();
    }

    #DELETA ITEM
    function del($p){
        $this->db->where("IDESPACOLOCAL", $p['p_idespaco']);
        $this->db->delete($this->table);
    }





}