<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_film(){
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('type', 'type.id_type = film.id_type', 'left');
        return $this->db->get()->result();
    }

    public function detail($id_video){
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('film', 'film.id_film = video.id_film', 'left');
        $this->db->join('type', 'type.id_type = video.id_type', 'left');
        $this->db->join('status', 'status.id_status = video.id_status', 'left');
        $this->db->join('genre', 'genre.id_genre = video.id_genre', 'left');
        $this->db->where('id_video', $id_video);
        
        return $this->db->get()->row();
    }

    public function get_video(){
        $this->db->select('*');
        $this->db->from('video');
        $this->db->join('film', 'film.id_film = video.id_film', 'left');
        $this->db->join('type', 'type.id_type = video.id_type', 'left');
        $this->db->join('status', 'status.id_status = video.id_status', 'left');
        $this->db->join('genre', 'genre.id_genre = video.id_genre', 'left');
        return $this->db->get()->result();
    }

    // public function get_genre(){
    //     $this->db->select('*');
    //     $this->db->from('genre');
    //     $this->db->join('film', 'film.id_genre = genre.id_genre', 'left');
    //     return $this->db->get()->result();
    // }

    // public function get_film_by_genre(){
    //     $this->db->select('*');
    //     $this->db->from('film');
    //     $this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');
    //     return $this->db->get()->result();
    // }

    public function get_country(){
        $this->db->select('*');
        $this->db->from('country');
        $this->db->order_by('id_country', 'desc');
        return $this->db->get()->result(); 
    }

    public function get_country_row($id_country){
        $this->db->select('*');
        $this->db->from('country');
        $this->db->where('id_country', $id_country);
        return $this->db->get()->row(); 
    }

    public function get_film_by_country($id_country){
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('country', 'country.id_country = film.id_country', 'left');
        $this->db->where('film.id_country', $id_country);
        return $this->db->get()->result();
    }

    public function get_status(){
        $this->db->select('*');
        $this->db->from('status');
        $this->db->order_by('id_status', 'desc');
        return $this->db->get()->result();
    }

    public function get_type(){
        $this->db->select('*');
        $this->db->from('type');
        $this->db->order_by('id_type', 'desc');
        return $this->db->get()->result();
    }

    // public function filter($id_film){
    //     $this->db->distinct();
    //     $this->db->select('*');
    //     $this->db->from('film');
    //     $this->db->join('type', 'type.id_type = film.id_type', 'left');
    //     $this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');
    //     $this->db->join('country', 'country.id_country = film.id_country', 'left');
    //     $this->db->where('id_film', $id_film);
    //     return $this->db->get()->row();
    // }

    public function getGenre(){
        $query = $this->db->get('genre');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getCountry(){
        $query = $this->db->get('country');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getType(){
        $query = $this->db->get('type');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getHasil($genre, $country, $type){
        $this->db->select('*', 'genre.nama_genre', 'genre.id_genre as genreId', 'country.nama_country', 'type.type_film');
        $this->db->from('film');
        $this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');
        $this->db->join('country', 'country.id_country = film.id_country', 'left');
        $this->db->join('type', 'type.id_type = film.id_type', 'left');
        $this->db->where(['genre.id_genre' => $genre, 'country.id_country' => $country, 'type.id_type' => $type]);
        $query = $this->db->get();
        return $query->result();
        
        
    }
}