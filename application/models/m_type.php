<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_type extends CI_Model {

    public function get_type(){
        $this->db->select('*');
        $this->db->from('type');
        $this->db->order_by('id_type', 'desc');
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('type', $data);
    }

    public function edit($data){
        $this->db->where('id_type', $data['id_type']);
        $this->db->update('type', $data);
    }

    public function delete($data){
        $this->db->where('id_type', $data['id_type']);
        $this->db->delete('type', $data);
    }

}

/* End of file ModelName.php */


?>