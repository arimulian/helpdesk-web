<?php
defined('BASEPATH') or exit('No direct script access allowed');

function cek_login()
{
     $CI = &get_instance();
     $email = $CI->session->email;

     if ($email == null) {
          $CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Anda harus login terlebih dahulu
        </div>');
          redirect('auth', 'refresh');
     }
}

function is_it()
{
     $CI = &get_instance();
     $tipeuser = $CI->session->role_id;

     if ($tipeuser == '1') {
          return $tipeuser;
     }
     return null;
}
