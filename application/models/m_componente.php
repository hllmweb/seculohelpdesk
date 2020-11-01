<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_componente extends CI_Model {

    public $table;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "BD_APLICACAO.GMAN_ITEM_COMPONENTE";
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
    	$this->db->select("E.DESCRICAO AS ESPACO, EL.IDESPACOLOCAL, EL.LOCAL, GI.DESCRICAO AS NOMEGRUPO, CAT.IDCATEGORIA, CAT.DESCRICAO AS CATEGORIA, I.IDPATRIMONIO, I.IDFABRICANTE, CI.IDITEMCOMPONENTE, I.IDITEM, I.DESCRICAO AS ITEM , CI.DESCRICAO AS COMPONENTE, CI.ID, CI.CH, CI.URL, CI.OBSERVACAO, CI.IDFABRICANTE AS IDFABRICANTE_COMP");
    	$this->db->from("BD_APLICACAO.GMAN_ESPACO E");
        $this->db->join("BD_APLICACAO.GMAN_ESPACO_LOCAL EL","EL.IDESPACO=E.IDESPACO",'left');
        $this->db->join("BD_APLICACAO.GMAN_ITEM I","I.IDESPACOLOCAL=EL.IDESPACOLOCAL",'left');
        $this->db->join("BD_APLICACAO.GMAN_ITEM_GRUPO GI","GI.IDITEMGRUPO = I.IDITEMGRUPO",'left');
        $this->db->join("BD_APLICACAO.GMAN_ITEM_CATEGORIA CAT","CAT.IDCATEGORIA = I.IDCATEGORIA",'left');
        $this->db->join("BD_APLICACAO.GMAN_ITEM_COMPONENTE CI","CI.IDITEM=I.IDITEM",'left');
        $this->db->where("E.IDEMPRESA",1);
    	$this->db->where("E.IDESPACO", $p['p_idespaco']);
        $this->db->where("EL.IDESPACOLOCAL", $p['p_idespacolocal']);
        $this->db->order_by("CAT.DESCRICAO", "ASC");
    	$query = $this->db->get();

    	return $query->result_array(); 
    }

    #INSERE COMPONENTE
    function set($p){  
        $data = array(
            'IDITEM'            => $p['p_id_item'],
            'DESCRICAO'         => $p['p_descricao'],
            'IDFABRICANTE'      => $p['p_id_fabricante'],
            'ID'                => $p['p_id_acesso'],
            'CH'                => $p['p_ch'],
            'URL'               => $p['p_url'],
            'URL2'              => null,
            'ATIVO'             => $p['p_ativo'],
            'IMGPRINCIPAL'      => $p['p_img_principal'],
            'IDEXTERNO1'        => null,
            'IDEXTERNO2'        => null,
            'OBSERVACAO'        => $p['p_observacao'],
            'IDESPACOLOCAL'     => $p['p_id_espaco_local'],
            'IDITEMSTATUS'      => $p['p_id_item_status']            
        );
        
        $this->db->insert($this->table, $data);
        $this->db->close();
    }

    #DELETA COMPONENTE
    function del($p){
        $this->db->where("IDESPACOLOCAL", $p['p_idespaco']);
        $this->db->delete($this->table);
    }





}