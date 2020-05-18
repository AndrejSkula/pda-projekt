<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Brigady extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Brigady_model');
		//$this->load->model('Hlavny_model');
	}

	// zobrazenie hlavnej stránky brigady
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
		$data['brigady'] = $this->Brigady_model->ZobrazBrigady();
		$data['title'] = 'Brigády';
		//nahratie zoznamu brigad
		$this->load->view('templates/header', $data);
		$this->load->view('brigady/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o brigadach
	public function view($id)
	{
		$data = array();
		// kontrola, ci bolo zaslane id riadka
		if (!empty($id)) {
			//$data['help'] = json_encode($this->Hlavny_model->record_count_per_user_array());
			$data['brigady'] = $this->Brigady_model->ZobrazBrigady($id);
			$data['title'] = $data['brigady']['nazov'];
			// nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('brigady/view', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('/brigady');

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
			$this->form_validation->set_rules('nazov', 'Pole názov', 'required');
			$this->form_validation->set_rules('datum', 'Pole dátum', 'required');
			$this->form_validation->set_rules('plat_za_hodinu', 'Pole plat', 'required');
			$this->form_validation->set_rules('aktualne', 'Pole aktuálne', 'required');
			$this->form_validation->set_rules('zamestnavatel_id_zamestnavatela', 'Pole id zamestnávateľa', 'required');
			// priprava dat pre vlozenie
			$postData = array(
				'nazov' => $this->input->post('nazov'),
				'datum' => $this->input->post('datum'),
				'plat_za_hodinu' => $this->input->post('plat_za_hodinu'),
				'aktualne' => $this->input->post('aktualne'),
				'zamestnavatel_id_zamestnavatela' => $this->input->post('zamestnavatel_id_zamestnavatela'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// vlozenie dat
				$insert = $this->Brigady_model->insert($postData);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'Brigáda bola úspešne pridaná.');
					redirect('/brigady');
				} else {
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		//$data['help'] = json_encode($this->Home_model->record_count_per_user_array());
		$data['users'] = $this->Brigady_model->NaplnDropdownZamestnavatel();
		$data['users_selected'] = '';
		$data['post'] = $postData;
		$data['title'] = 'Pridať brigádu';
		$data['action'] = 'Nová brigáda';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('brigady/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat
	public function edit($id)
	{
		$data = array();
		// ziskanie dat z tabulky
		$postData = $this->Brigady_model->ZobrazBrigady($id);
		// zistenie, ci bola zaslana poziadavka na aktualizaciu
		if ($this->input->post('postSubmit')) {
			// definicia pravidiel validacie
			$this->form_validation->set_rules('nazov', 'Pole názov', 'required');
			$this->form_validation->set_rules('datum', 'Pole dátum', 'required');
			$this->form_validation->set_rules('plat_za_hodinu', 'Pole plat', 'required');
			$this->form_validation->set_rules('aktualne', 'Pole aktuálne', 'required');
			$this->form_validation->set_rules('zamestnavatel_id_zamestnavatela', 'Pole id zamestnávateľa', 'required');
			// priprava dat pre vlozenie
			$postData = array(
				'nazov' => $this->input->post('nazov'),
				'datum' => $this->input->post('datum'),
				'plat_za_hodinu' => $this->input->post('plat_za_hodinu'),
				'aktualne' => $this->input->post('aktualne'),
				'zamestnavatel_id_zamestnavatela' => $this->input->post('zamestnavatel_id_zamestnavatela'),
			);
			// validacia zaslanych dat
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Brigady_model->update($postData, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Brigáda bola úspešne upravená.');
					redirect('/brigady');
				} else {
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		//$data['help'] = json_encode($this->Home_model->record_count_per_user_array());
		$data['users'] = $this->Brigady_model->NaplnDropdownZamestnavatel();
		$data['users_selected'] = $postData['zamestnavatel_id_zamestnavatela'];
		$data['post'] = $postData;
		$data['title'] = 'Úprava brigády';
		$data['action'] = 'Uprav brigádu';
		// zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('brigady/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat
	public function delete($id)
	{
		// overenie, ci id nie je prazdne
		if ($id) {
			// odstranenie zaznamu
			$delete = $this->Brigady_model->delete($id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Brigáda bola úspešne odstránená.');
			} else {
				$this->session->set_userdata('error_msg', 'Brigádu sa nepodarilo odstrániť.');
			}
		}
		redirect('/brigady');
	}
}
