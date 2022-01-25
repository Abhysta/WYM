<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model {

    public function get_video(){
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('film', 'film.id_film = video.id_film', 'left');
        $this->db->join('type', 'type.id_type = video.id_type', 'left');
        $this->db->join('status', 'status.id_status = video.id_status', 'left');
        $this->db->join('genre', 'genre.id_genre = video.id_genre', 'left');
        return $this->db->get()->result();
    }

    public function get_data($id_video){
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('film', 'film.id_film = video.id_film', 'left');
        $this->db->join('type', 'type.id_type = video.id_type', 'left');
        $this->db->join('status', 'status.id_status = video.id_status', 'left');
        $this->db->join('genre', 'genre.id_genre = video.id_genre', 'left');
        $this->db->where('id_video', $id_video);
        
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('video', $data);
    }

    public function edit($data){
        $this->db->where('id_video', $data['id_video']);
        $this->db->update('video', $data);
    }

    public function delete($data){
        $this->db->where('id_video', $data['id_video']);
        $this->db->delete('video', $data);
    }

}

/* End of file ModelName.php */


?>