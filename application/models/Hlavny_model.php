<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Hlavny_model extends CI_Model
{
	public function __construct()
	{$this->load->database();}

	// pocet vsetky zaznamov pre študentov
	public function record_count_studenti()
	{
		return $this->db->count_all("studenti");
	}

	// pocet vsetky zaznamov pre brigády
	public function record_count_brigady()
	{
		return $this->db->count_all("brigady");
	}

	// pocet vsetky zaznamov pre zamestnávateľov
	public function record_count_zamestnavatelia()
	{
		return $this->db->count_all("zamestnavatel");
	}
// Graf - Počet brigád podľa zamestnávateľov
	public function GrafZamestnavatelov()
	{
		$this->db->select('nazov_zamestnavatela, plat_za_hodinu');
		$this->db->from('zamestnavatel');
		$this->db->join('brigady', 'id_zamestnavatela = brigady.zamestnavatel_id_zamestnavatela');
		$query = $this->db->get();
		return $query->result_array();
	}
	// Graf - Počet brigád
	public function GrafBrigad()
	{
		$this->db->select('CONCAT(meno, \' \',priezvisko) as cele_meno, plat_za_hod');
		$this->db->from('studenti');
		$this->db->join('studenti_has_brigady', 'id_studenta=studenti_has_brigady.studenti_id_studenta');
		$query = $this->db->get();
		return $query->result_array();
	}
	// Graf2 - Počet brigád
	public function GrafBrigad2()
	{
		$this->db->select('MONTHNAME(datum) label, COUNT(datum) value');
		$this->db->from('brigady');
		$this->db->group_by('MONTH(datum)');
		$query = $this->db->get();
		return $query->result_array();
	}
	// Graf - Počet hodín
	public function GrafHodin()
	{
		$this->db->select('CONCAT(meno, \' \',priezvisko) as cele_meno, pocet_hodin, plat_za_hod');
		$this->db->from('studenti');
		$this->db->join('studenti_has_brigady', 'id_studenta=studenti_has_brigady.studenti_id_studenta');
		$query = $this->db->get();
		return $query->result_array();
	}
}
