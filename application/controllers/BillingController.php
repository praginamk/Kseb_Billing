<?php
class BillingController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('TariffModel');
    }

    public function index() {
        $data['tariffs'] = $this->TariffModel->get_tariffs();
        $data['purposes'] = $this->TariffModel->get_purposes(); 
        $this->load->view('billing_form', $data);
    }

    public function calculate_bill() {
        $consumed_units = $this->input->post('consumed_units');
        $tariff_name = $this->input->post('tariff');
        $purpose = $this->input->post('purpose');
        $billing_cycle = $this->input->post('billing_cycle');
        $phase = $this->input->post('phase');
    
        $this->load->model('TariffModel');
        $tariff_ranges = $this->TariffModel->get_tariff_ranges($tariff_name, $purpose, $billing_cycle, $phase);
    
        if (empty($tariff_ranges)) {
            $data['error'] = 'No tariff data found';
            $this->load->view('billing_result', $data);
            return;
        }
    
        $energy_charge = $this->calculate_energy_charge($consumed_units, $tariff_ranges);
        $fixed_charge = 35;
    
        $total_bill = $energy_charge + $fixed_charge;
        echo json_encode(['energy_charge' => $energy_charge, 'total_bill' => $total_bill]);
    }
    
    
    private function calculate_energy_charge($consumed_units, $tariff_ranges) {
        $energy_charge = 0;
    
        if ($consumed_units <= 250) {
            foreach ($tariff_ranges as $range) {
                if ($consumed_units > $range['range_end']) {
                    $units_in_slab = $range['range_end'] - $range['range_start'] + 1;

                    $energy_charge += $units_in_slab * $range['rate'];
                } else {
                    $units_in_slab = $consumed_units - $range['range_start'] + 1;
                    
                    $energy_charge += $units_in_slab * $range['rate'];
                    break;
                }
            }
        } else {
            foreach ($tariff_ranges as $range) {
                if ($consumed_units > $range['range_end']) {
                    continue;
                }
                if ($consumed_units <= $range['range_end']) {
                    $energy_charge = $consumed_units * $range['rate'];
                    break;
                }
            }
        }
    
        return $energy_charge;
    }
    
    
}