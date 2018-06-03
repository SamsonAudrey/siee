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

        $this->db->select('idobjet,appellationobjet,nomtype');
        $this->db->from('objets');
        $this->db->join('types', 'types.idtype = objets.idtype');
        $this->db->where('idobjet',$idobjet);
        $query = $this->db->get();
        return $query->row_array();
		

        }

        public function get_objets_affichage()
        {
            $this->db->select('idobjet,appellationobjet,nomtype');
            $this->db->from('objets');
            $this->db->join('types', 'types.idtype = objets.idtype');
            $this->db->order_by('appellationobjet', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_syndics_affichage(){
            $this->db->select('idobjet,appellationobjet,nomtype');
            $this->db->from('objets');
            $this->db->join('types', 'types.idtype = objets.idtype');
            $this->db->where('nomtype','syndic');
            $this->db->order_by('appellationobjet', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_particuliers_affichage(){
            $this->db->select('idobjet,appellationobjet,nomtype');
            $this->db->from('objets');
            $this->db->join('types', 'types.idtype = objets.idtype');
            $this->db->where('nomtype','particulier');
            $this->db->order_by('appellationobjet', 'ASC');
            $query = $this->db->get();
            return $query->result_array();
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

        public function update_objets($idobjet)
        {
             if ($idobjet === FALSE)
            {
                show_404(); 
            } 
            $this->load->helper('url');
            
            $appellationobjet=$this->get_appellation($idobjet);

            $data = array(
                'idobjet' => $idobjet,
                'appellationobjet' => $appellationobjet,
                'idtype' => $this->input->post('idtype')
            );

            $this->db->where('idobjet', $idobjet);
            $this->db->update('objets', $data);
        }

        public function can_be_delete($idobjet)
        {
            if($idobjet === FALSE)
            {
                show_404();
            }
            $this->load->helper('url');
            $this->db->from('interventions');
            $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
            $this->db->where('interventions.idobjet', $idobjet);
            $query = $this->db->count_all_results();

        }

 } 