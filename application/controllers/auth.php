<?php 

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
   public function index(){

       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        if($this->form_validation->run() == false){
            $data['judul'] = 'Halaman Login';
            $this->load->view("auth/header", $data);
            $this->load->view("auth/login");
            $this->load->view("auth/footer");
        }
        else{
            $this->login1();
        }
   }

   private function login1(){
       $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        //jika user ada
        if($user){
            //jika user active
            if($user['is_active'] == 1) {
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                    ];
                    $this->session->set_userdata($data);

                    if($user['id_role'] == 1) {
                        redirect('owner');
                    }
                    else {
                        redirect('admin');
                    }
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password anda salah</div>');
            redirect('auth');
                }
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum teraktivasi</div>');
            redirect('auth');
            }
        }
        else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email atau Password anda salah</div>');
            redirect('auth');
        }
   }
   public function register(){

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email sudah digunakan',
        ]);
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'min_length' => 'Password terlalu pendek!'
        ]);

        if($this->form_validation->run() == false){
            $data['judul'] = 'Halaman Register';
            $this->load->view("auth/header", $data);
            $this->load->view("auth/register");
            $this->load->view("auth/footer");

        }
        else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => $this->input->post('no_telp', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'id_role' => 2,
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat!, Akun berhasil dibuat</div>');
            redirect('auth');
        }
    }
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kamu berhasil logout</div>');
        redirect('auth');
    }
}

?>