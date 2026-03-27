<?php
use Ramsey\Uuid\Uuid;
class Home extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Invitations_model');
		$this->load->model('Administrator_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
		$this->load->helper('string');
	}
	public function index(){
		$data_view = $this->data_view;
		$data_view['content']='dashboard/dashboard';
		$data_view['title']='Wedding Invitation';
		$data_view['client'] = $this->db->get_where('clients')->num_rows();
		$data_view['rsvp'] = $this->db->get_where('rsvps')->num_rows();
		$data_view['invitations'] = $this->db->get_where('invitations')->num_rows();
		$this->load->view('scanner/home',$data_view);
	}
	public function logout(){
		$this->session->unset_userdata('auth_login');
		redirect(site_url('backend/dashboard'));
	}
	public function invit(){
		// $data_view = $this->data_view;
		// $data_view['content']='dashboard/dashboard';
		// $data_view['title']='Wedding Invitation';
		
		// $this->load->view('scanner/invitation',$data_view);

		// $qrID = $this->input->post('qrcode');
		// $inv = $this->db->get_where('invitations',['ivts_Uuid'=>$qrID]);
		// $data_view['columns'] = $colsQ->result_array();


		//$data = $this->Invitations_model->findByID($this->input->post('qrcode')->Uuid);
		//$data = $this->Administrator_model->findByID('1');
		$data = $this->Invitations_model->findFirst(['ivts_Uuid'=>$this->input->post('qrcode')]);
		//$data = $this->Invitations_model->findByID('749c9977-1fce-4ee3-b889-8abadf5fe005'->Uuid);
	//	if($data->ivts_GuestAttTime != Null){
			//echo 'QR Code Tidak berlaku';
	//		redirect('scanner/home');
	//	}else{
		if ($_SESSION['auth_login']['backend']->admnCliMode == '101'){
			if($data->ivts_GuestAttTime == Null){
				$data_view = $this->data_view;
				$data_view['breadcrumb'] = $this->breadcrumbs->build();
				$data_view['content'] = 'user/profile';
				$data_view['action']   = 'scanner/home/save_cekin';
				if($data->ivts_GuestAttTime == Null){
					$data_view['button']   = 'Submit';
				}else{
					$data_view['button']   = 'Ambil Souvenir';
				}			
				//$data_view['scripts'] = 'user/edit';
				$data_view['dataAdmn']= $data;
				$this->load->view('scanner/invitation',$data_view);
		//		redirect('scanner/home');
			}else{
				redirect('scanner/home');
			}
		}
			
		if ($_SESSION['auth_login']['backend']->admnCliMode == '102'){
			if($data->ivts_GuestAttTime == Null || $data->ivts_SouvenirAttTime == Null){
				$data_view = $this->data_view;
				$data_view['breadcrumb'] = $this->breadcrumbs->build();
				$data_view['content'] = 'user/profile';
				$data_view['action']   = 'scanner/home/save_cekin';
				if($data->ivts_GuestAttTime == Null){
					$data_view['button']   = 'Submit';
				}else{
					$data_view['button']   = 'Ambil Souvenir';
				}			
				//$data_view['scripts'] = 'user/edit';
				$data_view['dataAdmn']= $data;
				$this->load->view('scanner/invitation',$data_view);
		//		redirect('scanner/home');
			}else{
				redirect('scanner/home');
			}
		}	

	}

	public function save_cekin(){
		$data = $this->Invitations_model->findFirst(['ivts_Uuid'=>$this->input->post('ivts_Uuid')]);
		if ($_SESSION['auth_login']['backend']->admnCliMode == '101'){
			$insert['ivts_Name']		= $this->input->post('ivts_Name');
			$insert['ivts_Address'] 	= $this->input->post('ivts_Address');
			$insert['ivts_GuestAtt'] 		= $this->input->post('ivts_Guest');
			$insert['ivts_GuestAtttime'] 		= date('Y-m-d H:i:s');
			$insert['ivts_Category'] 	= $this->input->post('ivts_Category');
			$insert['ivts_Seat'] 		= $this->input->post('ivts_Seat');
			$insert['ivts_SouvenirAtt'] 	= $this->input->post('ivts_Souvenir');
			$insert['ivts_SouvenirAttTime'] 	= date('Y-m-d H:i:s');			
			$insert['ivts_GuestAttCounter'] 	=$_SESSION['auth_login']['backend']->admnUsername;
			$insert['ivts_SouvenirAttCounter'] 	=$_SESSION['auth_login']['backend']->admnUsername;

			if(isset($_POST['ivts_Uuid']) && !empty($_POST['ivts_Uuid'])){
				$insert['ivts_Updated']	= date('Y-m-d H:i:s');
				$this->db->where('ivts_Uuid',$_POST['ivts_Uuid']);
				$iId = $this->db->update('invitations',$insert);
			}else{
				$insert['ivts_Uuid'] 		= Uuid::uuid4();
				$insert['ivts_RsvpStatus'] 	= 'Input Manual';
				$insert['ivts_Created'] 	= date('Y-m-d H:i:s');
				$iId = $this->db->insert('invitations',$insert);
			}

		}
		if ($_SESSION['auth_login']['backend']->admnCliMode == '102'){
			
			if ($data->ivts_GuestAttTime == NULL){
				$insert['ivts_Name']		= $this->input->post('ivts_Name');
				$insert['ivts_Address'] 	= $this->input->post('ivts_Address');
				$insert['ivts_GuestAtt'] 		= $this->input->post('ivts_Guest');
				$insert['ivts_GuestAtttime'] 		= date('Y-m-d H:i:s');
				$insert['ivts_Category'] 	= $this->input->post('ivts_Category');
				$insert['ivts_Seat'] 		= $this->input->post('ivts_Seat');
				$insert['ivts_GuestAttCounter'] 	=$_SESSION['auth_login']['backend']->admnUsername;

			}else{
				$insert['ivts_SouvenirAtt'] 	= $this->input->post('ivts_Souvenir');
				$insert['ivts_SouvenirAttTime'] 	= date('Y-m-d H:i:s');	
				$insert['ivts_SouvenirAttCounter'] 	=$_SESSION['auth_login']['backend']->admnUsername;

			}
					

			if(isset($_POST['ivts_Uuid']) && !empty($_POST['ivts_Uuid'])){
				$insert['ivts_Updated']	= date('Y-m-d H:i:s');
				$this->db->where('ivts_Uuid',$_POST['ivts_Uuid']);
				$iId = $this->db->update('invitations',$insert);
			}else{
				$insert['ivts_Uuid'] 		= Uuid::uuid4();
				$insert['ivts_RsvpStatus'] 	= 'Input Manual';
				$insert['ivts_Created'] 	= date('Y-m-d H:i:s');
				$iId = $this->db->insert('invitations',$insert);
			}

		}

			redirect('scanner/home');
	}
	
}
			