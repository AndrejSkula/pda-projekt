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
		$this->db->select('MONTHNAME(datum) as datum, COUNT(datum) AS counts');
		$this->db->from('brigady');
		$this->db->group_by('MONTH(datum)');
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
}
