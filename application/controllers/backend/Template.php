<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Template extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
		//$this->allowed_level(['admin','super']);
	}
	public function index(){
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Template','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'template/list';
		$data_view['title']   = 'Template';
		$data_view['scripts'] = 'scripts/template/datatable';

		$data_view['js']	  = [
				base_url('public/backend/assets/datatables/js/jquery.dataTables.min.js'),
				base_url('public/backend/assets/datatables/js/bootstrap4.min.js'),
				//base_url('public/backend/assets/datatables/Responsive-2.2.3/js/responsive.bootstrap4.min.js'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/datatables/css/dataTables.bootstrap4.min.css'),
				//base_url('public/backend/assets/datatables/Responsive-2.2.3/css/responsive.bootstrap4.min.css'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.css')
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function select2_template(){
		$statusCode = 500;
		$messages = [];
		$query = "SELECT tpl_Id as id, tpl_Name as `text` FROM templates WHERE tpl_Deleted IS NULL ;";
		if(isset($_POST['q'])){
			$q = $this->input->post('q',TRUE);
			$query = "SELECT tpl_Id as id, tpl_Name as `text` FROM templates WHERE tpl_Deleted IS NULL and (tpl_Name like '%$q%') ;";
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
		die('Coming soon');
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Customer',site_url('backend/Customer'));
		$this->breadcrumbs->push('Create','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'Customer/form';
		$data_view['title']   = 'Create Customer';
		$data_view['scripts'] = 'scripts/customer/form_create';
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
	public function save_new(){
		die('Coming soon');
		$status = 500;
		$messages = [];
		$this->form_validation->set_rules('cstmName', 'Nama Customer', 'required');
		$this->form_validation->set_rules('cstmPhone', 'Telepon', 'required');
		$this->form_validation->set_rules('cstmEmail', 'Email', 'required');
		$this->form_validation->set_rules('cstmAddress', 'Alamat', 'required');

		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			$insert['cstmName'] = $this->input->post('cstmName');
			$insert['cstmPhone'] = $this->input->post('cstmPhone');
			$insert['cstmEmail'] = $this->input->post('cstmEmail');
			$insert['cstmAddress'] = $this->input->post('cstmAddress');
			$iId = $this->Customer_model->create($insert);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create new Customer'];
			}else{
				$status = 201;
				$messages = ['message'=>'Customer successfully created.','ID'=>$iId];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}


	}
	public function delete(){
		die('Coming soon');
		$ID = $this->uri->segment(4);
		$data = $this->Customer_model->soft_delete(['cstmId'=>$ID]);
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
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->library('Datatables');
			$this->datatables->select('tpl_Id,tpl_Name,tpl_Screenshot');
			$this->datatables->from('templates');
			$this->datatables->where('tpl_Deleted IS NULL');
			$links = anchor('backend/template/properties/$1','<i class="fa fa-eye"></i> Properti',['class'=>'dropdown-item']).' '.
				'<a href="javascript:;" class="dropdown-item" onClick="deleteData($1)"><i class="fa fa-trash-o"></i> Delete</a> ';
			$this->datatables->add_column(
				'action',
				'<div class="btn-group"><button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>'
				,"cstmId");
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
}
