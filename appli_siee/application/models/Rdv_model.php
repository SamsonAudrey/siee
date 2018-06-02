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
        }

        public function get_rdv($idintervention = FALSE,$idclient = FALSE)
	   {
        if ($idintervention === FALSE || $idclient === FALSE)
            {
                $query = $this->db->get('rdv');
                return $query->result_array();
            }
            
        /*$this->db->where('idintervention',array('idintervention' => $idintervention));
        $this->db->where('idclient', array('idclient' => $idclient));*/
        $query = $this->db->get('rdv');
        
        return $query->row_array();
		

        }

        public function set_rdv($idclient = FALSE)
        {
            $this->load->helper('url');
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
                'daterdv' => $daterdv,
                'commentairerdv' => $this->input->post('commentairerdv'),
                'valide' => FALSE
            );

            return $this->db->insert('rdv', $rdv);
        }
 } 
 ?>