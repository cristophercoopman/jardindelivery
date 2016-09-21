<?php 
//este archivo permite llamar desde codeigniter a la libreria. Lo unico que hace es importar los archivos desde la carpeta PHPMailer
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class My_PHPMailer {
    public function My_PHPMailer() {
        require_once('PHPMailer/class.phpmailer.php');
        include("PHPMailer/class.smtp.php");
    }
}
?>
