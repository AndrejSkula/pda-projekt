<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Zamestnavatel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Zamestnavatel_model');
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
		$data['zamestnavatel'] = $this->Zamestnavatel_model->ZobrazZamestnavatela();
		$data['title'] = 'Zamestnávatelovia';
		//nahratie zoznamu zamestnancov
		$this->load->view('templates/header', $data);
		$this->load->view('zamestnavatel/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o zamestnavatelovi
	public function view($id)
	{
		$data = array();
		// kontrola, ci bolo zaslane id riadka
		if (!empty($id)) {
			$data['zamestnavatel'] = $this->Zamestnavatel_model->ZobrazZamestnavatela($id);
			$data['title'] = $data['zamestnavatel']['nazov_zamestnavatela'];
			// nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('zamestnavatel/view', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('/zamestnavatel');
		}
	}

	// pridanie zaznamu
	public function add()
	{
		$data = array();
		$postData = array();
		//zistenie, ci bola zaslana poziadavka na pridanie zaznamu
		if ($this->input->post('postSubmit')) {
			// definicia pravidiel validacie
			$this->form_validation->set_rules('nazov_zamestnavatela', 'Pole nazov zamestnavatela', 'required');
			$this->form_validation->set_rules('telefonne_cislo', 'Pole telefonne cislo zamestnavatela', 'required');
			$this->form_validation->set_rules('adresa', 'Pole adresa', 'required');
			$this->form_validation->set_rules('email', 'Pole email', 'required');
			// priprava dat pre vlozenie
			$postData = array(
				'nazov_zamestnavatela' => $this->input->post('nazov_zamestnavatela'),
				'telefonne_cislo' => $this->input->post('telefonne_cislo'),
				'adresa' => $this->input->post('adresa'),
				'email' => $this->input->post('email'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// vlozenie dat
				$insert = $this->Zamestnavatel_model->insert($postData);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'Zamestnávateľ bol úspešne pridaný.');
					redirect('/zamestnavatel');
				} else {
					$data['error_msg'] = 'Nepodarilo sa pridať zamestnávateľa.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Vytvor zamestnávateľa';
		$data['action'] = 'Nový zamestnávateľ';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('zamestnavatel/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat
	public function edit($id)
	{
		$data = array();
		// ziskanie dat z tabulky
		$postData = $this->Zamestnavatel_model->ZobrazZamestnavatela($id);
		// zistenie, ci bola zaslana poziadavka na aktualizaciu
		if ($this->input->post('postSubmit')) {
			// definicia pravidiel validacie
			$this->form_validation->set_rules('nazov_zamestnavatela', 'Pole nazov zamestnavatela', 'required');
			$this->form_validation->set_rules('telefonne_cislo', 'Pole telefonne cislo zamestnavatela', 'required');
			$this->form_validation->set_rules('adresa', 'Pole adresa', 'required');
			$this->form_validation->set_rules('email', 'Pole email', 'required');
			// priprava dat pre aktualizaciu
			$postData = array(
				'nazov_zamestnavatela' => $this->input->post('nazov_zamestnavatela'),
				'telefonne_cislo' => $this->input->post('telefonne_cislo'),
				'adresa' => $this->input->post('adresa'),
				'email' => $this->input->post('email'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Zamestnavatel_model->update($postData, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Zamestnávateľ bol úspešne upravený.');
					redirect('/zamestnavatel');
				} else {
					$data['error_msg'] = 'Nepodarilo sa upraviť zamestnávateľa.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Uprav zamestnávateľa';
		$data['action'] = 'Uprav zamestnávateľa';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('zamestnavatel/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat
	public function delete($id)
	{
		// overenie, ci id nie je prazdne
		if ($id) {
			// odstranenie zaznamu
			$delete = $this->Zamestnavatel_model->delete($id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Zamestnávateľ bol úspešne odstránený.');
			} else {
				$this->session->set_userdata('error_msg', 'Nepodarilo sa odstrániť zamestnávateľa.');
			}
		}
		redirect('/zamestnavatel');
	}
}
