<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_dashboard');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {

    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */



?>