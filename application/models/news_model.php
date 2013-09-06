<?php
class News_model extends CI_Model{

	function __construct(){
		$this->load->database(); //加载数据库配置 
	}
	
/*创建数据表 news  
  CREATE TABLE news (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(128) NOT NULL,
  slug varchar(128) NOT NULL,
  text text NOT NULL,
  PRIMARY KEY (id),
  KEY slug (slug)
);*/
	function get_news($slug = FALSE){
		if ($slug === FALSE){
			$query=$this->db->get('news');  //读取数据表
			return $query->result_array();  // 把 select * from news 的结果以数组的形式进行返回
		}
		
		$query=$this->db->get_where('news',array('slug'=>$slug));
		//上面组成的sql是 ： select  * from news where slug = $slug
		
		return $query->row_array(); //数组形式返回  ？
		
	}
	
}