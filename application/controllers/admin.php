<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
session_start();

/**
 * Description of admin
 *
 * @author Abrar
 */
class Admin extends CI_Controller
{
    //put your code here
    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect("login", "refresh");
        }
    }
    public function index(){
        $this->load->view('admin_logged_in');
    }
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email_address');
        session_destroy();
        $sdata['message'] = "You are Successfully Logout ! ";
        $this->session->set_userdata($sdata);
        redirect("login", "refresh");
    }
}

?>
