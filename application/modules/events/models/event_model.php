<?php
    class event_model extends CI_Model
    {
        public function all_person_events_attended()
        {
            $query = $this->db->query("SELECT p.id, p.name AS person_name, p.eestec_email, lcs.city FROM persons p LEFT OUTER JOIN lcs ON lcs.id = p.lc ORDER BY p.name ASC");

            return $query; //return the data
        }

        public function all_events_participants()
        {
            $query = $this->db->query("SELECT e.id, e.name AS event_name, lcs.city AS lc_city, e.start_date, e.end_date, e.announce_date, e.participants_announce_date FROM events e INNER JOIN lcs ON e.lc = lcs.id");

            return $query; //return the data
        }

        public function lc_events_up_for_termination()
        {
            //$query = $this->db->query("SELECT lcs.id, lcs.city, e.name AS event_name, e.end_date AS event_enddate, e.start_date as event_startdate FROM LCs INNER JOIN events e ON lcs.id = e.lc ORDER BY lcs.city, e.start_date DESC");
            $query = $this->db->query("SELECT * FROM LCs");

            return $query; //return the data
        }
    }
?>
