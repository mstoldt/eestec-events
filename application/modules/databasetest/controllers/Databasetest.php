<?php

	class Databasetest extends CI_Controller
	{
        public function __construct() // upon construction of the object
    	{
    		parent::__construct();
    		$this->load->model('databasetest_model'); //load the model
    	}

		public function index()
		{
	        $this->load->view('index');
		}

        public function persons($page = 'persons')
        {
            $data['list'] = $this->databasetest_model->get_all_the_persons();
            $this->load->view('persons', $data);
        }

        public function lcs($page = 'lc')
        {
            $data['list'] = $this->databasetest_model->get_all_the_lcs();
            $this->load->view('lc', $data);
        }
	}

?>
