<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends Backend_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Setting_model');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
	}
	public function index(){
		$this->breadcrumbs->push('Dashboard',site_url('backend/dashboard'));
		$this->breadcrumbs->push('Setting','#',TRUE);
		//$this->datatables->where('queue.quueSiteId',$_SESSION['auth_login']['backend']->admnSiteId);
		$setting_list = $this->Setting_model->find(['stngSiteId'=>$_SESSION['auth_login']['backend']->admnSiteId]);
		$data_view = $this->data_view;
		$data_view['breadcrumb'] = $this->breadcrumbs->build();
		$data_view['content'] = 'setting/list';
		$data_view['title']   = 'Setting';
		$data_view['setting_list'] = $setting_list;
		$data_view['scripts'] = 'scripts/setting/editable';
		$data_view['js']	  = [
				base_url('public/backend/assets/sweetalert/sweetalert2.min.js'),
				base_url('public/backend/assets/bootstrap4-editable/js/bootstrap-editable.min.js')
			];
		$data_view['css']	  = [
				base_url('public/backend/assets/sweetalert/sweetalert2.min.css'),
				base_url('public/backend/assets/bootstrap4-editable/css/bootstrap-editable.css')
			];
		$this->load->view('backend/parts/layout',$data_view);
	}
}
