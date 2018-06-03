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

        public function can_be_delete($idservice)
        {
            if($idservice === FALSE)
            {
                show_404();
            }
            $this->load->helper('url');

            $this->db->from('interventions');
            $this->db->join('services', 'services.idservice = interventions.idservice');
            $this->db->where('interventions.idservice', $idservice);
            $query = $this->db->count_all_results();
            if($query >0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        
}