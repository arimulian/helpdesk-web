<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
          $data['tiket_wait'] = $this->M_tiket->tiket_wait();
          $data['tiket_proses'] = $this->M_tiket->tiket_proses();
          $data['tiket_close'] = $this->M_tiket->tiket_close();
          $data['tiket_user'] = $this->M_tiket->tiket_user();
          $data['user'] = $this->user_model->jumlah_user();
          $data['judul'] = 'Dashboard';
          $this->load->view('template/header', $data);
          $this->load->view('template/sidebar', $data);
          $this->load->view('template/topbar');
          $this->load->view('dashboard/index', $data);
          $this->load->view('template/footer');
     }

     public function profile()
     {
          $data['user'] = $this->user_model->set_profile();
          $data['judul'] = 'My Profile';
          $this->load->view('template/header', $data);
          $this->load->view('template/sidebar', $data);
          $this->load->view('template/topbar', $data);
          $this->load->view('dashboard/profile', $data);
          $this->load->view('template/footer');
     }


     // function tiket()
     // {
     //      $this->load->model('user_model');
     //      $data['judul'] = 'Daftar Tiket';
     //      $data['tiket'] = $this->user_model->get_tiket();
     //      $this->load->view('template/header',  $data);
     //      $this->load->view('template/sidebar');
     //      $this->load->view('template/topbar');
     //      $this->load->view('tiket/index', $data);
     //      $this->load->view('template/footer');
     // }

     // public function detail_tiket($no_tiket)
     // {
     //      $data['tiket'] = $this->user_model->get_no_tiket($no_tiket);
     //      if ($data['tiket']) {
     //           $data['title'] = 'Detail Tiket' . $data['tiket']->no_tiket;
     //           $this->load->view('template/header');
     //           $this->load->view('template/sidebar');
     //           $this->load->view('template/topbar');
     //           $this->load->view('tiket/detail', $data);
     //           $this->load->view('template/footer');
     //      }
     // }
}
