<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formulario extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //helpers e libs
        $this->load->helper(array('form', 'url', 'html', 'directory'));
        $this->load->library(array('session','form_validation'));
   
        //models
        $this->load->model('m_item_grupo'       ,   'item_grupo'        , true);
        $this->load->model('m_item_categoria'   ,   'item_categoria'    , true);
        $this->load->model('m_item_status'      ,   'item_status'       , true);
        $this->load->model('m_localizacao'      ,   'localizacao'       , true);
        $this->load->model('m_item'             ,   'item'              , true);
    }
    
    // lista de itens do espaço
    function index() {       
        //aqui vai ficar a verificação do usuário logado capturado o id do usuário logado
        // $param = array(
        //     'p_operacao'    => 'LE',
        //     'p_idempresa'   => 1,
        //     'p_idlogin'     => 2,
        //     'p_valor'       => null
        // );
        // $lista_espaco = $this->espaco->sp_gman_consulta($param);

        $lista_item_grupo       = $this->item_grupo->get();
        $lista_item_categoria   = $this->item_categoria->get();
        $lista_item_status      = $this->item_status->get();
        $lista_localizacao      = $this->localizacao->get();

        $data = array(
            'lista_item_grupo'      => $lista_item_grupo,
            'lista_item_categoria'  => $lista_item_categoria,
            'lista_item_status'     => $lista_item_status,
            'lista_localizacao'     => $lista_localizacao
        );

        $this->load->view('item/adicionar', $data);
    }
    
    //adicionar itens do espaço
    function adicionar(){
        $p_id_item_grupo        = $this->input->get_post('p_id_item_grupo');
        $p_id_item_categoria    = $this->input->get_post('p_id_item_categoria');
        $p_id_item_status       = $this->input->get_post('p_id_item_status');
        $p_id_espaco_local      = $this->input->get_post('p_id_espaco_local');
        $p_tipo_item            = $this->input->get_post('p_tipo_item');
        $p_descricao            = $this->input->get_post('p_descricao');
        
        $param = array(
            'p_id_item_grupo'       =>  $p_id_item_grupo,
            'p_id_empresa'          => 1,
            'p_id_item_categoria'   =>  $p_id_item_categoria,
            'p_descricao'           =>  $p_descricao,
            'p_id_fabricante'       => null,
            'p_dt_fabricacao'       => null,
            'p_id_patrimonio'       => null,
            'p_tipo_item'           =>  $p_tipo_item, 
            'p_dt_compra'           =>  null,
            'p_valor_compra'        =>  null,
            'p_nota_fiscal'         =>  null,
            'p_dt_fim_garantia'     =>  null,
            'p_observacao'          =>  null,
            'p_img_principal'       =>  null,
            'p_ativo'               => 'S',
            'p_dt_desativado'       => null,
            'p_id_espaco_local'     =>  $p_id_espaco_local,
            'p_id_item_status'      =>  $p_id_item_status,
            'p_id_espaco_local_ant' => null
        );

        $adicionar_item = $this->item->set($param);
        echo $adicionar_item;


            //     $p_id_espaco    = $this->input->get_post('p_id_espaco');
    //     $p_local        = $this->input->get_post('p_local');

    //     $param = array(
    //         'p_id_espaco'  => $p_id_espaco,
    //         'p_local'      => $p_local,
    //         'p_observacao' => null,
    //         'p_ativo'      => 'S'
    //     );

    //     $adicionar_localizacao = $this->localizacao->set($param);
    //     echo $adicionar_localizacao;
       
    }

}