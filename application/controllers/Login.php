<?php

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->helper('date');

        $this->load->library('Hash');
        $this->load->library("Authentication");
    }

	public function index(){
		$this->load->view('template/login');
	}
	
	public function validateLogin(){
        $status = "";
        $msg="";
		$this->load->model('login_model');
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $userVerifier = $this->login_model->getUserDataByUsername($username);
	    //$user = $this->login_model->validate($username, $password);

        if(isset($userVerifier)){
            if($this->hash->verifyPass($password, $userVerifier->password)){
                $data = array(
                    'userID' => $userVerifier->userID,
                    'userName' => $userVerifier->userName,
                    'superUserID' => $userVerifier->superUserID,
                    'role' => $userVerifier->userRole,
                    'is_logged_in' => true
                );

                if($userVerifier->userRole == "super_admin" || $userVerifier->userRole == "mediagnosis_admin"){
                    $data['superUserID'] = $userVerifier->userID;
                }

                $this->session->set_userdata($data);
                $status = 'success';
                $msg = "";
            }else{
                $status = 'error';
                $msg = "Username or Password is Wrong ! ";
            }
        }else{
            $status = 'error';
            $msg = "Username or Password is Wrong ! ";

        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
	}	
	
	public function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	public function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}

    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            $url_login = site_url("Login");
            echo 'You don\'t have permission to access this page. <a href="'.$url_login.'"">Login</a>';
            die();
            $this->load->view('login_form');
        }else{
            $data['main_content'] = '';
            $this->load->view('template/template',$data);
        }
    }

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}