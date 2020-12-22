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

	public function index_get()
	{
		$apps = [
			['id' => 49571244, 'name' => 'CINTA', 'version' => '1.0', 'date' => '2020-12-22 17:27:29'],
		];
		$id = $this->get('id');
		if ($id === NULL)
		{
			$this->response([
				'status' => FALSE,
				'message' => 'Access Denied'
			], REST_Controller::HTTP_NOT_FOUND);
		}
		else {
			$id = (int) $id;
			if ($id <= 0)
			{
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
			}
			$app = NULL;
			if (!empty($apps))
			{
				foreach ($apps as $key => $value)
				{
					if (isset($value['id']) && $value['id'] === $id)
					{
						$app = $value;
					}
				}
			}

			if (!empty($apps))
			{
				$this->set_response($app, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}
		}
	}
} ?>