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
        $this->load->model('m_localizacao', 'localizacao', true);
    }
    
    // lista de itens do espaço
    function index() {       
        
        
        //aqui vai ficar a verificação do usuário logado capturado o id do usuário logado
        $param = array(
            'p_operacao'    => 'LE',
            'p_idempresa'   => 1,
            'p_idlogin'     => 2,
            'p_valor'       => null
        );

        $lista_espaco = $this->espaco->sp_gman_consulta($param);
        $data = array(
            'lista_espaco' => $lista_espaco
        );

        $this->load->view('localizacao/adicionar', $data);
    }
    
    //adicionar itens do espaço
    function adicionar(){
        $p_id_espaco    = $this->input->get_post('p_id_espaco');
        $p_local        = $this->input->get_post('p_local');

        $param = array(
            'p_id_espaco'  => $p_id_espaco,
            'p_local'      => $p_local,
            'p_observacao' => null,
            'p_ativo'      => 'S'
        );

        $adicionar_localizacao = $this->localizacao->set($param);
        echo $adicionar_localizacao;
       
    }

}