<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Backend_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->model('Customer_model');
		//$data = ['cstmCode'=>'xxxxxx-xxxx-xxx','cstmName'=>'Paijo','cstmPhone'=>'089989898'];
		//$x = $this->Customer_model->findCustomerCode($data['cstmCode'], $data);
		//print_r($x);
		redirect(site_url('backend'));
		//die();
		//$x = $this->db->delete('meong',['meongid'=>1]);
		//print_r($x);
		//print_r($this->db->affected_rows());
		//$this->load->model('Topik_model');
		//$this->Topik_model->create(['tpikTitle'=>'Oce']);
		//$this->load->view('welcome_message');
	}
}
