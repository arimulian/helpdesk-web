<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Departemen extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('M_departemen');
          $this->load->library('session');
          $this->load->library('form_validation');
          cek_login();
     }
     public function index()
     {
          $this->load->model('M_departemen');
          $data['judul'] = 'Daftar Departemen';
          $data['departemen'] = $this->M_departemen->get_departemen();
          $this->load->view('template/header',  $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('departemen/index', $data);
          $this->load->view('template/footer');
     }
     public function add_departemen()
     {
          $this->load->library('form_validation');
          $this->load->model('M_departemen');
          $data['judul'] = 'Daftar Departemen';
          $this->load->view('template/header',  $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('departemen/tambah_d', $data);
          $this->load->view('template/footer');
     }

     public function save_departemen()
     {
          $data['judul'] = 'Tambah departemen';
          $this->form_validation->set_rules('departemen', 'departemen', 'required|trim');

          if ($this->form_validation->run() == false) {
               $data['departemen'] = $this->M_departemen->tambahDatadepartemen();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('departemen/index', $data);
               $this->load->view('template/footer');
          } else {
               $this->M_departemen->tambahDatadepartemen();
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes add data
             </div>');
               redirect('departemen', 'refresh');
          }
     }

     public function edit_departemen($id)
     {

          $data['judul'] = 'Edit departemen';
          $data['dpt'] = $this->M_departemen->get_id_departemen($id);
          if ($data['dpt']) {
               $data['jabatan'] = $this->M_departemen->get_departemen();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('departemen/edit_d', $data);
               $this->load->view('template/footer');
          } else {
               redirect('departemen', 'refresh');
          }
     }
     public function ubah_departemen()
     {

          $data = [
               'departemen' => $this->input->post('departemen')
          ];
          $this->M_departemen->update_departemen($this->input->post('id_departemen'), $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          your has been succes update data
        </div>');
          redirect('departemen', 'refresh');
     }

     public function delete_departemen($id)
     {
          $delete['dpt'] = $this->M_departemen->get_id_departemen($id);
          if ($delete['dpt']) {
               $data['departemen'] = $this->M_departemen->delete_departemen($id);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               your has been succes Delete data
             </div>');
               redirect('departemen', 'refresh');
          } else {
               redirect('departemen', 'refresh');
          }
     }
}
