<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prokes_model extends MY_Model {
	protected $table_name = 'prokes';
	protected $prefixColumn = 'prokes_';
	public function __construct(){
		parent::__construct();
	}
}
