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
        $this->load->model('m_item'             , 'item'            , true);
        $this->load->model('m_componente'       , 'componente'      , true);
        $this->load->model('m_localizacao'      , 'localizacao'     , true);
        $this->load->model('m_item_status'      , 'item_status'     , true);
        $this->load->model('m_item_categoria'   , 'item_categoria'  , true);
        $this->load->model('m_item_grupo'       , 'item_grupo'      , true);
    }
    
    //lista de itens do espaço
    function index($id_item){       
        
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
        


        $this->load->view('componente/adicionar', $data);
    }
    
    //adicionar os compoente do item selecionado
    function adicionar(){
        $p_id_item          =   $this->input->get_post('p_id_item');
        $p_descricao        =   $this->input->get_post('p_descricao');
        $p_id_fabricante    =   $this->input->get_post('p_id_fabricante');
        $p_id_acesso        =   $this->input->get_post('p_id_acesso');
        $p_ch               =   $this->input->get_post('p_ch');
        $p_url              =   $this->input->get_post('p_url');
        $p_ativo            =   $this->input->get_post('p_ativo');
        $p_img_principal    =   $this->input->get_post('p_img_principal');   
        $p_observacao       =   $this->input->get_post('p_observacao');
        $p_id_espaco_local  =   $this->input->get_post('p_id_espaco_local');
        $p_id_item_status   =   $this->input->get_post('p_id_item_status');

        $param = array(
            'p_id_item'         =>  $p_id_item,
            'p_descricao'       =>  $p_descricao,
            'p_id_fabricante'   =>  $p_id_fabricante,
            'p_id_acesso'       =>  $p_id_acesso,
            'p_ch'              =>  $p_ch,
            'p_url'             =>  $p_url,
            'p_ativo'           =>  $p_ativo,
            'p_img_principal'   =>  $p_img_principal,
            'p_observacao'      =>  $p_observacao,
            'p_id_espaco_local' =>  $p_id_espaco_local,
            'p_id_item_status'  =>  $p_id_item_status
        );

        $adicionar_componente = $this->componente->set($param);
        echo $adicionar_componente;
    }


    //upload de imagem
    function do_upload(){
        $file_name  = $this->input->get_post("p_foto_componente");
        $data_atual = date('Ymd H:i');
        

        $config['upload_path']      =   "./arquivos";
        $config['allowed_types']    =   "gif|jpg|png";
        $config['encrypt_name']     =   false;
        $config['file_name']        =   $file_name;
        $config['remove_spaces']    =   false;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
 

            $arquivo = $data['upload_data']['file_name']; 
            var_dump($arquivo);
            //$result = $this->upload_model->save_upload($title,$image);
            //echo json_decode($result);
        }
    }



}