<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagina extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'html', 'directory'));
 
        //models
        $this->load->model('m_componente', 'componente', true);
    }

    
    
   function index($id_espaco, $id_espaco_local, $id_item) {    

        $param = array(
            'p_iditem' => $id_item
        );   

        $listar_componente = $this->componente->get_ID($param);
        if(count($listar_componente) == 0)
            $info_mensagem = "Não existe informação cadastrada.";

        $data = array(
            'titulo_header'         => 'Componente',
            'listar_componente'     => $listar_componente,
            'info_mensagem'         => $info_mensagem
        );

        $this->load->view('componente/pagina', $data);
    }


}