<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    //get general settings
    public function get_general_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('general_settings');
        return $query->row();
    }

    //get system settings
    public function get_system_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('general_settings');
        return $query->row();
    }

    //get payment settings
    public function get_payment_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('payment_settings');
        return $query->row();
    }

  

    //get settings
    public function get_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('settings');
        return $query->row();
    }
}