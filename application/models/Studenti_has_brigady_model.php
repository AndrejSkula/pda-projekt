<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Studenti_has_brigady_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	// vrati zoznam brigad Študentov
	function ZobrazStudentiBrigady($id= "") {
		if(!empty($id)){
			$this->db->select('id_studenti_has_brigady, odkedy, dokedy, pocet_hodin, plat_za_hod, studenti_id_studenta, CONCAT(meno," ", priezvisko) as cele_meno, brigady_id_brigady, brigady.nazov as nazov_b')
				->from('studenti_has_brigady')
				->join('studenti','studenti_id_studenta = studenti.id_studenta')
				->join('brigady',' brigady.id_brigady = studenti_has_brigady.brigady_id_brigady')
				->where('id_studenti_has_brigady',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('id_studenti_has_brigady, odkedy, dokedy, pocet_hodin, plat_za_hod, studenti_id_studenta, CONCAT(meno," ", priezvisko) as cele_meno, brigady_id_brigady, brigady.nazov as nazov_b')
				->from('studenti_has_brigady')
				->join('studenti','studenti_id_studenta = studenti.id_studenta')
				->join('brigady',' brigady.id_brigady = studenti_has_brigady.brigady_id_brigady');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('studenti_has_brigady', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('studenti_has_brigady', $data, array('id_studenti_has_brigady'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('studenti_has_brigady',array('id_studenti_has_brigady'=>$id));
		return $delete?true:false;
	}

	//  naplnenie selectu z tabulky študenti
	public function NaplnDropdownStudenti($id = ""){
		$this->db->order_by('priezvisko')
			->select('id_studenta, CONCAT(priezvisko," ",meno) AS cele_meno')
			->from('studenti');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->id_studenta] = $dropdown->cele_meno;
			}
			$dropdownlist[''] = 'Vyberte študenta ... ';
			return $dropdownlist;
		}
	}
	//  naplnenie selectu z tabulky brigady
	public function NaplnDropdownBrigady($id = ""){
		$this->db->order_by('nazov')
			->select('id_brigady, nazov')
			->from('brigady');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->id_brigady] = $dropdown->nazov;
			}
			$dropdownlist[''] = 'Vyberte brigádu ... ';
			return $dropdownlist;
		}
	}
}
?>
