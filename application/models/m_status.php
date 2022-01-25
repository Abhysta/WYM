<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_status extends CI_Model {

    public function get_status(){
        $this->db->select('*');
        $this->db->from('status');
        $this->db->order_by('id_status', 'desc');
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('status', $data);
    }

    public function edit($data){
        $this->db->where('id_status', $data['id_status']);
        $this->db->update('status', $data);
    }

    public function delete($data){
        $this->db->where('id_status', $data['id_status']);
        $this->db->delete('status', $data);
    }

}

/* End of file ModelName.php */


?>