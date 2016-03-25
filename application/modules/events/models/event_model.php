<?php
    class event_model extends CI_Model
    {
        public function all_person_events_attended()
        {
            $query = $this->db->query("SELECT p.name AS person_name, e.name AS event_name, p.eestec_profile_link FROM persons p INNER JOIN event_participants ep ON p.id = ep.person_id INNER JOIN Events e ON e.id = ep.event_id ORDER BY p.eestec_profile_link ASC");

            return $query; //return the data
        }

        public function all_events_participants()
        {
            $query = $this->db->query("SELECT e.id, e.name AS event_name, p.name AS person_name FROM events e INNER JOIN event_participants ep ON e.id = ep.event_id INNER JOIN persons p ON ep.person_id = p.id ");

            return $query; //return the data
        }

        public function lc_events_up_for_termination()
        {
            $query = $this->db->query("SELECT lcs.id, lcs.city, e.name AS event_name FROM LCs INNER JOIN events e ON lcs.id = e.lc");

            return $query; //return the data
        }

    }
?>
