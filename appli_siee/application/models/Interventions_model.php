<?php
class Interventions_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_interventions($idintervention = FALSE)
	{
        	if ($idintervention === FALSE)
        	{
                $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet');
                $this->db->from('interventions');
                $this->db->join('services', 'services.idservice = interventions.idservice');
                $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
                $query = $this->db->get();
                return $query->result_array();
        	}
        $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet');
        $this->db->from('interventions');
        $this->db->join('services', 'services.idservice = interventions.idservice');
        $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
        $this->db->where('idintervention', $idintervention);
        $query = $this->db->get();
        return $query->row_array();
		

        }

        public function get_intervention_type_client($idclient)
        {
            $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet');
            $this->db->from('interventions');
            $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
            $this->db->join('clients', 'clients.idtype = objets.idtype');
            $this->db->join('services', 'services.idservice = interventions.idservice');
            $this->db->where('clients.idclient',$idclient);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function set_interventions()
        {
            $this->load->helper('url');

            $data = array(
                'idobjet' => $this->input->post('idobjet'),
                'idservice' => $this->input->post('idservice'),
                'dureeintervention' => $this->input->post('dureeintervention'),
                'descriptionintervention' => $this->input->post('descriptionintervention')

            );

            return $this->db->insert('interventions', $data);
        }

        public function delete($idintervention)
        {
            $this->db->delete('interventions', array('idintervention' => $idintervention));
        }
}
?>