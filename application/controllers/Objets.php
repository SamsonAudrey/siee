<?php
class Objets extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('objets_model');
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
                $data['objets'] = $this->objets_model->get_objets_affichage();
                $data['syndics'] = $this->objets_model->get_syndics_affichage();
                $data['particuliers'] = $this->objets_model->get_particuliers_affichage();
                $data['title'] = 'Objets présents';
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('objets/index', $data);
                
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

            $data['title'] = 'Création d un objet';

            $this->form_validation->set_rules('appellationobjet', 'Appellation', 'required|is_unique[objets.appellationobjet]',array(
                'required'      => 'Vous devez remplir l\' %s.',
                'is_unique'     => 'Cette %s existe déjà.'
        ));

            $this->form_validation->set_rules('idtype', 'Idtype', 'required');


            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('objets/create');
                

            }
            else
            {
                $this->objets_model->set_objets();
                $this->index();

            }
        }

        public function verif_delete($idobjet = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $this->load->library('form_validation');
            $data['objets_item'] = $this->objets_model->get_objets($idobjet);

                if (empty($data['objets_item']))
                {
                    print("ok0");
                        show_404();
                }

                $data['title'] = $data['objets_item']['appellationobjet'];


                $this->load->view('templates/header', $data);
                $this->load->view('objets/delete', $data);
                
        }

        public function delete($idobjet = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $data['objets_item'] = $this->objets_model->get_objets($idobjet);

                if (empty($data['objets_item']))
                {
                        show_404();
                }
                else
                {
                    $this->objets_model->delete($idobjet);

                    $this->index();
                }   
        }

        public function modif_objets($idobjet = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
            $data['objets_item'] = $this->objets_model->get_objets($idobjet);

                if (empty($data['objets_item']))
                {
                        show_404();
                }
                else
                {
                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Création d un objet';
                    $data['connecte']=$this->verif_cookie();
                    $data['admin']=$this->is_admin();


                    $this->form_validation->set_rules('idtype', 'type', 'required',array(
                        'required'      => 'Veuillez choisir un type'
                    ));


                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('objets/modification',$data);
                        

                    }
                    else
                    {
                        $this->objets_model->update_objets($idobjet);
                        $this->index();

                    }
                    }   
        }
}