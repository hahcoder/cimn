<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('customer');
		$this->load->helper('url');
		if(!$this->session->userdata('logged')){
			$data = $this->input->get();
			if($data){
				$u = $data['u'];
				$p = $data['p'];
				if ($u && $p) {
					if ($this->customer->Login($u, $p)) {
						
						redirect('/admin');
					}
				}
			}else{
				redirect('/admin');
			}
		}else{
			redirect('/admin');
		}
	}

	public function logout()
	{
		$this->load->library('session');
		$this->load->model('customer');
		$this->session->unset_userdata('logged');
		redirect('/admin');
	}
}
