<?php 
class Skin extends CI_Model {

    public function getTemplate($headData, $header, $body, $footer){
    	if($header == null){
    		$header = 'header';
    	}
    	if($footer == null){
    		$footer = 'footer';
    	}
		$this->load->view('templates/head',$headData);
		$this->load->view('templates/'.$header);
		$this->load->view($body['view'],$body['data']);
		$this->load->view('templates/'.$footer);
	}

}
