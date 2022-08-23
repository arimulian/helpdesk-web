<?php
class User_model extends CI_Model
{
     public function getAlluser()
     {
          return $this->db->get('user')->result_array();
     }

     public function tambahDataUser()
     {
          $data = [

               'nik' => htmlspecialchars($this->input->post('nik', true)),
               'username' => htmlspecialchars($this->input->post('username', true)),
               'email' => htmlspecialchars($this->input->post('email', true)),
               'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
               'departemen' => $this->input->post('departemen', true),
               'jabatan' => $this->input->post('jabatan', true),
               'role_id' => 2,
               'is_active' => 1,
               'image_user' => 'default.jpg',
               'created' => time()
          ];
          $this->db->insert('user', $data);
     }

     public function get_id_user($id)

     {
          $this->db->where('id_user', $id);
          return $this->db->get('user')->row();
     }
     public function update_user($id, $data)
     {
          $this->db->where('id_user', $id);
          $this->db->update('user', $data);
     }

     public function delete_user($id)
     {
          $this->db->where('id_user', $id);
          $this->db->delete('user');
     }

     public function jumlah_user()
     {
          $this->db->select('*');
          $this->db->from('user');


          return $this->db->get()->num_rows();
     }

     public function get_id_karyawan($id)
     {
          $this->db->where('id_user', $id);
          return $this->db->get('user')->row();
     }


     // public function getAlluserbyId($id)
     // {
     //      return $this->db->get_where('user_tb', ['id' => $id])->row_array();
     // }
}
// public function get_tiket()
// {
//      return $this->db->get('tiket')->result_array();
// }

// public function get_no_tiket($no_tiket)
// {
//      $this->db->join('user', 'tiket.user_id= user.id', 'left');
//      $this->db->where('no_tiket', $no_tiket);

//      return $this->db->get('tiket')->row();
// }