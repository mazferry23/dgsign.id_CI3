<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientprop_model extends MY_Model {
	protected $table_name = 'client_properties';
	protected $prefixColumn = 'clprop_';
	public function __construct(){
		parent::__construct();
	}
}
