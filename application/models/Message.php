<?php 
class Message extends CI_Model {

    public function addSuccess($str)
    {
        $this->session->set_flashdata('success_msg', $str);
    }

    public function addError($str)
    {
        $this->session->set_flashdata('error_msg', $str);
    }

    public function getSuccess()
    {
        if($this->session->flashdata('success_msg')){
            return 
            '<div class="alert alert-success" role="alert">
              '.$this->session->flashdata('success_msg').'
            </div>';
        }
    }    

    public function getError()
    {
        if($this->session->flashdata('error_msg')){
            return 
            '<div class="alert alert-danger" role="alert">
              '.$this->session->flashdata('error_msg').'
            </div>';
        }
    }

    public function getMsg(){
        echo $this->getSuccess();
        echo $this->getError();
    }
}
