<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    public function index()
    {
        $query['msg'] = 'null';
        $query['anuncios']    = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        $this->load->view('front/home', $query);
    }
    public function pagina($msg=null)
    {
        $query['msg'] = $msg;
        $query['anuncios']    = $this->db->get('anuncios')->result();
        $query['anunciantes'] = $this->db->get('anunciantes')->result();
        $this->load->view('front/home', $query);
    }
    public function nova_mensagem()
    {
            $data = $this->input->post();
          
            if ($this->db->insert('mensagens', $data)) {
                redirect('home/pagina/sucesso');
            }
    }
 
}