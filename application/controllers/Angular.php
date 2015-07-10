<?php
class Angular extends CI_Controller {
 
  function __construct() {
    parent::__construct();
  }
 
  function index() {
    $data['pagetitle'] = "Angular";
    $data['viewname'] = 'index';
    $this->load->view('test/test', $data);
  }
    
  function json_get_user() {
       $arr = array('krish', 'mohan');
      echo json_encode($arr);
 }
 
}
?> 