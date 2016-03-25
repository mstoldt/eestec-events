<?php
    class Auth extends CI_Controller
    {
        public function __construct() // upon construction of the object
    	{
		    parent::__construct();
            $this->load->helper('form');
    		//$this->load->model('Event_model'); //load the model
    	}

        public function index()
        {
            $this->load->view('login');
        }

		// When user submit data on view page, Then this function store data in array.
		public function data_submitted($page = 'data_submitted')
        {
            die('hi');
			$data = array(
    			'user_email_id' => $this->input->post('u_email'),
    			'user_password' => $this->input->post('u_pass')
			);

			// Show submitted data on view page again.
			print_r($data);
		}
    }
?>
