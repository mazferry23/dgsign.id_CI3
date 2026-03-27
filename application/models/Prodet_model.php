<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodet_model extends MY_Model {
	protected $table_name = 'prokes_detail';
	protected $prefixColumn = 'prodet_';
	public function __construct(){
		parent::__construct();
	}
}
