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
                $data['interventions'] = $this->interventions_model->get_interventions();
                $data['title'] = 'Les interventions présentes :';
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/index', $data);
                
        }

        public function view($idintervention = NULL)
        {
              
                $data['interventions_item'] = $this->interventions_model->get_interventions($idintervention);

                if (empty($data['interventions_item']))
                {
                        show_404();
                }

                $data['title'] = $data['interventions_item']['idintervention'];
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();
                
                $this->load->view('templates/header', $data);
                $this->load->view('interventions/view', $data);
                
        }

        public function create()
        {
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
}
?>