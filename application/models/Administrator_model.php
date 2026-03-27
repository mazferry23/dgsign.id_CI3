<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends MY_Model {
	
	protected $table_name = 'administrator';
	protected $prefixColumn = 'admn';

	public function __construct(){
		parent::__construct();
	}
	public function findUserId($userId){
		$this->db->where('admnUserName',$userId);
		return $this->db->get($this->table_name);
	}
	public function validateUserAndPassword($userData,$password){
		
	}
	
}