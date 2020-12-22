<?php 
/**
  * 
  */
 class Apps_model extends CI_Model
 {
    public function cekID($id)
    {
        $result = $this->db->query("SELECT * FROM apps WHERE apps_id='$id'");
        return $result;
    }
 } ?>