<?php 
/**
 * 
 */
 class Clients_model extends CI_Model
 {
 	
 	public function __construct()
        {
                $this->load->database();
        }

        public function get_clients($idclient = False)
	   {
        /*if ($idclient === FALSE)
            {
                $query = $this->db->get('clients');
                return $query->result_array();
            }

        $this->db->select('idclient,nomclient,prenomclient,email,telephoneclient,rueadresse,numeroadresse,nomvile,types.nomtype');
        $this->db->from('clients');
        $this->db->join('types', 'types.idtype = clients.idtype');
        $this->db->join('villes', 'villes.idville = clients.idville');
        $this->db->where('clients.idclient',$idclient);
        $query = $this->db->get();
        return $query->result_array();*/
        if ($idclient === FALSE)
            {
                $query = $this->db->get('clients');
                return $query->result_array();
            }

        $query = $this->db->get_where('clients', array('idclient' => $idclient));
        return $query->row_array();
        }

    public function get_clients_affichage(){
        $this->db->select('idclient,nomclient,prenomclient,email,telephoneclient,rueadresse,numeroadresse,nomvile,types.nomtype');
        $this->db->from('clients');
        $this->db->join('types', 'types.idtype = clients.idtype');
        $this->db->join('villes', 'villes.idville = clients.idville');
        $this->db->where('isadmin',1);
        $this->db->order_by('nomclient', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_syndics_affichage(){
        $this->db->select('idclient,nomclient,prenomclient,email,telephoneclient,rueadresse,numeroadresse,nomvile,types.nomtype');
        $this->db->from('clients');
        $this->db->join('types', 'types.idtype = clients.idtype');
        $this->db->join('villes', 'villes.idville = clients.idville');
        $this->db->where('isadmin',1);
        $this->db->where('types.nomtype','syndic');
        $this->db->order_by('nomclient', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_particuliers_affichage(){
        $this->db->select('idclient,nomclient,prenomclient,email,telephoneclient,rueadresse,numeroadresse,nomvile,types.nomtype');
        $this->db->from('clients');
        $this->db->join('types', 'types.idtype = clients.idtype');
        $this->db->join('villes', 'villes.idville = clients.idville');
        $this->db->where('isadmin',1);
        $this->db->where('types.nomtype','particulier');
        $this->db->order_by('nomclient', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

        public function get_whit_mail_client($email = FALSE)
        {
           if ($email === FALSE)
            {
                $query = $this->db->get('clients');
                return $query->result_array();
            } 

            $query = $this->db->get_where('clients',array('email' => $email));
            return $query->row_array();
        }

        public function set_clients()
        {
            $this->load->helper('url');


            $data = array(
                'nomclient' => $this->input->post('nomclient'),
                'prenomclient' => $this->input->post('prenomclient'),
                'telephoneclient' => $this->input->post('telephoneclient'),
                'email' => $this->input->post('email'),
                'mdp' => password_hash($this->input->post('mdp'),PASSWORD_DEFAULT),
                'telephoneclient' => $this->input->post('telephoneclient'),
                'idtype' => $this->input->post('idtype'),
                'rueadresse' => $this->input->post('rueadresse'),
                'numeroadresse' => $this->input->post('numeroadresse'),
                'idville' => $this->input->post('idville'),
                'isadmin'  => 1
            );//On ajout que des clients

            return $this->db->insert('clients', $data);
        }

        public function update_client($idclient = FALSE)
        {
            if ($idclient === FALSE)
            {
                return print(ERREUR); // 
            } 
            $this->load->helper('url');
            

            $data = array(
                'nomclient' => $this->input->post('nomclient'),
                'prenomclient' => $this->input->post('prenomclient'),
                'telephoneclient' => $this->input->post('telephoneclient'),
                'email' => $this->input->post('email'),
                'telephoneclient' => $this->input->post('telephoneclient'),
                'rueadresse' => $this->input->post('rueadresse'),
                'numeroadresse' => $this->input->post('numeroadresse'),
                'idville' => $this->input->post('idville'),
            );

            $this->db->where('idclient', $idclient);
            $this->db->update('clients', $data);
        }

        public function connect_client()
        {
            $this->load->helper('url');

            $email=$this->input->post('emailconnect');
            $mdpconnect=password_hash($this->input->post('mdpconnect'),PASSWORD_DEFAULT);

            $this->db->select('idclient');
            $this->db->where('email',$email);
            $query = $this->db->get('clients');
            $row = $query->row_array();
            if (isset($row))
            {
                
               
                $this->db->select('mdp');
                $this->db->where('email',$email);
                $query = $this->db->get('clients');
                
                foreach ($query->result() as $row)
                    {
                        if (isset($row)){
                            
                            $res=password_verify($this->input->post('mdpconnect'), $row->mdp);
                        }
                    }

                if($res)
                    {
                        
                        return TRUE;
                }
                else{
                    return FALSE;
                }
                
            }
            else{
                return FALSE;
            }
        }

        public function get_clients_type($idtype)
        {
            $this->db->select('nomtype');
            $this->db->where('idtype',$idtype);
            $query = $this->db->get('types');
            foreach ($query->result() as $row)
            {
             $type=$row->nomtype;
            }
            return $type;

        }

        public function get_clients_ville($idville)
        {
            $this->db->select('nomvile');
            $this->db->where('idville',$idville);
            $query = $this->db->get('villes');
            foreach ($query->result() as $row)
            {
             $ville=$row->nomvile;
            }
            return $ville;

        }

        public function delete_client($idclient)
        {   
             if ($idclient === FALSE)
            {
                return false;
            } 
            $this->db->delete('clients', array('idclient' => $idclient));
            return true;
        }

        public function get_villes()
        {
            $this->db->order_by('nomvile', 'ASC');
            $query = $this->db->get('villes');
            return $query->result_array();
        }
        
 } 
 ?>