<?php
    class Login extends CI_Controller
    {
        public function __construct() // upon construction of the object
    	{
		    parent::__construct();
            $this->load->helper('form');
    	}

        public function index()
        {
            $this->load->view('login');
        }

		// When user submit data on view page, Then this function stores data in array.
		public function data_submitted($page = 'data_submitted')
        {
			$data = array(
    			'user_email_id' => $this->input->post('u_email'),
    			'user_password' => $this->input->post('u_pass')
			);

            // Check if login was correct
            $this->db->where('mail', $data['user_email_id']);
            $query = $this->db->get('login', 1);
            if($query->num_rows() > 0)
            {
                $user = $query->row();
                if($data['user_password'] == $user->password)
                {
                    // Log the user in
                    $this->log_me_in('admin');
                    redirect('events');
                }
                else
                {
                    goto noSuccess;
                }
            }
            else
            {
                $this->db->where('email', $data['user_email_id']);
                $query = $this->db->get('lcs', 1);
                if($query->num_rows() > 0)
                {
                    $user = $query->row();
                    if($data['user_password'] == $user->password)
                    {
                        // Log the user in
                        $this->log_me_in('LC');
                        redirect('events/persons');
                    }
                    else
                    {
                        goto noSuccess;
                    }
                }
                else
                {
                    noSuccess:
                    redirect('login');
                }
            }

		}

        private function log_me_in($role)
        {
            $_SESSION['logged_in'] = true;
            $_SESSION['role'] = $role;
        }
    }
?>
