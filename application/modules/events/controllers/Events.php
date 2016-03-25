<?php
    class Events extends CI_Controller
    {
        public function __construct() // upon construction of the object
    	{
		    parent::__construct();
    		$this->load->model('Event_model'); //load the model

            if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login');
    		}
    	}

        public function persons($page = 'persons')
        {
            $data['list'] = $this->Event_model->all_person_events_attended();
            $data['page_title'] = "Persons";

            $this->load->view('header', $data);
            $this->load->view('persons', $data);
            $this->load->view('footer');
        }

        public function event($page = 'event')
        {
            $data['list'] = $this->Event_model->all_events_participants();
            $data['page_title'] = "Events";

            $this->load->view('header', $data);
            $this->load->view('events', $data);
            $this->load->view('footer');
        }

        public function lcs($page = 'lcs')
        {
            $data['list'] = $this->Event_model->lc_events_up_for_termination();
            $data['page_title'] = "LCs";

            $this->load->view('header', $data);
            $this->load->view('lcs', $data);
            $this->load->view('footer');
        }
    }
?>
