<?php
class Types_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_types($idtype = FALSE)
    {
            if ($idtype === FALSE)
            {
                $this->db->order_by('nomtype', 'ASC');
                $query = $this->db->get('types');
                return $query->result_array();
            }

        $query = $this->db->get_where('types', array('idtype' => $idtype));
        return $query->row_array();
        

        }

        public function set_types()
        {
            $this->load->helper('url');

            $data = array(
                'nomtype' => $this->input->post('nomtype'),
            );

            //$sql = "INSERT INTO table (types) VALUES(".$this->db->escape($nomtype).")";
            return $this->db->insert('types', $data);
        }
}
?>