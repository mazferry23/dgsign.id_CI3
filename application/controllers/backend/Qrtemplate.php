<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Qrtemplate extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Qrtemplate_model');
		$this->load->model('Ivtstemplate_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
    }
    public function datatables($id){
        $this->load->library('Datatables');
		$this->datatables->select('template_qr.*, template_qr_type.*');
		$this->datatables->from('template_qr_type');
		//$this->datatables->join('template_ivts','template_ivts.tplivts_Mode=template_qr_type.tplqrType_Id','left');
		$this->datatables->join('template_qr','template_qr.tplqr_Mode=template_qr_type.tplqrType_Id','left');
		$this->datatables->where('tplqr_Deleted IS NULL');
		//$this->datatables->or_where('tplivts_Deleted IS NULL');
		$this->datatables->where('tplqr_Client_Id',$id);
		//$this->datatables->or_where('tplivts_Client_Id',$id);
		$this->datatables->add_column(
			'tpl',
			function($row){
				if($row['tplqr_Mode'] == '1' || $row['tplqr_Mode'] == '2' || $row['tplqr_Mode'] == '3' || $row['tplqr_Mode'] == '4'){
					return '<a href="'.site_url('public'.DS.'qrtemplate'.DS.$row['tplqr_File']).'" target="_blank"><img src="'.site_url('public'.DS.'qrtemplate'.DS.$row['tplqr_File']).'" width="30"/></a>';
				}else {
					return '<a href="'.site_url('public'.DS.'ivttemplate'.DS.$row['tplqr_File']).'" target="_blank"><img src="'.site_url('public'.DS.'ivttemplate'.DS.$row['tplqr_File']).'" width="30"/></a>';
				}
			}
		);
		$this->datatables->add_column(
			'action',
			function($row){
				$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
				//$links = anchor('javascript:;','<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item edit-data']);
				$links= '<a href="javascript:;" class="dropdown-item edit-data"><i class="fa fa-edit"></i> Edit</a>';
				$links.= '<a href="javascript:;" class="dropdown-item" onClick="deleteData('.$row['ivts_Id'].')"><i class="fa fa-trash-o"></i> Delete</a>';
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
	public function select2_qrtemplate_type(){
		$statusCode = 500;
		$messages = [];
		$query = "SELECT tplqrType_Id as id, tplqrType_Name as `text` FROM template_qr_type WHERE tplqrType_Deleted IS NULL ";
		if(isset($_POST['q'])){
			$q = $this->input->post('q',TRUE);
			$query = "SELECT tplqrType_Id as id, tplqrType_Name as `text` FROM template_qr_type WHERE tplqrType_Deleted IS NULL and (tplqrType_Name like '%$q%')";
		}
		// if(isset($_POST['clientId'])){
		// 	$clientId = $this->input->post('clientId');
		// 	$query.=" and capt_Client_Id='$clientId'";
		// }
		$query.=" LIMIT 20;";
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
	public function delete_qrtemplate(){
		//date('Y-m-d H:i:s');
		$insert['tplqr_Deleted'] = date('Y-m-d H:i:s');
		$this->db->where('tplqr_Id',$this->uri->segment(4));
		//$data = $this->db->delete('invitations');
		$data = $this->db->update('template_qr',$insert);
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
    public function save(){
        $status = 500;
		//$messages = [];
		$this->form_validation->set_rules('tplqr_Label', 'Label', 'required');
		// $this->form_validation->set_rules('capt_Caption', 'Caption', 'required');
		// $this->form_validation->set_rules('capt_type', 'type', 'required');
		// $this->form_validation->set_rules('asset', 'asset');
		if($this->form_validation->run()==FALSE){
			$this->output
        		->set_content_type('application/json')
        		->set_status_header(403)
        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));
		}else{
			
			if(isset($_FILES['asset']) && !empty($_FILES['asset']['name'])){
				print_r($_FILES);
				if($this->input->post('tplqr_Mode') == '5' || $this->input->post('tplqr_Mode') == '6')
					{
						$config['upload_path']          = FCPATH.'public'.DS.'ivttemplate'.DS;
					}else{
						$config['upload_path']          = FCPATH.'public'.DS.'qrtemplate'.DS;
					}
				$config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|mp3|ogg|avi|webm|3gp|mov|wav';
				$config['file_name']			= time().'-'.$this->input->post('tplqr_Label');
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

			
			
			// if ($this->input->post('tplqr_Mode') == '5' || $this->input->post('tplqr_Mode') == '6'){
			// 	$insertivts['tplivts_Client_Id'] = $this->input->post('tplqr_Client_Id');
			// 	$insertivts['tplivts_Label'] = $this->input->post('tplqr_Label');
			// 	$insertivts['tplivts_Judul'] = $this->input->post('tplqr_Judul');
			// 	$insertivts['tplivts_Cpp'] = $this->input->post('tplqr_Cpp');
			// 	// $insert['tplivts_CppOrtu'] = $this->input->post('tplqr_CppOrtu');
			// 	// $insert['tplivts_Cpw'] = $this->input->post('tplqr_Cpw');
			// 	// $insert['tplivts_CpwOrtu'] = $this->input->post('tplqr_CpwOrtu');
			// 	$insertivts['tplivts_FieldSatu'] = $this->input->post('tplqr_FieldSatu');
			// 	$insertivts['tplivts_FieldDua'] = $this->input->post('tplqr_FieldDua');
			// 	$insertivts['tplivts_FieldTiga'] = $this->input->post('tplqr_FieldTiga');
			// 	$insertivts['tplivts_FieldEmpat'] = $this->input->post('tplqr_FieldEmpat');
			// 	$insertivts['tplivts_FieldLima'] = $this->input->post('tplqr_FieldLima');
			// 	$insertivts['tplivts_FieldEnam'] = $this->input->post('tplqr_FieldEnam');
			// 	$insertivts['tplivts_FieldTujuh'] = $this->input->post('tplqr_FieldTujuh');
			// 	$insertivts['tplivts_FieldDelapan'] = $this->input->post('tplqr_FieldDelapan');
			// 	$insertivts['tplivts_VIP'] = $this->input->post('tplqr_VIP');
			// 	$insertivts['tplivts_Link'] = $this->input->post('tplqr_Link');
			// 	$insertivts['tplivts_GuestSet'] = $this->input->post('tplqr_GuestSet');
			// 	$insertivts['tplivts_Mode'] = $this->input->post('tplqr_Mode');
			// 	$insertivts['tplivts_TamuSize'] = $this->input->post('tplqr_TamuSize');
			// 	$insertivts['tplivts_AlamatSize'] = $this->input->post('tplqr_AlamatSize');
			// 	$insertivts['tplivts_MejaSize'] = $this->input->post('tplqr_MejaSize');
			// 	$insertivts['tplivts_GuestSize'] = $this->input->post('tplqr_GuestSize');
			// 	$insertivts['tplivts_GuestPosX'] = $this->input->post('tplqr_GuestPosX');
			// 	$insertivts['tplivts_TamuColor'] = $this->input->post('tplqr_TamuColor');
			// 	$insertivts['tplivts_AlamatColor'] = $this->input->post('tplqr_TamuColor');
			// 	$insertivts['tplivts_MejaColor'] = $this->input->post('tplqr_TamuColor');
			// 	$insertivts['tplivts_GuestColor'] = $this->input->post('tplqr_TamuColor');
			// 	$insertivts['tplivts_File'] = time().'-'.str_replace(' ', '_', $this->input->post('tplqr_Label')).'.'.pathinfo($_FILES["asset"]["name"], PATHINFO_EXTENSION);
				
			// 	$iId = $this->Ivtstemplate_model->create($insertivts);
			// }else{
				$insert['tplqr_Client_Id'] = $this->input->post('tplqr_Client_Id');
				$insert['tplqr_Label'] = $this->input->post('tplqr_Label');
				$insert['tplqr_Judul'] = $this->input->post('tplqr_Judul');
				$insert['tplqr_Cpp'] = $this->input->post('tplqr_Cpp');
				// $insert['tplqr_CppOrtu'] = $this->input->post('tplqr_CppOrtu');
				// $insert['tplqr_Cpw'] = $this->input->post('tplqr_Cpw');
				// $insert['tplqr_CpwOrtu'] = $this->input->post('tplqr_CpwOrtu');
				$insert['tplqr_FieldSatu'] = $this->input->post('tplqr_FieldSatu');
				$insert['tplqr_FieldDua'] = $this->input->post('tplqr_FieldDua');
				$insert['tplqr_FieldTiga'] = $this->input->post('tplqr_FieldTiga');
				$insert['tplqr_FieldEmpat'] = $this->input->post('tplqr_FieldEmpat');
				$insert['tplqr_FieldLima'] = $this->input->post('tplqr_FieldLima');
				$insert['tplqr_FieldEnam'] = $this->input->post('tplqr_FieldEnam');
				$insert['tplqr_FieldTujuh'] = $this->input->post('tplqr_FieldTujuh');
				$insert['tplqr_FieldDelapan'] = $this->input->post('tplqr_FieldDelapan');
				$insert['tplqr_VIP'] = $this->input->post('tplqr_VIP');
				$insert['tplqr_Link'] = $this->input->post('tplqr_Link');
				$insert['tplqr_GuestSet'] = $this->input->post('tplqr_GuestSet');
				$insert['tplqr_Mode'] = $this->input->post('tplqr_Mode');
				$insert['tplqr_TamuSize'] = $this->input->post('tplqr_TamuSize');
				$insert['tplqr_AlamatSize'] = $this->input->post('tplqr_AlamatSize');
				$insert['tplqr_MejaSize'] = $this->input->post('tplqr_MejaSize');
				$insert['tplqr_GuestSize'] = $this->input->post('tplqr_GuestSize');
				$insert['tplqr_GuestPosX'] = $this->input->post('tplqr_GuestPosX');
				$insert['tplqr_TamuColor'] = $this->input->post('tplqr_TamuColor');
				$insert['tplqr_AlamatColor'] = $this->input->post('tplqr_TamuColor');
				$insert['tplqr_MejaColor'] = $this->input->post('tplqr_TamuColor');
				$insert['tplqr_GuestColor'] = $this->input->post('tplqr_TamuColor');
				$insert['tplqr_File'] = time().'-'.str_replace(' ', '_', $this->input->post('tplqr_Label')).'.'.pathinfo($_FILES["asset"]["name"], PATHINFO_EXTENSION);
				
				
				//$iId = $this->Qrtemplate_model->create($insert);

				if(isset($_POST['tplqr_Id']) && !empty($_POST['tplqr_Id'])){
					$insert['tplqr_Edited']	= date('Y-m-d H:i:s');
					$this->db->where('tplqr_Id',$_POST['tplqr_Id']);
					$iId = $this->db->update('template_qr',$insert);
				}else{
					$insert['tplqr_Id'] 		= $this->input->post('tplqr_Id');
					$insert['tplqr_Created'] 	= date('Y-m-d H:i:s');
					$iId = $this->db->insert('template_qr',$insert);
				}
			//}
			
			
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