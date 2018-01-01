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

    public function getPosts($p = 0)
    {
        if ($p > 0) $p--;
        $limit = $this->getConfig('limit') ? $this->getConfig('limit') : 20 ;
        $this->load->database();
        $this->db->select('*');
        $this->db->limit($limit,$p * $limit);
        $q = $this->db->get('posts');
        return $q->result();
    }

    public function getPost($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('posts');
        if (count($q->result()) == 0) {
            $this->load->model('Message');
            $this->Message->addError('Post does not exist');
        }
        return $q->result();
    }

    public function save($data)
    {   
        $this->load->model('customer');
        $this->load->model('Message');
        $this->load->helper('url');
        if (!$this->customer->checkLogin()) {
            $this->customer->backtoAdmin();
        }
        if(!(isset($data['title']) && isset($data['content'])) || $data['title'] == "" || $data['content'] == "") {
            $this->Message->addError('Please fill in required fields');
            return false;
        }
        $now = date('Y-m-d H:i:s');
        $data['date_create'] = $now;
        $data['date_edit'] = $now;
        $data['user_name'] = $this->customer->getUser();
        $this->load->database();
        $this->db->insert('posts', $data);
        return true;
    }

    public function update($id,$data)
    {   
        $this->load->model('customer');
        $this->load->helper('url');
        if (!$this->customer->checkLogin()) {
            $this->customer->backtoAdmin();
        }
        $now = date('Y-m-d H:i:s');
        $data['date_edit'] = $now;
        $data['user_name'] = $this->customer->getUser();
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->update('posts', $data);
    }

    public function deletePost($id)
    {
        if (!$this->customer->checkLogin()) {
            $this->customer->backtoAdmin();
        }
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->delete('posts');
    }

    public function getConfig($str)
    {
        $this->load->database();
        $this->db->select($str);
        $q = $this->db->get('posts_config');
        if (count($q->result()) == 1) {
            return $q->result()[0]->$str;
        }else{
            $this->load->model('Message');
            $this->Message->addError('Config value does not found');
        }
        return false;
    }
}