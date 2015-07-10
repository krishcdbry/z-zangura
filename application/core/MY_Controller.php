<?php

class MY_Controller extends CI_Controller {

    //Doctrine EntityManager
    protected $em;

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $a = & load_class('Exceptions', 'core');
        //Load doctrine
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;

    }

}
