<?php
    class Events extends CI_Controller
    {
        public function __construct() // upon construction of the object
    	{
		    parent::__construct();
    		$this->load->model('Event_model'); //load the model

            if (isset($_SESSION['logged_in']))
    		{
                if(!$_SESSION['logged_in'])
                {
                    redirect('login');
                }
    		}
            else
            {
                redirect('login');
            }
    	}


        public function index()
        {
            if($_SESSION['role'] == 'admin')
            {
                redirect('events/event');
            }
            else
            {
                redirect('events/persons');
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

		// Show form in view page i.e view_page.php
		public function event_form($page = 'event_form') {
			$data['page_title'] = "event form";

            $this->load->view('header', $data);
			$this->load->view("event_form");
            $this->load->view('footer');
		}

		// When user submit data on view page, Then this function store data in array.
		public function data_submitted($page = 'data_submitted') {
			$data['page_title'] = "event form";

            $this->load->view('header', $data);

			$data = array(
			'event_name_id' => $this->input->post('ev_name'),
			'event_lc_id' => $this->input->post('ev_lc'),
			'event_start_date_id' => $this->input->post('ev_start_date'),
			'event_end_date_id' => $this->input->post('ev_end_date'),
			'event_description_id' => $this->input->post('ev_description'),
			'event_announce_date_id' => $this->input->post('ev_announce_date'),
			'event_deadline_date_id' => $this->input->post('ev_deadline_date'),
			'event_participants_announce_date_id' => $this->input->post('ev_participants_announce_date')
			);

			// Show submitted data on view page again.
			$this->load->view("event_form", $data);

            $this->load->view('footer');
		}

		// Show form in view page i.e view_page.php
		public function persons_form($page = 'persons_form') {
			$data['page_title'] = "persons form";

            $this->load->view('header', $data);
			$this->load->view("persons_form");
            $this->load->view('footer');
		}

		// When user submit data on view page, Then this function store data in array.
		public function persons_data_submitted($page = 'data_submitted') {
			$data['page_title'] = "persons form";

            $this->load->view('header', $data);

			$data = array(
			'person_name_id' => $this->input->post('per_name'),
			'profile_link_id' => $this->input->post('prof_link'),
			'lc_id' => $this->input->post('per_lc')
			);

			// Show submitted data on view page again.
			$this->load->view("persons_form", $data);

            $this->load->view('footer');
		}
		
		// When user submit data on view page, Then this function store data in array.
		public function persons_edit($page = 'persons_edit') {
			$data['page_title'] = "persons edit";

            $this->load->view('header', $data);

			$data = array(
			'person_name_id' => $this->input->post('per_name'),
			'profile_link_id' => $this->input->post('prof_link'),
			'lc_id' => $this->input->post('per_lc')
			);

			// Show submitted data on view page again.
			$this->load->view("persons_edit", $data);

            $this->load->view('footer');
		}
		
		
		// Show form in view page i.e view_page.php
		public function lcs_form() {
            $data['page_title'] = "LCs form";

            $this->load->view('header', $data);
            $this->load->view('lcs_form');
            $this->load->view('footer');
		}

		// When user submit data on view page, Then this function store data in array.
		public function lc_data_submitted() {
			
            $data['page_title'] = "LCs form";

            $this->load->view('header', $data);
			
			$data = array(
			'city' => $this->input->post('u_city')
			);
			// Show submitted data on view page again.
			$this->load->view("lcs_form", $data);
			
            $this->load->view('footer');
		}

        public function logout($page = 'logout')
        {
            session_start();
        	session_destroy();
            redirect('login');
        }
    }
?>
