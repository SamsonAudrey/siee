<?php 
/**
 * 
 */
 class Rdv_model extends CI_Model
 {
 	
 	public function __construct()
        {
                $this->load->database();
                $this->load->helper('date');
                $this->load->helper('url');
        }

        public function get_rdv($idrdv= FALSE)
	   {
        
        if ($idrdv === FALSE)
            {
                $this->db->select('idrdv,rdv.idclient,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
                $this->db->from('rdv');
                $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
                $this->db->join('services','services.idservice = interventions.idservice');
                $this->db->join('objets','objets.idobjet = interventions.idobjet');
                $this->db->join('clients','clients.idclient = rdv.idclient');
                $this->db->order_by('daterdv');
                $query = $this->db->get();
                return $query->result_array();
            }
        
        $this->db->select('idrdv,rdv.idintervention,rdv.idclient,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
        $this->db->from('rdv');
        $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
        $this->db->join('services','services.idservice = interventions.idservice');
        $this->db->join('objets','objets.idobjet = interventions.idobjet');
        $this->db->join('clients','clients.idclient = rdv.idclient');
        $this->db->where('idrdv',$idrdv);
        $query = $this->db->get();
        
        return $query->row_array();
        }

        public function get_rdv_attente()
        {
            $this->db->select('idrdv,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
            $this->db->from('rdv');
            $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
            $this->db->join('services','services.idservice = interventions.idservice');
            $this->db->join('objets','objets.idobjet = interventions.idobjet');
            $this->db->join('clients','clients.idclient = rdv.idclient');
            $this->db->where('valide','f');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_rdv_futur()
        {
            $format = 'DATE_ATOM';
            $time = time();
            $dateajd=standard_date($format,$time);
            $this->db->select('idrdv,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
            $this->db->from('rdv');
            $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
            $this->db->join('services','services.idservice = interventions.idservice');
            $this->db->join('objets','objets.idobjet = interventions.idobjet');
            $this->db->join('clients','clients.idclient = rdv.idclient');
            $this->db->where('valide','t');
            $this->db->where('daterdv >=',$dateajd);
            $query = $this->db->get();
            return $query->result_array();
        }

        
        public function get_rdv_past()
        {
            $format = 'DATE_ATOM';
            $time = time();
            $dateajd=standard_date($format,$time);
            $this->db->select('idrdv,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
            $this->db->from('rdv');
            $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
            $this->db->join('services','services.idservice = interventions.idservice');
            $this->db->join('objets','objets.idobjet = interventions.idobjet');
            $this->db->join('clients','clients.idclient = rdv.idclient');
            $this->db->where('valide','t');
            $this->db->where('daterdv <',$dateajd);
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_rdv_of_client($idclient = FALSE)
        {
            if($idclient === FALSE)
            {
                return FALSE;
            }

            $this->db->select('idrdv,datedemande,datedispo1,datedispo2,daterdv,commentairerdv,valide,appellationservice,appellationobjet,nomclient,prenomclient');
                $this->db->from('rdv');
                $this->db->join('interventions','interventions.idintervention = rdv.idintervention');
                $this->db->join('services','services.idservice = interventions.idservice');
                $this->db->join('objets','objets.idobjet = interventions.idobjet');
                $this->db->join('clients','clients.idclient = rdv.idclient');
                $this->db->where('rdv.idclient',$idclient);
                $this->db->order_by('daterdv');
                $query = $this->db->get();
                return $query->result_array();
            return $query->row_array();
        }

        public function set_rdv($idclient = FALSE)
        {
            
            if($idclient === FALSE)
            {
                return FALSE;
            }
            $format = 'DATE_ATOM';
            $time = time();
            $daterdv=standard_date($format,$time);

            $rdv = array(
                'idintervention' => $this->input->post('idintervention'),
                'idclient'  => $idclient,
                'datedemande' => $daterdv,
                'datedispo1'  =>$this->input->post('datedispo1'),
                'datedispo2'  =>$this->input->post('datedispo2'),
                'daterdv' => NULL,
                'commentairerdv' => $this->input->post('commentairerdv'),
                'valide' => FALSE
            );

            return $this->db->insert('rdv', $rdv);
            
        }

        public function update_rdv($idrdv){

            $rdv['actual']=$this->get_rdv($idrdv);
            $rdvup = array(
                'idintervention' => $rdv['actual']['idintervention'],
                'idclient'  => $rdv['actual']['idclient'],
                'datedemande' => $rdv['actual']['datedemande'],
                'datedispo1'  =>$rdv['actual']['datedispo1'],
                'datedispo2'  =>$rdv['actual']['datedispo2'],
                'daterdv' => $this->input->post('daterdv'),
                'commentairerdv' => $rdv['actual']['commentairerdv'],
                'valide' => TRUE
            );
            $this->db->where('idrdv', $idrdv);
            $this->db->update('rdv', $rdvup);
        }

        public function delete($idrdv)
        {
             $this->db->delete('rdv', array('idrdv' => $idrdv));
        }
 } 
 ?>