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
        $msg = '';
        foreach ($data as $field => $value) {
            if (!$this->db->field_exists($field, 'posts_config')) {
                unset($data[$field]);
                if($msg == '')
                    $msg .= $field;
                else
                    $msg .= ', '.$field;
            }
        }
        if ($msg != '') {
            $this->Message->addError($msg. ' does not exits');
        }
        $this->db->update('posts_config', $data);
        return true;
    }
    public function getConfig($str)
    {
        $this->load->database();
        if ($this->db->field_exists($str, 'posts_config'))
        {
            $this->db->select($str);
            $q = $this->db->get('posts_config');
            if (count($q->result()) == 1) {
                return $q->result()[0]->$str;
            }else{
                $this->load->model('Message');
                $this->Message->addError('Config value does not found');
            }
        }
        return null;
    }

    public function pager($url){
        $this->load->library('pagination');
        $config = array(
            'base_url'         => $url,
            'total_rows'       => $this->getPosts(0,1),
            'per_page'         => $this->getConfig('limit'),
            'use_page_numbers' => true,
            'num_links'        => $this->getConfig('num_link'),
            'full_tag_open'  => $this->getConfig('full_tag_open'),
            'full_tag_close' => $this->getConfig('full_tag_close'),
            'num_tag_open' => $this->getConfig('num_tag_open'),
            'num_tag_close' => $this->getConfig('num_tag_close'),
            'cur_tag_open' => $this->getConfig('cur_tag_open'),
            'cur_tag_close' => $this->getConfig('cur_tag_close'),
            'attributes' => array('class' => $this->getConfig('class')),
            'next_link' => $this->getConfig('next_link'),
            'prev_link' => $this->getConfig('prev_link'),
            'first_link' => $this->getConfig('first_link'),
            'last_link' => $this->getConfig('last_link')
        );
        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
    }

    public function addField(){
        $this->load->dbforge();
        $fields = array(
                'address' => array('type' => 'TEXT'),
                'phone'   => array('type' => 'varchar','constraint' => '12'),
                'facebook' => array('type' => 'varchar', 'constraint' => '100')
        );
        foreach ($fields as $field => $value) {
            if ($this->db->field_exists($field, 'posts')){
                unset($fields[$field]);
            }
        }
        $this->dbforge->add_column('posts', $fields);
    }
}