<?php
    class Auth extends CI_Controller
    {
        public function __construct() // upon construction of the object
    	{
		    parent::__construct();
    		//$this->load->model('Event_model'); //load the model
    	}

        public function index()
        {
            $this->load->view('login');
        }
    }
?>
