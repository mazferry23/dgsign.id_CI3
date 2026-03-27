<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template_properties_model extends MY_Model {
	protected $table_name = 'calling_queue';
	protected $prefixColumn = 'calq';
	public function __construct(){
		parent::__construct();
	}
}
