<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller{


  /**
   * Check Session.
   * Load the login page by default.
   */
  public function index(){

    $this->load->view('login');
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
      $userData = $this->Model->getUserData($loginData['email']);
      // Create Session Information
      $sessionData = array(
        'firstname' => $userData['firstname'],
        'email' => $userData['email'],
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

  public function home(){
    $homeData['name'] = $this->session->userdata('firstname');
    $this->load->view('home', $homeData);
  }

  public function profile(){

    $this->load->view('profile');
  }

  public function logout(){

    $this->load->view('login');
  }
}
