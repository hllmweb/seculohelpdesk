<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagina extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'html', 'directory'));
       
        //models
        $this->load->model('m_localizacao', 'localizacao', true);
    }

        
    function index($id_espaco) {       
        $param = array(
            'p_idespaco'        => $id_espaco
        );

        $lista_localizacao = $this->localizacao->get_ID($param);
        
        if(count($lista_localizacao) == 0)
            $info_mensagem = "Não existe informação cadastrada.";


        $data = array(
            'titulo'             => 'Espaço -> Localização',
            'titulo_header'      => '<a href="'.base_url('espaco/pagina/index').'" class="app-header-link">Espaço</a> / <a href="'.base_url('localizacao/pagina/index')."/".$id_espaco.'" class="app-header-link active">Localização</a>',
        	'listar_localizacao' => $lista_localizacao,
            'info_mensagem'      => $info_mensagem
        );

        $this->load->view('localizacao/pagina', $data);

    }

    // function adicionar($id_espaco){
    //     // $param = array(
    //     //     'p_idespaco'        => $id_espaco
    //     // );

    //     //header("Location: ".base_url()."localizacao/adicionar");
    //     //$this->load->view('localizacao/adicionar', $param);
    // }
}