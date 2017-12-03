<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private $data = array(
			    'title' => 'Admin Panel'
			);


	public function index()
	{
		$this->load->library('session');
		$this->load->model('skin');

		if($this->session->userdata('logged')){
			$body = 'admin/admin';
		}else{
			$body = 'templates/customer/login';
		}

		$this->skin->getTemplate($this->data, 'templates/header_admin',$body, 'templates/footer');
	}

	public function login(){
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->helper('url');
		if(!$this->session->userdata('logged')){
			$data = $this->input->get();
			if($data){
				$u = $data['u'];
				$p = $data['p'];
				if ($u && $p) {
					if ($this->customer->checkLogin($u, $p)) {
						$data = array(
						   'logged' => TRUE
						);
						$this->session->set_userdata($data);
						redirect(base_url().'admin');
					}
				}
			}else{
				redirect(base_url().'admin');
			}
		}else{
			redirect(base_url().'admin');
		}
	}

	public function posts(){
		$this->load->helper('url');
		$data = $this->input->get();
		echo (current_url());
		// switch ($action) {
		// 	case 'add':
		// 		# code...
		// 		break;

		// 	case 'manager':
		// 		# code...
		// 		break;
			
		// 	default:
		// 		# code...
		// 		break;
		// }
	}
}
