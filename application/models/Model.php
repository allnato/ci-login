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

  public function getUserData($userid){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('userid', $userid);
    $result = $this->db->get();

    if($result->num_rows() == 0){
      return false;
    }

    $row = $result->row();

    $userData = array(
      'firstname' => $row->firstname,
      'lastname' => $row->lastname,
      'address' => $row->address,
      'email' => $row->email,
      'userid' => $row->userid
    );

    return $userData;
  }

  public function updateProfile($editedData){
    $userid = $this->session->userdata('userid');
    $this->db->where('userid', $userid);
    $this->db->update('users', $editedData);

    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function getUserID($email){

    $this->db->select('userid');
    $this->db->from('users');
    $this->db->where('email', $email);

    $result = $this->db->get();
    if($result->num_rows() > 0){
      return $result->row()->userid;
    }
    return false;
  }
}
