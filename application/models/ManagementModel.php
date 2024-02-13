<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManagementModel extends CI_Model
{
  public function deleteMenu($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function getSubMenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
    return $this->db->query($query)->result_array();
  }

  public function deleteSubMenu($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function proseseditSubmenu()
  {
    $data = [
      'title' => $this->input->post('title'),
      'menu_id' => $this->input->post('menu_id'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('is_active')
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_sub_menu', $data);
  }

  public function penggunaByRole()
  {
    $query = "SELECT * FROM user
    JOIN role_id ON user.role_id = role_id.id
    ";

    return $this->db->query($query)->result_array();
  }

  public function deletePengguna($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}
