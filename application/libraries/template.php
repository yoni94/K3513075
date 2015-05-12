<?php
class Template
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function display($template,$data=null)
	{
		$dat['_content']=$this->_ci->load->view($template,$dat, true);
		$dat['_header']=$this->_ci->load->view('header',$dat, true);
		$dat['_menu']=$this->_ci->load->view('menu',$dat, true);
		$this->_ci->load->view('/template.php',$dat);
	}
}
