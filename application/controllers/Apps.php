<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Apps extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		$id = $this->get('apps_id');
		if ($id == '') {
			$apps = "Access Denied";
			echo $apps;
		} else {
			$this->db->where('apps_id', $id);
			$apps = $this->db->get('apps')->result();
		}
		$this->response($apps, REST_Controller::HTTP_OK);
	}
} ?>