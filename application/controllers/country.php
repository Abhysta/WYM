<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_country');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
    $data['country'] = $this->m_country->get_country();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_country');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_country' => $this->input->post('nama_country'),
         );
         $this->m_country->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('country');
    }

    //Update one item
    public function edit( $id_country = NULL )
    {
        $data = array(
            'id_country' => $id_country,
            'nama_country' => $this->input->post('nama_country'),
         );
         $this->m_country->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('country');
    }

    //Delete one item
    public function delete( $id_country = NULL )
    {
        $data = array('id_country' => $id_country );
        $this->m_country->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('country');
    }
}

/* End of file .php */


?>