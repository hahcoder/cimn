<?php 
class Skin extends CI_Model {

    public function getTemplate($headData, $header, $body, $footer){
    	if($header == null){
    		$header = 'templates/header';
    	}
    	if($footer == null){
    		$footer = 'templates/footer';
    	}
		$this->load->view('templates/head',$headData);
		$this->load->view($header);
		$this->load->view($body);
		$this->load->view($footer);
	}

}
