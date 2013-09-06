<?php
class Page extends CI_Controller{

	function  __construct(){
		parent::__construct();
	}
	
	function view($page='home'){ 
		if (!file_exists('application/views/page/'.$page.'.php')){
			show_404();//显示 CI 提供的 404 页面
		}
		$data['title']=ucfirst($page);  //在模板中用 $title ??   
		//在页头模板（header.php）中，我们用 $title 变量来自定义页面标题（<title>）。
		//而这个变量的值，我们现在在这个方法中对它进行了定义。
		//不过，我们并没有将这个值直接赋给变量，而是将它作为一个元素赋给了 $data 数组。
		
		$this->load->view('templates/head.php',$data);
		
		// view() 方法中的第二个参数是用来传递值给视图的。
		//数组中的每个值都被定义成与它关键字相同的一个变量，
		//如控制器中 $data['title'] 的值就等同于视图中变量$title
		$this->load->view('page/'.$page.'.php');
		$this->load->view('templates/footer.php');
	}
}