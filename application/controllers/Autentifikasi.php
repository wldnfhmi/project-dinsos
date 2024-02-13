<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Login Page';

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page';
      $this->load->view('Templates/aute_header', $data);
      $this->load->view('Auth/login');
      $this->load->view('Templates/aute_footer');
    } else {
      // validation success
      $this->_login();
    }
    // $username = $this->input->post('username');
    // $password = $this->input->post('password');

    // if($username == 'admin' && $password == 'admin') {
    //   redirect('Menu/dashboard');
    // } else {
    //   $this->load->view('templates/aute_header', $data);
    //   $this->load->view('login');
    //   $this->load->view('templates/aute_footer');
    // }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    // User available
    if ($user) {
      // User is active
      if ($user['is_active'] == 1) {
        // Check password
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('Admin');
          } else {
            redirect('User');
          }
        } else {
          redirect('Autentifikasi');
        }
      } else {
        redirect('Autentifikasi');
      }
    } else {
      redirect('Autentifikasi');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    redirect('Autentifikasi');
  }
}
