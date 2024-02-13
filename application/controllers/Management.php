<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('managementModel', 'management');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Manage Menu';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
      'required' => 'Menu Title harus diisi!',
      'is_unique' => 'Menu Title sudah ada!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Management/index', $data);
      $this->load->view('Templates/footer', $data);
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('flash', 'Menu Berhasil Ditambahkan');
      redirect('Management');
    }
  }

  public function hapusMenu($id)
  {
    $where = array('id' => $id);
    $this->management->deleteMenu($where, 'user_menu');
    $this->session->set_flashdata('flash', 'Menu Berhasil Dihapus');
    redirect('Management');
  }

  public function subMenu()
  {
    $data['title'] = 'Manage Sub Menu';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['subMenu'] = $this->management->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Management/submenu', $data);
      $this->load->view('Templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active'),
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('flash', 'Sub Menu Berhasil Ditambahkan');
      redirect('Management/subMenu');
    }
  }

  public function hapusSubMenu($id)
  {
    $where = array('id' => $id);
    $this->management->deleteSubMenu($where, 'user_sub_menu');
    $this->session->set_flashdata('flash', 'Sub Menu Berhasil Dihapus');
    redirect('Management/subMenu');
  }

  public function proseseditSubmenu()
  {
    $this->management->proseseditSubmenu();
    $this->session->set_flashdata('flash', 'Sub Menu Berhasil Diperbaharui');
    redirect('Management/subMenu');
  }

  public function tambahPengguna()
  {
    $data['title'] = 'Tambah Pengguna';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['pengguna'] = $this->management->penggunaByRole();

    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]|trim', [
      'min_length' => 'Username harus terdiri 5 karakter!',
      'is_unique' => 'Username sudah terdaftar!'
    ]);

    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|trim|matches[password2]', [
      'min_length' => 'Password harus terdiri 5 karakter!',
      'matches' => 'Konfirmasi password tidak sama!'
    ]);

    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password1]', [
      'matches' => 'Konfirmasi password tidak sama!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Management/tambah-pengguna', $data);
      $this->load->view('Templates/footer');
    } else {
      $data = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('flash', 'Akun Pengguna Baru Berhasil Ditambahkan');
      redirect('Management/tambahPengguna');
    }
  }

  public function hapusPengguna($id)
  {
    $where = array('id' => $id);
    $this->management->deletePengguna($where, 'user');
    $this->session->set_flashdata('flash', 'Akun Pengguna Berhasil Dihapus');
    redirect('Management/tambahPengguna');
  }
}
