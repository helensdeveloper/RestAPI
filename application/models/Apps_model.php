<?php 
/**
  * 
  */
 class Apps_model extends CI_Model
 {
    public function allapps()
    {
        return $this->db->get('apps');
    }
 } ?>