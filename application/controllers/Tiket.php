<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('user_model');
          $this->load->model('M_tiket');
          $this->load->library('form_validation');
          $this->load->library('session');
          cek_login();
     }
     public function index()
     {
          $data['judul'] = 'Data Tiket';
          $data['tiket'] = $this->M_tiket->get_tiket();
          $data['no_tiket'] = $this->M_tiket->no_tiket();
          $data['tiket_user'] = $this->M_tiket->tiket_user();
          $this->load->view('template/header', $data);
          $this->load->view('template/sidebar', $data);
          $this->load->view('template/topbar', $data);
          $this->load->view('tiket/d_tiket', $data);
          $this->load->view('template/footer', $data);
     }

     public function save_tiket()
     {
          $this->form_validation->set_rules('judul', 'Judul Tiket', 'required|trim');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi Tiket', 'required|trim');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run() == false) {
               $this->index();
          } else
               if ($_FILES['gambar_tiket']['error'] <> 4) {
               $config['upload_path']          = './assets/images/tiket/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 2048;
               $nama_file = $this->input->post('no_tiket') . date('YmdHis');
               $config['file_name'] = $nama_file;

               $this->load->library('upload', $config);


               if (!$this->upload->do_upload('gambar_tiket')) {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class=alert alert-danger>' . $error['error'] . '</div>');
                    $this->index();
               } else {
                    $gambar_tiket = $this->upload->data();
                    $data = array(
                         'no_tiket' => $this->input->post('no_tiket'),
                         'judul' => $this->input->post('judul'),
                         'deskripsi' => $this->input->post('deskripsi'),
                         'gambar_tiket' => $this->upload->data('file_name'),
                         'user_id' => $this->session->userdata('id_user'),
                         'status_tiket' => 0,
                         'tgl_daftar' => date('Y-m-d')
                    );
                    $this->M_tiket->insert($data);
                    $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Anda berhasil membuat Tiket baru
                            </div>');
                    redirect('Tiket', 'refresh');
               }
          } else {

               $data = array(
                    'no_tiket' => $this->input->post('no_tiket'),
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    // 'gambar_tiket' => $this->upload->data('file_name'),
                    'user_id' => $this->session->userdata('id_user'),
                    'status_tiket' => 0,
                    'tgl_daftar' => date('Y-m-d')
               );
               $this->M_tiket->insert($data);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                         Anda berhasil membuat Tiket baru
                       </div>');
               redirect('Tiket', 'refresh');
          }
     }


     public function save_tiket_waiting()
     {
          $this->form_validation->set_rules('status_tiket', 'Status Tiket', 'required|trim');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run() == false) {
               $this->index();
          } else {
               $data = [
                    'status_tiket' => '1',
               ];
               $this->M_tiket->update($this->input->post('id'), $data);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Tiket Berhasil direspon
                            </div>');
               redirect('Tiket', 'refresh');
          }
     }

     public function save_tanggapan()
     {
          $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required|trim');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run() == false) {
               $this->index();
          } else {
               if ($_FILES['gambar_tanggapan']['error'] <> 4) {
                    $config['upload_path']          = './assets/images/tanggapan/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    $nama_file = $this->input->post('tiket_id') . date('YmdHis');
                    $config['file_name'] = $nama_file;

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload('gambar_tanggapan')) {

                         $error = array('error' => $this->upload->display_errors());
                         $this->session->set_flashdata('message', '<div class=alert alert-danger>' . $error['error'] . '</div>');
                         $this->index();
                    } else {

                         if ($this->input->post('id')) {
                              $data = array(
                                   'status_tiket' => 2,
                              );
                              $this->M_tiket->update($this->input->post('id'), $data);
                         }
                         $gambar_tanggapan = $this->upload->data();
                         $data = array(
                              'tiket_id' => $this->input->post('id'),
                              'tanggapan' => $this->input->post('tanggapan'),
                              'gambar_tanggapan' => $this->upload->data('file_name'),
                              'waktu_tanggapan' => date('Y-m-d')
                         );
                         $this->M_tiket->insert_tanggapan($data);
                         $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Anda berhasil membri tanggapan
                            </div>');
                         redirect('Tiket', 'refresh');
                    }
               } else {
                    if ($this->input->post('id')) {
                         $data = array(
                              'status_tiket' => 2,
                         );
                         $this->M_tiket->update($this->input->post('id'), $data);
                    }
                    $data = array(
                         'tiket_id' => $this->input->post('id'),
                         'tanggapan' => $this->input->post('tanggapan'),
                         'waktu_tanggapan' => date('Y-m-d')
                    );
                    $this->M_tiket->insert_tanggapan($data);
                    $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Anda berhasil memberi tanggapan
                            </div>');
                    redirect('Tiket', 'refresh');
               }
          }
     }

     public  function save_close_tiket()
     {
          $this->form_validation->set_rules('status_tiket', 'Status Tiket', 'required|trim');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run() == false) {
               $this->index();
          } else {
               $data = [
                    'status_tiket' => $this->input->post('status_tiket'),
               ];
               $this->M_tiket->update($this->input->post('id'), $data);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Tiket Berhasil ditutup
                            </div>');
               redirect('Tiket', 'refresh');
          }
     }

     public function detail_tiket($no_tiket)
     {
          $data['tiket'] = $this->M_tiket->get_no_tiket($no_tiket);
          if ($data['tiket']) {
               $data['judul'] = 'Detail Tiket' . $data['tiket']->no_tiket;
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('tiket/tiket_detail', $data);
               $this->load->view('template/footer');
          } else {
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
                              Data tiket tidak diketahui
                            </div>');
               redirect('Tiket', 'refresh');
          }
     }
     public function delete_tiket($id)
     {
          $delete = $this->M_tiket->get_id_tiket($id);

          if ($delete) {
               $this->M_tiket->delete($id);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               Tiket Behasil Dihapus
             </div>');
               redirect('Tiket', 'refresh');
          } else {
               $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">
             Data tidak ditemukan
             </div>');
               redirect('Tiket', 'refresh');
          }
     }
}
