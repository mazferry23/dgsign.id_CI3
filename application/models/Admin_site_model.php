<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_site_model extends MY_Model {
	protected $table_name = 'admin_site';
	protected $prefixColumn = 'adst';
	public function __construct(){
		parent::__construct();
	}
}
