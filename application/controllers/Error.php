<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller { 

   public function error404(){
      $this->load->view('errors/html/error_404');
   }
}