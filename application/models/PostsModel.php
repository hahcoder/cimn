<?php 
class PostsModel extends CI_Model {

    public function saveNew($data)
    {	
    	$this->load->model('customer');
		$this->load->helper('url');
		if (!$this->customer->checkLogin()) {
			$this->customer->backtoAdmin();
		}
		$now = date('Y-m-d H:i:s');
    	$data['date_create'] = $now;
    	$data['date_edit'] = $now;
    	$data['user_name'] = $this->customer->getUser();
        $this->load->database();
  		$this->db->insert('posts', $data);
    }
}