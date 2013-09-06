<?php
class Test extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('test_model');//把用到的model进行加载，否则会报错
	}
	
	function getAll(){
		$data=$this->test_model->getTableData();
		
		echo '<pre>';
		print_r($data);
		echo '</pre>';exit;
	}
	
	function getLimit(){
		$data=$this->test_model->getTableData2();
	
		echo '<pre>';
		print_r($data);
		echo '</pre>';exit;
	}
	
}