<?php
class Test_model extends CI_Model{  //本这个model类中学习CI的model使用
	function __construct(){
		$this->load->database();	//加载数据库配置信息
	}
	
	function getTableData(){ //获取整张表的信息
		$query=$this->db->get('news');
		// 组成的sql： select * from news
		//获取到的是对象
		
		return $query->result_array();//把结果以数组的形式进行返回		
	}
	
	function getTableData2(){ //获取整张表的信息
		$query=$this->db->get('news',1,0);   //从0开始，取1条记录
		// 组成的sql： select * from news limit 0,1
		//获取到的是对象
	
		return $query->result_array();//把结果以数组的形式进行返回
	}
	

	
}