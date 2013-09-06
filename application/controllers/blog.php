<?php
class Blog extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){    //访问路径： http://ci.me/index.php/Blog
		echo 'Hello World';
	}
	
}