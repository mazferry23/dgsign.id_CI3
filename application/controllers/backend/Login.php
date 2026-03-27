<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

	public function index(){
		$this->load->view('backend/dashboard/login');
	}
	public function do_login(){
		$statusCode = 500;
		$messages = [];
		$this->load->model('Administrator_model');
		if(!isset($_POST['username']) || !isset($_POST['password'])){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(401)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Username or password cannot be empty.']));
		}
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password');
		$dataUser = $this->Administrator_model->findFirst(['admnUsername'=>$username]);
		if($dataUser){
			if(password_verify($password, $dataUser->admnPassword)){
				$statusCode = 200;
				unset($dataUser->admnPassword);
				$user_data = [
					'backend'=>$dataUser
				];
				$this->Administrator_model->update(['admnLastLogin'=>date('Y-m-d H:i:s')],['admnId'=>$dataUser->admnId]);
				$this->session->set_userdata('auth_login',$user_data);
				$messages = ['message'=>'Success login into system, please wait.'];
			}else{
				$statusCode = 401;
				$messages = ['error'=>TRUE,'message'=>'Login failed, please check your password.'];
			}
		}else{
			$statusCode = 401;
			$messages = ['error'=>TRUE,'message'=>'Login failed, please check your username and password.'];
		}
		$this->output
    		->set_content_type('application/json')
    		->set_status_header($statusCode)
    		->set_output(json_encode($messages));
	}

}
