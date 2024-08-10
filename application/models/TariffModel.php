<?php
class TariffModel extends CI_Model {

    public function get_purposes() {
        $this->db->distinct();
        $this->db->select('purpose_name');
        $this->db->from('purposes');
        return $this->db->get()->result_array();
    }

    public function get_tariffs() {
        $this->db->distinct();
        $this->db->select('tariff_name');
        $this->db->from('tariffs');
        return $this->db->get()->result_array();
    }

    public function get_tariff_ranges($tariff_name, $purpose, $billing_cycle, $phase) {
        $this->db->from('tariffs');
        $this->db->where('tariff_name', $tariff_name);
        $this->db->where('purpose', $purpose);
        $this->db->where('billing_cycle', $billing_cycle);
        $this->db->where('phase', $phase);
        return $this->db->get()->result_array();
    }
}
