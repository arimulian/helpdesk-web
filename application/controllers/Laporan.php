<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          $this->load->model('M_laporan');
          cek_login();
     }
     public function index()
     {
          $data['judul'] = 'Laporan';
          $this->load->view('template/header', $data);
          $this->load->view('template/sidebar');
          $this->load->view('template/topbar');
          $this->load->view('laporan/laporan');
          $this->load->view('template/footer');
     }

     public function print_laporan()
     {
          $tgl_akhir = $this->input->post('tgl_awal');
          $tgl_awal = $this->input->post('tgl_akhir');
          $data['get_laporan'] = $this->M_laporan->get_periode_laporan($tgl_awal, $tgl_akhir)->result();
          $this->load->view('laporan/print_laporan', $data);
     }
}
