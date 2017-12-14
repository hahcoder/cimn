<?php 
class Customer extends CI_Model {

	public function Login($u, $p){
		$this->load->library('session');
		if ($u && $p) {
			$this->load->database();
			$this->db->select('user_name, password');
			$this->db->where('user_name',$u);
			$this->db->where('password',md5($p));
			$q = $this->db->get('customer');
			if ($q->num_rows() == 1) {
				$data = array();
				foreach ($q->result() as $row) {
					$data['user'] = $row->user_name;
				}
				$data['logged'] = TRUE;
				$this->session->set_userdata($data);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function checkLogin(){
		$this->load->library('session');
		if ($this->session->userdata('logged')) {
			return true;
		}else{
			return false;
		}
	}

	public function backtoAdmin()
	{
		if (!$this->checkLogin()) {
			redirect('/admin');
		}
	}

    public function getUser()
    {
		if($this->session->userdata('user')){
			return $this->session->userdata('user');
		}else{
			return 'Unknow';
		}
    }

    public function addAdmin($data)
    {
        $this->load->database();
        $data['password'] = md5($data['password']);
  		$this->db->insert('customer', $data);
    }

}