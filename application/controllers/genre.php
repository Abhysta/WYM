<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_genre');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
    $data['genre'] = $this->m_genre->get_genre();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_genre');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_genre' => $this->input->post('nama_genre'),
         );
         $this->m_genre->add($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
         redirect('genre');
    }

    //Update one item
    public function edit( $id_genre = NULL )
    {
        $data = array(
            'id_genre' => $id_genre,
            'nama_genre' => $this->input->post('nama_genre'),
         );
         $this->m_genre->edit($data);
         $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
         redirect('genre');
    }

    //Delete one item
    public function delete( $id_genre = NULL )
    {
        $data = array('id_genre' => $id_genre );
        $this->m_genre->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('genre');
    }
}

/* End of file Genre.php */



?>