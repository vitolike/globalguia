<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    public function entrar()
	{
		$this->load->view('welcome_message');
    }
    
    public function autenticar()
	{
		$this->load->view('welcome_message');
	}
}
