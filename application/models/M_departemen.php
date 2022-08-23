<?php
class M_departemen extends CI_Model
{

     public function get_departemen()
     {

          return $this->db->get('departemen')->result_array();
     }

     public function tambahDatadepartemen()
     {
          $data = [
               'departemen' => $this->input->post('departemen')
          ];

          $this->db->insert('departemen', $data);
     }
     public function get_id_departemen($id)
     {
          $this->db->where('id_departemen', $id);
          return $this->db->get('departemen')->row_array();
     }

     public function update_departemen($id, $data)
     {
          $this->db->where('id_departemen', $id);
          $this->db->update('departemen', $data);
     }
     public function delete_departemen($id)
     {
          $this->db->where('id_departemen', $id);
          $this->db->delete('departemen');
     }
}
