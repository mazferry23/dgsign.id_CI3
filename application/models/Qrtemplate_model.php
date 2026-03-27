<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrtemplate_model extends MY_Model {
	protected $table_name = 'template_qr';
	protected $prefixColumn = 'tplqr_';
	public function __construct(){
		parent::__construct();
	}
}
