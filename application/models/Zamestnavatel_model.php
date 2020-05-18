<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Zamestnavatel_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazZamestnavatela($id = "")
	{
		if (!empty($id)) {
			$query = $this->db->get_where('zamestnavatel', array('id_zamestnavatela' => $id));
			return $query->row_array();
		} else {
			$query = $this->db->get('zamestnavatel');
			return $query->result_array();
		}
	}
// vlozenie zaznamu
	public function insert($data = array())
	{
		$insert = $this->db->insert('zamestnavatel', $data);
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
			$update = $this->db->update('zamestnavatel', $data,
				array('id_zamestnavatela' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id)
	{
		$delete = $this->db->delete('zamestnavatel', array('id_zamestnavatela' => $id));
		return $delete ? true : false;
	}
}
?>
