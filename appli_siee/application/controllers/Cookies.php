<?php 
   class Cookies extends CI_Controller { 
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('cookie'); 
         $this->load->helper('url_helper');
      } 
  
      public function add_cookie() { 
         
            $cookie_val=substr(str_shuffle("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVB"),0,30);
            setcookie('cookie_user',$cookie_val,time()+(10000),"/",'');
            $this->load->view('cookies/index'); 
      } 
  
      public function display_cookie() { 
            echo get_cookie('cookie_user'); 
            $this->load->view('cookies/view');         
      } 
  
      public function delete_cookie() { 
            delete_cookie('cookie_user'); 
            redirect('cookies/display');
          }
		
   } 
?>