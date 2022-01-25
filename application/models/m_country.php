<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_country extends CI_Model {

    public function get_country(){
        $this->db->select('*');
        $this->db->from('country');
        $this->db->order_by('id_country', 'desc');
        return $this->db->get()->result(); 
    }

    public function add($data){
        $this->db->insert('country', $data);
    }

    public function edit($data){
        $this->db->where('id_country', $data['id_country']);
        $this->db->update('country', $data);
    }

    public function delete($data){
        $this->db->where('id_country', $data['id_country']);
        $this->db->delete('country', $data);
    }

}

/* End of file ModelName.php */


?>