<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {


	function __construct()
	{
		parent ::__construct();
		$this->load->library('template');
		$this->load->helper('url');
	}

	public function index()
	{
		//echo "Halaman Awal CI";
		$this->template->display('home');
	}
	public function komentar()
	{
		echo "Cetak dari fungsi komentar";
	}
	public function ambil_var($a,$b)
	{
		echo "var a:$a var b:$b";
	}
	public function cetak_view()
	{
		$coba['judul']="judul blog";
		$coba['isi']="isi blog";
		$coba['tgl']="15 April 2015";
		$this->load->view("cetak_blog",$coba);
	}
}
