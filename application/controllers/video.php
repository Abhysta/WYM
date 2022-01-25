<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_video');
        $this->load->model('m_film');
        $this->load->model('m_type');
        $this->load->model('m_status');
        $this->load->model('m_genre');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data ['judul']= 'Halaman Administrator';
        $data['video'] = $this->m_video->get_video();
       $this->load->view('template/header',$data);
       $this->load->view('owner/dashboard');
       $this->load->view('owner/sidebar');
       $this->load->view('owner/content_video');
       $this->load->view('template/footer');
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('id_film', 'Title', 'required', array(
            'required' => 'Pilih Nama Film !'
        ));
        $this->form_validation->set_rules('creator', 'Creator', 'required', array(
            'required' => 'Masukkan Nama Pembuat !'
        ));
        $this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required', array(
            'required' => 'Masukkan Sinopsis !'
        ));
        $this->form_validation->set_rules('id_type', 'Type', 'required', array(
            'required' => 'Pilih Type Film !'
        ));
        $this->form_validation->set_rules('studio', 'Studio', 'required', array(
            'required' => 'Masukkan Nama Studio !'
        ));
        $this->form_validation->set_rules('date', 'Date', 'required', array(
            'required' => 'Masukkan Tanggal Release !'
        ));
        $this->form_validation->set_rules('id_status', 'Status', 'required', array(
            'required' => 'Pilih Status Film !'
        ));
        $this->form_validation->set_rules('id_genre', 'Genre', 'required', array(
            'required' => 'Pilih Genre Film !'
        ));
        $this->form_validation->set_rules('rating', 'Rating', 'required', array(
            'required' => 'Masukkan Rating Film !'
        ));
        $this->form_validation->set_rules('duration', 'Duration', 'required', array(
            'required' => 'Masukkan Durasi Film !'
        ));
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'required', array(
            'required' => 'Masukkan Kualitas Film !'
        ));
        $this->form_validation->set_rules('views', 'Views', 'required', array(
            'required' => 'Masukkan Views Film !'
        ));



        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/film/';
            $config['allowed_types'] = 'webm|mkv|mp4|flv|3gp|avi|mpeg';
            $config['max_size']     = '30000000';

            $this->upload->initialize($config);
            $g = "video";

            if (!$this->upload->do_upload($g)) {
                $data = array (
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul'=> 'Halaman Administrator',
                    'title'=> 'Tambah Video',
                    'film'=> $this->m_film->get_film(),
                    'type'=> $this->m_type->get_type(),
                    'status'=> $this->m_status->get_status(),
                    'genre'=> $this->m_genre->get_genre(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view('template/header',$data);
                $this->load->view('owner/dashboard');
                $this->load->view('owner/sidebar');
                $this->load->view('owner/content_video_add');
                $this->load->view('template/footer');
            } else {
                $up_video = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/film/'. $up_video['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_film' => $this->input->post('id_film'),
                    'creator' => $this->input->post('creator'),
                    'sinopsis' => $this->input->post('sinopsis'),
                    'id_type' => $this->input->post('id_type'),
                    'studio' => $this->input->post('studio'),
                    'date' => $this->input->post('date'),
                    'id_status' => $this->input->post('id_status'),
                    'id_genre' => $this->input->post('id_genre'),
                    'rating' => $this->input->post('rating'),
                    'duration' => $this->input->post('duration'),
                    'kualitas' => $this->input->post('kualitas'),
                    'views' => $this->input->post('views'),
                    'video' => $up_video['uploads']['file_name'],
                );
                $this->m_video->add($data);
                $this->session->set_flashdata('message', 'Video Berhasil Di Tambahkan');
                redirect('video');
            }
        } else {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data ['judul']= 'Halaman Administrator';
            $data['film']= $this->m_film->get_film();
            $data['type']= $this->m_type->get_type();
            $data['status']= $this->m_status->get_status();
            $data['genre']= $this->m_genre->get_genre();

            $this->load->view('template/header',$data);
            $this->load->view('owner/dashboard');
            $this->load->view('owner/sidebar');
            $this->load->view('owner/content_video_add');
            $this->load->view('template/footer');
        }
    }

    //Update one item
    public function edit( $id_video = NULL )
    {
        $this->form_validation->set_rules('id_film', 'Title', 'required', array(
            'required' => 'Pilih Nama Film !'
        ));
        $this->form_validation->set_rules('creator', 'Creator', 'required', array(
            'required' => 'Masukkan Nama Pembuat !'
        ));
        $this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required', array(
            'required' => 'Masukkan Sinopsis !'
        ));
        $this->form_validation->set_rules('id_type', 'Type', 'required', array(
            'required' => 'Pilih Type Film !'
        ));
        $this->form_validation->set_rules('studio', 'Studio', 'required', array(
            'required' => 'Masukkan Nama Studio !'
        ));
        $this->form_validation->set_rules('date', 'Date', 'required', array(
            'required' => 'Masukkan Tanggal Release !'
        ));
        $this->form_validation->set_rules('id_status', 'Status', 'required', array(
            'required' => 'Pilih Status Film !'
        ));
        $this->form_validation->set_rules('id_genre', 'Genre', 'required', array(
            'required' => 'Pilih Genre Film !'
        ));
        $this->form_validation->set_rules('rating', 'Rating', 'required', array(
            'required' => 'Masukkan Rating Film !'
        ));
        $this->form_validation->set_rules('duration', 'Duration', 'required', array(
            'required' => 'Masukkan Durasi Film !'
        ));
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'required', array(
            'required' => 'Masukkan Kualitas Film !'
        ));
        $this->form_validation->set_rules('views', 'Views', 'required', array(
            'required' => 'Masukkan Views Film !'
        ));



        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/film/';
            $config['allowed_types'] = 'webm|mkv|mp4|flv|3gp|avi|mpeg';
            $config['max_size']     = '30000';

            $this->upload->initialize($config);
            $g = "video";

            if (!$this->upload->do_upload($g)) {
                $data = array (
                    'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'judul'=> 'Halaman Administrator',
                    'title'=> 'Tambah Video',
                    'film'=> $this->m_film->get_film(),
                    'type'=> $this->m_type->get_type(),
                    'status'=> $this->m_status->get_status(),
                    'genre'=> $this->m_genre->get_genre(),
                    'error_up'=> $this->upload->display_errors(),

                );

                $this->load->view('template/header',$data);
                $this->load->view('owner/dashboard');
                $this->load->view('owner/sidebar');
                $this->load->view('owner/content_video_edit');
                $this->load->view('template/footer');
            } else {
                //hapus video
                $video = $this->m_video->get_data($id_video);
                if ($video->video != "") {
                    unlink('./assets/film/'. $video->video);
                }

                $up_video = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/film/'. $up_video['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_video' => $id_video,
                    'id_film' => $this->input->post('id_film'),
                    'creator' => $this->input->post('creator'),
                    'sinopsis' => $this->input->post('sinopsis'),
                    'id_type' => $this->input->post('id_type'),
                    'studio' => $this->input->post('studio'),
                    'date' => $this->input->post('date'),
                    'id_status' => $this->input->post('id_status'),
                    'id_genre' => $this->input->post('id_genre'),
                    'rating' => $this->input->post('rating'),
                    'duration' => $this->input->post('duration'),
                    'kualitas' => $this->input->post('kualitas'),
                    'views' => $this->input->post('views'),
                    'video' => $up_video['uploads']['file_name'],
                );
                $this->m_video->edit($data);
                $this->session->set_flashdata('message', 'Video Berhasil Di Ubah');
                redirect('video');
            }
            //Tampa Mengganti video
            $data = array(
                    'id_video' => $id_video,
                    'id_film' => $this->input->post('id_film'),
                    'creator' => $this->input->post('creator'),
                    'sinopsis' => $this->input->post('sinopsis'),
                    'id_type' => $this->input->post('id_type'),
                    'studio' => $this->input->post('studio'),
                    'date' => $this->input->post('date'),
                    'id_status' => $this->input->post('id_status'),
                    'id_genre' => $this->input->post('id_genre'),
                    'rating' => $this->input->post('rating'),
                    'duration' => $this->input->post('duration'),
                    'kualitas' => $this->input->post('kualitas'),
                    'views' => $this->input->post('views'),
                );
                $this->m_video->edit($data);
                $this->session->set_flashdata('message', 'Film Berhasil Di Tambahkan');
                redirect('video');
        } else {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data ['judul']= 'Halaman Administrator';
            $data['video'] = $this->m_video->get_data($id_video);
            $data['film']= $this->m_film->get_film();
            $data['type']= $this->m_type->get_type();
            $data['status']= $this->m_status->get_status();
            $data['genre']= $this->m_genre->get_genre();

            $this->load->view('template/header',$data);
            $this->load->view('owner/dashboard');
            $this->load->view('owner/sidebar');
            $this->load->view('owner/content_video_edit');
            $this->load->view('template/footer');
        }
    }

    //Delete one item
    public function delete( $id_video = NULL )
    {
        //hapus video
        $video = $this->m_video->get_data($id_video);
        if ($video->video != "") {
            unlink('./assets/film/'. $video->video);
        }
                
        $data = array('id_video' => $id_video );
        $this->m_video->delete($data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
         redirect('video');
    }
}

/* End of file Controllername.php */



?>