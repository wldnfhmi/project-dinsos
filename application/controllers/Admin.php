<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AdminModel', 'admin');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['areaChartData'] = $this->admin->getChartData();
    $data['s_dtks'] = $this->admin->getAllSDTKS();
    $data['s_ndtks'] = $this->admin->getAllNDTKS();
    $data['pengesah'] = $this->admin->getTotalPengesah();

    $total_pemohon = $this->admin->getTotalPemohonB();
    $total_dtks = $this->admin->getTotalPemohonDTKS();
    $total_ndtks = $this->admin->getTotalPemohonNDTKS();

    // Presentase
    $target_total = 2000;
    $presentase_progress = ($total_pemohon / $target_total) * 100;
    $presentase_progress_dtks = ($total_dtks / $target_total) * 100;
    $presentase_progress_ndtks = ($total_ndtks / $target_total) * 100;

    $data['total_pemohon'] = $total_pemohon;
    $data['presentase_progress'] = $presentase_progress;
    $data['total_dtks'] = $total_dtks;
    $data['presentase_progress_dtks'] = $presentase_progress_dtks;
    $data['total_ndtks'] = $total_ndtks;
    $data['presentase_progress_ndtks'] = $presentase_progress_ndtks;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }
}
