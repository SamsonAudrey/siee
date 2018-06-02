<?php 
/**
 * 
 */
 class Objets_model extends CI_Model
 {
 	
 	public function __construct()
        {
                $this->load->database();
        }

        public function get_objets($idobjet = False)
	   {
        if ($idobjet === FALSE)
            {
                $this->db->order_by('appellationobjet', 'ASC');
                $query = $this->db->get('objets');
                return $query->result_array();
            }

        $query = $this->db->get_where('objets',array('idobjet' => $idobjet));
        return $query->row_array();
		

        }

        public function get_appellation($idobjet)
        {
                
                $this->db->select('appellationobjet');
                $this->db->where('idobjet', $idobjet);
                $this->db->order_by('appellationobjet', 'ASC');
                $query = $this->db->get('objets');
                foreach ($query->result() as $row)
            {
             $appelle=$row->appellationobjet;
            }
            return $appelle;
        }

        public function set_objets()
        {
            $this->load->helper('url');


            $data = array(
                'appellationobjet' => $this->input->post('appellationobjet'),
                'idtype' => $this->input->post('idtype')
            );

            return $this->db->insert('objets', $data);
        }

        public function delete($idobjet)
        {
            $this->db->delete('objets', array('idobjet' => $idobjet));
        }
 } ?>