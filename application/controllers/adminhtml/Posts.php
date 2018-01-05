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
	public function __construct()
    {
        parent::__construct();
        $this->load->model('skin');
		$this->load->model('postsModel');
		$this->load->model('message');
    }
	private $data = array(
				'title'   => 'Posts Manager',
				'content' => 'admin/posts/form'
			);

	public function config()
	{
		$data = $this->input->post();
		$this->beforeProcess();
		if ($data) {
			if($this->postsModel->saveConfig($data)){
				$this->message->addSuccess('Your changes have been saved');
			}else{
				$this->message->addError('Something went wrong while save');
			}
			redirect('/admin/posts/config');
		}
		$this->data['title'] = 'Posts setting';
		$this->data['content'] = 'admin/posts/config';
		$body = array(
			'view' => 'admin/admin',
			'data' => $this->data
		);
		$this->skin->getTemplate($this->data, 'header_admin',$body, 'footer_admin');
	}

	public function add()
	{	
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
		$this->beforeProcess();
		$data = $this->input->post();
		if ($this->postsModel->save($data)) {
			redirect('admin/posts/manager');
		}else{
			redirect('admin/posts/add');
		}
	}

	public function update($id)
	{
		$this->beforeProcess();
		$data = $this->input->post();
		$this->postsModel->update($id,$data);
		$this->message->addSuccess('Post has been saved');
		redirect('admin/posts/edit/'.$id);
	}

	public function manager($p = null)
	{
		$this->data['content'] = 'admin/posts/manager';
		$this->beforeProcess();
		$this->data['title'] = 'Posts Manager';
		$this->data['params'] = array(
								'p' => $p
								);
		$body = array(
			'view' => 'admin/admin',
			'data' => $this->data
		);
		$this->skin->getTemplate($this->data, 'header_admin',$body, 'footer_admin');
	}
	
	public function edit($id)
	{
		$this->beforeProcess();
		$this->data['title'] = 'Edit post';
		$this->data['params'] = array(
								'id' => $id
								);

		$body = array(
			'view' => 'admin/admin',
			'data' => $this->data
		);
		$this->skin->getTemplate($this->data, 'header_admin',$body, 'footer_admin');
	}

	public function delete($id)
	{
		$this->beforeProcess();
		$this->postsModel->deletePost($id);
		redirect('admin/posts/manager');
	}

	private function beforeProcess()
	{
		$this->postsModel->beforeProcess();
	}
}
