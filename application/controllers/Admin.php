<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
		$this->load->model('login_model','',TRUE);

	}	
    public function index()
    {
        $this->entrar();
    }
    
    //pagina de login vai aqui
    public function entrar($msg = null)
    {
        $query['msg'] = $msg;
        $this->load->view('paginas/login', $query);
    }

    //função de login
    
    public function autenticar()
    {
        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));
        
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $data['admins'] = $this->db->get('admins')->result();
        
        if (count($data['admins']) == 1) {
            $dados['nome']   = $data['admins'][0]->nome;
            $dados['id']     = $data['admins'][0]->id;
            $dados['logado'] = true;
            $this->session->set_userdata($dados);
            
            redirect('admin/painel');
        } else {
            redirect('admin/entrar/error');
        }
        
    }
    //função de logout 
    public function sair()
    {
        $this->session->sess_destroy();
        redirect('admin/entrar');
    }

    //View do painel inicial
    public function painel($msg = null)
    {
        $query['msg']         = $msg;
        $query['anuncios']    = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        $this->login_model->verifica_sessao();

        $this->load->view('componentes/cabecario');
        $this->load->view('painel/inicio', $query);
        $this->load->view('componentes/rodape');
    }
    // -- Pagina view da listas 
    public function anuncios($msg = null)
    {
        $query['msg']         = $msg;
        $query['anuncios']    = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        $this->login_model->verifica_sessao();

        $this->load->view('componentes/cabecario');
        $this->load->view('painel/anuncios', $query);
        $this->load->view('componentes/rodape');
    }
    public function anunciantes($msg = null)
    {
        $query['msg']         = $msg;
        $query['anuncios']    = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        $this->login_model->verifica_sessao();

        $this->load->view('componentes/cabecario');
        $this->load->view('painel/anunciantes', $query);
        $this->load->view('componentes/rodape');
    }
    public function mensagens($msg = null)
    {
        $query['msg']         = $msg;
        $query['mensagens'] = $this->db->get('mensagens')->result();
        $this->login_model->verifica_sessao();

        $this->load->view('componentes/cabecario');
        $this->load->view('painel/mensagens', $query);
        $this->load->view('componentes/rodape');
    }

    public function configs($msg = null)
    {
        $id = '1';
        $query['msg']         = $msg;
        $this->db->where('id', $id);
        $query['query'] = $this->db->get('admins')->result();
        $this->login_model->verifica_sessao();

        $this->load->view('componentes/cabecario');
        $this->load->view('painel/configs', $query);
        $this->load->view('componentes/rodape');
    }
    
    // -- Pagina view das edições 
    public function editar_anuncio($id, $msg = null)
    {
        $this->login_model->verifica_sessao();
        $query['msg'] = $msg;
        
        $this->db->where('id', $id);
        $query['query']       = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        
        $this->load->view('componentes/cabecario');
        $this->load->view('painel/editar_anuncio', $query);
        $this->load->view('componentes/rodape');
    }
    public function editar_anunciante($id, $msg = null)
    {
        $this->login_model->verifica_sessao();
        $query['msg'] = $msg;
        
        $query['anuncios'] = $this->db->get('anuncios')->result();

        $this->db->where('id', $id);
        $query['query'] = $this->db->get('anunciantes')->result();
        
        $this->load->view('componentes/cabecario');
        $this->load->view('painel/editar_anunciante', $query);
        $this->load->view('componentes/rodape');
    }
    
    
    
    // -- funções de adicionar 
    public function add_anuncio()
    {
        if ($_FILES['foto']["name"] == null) {
            
            $data         = $this->input->post();
            $data['foto'] = 'nopic.jpg';
            
            if ($this->db->insert('anuncios', $data)) {
                redirect('admin/anuncios/sucesso');
            }
            
        } else {
            $foto         = $_FILES['foto'];
            $configuracao = array(
                'upload_path' => realpath('./public/uploads'),
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => md5($this->input->post('foto')),
                'max_size' => '10000000'
            );
            $this->upload->initialize($configuracao);
            
            
            if ($this->upload->do_upload('foto')) {
                
                $upload_data = $this->upload->data();
                
                $data = $this->input->post();
                
                $data['foto'] = $upload_data['file_name'];
                
                if ($this->db->insert('anuncios', $data)) {
                    redirect('admin/anuncios/sucesso');
                }
            } else {
                redirect('admin/anuncios/erro');
            }
        }
        
        
    }
    public function add_cliente()
    {
        if ($_FILES['logo']["name"] == null) {
            
            $data         = $this->input->post();
            $data['logo'] = 'nopic.jpg';
            
            if ($this->db->insert('anunciantes', $data)) {
                redirect('admin/anunciantes/sucesso');
            }
            
        } else {
            $foto         = $_FILES['logo'];
            $configuracao = array(
                'upload_path' => realpath('./public/uploads'),
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => md5($this->input->post('logo')),
                'max_size' => '10000000'
            );
            $this->upload->initialize($configuracao);
            
            
            if ($this->upload->do_upload('logo')) {
                
                $upload_data = $this->upload->data();
                
                $data = $this->input->post();
                
                $data['logo'] = $upload_data['file_name'];
                
                if ($this->db->insert('anunciantes', $data)) {
                    redirect('admin/anunciantes/sucesso');
                }
            } else {
                redirect('admin/anunciantes/erro');
            }
        }
        
        
        
    }


    // -- funções de atualizar 
    
    public function update_anuncio($id)
    {
        {
            if ($_FILES['foto']["name"] == null) {
                
                $data         = $this->input->post();
                $data['foto'] = 'nopic.jpg';
                
                $this->db->where('id', $id);
                if ($this->db->update('anuncios', $data)) {
                    redirect('admin/anuncios/sucesso');
                }
                
            } else {
                $foto         = $_FILES['foto'];
                $configuracao = array(
                    'upload_path' => realpath('./public/uploads'),
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => md5($this->input->post('foto')),
                    'max_size' => '10000000'
                );
                $this->upload->initialize($configuracao);
                
                
                if ($this->upload->do_upload('foto')) {
                    
                    $upload_data = $this->upload->data();
                    
                    $data = $this->input->post();
                    
                    $data['foto'] = $upload_data['file_name'];
                    
                    $this->db->where('id', $id);
                    if ($this->db->update('anuncios', $data)) {
                        redirect('admin/anuncios/update');
                    }
                } else {
                    redirect('admin/anuncios/erro');
                }
            }
            
        }
    }
    public function update_anunciante($id)
    {
        if ($_FILES['logo']["name"] == null) {
            
            $data         = $this->input->post();
            $data['logo'] = 'nopic.jpg';
            
            $this->db->where('id', $id);
            if ($this->db->update('anunciantes', $data)) {
                redirect('admin/anunciantes/sucesso');
            }
            
        } else {
            $foto         = $_FILES['logo'];
            $configuracao = array(
                'upload_path' => realpath('./public/uploads'),
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => md5($this->input->post('logo')),
                'max_size' => '10000000'
            );
            $this->upload->initialize($configuracao);
            
            
            if ($this->upload->do_upload('logo')) {
                
                $upload_data = $this->upload->data();
                
                $data = $this->input->post();
                
                $data['logo'] = $upload_data['file_name'];
                
                $this->db->where('id', $id);
                if ($this->db->update('anunciantes', $data)) {
                    redirect('admin/anunciantes/update');
                }
            } else {
                redirect('admin/anunciantes/erro');
            }
        }
        
    }

    public function update_admin($id)
    {
        $data         = $this->input->post();
                
        $this->db->where('id', $id);
        if ($this->db->update('admins', $data)) {
                    redirect('admin/configs/sucesso');
        }
    }
    
    
    // -- funções de apagar 
    public function del_anuncio($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete('anuncios');
        redirect('admin/anuncios/apagado');
    }
    public function del_cliente($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anunciantes');
        redirect('admin/anunciantes/apagado');
    }

     // -- funções de atualizar senha admin
    public function atualizar_senha()
	
	{	
		$uid =  '1';
		 $data = array(
			    'senha' =>  md5($this->input->post('senha_nova'))

		);
		
		
		$this->db->where('id', $uid);
		if($this->db->update('admins', $data)){
			redirect('admin/configs/sucesso');
		}
		else{};
		
	}
    
}