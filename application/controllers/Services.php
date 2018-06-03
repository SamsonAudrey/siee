<?php
class Services extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('services_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
                $data['services'] = $this->services_model->get_services();
                $data['title'] = 'Les différents services :';
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('services/index', $data);
                
        }

        public function create()
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Création d\'un service ';
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();

            $this->form_validation->set_rules('appellationservice', 'Appellation', 'required|is_unique[services.appellationservice]',array(
                'required'      => 'Vous devez remplir l\' %s.',
                'is_unique'     => 'Cette %s existe déjà.'
        ));

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('services/create');
                

            }
            else
            {
                $this->services_model->set_services();
                $this->index();
            }
        }

         public function verif_delete($idservice = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
           
            $this->load->library('form_validation');
            $data['services_item'] = $this->services_model->get_services($idservice);

                if (empty($data['services_item']))
                {
                        show_404();
                }

                $data['title'] = $data['services_item']['appellationservice'];
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();
                $data['delete']=$this->db->can_be_delete($idservice);


                $this->load->view('templates/header', $data);
                $this->load->view('services/delete', $data);
                
        }

        public function delete($idservice = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $data['services_item'] = $this->services_model->get_services($idservice);

                if (empty($data['services_item']))
                {
                        show_404();
                }
                else
                {
                    $this->services_model->delete($idservice);

                    $this->index();
                }   
        }
}
?>