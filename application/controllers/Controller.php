<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller{


  /**
   * Check Session.
   * Load the login page by default.
   */
  public function index(){
    if($this->checkSession()){
      redirect(site_url('home'));
    }
    redirect(site_url('login'));
  }

  public function verifyLogin(){
    // Load the Model
    $this->load->model('Model');
    // Get the Login Data
    $loginData = array(
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password')
    );

    // Call the Model Function
    if($this->Model->verifyLogin($loginData)){

      // Get the login data of the user.
      $userID = $this->Model->getUserID($loginData['email']);
      $userData = $this->Model->getUserData($userID);
      // Create Session Information
      $sessionData = array(
        'userid' => $userData['userid'],
        'firstname' => $userData['firstname'],
        'email' => $loginData['email'],
        'logged_in' => true
      );
      // Create Session Instance
      $this->session->set_userdata($sessionData);
      // Redirect to homepage.
      redirect(site_url('home'));
    }

    $loginAction['error'] = 'Invalid Credentials';
    $this->load->view('login', $loginAction);
  }

  public function login(){
    if($this->checkSession()){
      redirect(site_url('home'));
    }
    $this->load->view('login');
  }

  public function home(){
    // If no session exist.
    if(!$this->checkSession()){
      $this->load->view('login');
      return;
    }
    // else
    $homeData['name'] = $this->session->userdata('firstname');
    $this->load->view('home', $homeData);
  }

  public function profile(){
    // If no session exist.
    if(!$this->checkSession()){
      $this->load->view('login');
      return;
    }
    // else

    // Load model to get user data.
    $this->load->model('Model');
    $data['userData'] = $this->Model->getUserData($this->session->userdata('userid'));
    $this->load->view('profile', $data);
  }

  public function logout(){
    // Destroy Session;
    $this->session->sess_destroy();
    redirect(site_url());
  }

  /**
   * Checks if a session exists.
   * @return bool true if session exist otherwise, false
   */
  public function checkSession(){
    if($this->session->has_userdata('firstname')){
      return true;
    }
    return false;
  }

  public function editProfile(){
    $editedData = array(
      'firstname' => $this->input->post('firstname'),
      'lastname' => $this->input->post('lastname'),
      'email' => $this->input->post('email'),
      'address' => $this->input->post('address')
    );
    $this->load->model('Model');
    $result = $this->Model->updateProfile($editedData);
    $this->updateSession();
    echo json_encode($result);
  }

  public function updateSession(){
    $this->load->model('Model');
    $userid = $this->session->userdata('userid');

    $userData = $this->Model->getUserData($userid);

    $this->session->set_userdata('firstname', $userData['firstname']);
    $this->session->set_userdata('email', $userData['email']);

  }

}
