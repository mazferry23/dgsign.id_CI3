<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Prokes extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Prokes_model');
		$this->load->model('Prodet_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
		//$this->allowed_level(['admin','super']);
	}
	
	public function index(){
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Protokol Kesehatan','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'prokes/list';
		$data_view['title']   = 'Protokol Kesehatan';
		$data_view['scripts'] = 'scripts/prokes/datatable';

		$data_view['js']	  = [
				base_url('public/backend/assets/datatables/js/jquery.dataTables.min.js'),
				base_url('public/backend/assets/datatables/js/bootstrap4.min.js'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/datatables/css/dataTables.bootstrap4.min.css'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.css')
			];
		$this->load->view('backend/parts/layout',$data_view);
	}

	public function create(){
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Protokol Kesehatan',site_url('backend/client'));
		$this->breadcrumbs->push('Create','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'prokes/form';
		$data_view['title']   = 'Create Protokol Kesehatan';
		$data_view['scripts'] = 'scripts/prokes/form_create';
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
	public function add_detail($id=null){
		if($id==null){
			redirect(site_url('backend/prokes'));
		}
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Protokol Kesehatan',site_url('backend/prokes'));
		$this->breadcrumbs->push('Add Detail','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'prokes/form_detail';
		$data_view['title']   = 'Create Protokol Kesehatan';
		$data_view['id_prokes']   = $id;
		$data_view['scripts'] = 'scripts/prokes/form_create_detail';
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
	public function edit_detail($id=null,$id_prodet=null){
		if($id==null && $id_prodet==null){
			redirect(site_url('backend/prokes'));
		}
		$data = $this->Prodet_model->findByID($id_prodet);
		if(!empty($data->prodet_Deleted)){
			redirect('backend/prokes');
		}
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Protokol Kesehatan',site_url('backend/prokes'));
		$this->breadcrumbs->push('Edit Detail','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'prokes/form_edit_detail';
		$data_view['title']   = 'Create Protokol Kesehatan';
		$data_view['id_prokes']   = $id;
		$data_view['data'] = $data;
		$data_view['scripts'] = 'scripts/prokes/form_create_detail';
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
	public function save_new_detail(){
		$status = 500;
		//$messages = [];
		$this->form_validation->set_rules('prodet_Description', 'Description', 'required');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			
			$insert['prodet_Description'] = $this->input->post('prodet_Description');
			$insert['prodet_Prokes_Id'] = $this->input->post('prodet_Prokes_Id');
			if(isset($_FILES['prodet_Image']) && !empty($_FILES['prodet_Image']['name'])){
				$upl['upload_path'] = FCPATH.'public'.DIRECTORY_SEPARATOR.'prokes'.DIRECTORY_SEPARATOR;
				$upl['allowed_types'] = 'jpg|jpeg|png';
				$upl['max_size']   = 10240;
				$exploded = explode('.',$_FILES['prodet_Image']['name']);
				$file_ext = end($exploded);
				$upl['file_name']  = time().'_'.substr($_FILES['prodet_Image']['name'],0,30).'.'.$file_ext;
				$this->load->library('upload',$upl);
				if (!$this->upload->do_upload('prodet_Image')){
				}else{
					$data_upload = $this->upload->data();
					$insert['prodet_Image'] = $data_upload['file_name'];
				}
			}
			if(isset($_POST['prodet_Id']) && !empty($_POST['prodet_Id'])){
				$iId = $this->Prodet_model->update($insert,['prodet_Id'=>$_POST['prodet_Id']]);
			}else{
				$iId = $this->Prodet_model->create($insert);
			}
			
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create data.'];
			}else{
				$status = 201;
				$messages = ['message'=>'Data successfully created.','ID'=>$iId];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}
	}
	public function save_new(){
		$status = 500;
		//$messages = [];
		$this->form_validation->set_rules('prokes_Title', 'Judul Protokol Kesehatan', 'required');
		$this->form_validation->set_rules('prokes_Subtitle', 'Sub Judul Protokol Kesehatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			
			$insert['prokes_Title'] = $this->input->post('prokes_Title');
			$insert['prokes_Subtitle'] = $this->input->post('prokes_Subtitle');
			
			$iId = $this->Prokes_model->create($insert);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create data.'];
			}else{
				$status = 201;
				$messages = ['message'=>'Data successfully created.','ID'=>$iId];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}
	}
	public function save_edit(){
		$status = 500;
		$messages = [];
		$this->form_validation->set_rules('prokes_Title', 'Judul Protokol Kesehatan', 'required');
		$this->form_validation->set_rules('prokes_Subtitle', 'Sub Judul Protokol Kesehatan', 'required');
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
			$id = $this->input->post('prokes_Id');
			$insert['prokes_Title'] = $this->input->post('prokes_Title');
			$insert['prokes_Subtitle'] = $this->input->post('prokes_Subtitle');

			$iId = $this->Prokes_model->update($insert,['prokes_Id'=>$id]);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot update','message'=>'Cannot update data.'];
			}else{
				$status = 202;
				$messages = ['message'=>'Data successfully updated.'];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}
	}
	//host/backend/topik/edit/5
	public function edit(){
		$ID = $this->uri->segment(4);
		$data = $this->Prokes_model->findByID($ID);
		if(!empty($data->prokes_Deleted)){
			redirect('backend/client');
		}
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Protokol Kesehatan',site_url('backend/prokes'));
		$this->breadcrumbs->push('Edit','#',TRUE);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'prokes/form_edit';
		$data_view['title']   = 'Edit Protokol Kesehatan';
		$data_view['prokes'] = $data;
		$data_view['scripts'] = 'scripts/prokes/form_edit';
		
		$data_view['js']	  = [
				base_url('public/backend/assets/datatables/js/jquery.dataTables.min.js'),
				base_url('public/backend/assets/datatables/js/bootstrap4.min.js'),
				base_url('public/backend/js/jquery.validate.min.js'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.js'),
				base_url('public/backend/assets/toastr-master/toastr.js'),
				base_url('public/backend/assets/select2/js/select2.min.js'),
				base_url('public/backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'),
				base_url('public/backend/assets/bootstrap4-editable/js/bootstrap-editable.min.js'),
				base_url('public/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js'),
				base_url('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js'),
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/datatables/css/dataTables.bootstrap4.min.css'),
				base_url('public/backend/assets/toastr-master/toastr.css'),
				base_url('public/backend/assets/bootstrap-datetimepicker/css/datetimepicker.css'),
				base_url('public/backend/assets/sweetalert/sweetalert2.min.css'),
				base_url('public/backend/assets/select2/css/select2.min.css'),
				base_url('public/backend/assets/bootstrap4-editable/css/bootstrap-editable.css'),
				base_url('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css'),
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
	
	public function delete(){
		$ID = $this->uri->segment(4);
		$data = $this->Prokes_model->delete(['prokes_Id'=>$ID]);
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
	public function delete_detail(){
		$ID = $this->uri->segment(4);
		$data = $this->Prodet_model->delete(['prodet_Id'=>$ID]);
		redirect(site_url('backend/prokes'));
		
	}
	public function datatables(){
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->library('Datatables');
			$this->datatables->select('*');
			$this->datatables->from('prokes');
			$this->datatables->where('prokes_Deleted IS NULL');
			$this->datatables->add_column(
				'action',
				function($row){
					$links = anchor('backend/prokes/edit/'.$row['prokes_Id'],'<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item']);
					$links.= '<a href="javascript:;" class="dropdown-item" onClick="deleteData('.$row['prokes_Id'].')"><i class="fa fa-trash-o"></i> Delete</a>';
					return '<a href="javascript:;" class="detail-button btn btn-success btn-sm"><i class="fa fa-list"></i></a><div class="btn-group"><button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>';
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
	public function datatables_detail($id){
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->library('Datatables');
			$this->datatables->select('*');
			$this->datatables->from('prokes_detail');
			$this->datatables->where('prodet_Deleted IS NULL');
			$this->datatables->where('prodet_Prokes_Id',$id);
			$this->datatables->add_column(
				'prodet_Icon',
				function($row){
					return '<img src="'.base_url('public/prokes/'.$row['prodet_Image']).'" width="100" height="100"/>';
				}
			);
			$this->datatables->add_column(
				'action',
				function($row){
					$links = anchor('backend/prodet/edit/'.$row['prodet_Prokes_Id'].'/'.$row['prodet_Id'],'<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item']);
					$links.= '<a href="javascript:;" class="dropdown-item" onClick="deleteData('.$row['prodet_Id'].')"><i class="fa fa-trash-o"></i> Delete</a>';
					return '<a href="javascript:;" class="detail-button btn btn-success btn-sm"><i class="fa fa-list"></i></a><div class="btn-group"><button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>';
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
}
