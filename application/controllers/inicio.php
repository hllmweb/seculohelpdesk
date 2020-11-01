<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {       
    	header("Location: ".base_url('espaco/pagina'));

    }


}