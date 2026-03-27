<?php
class Dashboard extends Backend_Controller{
	public function index(){
		$data_view = $this->data_view;
		$data_view['content']='dashboard/dashboard';
		$data_view['title']='Wedding Invitation';
		$data_view['client'] = $this->db->get_where('clients')->num_rows();
		$data_view['rsvp'] = $this->db->get_where('rsvps')->num_rows();
		$data_view['invitations'] = $this->db->get_where('invitations')->num_rows();
		$this->load->view('backend/parts/layout',$data_view);
	}
	public function logout(){
		$this->session->unset_userdata('auth_login');
		redirect(site_url('backend/dashboard'));
	}
}
