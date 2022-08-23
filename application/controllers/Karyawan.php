<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('User_model');
          $this->load->model('M_jabatan');
          $this->load->model('M_departemen');
          $this->load->library('form_validation');
          $this->load->library('session');
          cek_login();
     }
     public function index()
     {
          $data['jabatan'] = $this->M_jabatan->get_jabatan();
          $data['departemen'] = $this->M_departemen->get_departemen();
          $data['judul'] = 'Daftar User';
          $data['pegawai'] = $this->User_model->getAlluser();
          $this->load->view('template/header',  $data);
          $this->load->view('template/sidebar',  $data);
          $this->load->view('template/topbar');
          $this->load->view('karyawan/d_user', $data);
          $this->load->view('template/footer');
     }
     public function add_karyawan()

     {
          $data['judul'] = 'Tambah User';
          $data['jabatan'] = $this->M_jabatan->get_jabatan();
          $data['departemen'] = $this->M_departemen->get_departemen();
          $this->load->view('template/header', $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('karyawan/tambah_u', $data);
          $this->load->view('template/footer');
     }

     public function save_karyawan()
     {
          $data['jabatan'] = $this->M_jabatan->get_jabatan();
          $data['judul'] = 'Tambah User';
          $this->form_validation->set_rules('nik', 'NIP', 'required|trim|is_unique[user.nik]');
          $this->form_validation->set_rules('username', 'Username', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
          $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
          if ($this->form_validation->run() == true) {
               $data['pegawai'] = $this->User_model->tambahDataUser();
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes add data
             </div>');
               redirect('karyawan', 'refresh');
          } else {
               $this->add_karyawan();
          }
     }

     public function edit_karyawan($id)
     {
          $data['user'] = $this->User_model->getAlluser();
          $data['judul'] = 'Edit user';
          $data['user'] = $this->User_model->get_id_user($id);
          if ($data['user']) {
               $data['departemen'] = $this->M_departemen->get_departemen();
               $data['jabatan'] = $this->M_jabatan->get_jabatan();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('karyawan/edit_u', $data);
               $this->load->view('template/footer');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> error</div>');
               redirect('karyawan', 'refresh');
          }
     }
     public function ubah_karyawan()
     {
          $this->form_validation->set_rules('nik', 'NIP', 'required|trim|is_unique[user.nik]');
          $this->form_validation->set_rules('username', 'Username', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
          $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
          if ($this->form_validation->run() == TRUE) {
               $this->add_karyawan();
          } else {
               $data = array(
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    // 'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                    'departemen' => $this->input->post('departemen', true),
                    'jabatan' => $this->input->post('jabatan', true),
                    'role_id' =>  $this->input->post('role_id', true),
                    'is_active' => $this->input->post('is_active', true),
                    'image_user' => 'default.jpg',
               );
               $this->User_model->update_user($this->input->post('id_user'), $data);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes Update data
             </div>');
               redirect('karyawan', 'refresh');
          }
     }
     public function delete_karyawan($id)
     {
          $delete = $this->User_model->get_id_user($id);
          if ($delete) {
               $this->User_model->delete_user($id);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes Delete data
             </div>');
               redirect('karyawan', 'refresh');
          } else {
          }
     }

     public function profile($id)
     {
          $data['user'] = $this->User_model->get_id_karyawan($id);
          if ($data['user']) {
               $data['judul'] = 'My Profile';
               $data['departemen'] = $this->M_departemen->get_departemen();
               $data['jabatan'] = $this->M_jabatan->get_jabatan();
               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar');
               $this->load->view('template/topbar');
               $this->load->view('dashboard/profile', $data);
               $this->load->view('template/footer');
          } else {
               redirect('dashboard', 'refresh');
          }
     }

     public function update_profile()
     {
          $this->form_validation->set_rules('nik', 'NIP', 'required|trim|is_unique[user.nik]');
          $this->form_validation->set_rules('username', 'Username', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
          $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
          if ($this->form_validation->run() == TRUE) {
               $this->add_karyawan();
          } else {
               $data = array(
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    // 'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                    'departemen' => $this->input->post('departemen', true),
                    'jabatan' => $this->input->post('jabatan', true),

               );
               // upload_img
               $upload_img = $_FILES['image_user']['name'];
               if ($upload_img) {
                    $config['upload_path']          = './assets/dist/img/profile/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = '2048';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image_user')) {
                         $new_image = $this->upload->data('file_name');
                         $this->db->set('image_user', $new_image);
                    } else {
                         echo $this->upload->display_errors();
                    }
               }
               $this->User_model->update_user($this->input->post('id_user'), $data);
               $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
               your has been succes Update data
             </div>');
               redirect('karyawan/profile/' . $this->session->id_user);
          }
     }
}
