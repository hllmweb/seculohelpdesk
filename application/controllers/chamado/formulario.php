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
        $this->load->model('m_espaco', 'espaco', true);
    }
    
    //lista de itens do espaço
    function index() {       
        $this->load->view('espaco/adicionar');
    }
    
    //adicionar o espaço
    function adicionar(){
        $input_descricao   = $this->input->get_post('input_descricao');

        $param = array(
            'p_id_empresa'        => 1,
            'p_descricao'         => $input_descricao
        );
        
        $adicionar_espaco = $this->espaco->set($param);
        echo $adicionar_espaco;

    }

}