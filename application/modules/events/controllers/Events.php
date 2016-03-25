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
		
		// Show form in view page i.e view_page.php
		public function event_form() {
			$this->load->view("event_form");
		}

		// When user submit data on view page, Then this function store data in array.
		public function data_submitted() {
			$data = array(
			'user_email_id' => $this->input->post('u_email'),
			'user_password' => $this->input->post('u_pass')
			);

			// Show submitted data on view page again.
			$this->load->view("event_form", $data);
			}
		}
    }
?>
