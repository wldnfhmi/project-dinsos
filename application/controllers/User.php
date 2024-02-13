<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel', 'user');
  }

  public function index()
  {
    $data['title'] = 'Input Data';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['pemohon'] = $this->user->getAllPemohon();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('User/index', $data);
    $this->load->view('Templates/footer');
  }

  public function tambahData()
  {
    $data['title'] = 'Tambah Data';
    $data['pemohon'] = $this->user->getAllPemohon();
    $data['kelurahan'] = $this->user->getAllKelurahan();
    $data['kecamatan'] = $this->user->getAllKecamatan();

    // Validasi inputan
    // Form Input Nomor KK memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    // 2. Exact Length (Memiliki panjang nilai pasti 16)
    // 3. Numeric (Tidak bisa diisi selain angka)
    $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|exact_length[16]|numeric', [
      'required' => 'Nomor KK harus diisi!',
      'exact_length' => 'Nomor KK harus berjumlah 16!',
      'numeric' => 'Nomor KK harus diisi angka!'
    ]);

    // Form Input NIK memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    // 2. Exact Length (Memiliki panjang nilai pasti 16)
    // 3. Numeric (Tidak bisa diisi selain angka)
    // 4. Is Unique (Memastikan nomor Nik belum terdaftar)
    $this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|numeric|is_unique[pemohon.nik]', [
      'required' => 'NIK harus diisi!',
      'exact_length' => 'NIK harus berjumlah 16!',
      'numeric' => 'NIK harus diisi angka!',
      'is_unique' => 'Nomor NIK sudah terdaftar!'
    ]);

    // Form Input Nama memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
      'required' => 'Nama harus diisi!'
    ]);

    // Form Input Jenis Kelamin memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin harus diisi'
    ]);

    // Form Input Tempat Lahir memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
      'required' => 'Tempat Lahir harus diisi!'
    ]);

    // Form Input Tanggal Lahir memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
      'required' => 'Tanggal Lahir harus diisi!'
    ]);

    // Form Input Alamat memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required' => 'Alamat harus diisi!'
    ]);

    // Form Input RT memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('rt', 'RT', 'required', [
      'required' => 'RT harus diisi!'
    ]);

    // Form Input RW memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('rw', 'RW', 'required', [
      'required' => 'RW harus diisi!'
    ]);

    // Form Input Kelurahan memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required', [
      'required' => 'Kelurahan harus diisi!'
    ]);

    // Form Input Kecamatan memiliki validasi yang harus dipenuhi
    // 1. Required (Harus Diisi)
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
      'required' => 'Kecamatan harus diisi!'
    ]);

    // Proses pengecekan validasi
    // Jika validasi menghasilkan false
    // Akan kembali kehalaman Inputan dengan mengirimkan pesan error
    if ($this->form_validation->run() == false) {
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('User/tambah-data', $data);
      $this->load->view('Templates/footer', $data);
    } else {
      $this->user->prosesTambahData();
    }
  }

  // Fungsi Mengubah data
  public function ubahData()
  {
    $this->user->prosesubahData();
  }

  // Fungsi Menghapus Data
  public function hapusData($id)
  {
    $where = array('id' => $id);
    $this->user->prosesHapusData($where, 'pemohon');
    $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
    redirect('User');
  }
}
