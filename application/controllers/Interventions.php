<?php
class Interventions extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('interventions_model');
                $this->load->model('services_model');
                $this->load->model('objets_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0)
            {
                        
                        show_404();
            }
                $data['interventions'] = $this->interventions_model->get_interventions();
                $data['syndics'] = $this->interventions_model->get_syndics_affichage();
                $data['particuliers'] = $this->interventions_model->get_particuliers_affichage();
                $data['title'] = 'Les interventions présentes :';
                                
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/index', $data);
                
        }

        public function view($idintervention = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
                $data['interventions_item'] = $this->interventions_model->get_interventions($idintervention);

                if (empty($data['interventions_item']))
                {
                        show_404();
                }

                $data['title'] = $data['interventions_item']['idintervention'];
                
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/view', $data);
                
        }

        public function create()
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();
            $data['services']=$this->services_model->get_services();
            $data['objets']=$this->objets_model->get_objets();

            $data['title'] = 'Création d\' une intervention';

            $this->form_validation->set_rules('idservice', 'service', 'required',array(
                'required'      => 'Vous devez remplir le %s.',
        ));
            $this->form_validation->set_rules('idobjet', 'objet', 'required',array(
                'required'      => 'Vous devez remplir l\' %s.',
        ));
            $this->form_validation->set_rules('dureeintervention', 'Duree', 'required',array(
                'required'      => 'Vous devez remplir la %s.',
        ));
            $this->form_validation->set_rules('descriptionintervention', 'description', 'required',array(
                'required'      => 'Vous devez remplir la %s.',
        ));



            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/create');
                

            }
            else
            {
                $this->interventions_model->set_interventions();
                $this->index();
                
            }
        }

        public function verif_delete($idintervention = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $this->load->library('form_validation');
            $data['interventions_item'] = $this->interventions_model->get_interventions($idintervention);

                if (empty($data['interventions_item']))
                {
                        show_404();
                }

                $data['title'] = $data['interventions_item']['idintervention'];
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();


                $this->load->view('templates/header', $data);
                $this->load->view('interventions/delete', $data);
                
        }

        public function delete($idintervention = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $data['interventions_item'] = $this->interventions_model->get_interventions($idintervention);

                if (empty($data['interventions_item']))
                {
                        show_404();
                }
                else
                {
                    $this->interventions_model->delete($idintervention);

                    $this->index();
                }   
        }

        public function modif_interventions($idintervention = FALSE)
        {
            if($interventions = FALSE)
            {
                show_404();
            }
            
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();
            $data['services']=$this->services_model->get_services();
            $data['objets']=$this->objets_model->get_objets();
            $data['interventions_item'] = $this->interventions_model->get_interventions($idintervention);


            $this->form_validation->set_rules('idservice', 'service', 'required',array(
                'required'      => 'Vous devez remplir le %s.',
        ));
            $this->form_validation->set_rules('idobjet', 'objet', 'required',array(
                'required'      => 'Vous devez remplir l\' %s.',
        ));
            $this->form_validation->set_rules('dureeintervention', 'Duree', 'required',array(
                'required'      => 'Vous devez remplir la %s.',
        ));
            $this->form_validation->set_rules('descriptionintervention', 'description', 'required',array(
                'required'      => 'Vous devez remplir la %s.',
        ));



            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/modification', $data);
                

            }
            else
            {
                $this->interventions_model->update_interventions($idintervention);
                $this->index();
                
            }
            
        }
}
?>