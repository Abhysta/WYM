<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model("m_type");

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
    $data['type'] = $this->m_type->get_type();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_type');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'type_film' => $this->input->post('type_film'),
         );
         $this->m_type->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('type');
    }

    //Update one item
    public function edit( $id_type = NULL )
    {
        $data = array(
            'id_type' => $id_type,
            'type_film' => $this->input->post('type_film'),
         );
         $this->m_type->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('type');
    }

    //Delete one item
    public function delete( $id_type = NULL )
    {
        $data = array('id_type' => $id_type );
        $this->m_type->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('type');
    }
}

/* End of file Genre.php */



?>