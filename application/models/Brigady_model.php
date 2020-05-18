<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Brigady_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	// vrati zoznam brigad
	function ZobrazBrigady($id = "")
	{
		if (!empty($id)) {
			$this->db->select('id_brigady,nazov,datum,plat_za_hodinu,aktualne,zamestnavatel_id_zamestnavatela')
				->from('brigady')
				->join('zamestnavatel', 'brigady.zamestnavatel_id_zamestnavatela = zamestnavatel.id_zamestnavatela')
				->where('id_brigady',$id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$this->db->select('id_brigady,nazov,datum,plat_za_hodinu,aktualne,zamestnavatel_id_zamestnavatela')
				->from('brigady')
				->join('zamestnavatel', 'brigady.zamestnavatel_id_zamestnavatela = zamestnavatel.id_zamestnavatela');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array())
	{
		$insert = $this->db->insert('brigady', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			$update = $this->db->update('brigady', $data, array('id_brigady' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id)
	{
		$delete = $this->db->delete('brigady', array('id_brigady' => $id));
		return $delete ? true : false;
	}

	//  naplnenie selectu z tabulky zamestnavatelia
	public function NaplnDropdownZamestnavatel($id = "")
	{
		$this->db->order_by('nazov_zamestnavatela')
			->select('id_zamestnavatela, nazov_zamestnavatela')
			->from('zamestnavatel');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown) {
				$dropdownlist[$dropdown->id_zamestnavatela] = $dropdown->nazov_zamestnavatela;
			}
			$dropdownlist[''] = 'Vyberte zamestnávateľa ... ';
			return $dropdownlist;
		}
	}
}
?>
