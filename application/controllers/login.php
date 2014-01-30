<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

/**
 * Description of Login
 *
 * @author abrar
 * @vesion 0.1
 */
class Login extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
            $this->load->model('login_model');
            $user_id=$this->session->userdata('user_id');
            if($user_id!=NULL)
                    {
                       redirect("admin","refresh"); 
                    }
    }
    public function index()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email_address','Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[4]');
        if($this->form_validation->run()!=false){
            // then validation passed. Get from db
        $email_address=$this->input->post('email_address',true);
        $password=$this->input->post('password',true);
        $result=$this->login_model->check_login_info($email_address,$password);
        if($result)
        {
            $sdata['email_address']=$result->email_address;
            $sdata['user_id']=$result->user_id;
            $this->session->set_userdata($sdata);
            redirect("admin","refresh");            
        }
        else{
            $sdata['exception']=NULL;
            $sdata['error']="User Email Or Password Invalid !";
            $this->session->set_userdata($sdata);
        }
            }
        $this->load->view('include/header');
        $this->load->view('login_view');
        $this->load->view('include/footer');
    }
    
}

?>
