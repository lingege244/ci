<?php
class News extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');//加载对应的model
	}
	
	function index(){
		$data['news']=$this->news_model->get_news();  //调用news_model类里面的get_news方法
		$data['title']='Get News';
		
		$this->load->view('templates/head.php',$data);
		$this->load->view('news/index.php',$data);
		$this->load->view('templates/footer.php');
	}
	
	function view($slug){
		$data['news']=$this->news_model->get_news($slug);  //调用news_model类里面的get_news方法
		
/*		echo '<pre>';
		print_r($data['news']);  一维数组
		echo '</pre>';exit;
		Array
(
    [id] => 3
    [title] => title3
    [slug] => slug3
    [text] => text3
)
	*/	
		if (empty($data['news'])){  //数据库那里没有数据
			show_404();
		}
		$data['title']=$data['news']['title'];
		
		$this->load->view('templates/head.php',$data);
		$this->load->view('news/view.php',$data);
		$this->load->view('templates/footer.php');
	}
}