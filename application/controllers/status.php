<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model("m_status");
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
    $data['status'] = $this->m_status->get_status();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_status');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'status' => $this->input->post('status'),
         );
         $this->m_status->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('status');
    }

    //Update one item
    public function edit( $id_status = NULL )
    {
        $data = array(
            'id_status' => $id_status,
            'status' => $this->input->post('status'),
         );
         $this->m_status->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('status');
    }

    //Delete one item
    public function delete( $id_status = NULL )
    {
        $data = array('id_status' => $id_status );
        $this->m_status->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('status');
    }
}

/* End of Status.php */



?>