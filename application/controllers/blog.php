<?php
class Blog extends CI_Controller{  //类名必须以大写字母开头 ，始终确保你的控制器扩展自父控制器类，以便它能够继承其所有的方法
	
	function __construct(){   
		parent::__construct(); //构造方法里面要先去调用一次父类的构造方法
	}
	
	function index(){    //访问路径： http://ci.me/index.php/Blog
		echo 'Hello World';
	}
	function show(){   //访问路径 http://ci.me/index.php/Blog/show
		echo "this is the show() of the Blog control";
	}
	
}