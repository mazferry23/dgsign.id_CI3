<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
		$this->load->helper('string');
	}
	public function index(){
		$this->allowed_level(['admin','super','client','root','vendor']);
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('User','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'user/list_user';
		$data_view['title']   = 'User Management';
		$data_view['scripts'] = 'scripts/user/datatables';

		$data_view['js']	  = [
				base_url('public/backend/assets/datatables/js/jquery.dataTables.min.js'),
				base_url('public/backend/assets/datatables/js/bootstrap4.min.js'),
				base_url('public/backend/assets/select2/js/select2.min.js'),
				//base_url('public/backend/assets/datatables/Responsive-2.2.3/js/responsive.bootstrap4.min.js'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/datatables/css/dataTables.bootstrap4.min.css'),
				//base_url('public/backend/assets/datatables/Responsive-2.2.3/css/responsive.bootstrap4.min.css'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.css'),
				base_url('public/backend/assets/select2/css/select2.min.css'),
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function select2_admnLevel(){
		$statusCode = 500;
		$messages = [];
		$query = "SELECT admnType_Id as id, admnType_Name as `text` FROM administrator_type WHERE admnType_Deleted IS NULL LIMIT 20;";
		if(isset($_POST['q'])){
			$q = $this->input->post('q',TRUE);
			$query = "SELECT admnType_Id as id, admnType_Name as `text` FROM administrator_type WHERE admnType_Deleted IS NULL and (admnType_Name like '%$q%') LIMIT 20;";
		}
		$data = $this->db->query($query);
		if($data){
			$statusCode = 200;
			$messages = ['results'=>$data->result_array()];
		}
		$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($statusCode)
	    		->set_output(json_encode($messages));
	}
	public function select2_admnUsrId(){
		$statusCode = 500;
		$messages = [];
		$query = "SELECT admnUsername as id, admnUsername as `text` FROM administrator WHERE (admnLevel ='client' or admnLevel ='vendor' or admnLevel ='admin') and admnDeleted IS NULL LIMIT 20;";
		if(isset($_POST['q'])){
			$q = $this->input->post('q',TRUE);
			$query = "SELECT admnUsername as id, admnUsername as `text` FROM administrator WHERE (admnLevel ='client' or admnLevel ='vendor' or admnLevel ='admin') and admnDeleted IS NULL and (admnUsername like '%$q%') LIMIT 20;";
		}
		$data = $this->db->query($query);
		if($data){
			$statusCode = 200;
			$messages = ['results'=>$data->result_array()];
		}
		$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($statusCode)
	    		->set_output(json_encode($messages));
	}
	public function select2_admnCliId(){
		$statusCode = 500;
		$messages = [];
		$query = "SELECT admnUsername as id, admnUsername as `text` FROM administrator WHERE (admnLevel ='client' or admnLevel ='vendor') and admnDeleted IS NULL LIMIT 20;";
		if(isset($_POST['q'])){
			$q = $this->input->post('q',TRUE);
			$query = "SELECT admnUsername as id, admnUsername as `text` FROM administrator WHERE (admnLevel ='client' or admnLevel ='vendor') and admnDeleted IS NULL and (admnUsername like '%$q%') LIMIT 20;";
		}
		$data = $this->db->query($query);
		if($data){
			$statusCode = 200;
			$messages = ['results'=>$data->result_array()];
		}
		$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($statusCode)
	    		->set_output(json_encode($messages));
	}
	public function create(){
		$this->allowed_level(['admin','super','client','root']);
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('User',site_url('backend/user'));
		$this->breadcrumbs->push('Create','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'user/create';
		$data_view['title']   = 'Create User';
		$data_view['scripts'] = 'scripts/user/form';
		$data_view['js']	  = [
				base_url('public/backend/js/jquery.validate.min.js'),
				base_url('public/backend/assets/select2/js/select2.min.js'),
				base_url('public/backend/assets/toastr-master/toastr.js'),
				base_url('public/backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/toastr-master/toastr.css'),
				base_url('public/backend/assets/select2/css/select2.min.css'),
				base_url('public/backend/assets/bootstrap-datetimepicker/css/datetimepicker.css')
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function save_new(){
		$this->allowed_level(['admin','super','client','root']);
		$status = 500;
		//$messages = [];
		$this->form_validation->set_rules('admnUsername', 'Username', 'required|is_unique[administrator.admnUsername]');
		//$this->form_validation->set_rules('admnCliId', 'Admin Client ID', 'required');
		$this->form_validation->set_rules('admnFirstname', 'First Name', 'required');
		$this->form_validation->set_rules('admnEmail', 'Email', 'required');
		$this->form_validation->set_rules('admnPhone', 'Phone', 'required');
		$this->form_validation->set_rules('admnPassword', 'Password', 'required');
		$this->form_validation->set_rules('admnConfirmPassword', 'Confirm Password', 'matches[admnPassword]');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			//$rand = rand_chars("ABCEDFG", 10);
			$insert['admnUsername'] = $this->input->post('admnUsername');
			if(!empty($this->input->post('admnCliId'))){
				$insert['admnCliId'] = $this->input->post('admnCliId');
			}else{
				$insert['admnCliId'] = $this->input->post('admnUsername');
				//$insert['admnCliId'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
			}
			$insert['admnFirstname'] = $this->input->post('admnFirstname');
			$insert['admnLastName'] = $this->input->post('admnLastName');
			$insert['admnEmail'] = $this->input->post('admnEmail');
			$insert['admnPhone'] = $this->input->post('admnPhone');
			$insert['admnUsrId'] = $this->input->post('admnUsrId');
			if($this->input->post('admnLevel')=='1'){
				$insert['admnLevel'] = 'root';
			}elseif($this->input->post('admnLevel')=='2'){
				$insert['admnLevel'] = 'admin';
			}elseif($this->input->post('admnLevel')=='3'){
				$insert['admnLevel'] = 'vendor';
			}elseif($this->input->post('admnLevel')=='4'){
				$insert['admnLevel'] = 'client';
			}elseif($this->input->post('admnLevel')=='5'){
				$insert['admnLevel'] = 'operator edit';
			}elseif($this->input->post('admnLevel')=='6'){
				$insert['admnLevel'] = 'operator view';
			}elseif($this->input->post('admnLevel')=='7'){
				$insert['admnLevel'] = 'operator scanner';
			}
			$insert['admnPassword'] = password_hash($this->input->post('admnPassword'),PASSWORD_DEFAULT,['cost'=>10]);
			$iId = $this->Administrator_model->create($insert);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create new user.'];
			}else{
				$status = 201;
				$messages = ['message'=>'User successfully created.','ID'=>$iId];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}


	}
	public function save_edit(){
		$this->allowed_level(['admin','super','client','root']);
		$status = 500;
		$messages = [];
		$data = $this->Administrator_model->findByID($this->input->post('admnId'));
		// $username = $this->input->post('admnUsername');
		// if($data->admnUsername!=$username){
		// 	$this->form_validation->set_rules('admnUsername', 'Username', 'required|is_unique[administrator.admnUsername]');
		// }
		$this->form_validation->set_rules('admnCliId', 'Admin Client ID', 'required');
		$this->form_validation->set_rules('admnFirstname', 'First Name', 'required');
		$this->form_validation->set_rules('admnEmail', 'Email', 'required');
		$this->form_validation->set_rules('admnPhone', 'Phone', 'required');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(
        				[
        					'error'=>'Forbidden Access',
        					'message'=>'Please complete field.',
        					'error_form'=>$this->form_validation->error_array()
        				]
        			));
		}else{
			$insert['admnCliId'] = $this->input->post('admnCliId');
			$insert['admnFirstname'] = $this->input->post('admnFirstname');
			$insert['admnLastName'] = $this->input->post('admnLastName');
			$insert['admnEmail'] = $this->input->post('admnEmail');
			$insert['admnPhone'] = $this->input->post('admnPhone');
			//$insert['admnLevel'] = $this->input->post('admnLevel');
			
			$ID = $this->input->post('admnId');
			$iId = $this->Administrator_model->update($insert,['admnId'=>$ID]);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create new.'];
			}else{
				$status = 202;
				$messages = ['message'=>'successfully updated.'];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}
	}
	//host/backend/topik/edit/5
	public function edit(){
		$this->allowed_level(['admin','super','client','root']);
		$ID = $this->uri->segment(4);
		$data = $this->Administrator_model->findByID($ID);
		if(!isset($data->admnIsDeleted) || $data->admnIsDeleted==1){
			redirect('backend/site');
		}
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('User',site_url('backend/user'));
		$this->breadcrumbs->push('Edit','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'user/edit';
		$data_view['title']   = 'Edit User';
		$data_view['scripts'] = 'scripts/user/edit';
		$data_view['dataAdmn']= $data;
		$data_view['js']	  = [
				base_url('public/backend/js/jquery.validate.min.js'),
				base_url('public/backend/assets/toastr-master/toastr.js'),
				base_url('public/backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/toastr-master/toastr.css'),
				base_url('public/backend/assets/bootstrap-datetimepicker/css/datetimepicker.css')
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function delete(){
		$this->allowed_level(['admin','super','client']);
		$ID = $this->uri->segment(4);
		$data = $this->Administrator_model->delete(['admnId'=>$ID]);
		if($data){
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header(202)
	    		->set_output(json_encode(['message'=>'Successfully delete data.']));
	    }else{
	    	$this->output
	    		->set_content_type('application/json')
	    		->set_status_header(401)
	    		->set_output(json_encode(['message'=>'Cannot delete data.','error'=>'Forbidden Access']));
	    }
	}
	public function datatables(){
		$this->allowed_level(['admin','super','root','vendor','client']);
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->library('Datatables');
			$this->datatables->select('
					administrator.admnId,
					administrator.admnCliId,
					administrator.admnUsername,
					administrator.admnFirstname,
					administrator.admnLastName,
					administrator.admnEmail,
					administrator.admnPhone,
					administrator.admnLevel,
					administrator.admnCreated');
			$this->datatables->from('administrator');
			$this->datatables->where('administrator.admnLevel <>','root');
			$this->datatables->where('administrator.admnIsDeleted','0');
			if ($_SESSION['auth_login']['backend']->admnLevel == 'vendor'){
				$this->datatables->where('administrator.admnUsrId',$_SESSION['auth_login']['backend']->admnUsername);
			}
			if ($_SESSION['auth_login']['backend']->admnLevel == 'client'){
				$this->datatables->where('administrator.admnCliId',$_SESSION['auth_login']['backend']->admnCliId);
			}
			
			$links = anchor('backend/user/edit/$1','<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item']).' '.
				'<a href="javascript:;" class="dropdown-item" onClick="deleteAdmin($1)"><i class="fa fa-trash-o"></i> Delete</a> '.
				'<!--a href="javascript:;" class="dropdown-item" onClick="resetPassword($1)"><i class="fa fa-refresh"></i> Reset</a--> ';
			$this->datatables->add_column(
				'action2',
				'<div class="btn-group"><button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>'
				,"admnId");
			$this->datatables->add_column(
				'action',
				function($userdata){
					if($userdata['admnId']!=$_SESSION['auth_login']['backend']->admnId){
						$links = anchor('backend/user/edit/'.$userdata['admnId'],'<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item']).' '.
							'<a href="javascript:;" class="dropdown-item" onClick="deleteAdmin('.$userdata['admnId'].')"><i class="fa fa-trash-o"></i> Delete</a> ';
						return '<div class="btn-group"><button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>';
					}else{
						return 'Anda';
					}

				}
			);
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header(200)
	    		->set_output($this->datatables->generate());
		}else{
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header(401)
	    		->set_output(json_encode(['message'=>'Cannot serve data.','error'=>'Method not allowed']));
		}
	}
	public function profile(){
		$data = $this->Administrator_model->findByID($_SESSION['auth_login']['backend']->admnId);
		if($data->admnIsDeleted==1){
			echo 'udah dihapus';
		}
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('User',site_url('backend/user'));
		$this->breadcrumbs->push('Profile','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'user/profile';
		$data_view['title']   = 'User Profile';
		//$data_view['scripts'] = 'user/edit';
		$data_view['dataAdmn']= $data;
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function change_password(){
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('User',site_url('backend/user'));
		$this->breadcrumbs->push('Profile','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'user/change_password';
		$data_view['title']   = 'Change Password';
		$data_view['scripts'] = 'scripts/user/change_pass';
		$data_view['js']	  = [
				base_url('public/backend/js/jquery.validate.min.js'),
				base_url('public/backend/assets/toastr-master/toastr.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/toastr-master/toastr.css')
			];
		$this->load->view('backend/parts/layout',$data_view);

	}
	private function password_check($password){
		$data = $this->Administrator_model->findByID($_SESSION['auth_login']['backend']->admnId);
		if($data){
			if(password_verify($password, $data->admnPassword)){
				return TRUE;
			}else{
				$this->form_validation->set_message('password_check', 'Please check {field}');
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('password_check', 'Please check {field}');
			return FALSE;
		}
	}
	public function save_change_password(){
		$statusCode = 500;
		$messages = [];
		$this->form_validation->set_rules('admnOldPassword', 'Old Password', 'required');
		$this->form_validation->set_rules('admnNewPassword', 'New Password', 'required');
		$this->form_validation->set_rules('admnConfirmPassword', 'Confirm Password', 'required|matches[admnNewPassword]');
		if($this->form_validation->run()==FALSE){
			return $this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(
        				[
        					'error'=>'Forbidden Access',
        					'message'=>'Please complete field.',
        					'error_form'=>$this->form_validation->error_array()
        				]
        			));
        	die();
		}else{
			$data = $this->Administrator_model->findByID($_SESSION['auth_login']['backend']->admnId);
			if($data){
				if(password_verify($this->input->post('admnOldPassword'), $data->admnPassword)){
					$newPassword = password_hash($this->input->post('admnNewPassword'),PASSWORD_DEFAULT,['const'=>10]);
					$update = $this->Administrator_model->update(['admnPassword'=>$newPassword],['admnId'=>$_SESSION['auth_login']['backend']->admnId]);
					if($update){
						$statusCode = 201;
						$messages = ['message'=>'Successfully change password'];

					}else{
						$statusCode = 500;
						$messages = ['message'=>'Change password failed. Database error'];
					}
				}else{
					$statusCode = 500;
					$messages = ['message'=>'Change password failed. Old password not valid'];
				}

			}else{
				$statusCode = 500;
				$messages = ['message'=>'Change password failed. Please check your login'];
			}


		}
		$this->output
    		->set_content_type('application/json')
    		->set_status_header($statusCode)
    		->set_output(json_encode(
    				$messages
    			));
	}
}
