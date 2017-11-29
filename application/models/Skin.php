<?php 
class Skin extends CI_Model {

    public function getTemplate($headData, $header, $body, $footer){
		$this->load->view('templates/head',$headData);
		$this->load->view('templates/header');
		$this->load->view($body);
		$this->load->view('templates/footer');
	}

}
