<?php
class M_tiket extends CI_Model
{
     public function get_tiket()
     {
          return $this->db->get('tiket')->result_array();
     }

     public function tiket_user()
     {
          $this->db->where('tiket.user_id', $this->session->userdata('id_user'));
          return $this->db->get('tiket')->result();
     }

     public function get_no_tiket($no_tiket)

     {
          $this->db->join('user', 'tiket.user_id = user.id_user', 'left');
          $this->db->join('departemen', 'user.departemen = departemen.id_departemen', 'left');
          $this->db->join('jabatan', 'user.jabatan = jabatan.id_jabatan', 'left');
          $this->db->join('detail_tiket', 'tiket.id = detail_tiket.tiket_id', 'left');
          $this->db->where('no_tiket', $no_tiket);
          return $this->db->get('tiket')->row();
     }

     function no_tiket()
     {
          $q = $this->db->query("SELECT MAX(RIGHT(no_tiket,4)) As no_tiket FROM tiket WHERE DATE(tgl_daftar)=CURDATE()");
          $kd = "";
          if ($q->num_rows() > 0) {
               foreach ($q->result() as $k) {
                    $tmp = ((int) $k->no_tiket) + 1;
                    $kd = sprintf("%04s", $tmp);
               }
          } else {
               $kd = "000";
          }

          return date('dmy') . $kd;
     }

     function insert($data)
     {
          return $this->db->insert('tiket', $data);
     }
     function insert_tanggapan($data)
     {
          return $this->db->insert('detail_tiket', $data);
     }

     public function get_id_tiket($id)
     {
          $this->db->where('id', $id);
          return $this->db->get('tiket');
     }

     public function delete($id)
     {
          $this->db->where('id', $id);
          $this->db->delete('tiket');
     }

     public function update($id, $data)
     {
          $this->db->where('id', $id);
          return $this->db->update('tiket', $data);
     }

     public function tiket_wait()
     {
          $this->db->select('*');
          $this->db->from('tiket');
          $this->db->where('status_tiket', 0);

          return $this->db->get()->num_rows();
     }
     public function tiket_proses()
     {
          $this->db->select('*');
          $this->db->from('tiket');
          $this->db->where('status_tiket', 2);

          return $this->db->get()->num_rows();
     }
     public function tiket_close()
     {
          $this->db->select('*');
          $this->db->from('tiket');
          $this->db->where('status_tiket', 3);

          return $this->db->get()->num_rows();
     }
}
