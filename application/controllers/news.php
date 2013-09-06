<?php
class News extends CI_Controller{ //类名的首字母要大写！！  .........
	
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');//加载对应的model
	}
	
	
	
	function index(){
		//echo APPPATH;exit; 结果输出  ：application/

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
	
	function create(){  //作用：显示表单界面，表单提交内容到该方法中，在该方法中调用其他方法进行数据库的insert操作
		//先去创建对应的视图界面 create.php
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		//以上是 加载表单辅助函数和表单验证函数 ？？？
		
		$data['title']='提交新闻标题和内容';//该变量是分配到公共模板head.php里面去的
		
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('text','title','required');
		//以上是对表单字段设置验证规则？？
		//set_rules() 方法包含三个参数，第一个是输入域的名称，第二个是错误信息的名称，
		//第三个是错误信息的规则——在这里的规则是输入内容的文本域必填。
		
		if ($this->form_validation->run() === FALSE){ //一般流程是若是在表单界面进行提交，会提交到本方法中来，
			//本方法加载表单验证函数，在设置完表单验证规则后会触发run()进行验证，run方法执行结果为false表明还没有东西提交过来并进行验证
			//所以在此显示提交表单的模板
			$this->load->view('templates/head',$data);
			$this->load->view('news/create'); //注意：.php 文件的扩展名(后缀名)没有必要专门写出，除非你使用了其他的扩展名。
			$this->load->view('templates/footer');
			
		}else{ //提交成功并且通过了验证
			$this->news_model->set_news(); //调用对应的model中的方法来进行数据库的插入操作
			alert("提交成功！");
			//$this->load->view('news/success'); //加载一个显示成功信息的视图
		}

	}
	
	function show(){
		echo ENVIRONMENT.'<br>';  //其定义和作用在入口文件index.php里面有，为development时就开启E_ALL错误报告级别
		echo EXT.'<br>';       //  可能是扩展名  比如.php
		echo FCPATH.'<br>';    //   C:\AppServ\www\ci\  根目录？？
		echo SELF.'<br>';      //   index.php
		echo BASEPATH.'<br>';  //   C:/AppServ/www/ci/system/
		echo APPPATH.'<br>';   //   application/
		echo CI_VERSION.'<br>';//   2.1.4 CI版本  
		echo FILE_READ_MODE.'<br>';  //    420
		echo FILE_WRITE_MODE.'<br>'; //    438
			
	}
	
	function display(){ //在其模板中使用CI特有的php替代语法 （流程控制/输出...）
		
		$data['lists']=array("zhangsan","lisi","wangwu");
		$data['title']="CI模板替代";
		
		$this->load->view('templates/head',$data); //貌似有多个模板输出的话，在第一个模板分配数据过去就行了
		$this->load->view('news/display');
		$this->load->view('templates/footer');
		
	}
}