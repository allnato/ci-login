<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function verifyLogin($loginData){
    // Build Date for LastLogin
    $date = date("Y-m-d H:m:s");
    // Query Statement
    $result = $this->db->get_where('users', $loginData);

    // If credentials is not found.
    if ($result->num_rows() != 1) {
      return false;
    }
    // Update lastlogin
    $this->db->set('lastlogin', $date);
    $this->db->where('email', $loginData['email']);
    $this->db->update('users');
    return true;
  }

  public function getUserData($email){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $email);
    $result = $this->db->get();
    $row = $result->row();
    $userData = array(
      'firstname' => $row->firstname,
      'lastname' => $row->lastname,
      'email' => $row->birthdate,
      'address' => $row->address
    );

    return $userData;
  }
}
