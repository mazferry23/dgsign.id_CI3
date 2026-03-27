<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Design extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Clientprop_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
	}
	public function multi_upload(){
		print_r($_FILES);
		print_r($_POST);
		$clientId = $this->input->post('clientId');
		$field = $this->input->post('field');
		$datasebelum = $this->Clientprop_model->findFirst(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field]);
		if(isset($_FILES['asset']) && !empty($_FILES['asset']['name'])){
			$saved_values = [];
			for($i=0;$i<count($_FILES['asset']['name']);$i++){
				$_FILES['upload']['name'] = $_FILES['asset']['name'][$i];
				$_FILES['upload']['type'] = $_FILES['asset']['type'][$i];
				$_FILES['upload']['tmp_name'] = $_FILES['asset']['tmp_name'][$i];
				$_FILES['upload']['error'] = $_FILES['asset']['error'][$i];
				$_FILES['upload']['size'] = $_FILES['asset']['size'][$i];
				$config['upload_path']          = FCPATH.'public'.DS.'uploads'.DS;
				$config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|mp3|ogg|avi|webm|3gp';
				$config['file_name']			= time().'-'.$_FILES['upload']['name'];
				$config['file_ext_tolower']		= true;
				$config['remove_spaces']		= true;
				$this->load->library('upload',$config);
				if ( ! $this->upload->do_upload('upload')){
					//gagal nich
					print_r($this->upload->display_errors());
					die();
				}else{
					//berhasil
					$upload_res = $this->upload->data();
				
					print_r($upload_res);
					die();
					$saved_values[] = $upload_res['file_name'];
				}
			}
			print_r(json_encode($saved_values));
			if($datasebelum){
				$this->Clientprop_model->update([
					'clprop_Value'=>json_encode($saved_values)
				],['clprop_Id'=>$datasebelum->clprop_Id]);
				echo $this->db->last_query();
				
			}else{
				$this->Clientprop_model->create(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field,'clprop_Value'=>json_decode($saved_values)]);
			}
		}
		redirect(site_url('backend/client/edit/'.$clientId.'?pos=design'));

	}
	public function save_acara(){
		print_r($_POST);
		$clientId = $this->input->post('clientId');
		$field = $this->input->post('field');
		$datasebelum = $this->Clientprop_model->findFirst(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field]);
		$saved_values = [
			'judul'=>$this->input->post('judul'),
			'tanggal'=>$this->input->post('tanggal'),
			'tempat'=>$this->input->post('tempat'),
			'link'=>$this->input->post('link'),
			'periode'=>$this->input->post('periode'),
		];
		if($datasebelum){
			$this->Clientprop_model->update([
				'clprop_Value'=>json_encode($saved_values)
			],['clprop_Id'=>$datasebelum->clprop_Id]);
			
		}else{
			$this->Clientprop_model->create(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field,'clprop_Value'=>json_encode($saved_values)]);
		}
		redirect(site_url('backend/client/edit/'.$clientId.'?pos=design'));
	}
	public function delete_key($id,$key){
		//die('testt');
		$datasebelum = $this->Clientprop_model->findFirst(['clprop_Client_Id'=>$id,'clprop_Field'=>$key]);
		if(@is_file(FCPATH.DS.'public'.DS.'uploads'.DS.$datasebelum->clprop_Value)){
			@unlink(FCPATH.DS.'public'.DS.'uploads'.DS.$datasebelum->clprop_Value);
		}
		$this->Clientprop_model->delete(['clprop_Client_Id'=>$id,'clprop_Field'=>$key]);
		redirect(site_url('backend/client/edit/'.$id.'?pos=design'));
	}
	public function single_upload(){
		//echo 'anu';
		$clientId = $this->input->post('clientId');
		$field = $this->input->post('field');
		$datasebelum = $this->Clientprop_model->findFirst(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field]);
		$update_value = "";
		if(isset($_FILES['asset']) && !empty($_FILES['asset']['name'])){
			print_r($_FILES);
			$config['upload_path']          = FCPATH.'public'.DS.'uploads'.DS;
			$config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|mp3|ogg|avi|webm|3gp|mov|wav';
			$config['file_name']			= time().'-'.$_FILES['asset']['name'];
			$config['file_ext_tolower']		= true;
			$config['remove_spaces']		= true;
			$this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('asset')){
				$error = array('error' => $this->upload->display_errors());
				
				//print_r($error);
				//die();
				/*
				$this->output
					->set_content_type('application/json')
					->set_status_header(403)
					->set_output(json_encode(['message'=>"Failed to upload file"]));
				*/
			}else{
				$upload_res = $this->upload->data();
				
				//print_r($upload_res);
				//die();
				$update_value = $upload_res['file_name'];
			}
		}else{
			$update_value = $this->input->post('text');
		}
		if($datasebelum){
			$this->Clientprop_model->update([
				'clprop_Value'=>$update_value
			],['clprop_Id'=>$datasebelum->clprop_Id]);
			if(is_file(FCPATH.'public'.DS.'uploads'.DS.$datasebelum->clprop_Value)){
				@unlink(FCPATH.'public'.DS.'uploads'.DS.$datasebelum->clprop_Value);
			}
		}else{
			$this->Clientprop_model->create(['clprop_Client_Id'=>$clientId,'clprop_Field'=>$field,'clprop_Value'=>$update_value]);
		}
		redirect(site_url('backend/client/edit/'.$clientId.'?pos=design'));
	}
	public function update(){
		$status = 500;
		$messages = null;
		$msg = "Cannot update data";
		$key_s = $this->input->post('pk');
		$key_s = explode('-',$key_s);
		$client_Id = $key_s[1];
		$field = $key_s[0];
		$data__ = $this->Clientprop_model->findFirst(['clprop_Client_Id'=>$client_Id,'clprop_Field'=>$field]);
		if(isset($data__->clprop_Id) ){
			$value = $this->input->post('value');
			$this->Clientprop_model->update(['clprop_Value'=>$value],['clprop_Id'=>$data__->clprop_Id]);
			$status = 200;
			$messages = ['message'=>'Data successfully updated.'];
		}else{
			$value = $this->input->post('value');
			$this->Clientprop_model->create(['clprop_Field'=>$field,'clprop_Client_Id'=>$client_Id,'clprop_Value'=>$value]);
			$status = 200;
			$messages = ['message'=>'Data successfully updated.'];
		}
		if(is_array($messages)){
			$msg = json_encode($messages);
		}		
		$this->output
	    		->set_content_type('application/json')
	    		->set_status_header($status)
	    		->set_output($msg);
	}
}