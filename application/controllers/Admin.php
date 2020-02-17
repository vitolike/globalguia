<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->entrar();
    }
	
	//pagina de login vai aqui
    public function entrar()
	{
		$this->load->view('paginas/login');
    }
	
	public function autenticar()
	{
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));
		
		$this->db->where('email',$email);
		$this->db->where('senha',$senha);
		$data['admins'] = $this->db->get('admins')->result();
		
		if(count($data['admins']) == 1){
			$dados['nome'] = $data['admins'][0]->nome;
			$dados['id'] = $data['admins'][0]->id;
			$dados['logado'] = true;
			$this->session->set_userdata($dados);
			
			echo 'SUCESSO MEU QUERIDO';
		}
		else{
			echo 'ERRO';	
			}
		
	}
}
