<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  public function getAllPemohon()
  {
    $query = "SELECT * FROM pemohon ORDER BY nama ASC";
    return $this->db->query($query)->result_array();
  }
}
