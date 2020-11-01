<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagina extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'html', 'directory'));
        $this->load->library(array('session','form_validation'));
 
        //models
        $this->load->model('m_item'             , 'item'            , true);
        $this->load->model('m_componente'       , 'componente'      , true);
        $this->load->model('m_localizacao'      , 'localizacao'     , true);
        $this->load->model('m_item_status'      , 'item_status'     , true);
        $this->load->model('m_item_categoria'   , 'item_categoria'  , true);
        $this->load->model('m_item_grupo'       , 'item_grupo'      , true);
    }

    
    
   function index($id_espaco, $id_espaco_local) {    
    
        $param_componente = array(
            'p_idespaco'      => $id_espaco,
            'p_idespacolocal' => $id_espaco_local
        );  

        $lista_item_geral   = $this->componente->get_ID($param_componente);
        if(count($lista_item_geral) == 0)
            $info_mensagem = "Não existe informação cadastrada.";


        $data = array(
            'titulo'             => 'Espaço -> Localização -> Item',
            'titulo_header'      => array(
                    'espaco'         => 'espaco/pagina/index',
                    'localizacao'    => 'localizacao/pagina/index/'.$id_espaco,
                    'item'           => 'item/pagina/index/'.$id_espaco.'/'.$id_espaco_local
            ),
            'lista_item_geral'  => $lista_item_geral,
            'info_mensagem'     => $info_mensagem
        );


        $this->load->view('item/pagina', $data);

        
    }

    //visualiza o item
    function ver($id_item){
        //item
        $param_1 = array(
            'p_id_item'   => $id_item
        );
        $lista_item                 =   $this->item->get_ID_Filter($param_1);

        //local
        $param_2 = array(
            'p_idespacolocal'       =>   $lista_item[0]['IDESPACOLOCAL']
        );
        $lista_espaco_local         =   $this->localizacao->get_ID_Filter($param_2);
        
        //status
        $param_3 = array(
            'p_id_item_status'      => $lista_item[0]['IDITEMSTATUS']
        );  
        $lista_item_status          =   $this->item_status->get_ID_Filter($param_3);

        //categoria
        $param_4 = array(
            'p_id_categoria'        => $lista_item[0]['IDCATEGORIA']
        );
        $lista_item_categoria       = $this->item_categoria->get_ID_Filter($param_4);

        //item grupo
        $param_5 = array(
            'p_id_item_grupo'       => $lista_item[0]['IDITEMGRUPO'],
            'p_id_empresa'          => $lista_item[0]['IDEMPRESA']
        );
        $lista_item_grupo           = $this->item_grupo->get_ID_Filter($param_5);
        $lista_item_componente      =   $this->componente->get();
        $data = array(
            'lista_item_componente' =>  $lista_item_componente,
            'lista_item'            =>  $lista_item,
            'lista_espaco_local'    =>  $lista_espaco_local,
            'lista_item_status'     =>  $lista_item_status,
            'lista_item_categoria'  =>  $lista_item_categoria,
            'lista_item_grupo'      =>  $lista_item_grupo
        );
        

        $this->load->view('item/ver', $data);
    }







}