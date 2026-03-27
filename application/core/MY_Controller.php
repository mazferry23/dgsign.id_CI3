<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backend_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->isloggin();
		$level = $_SESSION['auth_login']['backend']->admnLevel;
		$sidebar = '';
		if( $level=='super' || $level=='root'){
			$sidebar = 'sidebar_root';
		}
		else if($level == 'admin'){
			$sidebar = 'sidebar_admin';
		}
		else if($level == 'vendor'){
			$sidebar = 'sidebar_admin';
		}
		else if($level == 'client'){
			$sidebar = 'sidebar_admin';
		}
		else if($level == 'operator edit'){
			$sidebar = 'sidebar_admin';
		}
		else if($level == 'operator view'){
			$sidebar = 'sidebar_admin';
		}
		else if($level == 'operator scanner'){
			$sidebar = 'sidebar_admin';
		}
		
		$this->data_view = [
			'sidebar'=>$sidebar,
			'dataUser'=>$_SESSION['auth_login']['backend']
		];
	}
	protected function isloggin(){
		if(!isset($_SESSION['auth_login']['backend'])){
			redirect(site_url('backend/login?redir='.urlencode(current_url())));
		}
	}
	protected function allowed_level($levelRequired){
		$level = $_SESSION['auth_login']['backend']->admnLevel;
		if(!in_array($level,$levelRequired)){
			redirect(site_url('backend/dashboard'));
		}
	}
}
class Frontend_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->isloggin();
	}
	protected function isloggin(){
		return 'OK';
	}
}
