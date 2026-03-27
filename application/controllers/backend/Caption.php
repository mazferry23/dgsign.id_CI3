<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Caption extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Caption_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
    }
    public function datatables($id){
        $this->load->library('Datatables');
		$this->datatables->select('capt_Id,capt_Code,capt_Caption,capt_TplFile,capt_type,captType_Name,captions_type.captType_Id as captType_Id');
		$this->datatables->from('captions');
		$this->datatables->join('captions_type','captions.capt_type=captions_type.captType_Id','left');
		$this->datatables->where('capt_Deleted IS NULL');
		$this->datatables->where('capt_Client_Id',$id);
		$this->datatables->add_column(
			'tpl',
			function($row){
				return '<a href="'.site_url('public'.DS.'captpl'.DS.$row['capt_TplFile']).'" target="_blank"><img src="'.site_url('public'.DS.'captpl'.DS.$row['capt_TplFile']).'" width="30"/></a>';
			}
		);
		$this->datatables->add_column(
			'action',
			function($row){
				//$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
				//$links = anchor('javascript:;','<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item edit-data']);
				$links= '<a href="javascript:;" class="dropdown-item edit-data"><i class="fa fa-edit"></i> Edit</a>';
				$links.= '<a href="javascript:;" class="dropdown-item" onClick="deleteData('.$row['capt_Id'].')"><i class="fa fa-trash-o"></i> Delete</a>';
				return '<div class="btn-group">
							<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
							<div class="dropdown-menu">'.$links.'</div>
							</div>';
			}
		);

		$this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(@$this->datatables->generate());
    }
    public function save(){
        $status = 500;
		//$messages = [];
		$this->form_validation->set_rules('capt_Code', 'Label', 'required');
		$this->form_validation->set_rules('capt_Caption', 'Caption', 'required');
		$this->form_validation->set_rules('capt_type', 'type', 'required');
		//$this->form_validation->set_rules('asset', 'asset');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			
			if(isset($_FILES['asset']) && !empty($_FILES['asset']['name'])){
				print_r($_FILES);
				$config['upload_path']          = FCPATH.'public'.DS.'captpl'.DS;
				$config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|mp3|ogg|avi|webm|3gp|mov|wav';
				$config['file_name']			= time().'-'.$this->input->post('capt_Code');
				$config['file_ext_tolower']		= true;
				$config['remove_spaces']		= true;
				$this->load->library('upload',$config);
				if ( ! $this->upload->do_upload('asset')){
					$error = array('error' => $this->upload->display_errors());
				}else{
					$upload_res = $this->upload->data();
					//$insert['capt_TplFile'] = time().'-'.$_FILES['asset']['name'];
					//$update_value = $upload_res['file_name'];
					//$update_value = $this->input->post('text');
				}
			}else{
				//$update_value = $this->input->post('text');
			}
			$insert['capt_Id'] = $this->input->post('capt_Id');
			$insert['capt_Code'] = $this->input->post('capt_Code');
			$insert['capt_Client_Id'] = $this->input->post('capt_Client_Id');
			$insert['capt_Caption'] = $this->input->post('capt_Caption');
			$insert['capt_type'] = $this->input->post('capt_type');
			$insert['capt_TplFile'] = time().'-'.str_replace(' ', '_', $this->input->post('capt_Code')).'.'.pathinfo($_FILES["asset"]["name"], PATHINFO_EXTENSION);

			if(isset($_POST['capt_Id']) && !empty($_POST['capt_Id'])){
				$insert['capt_Updated']	= date('Y-m-d H:i:s');
				$this->db->where('capt_Id',$_POST['capt_Id']);
				$iId = $this->db->update('captions',$insert);
			}else{
				//$insert['ivts_Uuid'] 		= Uuid::uuid4();
				$insert['capt_Created'] 	= date('Y-m-d H:i:s');
				$iId = $this->db->insert('captions',$insert);
			}

			//$iId = $this->Caption_model->create($insert);
			if($iId==FALSE){
				$status = 401;
				$messages = ['error'=>'Cannot create','message'=>'Cannot create data.'];
			}else{
				$status = 201;
				$messages = ['message'=>'Data successfully created.'];
			}
			$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output(json_encode($messages));
		}
    }


}