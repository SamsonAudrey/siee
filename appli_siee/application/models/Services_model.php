<?php
class Services_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_services($idservice = FALSE)
	{
        	if ($idservice === FALSE)
        	{
                $this->db->order_by('appellationservice', 'ASC');
                $query = $this->db->get('services');
                return $query->result_array();
        	}

        $query = $this->db->get_where('services', array('idservice' => $idservice));
        return $query->row_array();
		

        }

        public function get_appellation($idservice)
        {
                
                $this->db->select('appellationservice');
                $this->db->where('idservice', $idservice);
                $this->db->order_by('appellationservice', 'ASC');
                $query = $this->db->get('services');
                foreach ($query->result() as $row)
            {
             $appelle=$row->appellationservice;
            }
            return $appelle;
        }

        public function set_services()
        {
            $this->load->helper('url');


            $data = array(
                'appellationservice' => $this->input->post('appellationservice')
            );

            return $this->db->insert('services', $data);
        }

        public function delete($idservice)
        {
            $this->db->delete('services', array('idservice' => $idservice));
        }
        
}