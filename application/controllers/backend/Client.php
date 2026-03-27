<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;

use Spipu\Html2Pdf\Html2Pdf;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class Client extends Backend_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->model('Client_model');

		$this->load->model('Caption_model');

		$this->load->library('form_validation');

		$this->load->library('breadcrumbs');

		//$this->allowed_level(['admin','super']);

	}

	public function preview_caption($caption_Id,$guestId){

		$capt = $this->db->get_where('captions',['capt_Id'=>$caption_Id]);

		$capt_Row = [];

		if($capt->num_rows()>0){

			$capt_Row = $capt->row_array();

		}else{

			echo 'Caption not found.';

			return;

		}

		$client = $this->db->get_where('clients',['client_Id'=>$capt_Row['capt_Client_Id']]);

		$client_Row = [];

		if($client->num_rows()>0){

			$client_Row = $client->row_array();

		}else{

			echo 'Client not found.';

			return;

		}

		$guest = $this->db->get_where('invitations',['ivts_Id'=>$guestId]);

		$guest_Row = [];

		if($guest->num_rows()>0){

			$guest_Row = $guest->row_array();

		}else{

			echo 'Guest not found.';

			return;

		}

		$text__ = $capt_Row['capt_Caption'];

		$text__ = str_replace(['{{NAME}}','{{ADDR}}','{{TAMU}}','{{LINK}}','{{EXTLINK}}','{{TIME}}'],[$guest_Row['ivts_Name'],$guest_Row['ivts_Address'],$guest_Row['ivts_Guest'],site_url('invitations/'.$guest_Row['ivts_Client_Id'].'/'.strtolower( url_title($client_Row['client_Name'],'-') ).'/'.$guest_Row['ivts_Uuid'])],$guest_Row['ivts_LinkExternal'],$guest_Row['ivts_ivts_Group'],$text__);

		

		echo nl2br($text__);

		return;



	}

	public function select2_template(){

		$statusCode = 500;

		$messages = [];

		$query = "SELECT tplqr_Id as id, tplqr_Label as `text` FROM template_qr WHERE tplqr_Deleted IS NULL and (tplqr_mode = '1' or tplqr_mode = '2' or tplqr_mode = '3' or tplqr_mode = '4')";

		if(isset($_POST['q'])){

			$q = $this->input->post('q',TRUE);

			$query = "SELECT tplqr_Id as id, tplqr_Label as `text` FROM template_qr WHERE tplqr_Deleted IS NULL and (tplqr_Label like '%$q%') and (tplqr_mode = '1' or tplqr_mode = '2' or tplqr_mode = '3' or tplqr_mode = '4')";

		}

		if(isset($_POST['clientId'])){

			$clientId = $this->input->post('clientId');

			$query.=" and tplqr_Client_Id='$clientId'";

		}

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

	public function select2_admnCliId(){

		$statusCode = 500;

		$messages = [];

		$query = "SELECT admnUserName as id, admnUserName as `text` FROM administrator WHERE admnLevel = 'client' and admnDeleted IS NULL LIMIT 20;";

		if(isset($_POST['q'])){

			$q = $this->input->post('q',TRUE);

			$query = "SELECT admnUserName as id, admnUserName as `text` FROM administrator WHERE admnLevel = 'client' and admnDeleted IS NULL and (admnUserName like '%$q%') LIMIT 20;";

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

	public function select2_template_ivt(){

		$statusCode = 500;

		$messages = [];

		$query = "SELECT tplqr_Id as id, tplqr_Label as `text` FROM template_qr WHERE tplqr_Deleted IS NULL and (tplqr_mode = '5' or tplqr_mode = '6')";

		if(isset($_POST['q'])){

			$q = $this->input->post('q',TRUE);

			$query = "SELECT tplqr_Id as id, tplqr_Label as `text` FROM template_qr WHERE tplqr_Deleted IS NULL and (tplqr_Label like '%$q%') and (tplqr_mode = '5' or tplqr_mode = '6')";

		}

		if(isset($_POST['clientId'])){

			$clientId = $this->input->post('clientId');

			$query.=" and tplqr_Client_Id='$clientId'";

		}

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

	public function edit_selected(){
		$time = date('Y-m-d H:i:s');
		$ids = $_GET['array'];
		if($_GET['data'] == 'alamat' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_Address = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'whatsapp' && $_GET['inputNum'] != ''){
			$result = $_GET['inputNum'];
			$query = $this->db->query("UPDATE invitations set ivts_NoHp = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'vip' && $_GET['ddvip'] != ''){
			$result = $_GET['ddvip'];
			$query = $this->db->query("UPDATE invitations set ivts_Category = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'set-RSVP' && $_GET['set-rsvp'] != ''){
			$result = $_GET['set-rsvp'];
			$query = $this->db->query("UPDATE invitations set ivts_RsvpRespond = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'meja' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_Seat = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'resepsi' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_Group = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'tamu' && $_GET['inputNum'] != ''){
			$result = $_GET['inputNum'];
			$query = $this->db->query("UPDATE invitations set ivts_Guest = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'souvenir' && $_GET['inputNum'] != ''){
			$result = $_GET['inputNum'];
			$query = $this->db->query("UPDATE invitations set ivts_Souvenir = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'set-RSVPtamu' && $_GET['inputNum'] != ''){
			$result = $_GET['inputNum'];
			$query = $this->db->query("UPDATE invitations set ivts_RsvpGuest = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'kategori' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_GroupFam = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'subkategori' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_GroupSub = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'template' && $_GET['qr'] != ''){
			$result = $_GET['qr'];
			$query = $this->db->query("UPDATE invitations set ivts_tplqr_Id = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'template-inv' && $_GET['ivts'] != ''){
			$result = $_GET['ivts'];
			$query = $this->db->query("UPDATE invitations set ivts_tplivts_Id = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
		if($_GET['data'] == 'link-ext' && $_GET['inputText'] != ''){
			$result = $_GET['inputText'];
			$query = $this->db->query("UPDATE invitations set ivts_LinkExternal = '$result', ivts_Updated = '$time' WHERE ivts_Id in ($ids)");

			echo 'success';
		}
	}

	public function select2_caption(){

		$statusCode = 500;

		$messages = [];

		$query = "SELECT capt_Id as id, capt_Code as `text` FROM captions WHERE capt_Deleted IS NULL ";

		if(isset($_POST['q'])){

			$q = $this->input->post('q',TRUE);

			$query = "SELECT capt_Id as id, capt_Code as `text` FROM captions WHERE capt_Deleted IS NULL and (capt_Code like '%$q%')";

		}

		if(isset($_POST['clientId'])){

			$clientId = $this->input->post('clientId');

			$query.=" and capt_Client_Id='$clientId'";

		}

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

	public function select2_caption_type(){

		$statusCode = 500;

		$messages = [];

		$query = "SELECT captType_Id as id, captType_Name as `text` FROM captions_type WHERE captType_Deleted IS NULL ";

		if(isset($_POST['q'])){

			$q = $this->input->post('q',TRUE);

			$query = "SELECT captType_Id as id, captType_Name as `text` FROM captions_type WHERE captType_Deleted IS NULL and (captType_Name like '%$q%')";

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

	public function index(){

		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));

		$this->breadcrumbs->push('Client','#',TRUE);

		$data_view = $this->data_view;

		

		$data_view['breadcrumb'] = $this->breadcrumbs->build();

		$data_view['content'] = 'client/list';

		$data_view['title']   = 'Service';

		$data_view['scripts'] = 'scripts/client/datatable';



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

		$this->breadcrumbs->push('Client',site_url('backend/client'));

		$this->breadcrumbs->push('Create','#',TRUE);

		$data_view = $this->data_view;

		$data_view['breadcrumb'] = $this->breadcrumbs->build();

		$data_view['content'] = 'client/form';

		$data_view['title']   = 'Create Client';

		$data_view['scripts'] = 'scripts/client/form_create';

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

		$status = 500;

		//$messages = [];

		$this->form_validation->set_rules('client_Name', 'Client Name', 'required');

		$this->form_validation->set_rules('client_Tpl_Id', 'Template', 'required');

		if($this->form_validation->run()==FALSE){

			$this->output

        		->set_content_type('application/json')

        		->set_status_header(403)

        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));

		}else{

			$insert['client_Tpl_Id'] = $this->input->post('client_Tpl_Id');

			$insert['client_Id'] = substr(str_shuffle('0123456789'), 0, 8);

			$insert['client_Name'] = $this->input->post('client_Name');

			$insert['client_Phone'] = $this->input->post('client_Phone');

			$insert['client_Email'] = $this->input->post('client_Email');

			$insert['client_admnCliId'] = $this->input->post('client_admnCliId');

			$insert['client_admnUsrId'] = $this->input->post('client_admnUsrId');

			$insert['client_RegisterDate'] = date('Y-m-d H:i:s');

			$iId = $this->Client_model->create($insert);

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

		$this->form_validation->set_rules('svcsName', 'Site Name', 'required');

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

			$id = $this->input->post('svcsId');

			$insert['svcsSiteId'] = $this->input->post('svcsSiteId');

			$insert['svcsName'] = $this->input->post('svcsName');

			$insert['svcsPrefix'] = $this->input->post('svcsPrefix');

			$insert['svcsMaxQueue'] = $this->input->post('svcsMaxQueue');

			$iId = $this->Service_model->update($insert,['svcsId'=>$id]);

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

		$data = $this->Client_model->findByID($ID);

		if(!empty($data->client_Deleted)){

			redirect('backend/client');

		}

		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));

		$this->breadcrumbs->push('Client',site_url('backend/service'));

		$this->breadcrumbs->push('Edit','#',TRUE);

		$data_view = $this->data_view;

		$data_view['breadcrumb'] = $this->breadcrumbs->build();

		$data_view['content'] = 'client/form_edit';

		$data_view['title']   = 'Edit Client';

		$data_view['client'] = $data;



		$data_view['wa_received'] 	= $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_SentStatus' => 'received', 'ivts_RsvpStatus' => 'Undangan','ivts_Deleted' => NULL))->num_rows();

		$data_view['wa_sent'] 		= $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_SentStatus' => 'sent', 'ivts_RsvpStatus' => 'Undangan','ivts_Deleted' => NULL))->num_rows();

		$data_view['wa_read'] 		= $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_SentStatus' => 'read', 'ivts_RsvpStatus' => 'Undangan','ivts_Deleted' => NULL))->num_rows();

		$data_view['wa_cancel'] 	= $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_SentStatus' => 'cancel', 'ivts_RsvpStatus' => 'Undangan','ivts_Deleted' => NULL))->num_rows();

		$data_view['wa_notsent'] 	= $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_SentStatus' => NULL, 'ivts_RsvpStatus' => 'Undangan','ivts_Deleted' => NULL))->num_rows();



		$data_view['ivts'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpStatus' => 'Undangan'))->num_rows();

		$data_view['ivts_guest'] = $this->db->query("SELECT SUM(ivts_Client_Id) as total FROM invitations")->num_rows();

		// $data_view['ivts_souvenir'] = $this->db->query("SELECT SUM(biaya_rad) as total FROM pemeriksaan_radiologi");

		

		$data_view['ivts_baru'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpRespond' => NULL, 'ivts_RsvpStatus' => 'Undangan'))->num_rows();

		$data_view['ivts_baca'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpRespond' => '2', 'ivts_RsvpStatus' => 'Undangan'))->num_rows();

		$data_view['ivts_hadir'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpRespond' => '1', 'ivts_RsvpStatus' => 'Undangan'))->num_rows();

		//$data_view['ivts_tamu'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpRespond' => ' '))->num_rows();

		$data_view['ivts_nohadir'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpRespond' => '0', 'ivts_RsvpStatus' => 'Undangan'))->num_rows();

		$data_view['ivts_rsvp'] = $this->db->get_where('invitations', array('ivts_Client_Id' => $ID,'ivts_Deleted' => NULL, 'ivts_RsvpStatus' => 'RSVP'))->num_rows();



		//$data_view['scripts'] = 'scripts/client/form_edit';

		$pos = isset($_GET['pos']) ? $this->input->get('pos') : '';

		switch($pos){

			case '':

			case 'general':

			default:

				$data_view['form_edit_path'] = 'client/edit/general';

				$data_view['biodata'] = $data;

				$data_view['scripts'] = 'scripts/invitations/form_edit';

			break;

			case 'design':

				$data_view['form_edit_path'] = 'client/edit/design';

				$data_view['scripts'] = 'scripts/invitations/design';

				$properties = [];

				$propQ = $this->db->get_where('client_properties',['clprop_Client_Id'=>$ID]);

				if($propQ->num_rows()>0){

					$prop_db = $propQ->result_array();

					foreach($prop_db as $p){

						$properties[$p['clprop_Field']] = $p['clprop_Value'];

					}

				}

				$this->db->order_by('tplprop_Seq','asc');

				$colsQ = $this->db->get_where('template_properties',['tplprop_Tpl_Id'=>$data->client_Tpl_Id]);

				$data_view['properties'] = $properties;

				$data_view['columns'] = $colsQ->result_array();

			break;

			case 'invitation':

				$data_view['form_edit_path'] = 'client/edit/invitation';

				$data_view['scripts'] = 'scripts/invitations/invitations';

				$data_view['id'] = $data->client_Id;

			break;

			case 'caption':

				$data_view['form_edit_path'] = 'client/edit/caption';

				$data_view['scripts'] = 'scripts/invitations/caption';

				$data_view['id'] = $data->client_Id;

			break;

			case 'qrtemplate':

				$data_view['form_edit_path'] = 'client/edit/qrtemplate';

				$data_view['scripts'] = 'scripts/invitations/qrtemplate';

				$data_view['id'] = $data->client_Id;

			break;

			case 'rsvp':

				$data_view['form_edit_path'] = 'client/edit/rsvp';

				$data_view['id'] = $data->client_Id;

				$data_view['scripts'] = 'scripts/invitations/rsvp';

			break;

			case 'histori':

				$data_view['form_edit_path'] = 'client/edit/histori';

				$data_view['id'] = $data->client_Id;

				$data_view['scripts'] = 'scripts/invitations/histori';

			break;

			case 'historiwa':

				$data_view['form_edit_path'] = 'client/edit/histori_wa';

				$data_view['id'] = $data->client_Id;

				$data_view['scripts'] = 'scripts/invitations/histori_wa';

			break;

		}

		$data_view['js']	  = [

				base_url('public/backend/assets/datatables/js/jquery.dataTables.min.js'),

				base_url('public/backend/assets/datatables/js/bootstrap4.min.js'),

				base_url('public/backend/js/jquery.validate.min.js'),

				base_url('public/backend/assets/sweetalert/sweetalert2.min.js'),

				base_url('public/backend/assets/toastr-master/toastr.js'),

				base_url('public/backend/assets/select2/js/select2.min.js'),

				base_url('public/backend/assets/bootstrap-daterangepicker/moment.js'),

				base_url('public/backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'),

				base_url('public/backend/assets/bootstrap4-editable/js/bootstrap-editable.min.js'),

				base_url('public/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js'),

				base_url('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js'),

				base_url('public/backend/assets/datatables/Select-1.3.1/js/dataTables.select.min.js'),

			];

		$data_view['css']	  = [

				base_url('public/backend/assets/datatables/css/dataTables.bootstrap4.min.css'),

				base_url('public/backend/assets/toastr-master/toastr.css'),

				base_url('public/backend/assets/bootstrap-datetimepicker/css/datetimepicker.css'),

				base_url('public/backend/assets/sweetalert/sweetalert2.min.css'),

				base_url('public/backend/assets/select2/css/select2.min.css'),

				base_url('public/backend/assets/bootstrap4-editable/css/bootstrap-editable.css'),

				base_url('public/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css'),

				base_url('public/backend/assets/datatables/Select-1.3.1/css/select.dataTables.min.css'),

			];

		$this->load->view('backend/parts/layout',$data_view);

	}

	public function multiple_delete_invitations(){

		if(isset($_POST['ids']) && !empty($_POST['ids'])){

			$this->db->where_in('ivts_Id',$_POST['ids']);

			$this->db->delete('invitations');

		}

	}

	public function set_template_invitations(){

		 if(isset($_POST['ids']) && !empty($_POST['ids'])){

			if(!empty($_POST['tplivts']) && !empty($_POST['tpl'])){

				$this->db->where_in('ivts_Id',$_POST['ids']);

				$this->db->update('invitations',['ivts_tplqr_id'=>$_POST['tpl'],'ivts_tplivts_Id'=>$_POST['tplivts']]);

			}

			elseif(!empty($_POST['tpl'])){

				$this->db->where_in('ivts_Id',$_POST['ids']);

				$this->db->update('invitations',['ivts_tplqr_id'=>$_POST['tpl']]);

			}

			else{

				$this->db->where_in('ivts_Id',$_POST['ids']);

				$this->db->update('invitations',['ivts_tplivts_Id'=>$_POST['tplivts']]);

			}



		 }

	}

	public function form_photo(){

		$this->load->view('backend/client/modalers/photo',['client_Id'=>1,'client_Key'=>'photo']);

	}

	public function rsvp_datatables($id=null){

		// $this->load->library('Datatables');

		// $this->datatables->select('rsvp_Id,rsvp_Ivts_Id, case when rsvp_IsPresent=1 then \'Ya\' else \'Tidak\' end as rsvp_IsPresent,rsvp_Count,rsvp_Message,if(ivts_Name is null, rsvp_PlacedName , ivts_Name) as ivts_Name,rsvp_phoneNo,rsvp_Created');

		// $this->datatables->from('rsvps');

		// $this->datatables->join('invitations','invitations.ivts_Id=rsvps.rsvp_Ivts_Id','left');

		// $this->datatables->where('rsvp_Deleted IS NULL');

		// $this->datatables->where('rsvp_Client_Id',$id);



		$this->load->library('Datatables');

		//$this->datatables->select('*, case when ivts_RsvpRespond=1 then ivts_Guest else \'Tidak Hadir\' end as ivts_RsvpRespond');

		// $this->datatables->select('rsvps.*,

		// 								case when Rsvp_Respond=0 then \'Tidak Hadir\'

		// 									 when Rsvp_Respond=1 then Rsvp_Guest

		// 									 when Rsvp_Respond=2 then \'Dibaca\' else \'Baru\' end as Rsvp_Responds');

		$this->datatables->select('invitations.ivts_Name,

									invitations.ivts_Address,

									invitations.ivts_NoHp,

									invitations.ivts_Category,

									invitations.ivts_Seat,

									invitations.ivts_Group,

									invitations.ivts_Guest,

									invitations.ivts_RsvpRespond,

									invitations.ivts_SentStatus,

									invitations.ivts_tplqr_Id,

									invitations.ivts_tplivts_Id,

									invitations.ivts_RsvpMessage,

									invitations.ivts_LinkExternal,

									invitations.ivts_Created,

									invitations.ivts_Updated,

									invitations.ivts_Client_Id,

									invitations.ivts_Deleted,

									invitations.ivts_RsvpStatus,

									invitations.ivts_tplqr_Id,

									invitations.ivts_capt_Id,

									invitations.ivts_RsvpTime,

									invitations.ivts_RsvpStatus,

										case when ivts_RsvpRespond=101 then \'Archived\'
											 when ivts_RsvpRespond=0 then \'Tidak Hadir\'
											 when ivts_RsvpRespond=1 then ivts_RsvpGuest
											 when ivts_RsvpRespond=2 then \'Dibaca\' else \'Baru\' end as ivts_RsvpRespond');

		$this->datatables->from('invitations');

		//$this->datatables->join('invitations','invitations.ivts_Id=rsvps.rsvp_Ivts_Id','left');

		$this->datatables->where('invitations.ivts_Deleted IS NULL');

		$this->datatables->where('invitations.ivts_RsvpTime IS NOT NULL');

		//$this->datatables->where('invitations.ivts_RsvpStatus','RSVP');

		$this->datatables->where('invitations.ivts_Client_Id',$id);



		$this->output

			->set_content_type('application/json')

			->set_status_header(200)

			->set_output(@$this->datatables->generate());

	}

	public function delete_invitation(){

		//date('Y-m-d H:i:s');

		$insert['ivts_Deleted'] = date('Y-m-d H:i:s');

		$this->db->where('ivts_Id',$this->uri->segment(4));

		//$data = $this->db->delete('invitations');

		$data = $this->db->update('invitations',$insert);

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

	public function delete_caption(){

		//date('Y-m-d H:i:s');

		$insert['capt_Deleted'] = date('Y-m-d H:i:s');

		$this->db->where('capt_Id',$this->uri->segment(4));

		//$data = $this->db->delete('invitations');

		$data = $this->db->update('captions',$insert);

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

	public function save_invitation(){

		$status = 500;

		//$messages = [];

		$this->form_validation->set_rules('ivts_Name', 'Nama Undangan', 'required');

		// $this->form_validation->set_rules('ivts_Address', 'Alamat', 'required');

		// $this->form_validation->set_rules('ivts_NoHp', 'No HP', 'required');

		// $this->form_validation->set_rules('ivts_Guest', 'Tamu', 'required');

		// $this->form_validation->set_rules('ivts_Souvenir', 'Souvenir', 'required');

		// $this->form_validation->set_rules('ivts_Category', 'Kategori', 'required');

		// $this->form_validation->set_rules('ivts_Group', 'Grup', 'required');

		// $this->form_validation->set_rules('ivts_Seat', 'Kursi', 'required');

		

		if($this->form_validation->run()==FALSE){

			$this->output

        		->set_content_type('application/json')

        		->set_status_header(403)

        		->set_output(json_encode(['error'=>'Forbidden Access','message'=>'Please complete field.']));

		}else{

			$insert['ivts_Name']		= $this->input->post('ivts_Name');

			$insert['ivts_Client_Id']	= $this->input->post('ivts_Client_Id');

			$insert['ivts_Address'] 	= $this->input->post('ivts_Address');

			$insert['ivts_NoHp'] 		= $this->input->post('ivts_NoHp');

			$insert['ivts_Guest'] 		= $this->input->post('ivts_Guest');

			$insert['ivts_Souvenir'] 	= $this->input->post('ivts_Souvenir');

			$insert['ivts_Category'] 	= $this->input->post('ivts_Category');

			$insert['ivts_Group'] 		= $this->input->post('ivts_Group');

			$insert['ivts_GroupFam'] 	= $this->input->post('ivts_GroupFam');

			$insert['ivts_GroupSub'] 	= $this->input->post('ivts_GroupSub');

			$insert['ivts_Seat'] 		= $this->input->post('ivts_Seat');

			$insert['ivts_LinkExternal'] 	= $this->input->post('ivts_LinkExternal');

			$insert['ivts_tplqr_Id'] 	= $this->input->post('ivts_tplqr_Id');

			$insert['ivts_tplivts_Id'] 	= $this->input->post('ivts_tplivts_Id');

			

			// if(isset($_POST['ivts_tplqr_Id']) && !empty($_POST['ivts_tplqr_Id'])){

			// 	$insert['ivts_tplqr_Id'] = $this->input->post('ivts_tplqr_Id');

			// }

			if(isset($_POST['ivts_Id']) && !empty($_POST['ivts_Id'])){

				$insert['ivts_Updated']	= date('Y-m-d H:i:s');

				$this->db->where('ivts_Id',$_POST['ivts_Id']);

				$iId = $this->db->update('invitations',$insert);

			}else{

				$insert['ivts_Uuid'] 		= Uuid::uuid4();

				$insert['ivts_RsvpStatus'] 	= 'Undangan';

				$insert['ivts_Created'] 	= date('Y-m-d H:i:s');

				$iId = $this->db->insert('invitations',$insert);

			}

			

			if($iId==FALSE){

				$status = 401;

				$messages = ['error'=>'Cannot create','message'=>'Cannot save data.'];

			}else{

				$status = 201;

				$messages = ['message'=>'Data successfully saved.'];

			}

			$this->output

	    		->set_content_type('application/json')

	    		->set_status_header($status)

	    		->set_output(json_encode($messages));

		}

	}

	public function kirim($nomor,$message,$image=null){

		$curl = curl_init();
		$data = [
			'phone' => $nomor,
			//'caption'=>$message
		];
		if($image!=null){
			$data['image'] 	= $image;
			$data['caption']= $message;
			$url="/api/send-image";
		}else{
			$data['message']= $message;
			$url="/api/send-message";
		}
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				//"Authorization: o0KBiPRrFu6ezwkmdVcWPNXb6VjJ8xEAzxvXAgpjl5PLd7VMROTQP5PQsBNt2o0W",
				"Authorization: ".WABLAS_KEY,
				"Content-Type: application/json"
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data) );
		//curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/v2/send-image");
		curl_setopt($curl, CURLOPT_URL, WABLAS_URL.$url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
		echo "<pre>";
		print_r($result);

		//$obj = json_decode($result);
		//echo $obj->status ;
		//$wa_message= $obj->message ;
		//echo $obj->data->quota ;
		//echo $obj->data->message["id"];

	}
	
	public function kirim_wa_official($nomor,$message,$image=null){

		$curl = curl_init();
		$data = [
			'phone' => $nomor,
			//'caption'=>$message
		];
		if($image!=null){
			$data['image'] 	= $image;
			$data['caption']= $message;
			$url="/api/send-image";
		}else{
			$data['message']= $message;
			$url="/api/send-message";
		}
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				//"Authorization: o0KBiPRrFu6ezwkmdVcWPNXb6VjJ8xEAzxvXAgpjl5PLd7VMROTQP5PQsBNt2o0W",
				"Authorization: ".WABLAS_KEY,
				"Content-Type: application/json"
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data) );
		//curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/v2/send-image");
		curl_setopt($curl, CURLOPT_URL, WABLAS_URL.$url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
		echo "<pre>";
		print_r($result);

		//$obj = json_decode($result);
		//echo $obj->status ;
		//$wa_message= $obj->message ;
		//echo $obj->data->quota ;
		//echo $obj->data->message["id"];

	}

	public function blast($id=null){
	//if(isset($_POST['ids']) && !empty($_POST['ids'])){
		$data = $this->Client_model->findByID($id);
		$data_capt = $this->Caption_model->findFirst(['capt_Id'=>$_POST['capt']]);
		//$data_capt = $this->Caption_model->findFirst(['capt_Id'=>'76']);
		if(!empty($data->client_Deleted)){
			die();
		}
		echo '<a href="javascript:history.back()">Kembali</a><br>';
		echo $id;
		//$this->db->where('invitations.ivts_NoHp IS NOT NULL');
		//$this->db->join('clients','clients.`client_Id`=invitations.`ivts_Client_Id`');
		//$this->db->join('captions','captions.`capt_Id`=invitations.`ivts_Capt_Id`');
		//$this->db->join('captions_type','captions_type.`captType_Id`=captions.`capt_Id`');
		//$this->db->where('ivts_Id','290');
		//$this->db->update('invitations',['ivts_tplqr_id'=>'12313']);
		//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
		//$undangan = $this->db->where_in('ivts_Id',$_POST['ids']);
		
		$this->db->select('*');
		$this->db->from('invitations');
		$this->db->where_in('ivts_Id',$_POST['ids']);
		//$this->db->where_in('ivts_Id',['398']);
		$undangan = $this->db->get();
		print_r($this->db->last_query());
		echo $_POST['ids'];
		

		if($undangan->num_rows()>0){
			foreach($undangan->result() as $row){
				//$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
				$data = $this->Client_model->findByID($id);
				$link_invt = !empty($data->client_CustomDomain) ? $data->client_CustomDomain.'?uuid='.$row->ivts_Uuid : site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
				//$link_invt = site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
				$message = $data_capt->capt_Caption;
				$message = str_replace(['{{NAME}}','{{ADDR}}','{{LINK}}','{{TAMU}}','{{EXTLINK}}','{{TIME}}','{{RSVP}}'],[$row->ivts_Name,$row->ivts_Address,$link_invt,$row->ivts_Guest,$row->ivts_LinkExternal,$row->ivts_Group,$row->ivts_RsvpGuest],$message);
				$message.=PHP_EOL.PHP_EOL;

				 	if($data_capt->capt_type != 1){
						if($data_capt->capt_type == 2){ //QR
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_qr'.DS.$row->ivts_Files;
							//$image= 'https://portal.dgsign.id/public/invitation_qr/98304643_Muhammad_Abdillah_Ryanda-4d0c0780-3b99-4c72-a80d-4373e2102063.jpg';
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
						}elseif($data_capt->capt_type == 3){  //invitation
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$row->ivts_FilesIvts;
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/invitation_ivt/'.$row->ivts_FilesIvts;
						}elseif($data_capt->capt_type == 5){	//Poster
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'captpl'.DS.$data_capt->capt_TplFile;
							//$image= 'https://portal.dgsign.id/public/captpl/1668828449-RSVP_ARCHI.jpg';
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/captpl/'.$data_capt->capt_TplFile;
						}

						$newfile = FCPATH.'public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files;
							if (!copy($file, $newfile)) {
								echo "failed to copy $file...\n";
							}

						$image = site_url('public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files);
					//	$image= 'https://portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
						//$image= 'https://portal.dgsign.id/public/invitation_qr/98017657_Bpk._Teguh_Setiawan-4a5f732e-f470-4237-87bd-5866a2881727.jpg';
						//echo $image;
						//echo $message;
					 }

				$resp_kirim = $this->kirim($row->ivts_NoHp,$message,$image);
				echo $resp_kirim;
				$obj = json_decode($resp_kirim);
					//echo $obj->status ;
					$wa_message= $obj->messages ;
					 echo $obj->messages ;
					 echo $obj->data->quota ;
					// echo $obj->data->message["id"];
					echo $row->ivts_Name;
					foreach ($obj->data->messages as $row1) {
						$wa_id= $row1->id;
						$wa_phone= $row1->phone;
						$wa_caption= $row1->caption;
						$wa_image= $row1->image;
						$wa_status= $row1->status;
					}

					$nama = $row->ivts_Name;
					$data = array(
						//'id' => $id,
						'inbox_Id'=> $wa_id,
						'inbox_Name'=> $row->ivts_Name,
						'inbox_NoHp'=> $wa_phone,
						'inbox_Messages'=> $wa_caption,
						'inbox_Image'=> $wa_image,
						'inbox_Date'=> date('Y-m-d H:i:s'),
						'inbox_Status'=> $wa_status,
						'inbox_Client_Id'=> $id,
						'inbox_ivts_Id'=> $row->ivts_Id,
						'inbox_Platform'=> 'Whatsapp'
					);

				$this->db->insert('inbox', $data);
				$this->db->where('ivts_Id',$row->ivts_Id);
				$this->db->update('invitations',['ivts_SentTime'=>date('Y-m-d H:i:s'), 'ivts_SentStatus'=>$wa_status ]);
			}
		}

		//print_r($undangan->result_array());		
	}
	
	public function blast_wa_official($id=null){
	//if(isset($_POST['ids']) && !empty($_POST['ids'])){
		$data = $this->Client_model->findByID($id);
		$data_capt = $this->Caption_model->findFirst(['capt_Id'=>$_POST['capt']]);
		//$data_capt = $this->Caption_model->findFirst(['capt_Id'=>'76']);
		if(!empty($data->client_Deleted)){
			die();
		}
		echo '<a href="javascript:history.back()">Kembali</a><br>';
		echo $id;
		//$this->db->where('invitations.ivts_NoHp IS NOT NULL');
		//$this->db->join('clients','clients.`client_Id`=invitations.`ivts_Client_Id`');
		//$this->db->join('captions','captions.`capt_Id`=invitations.`ivts_Capt_Id`');
		//$this->db->join('captions_type','captions_type.`captType_Id`=captions.`capt_Id`');
		//$this->db->where('ivts_Id','290');
		//$this->db->update('invitations',['ivts_tplqr_id'=>'12313']);
		//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
		//$undangan = $this->db->where_in('ivts_Id',$_POST['ids']);
		
		$this->db->select('*');
		$this->db->from('invitations');
		$this->db->where_in('ivts_Id',$_POST['ids']);
		//$this->db->where_in('ivts_Id',['398']);
		$undangan = $this->db->get();
		print_r($this->db->last_query());
		echo $_POST['ids'];
		

		if($undangan->num_rows()>0){
			foreach($undangan->result() as $row){
				//$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
				$data = $this->Client_model->findByID($id);
				$link_invt = !empty($data->client_CustomDomain) ? $data->client_CustomDomain.'?uuid='.$row->ivts_Uuid : site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
				//$link_invt = site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
				$message = $data_capt->capt_Caption;
				$message = str_replace(['{{NAME}}','{{ADDR}}','{{LINK}}','{{TAMU}}','{{EXTLINK}}','{{TIME}}','{{RSVP}}'],[$row->ivts_Name,$row->ivts_Address,$link_invt,$row->ivts_Guest,$row->ivts_LinkExternal,$row->ivts_Group,$row->ivts_RsvpGuest],$message);
				$message.=PHP_EOL.PHP_EOL;

				 	if($data_capt->capt_type != 1){
						if($data_capt->capt_type == 2){ //QR
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_qr'.DS.$row->ivts_Files;
							//$image= 'https://portal.dgsign.id/public/invitation_qr/98304643_Muhammad_Abdillah_Ryanda-4d0c0780-3b99-4c72-a80d-4373e2102063.jpg';
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
						}elseif($data_capt->capt_type == 3){  //invitation
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$row->ivts_FilesIvts;
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/invitation_ivt/'.$row->ivts_FilesIvts;
						}elseif($data_capt->capt_type == 5){	//Poster
							$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'captpl'.DS.$data_capt->capt_TplFile;
							//$image= 'https://portal.dgsign.id/public/captpl/1668828449-RSVP_ARCHI.jpg';
						//	$image= 'https://dgsign.id/portal.dgsign.id/public/captpl/'.$data_capt->capt_TplFile;
						}

						$newfile = FCPATH.'public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files;
							if (!copy($file, $newfile)) {
								echo "failed to copy $file...\n";
							}

						$image = site_url('public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files);
					//	$image= 'https://portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
						//$image= 'https://portal.dgsign.id/public/invitation_qr/98017657_Bpk._Teguh_Setiawan-4a5f732e-f470-4237-87bd-5866a2881727.jpg';
						//echo $image;
						//echo $message;
					 }

				$resp_kirim = $this->kirim_wa_official($row->ivts_NoHp,$message,$image);
				echo $resp_kirim;
				$obj = json_decode($resp_kirim);
					//echo $obj->status ;
					$wa_message= $obj->messages ;
					 echo $obj->messages ;
					 echo $obj->data->quota ;
					// echo $obj->data->message["id"];
					echo $row->ivts_Name;
					foreach ($obj->data->messages as $row1) {
						$wa_id= $row1->id;
						$wa_phone= $row1->phone;
						$wa_caption= $row1->caption;
						$wa_image= $row1->image;
						$wa_status= $row1->status;
					}

					$nama = $row->ivts_Name;
					$data = array(
						//'id' => $id,
						'inbox_Id'=> $wa_id,
						'inbox_Name'=> $row->ivts_Name,
						'inbox_NoHp'=> $wa_phone,
						'inbox_Messages'=> $wa_caption,
						'inbox_Image'=> $wa_image,
						'inbox_Date'=> date('Y-m-d H:i:s'),
						'inbox_Status'=> $wa_status,
						'inbox_Client_Id'=> $id,
						'inbox_ivts_Id'=> $row->ivts_Id,
						'inbox_Platform'=> 'Whatsapp'
					);

				$this->db->insert('inbox', $data);
				$this->db->where('ivts_Id',$row->ivts_Id);
				$this->db->update('invitations',['ivts_SentTime'=>date('Y-m-d H:i:s'), 'ivts_SentStatus'=>$wa_status ]);
			}
		}

		//print_r($undangan->result_array());		
	}
	
	public function blast2($id=null,$capt,$ids){
		//if(isset($_POST['ids']) && !empty($_POST['ids'])){
			$data = $this->Client_model->findByID($id);
			$data_capt = $this->Caption_model->findFirst(['capt_Id'=>$capt]);
			//$data_capt = $this->Caption_model->findFirst(['capt_Id'=>'76']);
			if(!empty($data->client_Deleted)){
				die();
			}
			echo '<a href="javascript:history.back()">Kembali</a><br>';
			echo $id;
			echo $ids;
			//$this->db->where('invitations.ivts_NoHp IS NOT NULL');
			//$this->db->join('clients','clients.`client_Id`=invitations.`ivts_Client_Id`');
			//$this->db->join('captions','captions.`capt_Id`=invitations.`ivts_Capt_Id`');
			//$this->db->join('captions_type','captions_type.`captType_Id`=captions.`capt_Id`');
			//$this->db->where('ivts_Id','290');
			//$this->db->update('invitations',['ivts_tplqr_id'=>'12313']);
			//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
			//$undangan = $this->db->where_in('ivts_Id',$_POST['ids']);
			//$ids = array('102375', '102381', '102382');
			$this->db->select('*');
			$this->db->from('invitations');
			//$this->db->where_in('ivts_Id',[$ids]);
			$this->db->where_in('ivts_Id',[$ids]);
			$undangan = $this->db->get();
			print_r($this->db->last_query());
			echo $_POST['ids'];
	
			if($undangan->num_rows()>0){
				foreach($undangan->result() as $row){
					//$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
					$data = $this->Client_model->findByID($id);
					$link_invt = !empty($data->client_CustomDomain) ? $data->client_CustomDomain.'?uuid='.$row->ivts_Uuid : site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
					//$link_invt = site_url('invitations/'.$id.'/'.strtolower(url_title($data->client_Name,'-')).'/'.$row->ivts_Uuid);
					$message = $data_capt->capt_Caption;
					$message = str_replace(['{{NAME}}','{{ADDR}}','{{LINK}}','{{TAMU}}','{{EXTLINK}}','{{TIME}}','{{RSVP}}'],[$row->ivts_Name,$row->ivts_Address,$link_invt,$row->ivts_Guest,$row->ivts_LinkExternal,$row->ivts_Group,$row->ivts_RsvpGuest],$message);
					$message.=PHP_EOL.PHP_EOL;
	
						 if($data_capt->capt_type != 1){
							if($data_capt->capt_type == 2){ //QR
								$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_qr'.DS.$row->ivts_Files;
								$image= 'https://portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
							}elseif($data_capt->capt_type == 3){  //invitation
								$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'invitation_ivt'.DS.$row->ivts_FilesIvts;
								$image= 'https://portal.dgsign.id/public/invitation_ivt/'.$row->ivts_FilesIvts;
							}elseif($data_capt->capt_type == 5){	//Poster
								$file = FCPATH.'public'.DIRECTORY_SEPARATOR.'captpl'.DS.$data_capt->capt_TplFile;
								//$image= 'https://portal.dgsign.id/public/captpl/1668828449-RSVP_ARCHI.jpg';
								$image= 'https://portal.dgsign.id/public/captpl/'.$data_capt->capt_TplFile;
							}
	
							// $newfile = FCPATH.'public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files;
							// 	if (!copy($file, $newfile)) {
							// 		echo "failed to copy $file...\n";
							// 	}
	
							//$image = site_url('public'.DIRECTORY_SEPARATOR.'wa_tmp'.DS.time().'-'.$row->ivts_Files);
						//	$image= 'https://portal.dgsign.id/public/invitation_qr/'.$row->ivts_Files;
							//$image= 'https://portal.dgsign.id/public/invitation_qr/98017657_Bpk._Teguh_Setiawan-4a5f732e-f470-4237-87bd-5866a2881727.jpg';
							echo $image;
							//echo $message;
						 }
	
					$resp_kirim = $this->kirim($row->ivts_NoHp,$message,$image);
					echo $resp_kirim;
					$obj = json_decode($resp_kirim);
						//echo $obj->status ;
						$wa_message= $obj->messages ;
						 echo $obj->messages ;
						 echo $obj->data->quota ;
						// echo $obj->data->message["id"];
						echo $row->ivts_Name;
						foreach ($obj->data->messages as $row1) {
							$wa_id= $row1->id;
							$wa_phone= $row1->phone;
							$wa_caption= $row1->caption;
							$wa_image= $row1->image;
							$wa_status= $row1->status;
						}
	
						$nama = $row->ivts_Name;
						$data = array(
							//'id' => $id,
							'inbox_Id'=> $wa_id,
							'inbox_Name'=> $row->ivts_Name,
							'inbox_NoHp'=> $wa_phone,
							'inbox_Messages'=> $wa_caption,
							'inbox_Image'=> $wa_image,
							'inbox_Date'=> date('Y-m-d H:i:s'),
							'inbox_Status'=> $wa_status,
							'inbox_Client_Id'=> $id,
							'inbox_ivts_Id'=> $row->ivts_Id,
							'inbox_Platform'=> 'Whatsapp'
						);
	
					$this->db->insert('inbox', $data);
					$this->db->where('ivts_Id',$row->ivts_Id);
					$this->db->update('invitations',['ivts_SentTime'=>date('Y-m-d H:i:s'), 'ivts_SentStatus'=>$wa_status ]);
				}
			}
	
			print_r($undangan->result_array());		
		}
	
	public function histori($id=null){

		$data = $this->Client_model->findByID($id);

		if(!empty($data->client_Deleted)){

			echo "{}";

		}

		

			$this->load->library('Datatables');

			// $this->datatables->select('invitations.ivts_Id,

			// 							template_qr.tplqr_Id,

			// 							template_qr.tplqr_Mode,

			// 							captions.capt_Id,

			// 							captions.capt_Code,

			// 							invitations.ivts_Client_Id,

			// 							client_Name ,

			// 							client_Id,

			// 							ivts_SentTime ,

			// 							ivts_Uuid,

			// 							ivts_Name,

			// 							ivts_NoHp,

			// 							ivts_Address,

			// 							ivts_Guest,

			// 							ivts_Souvenir,

			// 							ivts_Category,

			// 							ivts_Group,

			// 							ivts_GroupFam,

			// 							ivts_GroupSub,

			// 							ivts_Seat,

			// 							ivts_tplqr_Id,

			// 							ivts_tplivts_Id,

			// 							ivts_RsvpStatus,

			// 							ivts_RsvpMessage,

			// 							ivts_Created,

			// 							ivts_Updated,

			// 							clients.client_CustomDomain');

			

			$this->datatables->select('invitations.ivts_Name,

											invitations.ivts_Address,

											invitations.ivts_NoHp,

											invitations.ivts_Category,

											invitations.ivts_Seat,

											invitations.ivts_Group,

											invitations.ivts_GroupFam,

											invitations.ivts_GroupSub,

											invitations.ivts_Guest,

											invitations.ivts_RsvpRespond,

											invitations.ivts_SentStatus,

											invitations.ivts_tplqr_Id,

											invitations.ivts_tplivts_Id,

											invitations.ivts_RsvpMessage,

											invitations.ivts_RsvpGuest,

											invitations.ivts_LinkExternal,

											invitations.ivts_Created,

											invitations.ivts_Updated,

											invitations.ivts_Client_Id,

											invitations.ivts_Deleted,

											invitations.ivts_RsvpStatus,

											invitations.ivts_tplqr_Id,

											invitations.ivts_capt_Id,

											invitations.ivts_Uuid,

											invitations.ivts_Id,

											invitations.ivts_GuestAtt,

											invitations.ivts_GuestAttTime,

											invitations.ivts_GuestAttCounter,

											invitations.ivts_Souvenir,

											invitations.ivts_SouvenirAtt,

											invitations.ivts_SouvenirAttTime,

											invitations.ivts_SouvenirAttCounter,

										clients.*, 

										template_qr.*,

										captions.*,

										case when ivts_RsvpRespond=101 then \'Archived\'
											 when ivts_RsvpRespond=0 then \'Tidak Hadir\'
											 when ivts_RsvpRespond=1 then ivts_RsvpGuest
											 when ivts_RsvpRespond=2 then \'Dibaca\' else \'Baru\' end as ivts_RsvpRespond');

			// $this->datatables->select('invitations.*,

			// 							 clients.*, 

			// 							 template_qr.*,

			// 							 captions.*,

			// 							 case when ivts_RsvpRespond=0 then \'Tidak Hadir\'

			// 								  when ivts_RsvpRespond=1 then ivts_RsvpGuest

			// 								  when ivts_RsvpRespond=2 then \'Dibaca\' else \'Baru\' end as ivts_RsvpRespond');

			$this->datatables->from('invitations');

			$this->datatables->join('clients','clients.client_Id=invitations.ivts_Client_Id','left');

			//$this->datatables->join('template_qr','template_qr.tplqr_Id=invitations.ivts_tplqr_Id or template_qr.tplqr_Id=invitations.ivts_tplivts_Id','left');

			$this->datatables->join('template_qr','template_qr.tplqr_Id=invitations.ivts_tplqr_Id','left');

			//$this->datatables->join('template_ivts','template_ivts.tplivts_Id=invitations.ivts_tplivts_Id','left');

			$this->datatables->join('captions','captions.capt_Id=invitations.ivts_capt_Id','left');

			//$this->datatables->join('inbox','inbox.inbox_ivts_Id=invitations.ivts_Id','left');

			$this->datatables->where('invitations.ivts_Deleted IS NULL');

			$this->datatables->where('invitations.ivts_RsvpStatus','Undangan');

			$this->datatables->where('invitations.ivts_Client_Id',$id);

			//$this->datatables->group_by("ivts_Id");

			$this->datatables->add_column(

				'qr',

				function($row){

					// if($row['capt_type'] == '1'){

					 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

						//return '<a href="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }elseif($row['capt_type'] == '2'){

					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }elseif($row['capt_type'] == '3'){

					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }elseif($row['capt_type'] == '4'){

					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }elseif($row['capt_type'] == '5'){

					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }elseif($row['capt_type'] == '6'){

					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';

					// }

					

				}

			);

			$this->datatables->add_column(

				'ivts',

				function($row){

					 	return '<a href="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/>kk</a>';

				

					}

			);

			$this->datatables->add_column(

				'status',

				function($row){

					return ''.$row['ivts_RsvpStatus'].'';

				}

			);

			$this->datatables->add_column(

				'action',

				function($row){

					$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];

					$tplqr_url   = site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']);

					$tplqr_url_dl   = site_url('home/downloadqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']);

					$tplivts_url = site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']);

					//$links = anchor('javascript:;','<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item edit-data']);

					$links= '<a href="'.$preview_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i> View RSVP</a>';

					$links.= '<a href="'.$tplqr_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> View QR</a>';

					$links.= '<a href="'.$tplqr_url_dl.'" class="dropdown-item" target="_blank"><i class="fa fa-picture-o"></i><img src="'.site_url('home/downloadqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> Download QR</a>';

					$links.= '<a href="'.$tplivts_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> View Invitation</a>';

					$links.= '<a href="javascript:void(0)" 

										onclick="sendWa(this)"

										data-message="wa" 

										data-client-id="'.$row['ivts_Client_Id'].'" 

										data-guest-id="'.$row['ivts_Id'].'"

										data-guest-name="'.$row['ivts_Name'].'"

										data-guest-phone="'.$row['ivts_NoHp'].'" class="dropdown-item btn-sm"><i class="fa fa-comment"></i> Send WA </a>';

					$links.= '<a href="javascript:;" class="dropdown-item edit-data"><i class="fa fa-edit"></i> Edit</a>';

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

	public function invitation($id=null){
		$data = $this->Client_model->findByID($id);

		if(!empty($data->client_Deleted)){

			echo "{}";

		}

			$this->load->library('Datatables');
			// $this->datatables->select('invitations.ivts_Id,
			// 							template_qr.tplqr_Id,
			// 							template_qr.tplqr_Mode,
			// 							captions.capt_Id,
			// 							captions.capt_Code,
			// 							invitations.ivts_Client_Id,
			// 							client_Name ,
			// 							client_Id,
			// 							ivts_SentTime ,
			// 							ivts_Uuid,
			// 							ivts_Name,
			// 							ivts_NoHp,
			// 							ivts_Address,
			// 							ivts_Guest,
			// 							ivts_Souvenir,
			// 							ivts_Category,
			// 							ivts_Group,
			// 							ivts_GroupFam,
			// 							ivts_GroupSub,
			// 							ivts_Seat,
			// 							ivts_tplqr_Id,
			// 							ivts_tplivts_Id,
			// 							ivts_RsvpStatus,
			// 							ivts_RsvpMessage,
			// 							ivts_Created,
			// 							ivts_Updated,
			// 							clients.client_CustomDomain');
			
			$this->datatables->select('invitations.ivts_Name,
											invitations.ivts_Address,
											invitations.ivts_NoHp,
											invitations.ivts_Category,
											invitations.ivts_Seat,
											invitations.ivts_Group,
											invitations.ivts_Guest,
											invitations.ivts_Souvenir,
											invitations.ivts_GroupFam,
											invitations.ivts_GroupSub,
											invitations.ivts_RsvpRespond,
											invitations.ivts_SentStatus,
											invitations.ivts_tplqr_Id,
											invitations.ivts_tplivts_Id,
											invitations.ivts_RsvpMessage,
											invitations.ivts_LinkExternal,
											invitations.ivts_Created,
											invitations.ivts_Updated,
											invitations.ivts_Client_Id,
											invitations.ivts_Deleted,
											invitations.ivts_RsvpStatus,
											invitations.ivts_tplqr_Id,
											invitations.ivts_capt_Id,
											invitations.ivts_Uuid,
											invitations.ivts_Id,
											invitations.ivts_Files,
										clients.*, 
										template_qr.*,
										captions.*,
										case when ivts_RsvpRespond=101 then \'Archived\'
											 when ivts_RsvpRespond=0 then \'Tidak Hadir\'
											 when ivts_RsvpRespond=1 then ivts_RsvpGuest
											 when ivts_RsvpRespond=2 then \'Dibaca\' else \'Baru\' end as ivts_RsvpRespond');
			
			// $this->datatables->select('invitations.*,
			// 							 clients.*, 
			// 							 template_qr.*,
			// 							 captions.*,
			// 							 case when ivts_RsvpRespond=0 then \'Tidak Hadir\'
			// 								  when ivts_RsvpRespond=1 then ivts_RsvpGuest
			// 								  when ivts_RsvpRespond=2 then \'Dibaca\' else \'Baru\' end as ivts_RsvpRespond');
			$this->datatables->from('invitations');
			$this->datatables->join('clients','clients.client_Id=invitations.ivts_Client_Id','left');
			//$this->datatables->join('template_qr','template_qr.tplqr_Id=invitations.ivts_tplqr_Id or template_qr.tplqr_Id=invitations.ivts_tplivts_Id','left');
			$this->datatables->join('template_qr','template_qr.tplqr_Id=invitations.ivts_tplqr_Id','left');
			//$this->datatables->join('template_ivts','template_ivts.tplivts_Id=invitations.ivts_tplivts_Id','left');
			$this->datatables->join('captions','captions.capt_Id=invitations.ivts_capt_Id','left');
			//$this->datatables->join('inbox','inbox.inbox_ivts_Id=invitations.ivts_Id','left');
			$this->datatables->where('invitations.ivts_Deleted IS NULL');
			$this->datatables->where('invitations.ivts_RsvpStatus','Undangan');
			$this->datatables->where('invitations.ivts_Client_Id',$id);
			//$this->datatables->group_by("ivts_Id");
			
			$this->datatables->add_column(
				'qr',
				function($row){
					// if($row['capt_type'] == '1'){
						return '<a href="https://portal.dgsign.id/public/invitation_qr/'.$row['ivts_Files'].'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					//return '<a href="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }elseif($row['capt_type'] == '2'){
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }elseif($row['capt_type'] == '3'){
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }elseif($row['capt_type'] == '4'){
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }elseif($row['capt_type'] == '5'){
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }elseif($row['capt_type'] == '6'){
					// 	return '<a href="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30"/></a>';
					// }
				}
			);

			$this->datatables->add_column(
				'ivts',
				function($row){
					 	return '<a href="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" target="_blank"><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/>kk</a>';		
					}
			);

			$this->datatables->add_column(
				'status',
				function($row){
					return ''.$row['ivts_RsvpStatus'].'';
				}
			);
			
			$this->datatables->add_column(
				'action',
				function($row){
					$preview_url = !empty($row['client_CustomDomain']) ? $row['client_CustomDomain'].'?uuid='.$row['ivts_Uuid'] : site_url('invitations/').$row['ivts_Client_Id'].'/'.strtolower(url_title($row['client_Name'])).'/'.$row['ivts_Uuid'];
					$tplqr_url   = site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']);
					$tplqr_url_dl   = site_url('home/downloadqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']);
					$tplivts_url = site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']);
					//$links = anchor('javascript:;','<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item edit-data']);
					$links= '<a href="'.$preview_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i> View RSVP</a>';
					$links.= '<a href="'.$tplqr_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i><img src="'.site_url('home/createqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> View QR</a>';
					$links.= '<a href="'.$tplqr_url_dl.'" class="dropdown-item" target="_blank"><i class="fa fa-picture-o"></i><img src="'.site_url('home/downloadqr/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> Download QR</a>';
					$links.= '<a href="'.$tplivts_url.'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i><img src="'.site_url('home/createivt/'.$row['client_Id'].'/'.$row['ivts_Uuid']).'" width="30" hidden/> View Invitation</a>';
					$links.= '<a href="javascript:void(0)" 
										onclick="sendWa(this)"
										data-message="wa" 
										data-client-id="'.$row['ivts_Client_Id'].'" 
										data-guest-id="'.$row['ivts_Id'].'"
										data-guest-name="'.$row['ivts_Name'].'"
										data-guest-phone="'.$row['ivts_NoHp'].'" class="dropdown-item btn-sm"><i class="fa fa-comment"></i> Send WA </a>';
					$links.= '<a href="javascript:;" class="dropdown-item edit-data"><i class="fa fa-edit"></i> Edit</a>';
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

	public function import_invitation()
	{
		//$insert['ivts_Client_Id']	= $this->input->post('ivts_Client_Id');
		// Load PhpSpreadsheet
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_name')) {
            //upload gagal
			//$this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
			$r=$this->upload->display_errors();
			echo $r;
            //redirect halaman
            //redirect('main/indexs');
        } else {
            $data_upload 		= $this->upload->data();
            $excelreader		= new XlsxReader();
            $loadexcel         	= $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             	= $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
								// $date		= date('Y-m-d H:i:s');
								// $date1		= date('Ymds');
								// $rand1		= (rand(1000000,9999999));
								// $rand2		= $date1.$rand1;				

                                array_push($data, array(
                                    'ivts_Client_Id'=> $this->input->post('ivts_Client_Id'),
                                    'ivts_Uuid'    	=> Uuid::uuid4(),
									//'ivts_Uuid'    	=> $row['L'],
									'ivts_Name'   	=> $row['A'],
									'ivts_Address'  => $row['B'],
									'ivts_NoHp'  	=> $row['C'],
									'ivts_Category' => $row['D'],
									'ivts_Seat'   	=> $row['E'],
									'ivts_Guest'	=> $row['F'],
									'ivts_Souvenir'	=> $row['G'],
									'ivts_Group'	=> $row['H'],
									'ivts_GroupSub'	=> $row['I'],
									'ivts_GroupFam' => $row['J'],
									'ivts_LinkExternal' => $row['K'],
									'ivts_tplqr_Id' => $row['L'],
									'ivts_tplivts_Id' => $row['M'],
									'ivts_RsvpRespond' => $row['N'],
									'ivts_RsvpGuest' => $row['O'],
									'ivts_Anggota' => $row['P'],
									'ivts_Created'	=> date('Y-m-d H:i:s'),
									'ivts_RsvpStatus' => 'Undangan',
								));				
                    }
                $numrow++;
            }
			//$insert['ivts_Uuid']		= Uuid::uuid4();
			// $insert['ivts_Name']		= 'ivts_Name';
			// $insert['ivts_Client_Id']	= '555';
			// $insert['ivts_Address'] 	= 'ivts_Address';
			// $insert['ivts_NoHp'] 		= '2222';
			// $insert['ivts_Guest'] 		= '222';
			// $insert['ivts_Souvenir'] 	= '111';
			// $insert['ivts_Category'] 	= 'ivts_Category';
			// $insert['ivts_Group'] 		= 'ivts_Group';
			// $insert['ivts_Seat'] 		= 'ivts_Seat';
			// $insert['ivts_tplqr_Id'] 	= '1';
			// $insert['ivts_capt_Id'] 	= '2';
			// $insert['ivts_Created'] 	= date('Y-m-d H:i:s');

				//$iId = $this->db->insert('invitations',$insert);

				$iId = $this->db->insert_batch('invitations', $data);

			if($iId==FALSE){

				$status = 401;

				$messages = ['error'=>'Cannot create','message'=>'Cannot save data.'];

			}else{

				$status = 201;

				$messages = ['message'=>'Data successfully saved.'];

			}

			$this->output

				->set_content_type('application/json')

				->set_status_header($status)

				->set_output(json_encode($messages));



        //    unlink(realpath('excel/'.$data_upload['file_name']));



            //upload success

            //$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

			//redirect halaman

			//$this->generateQR();

            //redirect('main/index');



        }

	

	}



	public function createzip_qrcode($id, $check='empty'){
		// create zip file on server
		$this->load->library('zip');
		@$array = $_GET['array'];
		if($check == 'all' && $array == NULL){
			$query = $this->db->query("SELECT * FROM invitations where ivts_Client_Id = $id and ivts_Deleted IS NULL");
		}elseif($array && $array !='' && $array != NULL && $check == 'empty'){

		//$query = $this->db->get('tb_rsvp');

		// $data = $this->Client_model->findByID($clientid);

		//$query = $this->Invitations_model->findFirst(['ivts_Client_Id'=>$id]);

		$query = $this->db->query("SELECT * FROM invitations where ivts_Id IN ($array) and ivts_Deleted IS NULL");
		
		}else{
			return false;
		}
		//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
		// echo "<pre>"; print_r($query->result()); exit;
		foreach ($query->result() as $row)

		  {

			$fileName = $row->ivts_Files;
			$filepath = "public/invitation_qr/" . $fileName;

			$this->zip->read_file($filepath);

		  }
		  $date = date('Y-m-d-H-i-s');
		  $this->zip->archive("public/invitation_qr/".$date.".zip");

		  //redirect('main/index');

		 $filename = $date.'.zip';

		 $this->zip->download($date.".zip");

   }

   public function createpdf_qrcode($id){
   		set_time_limit ( 60 * 5 ); // 5 minutes
		@$array = $_GET['array'];
		if($array && $array !='' && $array != NULL){

		//$query = $this->db->get('tb_rsvp');

		// $data = $this->Client_model->findByID($clientid);

		//$query = $this->Invitations_model->findFirst(['ivts_Client_Id'=>$id]);

		$query = $this->db->query("SELECT * FROM invitations where ivts_Id IN ($array) and ivts_Deleted IS NULL");
		
		}else{
			return false;
		}
		
		//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
		// echo "<pre>"; print_r($query->result()); exit;
		foreach ($query->result() as $row)

		  {

			$fileName = $row->ivts_Files;
			$filepath[] = "public/invitation_qr/" . $fileName;

		  }
		  // var_dump($filepath);exit;
		  for ($i=0; $i < count($filepath); $i++) { 
		  	$htmlcontent[] = '<img src="'.site_url().$filepath[$i].'" width="250" height="250" hspace="100">';
		  }
		  $imp = implode('', $htmlcontent);
		  // var_dump($imp);exit;

		  $html2pdf = new Html2Pdf('P','A3','en', false, 'UTF-8');
		  $html2pdf->writeHTML('<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> '.$imp.'</page>');
		  $html2pdf->output();

   }

   		public function export_data($id){
			//	set_time_limit ( 60 * 5 ); // 5 minutes
			@$array = $_GET['array'];
			if($array && $array !='' && $array != NULL){


			$query = $this->db->query("SELECT * FROM invitations where ivts_Id IN ($array) and ivts_Deleted IS NULL");
			
			}else{
				return false;
			}
			
			//$undangan = $this->db->get_where('invitations',['clients.`client_Id`'=>'11']);
			// echo "<pre>"; print_r($query->result()); exit;
			// foreach ($query->result() as $row)

			// {

			// 	$fileName = $row->ivts_Files;
			// 	$filepath[] = "public/invitation_qr/" . $fileName;

			// }
			// // var_dump($filepath);exit;
			// for ($i=0; $i < count($filepath); $i++) { 
			// 	$htmlcontent[] = '<img src="'.site_url().$filepath[$i].'" width="250" height="250" hspace="100">';
			// }
			// $imp = implode('', $htmlcontent);
			// // var_dump($imp);exit;

			// $html2pdf = new Html2Pdf('P','A3','en', false, 'UTF-8');
			// $html2pdf->writeHTML('<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> '.$imp.'</page>');
			// $html2pdf->output();

			// Load PhpSpreadsheet
			$excel = new Spreadsheet();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('dgsign.id')
						->setLastModifiedBy('dgsign.id')
						->setTitle("Dgsign Data")
						->setSubject("Export Data")
						->setDescription("Data Tamu")
						->setKeywords("Data tamu");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => Border::BORDER_THIN) // Set border left dengan garis tipis
			)
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
			'alignment' => array(
				'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => Border::BORDER_THIN) // Set border left dengan garis tipis
			)
			);
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "DGSIGN EXEPORT DATA"); // Set kolom A1 dengan tulisan "DATA SISWA"
			$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "Status Undangan"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama lengkap"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "Alamat / Instansi / Jabatan"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "No. Handphone"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "Group"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "Meja"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('H3', "Perkiraan Tamu"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('I3', "Perkiraan Souvenir"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('J3', "Waktu Acara"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('K3', "Sub Kategori"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('L3', "Kategori"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('M3', "Link External"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('N3', "ID QR Code Template");
			$excel->setActiveSheetIndex(0)->setCellValue('O3', "ID Personal Image Template");
			$excel->setActiveSheetIndex(0)->setCellValue('P3', "Link Web Invitation");
			$excel->setActiveSheetIndex(0)->setCellValue('Q3', "Satatus Whatsapp");
			$excel->setActiveSheetIndex(0)->setCellValue('R3', "Status RSVP");
			$excel->setActiveSheetIndex(0)->setCellValue('S3', "Pesan RSVP");
			$excel->setActiveSheetIndex(0)->setCellValue('T3', "Waktu RSVP");
			$excel->setActiveSheetIndex(0)->setCellValue('U3', "Tamu Hadir");
			$excel->setActiveSheetIndex(0)->setCellValue('V3', "Waktu Hadir");
			$excel->setActiveSheetIndex(0)->setCellValue('W3', "User Tamu");
			$excel->setActiveSheetIndex(0)->setCellValue('X3', "Sovenir diberikan");
			$excel->setActiveSheetIndex(0)->setCellValue('Y3', "Waktu Souvenir");
			$excel->setActiveSheetIndex(0)->setCellValue('Z3', "User Souvenir");

			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_col);


			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			//$siswa = $this->M_export->data_tamu($id_event,$id_role);
			//$query = $this->db->query("SELECT * FROM invitations where ivts_Id IN ($array) and ivts_Deleted IS NULL");
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($query->result() as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->ivts_RsvpStatus); 
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->ivts_Name);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->ivts_Address);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->ivts_NoHp);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ivts_Category);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ivts_Seat);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->ivts_Guest);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->ivts_Souvenir);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->ivts_Group);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->ivts_GroupSub);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->ivts_GroupFam);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->ivts_LinkExternal);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->ivts_tplqr_Id);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->ivts_tplivts_Id);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, base_url('?uuid='.$data->ivts_Uuid));////////////
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->ivts_SentStatus);

			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->ivts_tplqr_Id);/////////////

			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->ivts_RsvpMessage);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->ivts_RsvpTime);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->ivts_GuestAtt);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->ivts_GuestAttTime);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->ivts_GuestAttCounter);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->ivts_SouvenirAtt);
			$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->ivts_SouvenirTime);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->ivts_SouvenirCounter);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan Data");
			$excel->setActiveSheetIndex(0);
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="'.$username.'-dgsign.xls"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$write = new Xlsx($excel);
			$write->save('php://output');

		}


	public function save_general(){

		$status = 500;

		$messages = [];

		$this->form_validation->set_rules('client_Name', 'Nama Client', 'required');

		$this->form_validation->set_rules('client_Email', 'Alamat Email', 'required');

		$this->form_validation->set_rules('client_Phone', 'Nomor Telepon', 'required');

		$this->form_validation->set_rules('client_Id', 'ID Client', 'required');

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

			$id = $this->input->post('client_Id');

			$insert['client_Name'] = $this->input->post('client_Name');

			$insert['client_Email'] = $this->input->post('client_Email');

			$insert['client_Phone'] = $this->input->post('client_Phone');

			$insert['client_CustomDomain'] = $this->input->post('client_CustomDomain');

			$iId = $this->Client_model->update($insert,['client_Id'=>$id]);

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

	public function delete(){

		$ID = $this->uri->segment(4);

		$properties = $this->db->get_where('client_properties',['clprop_Client_Id'=>$ID]);

		if($properties->num_rows()>0){

			foreach($properties->result_array() as $row){

				if(is_file(FCPATH.DS.'public'.DS.'uploads'.$row['clprop_Value'])){

					@unlink(FCPATH.DS.'public'.DS.'uploads'.$row['clprop_Value']);

				}

			}

		}

		$this->db->where('clprop_Client_Id',$ID);

		$this->db->delete('client_properties');

		

		$this->db->where('capt_Client_Id',$ID);

		$this->db->delete('captions');



		$this->db->where('ivts_Client_Id',$ID);

		$this->db->delete('invitations');



		$this->db->where('rsvp_Client_Id',$ID);

		$this->db->delete('rsvps');



		$data = $this->Client_model->delete(['client_Id'=>$ID]);

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

			//$_SESSION['auth_login']['backend']->admnLevel

			$this->load->library('Datatables');

			$this->datatables->select('client_Id,tpl_Name,client_Name,client_Email,client_Phone,client_RegisterDate,client_admnCliId');

			$this->datatables->from('clients');

			$this->datatables->join('templates','templates.tpl_Id=clients.client_Tpl_Id');

			$this->datatables->where('client_Deleted IS NULL');

			if ($_SESSION['auth_login']['backend']->admnLevel == 'vendor'){

				$this->datatables->where('client_admnUsrId', $_SESSION['auth_login']['backend']->admnUsername);

			}

			if ($_SESSION['auth_login']['backend']->admnLevel == 'client'){

				$this->datatables->where('client_admnCliId', $_SESSION['auth_login']['backend']->admnUsername);

			}

			$this->datatables->add_column(

				'action',

				function($row){

					$links = anchor('backend/client/edit/'.$row['client_Id'],'<i class="fa fa-edit"></i> Edit',['class'=>'dropdown-item']);

					$links.= '<a href="javascript:;" class="dropdown-item" onClick="deleteData('.$row['client_Id'].')"><i class="fa fa-trash-o"></i> Delete</a>';

					return '<div class="btn-group"><button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button><div class="dropdown-menu">'.$links.'</div></div>';

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

