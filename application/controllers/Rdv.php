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
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 || !($data['admin']))
            {
                        
                        show_404();
            }
                $data['rdv'] = $this->rdv_model->get_rdv();
                $data['attentes'] = $this->rdv_model->get_rdv_attente();
                $data['pasts'] = $this->rdv_model->get_rdv_past();
                $data['futurs'] = $this->rdv_model->get_rdv_futur();
                $data['title'] = 'Les rdv pris :';
                

                $this->load->view('templates/header', $data);
                $this->load->view('rdv/index', $data);
                
        }

        public function view($idrdv = NULL)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            

            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 || !($data['admin']))
            {
                        
                        show_404();
            }
             
                $data['rdv_item'] = $this->rdv_model->get_rdv($idrdv);

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

        public function mine($idclient = NULL)
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
            $data['title']="Prise de rdv";
            $data['connecte']=$connecte;
            $data['admin']=$this->is_admin();
            
            $data['rdvmine']=$this->rdv_model->get_rdv_of_client($idclient);

            $this->load->view('templates/header', $data);
            $this->load->view('rdv/mine', $data);
                
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
            $data['title']="Prise de rdv";
            $data['connecte']=$connecte;
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
            $this->form_validation->set_rules('datedispo2', 'deuxième disponibilité', 'required',array(
                'required'      => 'Vous devez choisir la %s.',
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
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home',$data);
            }
        }

        public function validation($idrdv = NULL)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');


            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 || !($data['admin']))
            {
                        
                        show_404();
            }
            
            $data['rdv_item']=$this->rdv_model->get_rdv($idrdv);
            if(empty($data['rdv_item']))
            {
                show_404();
            }
            
            $this->form_validation->set_rules('daterdv', 'deuxième disponibilité', 'required',array(
                'required'      => 'Vous devez choisir la %s.',
        ));
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('rdv/validation',$data);
                

            }
            else
            {
                $this->rdv_model->update_rdv($idrdv);
                $this->index();
            }

        }

        public function verif_delete($idrdv = NULL)
        {
            
            $this->load->library('form_validation');
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['clients_item']=$this->clients_model->get_clients($connecte);
            $data['rdv_item']=$this->rdv_model->get_rdv($idrdv);
            if(empty($data['rdv_item']))
            {
                show_404();
            }
            if($connecte < 0 || $data['rdv_item']['idclient']!==$connecte)
            {
                        show_404();
            }
            
            
            
            $data['title'] = "Supprésion rdv";

            $this->load->view('templates/header', $data);
            $this->load->view('rdv/delete', $data);
                
        }

        public function delete($idrdv = NULL)
        {
            
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['clients_item']=$this->clients_model->get_clients($connecte);
            $data['rdv_item']=$this->rdv_model->get_rdv($idrdv);
            if(empty($data['rdv_item']))
            {
                show_404();
            }
            if($connecte < 0 || $data['rdv_item']['idclient']!==$connecte)
            {
                        show_404();
            }
            
            
            
            if (empty($data['rdv_item']))
            {
                    show_404();
            }
            else
            {
                $this->rdv_model->delete($idrdv);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home',$data);
            }   
        }
}
?>