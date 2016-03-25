<?php
    class Databasetest_Model extends CI_Model
    {
        public function get_all_the_persons()
        {
            $this->db->from('persons'); //get ALL data from test_table
            $this->db->join('LC', 'LC.id = persons.lc');
            $query = $this->db->get();
            return $query; //return the data
        }

        public function get_all_the_lcs()
        {
            $this->db->from('LC'); //get ALL data from test_table
            $this->db->join('persons', 'persons.id = LC.contact_person');
            $query = $this->db->get();
            return $query; //return the data
        }
    }
?>
