<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
  public function getChartData()
  {
    $this->db->select('id_surat, COUNT(id) as total, MONTH(dibuat_pada) as bulan');
    $this->db->group_by('id_surat, bulan');
    $this->db->order_by('bulan, id_surat');
    $result = $this->db->get('laporan_pengajuan')->result_array();

    $chartData = [];

    foreach ($result as $row) {
      $chartData[$row['id_surat']]['datasets'][] = (int)$row['total'];
    }

    // Menggabungkan data untuk setiap jenis surat menjadi satu array
    $mergedData = [];
    foreach ($chartData as $surat => $data) {
      $mergedData[] = [
        'label' => $surat,
        'backgroundColor' => '#' . substr(md5(mt_rand()), 0, 6), // Warna acak,
        'borderColor' => '#' . substr(md5(mt_rand()), 0, 6), // Warna acak
        'pointRadius' => false,
        'pointColor' => '#3b8bba',
        'pointStrokeColor' => 'rgba(60,141,188,1)',
        'pointHighlightFill' => '#fff',
        'pointHighlightStroke' => 'rgba(60,141,188,1)',
        'data' => $data['datasets']
      ];
    }

    return $mergedData;
  }

  public function getAllSDTKS()
  {
    $this->db->where('id_surat', 'Surat PBI DTKS APBD');
    $this->db->from('laporan_pengajuan');
    return $this->db->count_all_results();
  }

  public function getAllNDTKS()
  {
    $this->db->where('id_surat', 'Surat PBI Non DTKS');
    $this->db->from('laporan_pengajuan');
    return $this->db->count_all_results();
  }

  public function getTotalPengesah()
  {
    return $this->db->count_all_results('pengesah');
  }

  // Total Pemohon dalam satu bulan
  public function getTotalPemohonB()
  {
    $bulan_ini = date('m');
    $tahun_ini = date('Y');

    $query = $this->db->query(
      "SELECT COUNT(id) AS total_pemohon
              FROM pemohon
              WHERE MONTH(tanggal_terdata) = $bulan_ini
              AND YEAR(tanggal_terdata) = $tahun_ini
    "
    );

    $result = $query->row();
    return $result->total_pemohon;
  }

  // Total Permohonan DTKS APBD dalam satu bulan
  public function getTotalPemohonDTKS()
  {
    $bulan_ini = date('m');
    $tahun_ini = date('Y');

    $query = $this->db->query(
      "SELECT COUNT(id) AS total_pemohon
              FROM laporan_pengajuan
              WHERE id_surat = 'Surat PBI DTKS APBD'
              AND MONTH(dibuat_pada) = $bulan_ini
              AND YEAR(dibuat_pada) = $tahun_ini
    "
    );

    $result = $query->row();
    return $result->total_pemohon;
  }

  // Total Permohonan Non DTKS dalam satu bulan
  public function getTotalPemohonNDTKS()
  {
    $bulan_ini = date('m');
    $tahun_ini = date('Y');

    $query = $this->db->query(
      "SELECT COUNT(id) AS total_pemohon
              FROM laporan_pengajuan
              WHERE id_surat = 'Surat PBI Non DTKS'
              AND MONTH(dibuat_pada) = $bulan_ini
              AND YEAR(dibuat_pada) = $tahun_ini
    "
    );

    $result = $query->row();
    return $result->total_pemohon;
  }

  public function deletePengesah($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function proseseditPengesah()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'pangkat' => $this->input->post('pangkat'),
      'nip' => $this->input->post('nip'),
      'jabatan' => $this->input->post('jabatan')
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('pengesah', $data);
  }
}
