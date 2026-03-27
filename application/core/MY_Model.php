<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	
	protected $table_name = '';
	protected $prefixColumn = '';

	public function __construct(){
		
	}
	public function raw($query){
		$q = $this->db->query($query);
		if($q->num_rows()>0){
			return $q->result();
		}
		return FALSE;
	}
	public function rawRow($query){
		$q = $this->db->query($query);
		if($q->num_rows()>0){
			return $q->row();
		}
		return FALSE;
	}
	public function where_in($column,$data){
		$this->db->where_in($column,$data);
	}
	public function join($table_join,$fk,$type=''){
		$this->db->join($table_join,$fk,$type);
	}
	public function findByID($id){
		$this->db->where($this->prefixColumn.'Deleted IS NULL');
		$q = $this->db->get_where($this->table_name,[$this->prefixColumn.'Id'=>$id]);
		//make sure that have row result
		if($q->num_rows() > 0){
			return $q->row();
		}
		return FALSE;
	}
	public function findFirst($conditions){
		$this->db->where($this->prefixColumn.'Deleted IS NULL');
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		$q = $this->db->get($this->table_name);
		//make sure that have result
		if($q->num_rows()>0){
			return $q->row();
		}
		return FALSE;

	}
	public function findRows($conditions=null){
		$this->db->where($this->prefixColumn.'IsDeleted',0);
		if(!empty($conditions) && count($conditions)>0){
			foreach($conditions as $key=>$val){
				$this->db->where($key,$val);
			}
		}
		$q = $this->db->get($this->table_name);
		//make sure that have result
		return $q->num_rows();
	}
	public function find($conditions=array(),$limit=10,$offset=0){
		$this->db->where($this->prefixColumn.'Deleted IS NULL');
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		if($limit!=null){
			$this->db->limit($limit,$offset);	
		}
		$q = $this->db->get($this->table_name);
		//make sure that have result
		if($q->num_rows()>0){
			return $q->result();
		}
		return FALSE;
	}
	public function create($data){
		$data[$this->prefixColumn.'Created'] = date('Y-m-d H:i:s');
		$insert = $this->db->insert($this->table_name,$data);
		if($insert){
			return $this->db->insert_id();
		}
		return FALSE;
	}
	public function create_bulk($data){
		return $this->db->insert_batch($this->table_name,$data);
	}
	public function update($data,$conditions){
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		$data[$this->prefixColumn.'Updated'] = date('Y-m-d H:i:s');
		return $this->db->update($this->table_name,$data);
	}
	public function update_bulk($data,$value){
		return $this->db->update_batch($this->table_name,$data,$value);	
	}
	public function patch($field,$value,$conditions){
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		return $this->db->update($this->table_name,[$field=>$value,$this->prefixColumn.'Updated'=>date('Y-m-d H:i:s')]);
	}
	public function soft_delete($conditions){
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		return $this->db->update($this->table_name,[$this->prefixColumn.'Deleted'=>date('Y-m-d H:i:s'),$this->prefixColumn.'IsDeleted'=>1]);
	}
	public function delete($conditions){
		foreach($conditions as $key=>$val){
			$this->db->where($key,$val);
		}
		return $this->db->delete($this->table_name);
	}
}