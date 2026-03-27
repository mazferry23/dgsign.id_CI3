<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitations_model extends MY_Model {
	protected $table_name = 'invitations';
	protected $prefixColumn = 'ivts_';
	public function __construct(){
		parent::__construct();
	}
}
