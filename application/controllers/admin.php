<?php
class Admin extends CI_Controller{

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_admin');
      $this->load->model('m_video');
   }
   

   public function index(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Dashboard';
    $data['film'] = $this->m_admin->get_film();
    $data['film'] = $this->m_admin->get_video();
       $this->load->view('admin/header',$data);
       $this->load->view('admin/dashboard', $data);
       $this->load->view('admin/footer');
   }
   public function Country($id_country){

      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $country = $this->m_admin->get_country_row($id_country);
      $data ['judul']= 'Country '. $country->nama_country;
      $data ['film'] = $this->m_admin->get_film_by_country($id_country);
      $this->load->view('admin/header', $data);
      $this->load->view('admin/country', $data);
      $this->load->view('admin/footer', $data);
   }
   public function Detail($id_video){

      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data ['judul']= 'Halaman Menonton';
      $data['film'] = $this->m_admin->detail($id_video);
    $this->load->view('admin/header', $data);
    $this->load->view('admin/detail', $data);
    $this->load->view('admin/footer');
   }
   public function Genre(){

      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data ['judul']= 'Halaman Genre';
      // $data['genre'] = $this->m_admin->get_genre();
      // $data ['film'] = $this->m_admin->get_film_by_genre();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/genre',$data);
    $this->load->view('admin/footer');
   }
   public function Advanced(){

      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data ['judul']= 'Halaman Advanced';
      $genre = $this->input->post('id_genre');
      $country = $this->input->post('id_country');
      $type = $this->input->post('id_type');
      $getGenre = $this->m_admin->getGenre();
      $getCountry = $this->m_admin->getCountry();
      $getType = $this->m_admin->getType();
      $hasil = $this->m_admin->getHasil($genre, $country, $type);

    $this->load->view('admin/header', ['user' => $data['user'], 'judul' => $data['judul'], 'getGenre' => $getGenre, 'getCountry' => $getCountry, 'getType' => $getType, 'hasil' => $hasil]);
    $this->load->view('admin/advanced');
    $this->load->view('admin/footer');
   }

   // public function Advance_result(){
   //    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   //    $data ['judul']= 'Halaman Advanced';
   //    $genre = $this->input->post('id_genre');
   //    $country = $this->input->post('id_country');
   //    $type = $this->input->post('id_type');
   //    $getGenre = $this->m_admin->getGenre();
   //    $getCountry = $this->m_admin->getCountry();
   //    $getType = $this->m_admin->getType();
   //    $hasil = $this->m_admin->getHasil($genre, $country, $type);

   //    $this->load->view('admin/header', ['user' => $data['user'], 'judul' => $data['judul'], 'getGenre' => $getGenre, 'getCountry' => $getCountry, 'getType' => $getType, 'hasil' => $hasil]);
   //    $this->load->view('admin/advanced_result');
   //    $this->load->view('admin/footer');
   // }

   public function about(){
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data ['judul']= 'Halaman advanced';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/about');
    $this->load->view('admin/footer');
   }
}


?>