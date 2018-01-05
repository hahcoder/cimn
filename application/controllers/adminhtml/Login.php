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

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->model('customer');
		$this->load->helper('url');
		$this->load->model('skin');
    }

	private $data = array(
			    'title' => 'Admin Panel'
			);


	public function index()
	{
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
				$body  = array(
					'view' => 'admin/login',
					'data' => $this->data
				);
				$this->skin->getTemplate($this->data,'no',$body, 'footer_admin');
			}
		}else{
			redirect('/admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged');
		redirect('admin');
	}
}
