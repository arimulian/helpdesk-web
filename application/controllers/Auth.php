<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->library('form_validation');
          $this->load->library('session');
     }
     public function index()
     {

          $data['judul'] = 'Login';
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
          $this->form_validation->set_rules('password', 'Password', 'required|trim');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
          if ($this->form_validation->run() == FALSE) {
               $this->load->view('auth/login', $data);
          } else {
               // valid sukses
               $this->_login();
          }
     }
     // fungsi login
     function _login()
     {
          // mencocokan data login ke database

          $email = $this->input->post('email');
          $password = $this->input->post('password');

          $user = $this->db->get_where('user', ['email' => $email])->row_array();

          // jika usernya ada
          if ($user) {
               // jika user aktif
               if ($user['is_active'] == 1) {
                    //cek password
                    if (password_verify($password, $user['password'])) {
                         $data = [
                              'id_user' => $user['id_user'],
                              'username' => $user['username'],
                              'email' => $user['email'],
                              'role_id' => $user['role_id'],
                              'image_user' => $user['image_user']
                         ];
                         $this->session->set_userdata($data);
                         redirect('dashboard');

                         if ($user['role_id'] == 1) {
                              redirect('dashboard');
                         } else {
                              echo '404';
                         }
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password!
             </div>');
                         redirect('Auth/index');
                    }
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
         Email is has not been activated!
         </div>');
                    redirect('Auth/index');
               }
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
   Email is not registed!
   </div>');
               redirect('Auth/index');
          }
     }


     public function register()
     {
          $data['judul'] = 'Register';
          $this->form_validation->set_rules('nik', 'NIP', 'required|trim|is_unique[user.nik]');
          $this->form_validation->set_rules('username', 'Username', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
          $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
          $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

          $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
          if ($this->form_validation->run() == true) {
               $data = [
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 1,
                    'image_user' => 'default.jpg',
                    'created' => time()
               ];
               $this->db->insert('user', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                 Your account has been created. Please Login!
               </div>');
               redirect('Auth', 'refresh');
          } else {
               $this->load->view('Auth/register');
          }
     }

     public function logout()
     {
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('role_id');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your have been logged out!
      </div>');
          redirect('auth');
     }
}
