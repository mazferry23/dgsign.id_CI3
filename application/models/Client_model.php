<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends MY_Model {
	protected $table_name = 'clients';
	protected $prefixColumn = 'client_';
	public function __construct(){
		parent::__construct();
	}
}
