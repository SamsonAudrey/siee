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
                'required'      => 'Vous devez remplir l\' %s.'
        ));
            $this->form_validation->set_rules('datedispo1', 'première disponibilité', 'required|callback_validate_date|callback_notWk',array(
                'required'      => 'Vous devez choisir la %s.',
                'validate_date'=> 'La %s n\'est pas valide ',
                'notWk'        => 'Nous ne travaillons pas le weekend...'
        ));
            $this->form_validation->set_rules('datedispo2', 'deuxième disponibilité', 'required|callback_validate_date|callback_notMatch[datedispo1]|callback_notWk',array(
                'required'      => 'Vous devez choisir la %s.',
                'validate_date'=> 'La %s n\'est pas valide ',
                'notWk'        => 'Nous ne travaillons pas le weekend...'
        ));
            
            
            $this->form_validation->set_rules('commentairerdv', 'commentaire', 'required',array(
                'required'      => 'Vous devez remplire le champ %s.'
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

        public function notWk($test_date)
        {
            $numCurrentDay = $test_date -> format('N');
            if (($numCurrentDay == '6') ||
            ($numCurrentDay == '7'))
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }

        public function notMatch($date1, $date2)
        {
            if($date2 != $this->input->post($dat1){
            $this->form_validation->set_message('_notMatch', 'Les deux dates doivent être différentes !');
            return false;
            }
            return true;
        }

        public function validate_date($test_date)
        {
            //VALIDATION of dates
            $test_arr  = explode('-', $test_date);
            if (count($test_arr) == 3) {
            if (checkdate($test_arr[1], $test_arr[0], $test_arr[0])) {
                return TRUE;
            } else {
                $this->form_validation->set_message('validate_date', 'La date que vous avez choisie n\'est pas valide');
                return FALSE;
            }
            } else {
                $this->form_validation->set_message('validate_date', 'La date que vous avez choisie n\'est pas valide');
                return FALSE;
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