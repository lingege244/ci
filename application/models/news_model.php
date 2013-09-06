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
	
	function set_news(){ //写一个方法用来向数据库中写入数据。
		//用Acitve Record类来插入信息，并用到输入类来获得post数据
		
		$this->load->helper('url');
 		$slug = url_title($this->input->post('title'), 'dash', TRUE);  //????????????
 		//url_title()。这个函数是由 URL辅助函数 提供的，用来组织（strips down）你输入的字符串，将空格的地方替换成横线（-），确保其中全都是小写字母。这样之后剩下的就是一个漂亮的slug，可以很好地用来创建URI
  
  		$data = array(  //插入到数据库里面的字段信息，每个元素都对应着早前创建的数据表中的每一列
    		'title' => $this->input->post('title'),
    		'slug' => $slug,
    		'text' => $this->input->post('text')
 		 );
 		 //新的方法叫 post() ，它是由 输入类提供的。这个方法可以确保数据是被过滤过（sanitized）的，
 		 //从而保护你不被其他人恶意攻击。这个输入类是默认加载的
 		 
  
  		return $this->db->insert('news', $data); // news代表 数据表名称
			
	}
	
}