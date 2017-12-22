<?php 
class PostsModel extends CI_Model {

    public function beforeProcess()
    {
        $this->load->library('session');
        $this->load->model('customer');
        $this->load->helper('url');
        if (!$this->customer->checkLogin()) {
            $this->customer->backtoAdmin();
        }
    }

    public function getPosts()
    {
        $this->load->database();
        $this->db->select('*');
        $q = $this->db->get('posts');
        return $q->result();
    }

    public function getPost($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('posts');
        return $q->result();
    }

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

    public function deletePost($id)
    {
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->delete('posts');
    }
}