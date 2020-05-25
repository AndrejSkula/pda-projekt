<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Grafy extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Hlavny_model');
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
		$data['graf1'] = json_encode($this->Hlavny_model->GrafZamestnavatelov());
		$data['graf2'] = json_encode($this->Hlavny_model->GrafBrigad2());
		$data['graf3'] = json_encode($this->Hlavny_model->GrafBrigad());
		$data['title'] = 'Grafy';
		$this->load->view('templates/header', $data);
		$this->load->view('grafy/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
