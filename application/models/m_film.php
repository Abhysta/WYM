<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_film extends CI_Model {

    public function get_film(){
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('type', 'type.id_type = film.id_type', 'left');
        $this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');
        $this->db->join('country', 'country.id_country = film.id_country', 'left');
        return $this->db->get()->result();
    }

    public function get_data($id_film){
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('type', 'type.id_type = film.id_type', 'left');
        $this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');
        $this->db->join('country', 'country.id_country = film.id_country', 'left');
        $this->db->where('id_film', $id_film);
        
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('film', $data);
    }

    public function edit($data){
        $this->db->where('id_film', $data['id_film']);
        $this->db->update('film', $data);
    }

    public function delete($data){
        $this->db->where('id_film', $data['id_film']);
        $this->db->delete('film', $data);
    }

}

/* End of file ModelName.php */


?>