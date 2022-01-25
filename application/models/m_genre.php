<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_genre extends CI_Model {

    public function get_genre(){
        $this->db->select('*');
        $this->db->from('genre');
        $this->db->order_by('id_genre', 'desc');
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('genre', $data);
    }

    public function edit($data){
        $this->db->where('id_genre', $data['id_genre']);
        $this->db->update('genre', $data);
    }

    public function delete($data){
        $this->db->where('id_genre', $data['id_genre']);
        $this->db->delete('genre', $data);
    }

}

/* End of file ModelName.php */


?>