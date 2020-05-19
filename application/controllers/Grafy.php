<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Grafy extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();
		//ziskanie sprav zo session
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$this->load->view('templates/header');
		$this->load->view('grafy/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
