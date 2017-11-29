<?php 
class Customer extends CI_Model {

	public function checkLogin($u, $p){
		if ($u && $p) {
			$this->load->database();
			$this->db->select('user_name, password');
			$this->db->where('user_name',$u);
			$this->db->where('password',md5($p));
			$q = $this->db->get('customer');
			if ($q->num_rows() == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
    public function addAdmin($data)
    {
        $this->load->database();
        $data['password'] = md5($data['password']);
  		$this->db->insert('customer', $data);
    }

}