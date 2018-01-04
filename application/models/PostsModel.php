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

    public function getPosts($p = 0, $t = 0)
    {
        if ($p > 0) $p--;
        $limit = $this->getConfig('limit') ? $this->getConfig('limit') : 20 ;
        $this->load->database();
        $this->db->select('*');
        if($t == 0){
            $this->db->limit($limit,$p * $limit);
            $q = $this->db->get('posts');
            return $q->result();
        }else{
            $q = $this->db->get('posts');
            return $q->num_rows();
        }
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
        $this->beforeProcess();
        $this->load->model('customer');
        $this->load->model('Message');
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
        $this->beforeProcess();
        $this->load->model('customer');
        $now = date('Y-m-d H:i:s');
        $data['date_edit'] = $now;
        $data['user_name'] = $this->customer->getUser();
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->update('posts', $data);
    }

    public function deletePost($id)
    {
        $this->beforeProcess();
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->delete('posts');
    }

    public function saveConfig($data)
    {
        $this->beforeProcess();
        $this->load->model('Message');
        
        $this->load->database();
        $this->db->update('posts_config', $data);
        return true;
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

    public function pager($url){
        $this->load->library('pagination');
        $config = array(
            'base_url'         => $url,
            'total_rows'       => $this->getPosts(0,1),
            'per_page'         => $this->getConfig('limit'),
            'use_page_numbers' => true,
            'num_links'        => $this->getConfig('num_link'),
            'full_tag_open'  => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class' => 'page-link'),
            'next_link' => '<span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span>',
            'prev_link' => '<span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span>',
            'first_link' => 'First',
            'last_link' => 'Last'
        );
        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
    }
}