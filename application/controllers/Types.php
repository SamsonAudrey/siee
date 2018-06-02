<?php
class Types extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('types_model');
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
                $data['types'] = $this->types_model->get_types();
                $data['title'] = 'Les différents types';
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('types/index', $data);
                
        }

        public function view($idtype = NULL)
        {
              $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            if($connecte < 0 || !($data['admin']))
            {
                        show_404();
            }
                $data['types_item'] = $this->types_model->get_types($idtype);

                if (empty($data['types_item']))
                {
                        show_404();
                }

                $data['title'] = $data['types_item']['nomtype'];
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('types/view', $data);
                
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

            $data['title'] = 'Création d\'un type ! ';
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();

            $this->form_validation->set_rules('nomtype', 'nom', 'required|is_unique[types.nomtype]',
            array(
                'required'      => 'Vous devez remplir le %s.',
                'is_unique'     => 'Ce %s existe déjà.'
        ));

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('types/create');
                

            }
            else
            {
                
                $this->types_model->set_types();
                $this->index();
            }
        }
}
?>