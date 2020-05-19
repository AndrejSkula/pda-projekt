<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Studenti_has_brigady extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Studenti_has_brigady_model');
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
		$data['studenti_has_brigady'] = $this->Studenti_has_brigady_model->ZobrazStudentiBrigady();
		$data['title'] = 'Brigády študentov';
		$this->load->view('templates/header', $data);
		$this->load->view('studenti_has_brigady/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o brigádach študentov
	public function view($id)
	{
		$data = array();
		// kontrola, ci bolo zaslane id riadka
		if (!empty($id)) {
			$data['studenti_has_brigady'] = $this->Studenti_has_brigady_model->ZobrazStudentiBrigady($id);
			$data['title'] = $data['studenti_has_brigady']['cele_meno'];
			// nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('studenti_has_brigady/view', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('/studenti_has_brigady');

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
			$this->form_validation->set_rules('odkedy', 'Pole odkedy', 'required');
			$this->form_validation->set_rules('dokedy', 'Pole dokedy', 'required');
			$this->form_validation->set_rules('pocet_hodin', 'Pole počet hodín', 'required');
			$this->form_validation->set_rules('plat_za_hod', 'Pole plat za hodinu', 'required');
			$this->form_validation->set_rules('studenti_id_studenta', 'Pole id študenta', 'required');
			$this->form_validation->set_rules('brigady_id_brigady', 'Pole id brigády', 'required');
			// priprava dat pre vlozenie
			$postData = array(
				'odkedy' => $this->input->post('odkedy'),
				'dokedy' => $this->input->post('dokedy'),
				'pocet_hodin' => $this->input->post('pocet_hodin'),
				'plat_za_hod' => $this->input->post('plat_za_hod'),
				'studenti_id_studenta' => $this->input->post('studenti_id_studenta'),
				'brigady_id_brigady' => $this->input->post('brigady_id_brigady'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// vlozenie dat
				$insert = $this->Studenti_has_brigady_model->insert($postData);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'Brigáda študenta bola úspešne pridaná.');
					redirect('/studenti_has_brigady');
				} else {
					$data['error_msg'] = 'Brigádu študenta sa nepodarilo pridať.';
				}
			}
		}
		$data['brigady'] = $this->Studenti_has_brigady_model->NaplnDropdownBrigady();
		$data['brigady_vybrane'] = '';
		$data['users'] = $this->Studenti_has_brigady_model->NaplnDropdownStudenti();
		$data['users_selected'] = '';
		$data['post'] = $postData;
		$data['title'] = 'Vytvorenie brigády pre študenta';
		$data['action'] = 'add';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('studenti_has_brigady/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat
	public function edit($id)
	{
		$data = array();
		// ziskanie dat z tabulky
		$postData = $this->Studenti_has_brigady_model->ZobrazStudentiBrigady($id);
		// zistenie, ci bola zaslana poziadavka na aktualizaciu
		if ($this->input->post('postSubmit')) {
			// definicia pravidiel validacie
			$this->form_validation->set_rules('odkedy', 'Pole odkedy', 'required');
			$this->form_validation->set_rules('dokedy', 'Pole dokedy', 'required');
			$this->form_validation->set_rules('pocet_hodin', 'Pole počet hodín', 'required');
			$this->form_validation->set_rules('plat_za_hod', 'Pole plat za hodinu', 'required');
			$this->form_validation->set_rules('studenti_id_studenta', 'Pole id študenta', 'required');
			$this->form_validation->set_rules('brigady_id_brigady', 'Pole id brigády', 'required');
			// priprava dat pre vloženie
			$postData = array(
				'odkedy' => $this->input->post('odkedy'),
				'dokedy' => $this->input->post('dokedy'),
				'pocet_hodin' => $this->input->post('pocet_hodin'),
				'plat_za_hod' => $this->input->post('plat_za_hod'),
				'studenti_id_studenta' => $this->input->post('studenti_id_studenta'),
				'brigady_id_brigady' => $this->input->post('brigady_id_brigady'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Studenti_has_brigady_model->update($postData, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Brigáda študenta bola úspešne upravená.');
					redirect('/studenti_has_brigady');
				} else {
					$data['error_msg'] = 'Nepodarilo sa upraviť brigádu študenta.';
				}
			}
		}
		$data['brigady'] = $this->Studenti_has_brigady_model->NaplnDropdownBrigady();
		$data['brigady_vybrane'] = $postData['brigady_id_brigady'];
		$data['users'] = $this->Studenti_has_brigady_model->NaplnDropdownStudenti();
		$data['users_selected'] = $postData['studenti_id_studenta'];
		$data['post'] = $postData;
		$data['title'] = 'Úprava brigády pre študeta';
		$data['action'] = 'edit';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('studenti_has_brigady/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat
	public function delete($id)
	{
		// overenie, ci id nie je prazdne
		if ($id) {
			// odstranenie zaznamu
			$delete = $this->Studenti_has_brigady_model->delete($id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Brigáda študenta bola úspešne odstránená.');
			} else {
				$this->session->set_userdata('error_msg', 'Nepodarilo sa odstrániť brigádu študenta.');
			}
		}
		redirect('/studenti_has_brigady');
	}
}

