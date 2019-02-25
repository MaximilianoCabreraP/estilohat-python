<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
    public function index(){
        $this->load->view('header', ['title' => 'Panel Estilo Hat']);
        $this->load->view('home');
        $this->load->view('footer');
    }
}
?>