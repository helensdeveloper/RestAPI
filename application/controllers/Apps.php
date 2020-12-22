<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Apps extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Apps_model', 'appsmodel');
	}

	public function index_get($id)
	{
		$cekid	= $this->appsmodel->cekID($id);
		if ($cekid->num_rows() == 1) {
			$id = $this->get('apps_id');
			if ($id == '') {
				$apps = $this->db->get('apps')->result();
			} else {
				$this->db->where('apps_id', $id);
				$apps = $this->db->get('apps')->result();
			}
			$this->response($apps, REST_Controller::HTTP_OK);
		}else{
			$this->response($apps, REST_Controller::HTTP_FAIL);
		}
	}
} ?>