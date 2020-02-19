<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->entrar();
    }
	
	//pagina de login vai aqui
    public function entrar($msg=null)
	{
		$query['msg'] = $msg;
		$this->load->view('paginas/login', $query);
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
			
			redirect('admin/painel');
		}
		else{
			redirect('admin/entrar/error');	
			}
		
	}
	public function sair()
	{
		$this->session->sess_destroy();
		redirect('admin/entrar');
	}
	public function painel($msg=null)
	{
		$query['msg'] = $msg;
		$query['anuncios'] = $this->db->get('anuncios')->result();


		$this->load->view('componentes/cabecario');
		$this->load->view('painel/inicio', $query);
		$this->load->view('componentes/rodape');
	}
	public function add_anuncio()

	{	
		if($_FILES['foto']["name"] == null ){
			
			$data = $this->input->post();
			$data['foto'] = 'nopic.jpg';

			if($this->db->insert('anuncios', $data)){
				redirect('admin/painel/sucesso');
			}

		}else{
			$foto    = $_FILES['foto'];
			$configuracao = array(
			'upload_path'   => realpath('./public/uploads'),
			'allowed_types' => 'gif|jpg|png|jpeg',
			'file_name'     => md5($this->input->post('foto')),
			'max_size'      => '10000000'
			   );      
			$this->upload->initialize($configuracao);
				
				
			if ($this->upload->do_upload('foto')){
							
				$upload_data = $this->upload->data();
	
				$data = $this->input->post();	
				
				$data['foto'] = $upload_data['file_name'];
	
				if($this->db->insert('anuncios', $data)){
					redirect('admin/painel/sucesso');
				}
			}else{
				redirect('admin/painel/erro');
			}
		}
		

	}
	public function add_cliente()

	{	
		if($_FILES['logo']["name"] == null ){
			
			$data = $this->input->post();
			$data['logo'] = 'nopic.jpg';

			if($this->db->insert('anunciantes', $data)){
				redirect('admin/painel/sucesso');
			}

		}else{
			$foto    = $_FILES['logo'];
			$configuracao = array(
			'upload_path'   => realpath('./public/uploads'),
			'allowed_types' => 'gif|jpg|png|jpeg',
			'file_name'     => md5($this->input->post('logo')),
			'max_size'      => '10000000'
			   );      
			$this->upload->initialize($configuracao);
				
				
			if ($this->upload->do_upload('logo')){
							
				$upload_data = $this->upload->data();
	
				$data = $this->input->post();	
				
				$data['logo'] = $upload_data['file_name'];
	
				if($this->db->insert('anunciantes', $data)){
					redirect('admin/painel/sucesso');
				}
			}else{
				redirect('admin/painel/erro');
			}
		}
		

	}

}
