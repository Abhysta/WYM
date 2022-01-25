<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model("m_film");
        $this->load->model("m_type");
        $this->load->model("m_genre");
        $this->load->model("m_country");
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data ['judul']= 'Halaman Administrator';
    $data['film'] = $this->m_film->get_film();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_film');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required', array(
            'required' => 'Masukkan Nama Film !'
        ));
        $this->form_validation->set_rules('id_type', 'Type', 'required', array(
            'required' => 'Pilih Type Film !'
        ));
        $this->form_validation->set_rules('id_genre', 'genre', 'required', array(
            'required' => 'Pilih Genre Film !'
        ));
        $this->form_validation->set_rules('id_country', 'Country', 'required', array(
            'required' => 'Pilih Country Film !'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/film/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '10000';

            $this->upload->initialize($config);
            $g = "gambar";

            if (!$this->upload->do_upload($g)) {
                $data = array (
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul'=> 'Halaman Administrator',
                    'title'=> 'Tambah Film',
                    'type'=> $this->m_type->get_type(),
                    'genre'=> $this->m_genre->get_genre(),
                    'country'=> $this->m_country->get_country(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view('template/header',$data);
                $this->load->view('owner/dashboard');
                $this->load->view('owner/sidebar');
                $this->load->view('owner/content_film_add');
                $this->load->view('template/footer');
            } else {
                $up_gambar = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/film/'. $up_gambar['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'title' => $this->input->post('title'),
                    'id_type' => $this->input->post('id_type'),
                    'id_genre' => $this->input->post('id_genre'),
                    'id_country' => $this->input->post('id_country'),
                    'film_status' => 1,
                    'gambar' => $up_gambar['uploads']['file_name'],
                );
                $this->m_film->add($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('film');
            }
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data ['judul']= 'Halaman Administrator';
            $data['type'] = $this->m_type->get_type();
            $data['genre'] = $this->m_genre->get_genre();
            $data['country'] = $this->m_country->get_country();

            $this->load->view('template/header',$data);
            $this->load->view('owner/dashboard');
            $this->load->view('owner/sidebar');
            $this->load->view('owner/content_film_add');
            $this->load->view('template/footer');
        }
    }

    //Update one item
    public function edit( $id_film = NULL )
    {
        $this->form_validation->set_rules('title', 'Title', 'required', array(
            'required' => 'Masukkan Nama Film !'
        ));
        $this->form_validation->set_rules('id_type', 'Type', 'required', array(
            'required' => 'Pilih Type Film !'
        ));
        $this->form_validation->set_rules('id_genre', 'genre', 'required', array(
            'required' => 'Pilih Genre Film !'
        ));
        $this->form_validation->set_rules('id_country', 'Country', 'required', array(
            'required' => 'Pilih Country Film !'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/film/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';

            $this->upload->initialize($config);
            $g = "gambar";

            if (!$this->upload->do_upload($g)) {
                $data = array (
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul'=> 'Halaman Administrator',
                    'title'=> 'Tambah Film',
                    'film' => $this->m_film->get_data($id_film),
                    'type'=> $this->m_type->get_type(),
                    'genre'=> $this->m_genre->get_genre(),
                    'country'=> $this->m_country->get_country(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view('template/header',$data);
                $this->load->view('owner/dashboard');
                $this->load->view('owner/sidebar');
                $this->load->view('owner/content_film_edit');
                $this->load->view('template/footer');
            } else {
                //hapus gambar
                $film = $this->m_film->get_data($id_film);
                if ($film->gambar != "") {
                    unlink('./assets/film/'. $film->gambar);
                }

                $up_gambar = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/film/'. $up_gambar['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_film' => $id_film,
                    'title' => $this->input->post('title'),
                    'id_type' => $this->input->post('id_type'),
                    'id_genre' => $this->input->post('id_genre'),
                    'id_country' => $this->input->post('id_country'),
                    'film_status' => 1,
                    'gambar' => $up_gambar['uploads']['file_name'],
                );
                $this->m_film->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('film');
            }
            //Tampa Mengganti Gambar
            $data = array(
                    'id_film' => $id_film,
                    'title' => $this->input->post('title'),
                    'id_type' => $this->input->post('id_type'),
                    'id_genre' => $this->input->post('id_genre'),
                    'id_country' => $this->input->post('id_country'),
                    'film_status' => 1,
                );
                $this->m_film->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('film');

        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data ['judul']= 'Halaman Administrator';
            $data['film'] = $this->m_film->get_data($id_film);
            $data['genre'] = $this->m_genre->get_genre();
            $data['type'] = $this->m_type->get_type();
            $data['country'] = $this->m_country->get_country();

            $this->load->view('template/header',$data);
            $this->load->view('owner/dashboard');
            $this->load->view('owner/sidebar');
            $this->load->view('owner/content_film_edit');
            $this->load->view('template/footer');
        }
    }

    //Delete one item
    public function delete( $id_film = NULL )
    {
        //hapus gambar
        $film = $this->m_film->get_data($id_film);
        if ($film->gambar != "") {
            unlink('./assets/film/'. $film->gambar);
        }
                
        $data = array('id_film' => $id_film );
        $this->m_film->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('film');
    }
}

/* End of file Controllername.php */



?>