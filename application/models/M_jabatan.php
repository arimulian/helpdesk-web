<?php
class M_jabatan extends CI_Model
{
     public function get_jabatan()
     {

          return $this->db->get('jabatan')->result_array();
     }
     public function tambahDatajabatan()
     {
          $data = [
               'jabatan' => $this->input->post('jabatan')
          ];
          $this->db->insert('jabatan', $data);
     }

     public function get_id_jabatan($id)
     {
          $this->db->where('id_jabatan', $id);
          return $this->db->get('jabatan')->row_array();
     }

     public function update_jabatan($id, $data)
     {
          $this->db->where('id_jabatan', $id);
          $this->db->update('jabatan', $data);
     }

     public function delete_jabatan($id)
     {
          $this->db->where('id_jabatan', $id);
          $this->db->delete('jabatan');
     }
}
