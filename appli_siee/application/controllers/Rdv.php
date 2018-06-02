<?php
class Rdv extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('rdv_model');
                $this->load->model('clients_model');
                $this->load->model('interventions_model');
                $this->load->helper('url_helper');
                
        }

        public function index()
        {
                $data['rdv'] = $this->rdv_model->get_rdv();
                $data['title'] = 'Les rdv pris :';
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('rdv/index', $data);
                
        }

        public function view($idintervention = NULL,$idclient = NULL)
        {
              
                $data['rdv_item'] = $this->rdv_model->get_rdv($idintervention,$idclient);

                if (empty($data['rdv_item']))
                {
                        show_404();
                }

                $data['title'] = $data['rdv_item']['daterdv'];
                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('rdv/view', $data);
                
        }

        public function create($idclient = NULL )
        {

            $this->load->helper('form');
            $this->load->library('form_validation');
            

            $data['clients_item'] = $this->clients_model->get_clients($idclient);
            if (empty($data['clients_item']))
               {
                        
                        show_404();
               }
            
            $connecte=$this->verif_cookie();
            if($connecte!== $data['clients_item']['idclient'])
            {
                        
                        show_404();
            }

            $data['title'] = 'Prise de RDV';
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();
            $data['client']=$this->clients_model->get_clients($data['connecte']);
            $data['interventions']=$this->interventions_model->get_intervention_type_client($data['connecte']);

            $this->form_validation->set_rules('idintervention', 'intervention', 'required',array(
                'required'      => 'Vous devez remplir l\' %s.',
        ));
            $this->form_validation->set_rules('datedispo1', 'première disponibilité', 'required',array(
                'required'      => 'Vous devez choisir la %s.',
                'callback_checkDateFormat'=> 'La %s n\'est pas valide ',
        ));
            $this->form_validation->set_rules('datedispo2', 'deuxième disponibilité', 'required|!matches[datedispo1]',array(
                'required'      => 'Vous devez choisir la %s.',
                'callback_checkDateFormat'=> 'La %s n\'est pas valide ',
                '!matches'  => 'Veuillez entrez deux dates différentes.'
        ));
            
            
            $this->form_validation->set_rules('commentairerdv', 'commentaire', 'required',array(
                'required'      => 'Vous devez remplire le champ %s.',
        ));
             


            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('rdv/create',$data);
                

            }
            else
            {
                $this->rdv_model->set_rdv($idclient);
                $this->index();
            }
        }
}
?>