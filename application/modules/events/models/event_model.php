<?php
    class event_model extends CI_Model
    {
        public function all_person_events_attended()
        {
            $query = $this->db->query("SELECT p.name AS person_name, e.name AS event_name, p.eestec_profile_link, lcs.city FROM persons p LEFT OUTER JOIN lcs ON lcs.id = p.lc LEFT OUTER JOIN event_participants ep ON p.id = ep.person_id LEFT OUTER JOIN Events e ON e.id = ep.event_id ORDER BY p.eestec_profile_link ASC");

            return $query; //return the data
        }

        public function all_events_participants()
        {
            $query = $this->db->query("SELECT e.id, e.name AS event_name, p.name AS person_name FROM events e INNER JOIN event_participants ep ON e.id = ep.event_id INNER JOIN persons p ON ep.person_id = p.id ORDER BY e.name ASC, p.name ASC");

            return $query; //return the data
        }

        public function lc_events_up_for_termination()
        {
            $query = $this->db->query("SELECT lcs.id, lcs.city, e.name AS event_name, e.end_date AS event_enddate, e.start_date as event_startdate FROM LCs INNER JOIN events e ON lcs.id = e.lc ORDER BY lcs.city, e.start_date DESC");

            return $query; //return the data
        }

    }
?>
