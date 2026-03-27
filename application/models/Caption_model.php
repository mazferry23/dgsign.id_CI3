<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caption_model extends MY_Model {
	protected $table_name = 'captions';
	protected $prefixColumn = 'capt_';
	public function __construct(){
		parent::__construct();
	}
}
