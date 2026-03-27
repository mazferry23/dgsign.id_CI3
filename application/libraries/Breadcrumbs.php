<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Breadcrumbs{
	private $breadcrumbs_array = array();
	private $compiled_string = "";
	public function __construct(){
	}
	public function push($title, $href='#', $is_active=FALSE,$addtional_attributes = array()){
		array_push($this->breadcrumbs_array,array('title'=>$title,'href'=>$href,'is_active'=>$is_active,'attributes'=>$addtional_attributes));
	}
	public function pop(){
		array_pop($breadcrumbs_array);
	}
	public function reset(){
		$this->breadcrumbs_array = array();
	}
	public function build(){
		$this->compiled_string = "<nav aria-label=\"breadcrumb\"><ol class=\"breadcrumb\">";
		foreach ($this->breadcrumbs_array as $value) {
			$addtional_attributes = "";
			if(count($value['attributes'])>0){
				foreach($value['attributes'] as $key=>$val){
					$addtional_attributes.=$key."=\"$val\" ";
				}
			}
			if($value['is_active']===TRUE){
				$this->compiled_string.="<li class=\"breadcrumb-item active\" $addtional_attributes>$value[title]</li>";
			}else{
				$this->compiled_string.="<li class=\"breadcrumb-item\" $addtional_attributes><a href=\"$value[href]\">$value[title]</a></li>";
			}
		}
		$this->compiled_string.="</ol></nav>";
		return $this->compiled_string;
	}
}
