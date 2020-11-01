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
        #$this->load->model('m_espaco', 'espaco', true);
    }

    
   // lista de itens do espaço   
   function index() {       
        // $lista_espaco = $this->espaco->get();

        //capturar o id do usuário logado
        /*$param = array(
            'p_operacao'    => 'LE',
            'p_idempresa'   => 1,
            'p_idlogin'     => 2,
            'p_valor'       => null
        );*/

        #$lista_espaco = $this->espaco->sp_gman_consulta($param);
        $data = array(
            'titulo_header' => 'Chamado'
            #'listar_espaco' => $lista_espaco
        );


        $this->load->view('chamado/pagina', $data);
    }

    function adicionar(){
        $data = array(
            'titulo_header' => 'Adicionar Chamado'
        );


        $this->load->view('chamado/adicionar', $data);
        # echo "adicionar page";
    }


}