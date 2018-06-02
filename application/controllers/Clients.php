<?php
class Clients extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('clients_model');
                $this->load->model('types_model');
                $this->load->helper('url_helper');
                $this->load->helper('cookie');
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

                $data['clients'] = $this->clients_model->get_clients_affichage();
                $data['syndics'] = $this->clients_model->get_syndics_affichage();
                $data['particuliers'] = $this->clients_model->get_particuliers_affichage();
                $data['title'] = 'Les clients présents';
                $data['admin']=$this->is_admin();
                $data['connecte']=$this->verif_cookie();

                if($data['admin'])
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('clients/index', $data); 
                }
                else
                {
                    show_404();
                }
                
        }

        public function view($idclient = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['clients_item']=$this->clients_model->get_clients($connecte);
            if (empty($data['clients_item']))
                {
                        show_404();
                }
            if($connecte < 0 || (!($data['admin']) && $connecte!==$data['clients_item']['idclient'] ))
            {
                show_404();
            }

                $data['title'] = $data['clients_item']['nomclient']." ".$data['clients_item']['prenomclient'];

                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('clients/view', $data);
                $this->load->view('templates/footer');
        }

        public function inscription()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Connexion';
            $data['erreur']="";
            $connecte=$this->verif_cookie();
            if($connecte> -1)
            {
                    show_404();
            }
            $data['title'] = 'Inscription Fictive';
            $data['admin']=$this->is_admin();
            $data['connecte']=$this->verif_cookie();

            $data['types']=$this->types_model->get_types();
            $data['villes']=$this->clients_model->get_villes();


            $this->form_validation->set_rules('nomclient', 'nom', 'trim|required|max_length[50]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.'
            ));
            $this->form_validation->set_rules('prenomclient', 'prénom', 'trim|required|max_length[50]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.'
            ));
            $this->form_validation->set_rules('telephoneclient', 'téléphone', 'required|min_length[10]|max_length[10]|numeric',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s doit faire 10 caractères.',
                'min_length'    => 'Votre %s doit faire 10 caractères.',
                'numeric'       => 'Votre %s n\' est pas valide .'
            ));
            $this->form_validation->set_rules('email', 'mail', 'trim|required|max_length[50]|valid_email|is_unique[clients.email]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'is_unique'     => 'Cet %s existe déjà.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.',
                'valid_email'   => 'Votre %s n\'est pas correct.'
            ));
            $this->form_validation->set_rules('email2', 'mail', 'trim|required|valid_email|matches[email]',array(
                'required'      => 'Vous devez confirmer votre %s.',
                'matches'       => 'L\'email de confirmation ne correspond pas.',
                'valid_email'   => 'Votre %s n\'est pas correct.'
            ));
            $this->form_validation->set_rules('mdp', 'mot de passe', 'trim|required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('mdp2', 'mot de passe', 'trim|required|matches[mdp]',array(
                'required'      => 'Vous devez confirmer votre %s.',
                'matches'       => 'Le mot de passe de confirmation ne correspond pas.'
            ));
            $this->form_validation->set_rules('idtype', 'type de client', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('rueadresse', 'rue', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('numeroadresse', 'numero', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('idville', 'ville', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));

            if ($this->form_validation->run() === FALSE)
            {
                $data['connecte']=$this->verif_cookie();
                $this->load->view('templates/header', $data);
                $this->load->view('clients/inscription');
                $this->load->view('templates/footer');

            }
            else
            {
                $data['connecte']=$this->verif_cookie();
                $this->clients_model->set_clients();

                $this->load->view('templates/header', $data);
                $this->load->view('pages/home',$data);
            }
        }

        public function connexion()
        {   
            $data['connecte']=$this->verif_cookie();
            $data['admin']=$this->is_admin();

            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Connexion';
            $data['erreur']="";
            $connecte=$this->verif_cookie();
            
             $this->form_validation->set_rules('emailconnect', 'mail', 'trim|required|max_length[50]|valid_email',array(
                'required'      => 'Vous devez remplir votre %s.',
                'is_unique'     => 'Cet %s existe déjà.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.',
                'valid_email'   => 'Votre %s n\'est pas correct.'
            ));
             $this->form_validation->set_rules('mdpconnect', 'mot de passe', 'trim|required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));

            if ($this->form_validation->run() === FALSE)
            {
                
                $this->load->view('templates/header', $data);
                $this->load->view('clients/connexion',$data);
                
            }
            else
            {
               $res=$this->clients_model->connect_client();
               if(!$res)
               {
                   $data['erreur']="Erreur de connexion, le client n'existe pas ou le mot de passe n'est pas le bon.";
                   $this->load->view('templates/header', $data);
                   $this->load->view('clients/connexion',$data);
                   
               }
               else{
                    //ajout d'un cookie pour le client qui vient de se connecter ! 
                    $leclient['client']=$this->clients_model->get_whit_mail_client($this->input->post('emailconnect'));
                    $this->add_cookie($leclient['client']['idclient']);
                    $data['connecte']=$this->verif_cookie();
                    $data['admin']=$this->is_admin();
                    $this->load->view('templates/header', $data);
                    $this->load->view('pages/home',$data);
               }
                
            }     
        }

        public function deconnexion(){
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0)
            {
                show_404();
            }
            $data['title'] = 'Deconnexion';
            $this->delete_cookie();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home',$data);
            
        }


        public function profil($idclient = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0 )
            {
                    show_404();
                        
            }
            $data['clients_item'] = $this->clients_model->get_clients($idclient);
            if (empty($data['clients_item']))
               {
                        $this->load->view('templates/header', $data);
                        $this->load->view('pages/home',$data);
               }
            
            $connecte=$this->verif_cookie();
            if($connecte!== $data['clients_item']['idclient'])
            {
                        show_404();
            }
            $type=$this->clients_model->get_clients_type($data['clients_item']['idtype']);
            $ville=$this->clients_model->get_clients_ville($data['clients_item']['idville']);
            if(!empty($type))
            {
                if (!empty($ville))
                {
                    $data['typeclient'] = $type;
                    $data['villeclient'] = $ville;
                }
                else
                {
                    show_404();
                }
            }
            else
            {
                    show_404();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('clients/profil',$data);
        }

        public function modif_profil($idclient = NULL)
        {
            $data['admin']=$this->is_admin();
            $connecte=$this->verif_cookie();
            $data['connecte'] = $connecte;
            $data['client']=$this->clients_model->get_clients($connecte);
            if($connecte < 0)
            {
                        $this->load->view('templates/header', $data);
                        $this->load->view('pages/home',$data);
            }

            $data['clients_item'] = $this->clients_model->get_clients($idclient);
            if (empty($data['clients_item']))
               {
                        show_404();
               }
            $connecte=$this->verif_cookie();
            if($connecte!== $data['clients_item']['idclient'])
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home',$data);
            }
            
            $this->load->helper('form');
            $this->load->library('form_validation');


            $data['title'] = 'Modification du profil';
            $data['admin']=$this->is_admin();
            $data['connecte']=$this->verif_cookie();
            $data['villes']=$this->clients_model->get_villes();


            $this->form_validation->set_rules('nomclient', 'nom', 'trim|required|max_length[50]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.'
            ));
            $this->form_validation->set_rules('prenomclient', 'prénom', 'trim|required|max_length[50]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.'
            ));
            $this->form_validation->set_rules('telephoneclient', 'téléphone', 'required|max_length[10]|numeric',array(
                'required'      => 'Vous devez remplir votre %s.',
                'max_length'    => 'Votre %s ne doit pas dépasser 10 caractères.',
                'numeric'       => 'Votre %s n\' est pas valide .'
            ));
            $this->form_validation->set_rules('email', 'mail', 'trim|required|max_length[50]|valid_email|is_unique[objets.appellationobjet]',array(
                'required'      => 'Vous devez remplir votre %s.',
                'is_unique'     => 'Cet %s existe déjà.',
                'max_length'    => 'Votre %s ne doit pas dépasser 50 caractères.',
                'valid_email'   => 'Votre %s n\'est pas correct.'
            ));
            $this->form_validation->set_rules('email2', 'mail', 'trim|required|valid_email|matches[email]',array(
                'required'      => 'Vous devez confirmer votre %s.',
                'matches'       => 'L\'email de confirmation ne correspond pas.',
                'valid_email'   => 'Votre %s n\'est pas correct.'
            ));
            $this->form_validation->set_rules('rueadresse', 'rue', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('numeroadresse', 'numero', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));
            $this->form_validation->set_rules('idville', 'ville', 'required',array(
                'required'      => 'Vous devez remplir votre %s.'
            ));

            if ($this->form_validation->run() === FALSE)
            {
                $data['connecte']=$this->verif_cookie();
                $this->load->view('templates/header', $data);
                $this->load->view('clients/modification',$data);
               

            }
            else
            {
                $this->clients_model->update_client($idclient);
                $data['connecte']=$this->verif_cookie();
                
                $this->profil($idclient,$data);
            }
        }

        public function verif_delete($idclient = NULL)
        {

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

                $data['connecte']=$this->verif_cookie();
                $data['admin']=$this->is_admin();

                $this->load->view('templates/header', $data);
                $this->load->view('clients/delete', $data);
                
        }

        public function delete($idclient = NULL)
        {
            $data['clients_item'] = $this->clients_model->get_clients($idclient);
            if (empty($data['clients_item']))
               {
                        show_404();
               }
            $connecte=$this->verif_cookie();
            if($connecte!== $data['clients_item']['idclient'])
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home',$data);
            }
            $res=$this->clients_model->delete_client($idclient);
            if(!$res)
            {
                show_404();
            }
            $this->delete_cookie();

            $data['connecte']=$this->verif_cookie();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/home',$data);
        }
            
        public function add_cookie($idclient = NULL) { 
            $data['clients_item'] = $this->clients_model->get_clients($idclient);
            if (empty($data['clients_item']))
               {
                        show_404();
               }
            
            $cookie_val=password_hash($data['clients_item']['email'],PASSWORD_DEFAULT);
            setcookie('cookie_user',$cookie_val,time()+(10000),"/",''); 
        } 
  
        public function display_cookie() { 
            echo $_COOKIE['cookie_user'];          
        } 
  
        public function delete_cookie() { 

            $connecte=$this->verif_cookie();
            if($connecte < 0)
            {
                        show_404();
            }
             setcookie('cookie_user','',time()-(10000),"/",'');
        }

}