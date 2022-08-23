<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jabatan extends CI_Controller
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
          $this->load->library('form_validation');
          $this->load->model('M_jabatan');
          $data['judul'] = 'Daftar Jabatan';
          $data['jabatan'] = $this->M_jabatan->get_jabatan();
          $this->load->view('template/header',  $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('jabatan/index', $data);
          $this->load->view('template/footer');
     }
     public function add_jabatan()
     {
          $this->load->library('form_validation');
          $this->load->model('M_jabatan');
          $data['judul'] = 'Daftar jabatan';
          $this->load->view('template/header',  $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('jabatan/tambah_j', $data);
          $this->load->view('template/footer');
     }
     public function save_jabatan()
     {
          $this->load->model('M_jabatan');
          $this->load->library('form_validation');
          $this->load->library('session');
          $data['judul'] = 'Tambah jabatan';
          $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');

          if ($this->form_validation->run() == false) {
               $data['jabatan'] = $this->M_jabatan->tambahDatajabatan();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('jabatan/index', $data);
               $this->load->view('template/footer');
          } else {
               $this->M_jabatan->tambahDatajabatan();
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes add data
             </div>');
               redirect('jabatan');
          }
     }

     public function edit_jabatan($id)
     {
          $this->load->model('M_jabatan');
          $this->load->library('form_validation');
          $this->load->library('session');
          $data['judul'] = 'Edit Jabatan';
          $data['jbt'] = $this->M_jabatan->get_id_jabatan($id);
          if ($data['jbt']) {
               $data['jabatan'] = $this->M_jabatan->get_jabatan();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('jabatan/edit_j', $data);
               $this->load->view('template/footer');
          } else {
               redirect('jabatan', 'refresh');
          }
     }
     public function ubah_jabatan()
     {

          $this->load->model('M_jabatan');
          $this->load->library('form_validation');
          $this->load->library('session');
          $data = [
               'jabatan' => $this->input->post('jabatan')
          ];
          $this->M_jabatan->update_jabatan($this->input->post('id_jabatan'), $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          your has been succes update data
        </div>');
          redirect('jabatan', 'refresh');
     }
     public function delete_jabatan($id)
     {
          $this->load->model('M_jabatan');
          $this->load->library('form_validation');
          $this->load->library('session');
          $data['judul'] = 'Edit Jabatan';
          $delete['jbt'] = $this->M_jabatan->get_id_jabatan($id);
          if ($delete['jbt']) {
               $data['jabatan'] = $this->M_jabatan->delete_jabatan($id);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               your has been succes delete data
             </div>');
               redirect('jabatan', 'refresh');
          } else {
               redirect('jabatan', 'refresh');
          }
     }
}
