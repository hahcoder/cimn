<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

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
				'title'   => 'Posts Manager',
				'content' => 'admin/posts/add'
			);

	public function add()
	{	
		$this->load->model('skin');
		
		$this->beforeProcess();
		$this->data['title'] = 'Add new post';
		$body = array(
			'view' => 'admin/admin',
			'data' => $this->data
		);
		$this->skin->getTemplate($this->data, 'header_admin',$body, 'footer_admin');
	}

	public function save()
	{
		$this->load->model('postsModel');

		$this->beforeProcess();
		$data = $this->input->post();
		$this->postsModel->saveNew($data);
		redirect('admin/posts/manager');
	}

	public function manager()
	{
		$this->data['content'] = 'admin/posts/manager';
		$this->load->model('skin');
		
		$this->beforeProcess();
		$this->data['title'] = 'Posts Manager';
		$body = array(
			'view' => 'admin/admin',
			'data' => $this->data
		);
		$this->skin->getTemplate($this->data, 'header_admin',$body, 'footer_admin');
	}

	private function beforeProcess()
	{
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->helper('url');
		if (!$this->customer->checkLogin()) {
			$this->customer->backtoAdmin();
		}
	}
}
