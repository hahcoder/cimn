<?php 
class Customer extends CI_Model {

	public function checkLogin($u, $p){
		if ($u && $p) {
			$this->load->database();
			$this->db->select('user_name, password,first_name');
			$this->db->where('user_name',$u);
			$this->db->where('password',md5($p));
			$q = $this->db->get('customer');
			if ($q->num_rows() == 1) {
				// $data = array(
				//    'first_name' => TRUE
				// );
				// $this->session->set_userdata($data);
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