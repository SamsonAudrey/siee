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
                $this->db->order_by('appellationservice', 'ASC');
                $query = $this->db->get();
                return $query->result_array();
        	}
        $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet,services.idservice,objets.idobjet');
        $this->db->from('interventions');
        $this->db->join('services', 'services.idservice = interventions.idservice');
        $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
        $this->db->where('idintervention', $idintervention);
        $query = $this->db->get();
        return $query->row_array();
		

        }

        public function get_syndics_affichage(){
        $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet');
        $this->db->from('interventions');
        $this->db->join('services', 'services.idservice = interventions.idservice');
        $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
        $this->db->join('types', 'types.idtype = objets.idtype');
        $this->db->where('types.nomtype','syndic');
        $this->db->order_by('appellationservice', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_particuliers_affichage(){
        $this->db->select('idintervention,dureeintervention,descriptionintervention,appellationservice,appellationobjet');
        $this->db->from('interventions');
        $this->db->join('services', 'services.idservice = interventions.idservice');
        $this->db->join('objets', 'objets.idobjet = interventions.idobjet');
        $this->db->join('types', 'types.idtype = objets.idtype');
        $this->db->where('types.nomtype','particulier');
        $this->db->order_by('appellationservice', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
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

        public function update_interventions($idintervention = FALSE)
        {
            if ($idintervention === FALSE)
            {
                show_404(); 
            } 
            $this->load->helper('url');
            

            $data = array(
                'idobjet' => $this->input->post('idobjet'),
                'idservice' => $this->input->post('idservice'),
                'dureeintervention' => $this->input->post('dureeintervention'),
                'descriptionintervention' => $this->input->post('descriptionintervention')
            );

            $this->db->where('idintervention', $idintervention);
            $this->db->update('interventions', $data);
        }

}
?>